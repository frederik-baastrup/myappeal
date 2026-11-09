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

return [];
