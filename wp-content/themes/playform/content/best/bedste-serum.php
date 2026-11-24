<?php
/**
 * Omskrevet/ny guide til myappeal.dk. Artikelfoto: Pexels 30229017 (beskåret). Fakta om produkterne kommer kun fra butikkernes produktdata (feed 24. nov. 2026). Vi har ikke selv afprøvet produkterne.
 */
defined( 'ABSPATH' ) || exit;

return [
	'slug'     => 'bedste-serum',
	'date'     => '2026-11-24 10:00:00',
	'keyword'  => 'serum',
	'title'    => 'Bedste serum: Vores bud på de 5 bedste ansigtsserummer',
	'excerpt'  => 'Et serum er lille, men kan gøre stor forskel i din hudpleje. Her er vores bud på de 5 bedste serummer fra de butikker, vi samarbejder med, til glød, urenheder, pletter og fugt.',
	'more_cat' => '',
	'intro'    => <<<'HTML'
<p>Et serum er en let, koncentreret pleje, der trækker hurtigt ind og sidder under din dagcreme eller natcreme. Det er stedet, hvor du kan målrette din rutine efter det, din hud har brug for: mere glød, mere ro, en mere jævn hudtone eller bare lidt ekstra fugt.</p>
<p>Udvalget er stort, så vi har samlet vores bud på det bedste serum i fem forskellige retninger, fra et koreansk budgetvalg til et luksusserum fra Nuxe. Nederst får du en guide til at vælge og bruge serum, så du får mest ud af det.</p>
HTML,
	'picks'    => [
		[
			'ean'     => '8809657114960',
			'price'   => 69,
			'name'    => 'Beauty of Joseon Glow Serum Propolis + Niacinamide',
			'role'    => 'Bedst til prisen',
			'reviews' => [],
			'verdict' => 'Koreansk serum med propolis og niacinamid, der udjævner hudtonen og giver en ungdommelig glød.',
			'why'     => <<<'HTML'
<p>Beauty of Joseon Glow Serum er et af de mest prisvenlige serummer på listen, og alligevel er det et af dem, vi tror mest på til hverdagsbrug. Det kombinerer propolis og niacinamid og er lavet til at udjævne hudtonen og give en ungdommelig glød.</p>
<p>Det er et godt første serum, hvis du ikke har brugt det før, for det er nemt at placere i rutinen: efter rens, før din creme.</p>
<p>Prisen under 70 kr. gør det nemt at prøve, hvis du er nysgerrig på koreansk hudpleje.</p>
HTML,
			'good'    => [ 'Første serum', 'Dig, der vil have glød', 'Budgettet' ],
			'less'    => [ 'Dig, der vil have et serum målrettet urenheder' ],
		],
		[
			'ean'     => '8809640735820',
			'price'   => 100,
			'name'    => 'Anua Niacinamide 10% + TXA 4% Serum',
			'role'    => 'Til pigmentpletter',
			'reviews' => [],
			'verdict' => 'Serum med 10 % niacinamid og 4 % TXA, designet til mørke pletter, solskader og hyperpigmentering.',
			'why'     => <<<'HTML'
<p>Har du mørke pletter efter sommeren, eller ønsker du en mere ensartet hud, er Anua Niacinamide 10% + TXA 4% Serum et målrettet valg. Det er designet til at adressere mørke pletter, solskader og hyperpigmentering.</p>
<p>Serummet kommer i en flaske på 30 ml og passer ind som første trin efter rens. Husk, at pletter ofte kommer igen, hvis du ikke bruger solcreme, så kombinér det altid med solbeskyttelse om dagen.</p>
HTML,
			'good'    => [ 'Pigmentpletter', 'Ujævn hudtone', 'Dig, der vil have et målrettet serum' ],
			'less'    => [ 'Meget følsom hud, der let reagerer på aktive stoffer' ],
		],
		[
			'ean'     => '8809525242764',
			'price'   => 179,
			'name'    => 'Some By Mi AHA BHA PHA 30 Days Miracle Serum',
			'role'    => 'Til urenheder',
			'reviews' => [],
			'verdict' => 'Serum fra Some By Mi, der er kendt i Korea for at dulme bumser på 30 dage.',
			'why'     => <<<'HTML'
<p>Some By Mi AHA BHA PHA 30 Days Miracle Serum er blevet kendt i Korea for at dulme bumser på bare 30 dage. Navnet fortæller, at det er bygget på en kombination af syrer, og det gør det til et klassisk valg, hvis du kæmper med urenheder.</p>
<p>Du får 50 ml, hvilket er mere end i de fleste serummer, så flasken holder længe. Start langsomt, og brug det ikke hver dag fra første dag, hvis din hud ikke er vant til syrer.</p>
HTML,
			'good'    => [ 'Urenheder', 'Fedtet og kombineret hud', 'Dig, der vil have mere for pengene (50 ml)' ],
			'less'    => [ 'Meget tør eller sensitiv hud' ],
		],
		[
			'ean'     => '8809563100316',
			'price'   => 169,
			'name'    => 'Purito SEOUL Wonder Releaf Centella Serum Unscented',
			'role'    => 'Bedst til rolig hud',
			'reviews' => [],
			'verdict' => 'Reparerende og udglattende serum uden duft, der formindsker fine linjer, pigmentpletter, rødme og urenheder.',
			'why'     => <<<'HTML'
<p>Purito Wonder Releaf Centella Serum er til dig, der vil have et serum, der kan lidt af hvert. Det er beskrevet som reparerende og udglattende og skal formindske både fine linjer, pigmentpletter, rødme og urenheder.</p>
<p>Udgaven er uden duft (Unscented), hvilket er et plus, hvis du ikke vil have parfume i din rutine. Flasken er på 60 ml, så der er rigeligt.</p>
<p>Centella er populær i koreansk hudpleje, og serummet er et naturligt valg, hvis du vil starte blidt.</p>
HTML,
			'good'    => [ 'Rødme og urenheder', 'Dig, der vil undgå duft', 'Blid start med serum' ],
			'less'    => [ 'Dig, der leder efter et meget specifikt aktivt stof' ],
		],
		[
			'ean'     => '3264680023323',
			'price'   => 382,
			'name'    => 'NUXE Super Serum',
			'role'    => 'Luksusvalget',
			'reviews' => [],
			'verdict' => 'Anti-age-serum med naturlig hyaluronsyre, der smelter ind i huden og gør den mere uniform.',
			'why'     => <<<'HTML'
<p>Vil du gøre noget ekstra ud af din rutine, er NUXE Super Serum det mest luksuriøse valg her. Det er et anti-age-serum beriget med naturlig hyaluronsyre, der giver huden en ungdommelig glød og gør den mere uniform.</p>
<p>Serummet smelter lige ind i huden, så det er behageligt at bruge både morgen og aften under din creme.</p>
<p>Prisen er den højeste på listen, men det er en rigtig fin gave, hvis du vil forkæle dig selv eller en, du holder af.</p>
HTML,
			'good'    => [ 'Moden hud', 'Dig, der vil forkæle sig selv', 'Gave' ],
			'less'    => [ 'Dig, der leder efter et budgetvalg' ],
		],
	],
	'guide'    => <<<'HTML'
<h2>Sådan vælger du det bedste serum</h2>
<p>Det bedste serum er det, der passer til det, din hud har brug for lige nu. Se alle <a href="/hudpleje/serum/">serummer</a> fra de butikker, vi samarbejder med.</p>
<h3>Hvad kan et serum?</h3>
<p>Et serum er lettere end en creme og trækker hurtigt ind. Det bruges til at målrette din rutine: fugt, glød, pigmentpletter, urenheder eller rødme.</p>
<h3>Vælg efter behov</h3>
<ul>
<li><b>Fugt:</b> vælg et serum med hyaluronsyre.</li>
<li><b>Pigmentpletter og ujævn hud:</b> kig efter niacinamid.</li>
<li><b>Urenheder:</b> vælg et serum, der er lavet til urene hudtyper.</li>
<li><b>Rolig hud:</b> vælg et skånsomt serum uden duft.</li>
</ul>
<h3>Sådan bruger du serum</h3>
<p>Brug serum efter rens og før din <a href="/hudpleje/dagcreme/">dagcreme</a> eller <a href="/hudpleje/natcreme/">natcreme</a>. Start med få dråber, og tilføj ét nyt produkt ad gangen, så du kan se, hvordan din hud reagerer.</p>
<h3>Kan serum kombineres?</h3>
<p>Ja, men ikke alt skal bruges samtidig. Har du sensitiv hud, så vælg ét serum ad gangen. Søger du glød, så se også vores guide til <a href="/bedste-c-vitamin-serum/">bedste C-vitamin serum</a>.</p>
<p>Reagerer din hud på produkter, så tal med din læge eller en hudlæge, og følg altid anvisningen på emballagen.</p>
HTML,
	'faq'      => [
		[ 'Skal jeg bruge serum morgen eller aften?', 'Begge dele er mulige, afhængigt af serummet. Følg anvisningen på emballagen.' ],
		[ 'Skal jeg bruge creme oven på serum?', 'Ja, de fleste bruger creme oven på for at holde på fugten.' ],
		[ 'Hvor mange dråber serum skal jeg bruge?', 'Typisk en lille mængde til ansigt og hals. Følg producentens anvisning.' ],
		[ 'Kan jeg bruge flere serummer samtidig?', 'Det kan du, men start med ét ad gangen og se, hvordan din hud reagerer.' ],
	],
];
