<?php
/**
 * Omskrevet fra det gamle myappeal.dk (/mini-glattejern/, 2022). Ny tekst og nye produkter.
 * Kun 3 modeller: feedsne havde 9. nov. 2026 kun tre små rejse-glattejern med EAN på lager (Beurer HS20, Skinvibe Luna Mini, Mikamax Mini).
 * Skinvibe ligger i Proshops kategori "Haartoerrer" – den skal være med i Proshops category_map ('haartoerrer' => '?haarstyling').
 * Fakta om produkterne kommer kun fra butikkernes produktdata. Vi har ikke selv afprøvet produkterne.
 */
defined( 'ABSPATH' ) || exit;

return [
	'slug'     => 'mini-glattejern',
	'date'     => '2022-06-06 10:00:00',
	'keyword'  => 'mini-glattejern',
	'title'    => 'Mini-glattejern: Vores bud på de 3 bedste til rejsen og tasken',
	'excerpt'  => 'Et mini-glattejern fylder næsten ingenting og redder frisuren på rejsen, i fitnesscentret eller før festen. Her er vores bud på de 3 bedste fra de butikker, vi samarbejder med.',
	'more_cat' => 'glattejern',
	'intro'    => <<<'HTML'
<p>Kender du det? Håret sad fint, da du gik hjemmefra, men efter en regnbyge, en lang flytur eller en time i fitnesscentret er pandehåret krøllet, og spidserne stritter. Et almindeligt glattejern bliver derhjemme, fordi det er for stort til tasken. Det er her, et mini-glattejern gør en forskel.</p>
<p>Et lille glattejern er lavet til at blive pakket ned. Nogle kører på batteri, andre får strøm fra et USB-stik, så du ikke skal lede efter en stikkontakt ved spejlet. Herunder finder du vores bud på de 3 bedste fra de butikker, vi samarbejder med – og nederst får du råd om, hvad du skal kigge efter, før du vælger.</p>
HTML,
	'picks'    => [
		[
			'ean'     => '4211125593315',
			'price'   => 444,
			'name'    => 'Beurer HS20',
			'role'    => 'Bedst samlet',
			'reviews' => [],
			'verdict' => 'Kompakt og genopladeligt glattejern uden ledning, med 3 temperaturtrin – lavet til at ligge i kufferten.',
			'why'     => <<<'HTML'
<p>Beurer HS20 er det sikre valg, hvis du vil have et lille glattejern, der bare virker, uanset hvor du er. Det er opladeligt og ledningsfrit, så du kan glatte en lok foran spejlet på hotellet, i toget eller på kontorets toilet uden at tænke på en stikkontakt.</p>
<p>Størrelsen er kompakt, og det er tydeligt designet til rejsebrug. Du får 3 temperaturtrin at vælge imellem, så du kan skrue ned, hvis dit hår er fint, og op, hvis det er tykkere.</p>
<p>Det er ikke et apparat til at glatte hele manken hver morgen. Det er din lille redningsmand, når frisuren skal friskes op i løbet af dagen.</p>
HTML,
			'good'    => [ 'Rejser og weekendture', 'Touch-ups uden stikkontakt', 'Dig, der vil kunne justere varmen' ],
			'less'    => [ 'Dig, der vil glatte langt, tykt hår fra bunden' ],
		],
		[
			'ean'     => '5906700304729',
			'price'   => 555,
			'name'    => 'Skinvibe Luna Mini Wireless',
			'role'    => 'Flest funktioner',
			'reviews' => [],
			'verdict' => 'Trådløst mini-glattejern med op til 50 minutters batteri, 3 temperaturer, indbygget kam og display.',
			'why'     => <<<'HTML'
<p>Skinvibe Luna Mini er til dig, der gerne vil have lidt mere udstyr med i tasken. Batteriet holder op til 50 minutter, og det er godt nok til flere hurtige opfriskninger i løbet af en ferie, før du skal lade op.</p>
<p>Du vælger mellem 165, 185 og 210 °C, og et LCD-display viser, hvad du har valgt. Det giver ro i maven, når du vil passe på håret. Den indbyggede kam reder ud, mens pladerne glatter, så du slipper for at have en ekstra børste med.</p>
<p>Jernet varmer hurtigt op, og det er en fordel, når du står i en travl lufthavn eller skal videre fra fitnesscentret med det samme.</p>
HTML,
			'good'    => [ 'Lange ferier', 'Dig, der vil se temperaturen', 'Udredning og glatning i ét' ],
			'less'    => [ 'Dig, der vil holde budgettet helt nede' ],
		],
		[
			'ean'     => '8721154050216',
			'price'   => 129,
			'name'    => 'Mikamax Mini USB-glattejern',
			'role'    => 'Mindste budget',
			'reviews' => [],
			'verdict' => 'Slankt og let USB-glattejern op til 190 °C, med rejseetui og USB-kabel i æsken.',
			'why'     => <<<'HTML'
<p>Mikamax Mini er det billige og enkle bud. Det får strøm via USB, så du kan sætte det i en powerbank, en computer eller en USB-oplader. Det er smart, når du er ude at rejse og ikke vil slæbe adaptere med.</p>
<p>Jernet varmer op til 190 °C, og det slanke og lette design gør det nemt at have i en lille taske. Der følger et rejseetui med, så resten af tasken er beskyttet, og et USB-kabel, så du er klar fra start.</p>
<p>Det er et godt valg som ekstra glattejern til gymnastiktasken eller som første mini-glattejern, hvis du vil finde ud af, om du får brug for det.</p>
HTML,
			'good'    => [ 'Gymnastiktasken', 'Strøm fra powerbank eller computer', 'Lille budget' ],
			'less'    => [ 'Dig, der vil vælge mellem flere varmetrin' ],
		],
	],
	'guide'    => <<<'HTML'
<h2>Hvorfor vælge et mini-glattejern?</h2>
<p>Et mini-glattejern har kortere og smallere plader end et almindeligt jern. Det gør det let at pakke, og det er nemt at styre helt tæt ved hovedbunden, i pandehåret og i korte frisurer. Du bruger det til at rette op på det, der er gået skævt i løbet af dagen – ikke til at glatte hele håret fra bunden. Har du brug for det, så find et fuldt <a href="/haarstyling/glattejern/">glattejern</a> til hjemmet.</p>
<h3>Batteri, USB eller ledning?</h3>
<p>Et jern med indbygget batteri giver mest frihed, fordi du ikke er afhængig af en stikkontakt. Til gengæld skal det lades op, og batteritiden sætter en grænse. Et USB-jern er afhængigt af en strømkilde, men den kan være en powerbank i tasken. Find flere modeller under <a href="/haarstyling/traadloes-haarstyling/">trådløs hårstyling</a>.</p>
<h3>Varme og kontrol</h3>
<p>Fint eller farvet hår har det bedst med lavere varme, mens tykt hår kan kræve mere. Et jern med flere temperaturtrin giver dig mulighed for at finde det niveau, der virker for dit hår. Brug et produkt med <a href="/haarpleje/varmebeskyttelse/">varmebeskyttelse</a> først – en lille rejseflaske fylder ikke meget.</p>
<h3>Et mini-glattejern kan også bruges til krøller</h3>
<p>De smalle plader gør det overraskende nemt at lave bløde bølger. Tag en tynd tot, drej jernet en halv omgang væk fra ansigtet, og træk langsomt nedad. Jo langsommere du trækker, jo mere fast bliver bølgen. Til store, løse krøller hjemme er et jern med tyk stang dog lettere – se vores guide til <a href="/kroellejern-til-store-kroeller/">krøllejern til store krøller</a>. Drømmer du om små, tætte krøller, så se <a href="/bedste-pigkroellejern/">pigkrøllejern</a>.</p>
<h3>Sådan passer du på det</h3>
<p>Lad jernet køle helt af, før det kommer i etuiet, og tør pladerne af med en tør klud, når de er kolde. Rester af stylingprodukter brænder fast og kan gøre glidet ringere. Et jern med batteri har godt af at blive opladet efter producentens anvisning, også når det ligger stille mellem rejserne.</p>
HTML,
	'faq'      => [
		[ 'Må jeg have et mini-glattejern med i flyet?', 'Det må du som regel, men flyselskaberne har særlige regler for apparater med indbygget batteri, og de kan være forskellige. Tjek dit flyselskabs regler, før du pakker.' ],
		[ 'Kan et mini-glattejern erstatte mit almindelige glattejern?', 'Til kort hår og pandehår kan det godt. Har du langt eller tykt hår, tager det lang tid med de små plader, så her er et mini-glattejern bedst som supplement til touch-ups.' ],
		[ 'Hvad er forskellen på et USB-glattejern og et trådløst?', 'Et trådløst glattejern har et batteri, der skal lades op, og kan bruges hvor som helst. Et USB-glattejern skal være tilsluttet en strømkilde, mens du bruger det, men den kan være en powerbank.' ],
		[ 'Kan jeg lave krøller med et mini-glattejern?', 'Ja, du kan lave bløde bølger ved at dreje jernet en halv omgang og trække det langsomt ned gennem en tynd tot hår.' ],
	],
];
