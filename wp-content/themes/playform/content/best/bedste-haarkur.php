<?php
/**
 * Ny guide: bedste hårkur. Artikelfoto: Pexels 7020353.
 * Fakta om produkterne kommer kun fra produktdata (feed 24. nov. 2026). Vi har ikke selv afprøvet produkterne.
 */
defined( 'ABSPATH' ) || exit;

return [
	'slug'     => 'bedste-haarkur',
	'date'     => '2026-11-24 10:00:00',
	'keyword'  => 'hårkur',
	'title'    => 'Bedste hårkur: Vores bud på de 5 bedste hårkure og hårmasker',
	'excerpt'  => 'Tørt, krøllet eller slidt hår trænger til mere end balsam. Her er vores bud på den bedste hårkur fra de butikker, vi samarbejder med – fra budgetvenlig argan til repair-behandling.',
	'more_cat' => '',
	'intro'    => <<<'HTML'
<p>Shampoo renser, balsam glatter, men en hårkur giver håret det ekstra, det mangler, når det føles tørt, stridt eller trætte spidser driller. Den sidder i håret i nogle minutter, og forskellen kan mærkes allerede i bruseren.</p>
<p>Her er vores bud på den bedste hårkur fra de butikker, vi samarbejder med. Du får et spænd fra en prisvenlig klassiker til en luksuriøs repair-maske, så der er noget til både krøller, farvet hår og hverdagshår. Nederst finder du et lille købsråd, så du kan vælge efter dit hår og ikke efter emballagen.</p>
HTML,
	'picks'    => [
		[
			'ean'     => '3574661685144',
			'price'   => 69,
			'name'    => 'OGX Argan Oil of Morocco Hair Mask 300 ml',
			'role'    => 'Bedst til prisen',
			'reviews' => [],
			'verdict' => 'Stor 300 ml-pakke med argan oil of Morocco til en overkommelig pris – god til dig, der bruger hårkur ofte.',
			'why'     => <<<'HTML'
<p>Vil du have en hårkur, der ikke æder budgettet, er OGX Argan Oil of Morocco et oplagt sted at starte. Den kommer i en stor 300 ml-krukke, så du kan bruge den generøst, uden at skulle tænke på, om den slipper op efter tre gange.</p>
<p>Seriens varemærke er argan oil, og masken hører til i samme familie som shampoo og balsam, så du kan bygge en hel rutine op omkring den. Den passer godt til dig, der gerne vil have en fast ugentlig hårkur uden at betale for luksus.</p>
<p>Vælger du den, så giv den et par minutter i håret, før du skyller, og brug mest i længderne.</p>
HTML,
			'good'    => [ 'Dig, der vil have meget for pengene', 'Fast ugentlig hårkur', 'Dem, der gerne vil prøve en hårmaske første gang' ],
			'less'    => [ 'Dig, der leder efter en specialiseret repair-behandling' ],
		],
		[
			'ean'     => '5745001156114',
			'price'   => 149,
			'name'    => 'Skøndinavia Hair Mask 175 ml',
			'role'    => 'Bedst samlet',
			'reviews' => [],
			'verdict' => 'Vegansk hårkur med havreolie og B-vitaminer, der giver fugt til tørt hår og modvirker frizz.',
			'why'     => <<<'HTML'
<p>Skøndinavia Hair Mask er vores favorit, hvis du har tørt hår, der gerne vil have fugt og ro på. Den er vegansk, og formlen bygger på havreolie og B-vitaminer.</p>
<p>Masken er skabt til at give intens fugt, pleje beskadigede hårfibre og tæmme frizz, så håret føles glattere og er lettere at rede ud. Det gør den god til hverdagshår, der er blevet slidt af varme, vind og børstning.</p>
<p>Prisen ligger i midterfeltet, og 175 ml rækker langt, fordi du bruger den som kur og ikke hver dag.</p>
HTML,
			'good'    => [ 'Tørt og stridt hår', 'Frizz og rodet hår', 'Dig, der foretrækker veganske produkter' ],
			'less'    => [ 'Meget fedtet hovedbund, hvor du kun skal bruge den i længderne' ],
		],
		[
			'ean'     => '5707644931152',
			'price'   => 149,
			'name'    => 'Meraki Hair Mask Soft Allure 200 ml',
			'role'    => 'Til krøller',
			'reviews' => [],
			'verdict' => 'Nærende hårmaske med sheasmør og hvedeprotein, der gør krøller bløde og lette at style.',
			'why'     => <<<'HTML'
<p>Krøller elsker fugt, og netop det får de i Meraki Soft Allure. Formlen indeholder sheasmør og hvedeprotein og er lavet til at give håret ny glans og blødhed.</p>
<p>Den rige tekstur gør håret nemmere at style, så du kan få krøllerne til at falde pænere uden at kæmpe med dem. Ovenikøbet har den varme duftnoter af sandeltræ og cedertræ, som gør brusebadet til en lille wellness-stund.</p>
<p>Er dit hår bølget, krøllet eller kruset, er det en maske, du bør have med på listen.</p>
HTML,
			'good'    => [ 'Krøller og bølger', 'Hår, der ofte føles stridt', 'Dig, der går op i duft' ],
			'less'    => [ 'Meget fint, glat hår, som nemt bliver tungt' ],
		],
		[
			'ean'     => '0810121312162',
			'price'   => 232,
			'name'    => 'Innersense Repair Mask 177 ml',
			'role'    => 'Til slidt hår',
			'reviews' => [],
			'verdict' => 'Repair-maske med moringaprotein og vitamin C, der hjælper med at forsegle spaltede spidser og reducere brud.',
			'why'     => <<<'HTML'
<p>Har dit hår været igennem blegning, varme og børstning, kan en repair-maske gøre en mærkbar forskel. Innersense Repair Mask bygger på moringaprotein og vitamin C og er lavet til at forsegle spaltede spidser og reducere brud.</p>
<p>Resultatet er hår, der føles mere silkebløde og velplejet, og som er klar til dagen. Den er dyr i forhold til hverdagsmaskerne, men du bruger den som en behandling og ikke hver dag.</p>
<p>Vil du investere i dit hår, når det er slidt, er den et godt sted at lægge pengene.</p>
HTML,
			'good'    => [ 'Slidt og skadet hår', 'Spaltede spidser', 'Brud i længderne' ],
			'less'    => [ 'Dig, der leder efter den billigste løsning' ],
		],
		[
			'ean'     => '0810177860273',
			'price'   => 195,
			'name'    => 'Olaplex No. 3PLUS Complete Repair Treatment 100 ml',
			'role'    => 'Det kendte navn',
			'reviews' => [],
			'verdict' => 'Kendt hårbehandling fra Olaplex, som du bruger som kur i længder og spidser.',
			'why'     => <<<'HTML'
<p>Olaplex har et stort navn i hårverdenen, og No. 3PLUS er en af de mest kendte behandlinger fra mærket. Den hører især til i rutinen hos dig, der ofte farver eller varmestyler håret og vil passe på det.</p>
<p>Flasken er på 100 ml. Du bruger den som en kur og ikke som daglig balsam, så den rækker længere, end størrelsen antyder. Følg altid brugsanvisningen på emballagen.</p>
<p>Vil du have et produkt fra et mærke, mange kender, er den et trygt valg.</p>
HTML,
			'good'    => [ 'Farvet og varmestylet hår', 'Dig, der vil have en fast behandlingsrutine' ],
			'less'    => [ 'Dig, der leder efter en ren fugtkur til tørt hår' ],
		],
	],
	'guide'    => <<<'HTML'
<h2>Sådan vælger du den bedste hårkur</h2>
<p>Den bedste hårkur er den, der passer til dit hår lige nu. Hår ændrer sig med årstiden, med farve og med den varme, du udsætter det for. Se alle <a href="/haarpleje/">hårplejeprodukter</a> fra de butikker, vi samarbejder med, hvis du vil have flere at vælge imellem.</p>
<h3>Hårkur, hårmaske og balsam – hvad er forskellen?</h3>
<p>Hårkur og hårmaske er i praksis det samme: en tykkere, mere nærende pleje, der sidder i håret i flere minutter. Balsam bruger du hver gang du vasker hår, og den er lettere. En kur bruger du typisk en gang om ugen eller hver anden uge.</p>
<h3>Vælg efter dit hår</h3>
<ul>
<li><b>Tørt hår:</b> vælg en fugtgivende maske med olier eller smør.</li>
<li><b>Krøllet hår:</b> vælg en rig maske, der hjælper krøllerne med at holde formen.</li>
<li><b>Farvet eller slidt hår:</b> vælg en repair-maske, der hjælper mod brud og spaltede spidser.</li>
<li><b>Fint hår:</b> vælg en let formel og brug den kun i længderne, så håret ikke bliver tungt.</li>
</ul>
<h3>Sådan bruger du en hårkur</h3>
<p>Vask håret, pres vandet ud, og fordel kuren i længder og spidser. Lad den sidde, så længe producenten anbefaler, og skyl grundigt. Brug en bred kam til at fordele den. Har du fedtet hovedbund, så hold dig fra roden.</p>
<h3>Hvor ofte skal du bruge en hårkur?</h3>
<p>De fleste bruger en hårkur en gang om ugen. Har du meget tørt eller skadet hår, kan du bruge den oftere i en periode. Mærker du, at håret bliver tungt eller fladt, så brug den sjældnere.</p>
<p>Husk at kombinere kuren med en shampoo og balsam, der passer til dit hår. Du finder flere bud under <a href="/haarpleje/">hårpleje</a>.</p>
HTML,
	'faq'      => [
		[ 'Hvor ofte skal jeg bruge hårkur?', 'De fleste bruger en hårkur en gang om ugen. Har du meget tørt eller slidt hår, kan du bruge den lidt oftere i en periode. Følg altid producentens anvisning.' ],
		[ 'Er hårkur og hårmaske det samme?', 'I praksis ja. Begge dele er en tykkere pleje, der sidder i håret i nogle minutter, før du skyller den ud.' ],
		[ 'Skal jeg bruge hårkur på hele håret?', 'Fordel den i længder og spidser, som ofte er de tørreste dele. Har du tørt hår helt op, kan du tage lidt længere op, men undgå roden, hvis hovedbunden er fedtet.' ],
		[ 'Kan jeg bruge hårkur på fint hår?', 'Ja, men vælg en let formel og brug mindre. Så undgår du, at håret bliver tungt og fladt.' ],
	],
];
