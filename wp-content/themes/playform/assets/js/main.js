/* Kitzhen (samme tema som Fitbase) – lidt JavaScript til sliders, menu, sortering og foldbar tekst. Siden virker også uden. */
(function () {
	// Sliders: pilene scroller én kortbredde ad gangen
	document.querySelectorAll('[data-slider-arrows]').forEach(function (wrap) {
		var slider = document.getElementById(wrap.getAttribute('data-slider-arrows'));
		if (!slider) return;
		var buttons = wrap.querySelectorAll('button');
		function update() {
			buttons[0].disabled = slider.scrollLeft <= 2;
			buttons[1].disabled = slider.scrollLeft + slider.clientWidth >= slider.scrollWidth - 2;
		}
		buttons.forEach(function (b) {
			b.addEventListener('click', function () {
				var item = slider.querySelector('.slider__item');
				var step = item ? item.getBoundingClientRect().width + 16 : slider.clientWidth / 4;
				slider.scrollBy({ left: step * parseInt(b.getAttribute('data-dir'), 10), behavior: 'smooth' });
			});
		});
		slider.addEventListener('scroll', update, { passive: true });
		update();
	});

	var header = document.querySelector('.site-header');
	var menu = document.getElementById('hovedmenu');
	var mobile = window.matchMedia('(max-width: 1080px)');

	// Menupanel: kategorien man holder over (eller fokuserer) styrer midter- og priskolonnen.
	// En lille forsinkelse gør, at man kan bevæge musen skråt over til midterkolonnen uden at skifte.
	function showPane(inner, idx) {
		inner.querySelectorAll('[data-pane]').forEach(function (el) {
			el.classList.toggle('is-active', el.getAttribute('data-pane') === idx);
		});
	}
	document.querySelectorAll('.mm__cat').forEach(function (cat) {
		var timer;
		var inner = cat.closest('.mm__inner');
		cat.addEventListener('mouseenter', function () {
			if (mobile.matches) return;
			clearTimeout(timer);
			timer = setTimeout(function () { showPane(inner, cat.getAttribute('data-pane')); }, 90);
		});
		cat.addEventListener('mouseleave', function () { clearTimeout(timer); });
		cat.addEventListener('focus', function () { if (!mobile.matches) showPane(inner, cat.getAttribute('data-pane')); });
	});
	// Panelet starter altid på første kategori, når det åbnes igen
	document.querySelectorAll('.mm__item[data-mm]').forEach(function (item) {
		item.addEventListener('mouseleave', function () {
			if (mobile.matches) return;
			var inner = item.querySelector('.mm__inner');
			if (inner) showPane(inner, '0');
		});
	});

	// Indholdsfortegnelse: markér afsnittet, man læser, og fyld stregen ned til det
	var toc = document.querySelector('[data-toc]');
	if (toc && 'IntersectionObserver' in window) {
		var links = Array.prototype.slice.call(toc.querySelectorAll('a[href^="#"]'));
		var heads = links.map(function (a) { return document.getElementById(decodeURIComponent(a.getAttribute('href').slice(1))); });
		var list = toc.querySelector('ol');
		var setActive = function (i) {
			links.forEach(function (a, j) { a.classList.toggle('is-active', j === i); });
			if (i < 0) { list.style.setProperty('--toc-fill', '0px'); return; }
			var a = links[i];
			list.style.setProperty('--toc-fill', (a.offsetTop + a.offsetHeight) + 'px');
		};
		var pick = function () {
			var cur = -1;
			heads.forEach(function (h, i) { if (h && h.getBoundingClientRect().top < window.innerHeight * 0.3) cur = i; });
			setActive(cur);
		};
		var io = new IntersectionObserver(pick, { rootMargin: '0px 0px -70% 0px' });
		heads.forEach(function (h) { if (h) io.observe(h); });
		window.addEventListener('scroll', function () { requestAnimationFrame(pick); }, { passive: true });
		pick();
	}

	// Topbar på mobil: fordelene skifter roligt hvert 4. sekund
	var msgs = document.querySelectorAll('.topbar__msg');
	if (msgs.length > 1 && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
		var cur = 0;
		setInterval(function () {
			if (document.hidden) return;
			msgs[cur].classList.remove('is-on');
			cur = (cur + 1) % msgs.length;
			msgs[cur].classList.add('is-on');
		}, 4000);
	}

	// Alle menupaneler får samme højde som det højeste, så panelet ikke hopper, når man skifter punkt.
	// Måles ved første hover (skjult), og igen hvis vinduet ændrer størrelse.
	if (menu) {
		var measured = false;
		var measurePanels = function () {
			if (mobile.matches) return;
			var max = 0;
			menu.querySelectorAll('.mm__item[data-mm]').forEach(function (item) {
				var panel = item.querySelector('.mm__panel');
				var inner = item.querySelector('.mm__inner');
				if (!panel || !inner) return;
				var was = panel.getAttribute('style') || '';
				panel.style.cssText = 'display:block;visibility:hidden;pointer-events:none';
				inner.style.minHeight = '0';
				var active = inner.querySelector('.mm__pane.is-active');
				inner.querySelectorAll('.mm__pane').forEach(function (pane) {
					inner.querySelectorAll('.mm__pane').forEach(function (x) { x.classList.toggle('is-active', x === pane); });
					max = Math.max(max, inner.offsetHeight);
				});
				inner.querySelectorAll('.mm__pane').forEach(function (x) { x.classList.toggle('is-active', x === active); });
				inner.style.minHeight = '';
				panel.setAttribute('style', was);
				if (!was) panel.removeAttribute('style');
			});
			if (max) menu.style.setProperty('--mm-h', max + 'px');
			measured = true;
		};
		menu.addEventListener('mouseenter', function () { if (!measured) measurePanels(); });
		window.addEventListener('resize', function () { measured = false; });
	}

	// Menuens faktiske bredde, så den folder sig jævnt sammen, når søgefeltet vokser
	if (menu && header) {
		menu.querySelectorAll(':scope > .mm__item').forEach(function (it, i) { it.style.setProperty('--i', i); });
		var measure = function () {
			if (header.classList.contains('is-searching')) return;
			header.style.setProperty('--mm-w', menu.scrollWidth + 'px');
		};
		measure();
		window.addEventListener('resize', measure);
		if (document.fonts && document.fonts.ready) document.fonts.ready.then(measure);
	}

	// Smal skærm: luppen folder søgefeltet ud under logoet
	var searchToggle = document.querySelector('.search-toggle');
	var closeSearch = function () {
		if (!header || !header.classList.contains('is-search-open')) return;
		header.classList.remove('is-search-open');
		if (searchToggle) searchToggle.setAttribute('aria-expanded', 'false');
	};

	// Mobilmenu: skuffe med lag (menupunkt → kategori). Links med data-to åbner næste lag i stedet for siden.
	var toggle = document.querySelector('.menu-toggle');
	var drawer = document.getElementById('mobilmenu');
	var drawerBg = document.querySelector('[data-close-bg]');
	if (toggle && drawer) {
		var stack = ['root'];
		var view = function (id) { return drawer.querySelector('[data-view="' + id + '"]'); };
		var paint = function () {
			drawer.querySelectorAll('.dr__view').forEach(function (v) {
				var i = stack.indexOf(v.getAttribute('data-view'));
				v.classList.toggle('is-active', i === stack.length - 1);
				v.classList.toggle('is-behind', i > -1 && i < stack.length - 1);
			});
		};
		// Headerens plads, mens skuffen er åben: lige under topbaren, når den kan ses, ellers helt foroven.
		// Regnes ud fra topbaren (ikke headerens aktuelle position), så et åbent tastatur på iPhone ikke flytter den.
		var topbar = document.querySelector('.topbar');
		var placeHeader = function () {
			if (!header || !drawer.classList.contains('is-open')) return;
			var below = topbar ? topbar.offsetTop + topbar.offsetHeight : 0;
			var ht = Math.max(0, below - window.scrollY);
			header.style.position = 'fixed';
			header.style.top = ht + 'px';
			header.style.left = '0';
			header.style.right = '0';
			document.documentElement.style.setProperty('--dr-top', (ht + header.offsetHeight) + 'px');
		};
		var openDrawer = function () {
			if (header) {
				header.classList.remove('is-tucked');
				// Luk søgningen helt (og tastaturet), før menuen åbner
				var act = document.activeElement;
				if (act && header.contains(act) && act.blur) act.blur();
				header.classList.remove('is-searching');
				closeSearch();
			}
			drawer.removeAttribute('inert');
			drawer.setAttribute('aria-hidden', 'false');
			drawer.classList.add('is-open');
			if (drawerBg) { drawerBg.hidden = false; requestAnimationFrame(function () { drawerBg.classList.add('is-open'); }); }
			// Når siden er låst (overflow: hidden), holder "sticky" ikke længere – særligt i Safari på iPhone. Så sidder
			// headeren (med logoet) fast foroven, mens menuen er åben, også når man har scrollet ned.
			placeHeader();
			setTimeout(placeHeader, 350); // når tastaturet er gledet væk
			document.documentElement.classList.add('dr-lock');
			toggle.setAttribute('aria-expanded', 'true');
			toggle.setAttribute('aria-label', 'Luk menu');
		};
		var closeDrawer = function () {
			drawer.classList.remove('is-open');
			if (header) { header.style.position = ''; header.style.top = ''; header.style.left = ''; header.style.right = ''; }
			if (drawerBg) { drawerBg.classList.remove('is-open'); setTimeout(function () { if (!drawer.classList.contains('is-open')) drawerBg.hidden = true; }, 300); }
			drawer.setAttribute('aria-hidden', 'true');
			drawer.setAttribute('inert', '');
			document.documentElement.classList.remove('dr-lock');
			toggle.setAttribute('aria-expanded', 'false');
			toggle.setAttribute('aria-label', 'Åbn menu');
			// Start forfra næste gang, når skuffen er gledet ud
			setTimeout(function () { if (!drawer.classList.contains('is-open')) { stack = ['root']; paint(); drawer.querySelectorAll('.dr__view').forEach(function (v) { v.scrollTop = 0; }); } }, 350);
		};
		toggle.addEventListener('click', function () { if (drawer.classList.contains('is-open')) closeDrawer(); else openDrawer(); });
		window.addEventListener('scroll', placeHeader, { passive: true });
		if (window.visualViewport) window.visualViewport.addEventListener('resize', placeHeader);
		if (drawerBg) drawerBg.addEventListener('click', closeDrawer);
		drawer.addEventListener('click', function (e) {
			var to = e.target.closest('[data-to]');
			if (to && view(to.getAttribute('data-to'))) {
				e.preventDefault();
				var next = view(to.getAttribute('data-to'));
				next.scrollTop = 0;
				stack.push(to.getAttribute('data-to'));
				paint();
				var b = next.querySelector('[data-back]');
				if (b) setTimeout(function () { b.focus({ preventScroll: true }); }, 50);
				return;
			}
			if (e.target.closest('[data-back]') && stack.length > 1) { stack.pop(); paint(); }
		});
		document.addEventListener('keydown', function (e) {
			if (e.key !== 'Escape' || !drawer.classList.contains('is-open')) return;
			if (stack.length > 1) { stack.pop(); paint(); } else closeDrawer();
		});
		mobile.addEventListener('change', function () { if (!mobile.matches) closeDrawer(); });
		// Kommer man tilbage til siden med browserens tilbage-knap, er skuffen lukket
		window.addEventListener('pageshow', function () { if (drawer.classList.contains('is-open')) closeDrawer(); });
	}

	// Smal skærm: headeren gemmer sig, når man scroller ned, og kommer frem igen, når man scroller op
	if (header) {
		var lastY = window.scrollY, ticking = false;
		window.addEventListener('scroll', function () {
			if (ticking) return;
			ticking = true;
			requestAnimationFrame(function () {
				var y = window.scrollY;
				var tuck = header.classList.contains('is-tucked');
				if (document.documentElement.classList.contains('dr-lock')) { lastY = y; ticking = false; return; }
				if (!mobile.matches || y < 160 || header.classList.contains('is-searching')) tuck = false;
				else if (y > lastY + 4) tuck = true;
				else if (y < lastY - 4) tuck = false;
				header.classList.toggle('is-tucked', tuck);
				lastY = y;
				ticking = false;
			});
		}, { passive: true });
	}

	// Sortering skifter med det samme
	document.querySelectorAll('[data-autosubmit]').forEach(function (el) {
		el.addEventListener('change', function () { el.form.submit(); });
	});

	// Foldbar SEO-tekst
	document.querySelectorAll('[data-seo-toggle]').forEach(function (btn) {
		var text = btn.parentNode.querySelector('[data-seo]');
		if (!text) return;
		if (text.scrollHeight <= 560) { text.classList.remove('is-collapsed'); btn.hidden = true; return; }
		btn.addEventListener('click', function () {
			var collapsed = text.classList.toggle('is-collapsed');
			btn.textContent = collapsed ? 'Læs mere' : 'Vis mindre';
			btn.setAttribute('aria-expanded', collapsed ? 'false' : 'true');
		});
	});

	// Filtre er foldet sammen på mobil. Panelet står kun åbent, når man lige har klikket på et valg i selve panelet
	// (så man kan vælge flere); kategorifaner, prisknapper og links udefra åbner det ikke (ejerens ønske 12. nov. 2026).
	var f = document.querySelector('.filters__mobile');
	if (f) {
		var keep = false;
		try { keep = sessionStorage.getItem('pf-fopen') === '1'; sessionStorage.removeItem('pf-fopen'); } catch (e) {}
		if (window.matchMedia('(max-width: 900px)').matches && (!keep || location.hash === '#produkter')) f.removeAttribute('open');
		f.addEventListener('click', function (e) {
			if (e.target.closest('a.opt, .filters__head a, .fsec a')) { try { sessionStorage.setItem('pf-fopen', '1'); } catch (err) {} }
		});
	}
	// Prisknapperne: rul rækken, så den valgte knap står synligt (i midten) i stedet for at starte forfra
	var pp = document.querySelector('.pricepills');
	var ppOn = pp && pp.querySelector('.is-active');
	if (ppOn && pp.scrollWidth > pp.clientWidth) {
		pp.scrollLeft = Math.max(0, ppOn.offsetLeft - (pp.clientWidth - ppOn.offsetWidth) / 2);
	}
	if (pp && location.hash === '#produkter') {
		// Hop ned til knapperne og produkterne, når panelet er lukket (browserens eget hop sker før JS lukker det)
		requestAnimationFrame(function () { pp.scrollIntoView({ block: 'start' }); });
	}
	// Knappen "Filtrer" ved siden af sorteringen åbner/lukker filterlisten på mobil
	var fbtn = document.querySelector('[data-filter-btn]');
	var fbox = document.querySelector('.filters__mobile');
	if (fbtn && fbox) {
		var sync = function () { fbtn.setAttribute('aria-expanded', fbox.open ? 'true' : 'false'); };
		fbtn.addEventListener('click', function () { fbox.open = !fbox.open; sync(); });
		fbox.addEventListener('toggle', sync);
		sync();
	}

	// Nyhedsbrev: sendes til vores endpoint, som videresender til Brevo/MailerLite (double opt-in)
	document.querySelectorAll('[data-newsletter]').forEach(function (form) {
		var note = form.querySelector('.news__note');
		var btn = form.querySelector('button');
		form.addEventListener('submit', function (e) {
			e.preventDefault();
			btn.disabled = true;
			fetch(form.getAttribute('data-endpoint'), {
				method: 'POST',
				headers: { 'Content-Type': 'application/json' },
				body: JSON.stringify({ email: form.email.value, website: form.website ? form.website.value : '' })
			}).then(function (r) { return r.json(); }).then(function (d) {
				note.textContent = d.message || 'Tak!';
				if (d.ok) form.email.value = '';
			}).catch(function () {
				note.textContent = 'Noget gik galt. Prøv igen senere.';
			}).finally(function () { btn.disabled = false; });
		});
	});
})();

// Underkategorier på kategorikort: tone ud i kanten, så længe der er mere at swipe til
(function () {
	var navs = document.querySelectorAll('.cat__subs, .guide__chips, .pricebox__chips');
	if (!navs.length) return;
	var update = function (n) { n.classList.toggle('has-more', n.scrollWidth > n.clientWidth + 2 && n.scrollLeft + n.clientWidth < n.scrollWidth - 2); };
	navs.forEach(function (n) {
		update(n);
		n.addEventListener('scroll', function () { update(n); }, { passive: true });
	});
	window.addEventListener('resize', function () { navs.forEach(update); });
	window.addEventListener('load', function () { navs.forEach(update); });
})();

// Cookie-samtykke: valget gemmes i den nødvendige førstepartscookie pf_consent (12 måneder, med tidspunkt og version).
(function () {
	var box = document.querySelector('[data-cc]');
	if (!box) return;
	var VERSION = parseInt(box.getAttribute('data-version'), 10) || 1;
	var NAME = 'pf_consent';
	var read = function () {
		var m = document.cookie.match(new RegExp('(?:^|; )' + NAME + '=([^;]*)'));
		if (!m) return null;
		try { var c = JSON.parse(decodeURIComponent(m[1])); return c && c.v === VERSION ? c : null; } catch (e) { return null; }
	};
	var write = function (c) {
		var secure = location.protocol === 'https:' ? '; Secure' : '';
		document.cookie = NAME + '=' + encodeURIComponent(JSON.stringify(c)) + '; Max-Age=31536000; Path=/; SameSite=Lax' + secure;
	};
	var activate = function (c) {
		document.querySelectorAll('script[type="text/plain"][data-consent]').forEach(function (old) {
			var cat = old.getAttribute('data-consent');
			if (!c[cat] || old.getAttribute('data-done')) return;
			old.setAttribute('data-done', '1');
			var s = document.createElement('script');
			Array.prototype.forEach.call(old.attributes, function (a) {
				if (['type', 'data-consent', 'data-src', 'data-done'].indexOf(a.name) === -1) s.setAttribute(a.name, a.value);
			});
			if (old.getAttribute('data-src')) s.src = old.getAttribute('data-src'); else s.text = old.text;
			old.parentNode.insertBefore(s, old.nextSibling);
		});
	};
	var wipe = function () { // tilbagetrukket samtykke: fjern de cookies, siden selv kan nå
		document.cookie.split('; ').forEach(function (kv) {
			var n = kv.split('=')[0];
			if (!n || n === NAME) return;
			['', '; Domain=' + location.hostname, '; Domain=.' + location.hostname.replace(/^www\./, '')].forEach(function (d) {
				document.cookie = n + '=; Max-Age=0; Path=/' + d;
			});
		});
	};
	var views = function (name) {
		box.querySelectorAll('[data-cc-view]').forEach(function (v) { v.hidden = v.getAttribute('data-cc-view') !== name; });
	};
	var show = function (name) {
		var c = read() || {};
		box.querySelectorAll('[data-cc-cat]').forEach(function (i) { i.checked = !!c[i.getAttribute('data-cc-cat')]; });
		views(name || 'main');
		box.hidden = false;
		box.focus({ preventScroll: true });
	};
	var save = function (stat, mark) {
		var before = read();
		var withdrew = before && ((before.statistik && !stat) || (before.marketing && !mark));
		write({ v: VERSION, t: new Date().toISOString(), statistik: !!stat, marketing: !!mark });
		box.hidden = true;
		if (withdrew) { wipe(); location.reload(); return; }
		activate({ statistik: !!stat, marketing: !!mark });
		document.dispatchEvent(new CustomEvent('pf:consent', { detail: { statistik: !!stat, marketing: !!mark } }));
	};
	box.addEventListener('click', function (e) {
		var b = e.target.closest('[data-cc-act]');
		if (!b) return;
		var a = b.getAttribute('data-cc-act');
		if (a === 'accept') save(true, true);
		else if (a === 'reject') save(false, false);
		else if (a === 'settings') show('settings');
		else if (a === 'save') {
			var st = box.querySelector('[data-cc-cat="statistik"]').checked, mk = box.querySelector('[data-cc-cat="marketing"]').checked;
			save(st, mk);
		}
	});
	document.querySelectorAll('[data-cc-open]').forEach(function (b) { b.addEventListener('click', function () { show('settings'); }); });
	var c = read();
	if (c) activate(c); else show('main');
})();

// Kategori-faner: slider med fade, træk med musen og pile på desktop
(function () {
	document.querySelectorAll('nav.tabs').forEach(function (tabs) {
		var wrap = document.createElement('div');
		wrap.className = 'tabs-wrap';
		tabs.parentNode.insertBefore(wrap, tabs);
		wrap.appendChild(tabs);
		var mk = function (dir, label) {
			var b = document.createElement('button');
			b.type = 'button';
			b.className = 'tabs__arrow tabs__arrow--' + dir;
			b.setAttribute('aria-label', label);
			b.innerHTML = '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 5l7 7-7 7"/></svg>';
			wrap.appendChild(b);
			return b;
		};
		var prev = mk('prev', 'Vis tidligere kategorier');
		var next = mk('next', 'Vis flere kategorier');
		var update = function () {
			var more = tabs.scrollLeft + tabs.clientWidth < tabs.scrollWidth - 2;
			var back = tabs.scrollLeft > 2;
			tabs.classList.toggle('has-more', more);
			tabs.classList.toggle('has-prev', back);
			wrap.classList.toggle('has-more', more);
			wrap.classList.toggle('has-prev', back);
		};
		var step = function (d) { tabs.scrollBy({ left: d * Math.max(200, tabs.clientWidth * 0.7), behavior: 'smooth' }); };
		prev.addEventListener('click', function () { step(-1); });
		next.addEventListener('click', function () { step(1); });
		tabs.addEventListener('scroll', update, { passive: true });
		window.addEventListener('resize', update);
		// Aktiv fane skal være synlig
		var act = tabs.querySelector('.is-active, [aria-current]');
		if (act) { tabs.scrollLeft = Math.max(0, act.offsetLeft - tabs.clientWidth / 2 + act.offsetWidth / 2); }
		update();
		window.addEventListener('load', function () { if (act) { tabs.scrollLeft = Math.max(0, act.offsetLeft - tabs.clientWidth / 2 + act.offsetWidth / 2); } update(); });
		// Træk med musen
		var down = false, moved = false, sx = 0, sl = 0;
		tabs.addEventListener('pointerdown', function (e) { if (e.pointerType !== 'mouse') return; down = true; moved = false; sx = e.clientX; sl = tabs.scrollLeft; });
		window.addEventListener('pointermove', function (e) {
			if (!down) return;
			var dx = e.clientX - sx;
			if (Math.abs(dx) > 5) { moved = true; tabs.classList.add('is-dragging'); }
			if (moved) tabs.scrollLeft = sl - dx;
		});
		window.addEventListener('pointerup', function () { down = false; tabs.classList.remove('is-dragging'); });
		tabs.addEventListener('click', function (e) { if (moved) { e.preventDefault(); e.stopPropagation(); moved = false; } }, true);
	});
})();

/* Kampagnebaren: teksten sænker farten blødt, når musen er over den (Web Animations API – ingen hop). */
(function () {
	var track = document.querySelector('.campaign-bar__track');
	var run = track && track.querySelector('.campaign-bar__run');
	if (!run || !run.getAnimations) return;
	var target = 1, rate = 1, raf = 0;
	function step() {
		rate += (target - rate) * 0.08;
		if (Math.abs(target - rate) < 0.005) rate = target;
		run.getAnimations().forEach(function (a) { a.playbackRate = rate; });
		raf = rate === target ? 0 : requestAnimationFrame(step);
	}
	function to(r) { target = r; if (!raf) raf = requestAnimationFrame(step); }
	track.addEventListener('mouseenter', function () { to(0.3); });
	track.addEventListener('mouseleave', function () { to(1); });
})();


// Kampagneheaderens knap: glid blødt ned til produkterne i stedet for at hoppe (også i browsere uden CSS scroll-behavior).
document.addEventListener('click', function (e) {
	var a = e.target.closest && e.target.closest('.camp-hero__btn[href^="#"]');
	if (!a) return;
	var t = document.querySelector(a.getAttribute('href'));
	if (!t) return;
	e.preventDefault();
	var calm = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	t.scrollIntoView({ behavior: calm ? 'auto' : 'smooth', block: 'start' });
	if (history.replaceState) history.replaceState(null, '', a.getAttribute('href'));
});

/* Menneske-tjek til /go/: cookien sættes først, når den besøgende interagerer med siden. */
(function () {
	if (document.cookie.indexOf('pf_h=1') !== -1) return;
	var set = function () {
		document.cookie = 'pf_h=1;path=/;max-age=31536000;SameSite=Lax';
		['pointerdown', 'scroll', 'keydown', 'touchstart'].forEach(function (e) { window.removeEventListener(e, set, true); });
	};
	['pointerdown', 'scroll', 'keydown', 'touchstart'].forEach(function (e) { window.addEventListener(e, set, { capture: true, passive: true }); });
})();

/* Myappeal (26. nov. 2026): mega-menu, søg i guides, faner med scene-kort og rolige animationer.
   Kun på allerede renderet HTML – ingen kald til serveren. */
(function () {
	var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	var narrow = window.matchMedia('(max-width: 760px)');

	// Mega-menu: hover og fokus åbner, Esc og klik udenfor lukker. Touch: første tryk åbner, andet følger linket.
	var items = Array.prototype.slice.call(document.querySelectorAll('[data-mn]'));
	var lastPointer = 'mouse';
	document.addEventListener('pointerdown', function (e) { lastPointer = e.pointerType || 'mouse'; }, true);
	var nav = document.querySelector('.ma-nav');
	var swT;
	function setOpen(item, open) {
		if (open && nav && items.some(function (o) { return o !== item && o.classList.contains('is-open'); })) {
			// Skift mellem to emner: ingen toning, så de to paneler ikke ligger halvgennemsigtige oven i hinanden
			nav.classList.add('is-switching');
			clearTimeout(swT);
			swT = setTimeout(function () { nav.classList.remove('is-switching'); }, 220);
		}
		if (open) items.forEach(function (o) { if (o !== item) setOpen(o, false); });
		item.classList.toggle('is-open', open);
		var link = item.querySelector('.ma-nav__link');
		if (link) link.setAttribute('aria-expanded', open ? 'true' : 'false');
	}
	items.forEach(function (item) {
		var timer;
		var link = item.querySelector('.ma-nav__link');
		item.addEventListener('mouseenter', function () { clearTimeout(timer); timer = setTimeout(function () { setOpen(item, true); }, 70); });
		item.addEventListener('mouseleave', function () { clearTimeout(timer); timer = setTimeout(function () { setOpen(item, false); }, 140); });
		item.addEventListener('focusin', function () { clearTimeout(timer); setOpen(item, true); });
		item.addEventListener('focusout', function (e) { if (!item.contains(e.relatedTarget)) setOpen(item, false); });
		if (link) link.addEventListener('click', function (e) {
			if (lastPointer !== 'mouse' && !item.classList.contains('is-open')) { e.preventDefault(); setOpen(item, true); }
			else if (lastPointer === 'mouse' || item.classList.contains('is-open')) setOpen(item, false);
		});
	});
	document.addEventListener('click', function (e) { items.forEach(function (it) { if (!it.contains(e.target)) setOpen(it, false); }); });
	document.addEventListener('keydown', function (e) {
		if (e.key !== 'Escape') return;
		items.forEach(function (it) {
			if (!it.classList.contains('is-open')) return;
			setOpen(it, false);
			var l = it.querySelector('.ma-nav__link');
			if (it.contains(document.activeElement) && l) { l.focus(); setOpen(it, false); }
		});
	});

	// Søg i kategorier og guides: filtrerer den inline JSON-liste (titel, kort navn, emne, adresse). y = 'c' er en kategori.
	var dataEl = document.getElementById('ma-guides-data');
	var guides = [];
	try { guides = dataEl ? JSON.parse(dataEl.textContent) : []; } catch (err) { guides = []; }
	var norm = function (s) { return String(s || '').toLowerCase().normalize('NFD').replace(/[̀-̂̄-̉̋-ͯ]/g, ''); };
	guides.forEach(function (g) { g.hay = norm(g.t + ' ' + (g.x || '') + ' ' + g.s + ' ' + g.e + ' ' + g.k); g.sn = norm(g.s); });
	function find(q) {
		q = norm(q).trim();
		if (!q) return guides.filter(function (g) { return g.y !== 'c'; }).slice(0, 6);
		var words = q.split(/\s+/);
		return guides.map(function (g) {
			if (!words.every(function (w) { return g.hay.indexOf(w) > -1; })) return null;
			return { g: g, score: (g.sn.indexOf(q) === 0 ? 0 : (g.sn.indexOf(q) > -1 ? 2 : 4)) + (g.y === 'c' ? 0 : 1) };
		}).filter(Boolean).sort(function (a, b) { return a.score - b.score; }).slice(0, 10).map(function (x) { return x.g; });
	}
	function esc(s) { return String(s).replace(/[&<>"]/g, function (c) { return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;' }[c]; }); }
	var uid = 0;
	function bindSearch(input) {
		var list = document.getElementById(input.getAttribute('data-guide-search'));
		if (!list) return null;
		var active = -1;
		var label = input.closest('.ma-search__box') ? input.closest('.ma-search__box').querySelector('[data-search-label]') : null;
		function mark() {
			var opts = list.querySelectorAll('[role="option"]');
			opts.forEach(function (o, i) { o.setAttribute('aria-selected', i === active ? 'true' : 'false'); o.classList.toggle('is-active', i === active); });
			if (active > -1 && opts[active]) { input.setAttribute('aria-activedescendant', opts[active].id); opts[active].scrollIntoView({ block: 'nearest' }); }
			else input.removeAttribute('aria-activedescendant');
		}
		function render() {
			var q = input.value;
			var res = find(q);
			active = -1;
			if (label) label.textContent = q.trim() ? (res.length ? res.length + (res.length === 1 ? ' resultat' : ' resultater') : 'Ingen resultater') : 'Nyeste guides';
			list.innerHTML = res.length ? res.map(function (g) {
				return '<li role="option" id="mas-' + (++uid) + '" aria-selected="false"><a href="' + esc(g.u) + '" tabindex="-1">'
					+ '<span class="ma-thumb ma-thumb--l">' + (g.i ? '<img src="' + esc(g.i) + '" alt="" width="52" height="52">' : '') + '</span>'
					+ '<span class="ma-res__txt"><small>' + (g.y === 'c' ? 'Shop · ' + esc(g.x || 'Kategori') + ' · ' + Number(g.n || 0).toLocaleString('da-DK') + ' produkter' : 'Guide · ' + esc(g.e) + ' · Reklamelinks') + '</small><b>' + esc(g.t) + '</b></span></a></li>';
			}).join('') : '<li class="ma-res__empty">Intet matcher «' + esc(q) + '». Prøv fx serum, hår eller parfume.</li>';
			list.dispatchEvent(new CustomEvent('ma:render', { detail: { q: q } }));
		}
		input.addEventListener('input', render);
		input.addEventListener('keydown', function (e) {
			var opts = list.querySelectorAll('[role="option"]');
			if (e.key === 'ArrowDown' && opts.length) { e.preventDefault(); active = (active + 1) % opts.length; mark(); }
			else if (e.key === 'ArrowUp' && opts.length) { e.preventDefault(); active = active <= 0 ? opts.length - 1 : active - 1; mark(); }
			else if (e.key === 'Enter') {
				var pick = opts[active > -1 ? active : 0];
				if (pick) { e.preventDefault(); window.location.href = pick.querySelector('a').href; }
			}
		});
		return render;
	}
	var overlay = document.getElementById('ma-search');
	var opener = null;
	if (overlay) {
		var oInput = overlay.querySelector('input');
		var oRender = bindSearch(oInput);
		var openSearch = function (btn) {
			opener = btn;
			overlay.hidden = false;
			document.documentElement.classList.add('ma-search-open');
			if (oRender) oRender();
			requestAnimationFrame(function () { overlay.classList.add('is-open'); oInput.focus(); });
		};
		var closeSearchBox = function () {
			overlay.classList.remove('is-open');
			document.documentElement.classList.remove('ma-search-open');
			setTimeout(function () { if (!overlay.classList.contains('is-open')) overlay.hidden = true; }, reduce ? 0 : 180);
			if (opener) opener.focus();
		};
		document.querySelectorAll('[data-search-open]').forEach(function (b) { b.addEventListener('click', function () { openSearch(b); }); });
		overlay.querySelectorAll('[data-search-close]').forEach(function (b) { b.addEventListener('click', closeSearchBox); });
		overlay.addEventListener('keydown', function (e) {
			if (e.key === 'Escape') { e.preventDefault(); closeSearchBox(); }
			if (e.key === 'Tab') { // fokus bliver i dialogen
				var f = overlay.querySelectorAll('input, button');
				if (e.shiftKey && document.activeElement === f[0]) { e.preventDefault(); f[f.length - 1].focus(); }
				else if (!e.shiftKey && document.activeElement === f[f.length - 1]) { e.preventDefault(); f[0].focus(); }
			}
		});
		document.addEventListener('keydown', function (e) {
			// "/" åbner søgningen (ikke når man skriver i et felt)
			if (e.key === '/' && overlay.hidden && !/input|textarea|select/i.test((document.activeElement || {}).tagName || '')) { e.preventDefault(); openSearch(document.querySelector('[data-search-open]')); }
		});
	}
	// Søgefeltet i mobilmenuen: resultaterne erstatter emnekortene, mens der står noget i feltet.
	var drInput = document.querySelector('.ma-dr [data-guide-search]');
	if (drInput) {
		var drRender = bindSearch(drInput);
		var drList = document.getElementById(drInput.getAttribute('data-guide-search'));
		var drTopics = document.querySelector('[data-dr-topics]');
		drList.addEventListener('ma:render', function (e) {
			var on = e.detail.q.trim() !== '';
			drList.hidden = !on;
			drInput.setAttribute('aria-expanded', on ? 'true' : 'false');
			if (drTopics) drTopics.hidden = on;
		});
		if (drRender) drInput.addEventListener('focus', function () { if (drInput.value) drRender(); });
	}

	// Faner med scene-kort. Desktop: crossfade. Mobil: kortene ligger side om side (scroll-snap), og fanerne følger med.
	document.querySelectorAll('[data-tabs]').forEach(function (bar) {
		var tabs = Array.prototype.slice.call(bar.querySelectorAll('[role="tab"]'));
		var scenes = document.querySelector('[data-scenes="' + bar.getAttribute('data-tabs') + '"]');
		if (!scenes) return;
		var panels = tabs.map(function (t) { return document.getElementById(t.getAttribute('aria-controls')); });
		var cur = 0;
		function centerTab(t) {
			var left = t.offsetLeft - (bar.clientWidth - t.offsetWidth) / 2;
			bar.scrollTo({ left: Math.max(0, left), behavior: reduce ? 'auto' : 'smooth' });
		}
		function select(i, opts) {
			opts = opts || {};
			if (i < 0 || i >= tabs.length) return;
			cur = i;
			tabs.forEach(function (t, k) {
				t.setAttribute('aria-selected', k === i ? 'true' : 'false');
				t.tabIndex = k === i ? 0 : -1;
				panels[k].classList.toggle('is-active', k === i);
			});
			if (opts.focus) tabs[i].focus({ preventScroll: true });
			centerTab(tabs[i]);
			if (narrow.matches && !opts.fromScroll) scenes.scrollTo({ left: panels[i].offsetLeft - scenes.offsetLeft - parseFloat(getComputedStyle(scenes).paddingLeft || 0), behavior: reduce ? 'auto' : 'smooth' });
		}
		tabs.forEach(function (t, k) { t.addEventListener('click', function () { select(k); }); });
		bar.addEventListener('keydown', function (e) {
			var map = { ArrowRight: cur + 1, ArrowLeft: cur - 1, Home: 0, End: tabs.length - 1 };
			if (!(e.key in map)) return;
			e.preventDefault();
			var n = map[e.key];
			if (n < 0) n = tabs.length - 1;
			if (n >= tabs.length) n = 0;
			select(n, { focus: true });
		});
		var tick = false;
		scenes.addEventListener('scroll', function () {
			if (!narrow.matches || tick) return;
			tick = true;
			requestAnimationFrame(function () {
				tick = false;
				var w = panels[0].getBoundingClientRect().width || 1;
				var i = Math.round(scenes.scrollLeft / (w + 12));
				if (i !== cur) select(Math.max(0, Math.min(tabs.length - 1, i)), { fromScroll: true });
			});
		}, { passive: true });
	});

	// Sektioner glider 12 px op og toner ind, når de kommer i syne (ikke ved reduceret bevægelse).
	var rev = document.querySelectorAll('.ma-reveal');
	if (rev.length && !reduce && 'IntersectionObserver' in window) {
		var io = new IntersectionObserver(function (entries) {
			entries.forEach(function (en) { if (en.isIntersecting) { en.target.classList.add('is-in'); io.unobserve(en.target); } });
		}, { rootMargin: '0px 0px -8% 0px' });
		rev.forEach(function (el) {
			if (el.getBoundingClientRect().top < window.innerHeight) el.classList.add('is-in');
			else { el.classList.add('is-waiting'); io.observe(el); }
		});
	}
})();
