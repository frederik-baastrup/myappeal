<?php
/**
 * Ny købsguide til Myappeal (24. nov. 2026). Artikelfoto: Pexels 3762663 (fri licens).
 * Fakta om produkterne kommer kun fra produktdata i de butikker, vi samarbejder med. Vi har ikke selv afprøvet produkterne.
 */
defined( 'ABSPATH' ) || exit;

return [
	'slug'     => 'bedste-mascara',
	'date'     => '2026-11-24 10:00:00',
	'keyword'  => 'mascara',
	'title'    => 'Bedste mascara: Vores bud på de 5 bedste mascaraer til volumen og hverdag',
	'excerpt'  => 'Den bedste mascara giver dig det vippeudtryk, du vil have, uden at klumpe. Her er vores bud på 5 gode mascaraer fra de butikker, vi samarbejder med.',
	'more_cat' => '',
	'intro'    => <<<'HTML'
<p>Mascara er det produkt, der kan få øjnene til at se vågne ud på et par sekunder. Samtidig er det også et af de makeupprodukter, der er sværest at vælge, for tuberne ligner hinanden, og børsterne gør forskellen. Nogle vipper bliver lange og adskilte, andre bliver tykke og dramatiske – og det er ikke altid det, du ledte efter.</p>
<p>Her er vores bud på den bedste mascara fra de butikker, vi samarbejder med. Vi har valgt fem, der dækker forskellige behov: voluminøs og dramatisk, billig og god, sart og allergicertificeret og en med vippeserum. Nederst finder du et købsråd, så du kan vælge den rigtige til netop dine vipper.</p>
HTML,
	'picks'    => [
		[
			'ean'     => '3600521821152',
			'price'   => 97,
			'name'    => 'L\'Oréal Paris Volume Million Lashes Mascara Black',
			'role'    => 'Bedst samlet',
			'reviews' => [],
			'verdict' => 'Sort volumenmascara fra L\'Oréal Paris, der er let at finde og findes hos flere butikker.',
			'why'     => <<<'HTML'
<p>Skal du have én mascara, der passer til de fleste, er Volume Million Lashes et trygt valg. Navnet fortæller, hvad den går efter: volumen, så vipperne ser fyldigere ud. Den kommer i sort, som klæder de fleste og er nem at få til at se naturlig ud med ét lag.</p>
<p>L'Oréal Paris er et af de mest kendte makeupmærker, og netop denne mascara findes hos flere af de butikker, vi samarbejder med. Det gør det nemt at sammenligne prisen, før du går til butik.</p>
<p>Vil du have et mere dramatisk udtryk til fest eller aften, kan du bare bygge flere lag. Husk at lade hvert lag tørre lidt, så vipperne ikke klistrer sammen.</p>
HTML,
			'good'    => [ 'Dig, der vil have fyldigere vipper', 'Hverdag og fest med samme tube', 'Dig, der vil have et kendt mærke' ],
			'less'    => [ 'Dig med meget sarte øjne, der leder efter en allergicertificeret formel' ],
		],
		[
			'ean'     => '0000050671304',
			'price'   => 49,
			'name'    => 'Max Factor 2000 Calorie Dramatic Volume Mascara Black',
			'role'    => 'Bedst til prisen',
			'reviews' => [],
			'verdict' => 'Sort volumenmascara fra Max Factor til en lav pris, når du vil have drama uden at bruge mange penge.',
			'why'     => <<<'HTML'
<p>Max Factor 2000 Calorie Dramatic Volume er den billigste af vores fem, og den er et godt sted at starte, hvis du bare vil have en sort mascara med volumen uden at betale for meget. Allerede navnet siger, at den er lavet til et dramatisk udtryk.</p>
<p>Max Factor er et mærke, mange kender. Her får du en sort mascara, som du kan bruge både til hverdag og til de dage, hvor øjnene skal i fokus.</p>
<p>Fordi prisen er lav, er den også oplagt som mascara nummer to i tasken eller til dig, der skifter ofte og gerne vil prøve nyt.</p>
HTML,
			'good'    => [ 'Dig med et lille budget', 'Mascara nummer to i tasken', 'Dramatiske vipper' ],
			'less'    => [ 'Dig, der foretrækker et helt naturligt look' ],
		],
		[
			'ean'     => '3600531143459',
			'price'   => 76,
			'name'    => 'Maybelline Lash Sensational Mascara Black',
			'role'    => 'Klassikeren',
			'reviews' => [],
			'verdict' => 'Sort Lash Sensational-mascara fra Maybelline, en populær serie, der er nem at finde.',
			'why'     => <<<'HTML'
<p>Lash Sensational er en af Maybellines kendte mascaraserier, og den passer godt til dig, der vil have en solid sort mascara fra et mærke, du kender. Den findes hos flere af de butikker, vi samarbejder med, så du kan vælge den, der har den bedste pris.</p>
<p>Prisen ligger i den lavere halvdel af vores udvalg. Du får et kendt mærke uden at betale premiumpris.</p>
<p>En lille tommelfingerregel for alle mascaraer: Start ved vippernes rod, og træk børsten op i en let zigzagbevægelse. Så løfter du vipperne, og farven fordeler sig jævnt.</p>
HTML,
			'good'    => [ 'Dig, der vil have et kendt mærke til en fornuftig pris', 'Daglig brug' ],
			'less'    => [ 'Dig, der vil have brun mascara – denne er sort' ],
		],
		[
			'ean'     => '5711914175245',
			'price'   => 90,
			'name'    => 'GOSH Catchy Eyes Mascara Allergy Certified',
			'role'    => 'Til sarte øjne',
			'reviews' => [],
			'verdict' => 'Allergicertificeret mascara fra GOSH, der giver fyldige vipper med ét strøg uden at føles tung.',
			'why'     => <<<'HTML'
<p>Reagerer dine øjne let, kan det være en lettelse at vælge en mascara, der er allergicertificeret. GOSH Catchy Eyes er netop det, og den kommer fra et dansk mærke, mange kender i forvejen.</p>
<p>Mascaraen giver fyldige vipper med blot ét strøg og føles ikke tyngende, men giver i stedet længde. Emballagen har en klikfunktion, som gør det nemt at lukke tuben ordentligt.</p>
<p>Den er et rigtig godt valg til dig med sarte øjne, og som vil have et enkelt produkt, der bare virker i hverdagen.</p>
HTML,
			'good'    => [ 'Sarte øjne', 'Dig, der vil have et enkelt produkt', 'Hurtig makeup med ét strøg' ],
			'less'    => [ 'Dig, der vil bygge meget voluminøse, dramatiske vipper' ],
		],
		[
			'ean'     => '5714377700016',
			'price'   => 146,
			'name'    => 'Lavinde Copenhagen Beyond Volume & Curl Mascara',
			'role'    => 'Med vippeserum',
			'reviews' => [],
			'verdict' => 'Volumengivende mascara med vippeserum og allergicertificering, velegnet til sarte øjne.',
			'why'     => <<<'HTML'
<p>Lavinde Copenhagen Beyond Volume & Curl er en volumengivende mascara, der også indeholder vippeserum. Den er allergicertificeret og velegnet til sarte øjne, så du kan få volumen uden at gå på kompromis med komforten.</p>
<p>Navnet afslører, at den både skal give volumen og krølle vipperne, så de bliver løftet og åbne. Det giver et vågent look, som passer til både hverdag og fest.</p>
<p>Den ligger i den dyrere ende af vores udvalg, men er et godt valg, hvis du vil have en mascara, der både giver et flot resultat og har plejende ekstra.</p>
HTML,
			'good'    => [ 'Sarte øjne', 'Dig, der vil have løftede, fyldige vipper', 'Plejende mascara' ],
			'less'    => [ 'Dig med et stramt budget' ],
		],
	],
	'guide'    => <<<'HTML'
<h2>Sådan vælger du den bedste mascara</h2>
<p>Den bedste mascara er den, der giver dig det udtryk, du gerne vil have, uden at klumpe eller irritere dine øjne. Det handler om børste, formel og farve. Se hele udvalget af <a href="/makeup/">makeup</a> fra de butikker, vi samarbejder med.</p>
<h3>Vælg efter det, du vil opnå</h3>
<ul>
<li><b>Volumen:</b> Får vipperne til at se tykkere og fyldigere ud. Vælg en mascara med en tyk eller kegleformet børste.</li>
<li><b>Længde:</b> Strækker vipperne og adskiller dem. Her er en tynd børste med tætsiddende børster ofte bedst.</li>
<li><b>Curl:</b> Giver et løft, så øjnene ser mere åbne ud. Bruger du en vippekrøller først, holder krølningen bedre.</li>
</ul>
<h3>Sort, brun eller farvet</h3>
<p>Sort giver det mest markante udtryk og er det mest populære valg. Brun er blødere og klæder ofte lyse hår og lyse vipper. Farvede mascaraer er sjove til fest og festival, men sjældent noget, du bruger hver dag.</p>
<h3>Vandfast eller almindelig</h3>
<p>Vandfast mascara holder bedre på stranden, til bryllup eller i regnvejr, men den kræver en olie- eller makeupfjerner, der kan opløse den. Almindelig mascara er lettere at fjerne og skåner vipperne mere i hverdagen.</p>
<h3>Sarte øjne og kontaktlinser</h3>
<p>Har du sarte øjne, kan du kigge efter mascaraer, der er allergicertificerede. Det betyder ikke, at ingen kan reagere, men der er taget højde for de mest almindelige allergener. Reagerer du på et produkt, så stop med at bruge det og tal med din læge.</p>
<h3>Sådan får du mest ud af mascaraen</h3>
<p>Start ved rodene, og træk op mod spidserne. Pump ikke børsten op og ned i tuben, for så kommer der luft ind, og mascaraen tørrer hurtigere ud. Skift mascara hver tredje til sjette måned, og del den aldrig med andre. Fjern altid makeup om aftenen med en blid fjerner.</p>
HTML,
	'faq'      => [
		[ 'Hvilken mascara er bedst til tynde vipper?', 'Vælg en volumenmascara med en tyk børste, og byg lagene langsomt op. Lad hvert lag tørre kort, så vipperne ikke klistrer sammen.' ],
		[ 'Hvor tit skal jeg skifte mascara?', 'Mange skifter hver tredje til sjette måned, fordi mascara tørrer ud, og bakterier kan opstå, når tuben er åben. Hold øje med emballagen, der ofte viser, hvor længe produktet kan holde efter åbning.' ],
		[ 'Er vandfast mascara skidt for vipperne?', 'Den er ikke skidt i sig selv, men den kræver en kraftigere fjerner. Brug en blid, oliebaseret fjerner, og undgå at gnubbe.' ],
		[ 'Hvad betyder allergicertificeret mascara?', 'Det betyder, at produktet er vurderet af en tredjepart med fokus på allergivenlighed. Har du en kendt allergi, så læs altid indholdsfortegnelsen.' ],
	],
];
