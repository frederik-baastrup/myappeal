# Uafhængig art director-review 26. nov. 2026 – karakter 6,5/10
(Fuld liste fra review-agenten. Ret alt, der holder. Kun Myappeal.)

KRITISK
1. Forside/Hår "Hårfjerner til ansigtet": nr. 1 (Philips Lumea IPL 9000) "Ikke på lager" med tom billedboks. Valg uden billede/lager må aldrig stå i top 3/nr. 1-hylde – ryk næste op; skjul guiden fra forsiden ved <3 brugbare valg. Guiden har kun 2 valg.
2. "Hårfjerner til ansigtet" ligger under Hår → flyt til Hudpleje (ret emnereglen i playform_guide_emner()).
3. Sorte produktbilleder (Remington airstyler, nr. 1-hylden, scene-kort, guide): produktfotos object-fit:contain, padding ~12%, background #fff i en hvid "plade" (også på blush). Overvej at vælge andet nr. 1 til hylden, hvis billedet er mørkt.
4. Guidesidens forfatterboks: "8 danske webshops" (forbudt), "40 guides skrevet" (topbar siger 31), "1.224 produkter i oversigten" (findes ikke), "…pris, produktdata og tilbud". "Sådan har vi valgt" siger "som butikkerne oplyser dem". Brug samme cachede guideantal, fjern produkter/webshops-tal eller skriv "8 butikker, vi samarbejder med", skriv "ud fra butikkernes produktdata".

VIGTIGT
5. Guidesiden har ikke fået redesignet: grå kassestreg under header, beige "Sådan har vi valgt"-boks, rød "Tilbud -20 %"-pille og rød pris, tre mærker (ANNONCE/Reklamelinks/Indeholder affiliate-links), tomt 320 px felt ved siden af 720 px kolonne. Løsning: hero med kicker "HÅR · TOP 5", h1 clamp(36px,4.5vw,60px), billede radius 20; pink pris, ingen røde badges; ét mærke "Reklamelinks"; sticky indholdsfortegnelse i højre kolonne eller centreret 760 px; blush i stedet for beige. (Kun Myappeal – via myappeal-editorial.css og evt. betingelser i skabelonen.)
6. Sammenligningstabel: "Fakta" er "–" i alle rækker og "Grundlag: Vores vurdering" ×5 → fjern begge kolonner. Mobil: rækker som kort under 640 px.
7. Feed-støj i navne "(1 stk)", "- 1 stk.", "1 stk." → fjern ved visning: /\s*[-–(]?\s*1\s*stk\.?\)?$/i.
8. Fanerækker på desktop klippes hårdt (Hår 1403 px, Hudpleje 1485 px i 1232 px) → mask-image fade + pil, eller flex-wrap ≥1024 px.
9. Nr. 1-hylden: 4. kort skæres uden luft → fuld bleed + scroll-padding-inline:max(24px,(100vw-1280px)/2). Kicker "NR. 1 · 12 GUIDES" → "NR. 1 · 12 UDVALGTE".
10. Samme billede går igen: airstyler i Udvalgt + Hår-scene + mega-menu; vandflosser = eltandbørste-foto → eget Pexels-foto til vandflosser (assets/img/articles/bedste-vandflosser.jpg + ret guidens billede); Udvalgt skal springe guides over, der er første fane i en sektion.
11. Ensformige titler "Bedste X: Vores bud på de 5 bedste X" på kort/lister/søg → kort navn (playform_guide_short()) + undertitel; behold fuld titel som h1/<title>.
12. Mega-menu: skift mellem emner crossfader to halvgennemsigtige paneler → instant skift når et panel er åbent.
13. Scene-kort desktop: 4:5-billede højere end højre kolonne → aspect-ratio 1/1 eller stretch+cover; produktfotos 72 px med padding 6px.
14. Scene-kort mobil: produktnavne afkortes "Nuxe Prodigieux BB…" → pris under navn, 2 linjer uden ellipse.
15. Hero desktop: h1 linje 2–3 i grønliggrå #5E5E59 → aubergine #2A0F1F eller #111 med opacity; stærkere gradient linear-gradient(90deg,#fff 0 38%,rgba(255,255,255,.85) 52%,transparent 70%).
16. Parfume har 1 guide → slå sammen med Makeup ("Makeup & parfume") indtil flere guides, eller kompakt visning.
17. Tap-targets mobil (Reklamelinks 14 px, footer-links 20 px, "Alle 31 guides" 23 px) → min-height 44px inline-flex.
18. Mobilmenu: første tryk på burger åbnede ikke (tjek – evt. topbar-rotation flytter layout); Makeup-fotokort beskærer ansigt → object-position center 25%; emnelag mangler "Alle guides om hår"-knap.

FINPUDS
19. Mobilforside 13.566 px → sektionspolstring 56 px, kun 3 faner + "Flere ▾" pr. emne på mobil.
20. "Udvalgt lige nu" mobil: hvid tekst på lyst foto → linear-gradient(180deg,transparent 30%,rgba(20,8,15,.78) 100%).
21. Meta-chips i guide (mobil) klippes → flex-wrap.
22. "ANNONCE" over valgkort ligger på kortkanten → top:-10px hvid baggrund padding 0 8px eller inde i kortet.
23. Aubergine-bånd og sort footer #111 → footer i #2A0F1F.
24. Øje-ikon ved "Ingen egen afprøvning" → info- eller hjerte-ikon.
25. "Flere nye guides" viser 24.–25. nov. på alle → vis emne i stedet for dato.
26. SEO-teksten venstrestillet med tom højre halvdel → centrér max-width 68ch.
27. Guidens topmeta "vi har ikke selv testet dem" → "vi har ikke selv afprøvet dem" (kun Myappeal). Også "ikke testet" ved valg → "ikke afprøvet" på Myappeal.

TOP 3: (1) ryd op i data på forsiden, (2) guidesiden i samme magasin-design, (3) stram scene-kort og faner.
