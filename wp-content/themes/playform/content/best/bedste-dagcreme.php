<?php
/**
 * Omskrevet/ny guide til myappeal.dk. Artikelfoto: Pexels 3762890. Fakta om produkterne kommer kun fra butikkernes produktdata (feed 24. nov. 2026). Vi har ikke selv afprøvet produkterne.
 */
defined( 'ABSPATH' ) || exit;

return [
	'slug'     => 'bedste-dagcreme',
	'date'     => '2026-11-24 10:00:00',
	'keyword'  => 'dagcreme',
	'title'    => 'Bedste dagcreme: Vores bud på de 5 bedste dagcremer til ansigtet',
	'excerpt'  => 'Den rigtige dagcreme gør morgenrutinen nem og huden behagelig hele dagen. Her er vores bud på de 5 bedste dagcremer fra de butikker, vi samarbejder med – fra budgetvalg til højt solfilter.',
	'more_cat' => '',
	'intro'    => <<<'HTML'
<p>Dagcremen er den, du bruger hver eneste morgen, og derfor er det en af de hudplejeting, der betyder mest at få rigtigt. Den skal give fugt, føles rar, og den skal kunne ligge under makeup uden at skubbe rundt eller skinne.</p>
<p>Udvalget er enormt, og det kan være svært at se forskel på en creme til 50 kr. og en til 500 kr. Derfor har vi samlet vores bud på den bedste dagcreme i fem forskellige kategorier: den alsidige, den nærende, den mattende, den økologiske og den med højt solfilter. Nederst får du hjælp til at vælge efter hudtype og alder.</p>
HTML,
	'picks'    => [
		[
			'ean'     => '9005800390734',
			'price'   => 115,
			'name'    => 'Nivea Q10 Extra Nourish Day Cream SPF 15',
			'role'    => 'Bedst samlet',
			'reviews' => [],
			'verdict' => 'Næringsrig dagcreme med SPF 15, Q10 og økologisk arganolie, der fugter og beskytter mod udtørring.',
			'why'     => <<<'HTML'
<p>Skal du vælge én dagcreme, der klarer det hele, er Nivea Q10 Extra Nourish et solidt bud. Den kombinerer Q10 og økologisk arganolie med et SPF 15-filter, så du får pleje og lidt solbeskyttelse i samme trin.</p>
<p>Cremen er lavet til at fugte i dybden og beskytte mod udtørring, og den reducerer synligt dybe rynker i hverdagen. Det gør den til et naturligt valg, hvis din hud begynder at have brug for mere end en helt let fugtighedscreme.</p>
<p>Prisen er fornuftig for et mærke, der er nemt at finde igen, og 50 ml holder længe, når du bruger en lille mængde morgen og aften.</p>
HTML,
			'good'    => [ 'Hverdag og kontor', 'Normal til tør hud', 'Dig, der vil have solfilter i cremen' ],
			'less'    => [ 'Meget fedtet hud, der foretrækker en mat gel' ],
		],
		[
			'ean'     => '4001638580229',
			'price'   => 116,
			'name'    => 'Weleda Skin Food Nourishing Day Cream',
			'role'    => 'Bedst til tør hud',
			'reviews' => [],
			'verdict' => 'Nærende, fugtgivende dagcreme til tør hud med Weledas kendte Skin Food-duft.',
			'why'     => <<<'HTML'
<p>Har din hud en tendens til at stramme, især om vinteren, er Weleda Skin Food Nourishing Day Cream et oplagt valg. Den er lavet som en fugtgivende dagcreme, der egner sig godt til tør hud.</p>
<p>Duften er den samme kendte som i resten af Skin Food-serien, så den passer godt til dig, der kan lide en tydelig, naturlig duft i plejen. Er du meget følsom over for parfume, bør du vælge en parfumefri creme i stedet.</p>
<p>Du får 40 ml.</p>
HTML,
			'good'    => [ 'Tør og stram hud', 'Kolde måneder', 'Dig, der elsker Skin Food-duften' ],
			'less'    => [ 'Dig, der ønsker en helt parfumefri creme' ],
		],
		[
			'ean'     => '4005808572663',
			'price'   => 47,
			'name'    => 'Nivea Mattifying Day Cream',
			'role'    => 'Bedst til prisen',
			'reviews' => [],
			'verdict' => 'Prisvenlig dagcreme med aloe vera og mineraler, der fugter og matterer.',
			'why'     => <<<'HTML'
<p>Du behøver ikke bruge en formue for at få en god dagcreme. Nivea Mattifying Day Cream koster under 50 kr. og er lavet til at fugte huden og samtidig give en mat finish.</p>
<p>Den er beriget med naturlig aloe vera og mineraler og smelter ind i huden. Resultatet er en hud, der føles fugtet uden at skinne, hvilket gør den god til dig med normal til fedtet eller kombineret hud.</p>
<p>Fordi den giver en mat bund, er den også et godt udgangspunkt, hvis du bruger foundation eller pudder oven på.</p>
HTML,
			'good'    => [ 'Fedtet og kombineret hud', 'Budgettet', 'Mat bund under makeup' ],
			'less'    => [ 'Meget tør hud, der har brug for en rigere creme' ],
		],
		[
			'ean'     => '5701058012773',
			'price'   => 53,
			'name'    => 'Urtekram Soft Wild Rose Ageless Day Cream',
			'role'    => 'Let og med mild duft',
			'reviews' => [],
			'verdict' => 'Let dagcreme med mild duft af vildrose, der trækker hurtigt ind og er en god base for makeup.',
			'why'     => <<<'HTML'
<p>Urtekram Soft Wild Rose Ageless Day Cream er en let dagcreme, der giver huden en naturlig udstråling. Den trækker hurtigt ind, så du ikke skal stå og vente, før du kan gå videre med morgenen.</p>
<p>Duften er mild og minder om vildrose, og cremen skaber en god base for makeup. Det gør den til et rart valg, hvis du vil have en blød, hverdagsvenlig creme til en lille pris.</p>
<p>Den er et af de billigste bud på listen.</p>
HTML,
			'good'    => [ 'Hurtig morgenrutine', 'Under makeup', 'Dig, der kan lide mild rosenduft' ],
			'less'    => [ 'Dig, der vil have højt solfilter' ],
		],
		[
			'ean'     => '5713006237527',
			'price'   => 240,
			'name'    => 'Raunsborg Day Cream SPF 50',
			'role'    => 'Med højt solfilter',
			'reviews' => [],
			'verdict' => 'Let dagcreme med SPF 50, der fugter, beroliger og skærmer mod solen.',
			'why'     => <<<'HTML'
<p>Vil du have solbeskyttelse og pleje i ét trin, er Raunsborg Day Cream SPF 50 værd at kigge på. Den er en let dagcreme, der fugter og beroliger, og som har SPF 50, så den skærmer effektivt mod solens stråler.</p>
<p>Det gør den til et godt valg til dig, der er meget udendørs, cykler til arbejde eller bare vil gøre solcremen til en fast del af morgenen uden et ekstra produkt.</p>
<p>Prisen er den højeste på listen, men du sparer til gengæld et trin i rutinen. Findes også i en parfumefri udgave.</p>
HTML,
			'good'    => [ 'Dig, der er meget udendørs', 'Færre trin om morgenen', 'Sommer og ferie' ],
			'less'    => [ 'Dig, der leder efter den billigste løsning' ],
		],
	],
	'guide'    => <<<'HTML'
<h2>Sådan vælger du den bedste dagcreme</h2>
<p>Den bedste dagcreme er den, der passer til din hud og din morgenrutine. Se alle <a href="/hudpleje/dagcreme/">dagcremer</a> fra de butikker, vi samarbejder med, og brug disse råd til at indsnævre valget.</p>
<h3>Vælg efter hudtype</h3>
<ul>
<li><b>Tør hud:</b> vælg en nærende creme med en rigere tekstur.</li>
<li><b>Fedtet eller kombineret hud:</b> vælg en let creme eller gel, gerne med mat finish.</li>
<li><b>Sensitiv hud:</b> vælg en creme uden parfume, og prøv den først på et lille område.</li>
<li><b>Normal hud:</b> du har frit valg, så vælg efter tekstur og pris.</li>
</ul>
<h3>Skal din dagcreme have solfilter?</h3>
<p>En dagcreme med SPF er praktisk, fordi du sparer et trin. Husk dog, at du skal bruge en ordentlig mængde, for at filteret virker som tiltænkt. Skal du være længe i solen, så supplér med en rigtig solcreme.</p>
<h3>Dagcreme under makeup</h3>
<p>Bruger du foundation, så vælg en creme, der trækker hurtigt ind. Giv den et par minutter, før du går videre, så makeuppen ikke glider.</p>
<h3>Hvad med alder?</h3>
<p>Mange vælger en creme med Q10 eller lignende, når huden bliver modnere. Det vigtigste er stadig, at cremen giver nok fugt og passer til din hud. Parrer du den med en god <a href="/hudpleje/natcreme/">natcreme</a>, har du en komplet rutine.</p>
<p>Reagerer din hud på produkter, så tal med din læge eller en hudlæge, og følg altid anvisningen på emballagen.</p>
HTML,
	'faq'      => [
		[ 'Hvad er forskellen på dagcreme og natcreme?', 'Dagcremen er typisk lettere og skal passe under makeup og solcreme. Natcremen er ofte rigere og lavet til at plejer huden, mens du sover.' ],
		[ 'Skal jeg bruge dagcreme, hvis jeg bruger serum?', 'Ja, de fleste bruger dagcreme oven på serum for at holde på fugten. Serummet kommer først, og cremen lukker af.' ],
		[ 'Hvor meget dagcreme skal jeg bruge?', 'En lille klat til ansigt og hals rækker normalt. Følg producentens anvisning, især hvis cremen har solfilter.' ],
		[ 'Kan jeg bruge dagcreme med SPF som eneste solbeskyttelse?', 'Til hverdagsbrug kan det være nok, men til strand og lange dage i solen bør du bruge en solcreme med høj faktor.' ],
	],
];
