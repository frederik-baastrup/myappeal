# Art director-brief: Myappeal som redaktionelt købsguide-magasin (26. nov. 2026)

Du er senior webdesigner og art director med baggrund i editorial design (tænk Vogue.dk-beauty, Goop, Glossier, The Strategist og Wirecutter). Du bygger direkte i WordPress-temaet – ikke mockups. Resultatet skal se ud som et lækkert, moderne skønhedsmagasin, der har specialiseret sig i købsguides. Hverken som en webshop eller som en standardblog.

## Kontekst (læs først)
- Repo: /home/claude/myappeal. Læs CLAUDE.md, især "Kun købsguides" og "Vigtige regler".
- Myappeal er nu kun købsguides. Butikssider, filtre, søgning og tilbud findes ikke længere og sendes videre (`inc/guide-only.php`).
- Temaet: `wp-content/themes/playform/`. Filer i spil: `header.php`, `template-parts/mobile-menu.php`, `front-page.php`, `inc/guide-only.php` (emner `playform_guide_emner()`, `playform_guide_topic()`, `playform_guides_by_topic()`, menu `playform_guide_menu()`), `inc/best.php` (guidedata og valg), `assets/css/main.css`, `assets/js/main.js`.
- Guidedata: `content/best/<slug>.php` returnerer arrays med `picks` (ean, price, name, role …). Brug den eksisterende kode i `inc/best.php` til at slå et valg op som WooCommerce-produkt (produktbillede, laveste pris). Byg ikke en ny opslagsmetode.
- Kodebasen deles med 5 søstersites. Ændringerne skal kun ske på Myappeal. Skriv ny CSS i en ny fil `assets/css/myappeal-editorial.css`, der kun indlæses her, eller nederst i main.css med en tydelig sektion. Rør ikke klassenavne, som søstersitesne bruger.
- Accent: `#E0047E` (hvid tekst på), logo-pink `#FD0D9D`. Skrift: BDO Grotesk (ligger lokalt). Hvid baggrund, sort tekst, afrundede hjørner, tynde linjeikoner.

## Hårde regler
- **CPU:** ingen nye serverkald eller forespørgsler pr. besøg ud over det, forsiden allerede laver. Faner, kort og skift kører i ren JS/CSS på allerede renderet HTML. Byg dyre data (valg + produktbilleder) én gang og cache dem i en transient på 12 timer (`playform_front_guides_v1`). Tøm cachen ved udrulning/import på samme måde som de eksisterende forsidecaches.
- **Ingen tredjepartskald** fra siden: ingen eksterne skrifter, scripts eller CDN'er.
- **Tekst:** dansk, aldrig test-påstande og aldrig ordet "test" (heller ikke "oftest"/"lettest"). Aldrig "ifølge/oplyser/perfekt/markedets bedste", aldrig "danske shops/webshops". Skriv "fra de butikker, vi samarbejder med". Skriv tydeligt, at vi ikke selv har afprøvet produkterne. Lister og kort med guides bærer mærket "Reklamelinks". Mærkenavne med stort begyndelsesbogstav. Ingen sundhedsløfter.
- **Billeder:** hero og sektionsbilleder fra Pexels (fri licens), hentet med curl fra `https://images.pexels.com/photos/<id>/pexels-photo-<id>.jpeg?auto=compress&w=2400`, gemt lokalt i `assets/img/` (komprimér: 2400 px hero, under ~350 KB, plus en 1200 px-version til mobil via `srcset`). Kig på hvert billede med Read, før du bruger det. Til guidekort bruges guidens artikelbillede. Produktbilleder må kun bruges som små produktfotos af *valgene* (nr. 1-kort og top 3-rækker), aldrig som hero eller stemningsbillede. Ingen pixelerede billeder.
- **Tilgængelighed:** faner med rigtig `role="tablist"`/`aria-selected` og tastaturstyring. `prefers-reduced-motion` slår animationer fra. Kontrast AA. Alt fungerer uden JS: uden JS vises alle kort som en almindelig liste.
- **Performance:** hero-billedet får `fetchpriority="high"`, alt andet `loading="lazy"`. Ingen layout-skift (faste aspect-ratios).

## Visuel retning ("visuelt løft")
- **Stemning:** lys, luftig, feminin uden at være sukkersød, redaktionel. Meget hvidt, store billeder, stor typografi, og pink som accent.
- **Typografi:** stor, stram display-overskrift (BDO Grotesk, vægt 600–700, letter-spacing -0.03em, clamp(40px, 6vw, 84px) på hero). Små versaler som "kicker" over sektioner (fx `HÅR · 10 GUIDES`, 12px, letter-spacing .12em). Brødtekst 17–18px, line-height 1.6.
- **Farver:** sort #111 og hvid. Pink #E0047E til knapper, aktive faner og tal. En lys blush-tone `#FDF1F7` som baggrund i hver anden sektion. En meget mørk aubergine (`#2A0F1F`) til ét kontrastbånd (fx "Sådan vælger vi" eller sidefoden).
- **Former:** kort med radius 20–24px, bløde skygger (0 1px 2px rgba(0,0,0,.04), 0 12px 32px rgba(0,0,0,.06)), billeder med radius 16–20px og hover-zoom på 1.04 (transition .5s). Piller/faner som fuldt runde chips.
- **Rytme:** sektioner med 96–128px luft på desktop og 56–72px på mobil. Max-bredde 1280px. Asymmetriske grids, ikke kun ens kort i 3 kolonner.

## Hvad der skal bygges

### 1. Topbar (header.php, kun Myappeal)
- Erstat webshop-USP'erne ("Danske shops", "Aktuelle tilbud", "Køb direkte") med guide-løfter:
  `[bog-ikon] <b>{antal} købsguides</b> i skønhed og pleje` · `[ur-ikon] <b>Priser opdateret</b> hver dag` · `[info-ikon] <b>Ingen egen afprøvning</b> – valg ud fra produktdata`.
- Antallet beregnes (antal udgivne guides, cachet).
- Annonce-mærket til højre bevares.
- På mobil viser den roterende linje de samme tre.
- Topbaren får en blush-baggrund.

### 2. Menu (desktop)
- Logo til venstre, emner i midten (Makeup, Parfume, Hår, Krop & tænder, Hudpleje), til højre en sort pilleknap **"Alle købsguides"** samt en lille søgeknap (forstørrelsesglas).
- **Mega-menu pr. emne** ved hover og fokus (og klik på touch):
  - Venstre kolonne: emnets guides som liste med små runde thumbnails (guidens billede, 40px) og korte titler ("Airstyler", "Glattejern" – brug `playform_guide_short()`).
  - Højre: et stort fremhævet kort med den nyeste guide i emnet (billede, kicker "NYESTE GUIDE", titel, "Se top 5 →").
  - Panelet glider ned med fade (160ms) og lukker ved Esc og ved klik udenfor.
- **Søg i guides:** et overlay med inputfelt, der filtrerer en JSON-liste over guidetitler, emner og slugs. Listen lægges inline i siden (fra cachen), og filtreringen sker i JS uden servernkald. Resultaterne vises som kort, og man kan navigere med piletaster og Enter. Fjern den gamle søgefunktion helt, hvis noget af den stadig findes.
- Fjern "Viden" som topmenupunkt, hvis den kun peger på sider, der viderestilles. Ellers flyttes den ind i sidefoden.

### 3. Mobilmenu (template-parts/mobile-menu.php)
- Skuffen viser emnerne som store fotokort i 2 kolonner: billede (emnets nyeste guidebillede) med mørk gradient, emnenavn og "10 guides".
- Tryk på et emne åbner et lag med emnets guides (thumbnail og kort titel).
- Øverst ligger søgefeltet (samme JS-filter), og nederst knappen "Alle købsguides".

### 4. Forside (front-page.php) – rækkefølge
1. **Hero:** fuldbredde-billede (beauty-flatlay eller produkter på marmor/blød stof, lys stemning – find 3 kandidater på Pexels og vælg det bedste), 70–78vh på desktop og 62vh på mobil, med blød gradient fra venstre.
   - Kicker: `KØBSGUIDES TIL SKØNHED OG PLEJE`.
   - H1: *"Køb klogere. Vi har gjort forarbejdet."* (eller bedre – din vurdering, ingen påstand om test).
   - Underlinje: én sætning om at sammenligne produkter og priser fra de butikker, vi samarbejder med.
   - Emne-chips (hvide piller med antal), der scroller til sektionerne.
   - Lille tillidslinje: "Priser opdateres hver dag · Reklamelinks".
2. **Udvalgt lige nu:** magasin-grid med ét stort kort (2/3 bredde, billede over hele kortet, titel i hvid på gradient) og to stablede mindre kort ved siden af. Vis de tre nyeste guides.
3. **Emnesektioner med skiftende kort** (det vigtigste element), én pr. emne, skiftevis hvid og blush baggrund:
   - Kicker `HÅR · 10 GUIDES` og H2 (fx "Hår").
   - **Fanerække** (scrollbar chips) med de korte guidenavne: Airstyler · Føntørrer · Glattejern …
   - **Scene-kort** til den valgte fane: et stort kort med to kolonner.
     - Venstre: guidens billede (4:5, radius 20).
     - Højre: titel, uddrag og "Vores top 3" som 3 rækker med produktfoto (56px, hvid baggrund, radius 12), rolle ("Bedst samlet"), produktnavn og "fra 1.299 kr". Til sidst CTA-knap i pink: "Se alle 5 valg →".
     - Skift mellem faner med crossfade og let translateY (220ms).
     - På mobil kan man swipe mellem scene-kortene (scroll-snap), og fanerne følger med.
   - Alle scene-kort renderes i HTML. JS skjuler/viser kun.
   - Under scenen: link "Alle guides om hår →", der scroller til et fuldt gitter eller åbner det.
4. **Nr. 1-hylden:** horisontal scroll-snap-række "Vores nr. 1 i hver guide". Kort med produktfoto på blød blush-baggrund, guidens navn som kicker, produktnavn, "fra X kr" og "Se guiden". Maks. 12. Brug kun valg med billede og pris.
5. **Sådan vælger vi:** mørkt aubergine-bånd med tre kolonner (tynde linjeikoner i pink): *Produktdata* · *Priser fra flere butikker* · *Ingen egen afprøvning – vi siger det ærligt*. Plus link til "Sådan tjener vi penge".
6. **Nyeste guides:** en liste med dato og "Reklamelinks", i 2 kolonner.
7. Den eksisterende SEO-tekst nederst bevares, med bedre typografi.

### 5. Detaljer, der løfter
- Små tal i pink: "Top 5", antal guides.
- Hover på kort: billedzoom, pil der glider 4px, skygge der vokser.
- Fokus-ringe i pink.
- Rolige mikroanimationer: sektioner glider 12px op og fader ind (IntersectionObserver). Slås fra ved reduced motion.
- Konsistente ikoner (stroke 1.4, samme sæt som temaet bruger).

## Arbejdsgang
1. Kortlæg filerne og den eksisterende CSS (gcard, tabs, header, mega-menu). Kan du bruge underagenter, så lad én Explore-agent finde de relevante funktioner og CSS-klasser, mens du skaffer billeder.
2. Lav en kort plan (komponenter → filer).
3. Byg i rækkefølgen: data/cache → topbar og menu → mobilmenu → forside → CSS → JS.
4. `php -l` på alle ændrede filer.
5. Kør søstersitesnes kode? Nej – ændringerne må kun gælde Myappeal. Tjek med `git diff --stat`, at du kun har rørt Myappeal-repoet.
6. Commit på dansk og push til main. Vent på udrulningen (`gh run watch`).
7. **Visuel kontrol** på https://myappeal.dk i browserværktøjet, hvis det findes (built-in browser eller Claude in Chrome): screenshots på desktop (1440 px) og mobil (375 px) af hero, mega-menu, søg, en emnesektion med fanebytte, nr. 1-hylden og mobilmenuen. Ret alt, der ser forkert, rodet eller billigt ud, og tag nye screenshots. Gentag, til det holder art director-niveau. Tjek også, at en guide (fx /bedste-airstyler/) stadig ser rigtig ud.
8. Opdater CLAUDE.md (kort afsnit om forsidens og menuens opbygning og transienten).

## Rapport
Kort på dansk: hvad der blev bygget, de valgte Pexels-id'er, hvad du rettede efter den visuelle kontrol, og hvad der evt. kræver ejerens vurdering.

## Uafhængig review (ejerens krav)
Når du er færdig og har udrullet, gennemgår en separat art director-agent, der ikke har set dit arbejde, siden på desktop og mobil. Den vurderer, om det er "virkelig godt": hierarki, typografi, luft, billedvalg, konsistens, mobil, tilgængelighed og regler (ingen test-påstande, Reklamelinks osv.). Du får dens liste og retter alt, der holder. Byg derfor med det niveau for øje fra start.
