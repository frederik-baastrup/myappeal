<?php
/**
 * Omskrevet fra det gamle myappeal.dk (/bedste-pigkroellejern/, 2022). Ny tekst og nye produkter.
 * Kun 3 modeller: feedsne havde 9. nov. 2026 kun tre jern til tætte spiral-/pigkrøller med EAN på lager.
 * To af dem ligger i Proshops kategori "Kroellejern" – den skal være med i Proshops category_map ('kroellejern' => '?haarstyling').
 * Fakta om produkterne kommer kun fra butikkernes produktdata. Vi har ikke selv afprøvet produkterne.
 */
defined( 'ABSPATH' ) || exit;

return [
	'slug'     => 'bedste-pigkroellejern',
	'date'     => '2022-04-11 10:00:00',
	'keyword'  => 'pigkrøllejern',
	'title'    => 'Pigkrøllejern: Vores bud på de 3 bedste til tætte spiralkrøller',
	'excerpt'  => 'Små, tætte pigkrøller kræver en tynd stang eller et spiraljern. Her er vores bud på de 3 bedste pigkrøllejern fra de butikker, vi samarbejder med.',
	'more_cat' => 'kroellejern',
	'intro'    => <<<'HTML'
<p>Pigkrøller er de små, tætte spiraler, der springer, når du bevæger hovedet. De giver masser af volumen og et legende udtryk, men de er svære at lave med et almindeligt krøllejern. Stangen er simpelthen for tyk, og krøllerne bliver store og løse i stedet for stramme og definerede.</p>
<p>Et pigkrøllejern har en tynd eller særligt formet stang, der gør krøllerne små. Herunder finder du vores bud på de 3 bedste fra de butikker, vi samarbejder med, og nederst får du teknikken, der får spiralerne til at holde.</p>
HTML,
	'picks'    => [
		[
			'ean'     => '3030050153620',
			'price'   => 234,
			'name'    => 'BaByliss Tight Curls 10 mm',
			'role'    => 'Mindste krøller',
			'reviews' => [],
			'verdict' => 'Superslankt krøllejern på 10 mm med ekstra lang kvarts-keramisk stang og 6 digitale varmetrin.',
			'why'     => <<<'HTML'
<p>BaByliss Tight Curls kommer meget tæt på klassiske pigkrøller med et almindeligt krøllejern. Stangen er kun 10 mm, og det giver små, veldefinerede krøller med masser af spring.</p>
<p>Stangen er ekstra lang, så der er plads til hele lokken, også hvis du har langt hår. Du fører håret rundt om stangen, holder det et øjeblik og slipper – så enkelt er det. Den kvarts-keramiske overflade er lavet til en glat finish.</p>
<p>Med 6 digitale varmetrin kan du vælge en lav indstilling til fint hår og gå op, hvis krøllerne ikke vil holde.</p>
HTML,
			'good'    => [ 'Små, tætte pigkrøller', 'Langt hår', 'Masser af spring' ],
			'less'    => [ 'Dig, der vil have løse bølger' ],
		],
		[
			'ean'     => '4008496975716',
			'price'   => 136,
			'name'    => 'Remington Pro Spiral Curl CI5519',
			'role'    => 'Bedst til budgettet',
			'reviews' => [],
			'verdict' => 'Krøllejern med 19 mm tromle, 8 temperaturtrin fra 140 til 210 °C og opvarmning på 30 sekunder.',
			'why'     => <<<'HTML'
<p>Remington Pro Spiral Curl er et prisvenligt sted at starte, hvis du vil have mindre og mere definerede krøller end med et standardjern. Tromlen er på 19 mm, så krøllerne bliver ikke helt så små som med en 10 mm stang, men tydeligt mere fjedrende end med et tykt jern.</p>
<p>Den keramiske titaniumbelægning og den antistatiske, turmalin-ioniske overflade skal få håret til at glide let. Du har 8 temperaturtrin fra 140 til 210 °C, og jernet er varmt på 30 sekunder.</p>
<p>En klar-indikator viser, når du kan gå i gang, så du ikke står og gætter.</p>
HTML,
			'good'    => [ 'Første jern til spiralkrøller', 'Mellemstore, fjedrende krøller', 'Lille budget' ],
			'less'    => [ 'Dig, der vil have de allermindste pigkrøller' ],
		],
		[
			'ean'     => '5708642058483',
			'price'   => 349,
			'name'    => 'OBH Nordica Artist Curl Spiral',
			'role'    => 'Til snoede spiraler',
			'reviews' => [],
			'verdict' => 'Slankt, rektangulært krøllejern med keramisk belægning, der giver stramme, snoede krøller og fylde.',
			'why'     => <<<'HTML'
<p>OBH Nordica Artist Curl Spiral skiller sig ud med sin form. Stangen er slank og rektangulær i stedet for rund, og det giver stramme, snoede krøller med et lidt andet udtryk end de klassisk runde.</p>
<p>Jernet booster håret med masser af fylde. Du kan beholde de definerede spiraler, eller du kan børste krøllerne igennem for et blødt, voluminøst afro-look. På den måde får du to frisurer ud af ét jern.</p>
<p>Den keramiske belægning er beregnet til at behandle håret blidt. Er du på udkig efter noget andet end de typiske runde krøller, er det her et spændende bud.</p>
HTML,
			'good'    => [ 'Snoede spiraler', 'Masser af volumen', 'Dig, der vil variere looket' ],
			'less'    => [ 'Dig, der vil have helt runde krøller' ],
		],
	],
	'guide'    => <<<'HTML'
<h2>Sådan vælger du det rigtige pigkrøllejern</h2>
<p>Stangens tykkelse og form afgør, hvor små og tætte krøllerne bliver. Find flere modeller under <a href="/haarstyling/kroellejern/">krøllejern</a> fra de butikker, vi samarbejder med.</p>
<h3>Tykkelse: jo tyndere, jo tættere</h3>
<p>Til egentlige pigkrøller skal stangen være tynd – omkring 10 mm giver de små, springende spiraler. Mellem 16 og 19 mm får du stadig definerede krøller, men de bliver lidt større og blødere. Alt over cirka 25 mm giver almindelige krøller og bølger. Vil du hellere have store lokker, så se vores guide til <a href="/kroellejern-til-store-kroeller/">krøllejern til store krøller</a>.</p>
<h3>Hvordan virker et pigkrøllejern?</h3>
<p>De fleste pigkrøllejern har ingen klemme. Du tager en tynd tot hår og vikler den rundt om stangen fra roden og ud mod spidsen, så håret ligger i en spiral ved siden af sig selv. Hold et par sekunder, og lad krøllen glide af. Et jern med rektangulær eller spiralformet stang giver krøller med en anden snoning end en rund stang. Brug en varmebeskyttende handske, hvis der følger én med.</p>
<h3>Der findes et pigkrøllejern til alle hårtyper</h3>
<p>Fint hår tager krøllen hurtigt og har det bedst med lav varme. Tykt eller glat hår, der har svært ved at holde formen, kan kræve lidt mere varme og lidt længere tid på stangen. Uanset hårtype gælder det om at tage tynde totter: jo tyndere tot, jo strammere og mere ensartet spiral. Husk <a href="/haarpleje/varmebeskyttelse/">varmebeskyttelse</a> før du begynder.</p>
<h3>Sådan holder pigkrøllerne</h3>
<p>Lad krøllerne køle helt af, før du rører dem. Vil du have dem helt definerede, så lad være med at børste. Vil du have mere volumen, kan du forsigtigt skille dem med fingrene eller en bredtandet kam fra <a href="/haarpleje/haarboerste/">hårbørster og kamme</a>. Lidt mousse eller krøllecreme fra <a href="/haarpleje/stylingprodukter/">stylingprodukter</a> hjælper krøllerne med at holde dagen igennem.</p>
<h3>Vedligehold</h3>
<p>Tør stangen af med en tør klud, når den er kold. Rester af hårspray og creme brænder fast og kan få håret til at hænge i. Lad jernet køle af på et varmebestandigt underlag, før du pakker det væk.</p>
HTML,
	'faq'      => [
		[ 'Hvad er et pigkrøllejern?', 'Et krøllejern med en tynd eller særligt formet stang, der laver små, tætte spiralkrøller. Jo tyndere stangen er, jo mindre bliver krøllerne.' ],
		[ 'Hvor tynd skal stangen være til pigkrøller?', 'Omkring 10 mm giver de små, klassiske pigkrøller. En stang på 16–19 mm giver lidt større, men stadig definerede krøller.' ],
		[ 'Hvor lang tid tager det at lave pigkrøller?', 'Det tager længere tid end store krøller, fordi totterne skal være tynde. Har du langt eller tykt hår, så sæt god tid af første gang – det går hurtigere, når du har fået teknikken.' ],
		[ 'Skal jeg børste pigkrøllerne ud?', 'Det er op til dig. Lader du dem være, får du definerede spiraler. Børster eller fingerreder du dem, får du et blødere og mere voluminøst look.' ],
	],
];
