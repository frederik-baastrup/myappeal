<?php
/**
 * Omskrevet fra det gamle myappeal.dk (/ansigtssolcreme/, 2023). Ny tekst og nye produkter.
 * Fakta om produkterne kommer kun fra butikkernes produktdata (feed 9. nov. 2026). Vi har ikke selv afprøvet produkterne.
 */
defined( 'ABSPATH' ) || exit;

return [
	'slug'     => 'ansigtssolcreme',
	'date'     => '2023-02-10 10:00:00',
	'keyword'  => 'ansigtssolcreme',
	'title'    => 'Ansigtssolcreme: Vores bud på de 5 bedste solcremer til ansigtet',
	'excerpt'  => 'Solcreme til ansigtet skal beskytte godt og samtidig føles let nok til, at du gider bruge den hver dag. Her er vores bud på de 5 bedste ansigtssolcremer fra de butikker, vi samarbejder med.',
	'more_cat' => 'solcreme-til-ansigt',
	'intro'    => <<<'HTML'
<p>Ansigtet er den del af kroppen, der får mest sol. Det er fremme hele året, også når du cykler til arbejde i marts eller sidder på en terrasse i september. Alligevel springer mange solcremen over, fordi den føles tung, skinner eller driller under makeuppen.</p>
<p>Løsningen er en solcreme, der er lavet til ansigtet. Den er som regel lettere, trækker hurtigere ind og passer bedre ind i din morgenrutine. Herunder finder du vores bud på de 5 bedste fra de butikker, vi samarbejder med – fra den usynlige fluid til stiften, du har i tasken. Nederst får du hjælp til solfaktor, vandfasthed og forskellen på UVA og UVB.</p>
HTML,
	'picks'    => [
		[
			'ean'     => '3337875797597',
			'price'   => 139,
			'name'    => 'La Roche-Posay Anthelios UVMune 400 Invisible Fluid SPF50+',
			'role'    => 'Bedst samlet',
			'reviews' => [],
			'verdict' => 'Usynlig, ikke-fedtende fluid med SPF50+, beskyttelse mod UVA, UVB og ultralang UVA, og den kan klare vand, sved og sand.',
			'why'     => <<<'HTML'
<p>Vil du have én solcreme til ansigtet, som klarer både hverdagen og stranden, er Anthelios UVMune 400 et stærkt bud. Den har SPF50+ og dækker både UVA, UVB og den ultralange UVA, som mange solcremer ikke nævner. Filteret hedder Mexoryl 400.</p>
<p>Teksturen er en fluid, der lægger sig som et usynligt slør uden at føles fedtet. Det gør den nem at bruge under makeup og nem at smøre på igen i løbet af dagen.</p>
<p>Den er også lavet til at modstå vand, sved og sand. Så du kan tage den med på cykelturen, i sommerhuset og på stranden uden at skifte produkt.</p>
HTML,
			'good'    => [ 'Daglig brug under makeup', 'Strand, sport og sommerferie', 'Dig, der ikke kan lide fedtet solcreme' ],
			'less'    => [ 'Dig, der gerne vil have lidt farve i solcremen' ],
		],
		[
			'ean'     => '5201314180586',
			'price'   => 130,
			'name'    => 'Carroten Face Super Mat Cream SPF 50',
			'role'    => 'Til fedtet hud',
			'reviews' => [],
			'verdict' => 'Meget let SPF 50-creme med Shine Control, der suger overskydende fedt og holder glansen nede.',
			'why'     => <<<'HTML'
<p>Har du en hud, der begynder at skinne midt på formiddagen, kan solcremen gøre det værre. Carroten Face Super Mat er bygget til netop det problem.</p>
<p>Cremen har SPF 50 og en teknologi, Carroten kalder Shine Control. Den opsuger sebum og hjælper med at holde glansen væk gennem dagen. Samtidig er teksturen meget let, så den ikke føles som et ekstra lag.</p>
<p>Den passer godt til dig med fedtet eller kombineret hud, og til dig, der vil have en mat bund under foundation eller pudder. Findes også i en udgave med SPF 30, hvis du mest skal bruge den i byen.</p>
HTML,
			'good'    => [ 'Fedtet og kombineret hud', 'Mat bund under makeup' ],
			'less'    => [ 'Meget tør hud, der har brug for ekstra fugt' ],
		],
		[
			'ean'     => '8809913830450',
			'price'   => 99,
			'name'    => 'SKIN1004 Madagascar Centella Hyalu-Cica Water-fit Sun Serum SPF50+',
			'role'    => 'Let og fugtgivende',
			'reviews' => [],
			'verdict' => 'Let solserum med SPF50+ og PA++++, der trækker hurtigt ind og giver fugt med Hyalu-Cica.',
			'why'     => <<<'HTML'
<p>Kan du godt lide fornemmelsen af et serum, men har brug for solbeskyttelse? Så er SKIN1004 Water-fit Sun Serum værd at kigge på. Det er en koreansk solbeskyttelse med SPF50+ og PA++++, som er den højeste UVA-mærkning i det asiatiske system.</p>
<p>Formlen er let og hurtigtabsorberende og bruger kemiske UV-filtre. Hyalu-Cica giver fugt, så huden ikke føles stram, når den har været ude i vind og sol.</p>
<p>Den er et godt valg til dig, der vil have fugt og solbeskyttelse i ét trin om morgenen – og som ikke har lyst til en tyk creme.</p>
HTML,
			'good'    => [ 'Normal til tør hud', 'Fugt og sol i ét trin', 'Dig, der elsker koreansk hudpleje' ],
			'less'    => [ 'Dig, der foretrækker mineralske filtre' ],
		],
		[
			'ean'     => '4006000171159',
			'price'   => 88,
			'name'    => 'Nivea UV Face Ultra Fluid Light Tinted SPF50+',
			'role'    => 'Med let farve',
			'reviews' => [],
			'verdict' => 'Ultralet, tonet solfluid med SPF50+, der udjævner hudtonen naturligt.',
			'why'     => <<<'HTML'
<p>Nivea UV Face Ultra Fluid Light Tinted er til dig, der vil slippe for et trin om morgenen. Den kombinerer meget høj solbeskyttelse med en let farve, som jævner huden ud på en naturlig måde.</p>
<p>Teksturen er flydende og trækker hurtigt ind, så den føles mere som en let base end som en solcreme. På travle dage kan den erstatte foundation, og på andre dage kan du bruge den under.</p>
<p>Fordi den er tonet, skal du vælge den, hvis nuancen passer til din hud. Er du i tvivl, så kig på en af de usynlige fluider i stedet.</p>
HTML,
			'good'    => [ 'Dig, der vil springe foundation over', 'Hverdag og kontor' ],
			'less'    => [ 'Meget lys eller meget mørk hud, hvor nuancen kan ramme skævt' ],
		],
		[
			'ean'     => '42494843',
			'price'   => 99,
			'name'    => 'Nivea Silky UV Stick SPF50+',
			'role'    => 'Til tasken',
			'reviews' => [],
			'verdict' => 'Solstift til ansigtet med SPF 50+, en silkeblød, ikke-fedtet finish og modstand mod vand og sved.',
			'why'     => <<<'HTML'
<p>Den største fejl med solcreme er ikke at vælge den forkerte. Det er at glemme at smøre igen. Nivea Silky UV Stick gør det nemt, fordi du bare stryger den over næse, kindben og pande – uden fingre fulde af creme.</p>
<p>Stiften har SPF 50+ og giver en semi-transparent, silkeblød finish, der ikke føles fedtet og ikke er til at se på huden. Den modstår vand og sved, så den kan følge med på stranden, skiturer og i sportstasken.</p>
<p>Brug den som supplement til din morgensolcreme, eller som det eneste, når du hurtigt skal beskytte de udsatte steder.</p>
HTML,
			'good'    => [ 'Genpåføring i løbet af dagen', 'Næse, ører og kindben', 'Sport og ferie' ],
			'less'    => [ 'Store flader som hele ansigt og hals hver morgen' ],
		],
	],
	'guide'    => <<<'HTML'
<h2>Sådan vælger du den bedste ansigtssolcreme</h2>
<p>Den bedste solcreme til ansigtet er den, du faktisk bruger hver dag. Derfor skal du vælge efter tre ting: beskyttelse, tekstur og din hudtype. Se alle <a href="/solcreme/solcreme-til-ansigt/">solcremer til ansigtet</a> fra de butikker, vi samarbejder med.</p>
<h3>Ansigtssolcreme eller solcreme til kroppen?</h3>
<p>Beskyttelsen er ikke nødvendigvis forskellig, men formlen er. Solcreme til ansigtet er typisk lettere, mindre fedtet og lavet til at kunne ligge under makeup. Mange har også fugt, farve eller en mat finish. Solcreme til kroppen kommer i større flasker og er lavet til at dække store flader. Du kan godt bruge en ansigtssolcreme på kroppen, men det bliver dyrt. Til kroppen finder du flere bud under <a href="/solcreme/solcreme-til-krop/">solcreme til krop</a>.</p>
<h3>Hvilken solfaktor til ansigtet?</h3>
<p>SPF fortæller, hvor godt solcremen beskytter mod UVB-stråler. Til ansigtet vælger mange SPF 50 eller 50+ om sommeren og på ferie, fordi ansigtet får sol hele dagen. I de mørke måneder kan SPF 30 være nok til hverdagen. Vigtigst er, at du bruger nok: en god klat til ansigt og hals, og at du smører igen efter et par timer i solen, efter badning og når du har svedt.</p>
<h3>UVA, UVB og UVC</h3>
<p>UVB-strålerne giver solskoldning, og det er dem, SPF-tallet handler om. UVA-strålerne trænger dybere ned i huden og er der hele året, også gennem skyer og vinduer. Se derfor efter UVA-logoet i en cirkel eller PA-mærkningen på koreanske solcremer – jo flere plusser, jo højere UVA-beskyttelse. UVC-stråler bliver stoppet af ozonlaget, så dem skal du ikke tænke på, når du vælger solcreme.</p>
<h3>Vandfast ansigtssolcreme</h3>
<p>Skal du bade, dyrke sport eller være på stranden, så vælg en solcreme, der er vandfast eller modstår vand og sved. Den sidder bedre fast, men den skal stadig smøres på igen, når du har været i vandet eller har tørret dig med et håndklæde. Til hverdagen er vandfasthed mindre vigtig end en tekstur, du kan lide.</p>
<h3>Vælg efter din hud</h3>
<ul>
<li><b>Fedtet hud:</b> vælg en mat eller let fluid uden olie.</li>
<li><b>Tør hud:</b> vælg en creme eller et serum med fugt.</li>
<li><b>Sensitiv hud:</b> vælg en formel uden parfume, og prøv den på et lille område først.</li>
<li><b>Makeup-brugere:</b> vælg en usynlig fluid eller en tonet solcreme, og hav en stift i tasken til genpåføring.</li>
</ul>
<p>Har du en hudlidelse eller reagerer du på solcreme, så tal med din læge eller en hudlæge, og følg altid producentens anvisning. Afslut solsæsonen med lidt pleje fra <a href="/solcreme/after-sun/">after sun</a> eller en god <a href="/hudpleje/dagcreme/">dagcreme</a>.</p>
HTML,
	'faq'      => [
		[ 'Skal jeg bruge solcreme i ansigtet om vinteren?', 'UVA-stråler er der hele året, også i overskyet vejr. Mange bruger derfor solcreme eller en dagcreme med SPF i ansigtet året rundt, typisk en lavere faktor i vinterhalvåret.' ],
		[ 'Kan jeg bruge min almindelige solcreme i ansigtet?', 'Ja, hvis din hud har det fint med den. Solcreme til ansigtet er bare som regel lettere, mindre fedtet og nemmere at kombinere med makeup.' ],
		[ 'Hvor ofte skal jeg smøre solcreme på ansigtet?', 'Smør en god portion på om morgenen, og gentag efter et par timer i solen, efter badning og når du har svedt eller tørret dig. Følg producentens anvisning.' ],
		[ 'Hvad betyder PA++++ på solcremen?', 'PA er den asiatiske mærkning for UVA-beskyttelse. Jo flere plusser, jo højere UVA-beskyttelse. PA++++ er det højeste niveau.' ],
		[ 'Kan jeg lægge makeup oven på solcreme?', 'Ja. Lad solcremen trække ind et par minutter først. En let fluid eller en tonet solcreme er nemmest at kombinere med makeup.' ],
	],
];
