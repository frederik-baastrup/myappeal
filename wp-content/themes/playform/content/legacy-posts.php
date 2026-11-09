<?php
/**
 * Artikler fra det gamle myappeal.dk, der flyttes 1:1 (samme adresse, titel, tekst, dato og billede).
 * 'image' = det udvalgte billede (assets/img/legacy/). 'date'/'modified' er dansk tid.
 * 'sponsored' => true: solgt artikel (linkbuilding) – tekst og links må ALDRIG ændres; mærkes "Annonce".
 *   Alle artikler med links, der ikke er affiliate-links, er solgte (ejeren 9. nov. 2026).
 *   Solgte artikler, der er over 3 år gamle, må udelades (ejeren 9. nov. 2026).
 * 'hidden' => true: ligger på sin adresse og i sitemap, men vises ikke i lister, på forsiden eller under "Læs også".
 * Udfyldes, når artiklerne fra det gamle site er hentet. Importen: playform_import_legacy_posts().
 */
defined( 'ABSPATH' ) || exit;

return [
	// Solgt artikel om casino (campobet.dk) – står på sin adresse, men vises ikke i lister.
	'hvordan-mode-og-online-casinoer-krydser-stier-hos-campobet-casino' => [ 'hidden' => true, 'sponsored' => true ],
	// Linker til søstersitet kitzhen.dk – ikke et solgt link.
	'sund-hud-derfor-er-juice-godt-for-huden'                         => [ 'sponsored' => false ],
	// Købsguides fra 2022: et redaktionelt link til matas.dk – ikke solgt.
	'haarfjerner-til-ansigtet'                                        => [ 'sponsored' => false ],
	// Købsguide fra 2022 med et solgt link (moneyland.dk), over 3 år gammel: flyttes med indtil guiden er skrevet om
	// i content/best/ (så må linket gå – solgte artikler over 3 år må fjernes, ejeren 9. nov. 2026).
	'bedste-pigkroellejern'                                           => [ 'keep' => true ],
];
