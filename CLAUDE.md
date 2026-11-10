# Myappeal – projektnoter til Claude

Myappeal (myappeal.dk) er en affiliate-side, der ligner en webshop. Den samler skønhed og personlig pleje **til kvinder** – hudpleje, makeup, parfume, hårpleje, hårstyling-apparater, hårfjerning, tandpleje, negle, solcreme og kropspleje – fra de danske shops, vi samarbejder med, via Partner-ads-produktfeeds. Man køber ikke på siden: "Gå til butik" sender brugeren videre til shoppen via et affiliate-link.

Ejer: Frederik Baastrup (Mondae). Al tekst på siden er på dansk.

**Samme kodebase som Kitzhen, Fitbase, Pizzalicious, Outdoorland og Koffee.** Myappeal startede som en kopi af Koffee 9. nov. 2026. Kodenavnene er bevidst de samme: mappenavne `playform`/`playform-feeds`, namespace `Playform\Feeds`, funktioner `playform_*`, metafelter `_pf_*`, shortcodes `[playform_produkter]` og `[fitbase_…]`. Så kan rettelser flyttes mellem sitesne. Omdøb dem ikke.

Alt, der er særligt for nichen, ligger i `wp-content/plugins/playform-feeds/src/Config.php`: navn og kontaktoplysninger (`site()`), shops, kategorier, underkategorier, udelukkelser, mærker (`brand_categories()`), prisintervaller. Temaet læser navn, domæne m.m. via `playform_site()`. Skriv aldrig "Myappeal" eller "myappeal.dk" direkte i en skabelon.

## Status (9. nov. 2026)

Kodebasen er klar og ligger i github.com/frederik-baastrup/myappeal (9. nov. 2026). SiteGround-sitet, secrets og variablerne SITE_DIR/SITE_URL mangler, så udrulningen springes over indtil da. Ejeren sætter op senere. Skønhedsprogrammer godkendt og tilføjet 10. nov. 2026: BilligParfume.dk, Well.dk, Helsebixen.dk, Med24, Glow Studio, SkySkin, Beova.dk (forslag til flere står i Claudes noter fra 9. nov. 2026).

## Opbygning (det, der er særligt for Myappeal)

- `Config.php`
  - Shops (partnerid 14854): Proshop.dk og HvidevareShoppen.dk (godkendt via søstersitesne; kun skønhedskategorierne via `category_map`). Tilføjet 10. nov. 2026: BilligParfume.dk, Well.dk, Helsebixen.dk, Med24, Glow Studio, SkySkin og Beova.dk. Brede butikker (Well, Helsebixen, Med24 – helse, mad, medicin, mor & barn, kæledyr, sex) og SkySkin (også massage, baby, vandflasker) får kun deres pleje- og skønhedskategorier; herrekategorier (BilligParfume: herredufte, herredeo, barbering, skæg; Well/Helsebixen "til ham"/"til mænd") er 'exclude'. Testet på feedsne 10. nov. 2026 (på lager i kategorierne): BilligParfume ca. 5.000, Well 8.300, Helsebixen 8.300, Med24 12.500, Glow Studio 75, SkySkin 110, Beova 20.
  - `category_map` (kun i Myappeals `Classifier`): `'?<slug>'` (9. nov. 2026) = vores regler placerer varen; kan de ikke, lander den i `<slug>`. `'?'` = kun vores regler. `'!<slug>'` (10. nov. 2026) = butikkens kategori er sikker: varen lander i `<slug>` (udelukkelserne gælder stadig, og vores regler må kun flytte apparater, `appliance_categories()`) – bruges til hår- og makeupkategorier, hvor hårmasker/-serum ellers endte i hudpleje. `'map_parents' => true` (Well, Helsebixen): ukendte stier slår nærmeste forælder op ("A > B > C" → "A > B" → "A"). `'*'` = standard for kategorier, der ikke er nævnt (Glow Studio, hvis kategorier er tag-lister, der alle nævner "gavekort"). Kategorien `''` (varer uden kategori) hos Well/Helsebixen er med, men ikke parfume (kønnet kan ikke ses).
  - Udelukkelserne testes på navnet og på mærke + navn, når navnet ikke nævner mærket (Beova: "Eros Eau De Toilette" fra Versace). `exclude()` har en liste over herredufte uden herre-ord i navnet (Bottled, Sauvage, Legend …) og herremærker (American Crew, Proraso, Reuzel …). Parfume fra kategorier uden køn (Med24, Helsebixen, Well "Dufte", Proshop) afhænger af den liste – tjek nye herredufte efter import.
  - `skip_uncategorized()` = true.
  - Kategorier (rækkefølgen betyder noget – apparater før pleje, tandpleje før barbering, makeup og solcreme før hud-/kropspleje, hår- og kropspleje før hudpleje): `haarstyling`, `haarfjerning`, `tandpleje`, `negle`, `parfume`, `makeup`, `solcreme`, `haarpleje`, `kropspleje`, `hudpleje` – med mange underkategorier.
  - Udelukket: kosttilskud, medicinsk udstyr (blodtryk, termometre …), smykker/organizere, dyreprodukter, opladere/kabler, havemaskiner.
  - Testet på Proshop- og HvidevareShoppen-feedsne 9. nov. 2026: ca. 12.700 produkter (parfume 3.500, hudpleje 2.700, makeup 2.650, hårpleje 1.200, kropspleje 900, barbering 600, solcreme 450, tandpleje 320, negle 180, hårstyling 110, hårfjerning 70).
  - `dev/test-classifier.php` tester reglerne uden WordPress.
- **Kun til kvinder** (ejeren 10. nov. 2026): ingen barbering, herreparfume eller hudpleje til mænd. `Config::exclude()` holder herreprodukter ude (for men, homme, herre, skæg, aftershave, barbermaskine …); Made4men er fjernet.
- `inc/navigation.php` – topmenuen med 7 punkter: Hudpleje (+ Solcreme), Makeup (+ Negle), Parfume, Hårpleje, Hårstyling, Kropspleje (+ Hårfjerning), Tandpleje.
- `front-page.php` – kategorikort (hudpleje stort, hårstyling, parfume, makeup) og sektioner (hårstyling, dame-/herreparfume, eltandbørster, serum).
- `content/category-texts.php`, `content/method.php`, `content/campaign-seo.php`, `inc/campaigns.php` – tekster skrevet til skønhed. Ingen sundhedsløfter.
- `content/product-texts.php` og `content/best/` er tomme.
- Accent `#E0047E` (logoets pink #FD0D9D gjort en anelse dybere, så hvid tekst kan læses) med hvid tekst. Logo: `assets/img/logo.svg` (ejerens logo 9. nov. 2026: "my" sort håndskrift, "appeal" pink #FD0D9D, ca. 4,4:1), `logo-white.svg` (hvidt "my"), `favicon.svg` og PNG'erne (hvidt "m" på pink).
- Kategoribilleder fra Pexels (fri licens): haarstyling 973406, haarfjerning 5240777, tandpleje 3654597, barbering 7320168, negle 5238012, parfume 16266287, makeup 457704, solcreme 5202453, haarpleje 7428102, kropspleje 7607303, hudpleje 17891765.
- **Gamle artikler** (`playform_import_legacy_posts()` i `inc/setup.php`): det gamle myappeal.dk er online, så importen henter ALLE indlæg fra dets REST API side for side (samme adresse, titel, tekst, links, dato, udvalgt billede og billeder i teksten), så længe sitet ikke selv ligger på myappeal.dk. **Alle artikler med links, der ikke er affiliate-links, er solgte** (ejeren 9. nov. 2026) – importen mærker dem "Annonce" (`_pf_sponsored`), og tekst og links må aldrig ændres. **Solgte artikler over 3 år gamle flyttes ikke** (ejerens valg) og svarer 410. `content/legacy-posts.php` kan styre enkelte artikler ('hidden', 'sponsored', 'skip', 'keep'). Rapport i option `playform_legacy_report`. Gamle købsguides skal derefter skrives om som `content/best/<slug>.php` på samme adresse.
- Søgemaskiner er slået fra på det midlertidige domæne (`playform_launch()`) og slås til, når `playform_move_domain()` flytter sitet til myappeal.dk.

## Vigtige regler

Samme som Kitzhen og Fitbase: butikkernes egne tilbud (højst 14 dage), AI må aldrig opfinde fakta, affiliate-links med `rel="sponsored nofollow"` gennem `playform_aff_url()`, ingen produkter uden billede, ingen tredjepartskald fra den offentlige side, redaktørens rettelser vinder, guides påstår aldrig egen test. Se Kitzhens CLAUDE.md for detaljer om klasserne.

Tekster: skriv aldrig, at vi dækker alle danske butikker – kun "fra de butikker, vi samarbejder med". Ingen duplicate content med søstersitesne: samme mening, andre ord. Mærkenavne med stort begyndelsesbogstav (medmindre mærket selv skriver sig anderledes).

## Udrulning

Hvert push til `main` udrulles via GitHub Actions (FTPS) til SiteGround, når variablerne `SITE_DIR` (fx `frederikb14.sg-host.com/public_html`) og `SITE_URL` er sat (eller standardværdierne i `deploy.yml` er udfyldt). Kræver secrets `FTP_SERVER`, `FTP_USERNAME`, `FTP_PASSWORD`. Mangler noget, springes udrulningen over. Når domænet skiftes til myappeal.dk i SiteGround, finder udrulningen selv den nye mappe og FTP-kontoen (`@myappeal.dk`).

Cronjobs på SiteGround (som de andre sites, ret mappen):

```
30 5,17 * * *  cd /home/customer/www/<mappe>/public_html && wp playform import --quiet
*/5 * * * *    cd /home/customer/www/<mappe>/public_html && wp cron event run --due-now --quiet
```

## Statistik

Matomo via WordPress-pluginnet "Matomo Analytics", hvis det installeres – `inc/consent.php` er klar (cookiefri indtil samtykke).

**SEO i købsguides (som de andre sites):** folk søger "bedste <søgeord>" og "<søgeord> test". `playform_guide_keyword()` giver titlen "Bedste <søgeord>: …", sidetitlen "Bedste <søgeord> <år> → Se vores top N" og nederst et afsnit (`playform_guide_test_note()`), der ærligt siger, at det ikke er en test. Overskrifter har aldrig ordet "test" (efter Forbrugerombudsmandens sag mod Obsidian Media) – kun brødteksten i afsnittet må nævne "<søgeord> test". Artikler med reklamelinks mærkes "Reklamelinks"/"Annonce" i alle lister og i metabeskrivelsen (`playform_post_ad_label()`), og hvert produktvalg siger "ikke testet". Aldrig "testvinder", "bedst i test" som påstand eller lignende.
