# Myappeal – projektnoter til Claude

Myappeal (myappeal.dk) er en affiliate-side, der ligner en webshop. Den samler skønhed og personlig pleje – hudpleje, makeup, parfume, hårpleje, hårstyling-apparater, barbering, hårfjerning, tandpleje, negle, solcreme og kropspleje – fra de danske shops, vi samarbejder med, via Partner-ads-produktfeeds. Man køber ikke på siden: "Gå til butik" sender brugeren videre til shoppen via et affiliate-link.

Ejer: Frederik Baastrup (Mondae). Al tekst på siden er på dansk.

**Samme kodebase som Kitzhen, Fitbase, Pizzalicious, Outdoorland og Koffee.** Myappeal startede som en kopi af Koffee 9. nov. 2026. Kodenavnene er bevidst de samme: mappenavne `playform`/`playform-feeds`, namespace `Playform\Feeds`, funktioner `playform_*`, metafelter `_pf_*`, shortcodes `[playform_produkter]` og `[fitbase_…]`. Så kan rettelser flyttes mellem sitesne. Omdøb dem ikke.

Alt, der er særligt for nichen, ligger i `wp-content/plugins/playform-feeds/src/Config.php`: navn og kontaktoplysninger (`site()`), shops, kategorier, underkategorier, udelukkelser, mærker (`brand_categories()`), prisintervaller. Temaet læser navn, domæne m.m. via `playform_site()`. Skriv aldrig "Myappeal" eller "myappeal.dk" direkte i en skabelon.

## Status (9. nov. 2026)

Kodebasen er klar, men sitet er ikke oprettet endnu: intet SiteGround-site, intet GitHub-repo (ingen remote), ingen udrulning. Ejeren sætter op senere og søger skønhedsprogrammerne hos Partner-ads, når shoppen er online (listen med forslag står i Claudes noter fra 9. nov. 2026: brede butikker som Med24, Lusso di Lusso, Staybeautiful; hårstyling som Beauty4Me, Ionic Dry, Probrush, Care Copenhagen; negle, parfume, herrepleje og tandpleje).

## Opbygning (det, der er særligt for Myappeal)

- `Config.php`
  - Shops (partnerid 14854): Proshop.dk og HvidevareShoppen.dk (godkendt via søstersitesne; kun skønhedskategorierne via `category_map`). Godkendt, men uden feed-link endnu (url tom = springes over): BilligParfume.dk, Well.dk, Made4men, Helsebixen.dk – indsæt `&bannerid=…&feedid=…`.
  - `category_map` med `'?<slug>'` (ny 9. nov. 2026, kun i Myappeals `Classifier`): vores regler placerer varen; kan de ikke, lander den i `<slug>` (butikkens kategori er sikker, fx Proshops "Parfume og dufte", hvor navnet ofte kun er mærke og duftnavn). `'?'` = kun vores regler.
  - `skip_uncategorized()` = true.
  - Kategorier (rækkefølgen betyder noget – apparater før pleje, tandpleje før barbering, makeup og solcreme før hud-/kropspleje, hår- og kropspleje før hudpleje): `haarstyling`, `haarfjerning`, `tandpleje`, `barbering`, `negle`, `parfume`, `makeup`, `solcreme`, `haarpleje`, `kropspleje`, `hudpleje` – med mange underkategorier.
  - Udelukket: kosttilskud, medicinsk udstyr (blodtryk, termometre …), smykker/organizere, dyreprodukter, opladere/kabler, havemaskiner.
  - Testet på Proshop- og HvidevareShoppen-feedsne 9. nov. 2026: ca. 12.700 produkter (parfume 3.500, hudpleje 2.700, makeup 2.650, hårpleje 1.200, kropspleje 900, barbering 600, solcreme 450, tandpleje 320, negle 180, hårstyling 110, hårfjerning 70).
  - `dev/test-classifier.php` tester reglerne uden WordPress.
- `inc/navigation.php` – topmenuen med 8 punkter: Hudpleje (+ Solcreme), Makeup (+ Negle), Parfume, Hårpleje, Hårstyling, Barbering, Kropspleje (+ Hårfjerning), Tandpleje.
- `front-page.php` – kategorikort (hudpleje stort, hårstyling, parfume, makeup) og sektioner (hårstyling, dame-/herreparfume, eltandbørster, serum).
- `content/category-texts.php`, `content/method.php`, `content/campaign-seo.php`, `inc/campaigns.php` – tekster skrevet til skønhed. Ingen sundhedsløfter.
- `content/product-texts.php` og `content/best/` er tomme.
- Accent `#E0047E` (logoets pink #FD0D9D gjort en anelse dybere, så hvid tekst kan læses) med hvid tekst. Logoet (`assets/img/logo.svg`, `logo-white.svg`, `favicon.svg`) er et midlertidigt ordmærke i BDO Grotesk ("my" sort, "appeal" pink) – udskift med det rigtige logo, når ejeren sender det.
- Kategoribilleder fra Pexels (fri licens): haarstyling 973406, haarfjerning 5240777, tandpleje 3654597, barbering 7320168, negle 5238012, parfume 16266287, makeup 457704, solcreme 5202453, haarpleje 7428102, kropspleje 7607303, hudpleje 17891765.
- **Gamle artikler** (`playform_import_legacy_posts()` i `inc/setup.php`): det gamle myappeal.dk er online, så importen henter ALLE indlæg fra dets REST API side for side (samme adresse, titel, tekst, links, dato, udvalgt billede og billeder i teksten), så længe sitet ikke selv ligger på myappeal.dk. **Alle artikler med links, der ikke er affiliate-links, er solgte** (ejeren 9. nov. 2026) – importen mærker dem "Annonce" (`_pf_sponsored`), og tekst og links må aldrig ændres. **Solgte artikler over 3 år gamle flyttes ikke** (ejerens valg) og svarer 410. `content/legacy-posts.php` kan styre enkelte artikler ('hidden', 'sponsored', 'skip', 'keep'). Rapport i option `playform_legacy_report`. Gamle købsguides skal derefter skrives om som `content/best/<slug>.php` på samme adresse.
- Søgemaskiner er slået fra på det midlertidige domæne (`playform_launch()`) og slås til, når `playform_move_domain()` flytter sitet til myappeal.dk.

## Vigtige regler

Samme som Kitzhen og Fitbase: butikkernes egne tilbud (højst 14 dage), AI må aldrig opfinde fakta, affiliate-links med `rel="sponsored nofollow"` gennem `playform_aff_url()`, ingen produkter uden billede, ingen tredjepartskald fra den offentlige side, redaktørens rettelser vinder, guides påstår aldrig egen test. Se Kitzhens CLAUDE.md for detaljer om klasserne.

Tekster: skriv aldrig, at vi dækker alle danske butikker – kun "fra de butikker, vi samarbejder med". Ingen duplicate content med søstersitesne: samme mening, andre ord. Mærkenavne med stort begyndelsesbogstav (medmindre mærket selv skriver sig anderledes).

## Udrulning

Hvert push til `main` udrulles via GitHub Actions (FTPS) til SiteGround, når variablerne `SITE_DIR` (fx `frederikbXX.sg-host.com/public_html`) og `SITE_URL` er sat (eller standardværdierne i `deploy.yml` er udfyldt). Kræver secrets `FTP_SERVER`, `FTP_USERNAME`, `FTP_PASSWORD`. Mangler noget, springes udrulningen over. Når domænet skiftes til myappeal.dk i SiteGround, finder udrulningen selv den nye mappe og FTP-kontoen (`@myappeal.dk`).

Cronjobs på SiteGround (som de andre sites, ret mappen):

```
30 5,17 * * *  cd /home/customer/www/<mappe>/public_html && wp playform import --quiet
*/5 * * * *    cd /home/customer/www/<mappe>/public_html && wp cron event run --due-now --quiet
```

## Statistik

Matomo via WordPress-pluginnet "Matomo Analytics", hvis det installeres – `inc/consent.php` er klar (cookiefri indtil samtykke).

**SEO i købsguides (som de andre sites):** folk søger "bedste <søgeord>" og "<søgeord> test". `playform_guide_keyword()` giver titlen "Bedste <søgeord>: …", sidetitlen "Bedste <søgeord> <år> → Se vores top N" og nederst et afsnit (`playform_guide_test_note()`), der ærligt siger, at det ikke er en test. Overskrifter har aldrig ordet "test" (efter Forbrugerombudsmandens sag mod Obsidian Media) – kun brødteksten i afsnittet må nævne "<søgeord> test". Artikler med reklamelinks mærkes "Reklamelinks"/"Annonce" i alle lister og i metabeskrivelsen (`playform_post_ad_label()`), og hvert produktvalg siger "ikke testet". Aldrig "testvinder", "bedst i test" som påstand eller lignende.
