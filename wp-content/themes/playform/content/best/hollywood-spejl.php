<?php
/**
 * Omskrevet fra det gamle myappeal.dk (/hollywood-spejl/, 2022). Ny tekst og nye produkter.
 * 23. nov. 2026: Gillian Jones Hollywood Mirror With Adjustable Lights og UNIQ Hollywood Trifold var ikke på lager. Skiftet til Gillian Jones Hollywood Panel Spejl og UNIQ Hollywood Makeupspejl (rosaguld; vi ved ikke, om den er tredelt, så teksten nævner det ikke).
 * Fakta om produkterne kommer kun fra butikkernes produktdata (feed 9. nov. 2026). Vi har ikke selv afprøvet produkterne.
 */
defined( 'ABSPATH' ) || exit;

return [
	'slug'     => 'hollywood-spejl',
	'date'     => '2022-11-10 10:00:00',
	'keyword'  => 'Hollywood-spejl',
	'title'    => 'Hollywood-spejl: Vores bud på de 5 bedste makeupspejle med pærer',
	'excerpt'  => 'Et Hollywood-spejl med pærer hele vejen rundt giver jævnt lys i ansigtet, så makeuppen sidder rigtigt. Her er vores bud på de 5 bedste Hollywood-spejle fra de butikker, vi samarbejder med.',
	'more_cat' => 'makeupspejl',
	'intro'    => <<<'HTML'
<p>Kender du det? Makeuppen ser fin ud på badeværelset, men i dagslys er der en skarp kant ved kæben, eller rougen sidder skævt. Det er sjældent din teknik, der driller. Det er lyset. En loftslampe kaster skygger ned over øjne og kinder, og så ser du ikke det hele.</p>
<p>Et Hollywood-spejl løser det med en ramme af pærer, der lyser dit ansigt op forfra og fra siderne. Det er det samme princip, som makeupartister bruger backstage. Herunder er vores bud på de 5 bedste Hollywood-spejle fra de butikker, vi samarbejder med – fra det lille spejl, der kan køre på batteri, til spejlet med flere lystoner på makeupbordet.</p>
HTML,
	'picks'    => [
		[
			'ean'     => '5713982010756',
			'price'   => 499,
			'name'    => 'Gillian Jones LED-lys Hollywood-spejl',
			'role'    => 'Bedst samlet',
			'reviews' => [],
			'verdict' => 'Hollywood-spejl med 12 kraftige LED-pærer, tre lystoner, touch-dæmpning og 360 graders rotation.',
			'why'     => <<<'HTML'
<p>Dette spejl fra Gillian Jones rammer den gyldne middelvej. Du får 12 kraftige LED-pærer rundt om spejlet, og med touch-knappen kan du både dæmpe lyset og skifte mellem tre lystoner.</p>
<p>De tre toner er værd at bruge. Køligt lys afslører det hele, når du skal blende foundation, mens varmt lys minder om stemningen til en middag om aftenen. Så kan du se, hvordan din makeup tager sig ud der, hvor du skal bære den.</p>
<p>Spejlet kan drejes hele vejen rundt, så du finder den rigtige vinkel. Det kompakte hvide design passer på de fleste makeupborde og findes også i sort.</p>
HTML,
			'good'    => [ 'Daglig makeup ved bordet', 'Dig, der vil kunne skifte lystone', 'Hvid eller sort indretning' ],
			'less'    => [ 'Dig, der vil have forstørrelse i samme spejl' ],
		],
		[
			'ean'     => '5713982009668',
			'price'   => 220,
			'name'    => 'Gillian Jones Hollywood Panel Spejl',
			'role'    => 'Stilrent panelspejl',
			'reviews' => [],
			'verdict' => 'Stilrent Hollywood-spejl med kraftigt LED-lys, touch-betjening og USB-opladning.',
			'why'     => <<<'HTML'
<p>Gillian Jones Hollywood Panel Spejl er til dig, der vil have backstage-følelsen uden et stort og tungt spejl på bordet. Udtrykket er enkelt og stilrent, så det passer ind, uanset om det skal stå i soveværelset eller på hylden i badeværelset.</p>
<p>Lyset er kraftigt LED-lys, og du betjener det med touch. Det giver et klart lys i ansigtet, når du lægger makeup, former bryn eller går i gang med aftenens hudpleje.</p>
<p>Spejlet lades op via USB, så du ikke er bundet til en stikkontakt ved siden af spejlet. Det gør det nemt at flytte rundt på det, hvor lyset i rummet er bedst.</p>
HTML,
			'good'    => [ 'Makeup, bryn og hudpleje', 'Steder uden stikkontakt i nærheden', 'Enkel indretning' ],
			'less'    => [ 'Dig, der vil have forstørrelse i samme spejl' ],
		],
		[
			'ean'     => '5713982012781',
			'price'   => 349,
			'name'    => 'Gillian Jones Makeup Artist Spejl Med 9 LED-pærer',
			'role'    => 'Godt og billigere',
			'reviews' => [],
			'verdict' => 'Makeupspejl med 9 kraftige LED-pærer, touchstyret farvetemperatur, dæmpning og roterende ramme.',
			'why'     => <<<'HTML'
<p>Vil du have det klassiske Hollywood-look uden at gå højt op i størrelse, er Makeup Artist-spejlet med 9 pærer et godt bud. Det har færre pærer end de store modeller, men de samme vigtige funktioner.</p>
<p>Med touchknappen skifter du farvetemperatur og dæmper lyset, og rammen kan drejes, så du kan vinkle spejlet ned mod dig, når du sidder.</p>
<p>Det er et godt førstevalg, hvis du vil prøve, hvor meget et ordentligt lys gør for din makeup. Spejlet findes i både hvid og sort, så det kan passe ind i de fleste rum.</p>
HTML,
			'good'    => [ 'Første Hollywood-spejl', 'Mindre makeupborde', 'Skift mellem varmt og koldt lys' ],
			'less'    => [ 'Dig, der vil have et stort statement-spejl' ],
		],
		[
			'ean'     => '5713895100070',
			'price'   => 299,
			'name'    => 'UNIQ Hollywood Makeupspejl',
			'role'    => 'Med forstørrelse',
			'reviews' => [],
			'verdict' => 'Hollywood-spejl med 21 LED-lys langs kanten og forstørrelse til detaljerne.',
			'why'     => <<<'HTML'
<p>UNIQ Hollywood Makeupspejl er til dig, der vil se både helheden og detaljerne. Kanten er belyst med 21 LED-lys, der giver et jævnt lys over hele ansigtet, så du kan se, om foundation og rouge er blendet ordentligt ud.</p>
<p>Spejlet har også forstørrelse. Så kan du bruge det store spejl til hele ansigtet og forstørrelsen til eyeliner, bryn og vipper – uden at skifte mellem to spejle.</p>
<p>Rammen er i en rosagylden farve, der giver lidt glamour på makeupbordet. Det er et godt bud, hvis du vil have forstørrelse med i købet uden at gå op i pris.</p>
HTML,
			'good'    => [ 'Eyeliner, bryn og detaljer', 'Jævnt lys i hele ansigtet' ],
			'less'    => [ 'Dig, der vil kunne justere lystonen' ],
		],
		[
			'ean'     => '5713982012262',
			'price'   => 114,
			'name'    => 'Gillian Jones Hollywoodspejl Med Touch LED Og USB-C',
			'role'    => 'Bedste budgetvalg',
			'reviews' => [],
			'verdict' => 'Lille Hollywood-spejl med 16 kraftige LED-lys, touch tænd/sluk, vipbart spejl og strøm via USB-C eller batteri.',
			'why'     => <<<'HTML'
<p>Du behøver ikke et stort budget for at få bedre lys. Dette lille Hollywood-spejl fra Gillian Jones har 16 kraftige LED-lys rundt om kanten, som giver et skyggefrit lys i ansigtet.</p>
<p>Du tænder og slukker med et tryk, og spejlet kan vippes, så du får den rigtige vinkel. Det smarte er strømmen: du kan bruge USB-C eller batterier. Så kan spejlet stå på natbordet, i sommerhuset eller komme med i kufferten.</p>
<p>Det er et godt valg til teenageværelset, som ekstra spejl i entréen, eller til dig, der vil prøve et Hollywood-spejl uden at bruge mange penge.</p>
HTML,
			'good'    => [ 'Lille budget', 'Rejser og weekendture', 'Steder uden stikkontakt i nærheden' ],
			'less'    => [ 'Dig, der vil kunne skifte lystone' ],
		],
	],
	'guide'    => <<<'HTML'
<h2>Hvorfor vælge et Hollywood-spejl?</h2>
<p>Et Hollywood-spejl har pærer hele vejen rundt eller langs siderne. Det giver lys forfra og fra begge sider, så der ikke opstår skygger under øjnene, ved næsen eller langs kæben. Resultatet er, at du kan se farver og overgange, som de faktisk er, og at din makeup ser ens ud i spejlet og ude i verden. Se alle <a href="/makeup/makeupspejl/">makeupspejle</a> fra de butikker, vi samarbejder med.</p>
<h2>Hvilket Hollywood-spejl skal jeg vælge?</h2>
<h3>Størrelse og placering</h3>
<p>Mål dit makeupbord, før du køber. Et stort Hollywood-spejl kræver plads, og pærerne skal kunne lyse frit. Har du kun en hylde i badeværelset, er et mindre spejl med vippefod ofte et bedre valg end et stort, der står i vejen.</p>
<h3>Lystoner og dæmpning</h3>
<p>Kan du skifte mellem køligt, neutralt og varmt lys, kan du lægge makeup, der passer til lyset, hvor du skal være. Køligt lys til kontoret, varmt lys til en aften i byen. Dæmpning er rart tidligt om morgenen, når øjnene ikke er helt vågne.</p>
<h3>Strøm, batteri eller USB</h3>
<p>Spejle med adapter kører stabilt og er bedst til et fast makeupbord. Spejle med USB-C eller batteri kan flyttes rundt og tages med på rejse. Tjek, hvor din nærmeste stikkontakt er, før du vælger.</p>
<h3>Forstørrelse</h3>
<p>Mange Hollywood-spejle har kun almindeligt spejlglas. Lægger du ofte eyeliner, falske vipper eller former bryn, så vælg en model med indbygget forstørrelse – eller suppler med et lille <a href="/forstoerrelsesspejl-med-lys/">forstørrelsesspejl med lys</a>.</p>
<h3>Pleje af spejlet</h3>
<p>Tør spejlglasset af med en blød klud, og undgå at sprøjte rengøringsmiddel direkte på pærer og knapper. Pudder og spray sætter sig hurtigt på glasset, så en hurtig aftørring en gang om ugen holder lyset klart.</p>
HTML,
	'faq'      => [
		[ 'Hvad er et Hollywood-spejl?', 'Et makeupspejl med pærer rundt om kanten, inspireret af spejlene i filmstjernernes omklædningsrum. Lyset kommer fra flere sider, så du undgår skygger i ansigtet.' ],
		[ 'Er LED-pærer bedre end almindelige pærer i et makeupspejl?', 'LED-pærer bliver ikke varme på samme måde og bruger mindre strøm. Mange LED-spejle kan også skifte lystone og dæmpes, hvilket er praktisk til makeup.' ],
		[ 'Kan et Hollywood-spejl køre på batteri?', 'Nogle kan. De mindre modeller kører ofte på USB-C eller batterier, mens de store spejle typisk har en strømadapter.' ],
		[ 'Hvilket lys er bedst til makeup?', 'Neutralt lys, der minder om dagslys, giver det mest ærlige billede. Kan dit spejl skifte lystone, så tjek din makeup i det lys, der minder mest om stedet, du skal hen.' ],
	],
];
