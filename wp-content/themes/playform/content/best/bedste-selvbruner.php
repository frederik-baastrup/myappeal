<?php
/**
 * Ny købsguide til Myappeal: selvbruner. Produktfakta kommer kun fra produktdata (feed 24. nov. 2026). Vi har ikke selv afprøvet produkterne.
 * Artikelbillede: Pexels foto-id 15974579.
 */
defined( 'ABSPATH' ) || exit;

return [
	'slug'     => 'bedste-selvbruner',
	'date'     => '2026-11-24 10:00:00',
	'keyword'  => 'selvbruner',
	'title'    => 'Bedste selvbruner: Vores bud på de 5 bedste selvbrunere',
	'excerpt'  => 'Vil du have en solkysset glød uden sol? Her er vores bud på de 5 bedste selvbrunere fra de butikker, vi samarbejder med: mousse, lotion og meget mere.',
	'more_cat' => '',
	'intro'    => <<<'HTML'
<p>En selvbruner giver dig en gylden hud hele året, uden at du skal ligge i solen. Det er den sikre vej til en naturlig glød til fest, ferie eller bare en grå novemberdag. Problemet er, at en dårlig selvbruner kan give striber og orange nuancer, så valget betyder noget.</p>
<p>Her er vores bedste bud på selvbruner fra de butikker, vi samarbejder med: mousse, gradvis lotion og et premiumvalg. Nederst får du råd til, hvordan du undgår striber, og hvordan du holder farven pæn.</p>
HTML,
	'picks'    => [
		[
			'ean'     => '5060022300521',
			'price'   => 169,
			'name'    => 'St. Tropez Self Tan Classic Bronzing Mousse',
			'role'    => 'Bedst samlet',
			'reviews' => [],
			'verdict' => 'Klassisk selvbrunermousse med gylden farve, der udvikler sig på 8 timer og holder op til 10 dage.',
			'why'     => <<<'HTML'
<p>St. Tropez er et af de mest kendte navne inden for selvbruner, og Classic Bronzing Mousse er et solidt førstevalg. Moussen giver en gylden farve, der tilpasser sig din hudtone, og den udvikler sig på 8 timer.</p>
<p>Farven holder op til 10 dage, og produktet findes hos flere af de butikker, vi samarbejder med. Det gør det let at finde en god pris.</p>
HTML,
			'good'    => [ 'Dig, der vil have en gylden hud', 'Et velkendt mærke', 'Dig, der kender selvbruner i forvejen' ],
			'less'    => [ 'Dig, der foretrækker en meget langsom, gradvis brunfarve' ],
		],
		[
			'ean'     => '0850278004084',
			'price'   => 139,
			'name'    => 'Bondi Sands Everyday Gradual Tanning Milk',
			'role'    => 'Bedst til gradvis farve',
			'reviews' => [],
			'verdict' => 'Lotion, der opbygger en naturlig tan gradvist og samtidig fugter huden.',
			'why'     => <<<'HTML'
<p>Er du nervøs for at få for meget farve på én gang, så er en gradvis selvbruner en god start. Bondi Sands Gradual Tanning Milk opbygger en naturlig tan lidt efter lidt og fugter samtidig huden, så den føles blød.</p>
<p>Du bruger den som en almindelig bodylotion, hvilket gør den meget nem. Den er beskrevet som perfekt til daglig brug for en jævn farve. Du får 375 ml, så der er rigeligt.</p>
HTML,
			'good'    => [ 'Selvbruner-begyndere', 'Daglig brug', 'Naturlig farve' ],
			'less'    => [ 'Dig, der vil have kraftig farve hurtigt' ],
		],
		[
			'ean'     => '5709954036626',
			'price'   => 84,
			'name'    => 'Derma Natural Glow Self Tan Mousse',
			'role'    => 'Bedst til prisen',
			'reviews' => [],
			'verdict' => 'Parfumefri og vegansk selvbrunermousse med aloe vera og glycerin, der giver en naturlig glød på 2-6 timer.',
			'why'     => <<<'HTML'
<p>Derma Natural Glow Self Tan Mousse viser, at du ikke behøver bruge mange penge for at prøve selvbruner. Moussen indeholder dihydroxyacetone, aloe vera og glycerin og giver huden en naturlig glød på 2-6 timer.</p>
<p>Den er parfumefri og vegansk, hvilket passer til dig, der ikke kan lide duft af selvbruner. Du får 150 ml.</p>
HTML,
			'good'    => [ 'Lille budget', 'Dig, der ikke kan lide duft', 'Veganske produkter' ],
			'less'    => [ 'Dig, der vil have en meget dyb farve' ],
		],
		[
			'ean'     => '5900717082243',
			'price'   => 74,
			'name'    => 'Lirene Perfect Tan Cappuccino Selvbrunermousse',
			'role'    => 'Bedst til naturlige ingredienser',
			'reviews' => [],
			'verdict' => 'Vegansk selvbrunerskum med 97 % naturlige ingredienser og kokosvand, der giver en gylden solbrun farve.',
			'why'     => <<<'HTML'
<p>Lirene Perfect Tan Cappuccino er en selvbrunermousse i skumform med 97 % naturlige ingredienser og kokosvand. Den giver en naturlig, gylden solbrun farve og er vegansk.</p>
<p>Prisen er lav, og produktet findes hos flere af de butikker, vi samarbejder med. Det er et godt valg, hvis du vil have en rimelig selvbruner med en lidt blødere profil.</p>
HTML,
			'good'    => [ 'Naturlige ingredienser', 'Veganske produkter', 'Fornuftig pris' ],
			'less'    => [ 'Dig, der vil have et luksusprodukt' ],
		],
		[
			'ean'     => '8719324501132',
			'price'   => 268,
			'name'    => 'Marc Inbane Natural Tanning Mousse',
			'role'    => 'Premiumvalget',
			'reviews' => [],
			'verdict' => 'Fugtgivende letvægtsmousse til en naturlig og jævn solbrun teint med 4-fold tanning technology.',
			'why'     => <<<'HTML'
<p>Marc Inbane Natural Tanning Mousse er premiumvalget i guiden. Den er en letvægtsselvbruner, der er lavet til at give en naturlig og jævn solbrun teint, og den er fugtgivende.</p>
<p>Mærket bruger en teknologi, de kalder 4-fold tanning technology. Den er dyrere end de andre, og den passer til dig, der vil have noget lidt ekstra og gerne vil investere.</p>
HTML,
			'good'    => [ 'Premium selvbruner', 'Naturlig, jævn farve', 'Fugtgivende formel' ],
			'less'    => [ 'Stram økonomi' ],
		],
	],
	'guide'    => <<<'HTML'
<h2>Sådan vælger du den bedste selvbruner</h2>
<p>Den bedste selvbruner er den, der giver en farve, du kan lide, og som du kan smøre jævnt. Vælg efter erfaring, ønsket farvedybde og tekstur. Se også vores udvalg af <a href="/solcreme/">solcreme og selvbruner</a>.</p>
<h3>Mousse, lotion, dråber eller spray</h3>
<ul>
<li><b>Mousse:</b> let at fordele og hurtig at arbejde med, men kræver en handske for at undgå brune hænder.</li>
<li><b>Lotion:</b> gradvis farve, som du bruger som bodylotion. God til begyndere.</li>
<li><b>Dråber:</b> blandes i din creme, så du selv styrer farven.</li>
<li><b>Spray:</b> hurtig at påføre, men giver ikke altid lige så jævn en farve.</li>
</ul>
<h3>Sådan undgår du striber</h3>
<p>Skrub huden dagen før, og fugt tørre områder som albuer, knæ og ankler. Brug en handske, og smør i store, cirkulære bevægelser. Vask hænderne bagefter, og lad farven tørre, før du tager tøj på.</p>
<h3>Hold farven pæn</h3>
<p>Fugt huden hver dag, og undgå at skrubbe for hårdt. Selvbruner giver farve, men beskytter ikke mod solen, så brug solcreme, når du er ude. Har du sart hud eller reagerer på produkter, så prøv på et lille område først og følg altid anvisningen.</p>
HTML,
	'faq'      => [
		[ 'Hvor længe holder selvbruner?', 'Det afhænger af produktet. Mange selvbrunere holder omkring en uges tid, og nogle op til ti dage. Følg anvisningen på produktet.' ],
		[ 'Beskytter selvbruner mod solen?', 'Nej, selvbruner giver kun farve og beskytter ikke mod solen. Brug derfor solcreme, når du er i solen.' ],
		[ 'Hvad er bedst: mousse eller lotion?', 'Mousse er hurtig og giver ofte en kraftigere farve. Lotion bygger farven gradvist og er lettere for begyndere.' ],
		[ 'Skal jeg skrubbe huden før selvbruner?', 'Ja, det er en god idé at skrubbe dagen før. Så sidder farven mere jævnt, og du får færre striber.' ],
	],
];
