<?php
/**
 * Omskrevet fra det gamle myappeal.dk (/kroellejern-til-store-kroeller/, 2022). Ny tekst og nye produkter.
 * Tre af modellerne ligger i Proshops kategori "Kroellejern" – den skal være med i Proshops category_map ('kroellejern' => '?haarstyling').
 * Fakta om produkterne kommer kun fra butikkernes produktdata. Vi har ikke selv afprøvet produkterne.
 */
defined( 'ABSPATH' ) || exit;

return [
	'slug'     => 'kroellejern-til-store-kroeller',
	'date'     => '2022-06-06 10:00:00',
	'keyword'  => 'krøllejern til store krøller',
	'title'    => 'Krøllejern til store krøller: Vores bud på de 5 bedste til fyldige lokker',
	'excerpt'  => 'Store, løse krøller kræver en tyk stang. Her er vores bud på de 5 bedste krøllejern til store krøller og bølger fra de butikker, vi samarbejder med – fra 32 mm og op.',
	'more_cat' => 'kroellejern',
	'intro'    => <<<'HTML'
<p>Drømmer du om de bløde, fyldige lokker, der ser ud, som om du lige har været hos frisøren? Så er tykkelsen på stangen det vigtigste valg, du træffer. Et tyndt krøllejern giver små, faste krøller, uanset hvor dygtig du er. Vil du have store krøller og løse bølger, skal du have fat i en tyk stang.</p>
<p>Vi har kigget efter krøllejern med en stang på 32 mm eller mere og et enkelt bølgejern til de helt store, hoppende bølger. Herunder er vores bud på de 5 bedste fra de butikker, vi samarbejder med, og nederst forklarer vi, hvordan du vælger tykkelse og varme.</p>
HTML,
	'picks'    => [
		[
			'ean'     => '4008496872770',
			'price'   => 236,
			'name'    => 'Remington PROluxe CI9132',
			'role'    => 'Bedst samlet',
			'reviews' => [],
			'verdict' => 'Krøllejern med 32 mm tromle, digitalt display, 120–210 °C og en fast indstilling på 185 °C til at skåne håret.',
			'why'     => <<<'HTML'
<p>Remington PROluxe CI9132 rammer midten af det, de fleste ønsker sig: naturlige, fyldige krøller, der ikke bliver for stramme. Tromlen er på 32 mm, og det er en god tykkelse til både skulderlangt og langt hår.</p>
<p>Du styrer varmen fra 120 til 210 °C på et digitalt display. Har du svært ved at vælge, kan du bruge Pro+-indstillingen på 185 °C, der er lavet til at holde håret sundt. Grip Tech-belægningen er beregnet til at holde fast i håret, mens du ruller, så lokken ikke glider af.</p>
<p>Remington giver 5 års garanti, og det er en tryghed, når jernet skal bruges mange morgener frem.</p>
HTML,
			'good'    => [ 'Skulderlangt og langt hår', 'Dig, der vil kunne se temperaturen', 'Lang garanti' ],
			'less'    => [ 'Dig, der vil have de helt store, løse bølger' ],
		],
		[
			'ean'     => '4008496975754',
			'price'   => 204,
			'name'    => 'Remington Pro Big Curl CI5538',
			'role'    => 'Største tromle',
			'reviews' => [],
			'verdict' => 'Krøllejern med 38 mm tromle til store og fyldige krøller og 8 temperaturtrin fra 140 til 210 °C.',
			'why'     => <<<'HTML'
<p>Remington Pro Big Curl er til dig, der vil have krøllerne endnu større. Med 38 mm er tromlen den tykkeste blandt vores valg, og det betyder bløde, åbne lokker med masser af fylde. Har du langt hår, giver den tykke stang et resultat, der minder om en føntørring med rundbørste.</p>
<p>Tromlen har en keramisk titaniumbelægning og en antistatisk, turmalin-ionisk overflade, der skal få håret til at glide let. Du vælger mellem 8 temperaturtrin fra 140 til 210 °C, så du kan gå forsigtigt til værks med fint hår.</p>
<p>Det er et prisvenligt bud på de virkelig store krøller.</p>
HTML,
			'good'    => [ 'Langt hår', 'Store, åbne lokker', 'Dig med fint hår, der vil starte lavt' ],
			'less'    => [ 'Kort hår, hvor tromlen kan være for tyk' ],
		],
		[
			'ean'     => '3030050165364',
			'price'   => 599,
			'name'    => 'BaByliss C112E Curl Styler Luxe',
			'role'    => 'Med kold luft',
			'reviews' => [],
			'verdict' => 'Krøllejern med 36 mm cylinder og koldluftsteknologi, der hurtigt skaber løse krøller.',
			'why'     => <<<'HTML'
<p>BaByliss Curl Styler Luxe skiller sig ud fra de klassiske krøllejern, fordi den har koldluftsteknologi. Den er lavet til at skabe løse krøller nemt og hurtigt, og det mærker du især, når hele håret skal krølles en travl morgen.</p>
<p>Cylinderen er på 36 mm, så krøllerne bliver store og falder blødt omkring ansigtet. Du vælger mellem 3 varmeindstillinger, så du kan tilpasse varmen til dit hår og starte lavt, hvis det er fint eller farvet.</p>
<p>Den ligger i den dyre ende af vores valg, men er værd at overveje, hvis du gerne vil have et krøllejern, der kan lidt mere end at varme.</p>
HTML,
			'good'    => [ 'Store, løse krøller', 'Travle morgener', 'Dig, der krøller hele håret' ],
			'less'    => [ 'Dig, der vil holde prisen nede' ],
		],
		[
			'ean'     => '0761318111597',
			'price'   => 209,
			'name'    => 'Revlon Pro Collection RVIR1159E',
			'role'    => 'Flest varmetrin',
			'reviews' => [],
			'verdict' => 'Krøllejern på 32 mm med 20 temperaturindstillinger, opvarmning på 30 sekunder, cool tip og drejeledning.',
			'why'     => <<<'HTML'
<p>Revlon Pro Collection er til dig, der gerne vil have fin kontrol over varmen. Der er hele 20 temperaturindstillinger op til 200 °C, så du kan finde præcis det niveau, dit hår har godt af.</p>
<p>Tromlen er på 32 mm og giver store, naturlige krøller. Jernet er klar på cirka 30 sekunder, og det holder en jævn varme, mens du arbejder dig gennem håret. En cool tip for enden giver dig et sted at holde med den anden hånd, og den drejelige ledning gør det nemmere at komme rundt om hovedet uden at vikle dig ind.</p>
<p>Lampen viser tydeligt, når jernet er tændt, og designet i sort og rosaguld gør det pænt at have fremme.</p>
HTML,
			'good'    => [ 'Dig, der vil finjustere varmen', 'Travle morgener', 'Store, naturlige krøller' ],
			'less'    => [ 'Dig, der vil have et digitalt display' ],
		],
		[
			'ean'     => '5010777154191',
			'price'   => 699,
			'name'    => 'Revamp Progloss Deep Beach Waver',
			'role'    => 'Til store bølger',
			'reviews' => [],
			'verdict' => 'Bølgejern med tre store, keramiske spoler, der giver dybe, hoppende bølger.',
			'why'     => <<<'HTML'
<p>Vil du have store bølger frem for runde krøller, er Revamp Progloss Deep Beach Waver et andet slags værktøj. Den har tre store spoler ved siden af hinanden, og du klemmer håret mellem dem i stedet for at rulle det rundt om en stang.</p>
<p>Resultatet er dybe, hoppende bølger med et strandagtigt look. Teknikken er nem at lære: du arbejder dig ned gennem håret sektion for sektion, så bølgerne hænger sammen fra top til spids.</p>
<p>Spolerne er keramiske og varmes op, og det gør bølgejernet til et oplagt valg, hvis du synes, at et almindeligt krøllejern giver for "pyntede" krøller. Det er det dyreste af vores bud.</p>
HTML,
			'good'    => [ 'Store beach waves', 'Begyndere, der vil have et nemt greb', 'Langt hår' ],
			'less'    => [ 'Dig, der vil have runde, definerede krøller' ],
		],
	],
	'guide'    => <<<'HTML'
<h2>Sådan vælger du det rigtige krøllejern til store krøller</h2>
<p>Stangens tykkelse bestemmer, hvor stor krøllen bliver. Det er den vigtigste ting at kigge på. Se alle <a href="/haarstyling/kroellejern/">krøllejern</a> fra de butikker, vi samarbejder med, hvis du vil sammenligne flere.</p>
<h3>Tykkelse og hårlængde</h3>
<p>Fra cirka 32 mm begynder krøllerne at blive store og løse. Over 35 mm får du mere fylde og bløde bølger end egentlige krøller. Jo længere dit hår er, jo tykkere en stang kan du bruge – for kort hår kan en meget tyk stang være svær at få hele vejen rundt. Et bølgejern med flere spoler er et alternativ, hvis du hellere vil have bølger end lokker.</p>
<h3>Hvor varmt skal krøllejernet kunne blive?</h3>
<p>Det afhænger af dit hår. Fint, lyst eller farvet hår har det bedst med lav varme, mens tykt og grovt hår ofte skal have mere for at krøllen holder. Vælg et jern, hvor du selv kan justere temperaturen, og start lavt. Gå kun op, hvis krøllen falder ud. Brug altid <a href="/haarpleje/varmebeskyttelse/">varmebeskyttelse</a> før du krøller.</p>
<h3>Sådan holder store krøller længere</h3>
<p>Store krøller falder hurtigere ud end små, fordi de vejer mere. Tag ikke for tykke totter, lad hver lok køle af i hånden eller med en klemme, før du rører den, og vent med at rede krøllerne ud, til hele håret er kølet ned. Lidt <a href="/haarpleje/stylingprodukter/">stylingprodukt</a> som mousse eller hårspray hjælper krøllerne med at holde formen.</p>
<h3>Alternativer til krøllejernet</h3>
<p>Vil du have store bølger og volumen uden et klassisk jern, kan <a href="/haarstyling/varmeruller/">varmeruller</a> eller en <a href="/haarstyling/varmluftsboerste/">varmluftsbørste</a> være et godt valg. Drømmer du i stedet om små, tætte krøller, så se vores guide til <a href="/bedste-pigkroellejern/">pigkrøllejern</a>, og skal du have noget med på rejsen, så se <a href="/mini-glattejern/">mini-glattejern</a>.</p>
<h3>Vedligehold</h3>
<p>Tør stangen af med en tør klud, når den er kold, så rester af hårspray og produkter ikke brænder fast. Lad jernet køle helt af, før det lægges væk, og vikl ikke ledningen stramt om håndtaget.</p>
HTML,
	'faq'      => [
		[ 'Hvor tyk skal stangen være til store krøller?', 'Fra cirka 32 mm får du store, løse krøller. Vil du have endnu mere fylde og bløde bølger, kan du gå op til 36–38 mm, især hvis du har langt hår.' ],
		[ 'Hvorfor falder mine store krøller ud?', 'Store krøller er tungere end små. Tag tyndere totter, lad hver lok køle af, før du slipper den, og brug lidt mousse eller hårspray. Det hjælper også at vente med at rede krøllerne ud, til håret er helt koldt.' ],
		[ 'Kan jeg bruge et krøllejern til store krøller i kort hår?', 'Det kan være svært, hvis håret ikke kan nå rundt om stangen. Til kort hår giver en tyndere stang eller en varmluftsbørste ofte et bedre resultat.' ],
		[ 'Hvad er forskellen på et krøllejern og et bølgejern?', 'Med et krøllejern ruller du håret om en stang og får runde lokker. Med et bølgejern klemmer du håret mellem flere spoler og får bølger i et S-mønster.' ],
	],
];
