<?php
/**
 * Introtekster, SEO-tekster og FAQ til kategorierne og underkategorierne (landingssiderne) på skønhedssitet.
 * Kun generel købsrådgivning – ingen påstande om konkrete produkter og ingen opfundne tal (projektregel 2).
 * Ingen sundhedsløfter eller medicinske påstande; henvis til producentens anvisninger og evt. læge/hudlæge.
 * Seedes af playform_seed_category_texts() og kan derefter rettes under Produkter › Kategorier.
 * Tomme felter udfyldes ved næste udrulning, felter med tekst røres aldrig (redaktørens rettelser vinder).
 * Formuleringerne er skrevet til dette site og må ikke kopieres til søstersitesne (duplicate content).
 *
 * @return array<string,array{intro?:string,seo?:string,faq?:array<int,array{0:string,1:string}>}>
 */

defined( 'ABSPATH' ) || exit;

return [
	// Hovedkategorier.
	'haarstyling'  => [
		'intro' => 'Hårtørrere, glattejern, krøllejern, varmluftsbørster og multistylere samlet ét sted. Find det værktøj, der passer til dit hår og din rutine – fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Hårstyling – vælg værktøj efter dit hår, ikke efter reklamen</h2><p>Det rigtige stylingapparat gør hverdagen lettere og skåner håret. Her har vi samlet hårtørrere, jern og børster fra de butikker, vi samarbejder med, så du kan sammenligne udvalg, priser og lagerstatus uden at hoppe mellem sider. Når du har fundet din favorit, klikker du videre og handler hos butikken.</p><h3>Start med hårtypen</h3><p>Fint hår bliver hurtigt tørt og fladt, så her giver det mening med justerbar varme og et skånsomt apparat. Tykt eller krøllet hår kræver mere kraft og tid. En god <a href="/haarstyling/haartoerrer/">hårtørrer</a> med flere varme- og blæsetrin er grundstenen for de fleste, og den kan ofte suppleres med en diffuser til krøller.</p><h3>Glat, krøllet eller med volumen?</h3><p>Vil du have glat og blankt hår, er et <a href="/haarstyling/glattejern/">glattejern</a> det klassiske valg. Drømmer du om bølger og lokker, så se på <a href="/haarstyling/kroellejern/">krøllejern</a> i forskellige tykkelser. En <a href="/haarstyling/varmluftsboerste/">varmluftsbørste</a> tørrer og former på én gang, mens en <a href="/haarstyling/multistyler/">multistyler</a> samler flere funktioner i ét apparat.</p><h3>Pas på håret undervejs</h3><p>Varme slider på håret, så brug altid et varmebeskyttende produkt, før du styler. Du finder det under <a href="/haarpleje/varmebeskyttelse/">varmebeskyttelse</a>. Vælg en temperatur, der passer til dit hår, og lad være med at gå over den samme lok mange gange.</p><h3>Praktiske detaljer</h3><p>Se efter en lang, drejelig ledning, automatisk slukning og et varmebestandigt etui, hvis du rejser meget. Er du ofte på farten, kan <a href="/haarstyling/traadloes-haarstyling/">trådløs hårstyling</a> være værd at overveje.</p><h3>Sammenlign, før du vælger</h3><p>Prisen på stylingapparater spænder vidt, og et dyrt apparat er ikke automatisk det rigtige for dig. Se på de funktioner, du faktisk får brug for, og læs, hvad producenten skriver om hårtyper. Brug filtrene på siden til at sortere efter pris og mærke, og hold øje med butikkernes egne tilbud.</p>',
		'faq'   => [
			[ 'Hvilket stylingapparat skal jeg starte med?', 'For de fleste er en god hårtørrer det første køb. Derefter afhænger det af, hvilken stil du vil have: glattejern til glat hår, krøllejern til lokker eller en varmluftsbørste til volumen.' ],
			[ 'Er det nødvendigt med varmebeskyttelse?', 'Ja, det er en god vane. Et varmebeskyttende produkt lægger sig om håret og gør det mindre udsat, når du bruger føn, jern eller børste.' ],
			[ 'Hvilken temperatur skal jeg bruge?', 'Fint og skrøbeligt hår har det bedst med lav varme, mens tykt hår ofte kræver mere. Begynd lavt, og skru kun op, hvis håret ikke holder formen. Følg altid producentens anvisning.' ],
		],
	],
	'haarfjerning' => [
		'intro' => 'IPL, epilatorer, ladyshaves, voks og hårfjerningscreme – find den metode, der passer til din hud og din tid. Udvalget kommer fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Hårfjerning – vælg den metode, der passer til din hverdag</h2><p>Der findes mange veje til glat hud, og ingen af dem er rigtige for alle. Nogle vil have det hurtigt, andre vil have længe mellem gangene. Her har vi samlet produkter til hårfjerning fra de butikker, vi samarbejder med, så du kan se udvalget og priserne side om side. Selve købet foregår hos butikken.</p><h3>Hurtigt og enkelt</h3><p>En <a href="/haarfjerning/ladyshave/">ladyshave eller bikinitrimmer</a> klipper eller barberer håret ved overfladen. Det går stærkt og gør sjældent ondt, men håret vokser hurtigt ud igen. <a href="/haarfjerning/haarfjerningscreme/">Hårfjerningscreme</a> opløser håret ved overfladen og er nem at bruge på større områder. Lav altid en lille prøve på huden først.</p><h3>Længere tid mellem gangene</h3><p>En <a href="/haarfjerning/epilator/">epilator</a> og <a href="/haarfjerning/voks/">voks</a> trækker hårene op med roden, så der går længere tid, før de kommer igen. Det kan føles ubehageligt de første gange, men mange vænner sig til det.</p><h3>IPL til hjemmebrug</h3><p><a href="/haarfjerning/ipl/">IPL-apparater</a> bruger lysglimt og er lavet til at mindske hårvæksten over tid ved regelmæssig brug. Resultatet afhænger af hårfarve og hudtype, og ikke alle kan bruge det. Læs producentens anvisninger grundigt, og spørg en læge eller hudlæge, hvis du er i tvivl.</p><h3>Tænk på huden før og efter</h3><p>Uanset metode har huden godt af lidt omsorg. Fjern døde hudceller et par dage før, så hårene lettere kan fanges, og undgå at fjerne hår på irriteret eller solskoldet hud. Bagefter kan en mild, uparfumeret creme berolige huden. Indgroede hår kan ofte undgås med en let <a href="/kropspleje/kropsscrub/">bodyscrub</a> en gang imellem. Brug filtrene på siden til at finde apparater i dit prisleje, og se butikkernes egne tilbud.</p>',
		'faq'   => [
			[ 'Hvilken hårfjerningsmetode holder længst?', 'Metoder, der fjerner håret med roden, som epilator og voks, giver typisk længere tid mellem gangene end barbering og creme. IPL virker på en anden måde og kræver regelmæssig brug over tid.' ],
			[ 'Gør det ondt at bruge en epilator?', 'Mange oplever det som ubehageligt i starten, især på følsomme områder. Det bliver ofte lettere med tiden. Et varmt bad før kan gøre det mere behageligt.' ],
			[ 'Kan alle bruge IPL?', 'Nej. IPL egner sig ikke til alle hår- og hudtyper, og der er situationer, hvor det frarådes. Læs producentens anvisninger, og tal med en læge eller hudlæge, hvis du har mørk hud, en hudsygdom eller er gravid.' ],
		],
	],
	'tandpleje'    => [
		'intro' => 'Eltandbørster, børstehoveder, vandflossere, tandpasta og tandtråd – alt til den daglige tandpleje. Sammenlign udvalget fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Tandpleje – gode vaner begynder med det rigtige udstyr</h2><p>Grundig børstning og rengøring mellem tænderne er kernen i en god tandplejerutine. Her har vi samlet tandbørster, tilbehør og plejeprodukter fra de butikker, vi samarbejder med, så du let kan finde det, du mangler. Når du har valgt, handler du direkte hos butikken.</p><h3>Manuel eller elektrisk?</h3><p>Begge kan gøre arbejdet, hvis du børster grundigt nok. Mange synes dog, at en <a href="/tandpleje/el-tandboerste/">eltandbørste</a> gør det lettere at holde fast i en god teknik, fordi den gør bevægelserne for dig. Funktioner som tidsur og trykføler kan hjælpe dig med at børste længe nok og ikke for hårdt.</p><h3>Glem ikke mellemrummene</h3><p>Tandbørsten når ikke helt ind mellem tænderne. Her kan tandtråd, mellemrumsbørster eller en <a href="/tandpleje/vandflosser/">vandflosser</a> hjælpe. Find dit favoritprodukt under <a href="/tandpleje/tandpasta-og-tandtraad/">tandpasta og tandtråd</a>.</p><h3>Husk at skifte hoved</h3><p>Slidte børstehår gør et dårligere stykke arbejde. Hav nogle ekstra <a href="/tandpleje/boerstehoveder/">børstehoveder</a> liggende, og tjek, at de passer til netop dit håndtag. Til de mindste finder du <a href="/tandpleje/boerne-tandboerste/">tandbørster til børn</a>.</p><h3>Spørg din tandlæge</h3><p>Har du følsomme tænder, tandkødsproblemer eller bøjle, så spørg din tandlæge eller tandplejer, hvilket udstyr der passer bedst til dig.</p><h3>Tandpasta og tandblegning</h3><p>Vælg en tandpasta, der passer til dine behov, fx til følsomme tænder eller til børn. Drømmer du om et hvidere smil, findes der produkter til <a href="/tandpleje/tandblegning/">tandblegning</a> derhjemme. Følg anvisningen nøje, og spørg din tandlæge først, hvis du har følsomme tænder, fyldninger eller kroner. Husk også, at gode vaner som regelmæssig børstning og besøg hos tandlægen er grundlaget for en sund mund.</p><h3>Sådan bruger du siden</h3><p>Brug filtrene til at sortere efter pris og mærke, og sammenlign håndtag og tilbehør side om side. Sælger flere butikker samme produkt, viser vi priserne i en liste, så du kan vælge den, der passer dig.</p>',
		'faq'   => [
			[ 'Er en eltandbørste bedre end en almindelig tandbørste?', 'Mange finder det lettere at børste grundigt med en eltandbørste, men en manuel tandbørste kan også give et godt resultat med den rigtige teknik. Spørg din tandlæge, hvis du er i tvivl.' ],
			[ 'Hvor tit skal jeg skifte børstehoved?', 'Følg producentens anbefaling, og skift også, når børstehårene begynder at sprede sig. Slidte hår rengør dårligere.' ],
			[ 'Kan en vandflosser erstatte tandtråd?', 'En vandflosser er et godt supplement til at rense mellem tænderne, og nogle foretrækker den frem for tandtråd. Din tandlæge kan rådgive dig om, hvad der passer til dine tænder.' ],
		],
	],
	'barbering'    => [
		'intro' => 'Barbermaskiner, skægtrimmere, hårklippere, skrabere og skægpleje – til både glatbarberet, kort stub og fuldskæg. Se udvalget fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Barbering og skæg – find dit værktøj</h2><p>Om du vil være helt glat, holde en kort stub eller pleje et langt skæg, så handler det om at vælge værktøj efter din stil og din hud. Her har vi samlet maskiner, trimmere og plejeprodukter fra de butikker, vi samarbejder med. Du sammenligner her og handler hos butikken.</p><h3>Glatbarberet</h3><p>En <a href="/barbering/barbermaskine/">barbermaskine</a> er hurtig og nem i hverdagen, og mange kan bruges både tørt og vådt. Foretrækker du det klassiske, giver en <a href="/barbering/barberskraber/">barberskraber</a> en tæt barbering, især sammen med godt <a href="/barbering/barberskum/">barberskum eller barbergel</a>.</p><h3>Stub og skæg</h3><p>En <a href="/barbering/skaegtrimmer/">skægtrimmer</a> med flere længder gør det let at holde en ensartet stub eller forme skægget. Til håret på hovedet er en <a href="/barbering/haartrimmer/">hårtrimmer eller hårklipper</a> det rigtige valg. En <a href="/barbering/multitrimmer/">multitrimmer</a> samler flere opgaver i ét sæt.</p><h3>Pleje før og efter</h3><p>Har du sart hud, kan det hjælpe at forberede skægget og pleje huden bagefter. Se <a href="/barbering/aftershave/">aftershave</a> og <a href="/barbering/skaegpleje/">skægpleje</a> med olie og balm. Husk også at skifte <a href="/barbering/barberhoveder/">barberhoveder og blade</a>, når de bliver sløve.</p><h3>Med ledning eller trådløs</h3><p>De fleste maskiner og trimmere kører i dag på et genopladeligt batteri, så du kan bruge dem, hvor du vil. Se på, hvor lang tid batteriet holder, og om maskinen kan bruges, mens den lader. Skal du ofte rejse, er en lille rejseetui og en universel oplader praktisk. En vandtæt maskine er nem at skylle ren under hanen.</p><h3>Skæg og hud er forskellige</h3><p>Ingen barbering passer til alle. Har du kraftigt skæg, krøllede hår eller sart hud, kan det betale sig at prøve forskellige metoder. Sammenlign modeller og priser her, og se butikkernes egne tilbud.</p>',
		'faq'   => [
			[ 'Barbermaskine eller skraber – hvad skal jeg vælge?', 'En barbermaskine er hurtig og skånsom mod huden for mange, mens en skraber ofte giver en tættere barbering. Har du sart hud, kan det betale sig at prøve dig frem.' ],
			[ 'Hvad er forskellen på en skægtrimmer og en hårklipper?', 'En skægtrimmer er lavet til korte længder og præcise linjer i ansigtet. En hårklipper har typisk et bredere skær og længere kamme til håret på hovedet.' ],
			[ 'Hvordan undgår jeg irriteret hud efter barbering?', 'Brug et skarpt blad eller et rent skær, barber med hårets retning, og brug barberskum eller gel. Afslut med en mild aftershave eller creme.' ],
		],
	],
	'negle'        => [
		'intro' => 'Neglelak, gellak, UV-lamper, neglepleje og kunstige negle – til manicure derhjemme. Find farver og værktøj fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Negle – gør manicuren hjemme</h2><p>Flotte negle kræver ikke en tid i salonen. Med lidt øvelse og det rigtige udstyr kan du selv lave en pæn manicure. Her har vi samlet lak, lamper og værktøj fra de butikker, vi samarbejder med, så du kan se udvalget ét sted og handle hos butikken.</p><h3>Almindelig lak eller gellak?</h3><p>Klassisk <a href="/negle/neglelak/">neglelak</a> tørrer i luften, er let at fjerne og oplagt, hvis du ofte skifter farve. <a href="/negle/gellak/">Gellak</a> hærder under en lampe og holder typisk længere uden skår. Til gellak skal du bruge en <a href="/negle/uv-lampe/">UV-lampe til negle</a>.</p><h3>Grundlaget betyder meget</h3><p>Pæne negle starter med god pleje. Fil neglene i form, skub neglebåndene tilbage, og giv dem lidt olie. Du finder filer, saks og olie under <a href="/negle/neglepleje/">neglepleje og værktøj</a>. Base coat og top coat beskytter neglen og får lakken til at holde bedre.</p><h3>Lidt ekstra</h3><p>Vil du have længde eller mønstre uden at vente, så se på <a href="/negle/kunstige-negle/">kunstige negle og neglepynt</a>. Det er en nem måde at prøve en ny stil af til en fest.</p><h3>Sund neglepleje</h3><p>Neglene har det bedst, når de får pauser og pleje. Smør negle og neglebånd med negleolie eller en fed creme, især om vinteren. Brug handsker, når du gør rent, og fil neglene i én retning for at undgå flækker. Har du skøre negle eller ændringer i neglene, der ikke går væk, så spørg din læge. Brug filtrene på siden til at finde farver og værktøj i dit prisleje, og hold øje med butikkernes egne tilbud.</p><p>Er du i tvivl om, hvor du skal starte, så begynd med en base coat, en farve og en top coat. Det er nok til en flot manicure.</p>',
		'faq'   => [
			[ 'Hvad skal jeg bruge for at lave gellak derhjemme?', 'Du skal bruge base, farve og top coat beregnet til gel samt en lampe, der kan hærde dem. Læs altid producentens anvisning, så du bruger lampen rigtigt.' ],
			[ 'Hvordan får jeg neglelakken til at holde længere?', 'Start med rene og tørre negle, brug base coat, lak i tynde lag, og afslut med top coat. Giv hvert lag tid til at tørre.' ],
			[ 'Skader gellak neglene?', 'Det afhænger meget af, hvordan den fjernes. Riv den aldrig af, men følg producentens metode, og giv gerne neglene en pause med pleje ind imellem.' ],
		],
	],
	'parfume'      => [
		'intro' => 'Dameparfume, herreparfume, unisex-dufte, body mist og gavesæt. Find en ny signaturduft eller en gave – fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Parfume – find en duft, der føles som dig</h2><p>En duft er noget personligt, og det, der dufter dejligt på én, kan lugte helt anderledes på en anden. Her har vi samlet parfume fra de butikker, vi samarbejder med, så du kan sammenligne priser og størrelser. Selve købet sker hos butikken.</p><h3>Duftfamilier gør valget lettere</h3><p>Dufte inddeles ofte i familier som blomstrende, friske, træagtige og orientalske. Kender du en parfume, du godt kan lide, så se efter dufte i samme familie. Du kan gå på opdagelse i <a href="/parfume/dameparfume/">dameparfume</a>, <a href="/parfume/herreparfume/">herreparfume</a> og <a href="/parfume/unisex-parfume/">unisex parfume</a>.</p><h3>Eau de parfum eller eau de toilette?</h3><p>Forskellen ligger i, hvor koncentreret duften er. <a href="/parfume/eau-de-parfum/">Eau de parfum</a> er generelt mere intens og holder længere, mens <a href="/parfume/eau-de-toilette/">eau de toilette</a> er lettere og oplagt til hverdag. Vil du have noget helt let, så se på <a href="/parfume/body-mist/">body mist og hair mist</a>.</p><h3>Parfume som gave</h3><p>Kender du modtagerens favorit, er det nemt. Ellers kan et <a href="/parfume/parfume-gavesaet/">parfume gavesæt</a> være et godt bud, fordi det ofte rummer flere produkter i samme duft.</p><h3>Køb med omtanke</h3><p>En stor flaske er ofte billigere pr. milliliter, men kun hvis du faktisk bruger den, før duften ændrer sig. Er du ny med en duft, kan en mindre flaske være et klogt første køb. Opbevar parfumen mørkt og køligt, og undgå at lade den stå i et varmt badeværelse. Sammenlign størrelser og priser her, og se, om en af butikkerne har duften på tilbud lige nu.</p><h3>Dufte uden at overdrive</h3><p>En god duft skal mærkes, når nogen kommer tæt på, ikke fylde hele rummet. Start med få pust, og byg op. Til arbejde og i tætte rum er en lettere duft ofte et godt valg, mens aftenen giver plads til noget mere intenst.</p>',
		'faq'   => [
			[ 'Hvad er forskellen på eau de parfum og eau de toilette?', 'Eau de parfum har en højere koncentration af duftstoffer og holder typisk længere på huden. Eau de toilette er lettere og mere diskret.' ],
			[ 'Hvordan holder duften længst?', 'Spray på pulspunkter som håndled og hals, gerne på fugtet hud. Lad være med at gnide håndleddene mod hinanden, og opbevar flasken mørkt og køligt.' ],
			[ 'Kan mænd bruge dameparfume og omvendt?', 'Selvfølgelig. Opdelingen er mest en tradition. Vælg den duft, du selv kan lide, eller kig efter unisex-dufte.' ],
		],
	],
	'makeup'       => [
		'intro' => 'Foundation, concealer, mascara, læbestift, øjenskygge, børster og makeupspejle – til både hverdag og fest. Udvalget kommer fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Makeup – byg en rutine, der passer til dig</h2><p>Makeup kan være lidt farve i hverdagen eller et helt look til en aften i byen. Her har vi samlet makeup og redskaber fra de butikker, vi samarbejder med, så du kan sammenligne priser og nuancer. Når du har fundet det rigtige, handler du hos butikken.</p><h3>Base først</h3><p>En jævn base er grundlaget for resten. Vælg en <a href="/makeup/foundation/">foundation</a> efter din hudtype og den dækning, du ønsker, og brug <a href="/makeup/concealer/">concealer</a> der, hvor du har brug for lidt ekstra. En <a href="/makeup/primer-og-setting-spray/">primer eller setting spray</a> kan hjælpe makeuppen med at sidde bedre, og <a href="/makeup/pudder/">pudder</a> dæmper glans.</p><h3>Øjne og bryn</h3><p><a href="/makeup/mascara/">Mascara</a> er for mange det ene produkt, de ikke kan undvære. Suppler med <a href="/makeup/eyeliner/">eyeliner</a>, <a href="/makeup/oejenskygge/">øjenskygge</a> og <a href="/makeup/bryn/">brynprodukter</a>, alt efter hvor meget du vil fremhæve øjnene.</p><h3>Farve på kinder og læber</h3><p>Lidt <a href="/makeup/rouge-og-bronzer/">rouge eller bronzer</a> giver ansigtet liv. Find din yndlingsfarve blandt <a href="/makeup/laebestift/">læbestift og lipgloss</a>, og hold læberne bløde med <a href="/makeup/laebepleje/">læbepomade</a>.</p><h3>Redskaberne gør en forskel</h3><p>Gode <a href="/makeup/makeupboerster/">makeupbørster og svampe</a> og et godt <a href="/makeup/makeupspejl/">makeupspejl</a> gør det lettere at lægge makeup præcist. Rengør børster og svampe jævnligt.</p><h3>Tænk på huden under makeuppen</h3><p>Makeup sidder bedst på en velplejet hud. Giv huden fugt med en <a href="/hudpleje/dagcreme/">dagcreme</a> før makeup, og fjern alt om aftenen med en <a href="/hudpleje/ansigtsrens/">ansigtsrens eller makeupfjerner</a>. Har du sart hud eller allergi, så læs ingredienslisten, og vælg produkter uden parfume. Brug filtrene på siden til at sortere efter pris og mærke.</p><h3>Holdbarhed og hygiejne</h3><p>Makeup holder ikke evigt, når den er åbnet. Se symbolet med den åbne krukke på emballagen, og skift produkter, der har ændret lugt eller konsistens. Del helst ikke mascara og eyeliner med andre.</p>',
		'faq'   => [
			[ 'Hvordan finder jeg den rigtige nuance foundation?', 'Se på din hudtone og din undertone, altså om huden har et varmt, køligt eller neutralt skær. Sammenlign gerne med en foundation, du har brugt før, og se nuancen i dagslys.' ],
			[ 'Hvor længe holder makeup, når den er åbnet?', 'Mange produkter har et lille symbol med en åben krukke, der viser, hvor mange måneder produktet bør bruges inden for. Mascara bør skiftes ret ofte.' ],
			[ 'Hvor tit skal jeg rengøre mine makeupbørster?', 'Jævnligt – især børster til flydende produkter. Brug mild sæbe eller en børsterens, og lad dem tørre liggende.' ],
		],
	],
	'solcreme'     => [
		'intro' => 'Solcreme til ansigt, krop og børn, after sun og selvbruner. Vælg beskyttelse efter din hud og dine planer – fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Solcreme og selvbruner – beskyt huden, og få glød uden sol</h2><p>Solbeskyttelse er en vigtig del af hudplejen, både på stranden og i hverdagen. Her har vi samlet solcreme, after sun og selvbruner fra de butikker, vi samarbejder med, så du kan sammenligne udvalg og priser. Købet foregår hos butikken.</p><h3>Forstå solfaktoren</h3><p>SPF fortæller om beskyttelsen mod UVB-stråler. Mange vælger SPF 30 og 50, især i stærk sol eller til lys hud. Se også efter UVA-beskyttelse. Husk, at ingen solcreme beskytter fuldt ud – søg skygge, og brug tøj og hat midt på dagen.</p><h3>Ansigt, krop og børn</h3><p><a href="/solcreme/solcreme-til-ansigt/">Solcreme til ansigt</a> er ofte lettere og lavet til at kunne bruges under makeup. <a href="/solcreme/solcreme-til-krop/">Solcreme til krop</a> fås som lotion, spray og olie. Til de mindste findes <a href="/solcreme/solcreme-til-boern/">solcreme til børn</a>, og helt små børn bør helst holdes ude af direkte sol.</p><h3>Brug nok – og smør igen</h3><p>De fleste bruger mindre solcreme end anbefalet. Følg producentens anvisning, og smør igen efter badning, sved og håndklæde. Efter en dag i solen kan <a href="/solcreme/after-sun/">after sun</a> give huden fugt.</p><h3>Glød uden sol</h3><p>En <a href="/solcreme/selvbruner/">selvbruner</a> giver farve uden at du skal ligge i solen. Bemærk, at en selvbruner ikke beskytter mod solen.</p><h3>Tjek datoen</h3><p>Solcreme holder ikke evigt. Se efter holdbarheden på emballagen, og smid en åbnet flaske ud, hvis den har ændret konsistens eller lugt. Opbevar den køligt, og lad den ikke ligge i en varm bil. Sammenlign produkter og priser her, og se butikkernes egne tilbud før sommerferien.</p><p>Har du spørgsmål om solbeskyttelse til en hudsygdom, modermærker eller medicin, der gør huden lysfølsom, så tal med din læge eller en hudlæge.</p>',
		'faq'   => [
			[ 'Skal jeg vælge SPF 30 eller 50?', 'Det afhænger af din hud, hvor stærk solen er, og hvor længe du er ude. Til lys hud og stærk sol vælger mange SPF 50. Spørg en læge eller hudlæge, hvis du har en hudsygdom eller er særligt følsom.' ],
			[ 'Hvor tit skal jeg smøre solcreme på igen?', 'Følg producentens anvisning. Smør altid igen efter badning, kraftig sved, og når du har tørret dig med håndklæde.' ],
			[ 'Beskytter selvbruner mod solen?', 'Nej, ikke i sig selv. Selvom huden ser brun ud, skal du stadig bruge solcreme.' ],
		],
	],
	'haarpleje'    => [
		'intro' => 'Shampoo, balsam, hårkure, hårolie, stylingprodukter, hårbørster og hårpynt – alt til et sundt og velplejet hår. Se udvalget fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Hårpleje – giv dit hår det, det har brug for</h2><p>Hår er forskelligt, og det, der virker for din veninde, er ikke nødvendigvis det rigtige for dig. Her har vi samlet hårpleje og styling fra de butikker, vi samarbejder med, så du kan finde produkter, der passer til din hårtype. Du sammenligner her og handler hos butikken.</p><h3>Basisrutinen</h3><p>Vælg en <a href="/haarpleje/shampoo/">shampoo</a> efter din hovedbund og en <a href="/haarpleje/balsam/">balsam</a> efter dine længder. Fedtet hovedbund og tørre spidser kan godt have brug for to forskellige ting. En <a href="/haarpleje/haarkur/">hårkur eller hårmaske</a> giver ekstra pleje en gang imellem.</p><h3>Pleje i hverdagen</h3><p><a href="/haarpleje/haarolie/">Hårolie og serum</a> kan give glans og gøre håret lettere at rede ud. Bruger du varmt stylingværktøj, så husk <a href="/haarpleje/varmebeskyttelse/">varmebeskyttelse</a>. En god <a href="/haarpleje/haarboerste/">hårbørste eller kam</a> gør det nemmere at rede uden at hive.</p><h3>Styling og farve</h3><p>Voks, mousse, hårspray og tekstur-spray finder du under <a href="/haarpleje/stylingprodukter/">stylingprodukter</a>. <a href="/haarpleje/toershampoo/">Tørshampoo</a> er nyttig mellem vaskene. Har du farvet eller lyst hår, så se på <a href="/haarpleje/haarfarve/">hårfarve og silvershampoo</a>.</p><h3>Hovedbunden</h3><p>Under <a href="/haarpleje/haartab/">hårtab og hovedbund</a> finder du plejeprodukter til hovedbunden. Oplever du pludseligt eller kraftigt hårtab, så tal med din læge.</p><h3>Børster og hårpynt</h3><p>Det rigtige værktøj skåner håret. En bred tandet kam er god til vådt hår, mens en paddlebørste er god til at rede længere hår ud. Hårelastikker uden metal hiver mindre i håret. Find det hele under <a href="/haarpleje/haarboerste/">hårbørster og kamme</a> og <a href="/haarpleje/haartilbehoer/">hårelastikker og hårpynt</a>. Brug filtrene på siden til at finde produkter i dit prisleje.</p><h3>Hårtype og årstid</h3><p>Håret ændrer sig med årstiderne. Om vinteren kan det blive tørt og statisk, mens sol, saltvand og klor om sommeren kan slide på længderne. Det kan give mening at justere rutinen i løbet af året.</p>',
		'faq'   => [
			[ 'Hvor tit skal jeg vaske håret?', 'Det er meget individuelt og afhænger af din hovedbund og hårtype. Nogle har det bedst med vask hver dag, andre med længere pauser. Mærk efter, hvad dit hår har det godt med.' ],
			[ 'Skal jeg bruge balsam hver gang?', 'Mange har glæde af balsam efter hver vask, især i længderne. Har du meget fint hår, kan en let balsam eller kun balsam i spidserne være nok.' ],
			[ 'Hvad er forskellen på en hårkur og balsam?', 'Balsam bruges typisk efter hver vask og gør håret lettere at rede ud. En hårkur er mere plejende og bruges en gang imellem.' ],
		],
	],
	'kropspleje'   => [
		'intro' => 'Bodylotion, brusegel, deodorant, håndcreme, fodpleje, bodyscrub og kropsolie – til den daglige pleje fra top til tå. Fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Kropspleje – små ritualer, der gør en forskel</h2><p>Huden på kroppen har også brug for pleje, især når vejret skifter. Her har vi samlet produkter til bad og pleje fra de butikker, vi samarbejder med, så du kan finde dine favoritter og sammenligne priser. Når du har valgt, handler du hos butikken.</p><h3>Bad og bruser</h3><p>Vælg en <a href="/kropspleje/brusegel/">brusegel eller sæbe</a>, der passer til din hud. Har du tør eller sart hud, så se efter milde produkter uden stærk parfume. En <a href="/kropspleje/kropsscrub/">bodyscrub</a> en gang imellem fjerner døde hudceller og gør huden blød.</p><h3>Fugt efter badet</h3><p>Den bedste tid til <a href="/kropspleje/bodylotion/">bodylotion eller body butter</a> er lige efter badet, mens huden stadig er lidt fugtig. Foretrækker du noget andet, kan en <a href="/kropspleje/kropsolie/">kropsolie</a> give en blød fornemmelse.</p><h3>Hænder, fødder og deodorant</h3><p>Hænderne bliver vasket mange gange om dagen, så en god <a href="/kropspleje/haandcreme/">håndcreme</a> i tasken er en god idé. Fødderne fortjener også omsorg – se <a href="/kropspleje/fodpleje/">fodpleje</a>. Find din <a href="/kropspleje/deodorant/">deodorant</a> som roll-on, spray eller stift.</p><h3>Sart hud og duft</h3><p>Har du sart eller tør hud, kan det være en god idé at vælge produkter uden parfume og med en mild formel. Læs ingredienslisten, hvis du har kendte allergier, og prøv nye produkter på et lille område først. Har du eksem eller anden hudlidelse, så spørg din læge, hvilken pleje der passer til dig.</p><h3>Pleje hele året</h3><p>Om vinteren har huden ofte brug for mere fugt, mens en lettere lotion kan føles bedre om sommeren. Mange skifter derfor produkter med årstiden. Sammenlign udvalget her, og se butikkernes egne tilbud.</p><p>Sælger flere butikker samme produkt, viser vi priserne i en liste, så du nemt kan vælge.</p>',
		'faq'   => [
			[ 'Hvornår skal jeg bruge bodylotion?', 'Lige efter badet, når huden stadig er lidt fugtig. Så er den lettere at fordele, og huden føles blødere.' ],
			[ 'Hvad er forskellen på deodorant og antiperspirant?', 'En deodorant dæmper lugt, mens en antiperspirant er lavet til at mindske sved. Mange produkter kombinerer de to.' ],
			[ 'Hvor tit skal jeg bruge bodyscrub?', 'En gang imellem er nok for de fleste. Har du sart hud, så vælg en mild scrub, og lad være med at skrubbe for hårdt.' ],
		],
	],
	'hudpleje'     => [
		'intro' => 'Dagcreme, natcreme, serum, øjencreme, ansigtsrens, masker og skønhedsapparater. Byg en hudplejerutine, der passer til din hud – med produkter fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Hudpleje – en enkel rutine, du kan holde fast i</h2><p>En god hudplejerutine behøver ikke være lang. Det vigtigste er, at produkterne passer til din hudtype, og at du bruger dem regelmæssigt. Her har vi samlet hudpleje fra de butikker, vi samarbejder med, så du kan sammenligne udvalg og priser. Købet sker hos butikken.</p><h3>Rens, fugt og beskyt</h3><p>For mange er grundrutinen tre trin. Start med en mild <a href="/hudpleje/ansigtsrens/">ansigtsrens</a>, giv huden fugt med en <a href="/hudpleje/dagcreme/">dagcreme eller fugtighedscreme</a>, og afslut om dagen med solbeskyttelse – se <a href="/solcreme/solcreme-til-ansigt/">solcreme til ansigt</a>. Om aftenen kan en <a href="/hudpleje/natcreme/">natcreme</a> tage over.</p><h3>Når du vil gøre lidt mere</h3><p>Et <a href="/hudpleje/serum/">serum</a> er koncentreret og bruges under cremen. Populære ingredienser er blandt andet <a href="/hudpleje/retinol/">retinol</a> og <a href="/hudpleje/c-vitamin/">C-vitamin</a>. Start med ét nyt produkt ad gangen, så du kan mærke, hvordan huden reagerer. <a href="/hudpleje/peeling/">Peeling</a> og <a href="/hudpleje/ansigtsmaske/">ansigtsmasker</a> kan bruges en gang imellem.</p><h3>Øjne og særlige behov</h3><p>Huden omkring øjnene er tynd, og en <a href="/hudpleje/oejencreme/">øjencreme</a> er lavet til netop det område. Se også <a href="/hudpleje/hudpleje-til-maend/">hudpleje til mænd</a> og <a href="/hudpleje/skoenhedsapparater/">skønhedsapparater</a> som rensebørster.</p><h3>Lyt til huden</h3><p>Har du eksem, rosacea, akne eller en anden hudlidelse, så tal med din læge eller en hudlæge, før du starter på nye aktive produkter.</p><h3>Mindre kan være mere</h3><p>Det er fristende at købe mange produkter på én gang, men huden har ofte bedst af en enkel rutine. Brug produkterne et stykke tid, før du vurderer dem, og skift kun én ting ad gangen. Brug filtrene på siden til at sortere efter pris og mærke, og hold øje med butikkernes egne tilbud.</p><p>Sælger flere butikker samme produkt, kan du se priserne side om side og vælge den butik, der passer dig.</p>',
		'faq'   => [
			[ 'Hvilken hudplejerutine skal jeg starte med?', 'Rens, fugtighedscreme og solbeskyttelse om dagen er et godt udgangspunkt for de fleste. Når rutinen sidder, kan du tilføje et serum eller andre produkter.' ],
			[ 'Hvordan finder jeg min hudtype?', 'Mærk efter, hvordan huden føles et stykke tid efter rens: stram og tør, blank og fedtet, en blanding eller ingen af delene. Er du i tvivl, kan en hudplejeekspert eller hudlæge hjælpe.' ],
			[ 'Kan jeg bruge mange aktive ingredienser på én gang?', 'Det er bedst at starte langsomt og introducere ét produkt ad gangen. Nogle ingredienser kan irritere huden, hvis de kombineres. Følg producentens anvisninger.' ],
		],
	],

	// Underkategorier: hårstyling.
	'haartoerrer'           => [
		'intro' => 'Hårtørrere til alle hårtyper – med flere varmetrin, koldluft og mundstykker til styling og krøller. Sammenlign modeller fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Hårtørrer – mere end bare varm luft</h2><p>Hårtørreren er det stylingapparat, de fleste bruger mest. Derfor er den værd at vælge med omhu. Her finder du hårtørrere fra de butikker, vi samarbejder med, med pris og lagerstatus samlet ét sted.</p><h3>Varme, luft og kontrol</h3><p>Flere varme- og blæsetrin giver dig mulighed for at tilpasse tørringen til dit hår. Fint hår har det bedst med lavere varme, mens tykt hår tørrer hurtigere med mere luft. En koldluftknap er nyttig til at fastholde frisuren til sidst.</p><h3>Mundstykker og diffuser</h3><p>Et smalt mundstykke styrer luften præcist, når du føntørrer med børste. Har du krøller eller bølger, kan en diffuser fordele luften blidt og bevare krøllernes form. Vil du tørre og forme på én gang, så kig på en <a href="/haarstyling/varmluftsboerste/">varmluftsbørste</a> eller en <a href="/haarstyling/multistyler/">multistyler</a>.</p><h3>Vægt og håndtering</h3><p>Tørrer du langt hår hver dag, betyder vægt og balance meget for armene. Se også på ledningens længde, og om der er en ophængsløkke. Husk <a href="/haarpleje/varmebeskyttelse/">varmebeskyttelse</a>, før du går i gang.</p><h3>Hold den ren</h3><p>Støv og hår i luftindtaget kan gøre hårtørreren mindre effektiv. Rens filteret jævnligt efter producentens anvisning, og lad være med at vikle ledningen stramt om håndtaget. Sammenlign modeller og priser her, og se butikkernes egne tilbud.</p>',
		'faq'   => [
			[ 'Hvad skal jeg kigge efter i en hårtørrer?', 'Flere varme- og blæsetrin, en koldluftknap og de mundstykker, du har brug for. Vælg også en vægt, du er tryg ved at holde i længere tid.' ],
			[ 'Skal jeg bruge en diffuser?', 'Har du krøllet eller bølget hår, kan en diffuser hjælpe med at tørre det uden at ødelægge krøllerne. Til glat hår er et smalt mundstykke ofte mere nyttigt.' ],
			[ 'Kan jeg føntørre håret hver dag?', 'Det kan de fleste godt, hvis du bruger moderat varme og varmebeskyttelse. Lad gerne håret lufttørre lidt først.' ],
		],
	],
	'glattejern'            => [
		'intro' => 'Glattejern til blankt, glat hår – og mange kan også lave bølger. Find modellen, der passer til dit hår, fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Glattejern – til glat hår og meget mere</h2><p>Et glattejern kan gøre krøllet eller kruset hår glat og blankt, og med lidt øvelse kan du også lave bløde bølger. Her finder du glattejern fra de butikker, vi samarbejder med, med priser og lagerstatus.</p><h3>Pladernes bredde og materiale</h3><p>Smalle plader er gode til kort hår, pandehår og til at lave krøller. Brede plader dækker mere og passer til langt og tykt hår. Pladernes overflade betyder noget for, hvor let jernet glider gennem håret.</p><h3>Justerbar temperatur</h3><p>Det vigtigste er, at du selv kan styre varmen. Fint eller behandlet hår skal have mindre varme end tykt hår. Start lavt, og brug altid <a href="/haarpleje/varmebeskyttelse/">varmebeskyttelse</a>.</p><h3>Alternativer</h3><p>Vil du have et mere naturligt, glat resultat, kan en <a href="/haarstyling/glatteboerste/">glattebørste</a> være et skånsomt alternativ. Drømmer du mere om krøller, så se på <a href="/haarstyling/kroellejern/">krøllejern</a>.</p><h3>Sikkerhed og praktiske detaljer</h3><p>Automatisk slukning giver ro i maven, hvis du har travlt om morgenen. En drejelig ledning gør jernet lettere at bruge, og en lås holder pladerne samlet, når det skal i tasken. Et varmebestandigt etui gør det muligt at pakke jernet væk, før det er kølet helt af. Brug filtrene på siden til at sammenligne priser og mærker.</p>',
		'faq'   => [
			[ 'Kan man krølle håret med et glattejern?', 'Ja, mange glattejern med afrundede kanter kan bruges til bølger og krøller. Det kræver lidt øvelse, men der findes mange vejledninger.' ],
			[ 'Hvilken temperatur er rigtig til mit hår?', 'Fint og skrøbeligt hår har brug for lav varme, mens tykt hår kan kræve mere. Følg producentens anvisning, og start altid lavt.' ],
			[ 'Skal håret være tørt, før jeg bruger glattejern?', 'Ja, de fleste glattejern skal bruges på helt tørt hår. Nogle modeller kan bruges på fugtigt hår – det fremgår af producentens anvisning.' ],
		],
	],
	'kroellejern'           => [
		'intro' => 'Krøllejern, krøllestave og bølgejern til alt fra bløde bølger til faste lokker. Se udvalget fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Krøllejern – vælg tykkelsen efter de krøller, du drømmer om</h2><p>Et krøllejern kan give håret liv på få minutter. Her finder du krøllejern, krøllestave og bølgejern fra de butikker, vi samarbejder med, samlet ét sted.</p><h3>Tykkelsen bestemmer krøllen</h3><p>En tynd stang giver små og tætte krøller, mens en tyk stang giver store, løse bølger. Er du i tvivl, er en mellemstørrelse et godt sted at starte. Et bølgejern giver strandbølger, når du presser det ned over håret.</p><h3>Med eller uden klemme</h3><p>Et klassisk krøllejern har en klemme, der holder håret fast. En krøllestav har ingen klemme, så du vikler håret rundt selv. Den giver ofte en mere naturlig krølle, men kræver lidt mere øvelse.</p><h3>Få krøllerne til at holde</h3><p>Lad krøllen køle af, før du rører den. Afslut med lidt hårspray fra <a href="/haarpleje/stylingprodukter/">stylingprodukter</a>, og husk <a href="/haarpleje/varmebeskyttelse/">varmebeskyttelse</a> før styling. Vil du have krøller uden jern, så se <a href="/haarstyling/varmeruller/">varmeruller</a>.</p><h3>Varme og sikkerhed</h3><p>Justerbar temperatur er lige så vigtig her som på et glattejern. Fint hår krøller ofte let ved lav varme, mens tykt hår kan kræve mere. Automatisk slukning og en kølig spids, du kan holde i, gør jernet tryggere at bruge. Sammenlign modeller og tykkelser her, og se butikkernes egne tilbud.</p>',
		'faq'   => [
			[ 'Hvilken tykkelse krøllejern skal jeg vælge?', 'Tynd til små krøller, tyk til store bølger. Har du langt hår, kan en tykkere stang være nemmere at arbejde med.' ],
			[ 'Hvordan holder krøllerne længere?', 'Arbejd med små lokker, lad krøllerne køle helt af, og brug lidt hårspray. Rent hår uden for meget balsam holder ofte formen bedre.' ],
			[ 'Krøllestav eller krøllejern med klemme?', 'Med klemme er nemmest for begyndere. En krøllestav giver ofte mere naturlige krøller, men du skal bruge en varmebeskyttende handske.' ],
		],
	],
	'varmluftsboerste'      => [
		'intro' => 'Varmluftsbørster, der tørrer og former håret på én gang – til volumen, glans og bløde bevægelser. Fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Varmluftsbørste – føntørring med indbygget børste</h2><p>En varmluftsbørste kombinerer en hårtørrer og en rundbørste. Det gør det let at få volumen og en blød føntørring uden at skulle bruge begge hænder til to ting. Her finder du varmluftsbørster fra de butikker, vi samarbejder med.</p><h3>Børstens størrelse</h3><p>En stor, rund børste giver glat hår med bevægelse i spidserne. En mindre børste giver mere krølle og løft ved rødderne. Har du kort hår, er en lille børste ofte lettere at håndtere.</p><h3>Varme og indstillinger</h3><p>Flere varmetrin og en køl-funktion gør det lettere at tilpasse stylingen til dit hår. Brug den på håndklædetørt hår, og husk <a href="/haarpleje/varmebeskyttelse/">varmebeskyttelse</a>.</p><h3>Flere funktioner?</h3><p>Vil du også kunne krølle eller glatte, så se på en <a href="/haarstyling/multistyler/">multistyler</a> med flere tilbehør. Har du brug for mere kraft til at tørre helt vådt hår, kan en almindelig <a href="/haarstyling/haartoerrer/">hårtørrer</a> være et godt supplement.</p><h3>Børster og tilbehør</h3><p>Nogle varmluftsbørster har udskiftelige børstehoveder i forskellige størrelser, så du kan variere stylingen. Se også på børstehårenes materiale: naturhår og blandede børster giver ofte glans, mens nylon griber godt i tykt hår. Sammenlign modeller og priser her.</p>',
		'faq'   => [
			[ 'Kan en varmluftsbørste erstatte en hårtørrer?', 'For mange ja, især hvis du lader håret lufttørre lidt først. Har du meget tykt hår, kan det gå hurtigere at føntørre det meste med en hårtørrer først.' ],
			[ 'Skal håret være vådt eller tørt?', 'De fleste varmluftsbørster bruges bedst på håndklædetørt hår. Læs producentens anvisning.' ],
			[ 'Giver en varmluftsbørste volumen?', 'Ja, det er en af dens styrker. Løft håret ved rødderne, mens du børster, og afslut med koldluft.' ],
		],
	],
	'multistyler'           => [
		'intro' => 'Multistylere med flere mundstykker til at tørre, krølle, glatte og give volumen – ét apparat til mange looks. Fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Multistyler – mange frisurer med ét apparat</h2><p>En multistyler samler flere stylingfunktioner i ét sæt. Det sparer plads i badeværelset og giver dig mulighed for at skifte stil fra dag til dag. Her finder du multistylere fra de butikker, vi samarbejder med.</p><h3>Se på tilbehøret</h3><p>Sættene varierer meget. Nogle har krøllestænger, børster og glattetilbehør, andre fokuserer på tørring og volumen. Vælg et sæt med de dele, du faktisk vil bruge – ellers ender de i skuffen.</p><h3>Luft eller kontaktvarme</h3><p>Nogle multistylere former håret med varm luft, andre med varme plader og stænger. Luftbaserede sæt opleves ofte som skånsomme, mens varmeplader kan give et mere markant resultat. Uanset hvad bør du bruge <a href="/haarpleje/varmebeskyttelse/">varmebeskyttelse</a>.</p><h3>Er det det rigtige for dig?</h3><p>Bruger du mest én funktion, kan et enkelt apparat som et <a href="/haarstyling/glattejern/">glattejern</a> eller en <a href="/haarstyling/varmluftsboerste/">varmluftsbørste</a> være nok. Elsker du at variere, er en multistyler et godt valg.</p><h3>Opbevaring og vedligehold</h3><p>Et sæt med mange dele fylder, så en taske eller æske til opbevaring er praktisk. Rens filtre og tilbehør jævnligt, og tjek, om der kan købes ekstra dele senere. Brug filtrene på siden til at sammenligne sæt og priser, og se butikkernes egne tilbud.</p>',
		'faq'   => [
			[ 'Hvad er en multistyler?', 'Et stylingapparat med udskiftelige dele, så du med det samme håndtag kan tørre, krølle, glatte eller give volumen.' ],
			[ 'Er en multistyler bedre end separate apparater?', 'Ikke nødvendigvis. Den er praktisk, hvis du bruger flere funktioner. Bruger du kun én, kan et dedikeret apparat være et enklere valg.' ],
			[ 'Kan multistylere bruges på alle hårtyper?', 'Mange kan, men resultatet varierer med hårets længde og struktur. Læs, hvad producenten anbefaler til netop din hårtype.' ],
		],
	],
	'glatteboerste'         => [
		'intro' => 'Glattebørster, der glatter og reder håret i samme bevægelse – et enkelt alternativ til glattejernet. Se udvalget fra de butikker, vi samarbejder med.',
	],
	'varmeruller'           => [
		'intro' => 'Varmeruller til store, bløde krøller og volumen – sæt dem i, og lav makeup imens. Fra de butikker, vi samarbejder med.',
	],
	'traadloes-haarstyling' => [
		'intro' => 'Trådløse glattejern, krøllejern og stylere, du kan tage med i tasken eller på rejsen. Find dem fra de butikker, vi samarbejder med.',
	],

	// Underkategorier: hårfjerning.
	'ipl'                => [
		'intro' => 'IPL-apparater til hjemmebrug, der er lavet til at mindske hårvæksten over tid. Sammenlign modeller fra de butikker, vi samarbejder med, og læs altid producentens anvisninger.',
		'seo'   => '<h2>IPL – lysbaseret hårfjerning derhjemme</h2><p>IPL står for intense pulsed light. Apparatet sender lysglimt mod huden, som er beregnet til at påvirke hårsækkene, så hårvæksten aftager over tid ved regelmæssig brug. Her finder du IPL-apparater fra de butikker, vi samarbejder med.</p><h3>Passer IPL til dig?</h3><p>IPL virker forskelligt fra person til person. Det afhænger især af kontrasten mellem hår og hud. Meget lyst, rødt eller gråt hår reagerer ofte dårligt, og ved mørk hud kan IPL være uegnet. Mange apparater har en hudtonesensor, men tjek altid producentens skema over egnede hud- og hårtyper.</p><h3>Tålmodighed og sikkerhed</h3><p>Resultatet kommer gradvist og kræver, at du følger behandlingsplanen. Brug ikke IPL på tatoveringer, modermærker eller irriteret hud. Er du gravid, har en hudsygdom eller tager medicin, der gør huden lysfølsom, så tal med en læge eller hudlæge først.</p><h3>Andre muligheder</h3><p>Er IPL ikke det rigtige for dig, kan en <a href="/haarfjerning/epilator/">epilator</a>, <a href="/haarfjerning/voks/">voks</a> eller en <a href="/haarfjerning/ladyshave/">ladyshave</a> være alternativer.</p><h3>Før du køber</h3><p>Se på, hvilke kropsområder apparatet er beregnet til, om der følger tilbehør med til ansigt eller bikiniområde, og om lampen skal udskiftes. Barber området før brug, så lyset ikke rammer hår over huden. Sammenlign modeller og priser her.</p>',
		'faq'   => [
			[ 'Er IPL permanent hårfjerning?', 'Nej, det bør ikke forventes. IPL er lavet til at mindske hårvæksten over tid, og de fleste skal fortsætte med vedligeholdelse. Resultatet varierer fra person til person.' ],
			[ 'Kan jeg bruge IPL, hvis jeg har mørk hud?', 'Det afhænger af apparatet. Mange IPL-apparater er ikke egnede til mørk hud. Tjek producentens hudtoneskema, og spørg en hudlæge, hvis du er i tvivl.' ],
			[ 'Gør IPL ondt?', 'De fleste beskriver det som en varm prikken. Start på det laveste niveau, og følg producentens anvisninger.' ],
		],
	],
	'epilator'           => [
		'intro' => 'Epilatorer, der trækker hårene op med roden – til ben, arme og andre områder. Find den rigtige model fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Epilator – længere tid mellem gangene</h2><p>En epilator har små pincetter, der griber hårene og trækker dem op med roden. Derfor går der typisk længere tid, før huden føles stubbet igen, end efter barbering. Her finder du epilatorer fra de butikker, vi samarbejder med.</p><h3>Våd eller tør</h3><p>Nogle epilatorer kan bruges i badet eller i brusebadet, hvilket mange oplever som mere behageligt. Andre er kun til tør hud. Tjek, hvordan du helst vil bruge den.</p><h3>Tilbehør til forskellige områder</h3><p>Mange epilatorer kommer med ekstra hoveder, fx et smalt hoved til små områder eller et barberhoved. Har du sart hud, kan en massagekappe eller et køleelement gøre oplevelsen blidere.</p><h3>Gode råd</h3><p>Brug epilatoren på ren og tør hud, eller i vand hvis modellen er til det, og hold huden stram. En let <a href="/kropspleje/kropsscrub/">bodyscrub</a> nogle dage efter kan hjælpe mod indgroede hår. Vil du prøve noget andet, så se <a href="/haarfjerning/ipl/">IPL</a> eller <a href="/haarfjerning/voks/">voks</a>.</p><h3>Ledning eller batteri</h3><p>En trådløs epilator er nem at tage med i badet og på rejse, mens en model med ledning altid er klar. Se på, hvor lang tid batteriet holder, og om der følger en taske med. Flere hastigheder gør det muligt at starte blidt. Sammenlign modeller og priser her, og se butikkernes egne tilbud.</p>',
		'faq'   => [
			[ 'Gør en epilator ondt?', 'Mange synes, det er ubehageligt de første gange, men det bliver ofte bedre med tiden. Brug den efter et varmt bad, og start på et lavt trin.' ],
			[ 'Kan jeg bruge epilator i ansigtet?', 'Nogle epilatorer har tilbehør til ansigtet. Læs producentens anvisning, og vær forsigtig med sart hud.' ],
			[ 'Hvor langt skal håret være?', 'Hårene skal være lange nok til, at pincetterne kan gribe dem, men ikke for lange. Producentens anvisning giver et godt fingerpeg.' ],
		],
	],
	'ladyshave'          => [
		'intro' => 'Ladyshaves og bikinitrimmere til hurtig og skånsom hårfjerning – også på de sarte steder. Fra de butikker, vi samarbejder med.',
	],
	'voks'               => [
		'intro' => 'Voksstrimler, varm voks, sukkervoks og voksvarmere til hårfjerning derhjemme. Se udvalget fra de butikker, vi samarbejder med.',
	],
	'haarfjerningscreme' => [
		'intro' => 'Hårfjerningscreme til ben, arme og bikiniområde – nem at bruge og uden barberblad. Lav altid en lille prøve først. Fra de butikker, vi samarbejder med.',
	],

	// Underkategorier: tandpleje.
	'el-tandboerste'         => [
		'intro' => 'Eltandbørster med roterende eller soniske børstehoveder, tidsur og trykføler. Find den, der passer til din mund og din rutine – fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Eltandbørste – gør det lettere at børste grundigt</h2><p>En eltandbørste gør børstebevægelserne for dig, så du kan fokusere på at nå alle flader. Her finder du eltandbørster fra de butikker, vi samarbejder med, med pris og lagerstatus samlet.</p><h3>Roterende eller sonisk</h3><p>Der findes to hovedtyper. Roterende tandbørster har et lille, rundt hoved, der drejer frem og tilbage. Soniske tandbørster har et aflangt hoved, der vibrerer hurtigt. Begge kan give en god rengøring – det handler mest om, hvad du synes er behageligt.</p><h3>Nyttige funktioner</h3><p>Et indbygget tidsur hjælper dig med at børste længe nok. En trykføler advarer, hvis du trykker for hårdt, hvilket kan skåne tandkødet. Flere programmer, rejseetui og en app er ekstra, som nogle sætter pris på.</p><h3>Tænk på de løbende udgifter</h3><p>Se, hvad <a href="/tandpleje/boerstehoveder/">børstehovederne</a> til modellen koster, for dem skal du købe igen og igen. Supplér gerne med en <a href="/tandpleje/vandflosser/">vandflosser</a> eller tandtråd. Har du særlige behov, så spørg din tandlæge.</p><h3>Batteri og rejse</h3><p>Rejser du meget, så se på, hvor længe batteriet holder, og om der følger et rejseetui med. Nogle modeller kan lade via et etui eller en USB-oplader. Sammenlign modeller og priser her, og hold øje med butikkernes egne tilbud på både håndtag og børstehoveder.</p>',
		'faq'   => [
			[ 'Hvad er forskellen på en roterende og en sonisk eltandbørste?', 'Den roterende har et rundt hoved, der drejer, mens den soniske har et aflangt hoved, der vibrerer. Begge kan rengøre godt, så vælg efter, hvad du synes føles bedst.' ],
			[ 'Hvor længe skal jeg børste med en eltandbørste?', 'Følg din tandlæges råd og producentens anvisning. Mange eltandbørster har et tidsur, der hjælper dig.' ],
			[ 'Kan børn bruge eltandbørste?', 'Ja, der findes modeller lavet til børn. Se tandbørster til børn, og følg producentens aldersanbefaling.' ],
		],
	],
	'boerstehoveder'         => [
		'intro' => 'Børstehoveder til eltandbørster – originale og kompatible. Tjek, at de passer til dit håndtag. Fra de butikker, vi samarbejder med.',
	],
	'vandflosser'            => [
		'intro' => 'Vandflossere, der renser mellem tænderne og langs tandkødet med en tynd vandstråle. Sammenlign modeller fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Vandflosser – et nemt supplement til tandbørsten</h2><p>En vandflosser sender en tynd stråle vand ind mellem tænderne og langs tandkødskanten. Mange synes, den er lettere at bruge end tandtråd, især med bøjle eller broer. Her finder du vandflossere fra de butikker, vi samarbejder med.</p><h3>Til bordet eller til rejsen</h3><p>En model til bordet har ofte en større vandbeholder og flere indstillinger. En trådløs model fylder mindre og kan tages med på rejse. Tænk over, hvor meget plads du har ved håndvasken.</p><h3>Tryk og dyser</h3><p>Justerbart tryk gør det muligt at starte blidt og skrue op, når du vænner dig til det. Forskellige dyser kan være beregnet til bøjler, implantater eller tunge. Køb ekstra dyser, så hele familien kan bruge samme apparat.</p><h3>Del af en helhed</h3><p>En vandflosser erstatter ikke tandbørsten. Brug den sammen med en god <a href="/tandpleje/el-tandboerste/">eltandbørste</a> og <a href="/tandpleje/tandpasta-og-tandtraad/">tandpasta</a>. Spørg din tandlæge, hvad der passer bedst til dig.</p><h3>Kom godt i gang</h3><p>Det kan tage lidt tid at vænne sig til en vandflosser. Start på det laveste tryk, len dig ind over håndvasken, og før dysen langs tandkødskanten. Brug lunkent vand, hvis tænderne er følsomme. Sammenlign modeller og priser her, og se butikkernes egne tilbud.</p>',
		'faq'   => [
			[ 'Kan en vandflosser erstatte tandtråd?', 'For nogle kan den være et godt alternativ. Din tandlæge eller tandplejer kan vurdere, hvad der passer til dine tænder.' ],
			[ 'Er vandflosser god med tandbøjle?', 'Mange med bøjle bruger vandflosser, fordi strålen kommer ind omkring tråde og beslag. Der findes dyser lavet specielt til det.' ],
			[ 'Hvordan rengør jeg min vandflosser?', 'Tøm beholderen efter brug, og lad den tørre. Følg producentens anvisning om rengøring og udskiftning af dyser.' ],
		],
	],
	'tandblegning'           => [
		'intro' => 'Produkter til tandblegning derhjemme – strips, gel og tandpasta. Følg anvisningen, og spørg din tandlæge, hvis du har følsomme tænder. Fra de butikker, vi samarbejder med.',
	],
	'tandpasta-og-tandtraad' => [
		'intro' => 'Tandpasta, tandtråd, mellemrumsbørster og mundskyl til den daglige tandpleje. Se udvalget fra de butikker, vi samarbejder med.',
	],
	'boerne-tandboerste'     => [
		'intro' => 'Tandbørster til børn – manuelle og elektriske, ofte med sjove farver og figurer, der gør tandbørstning til en leg. Fra de butikker, vi samarbejder med.',
	],

	// Underkategorier: barbering og skæg.
	'barbermaskine'     => [
		'intro' => 'Barbermaskiner med roterende hoveder eller folie – til tør eller våd barbering. Find den, der passer til din hud, fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Barbermaskine – glat hud uden besvær</h2><p>En barbermaskine gør den daglige barbering hurtig og enkel. Her finder du barbermaskiner fra de butikker, vi samarbejder med, med pris og lagerstatus samlet ét sted.</p><h3>Roterende eller folie</h3><p>Roterende barbermaskiner har runde skærhoveder, der følger ansigtets former. De passer mange med kraftigt skæg eller uens vækst. Foliebarbermaskiner har lige skær og giver ofte en tæt barbering, især til dig, der barberer dig hver dag.</p><h3>Våd og tør</h3><p>Kan maskinen bruges vådt, kan du barbere dig med skum eller gel i brusebadet. Det kan være mere skånsomt for sart hud. En tør barbering er hurtigere, når du har travlt.</p><h3>Vedligehold</h3><p>Rengør skærhovederne efter brug, og skift dem, når barberingen bliver mindre tæt. Du finder nye skær og rensevæske under <a href="/barbering/barberhoveder/">barberhoveder og tilbehør</a>. Vil du hellere have en kort stub, så se <a href="/barbering/skaegtrimmer/">skægtrimmere</a>.</p><h3>Batteri og rengøring</h3><p>Se på, hvor længe batteriet holder, og om maskinen kan lynlades, når du har travlt. Nogle maskiner har en renseenhed, der rengør skærhovederne automatisk. Det er praktisk, men kræver, at du køber rensevæske. Sammenlign modeller og priser her, og hold øje med butikkernes egne tilbud.</p>',
		'faq'   => [
			[ 'Roterende eller foliebarbermaskine?', 'Roterende følger ansigtets kurver og passer mange med kraftigt skæg. Folie giver ofte en tæt barbering på glatte flader. Prøv at tænke på, hvordan dit skæg vokser.' ],
			[ 'Hvor tit skal jeg skifte skærhoveder?', 'Følg producentens anbefaling. Mærker du, at barberingen bliver mindre tæt eller trækker, er det tid.' ],
			[ 'Kan jeg bruge barbermaskinen i bad?', 'Kun hvis den er beregnet til våd barbering. Det står i producentens beskrivelse.' ],
		],
	],
	'skaegtrimmer'      => [
		'intro' => 'Skægtrimmere med kamme i flere længder – til kort stub, velholdt skæg og skarpe konturer. Se udvalget fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Skægtrimmer – hold skægget, som du vil have det</h2><p>En skægtrimmer gør det let at holde skægget i en ensartet længde og give det skarpe linjer. Her finder du skægtrimmere fra de butikker, vi samarbejder med.</p><h3>Længdeindstillinger</h3><p>Se efter en trimmer med mange længder, så du præcist kan ramme din stil. Nogle har et hjul eller en knap til at justere kammen, mens andre har udskiftelige kamme. Til kort stub skal trimmeren kunne gå helt ned i de korte længder.</p><h3>Detaljer og konturer</h3><p>Et smalt skær eller et præcisionstilbehør gør det nemmere at forme kinder, hals og omkring munden. Har du brug for at klippe håret på hovedet også, så kig på en <a href="/barbering/multitrimmer/">multitrimmer</a> eller en <a href="/barbering/haartrimmer/">hårtrimmer</a>.</p><h3>Pleje af skægget</h3><p>Et velplejet skæg er lettere at trimme. Brug skægolie eller balm fra <a href="/barbering/skaegpleje/">skægpleje</a>, og red skægget ud, før du trimmer.</p><h3>Batteri og vandtæthed</h3><p>En trådløs trimmer giver frihed foran spejlet, og en vandtæt model kan skylles ren under hanen. Nogle trimmere har et lille støvsugerkammer, der samler hårene op. Se på, hvor lang tid batteriet holder, og om den kan bruges med ledning. Sammenlign modeller og priser her, og se butikkernes egne tilbud.</p>',
		'faq'   => [
			[ 'Hvordan trimmer jeg skægget jævnt?', 'Start med en længere kam, end du tror, og arbejd dig ned. Red skægget ud først, og trim mod hårets vækstretning.' ],
			[ 'Kan en skægtrimmer bruges til hovedhår?', 'Til kort hår kan det gå, men en hårtrimmer har ofte et bredere skær og længere kamme, der er bedre egnet.' ],
			[ 'Hvordan vedligeholder jeg min skægtrimmer?', 'Børst hår ud af skæret efter brug, og rengør efter producentens anvisning. Nogle skær skal smøres med lidt olie.' ],
		],
	],
	'haartrimmer'       => [
		'intro' => 'Hårtrimmere og hårklippere til at klippe håret derhjemme – med kamme i flere længder. Fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Hårtrimmer og hårklipper – klip selv derhjemme</h2><p>Med en hårklipper kan du holde en kort frisure eller klippe resten af familien uden at bestille tid. Her finder du hårtrimmere og hårklippere fra de butikker, vi samarbejder med.</p><h3>Kamme og længder</h3><p>Vælg en model med de længder, du har brug for. Til en kort, ensartet frisure er mange kamme praktisk. Til at gå helt tæt på skal klipperen kunne bruges uden kam eller med en meget kort indstilling.</p><h3>Med eller uden ledning</h3><p>En klipper med ledning løber aldrig tør for strøm midt i en klipning. En trådløs model er lettere at manøvrere rundt om hovedet. Mange kan begge dele.</p><h3>Barbering af hovedet</h3><p>Vil du være helt glatbarberet på hovedet, findes der apparater lavet til netop det. Til skæg er en <a href="/barbering/skaegtrimmer/">skægtrimmer</a> mere præcis, og til næse og ører findes en <a href="/barbering/naesehaarstrimmer/">næse- og øretrimmer</a>.</p><h3>Klip i ro og mag</h3><p>Klip i et godt oplyst rum, og start altid med en længere kam, end du tror. Det er nemmere at tage mere af end at vente på, at håret gror ud. Rens skæret efter brug, og smør det med lidt olie, hvis producenten anbefaler det. Sammenlign modeller og priser her.</p>',
		'faq'   => [
			[ 'Hvad er forskellen på en hårtrimmer og en hårklipper?', 'Ordene bruges ofte om det samme. En hårklipper har typisk et bredere skær til større flader, mens en trimmer er god til konturer og korte længder.' ],
			[ 'Kan jeg klippe mig selv med en hårklipper?', 'Ja, især korte frisurer. Et spejl bag hovedet eller hjælp fra en anden gør det lettere at ramme nakken.' ],
			[ 'Hvor tit skal skæret skiftes?', 'Det afhænger af brugen. Hold skæret rent, og skift det, når det begynder at trække i håret.' ],
		],
	],
	'multitrimmer'      => [
		'intro' => 'Multitrimmere og bodygroomere med tilbehør til skæg, hår, næse og krop – ét sæt til det hele. Fra de butikker, vi samarbejder med.',
	],
	'naesehaarstrimmer' => [
		'intro' => 'Næse-, øre- og bryntrimmere til at holde de små hår i ave – hurtigt og skånsomt. Se udvalget fra de butikker, vi samarbejder med.',
	],
	'barberskraber'     => [
		'intro' => 'Barberskrabere, safety razors og barberblade til en tæt, klassisk barbering. Fra de butikker, vi samarbejder med.',
	],
	'barberhoveder'     => [
		'intro' => 'Barberhoveder, skær, rensevæske og andet tilbehør til din barbermaskine. Tjek, at delene passer til din model. Fra de butikker, vi samarbejder med.',
	],
	'barberskum'        => [
		'intro' => 'Barberskum, barbergel, barbersæbe og pre-shave, der gør barberingen glattere og mere behagelig. Fra de butikker, vi samarbejder med.',
	],
	'aftershave'        => [
		'intro' => 'Aftershave som lotion, balm eller splash – til at berolige huden efter barbering. Find din favorit fra de butikker, vi samarbejder med.',
	],
	'skaegpleje'        => [
		'intro' => 'Skægolie, skægbalm, skægshampoo og skægbørster til et blødt og velholdt skæg. Se udvalget fra de butikker, vi samarbejder med.',
	],

	// Underkategorier: negle.
	'neglelak'       => [
		'intro' => 'Neglelak i alle farver plus base coat og top coat – til en klassisk manicure, der er nem at skifte. Fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Neglelak – farve på fingrene på få minutter</h2><p>Almindelig neglelak er den nemmeste vej til flotte negle. Den tørrer i luften og er let at fjerne, så du kan skifte farve, så tit du har lyst. Her finder du neglelak fra de butikker, vi samarbejder med.</p><h3>Base og top coat</h3><p>En base coat beskytter neglen mod misfarvning og hjælper lakken til at sidde bedre. En top coat giver glans og beskytter farven mod skår. De to små flasker gør en stor forskel for holdbarheden.</p><h3>Sådan lakker du pænt</h3><p>Start med rene og tørre negle. Fil dem i form med værktøj fra <a href="/negle/neglepleje/">neglepleje</a>. Lak i tynde lag, og giv hvert lag tid til at tørre. To tynde lag holder bedre end ét tykt.</p><h3>Vil du have mere holdbarhed?</h3><p>Ønsker du en manicure, der holder længere, så se på <a href="/negle/gellak/">gellak</a>, som hærder under en <a href="/negle/uv-lampe/">UV-lampe</a>.</p><h3>Fjern lakken skånsomt</h3><p>Brug en neglelakfjerner, der passer til dine negle, og lad den virke et øjeblik i stedet for at gnide hårdt. En fjerner uden acetone er ofte mildere. Giv gerne neglene lidt negleolie bagefter. Sammenlign farver og priser her, og se butikkernes egne tilbud.</p>',
		'faq'   => [
			[ 'Hvordan tørrer neglelakken hurtigere?', 'Lak i tynde lag, og vent mellem hvert lag. Der findes også hurtigtørrende top coats.' ],
			[ 'Hvorfor skal jeg bruge base coat?', 'Den beskytter neglen mod misfarvning fra pigmenter og giver lakken noget at hæfte på, så den holder længere.' ],
			[ 'Hvordan undgår jeg bobler i lakken?', 'Rul flasken mellem hænderne i stedet for at ryste den, og lak i tynde lag ved stuetemperatur.' ],
		],
	],
	'gellak'         => [
		'intro' => 'Gellak, gelenegle og builder gel, der hærder under lampe og giver en holdbar manicure derhjemme. Fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Gellak – holdbare negle derhjemme</h2><p>Gellak giver en blank manicure, der typisk holder længere end almindelig lak. Den hærder under en lampe, så du slipper for at vente på, at den tørrer. Her finder du gellak og gelprodukter fra de butikker, vi samarbejder med.</p><h3>Det skal du bruge</h3><p>Et gellaksystem består som regel af base, farve og top coat. Til hærdningen skal du bruge en <a href="/negle/uv-lampe/">UV-lampe til negle</a>. Startsæt med det hele kan være en nem måde at komme i gang på.</p><h3>Forberedelsen er vigtig</h3><p>Skub neglebåndene tilbage, fil overfladen let, og sørg for, at neglen er ren og fri for fedt. Påfør tynde lag, og hold gellakken væk fra huden. Det hjælper både holdbarheden og huden.</p><h3>Fjern den skånsomt</h3><p>Riv aldrig gellakken af. Brug den metode, producenten anbefaler, og giv gerne neglene en pause med negleolie fra <a href="/negle/neglepleje/">neglepleje</a>. Foretrækker du noget enklere, er almindelig <a href="/negle/neglelak/">neglelak</a> lettere at skifte.</p><h3>Startsæt eller enkeltprodukter</h3><p>Er du ny med gellak, er et startsæt med lampe, base, top coat og et par farver en nem begyndelse. Har du allerede en lampe, kan du købe farverne enkeltvis. Sammenlign sæt og priser her, og hold øje med butikkernes egne tilbud.</p>',
		'faq'   => [
			[ 'Kan jeg bruge almindelig lak sammen med gellak?', 'Generelt bør du holde dig til et system. Almindelig lak hærder ikke under lampen, og blandingen kan give et dårligere resultat.' ],
			[ 'Hvordan fjerner jeg gellak?', 'Følg producentens anvisning. Ofte skal top coat files let, og lakken opløses derefter med en fjerner. Riv den aldrig af.' ],
			[ 'Hvad gør jeg, hvis huden reagerer på gellak?', 'Stop med at bruge produktet, og tal med din læge. Hold altid gellak væk fra huden omkring neglen.' ],
		],
	],
	'uv-lampe'       => [
		'intro' => 'UV- og LED-lamper til at hærde gellak og gelenegle derhjemme. Tjek, at lampen passer til din gellak. Fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>UV-lampe til negle – hærd gellakken derhjemme</h2><p>En neglelampe er nødvendig, hvis du vil lave gellak selv. Den hærder lakken, så den bliver hård og blank. Her finder du UV- og LED-lamper fra de butikker, vi samarbejder med.</p><h3>UV, LED eller begge dele</h3><p>Gellak er lavet til at hærde under bestemte typer lys. Mange lamper kombinerer UV og LED, så de kan bruges til flere slags gel. Tjek altid, hvad producenten af din gellak anbefaler.</p><h3>Størrelse og funktioner</h3><p>En lampe, hvor hele hånden kan være, gør det muligt at hærde alle fingre på én gang. En timer og en sensor, der starter lampen, når du sætter hånden ind, gør det hele lettere.</p><h3>Brug den med omtanke</h3><p>Følg producentens anvisning om tider. Nogle vælger at beskytte huden på hænderne, fx med handsker uden fingerspidser. Find farver og top coat under <a href="/negle/gellak/">gellak</a>.</p><h3>Ledning eller genopladelig</h3><p>De fleste neglelamper sættes i stikkontakten eller i en USB-port, men nogle er genopladelige og kan bruges, hvor du vil. Se også på, om bunden kan tages af, så du kan bruge lampen til tæerne. Sammenlign modeller og priser her.</p>',
		'faq'   => [
			[ 'Kan jeg bruge enhver lampe til min gellak?', 'Ikke altid. Tjek, om din gellak skal hærdes med UV, LED eller begge dele, og vælg en lampe, der passer.' ],
			[ 'Hvor længe skal gellakken under lampen?', 'Følg anvisningen fra producenten af både lak og lampe. Tiderne varierer mellem produkter.' ],
			[ 'Er en LED-lampe det samme som en UV-lampe?', 'Ikke helt. De bruger forskellige lyskilder, men mange lamper kombinerer de to, så de kan bruges til flere typer gel.' ],
		],
	],
	'neglepleje'     => [
		'intro' => 'Neglefile, negleklippere, neglesaks, negleolie og neglebåndspleje – til sunde og velplejede negle. Fra de butikker, vi samarbejder med.',
	],
	'kunstige-negle' => [
		'intro' => 'Kunstige negle, press on-negle, negletips og neglepynt – til længde og mønstre uden at vente. Se udvalget fra de butikker, vi samarbejder med.',
	],

	// Underkategorier: parfume.
	'dameparfume'      => [
		'intro' => 'Dameparfume i alle duftfamilier – blomstrende, friske, varme og søde. Find en ny favorit eller en gave fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Dameparfume – find den duft, du får lyst til at bære hver dag</h2><p>En ny parfume kan føles som et lille stykke luksus i hverdagen. Her finder du dameparfume fra de butikker, vi samarbejder med, så du kan sammenligne størrelser og priser.</p><h3>Duftfamilier</h3><p>Blomstrende dufte er de mest klassiske. Friske og citrusagtige dufte er lette og oplagte om dagen. Varme dufte med vanilje, træ eller krydderier passer mange til aften og vinter. Kender du en duft, du elsker, så se efter noget i samme familie.</p><h3>Koncentration</h3><p>Vil du have en duft, der holder længe, så se på <a href="/parfume/eau-de-parfum/">eau de parfum</a>. Til hverdag og sommer er en lettere <a href="/parfume/eau-de-toilette/">eau de toilette</a> eller en <a href="/parfume/body-mist/">body mist</a> et godt alternativ.</p><h3>Som gave</h3><p>Køber du til en anden, så tænk på, hvad hun bruger i forvejen. Et <a href="/parfume/parfume-gavesaet/">gavesæt</a> kan være et hit. Du kan også gå på opdagelse i <a href="/parfume/unisex-parfume/">unisex parfume</a>.</p><h3>Dufte til årstiden</h3><p>Mange har en let duft til sommer og en varmere til vinter. Det er en god måde at variere på uden at skulle vælge én favorit for altid. Brug filtrene på siden til at sortere efter pris, størrelse og mærke, og se, om din favorit er på tilbud lige nu.</p>',
		'faq'   => [
			[ 'Hvordan vælger jeg dameparfume uden at dufte til den?', 'Læs om duftnoterne og duftfamilien, og sammenlign med parfumer, du allerede kan lide. Mange vælger også en mindre flaske første gang.' ],
			[ 'Hvorfor dufter parfume forskelligt på forskellige personer?', 'Hudens type og fugt påvirker, hvordan duften udvikler sig. Derfor kan samme parfume opleves forskelligt.' ],
			[ 'Hvor skal jeg sprøjte parfumen?', 'På pulspunkter som håndled, hals og bag ørerne. Undgå at gnide håndleddene sammen bagefter.' ],
		],
	],
	'herreparfume'     => [
		'intro' => 'Herreparfume og eau de toilette til mænd – friske, træagtige, krydrede og aromatiske dufte. Se udvalget fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Herreparfume – en duft, der sætter prikken over i</h2><p>Den rigtige duft kan give en god følelse, uanset om du skal på arbejde eller i byen. Her finder du herreparfume fra de butikker, vi samarbejder med, med priser og størrelser samlet ét sted.</p><h3>Find din stil</h3><p>Friske dufte med citrus eller hav er lette og nemme at bære til hverdag. Træagtige og krydrede dufte er varmere og passer mange til aften og de kolde måneder. Aromatiske dufte med urter ligger et sted midt imellem.</p><h3>Styrke og holdbarhed</h3><p>Mange herredufte fås som <a href="/parfume/eau-de-toilette/">eau de toilette</a>, der er let og diskret. Vil du have en mere intens duft, der holder længere, så se på <a href="/parfume/eau-de-parfum/">eau de parfum</a>.</p><h3>Tænk på helheden</h3><p>Bruger du <a href="/barbering/aftershave/">aftershave</a> med duft, så vælg noget, der går godt sammen med din parfume, eller vælg en duftfri variant. Du kan også se på <a href="/parfume/unisex-parfume/">unisex parfume</a>.</p><h3>Størrelse og pris</h3><p>Er du ny med en duft, kan en mindre flaske være et godt første køb. Har du fundet din favorit, er en større flaske ofte billigere pr. milliliter. Brug filtrene på siden til at sammenligne størrelser og priser, og se butikkernes egne tilbud.</p>',
		'faq'   => [
			[ 'Hvor meget parfume skal en mand bruge?', 'Lidt er ofte nok. Start med et par pust på hals eller bryst, og byg op, hvis duften er for svag.' ],
			[ 'Hvad er forskellen på cologne og eau de toilette?', 'Cologne har typisk den laveste koncentration, mens eau de toilette er lidt stærkere. Eau de parfum er endnu mere intens.' ],
			[ 'Hvordan opbevarer jeg parfume bedst?', 'Mørkt og køligt, gerne i den originale æske. Undgå at lade flasken stå i solen eller i et varmt badeværelse.' ],
		],
	],
	'unisex-parfume'   => [
		'intro' => 'Unisex-dufte, der kan bæres af alle – ofte friske, træagtige eller nicheprægede. Fra de butikker, vi samarbejder med.',
	],
	'eau-de-parfum'    => [
		'intro' => 'Eau de parfum til dig, der vil have en intens duft, der holder længe. Find dufte til både hende og ham fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Eau de parfum – mere duft, længere tid</h2><p>Eau de parfum har en højere koncentration af duftstoffer end eau de toilette. Det betyder typisk en fyldigere duft, der holder længere på huden. Her finder du eau de parfum fra de butikker, vi samarbejder med.</p><h3>Hvornår giver det mening?</h3><p>Vil du gerne kunne dufte din parfume langt ud på dagen, er eau de parfum et godt valg. Den passer også til aftener og særlige anledninger. Fordi den er mere intens, skal du ofte bruge mindre.</p><h3>Sådan bruger du den</h3><p>Et eller to pust på pulspunkterne er ofte nok. Duften udvikler sig over tid, så giv den lidt tid, før du bedømmer den.</p><h3>Find din duft</h3><p>Gå på opdagelse i <a href="/parfume/dameparfume/">dameparfume</a>, <a href="/parfume/herreparfume/">herreparfume</a> og <a href="/parfume/unisex-parfume/">unisex parfume</a>. Foretrækker du noget lettere, så se <a href="/parfume/eau-de-toilette/">eau de toilette</a>.</p><h3>Opbevaring</h3><p>Lys, varme og luft kan påvirke duften over tid. Opbevar derfor flasken mørkt og køligt, gerne i æsken, og sæt låget godt på. Så holder din eau de parfum sin karakter længere. Sammenlign dufte, størrelser og priser her, og hold øje med butikkernes egne tilbud.</p>',
		'faq'   => [
			[ 'Holder eau de parfum længere end eau de toilette?', 'Typisk ja, fordi koncentrationen af duftstoffer er højere. Holdbarheden afhænger også af duften og din hud.' ],
			[ 'Er eau de parfum for kraftig til hverdag?', 'Ikke nødvendigvis. Brug lidt mindre, så bliver duften mere diskret.' ],
			[ 'Hvorfor ændrer duften sig i løbet af dagen?', 'En parfume har top-, hjerte- og basenoter, som kommer frem på forskellige tidspunkter. Det er en naturlig del af en dufts udvikling.' ],
		],
	],
	'eau-de-toilette'  => [
		'intro' => 'Eau de toilette – lette og friske dufte, der er nemme at bære til hverdag. Se udvalget fra de butikker, vi samarbejder med.',
	],
	'body-mist'        => [
		'intro' => 'Body mist og hair mist med en let duft, du kan sprøjte på flere gange om dagen. Fra de butikker, vi samarbejder med.',
	],
	'parfume-gavesaet' => [
		'intro' => 'Parfume gavesæt med duft og matchende pleje – en oplagt gave til jul, fødselsdag eller bare fordi. Fra de butikker, vi samarbejder med.',
	],

	// Underkategorier: makeup.
	'foundation'              => [
		'intro' => 'Foundation, BB cream, CC cream og skin tint – fra let dækning til fuld. Find den rigtige nuance og finish fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Foundation – en jævn base, der føles som din egen hud</h2><p>Den rigtige foundation udjævner hudtonen og giver et friskt udtryk. Her finder du foundation og lettere alternativer fra de butikker, vi samarbejder med.</p><h3>Dækning og finish</h3><p>Let dækning, som en skin tint eller BB cream, lader huden skinne igennem. Medium og fuld dækning skjuler mere. Finishen kan være mat, satin eller dewy. Fedtet hud har ofte glæde af en mat finish, mens tør hud kan have godt af en mere glødende.</p><h3>Find nuancen</h3><p>Se på både hudtone og undertone – varm, kølig eller neutral. Sammenlign med en foundation, du har brugt før, og se nuancen i dagslys. Er du mellem to nuancer, kan de ofte blandes.</p><h3>Byg op omkring den</h3><p>En <a href="/makeup/primer-og-setting-spray/">primer</a> under kan hjælpe foundationen til at sidde længere. Brug <a href="/makeup/concealer/">concealer</a> til punktvis dækning og <a href="/makeup/pudder/">pudder</a> til at fiksere. Påfør med en svamp eller børste fra <a href="/makeup/makeupboerster/">makeupbørster og svampe</a>.</p><h3>Tænk på hudplejen</h3><p>Foundation sidder bedst på en hud, der har fået fugt. Lad din <a href="/hudpleje/dagcreme/">dagcreme</a> trække ind, før du lægger makeup. Har du sart hud, så se efter produkter uden parfume, og husk at fjerne makeuppen grundigt om aftenen. Sammenlign nuancer og priser her.</p>',
		'faq'   => [
			[ 'Hvordan vælger jeg den rigtige nuance foundation?', 'Find din undertone, og sammenlign med produkter, du har brugt før. Se gerne farven i dagslys på kæbelinjen.' ],
			[ 'Hvad er forskellen på foundation og BB cream?', 'En BB cream giver typisk lettere dækning og føles mere som en creme. Foundation fås i flere grader af dækning.' ],
			[ 'Hvilken foundation passer til fedtet hud?', 'Mange med fedtet hud foretrækker en mat finish og en olieabsorberende primer. Fiksér gerne med lidt pudder.' ],
		],
	],
	'concealer'               => [
		'intro' => 'Concealer og farvekorrektor til mørke rande, rødme og små ujævnheder. Fra de butikker, vi samarbejder med.',
	],
	'pudder'                  => [
		'intro' => 'Løst pudder, kompakt pudder og setting powder, der fikserer makeuppen og dæmper glans. Se udvalget fra de butikker, vi samarbejder med.',
	],
	'rouge-og-bronzer'        => [
		'intro' => 'Rouge, bronzer, highlighter og contour, der giver ansigtet farve, varme og glød. Fra de butikker, vi samarbejder med.',
	],
	'mascara'                 => [
		'intro' => 'Mascara til længde, volumen, krøl eller definition – også vandfast. Find din favorit fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Mascara – det lille ekstra, der åbner øjnene</h2><p>For mange er mascara det makeupprodukt, de bruger mest. Et par strøg kan få øjnene til at se mere vågne ud. Her finder du mascara fra de butikker, vi samarbejder med.</p><h3>Vælg efter ønsket effekt</h3><p>Nogle mascaraer er lavet til at give længde, andre til volumen eller krøl. Børstens form betyder meget: en tæt børste giver fylde, mens en tynd børste med korte hår er god til at nå de små vipper og skille dem.</p><h3>Vandfast eller almindelig</h3><p>Vandfast mascara holder på sommerdage, til fest og til tårevædede bryllupper, men kræver en grundig makeupfjerner. Almindelig mascara er lettere at fjerne og skånsom til hverdag. Find rens under <a href="/hudpleje/ansigtsrens/">ansigtsrens og makeupfjerner</a>.</p><h3>Gode vaner</h3><p>Pump ikke børsten op og ned i tuben – det trækker luft ind. Skift mascaraen jævnligt, og lad være med at dele den. Vil du have endnu mere effekt, så se <a href="/makeup/kunstige-vipper/">kunstige vipper</a> og <a href="/makeup/eyeliner/">eyeliner</a>.</p><h3>Krøl og primer</h3><p>En vippebukker før mascara kan give et ekstra løft, og en vippeprimer kan give mere fylde. Brug vippebukkeren før mascaraen, aldrig efter. Sammenlign mascaraer og priser her, og se butikkernes egne tilbud.</p>',
		'faq'   => [
			[ 'Hvor tit skal jeg skifte mascara?', 'Mascara bør skiftes oftere end de fleste andre makeupprodukter. Se symbolet med den åbne krukke på emballagen.' ],
			[ 'Hvordan undgår jeg klumper?', 'Tør overskud af børsten på kanten af tuben, og børst fra roden og ud i en zigzag-bevægelse. Red vipperne med en ren børste, hvis der opstår klumper.' ],
			[ 'Kan jeg bruge mascara med kontaktlinser?', 'Mange kan. Vælg gerne en mascara, der er beregnet til følsomme øjne, og sæt linserne i før makeup.' ],
		],
	],
	'eyeliner'                => [
		'intro' => 'Eyeliner og kajal som pen, gel, flydende eller blyant – til alt fra en tynd streg til et markant wing-look. Fra de butikker, vi samarbejder med.',
	],
	'oejenskygge'             => [
		'intro' => 'Øjenskygge i paletter og singler – mat, shimmer og glitter til hverdag og fest. Se udvalget fra de butikker, vi samarbejder med.',
	],
	'bryn'                    => [
		'intro' => 'Brynblyanter, bryngel, brynpomade og brynfarve til velformede og definerede bryn. Fra de butikker, vi samarbejder med.',
	],
	'kunstige-vipper'         => [
		'intro' => 'Kunstige vipper, vippelim og enkelte vippebundter – fra naturlige til dramatiske. Fra de butikker, vi samarbejder med.',
	],
	'laebestift'              => [
		'intro' => 'Læbestift, lipgloss, lip liner og lip tint i alle nuancer – fra nude til knaldrød. Find din farve fra de butikker, vi samarbejder med.',
	],
	'laebepleje'              => [
		'intro' => 'Læbepomade, læbeolie, læbemaske og læbescrub, der holder læberne bløde hele året. Fra de butikker, vi samarbejder med.',
	],
	'primer-og-setting-spray' => [
		'intro' => 'Primer og setting spray, der forbereder huden og hjælper makeuppen med at holde hele dagen. Fra de butikker, vi samarbejder med.',
	],
	'makeupboerster'          => [
		'intro' => 'Makeupbørster, kabuki-børster, makeupsvampe og pudderpuffs – gode redskaber til et jævnt resultat. Fra de butikker, vi samarbejder med.',
	],
	'makeupspejl'             => [
		'intro' => 'Makeupspejle med og uden lys, forstørrelse og lommespejle – så du kan se hver eneste detalje. Fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Makeupspejl – godt lys gør hele forskellen</h2><p>Et godt spejl gør det meget lettere at lægge makeup præcist, plukke bryn eller sætte vipper på. Her finder du makeupspejle fra de butikker, vi samarbejder med.</p><h3>Lys</h3><p>Et spejl med indbygget lys giver dig ensartet belysning, også om morgenen eller aftenen. Nogle spejle kan skifte mellem varmt og koldt lys, så du kan se, hvordan makeuppen ser ud i forskellige omgivelser.</p><h3>Forstørrelse</h3><p>Forstørrelse er nyttig til detaljer som eyeliner og bryn. Mange spejle har en almindelig side og en forstørrende side, så du både kan se helheden og detaljerne.</p><h3>Til bordet, væggen eller tasken</h3><p>Et bordspejl er praktisk ved sminkebordet, mens et vægspejl sparer plads på badeværelset. Et lille lommespejl er rart at have i tasken. Find resten af dine redskaber under <a href="/makeup/makeupboerster/">makeupbørster og svampe</a>.</p><h3>Strøm og placering</h3><p>Nogle spejle med lys kører på batteri, andre er genopladelige eller skal sættes i stikkontakten. Tænk over, hvor spejlet skal stå, og om du har en kontakt i nærheden. Et spejl, der kan vippe eller drejes, gør det lettere at finde den rigtige vinkel. Sammenlign modeller og priser her.</p>',
		'faq'   => [
			[ 'Skal mit makeupspejl have lys?', 'Det er ikke et krav, men lys gør det lettere at se farver og detaljer, især hvis dit badeværelse er mørkt.' ],
			[ 'Hvor meget forstørrelse har jeg brug for?', 'Lidt forstørrelse er nok til de fleste. Meget forstørrelse er god til detaljer, men kan gøre det sværere at se helheden.' ],
			[ 'Hvad skal jeg kigge efter i et rejsespejl?', 'Lav vægt, et beskyttende cover og gerne genopladeligt lys, hvis du vil have lys med på farten.' ],
		],
	],

	// Underkategorier: solcreme og selvbruner.
	'solcreme-til-ansigt' => [
		'intro' => 'Solcreme til ansigtet – lette teksturer, der kan bruges dagligt og under makeup. Find din favorit fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Solcreme til ansigt – en del af den daglige rutine</h2><p>Ansigtet er ofte udsat for sol, også når du ikke tænker over det. Derfor bruger mange solcreme i ansigtet som sidste trin i morgenrutinen. Her finder du solcreme til ansigt fra de butikker, vi samarbejder med.</p><h3>Tekstur efter hudtype</h3><p>Solcreme til ansigtet fås som fluid, gel, creme og stift. Har du fedtet hud, kan en let fluid eller gel føles bedst. Tør hud har ofte glæde af en mere fugtgivende creme. En stift er praktisk at have med i tasken.</p><h3>Solfaktor</h3><p>Mange vælger SPF 30 og 50 til ansigtet. Se også efter UVA-beskyttelse. Brug nok, og smør igen i løbet af dagen, hvis du er udendørs. Følg producentens anvisning.</p><h3>Sammen med resten af rutinen</h3><p>Solcreme lægges efter <a href="/hudpleje/dagcreme/">dagcreme</a> og før makeup. Bruger du <a href="/hudpleje/retinol/">retinol</a> eller syrer, er solbeskyttelse om dagen særligt vigtig. Har du en hudsygdom eller er særligt lysfølsom, så tal med en læge eller hudlæge.</p><h3>Sart hud og øjne</h3><p>Har du sart hud, kan en solcreme uden parfume være et godt valg. Nogle oplever, at solcreme svier i øjnene. Her kan en stift eller en formel lavet til følsomme øjne være mere behagelig. Sammenlign produkter og priser her, og se butikkernes egne tilbud.</p>',
		'faq'   => [
			[ 'Skal jeg bruge solcreme i ansigtet hver dag?', 'Mange hudlæger anbefaler daglig solbeskyttelse til ansigtet, især i sommerhalvåret. Mærk efter, hvad din hud har brug for, og spørg en hudlæge, hvis du er i tvivl.' ],
			[ 'Kan solcreme bruges under makeup?', 'Ja. Lad solcremen trække ind et øjeblik, før du lægger makeup. Mange ansigtssolcremer er lavet til netop det.' ],
			[ 'Er dagcreme med SPF nok?', 'Det kan være det til en almindelig hverdag, hvis du bruger nok af den. Skal du være længe i solen, er en egentlig solcreme mere sikker.' ],
		],
	],
	'solcreme-til-krop'   => [
		'intro' => 'Solcreme til kroppen som lotion, spray og olie – til stranden, haven og ferien. Fra de butikker, vi samarbejder med.',
	],
	'solcreme-til-boern'  => [
		'intro' => 'Solcreme til børn, ofte med en mild formel til sart hud. Husk skygge, tøj og hat til de mindste. Fra de butikker, vi samarbejder med.',
	],
	'after-sun'           => [
		'intro' => 'After sun, der giver huden fugt og en kølende fornemmelse efter en dag i solen. Fra de butikker, vi samarbejder med.',
	],
	'selvbruner'          => [
		'intro' => 'Selvbruner som mousse, lotion, dråber og spray – til en solkysset glød uden sol. Fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Selvbruner – glød hele året</h2><p>Med en selvbruner kan du få en brun kulør, uden at huden skal i solen. Her finder du selvbrunere fra de butikker, vi samarbejder med.</p><h3>Vælg formen</h3><p>Mousse tørrer hurtigt og er let at fordele. Lotion er fugtgivende og god til tør hud. Dråber kan blandes i din almindelige creme for en mere gradvis effekt, og spray er praktisk til ryggen. Gradvise selvbrunere bygger farven op over flere dage.</p><h3>Forberedelse giver et jævnt resultat</h3><p>Fjern døde hudceller dagen før med en <a href="/kropspleje/kropsscrub/">bodyscrub</a>, og fjern hår i god tid. Smør tørre områder som albuer, knæ og ankler med lidt creme, så de ikke tager for meget farve. En handske gør påføringen lettere.</p><h3>Husk solbeskyttelse</h3><p>En selvbruner beskytter ikke mod solen. Brug stadig <a href="/solcreme/solcreme-til-krop/">solcreme til krop</a> og <a href="/solcreme/solcreme-til-ansigt/">til ansigt</a>, når du er ude.</p><h3>Vælg nuance</h3><p>Selvbrunere fås ofte i lys, medium og mørk. Er du i tvivl, så start lysere – du kan altid bygge mere farve op. Lad produktet tørre helt, før du tager tøj på, og vent med at gå i bad efter producentens anvisning. Sammenlign produkter og priser her.</p>',
		'faq'   => [
			[ 'Hvordan undgår jeg striber med selvbruner?', 'Scrub huden dagen før, brug en handske, og fordel i cirkelbevægelser. Arbejd i små områder, og vask hænderne bagefter.' ],
			[ 'Hvor længe holder selvbruner?', 'Farven forsvinder gradvist, i takt med at huden fornyer sig. Følg producentens anvisning om, hvor tit du kan påføre igen.' ],
			[ 'Beskytter selvbruner mod solen?', 'Nej. Selvom huden ser brun ud, skal du stadig bruge solcreme.' ],
		],
	],

	// Underkategorier: hårpleje.
	'shampoo'          => [
		'intro' => 'Shampoo til alle hårtyper – til fint, tørt, fedtet, farvet eller krøllet hår. Find den rigtige fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Shampoo – vælg efter hovedbund og hårtype</h2><p>Shampooens opgave er først og fremmest at rense hovedbunden og håret. Den rigtige shampoo gør, at håret føles rent uden at blive udtørret. Her finder du shampoo fra de butikker, vi samarbejder med.</p><h3>Hovedbunden er udgangspunktet</h3><p>Bliver din hovedbund hurtigt fedtet, kan en rensende shampoo være et godt valg. Er den tør eller sart, så se efter milde formler. Har du skæl eller kløe, finder du produkter til hovedbunden under <a href="/haarpleje/haartab/">hårtab og hovedbund</a>.</p><h3>Hårtype og behov</h3><p>Fint hår har ofte glæde af en let shampoo, der giver fylde. Tørt og krøllet hår kan have brug for mere fugt. Farvet hår har godt af en farvebevarende shampoo, og lyst eller gråt hår kan friskes op med en silvershampoo fra <a href="/haarpleje/haarfarve/">hårfarve og silvershampoo</a>.</p><h3>Sammen med balsam</h3><p>Efter shampoo lukker en <a href="/haarpleje/balsam/">balsam</a> hårets overflade og gør det lettere at rede ud. Mellem vaskene kan <a href="/haarpleje/toershampoo/">tørshampoo</a> give en frisk følelse.</p><h3>Brug den rigtigt</h3><p>Massér shampooen ind i hovedbunden, og lad skummet rense længderne, når du skyller. Mange har kun brug for én vask ad gangen. Skyl grundigt, så der ikke sidder rester tilbage. Sammenlign produkter og priser her, og se butikkernes egne tilbud.</p>',
		'faq'   => [
			[ 'Hvordan finder jeg den rigtige shampoo?', 'Tag udgangspunkt i hovedbunden – fedtet, tør eller normal – og vælg derefter efter dit hårs behov, fx fylde, fugt eller farvebevarelse.' ],
			[ 'Skal jeg skifte shampoo en gang imellem?', 'Det er ikke nødvendigt, hvis du er glad for den. Men hårets behov kan ændre sig med årstiderne, og så kan det give mening at skifte.' ],
			[ 'Hvad gør en silvershampoo?', 'Den har violette pigmenter, der kan dæmpe gule toner i lyst, blondt eller gråt hår. Følg producentens anvisning om, hvor længe den skal sidde.' ],
		],
	],
	'balsam'           => [
		'intro' => 'Balsam og conditioner, der gør håret blødt og let at rede ud – til alle hårtyper. Fra de butikker, vi samarbejder med.',
	],
	'haarkur'          => [
		'intro' => 'Hårkure, hårmasker og leave-in-pleje til tørt, slidt eller behandlet hår. Se udvalget fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Hårkur – en ekstra omgang pleje</h2><p>En hårkur er mere plejende end en almindelig balsam og bruges typisk en gang imellem. Den kan gøre tørt eller slidt hår blødere og lettere at håndtere. Her finder du hårkure og hårmasker fra de butikker, vi samarbejder med.</p><h3>Fugt, styrke eller begge dele</h3><p>Nogle hårkure fokuserer på fugt og blødhed, andre på at pleje hår, der er slidt af farve, blegning eller varme. Læs, hvad produktet er lavet til, og vælg efter dit hårs behov. Leave-in-produkter bliver i håret og giver pleje hele dagen.</p><h3>Sådan bruger du den</h3><p>Påfør hårkuren i håndklædetørt hår efter shampoo, og koncentrer dig om længder og spidser. Lad den sidde den tid, producenten anbefaler, og skyl grundigt. Har du fint hår, så brug lidt mindre.</p><h3>Byg din rutine</h3><p>Kombinér med en god <a href="/haarpleje/shampoo/">shampoo</a> og <a href="/haarpleje/balsam/">balsam</a>. <a href="/haarpleje/haarolie/">Hårolie</a> kan tætne spidserne, og <a href="/haarpleje/varmebeskyttelse/">varmebeskyttelse</a> skåner håret, når du styler.</p><h3>Varme kan hjælpe</h3><p>Nogle hårkure virker bedre med lidt varme. Sæt en plastikhætte eller et varmt håndklæde om håret, mens kuren sidder. Læs dog altid, hvad producenten anbefaler. Sammenlign hårkure og priser her, og hold øje med butikkernes egne tilbud.</p>',
		'faq'   => [
			[ 'Hvor tit skal jeg bruge hårkur?', 'Det afhænger af dit hår og produktet. Mange bruger hårkur en gang om ugen eller sjældnere. Følg producentens anvisning.' ],
			[ 'Kan jeg bruge hårkur i stedet for balsam?', 'Nogle gør, men en hårkur er ofte mere fyldig. Har du fint hår, kan det gøre det tungt at bruge den efter hver vask.' ],
			[ 'Hvad er en leave-in?', 'Et plejeprodukt, der bliver i håret og ikke skal skylles ud. Det kan gøre håret lettere at rede og give pleje gennem dagen.' ],
		],
	],
	'haarolie'         => [
		'intro' => 'Hårolie, hårserum og elixirer, der giver glans, blødhed og pleje til tørre spidser. Fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Hårolie og serum – glans og blødhed</h2><p>Et par dråber hårolie eller serum kan gøre en stor forskel for, hvordan håret ser ud og føles. Her finder du hårolier og serum fra de butikker, vi samarbejder med.</p><h3>Olie eller serum?</h3><p>Hårolie plejer og giver glans, især i tørre længder og spidser. Hårserum er ofte lettere og bruges til at tæmme krus og give et glat udtryk. Nogle produkter kan begge dele.</p><h3>Vådt eller tørt hår</h3><p>I vådt hår kan olien gøre det lettere at rede ud og føntørre. I tørt hår kan en lille smule give glans og samle spidserne. Start med meget lidt, og tilføj mere, hvis det er nødvendigt – især hvis du har fint hår.</p><h3>Varme og styling</h3><p>Nogle olier og serum beskytter også mod varme. Læs beskrivelsen, eller brug en egentlig <a href="/haarpleje/varmebeskyttelse/">varmebeskyttelse</a>. Til ekstra pleje kan du supplere med en <a href="/haarpleje/haarkur/">hårkur</a>.</p><h3>Brug den til mere end håret</h3><p>Nogle hårolier kan også bruges på hovedbunden som en pleje før vask. Læs producentens anvisning, og vask grundigt bagefter. Sammenlign olier og serum her, og brug filtrene på siden til at finde produkter i dit prisleje. Se også butikkernes egne tilbud.</p>',
		'faq'   => [
			[ 'Bliver håret fedtet af hårolie?', 'Det kan det, hvis du bruger for meget. Start med et par dråber i længderne, og hold olien væk fra hovedbunden.' ],
			[ 'Hvornår skal jeg bruge hårolie?', 'Både i vådt hår før føntørring og i tørt hår til sidst. Prøv dig frem for at se, hvad dit hår kan lide.' ],
			[ 'Kan hårolie bruges på krøllet hår?', 'Ja, mange med krøller bruger olie for at give fugt og definition. Vælg en let olie, hvis dine krøller er fine.' ],
		],
	],
	'stylingprodukter' => [
		'intro' => 'Hårvoks, pomade, mousse, hårspray, tekstur-spray og krøllecreme til at forme og fastholde frisuren. Fra de butikker, vi samarbejder med.',
	],
	'toershampoo'      => [
		'intro' => 'Tørshampoo, der friskner håret op og giver fylde mellem vaskene. Fra de butikker, vi samarbejder med.',
	],
	'varmebeskyttelse' => [
		'intro' => 'Varmebeskyttende spray, creme og olie, der skåner håret, før du bruger føn, glattejern eller krøllejern. Fra de butikker, vi samarbejder med.',
	],
	'haarfarve'        => [
		'intro' => 'Hårfarve, toning og silvershampoo til at farve, friske op eller dæmpe gule toner. Følg altid anvisningen, og lav en allergiprøve. Fra de butikker, vi samarbejder med.',
	],
	'haarboerste'      => [
		'intro' => 'Hårbørster, redebørster, rundbørster og kamme til alle hårtyper – til at rede ud, føntørre og style. Fra de butikker, vi samarbejder med.',
	],
	'haartilbehoer'    => [
		'intro' => 'Hårelastikker, scrunchies, hårspænder, klemmer og hårbånd – til både hverdag og fest. Fra de butikker, vi samarbejder med.',
	],
	'haartab'          => [
		'intro' => 'Plejeprodukter til hovedbund og tyndt hår. Oplever du pludseligt eller kraftigt hårtab, så tal med din læge. Fra de butikker, vi samarbejder med.',
	],

	// Underkategorier: kropspleje.
	'bodylotion' => [
		'intro' => 'Bodylotion, body butter og kropscreme, der giver huden fugt og blødhed. Find din favorit fra de butikker, vi samarbejder med.',
	],
	'brusegel'   => [
		'intro' => 'Brusegel, bruseolie, sæbe og body wash til den daglige rens – fra milde formler til duftende favoritter. Fra de butikker, vi samarbejder med.',
	],
	'deodorant'  => [
		'intro' => 'Deodorant og antiperspirant som roll-on, spray og stift – med og uden duft. Fra de butikker, vi samarbejder med.',
	],
	'haandcreme' => [
		'intro' => 'Håndcreme til tørre og hårdtarbejdende hænder – til tasken, natbordet og køkkenet. Fra de butikker, vi samarbejder med.',
	],
	'fodpleje'   => [
		'intro' => 'Fodcreme, hælcreme, fodfile og andet til bløde og velplejede fødder. Fra de butikker, vi samarbejder med.',
	],
	'kropsscrub' => [
		'intro' => 'Bodyscrub og peeling til kroppen, der fjerner døde hudceller og gør huden blød. Fra de butikker, vi samarbejder med.',
	],
	'kropsolie'  => [
		'intro' => 'Kropsolie, der giver huden en blød og glansfuld finish – efter badet eller som en del af en massage. Fra de butikker, vi samarbejder med.',
	],

	// Underkategorier: hudpleje.
	'dagcreme'           => [
		'intro' => 'Dagcreme og fugtighedscreme til alle hudtyper – lette geler, fyldige cremer og varianter med solfaktor. Fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Dagcreme – fugt og beskyttelse til hverdagen</h2><p>En god dagcreme er rygraden i de fleste hudplejerutiner. Den giver huden fugt og gør den klar til resten af dagen. Her finder du dagcreme og fugtighedscreme fra de butikker, vi samarbejder med.</p><h3>Vælg efter hudtype</h3><p>Fedtet hud har ofte glæde af en let gel eller fluid, der ikke føles tung. Tør hud har brug for en mere fyldig creme. Har du blandet hud, kan en let creme være et godt kompromis. Sart hud har typisk godt af en mild formel uden stærk parfume.</p><h3>Med eller uden solfaktor</h3><p>Nogle dagcremer har indbygget solfaktor. Det er praktisk til hverdag, men skal du være ude længe, er en egentlig <a href="/solcreme/solcreme-til-ansigt/">solcreme til ansigt</a> et mere sikkert valg.</p><h3>Sådan passer den ind</h3><p>Rens huden med en mild <a href="/hudpleje/ansigtsrens/">ansigtsrens</a>, læg eventuelt et <a href="/hudpleje/serum/">serum</a> på, og afslut med dagcremen. Om aftenen kan en <a href="/hudpleje/natcreme/">natcreme</a> overtage.</p><h3>Duft og ingredienser</h3><p>Har du sart hud eller kendte allergier, så læs ingredienslisten, og vælg gerne en creme uden parfume. Prøv en ny creme på et lille område først. Har du eksem, rosacea eller anden hudlidelse, så spørg din læge eller en hudlæge. Sammenlign cremer og priser her.</p>',
		'faq'   => [
			[ 'Hvad er forskellen på dagcreme og natcreme?', 'En dagcreme er ofte lettere og kan have solfaktor, så den passer under makeup. En natcreme er typisk mere fyldig og bruges om aftenen.' ],
			[ 'Hvilken dagcreme passer til fedtet hud?', 'Mange med fedtet hud foretrækker en let gel eller fluid, der trækker hurtigt ind. Fedtet hud har også brug for fugt.' ],
			[ 'Kan jeg bruge dagcreme om aftenen?', 'Det kan du godt, især hvis den ikke har solfaktor. Nogle foretrækker en mere fyldig natcreme om aftenen.' ],
		],
	],
	'natcreme'           => [
		'intro' => 'Natcreme og sleeping masks, der plejer huden, mens du sover. Fra de butikker, vi samarbejder med.',
	],
	'serum'              => [
		'intro' => 'Serum, essens og ampuller med koncentrerede ingredienser til din hudplejerutine. Se udvalget fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Serum – et koncentreret trin i rutinen</h2><p>Et serum har typisk en let konsistens og en høj koncentration af udvalgte ingredienser. Det lægges efter rens og før creme. Her finder du serum fra de butikker, vi samarbejder med.</p><h3>Vælg efter dit mål</h3><p>Der findes serum med fokus på fugt, glød, en jævnere hudtone eller en glattere overflade. Populære ingredienser er blandt andet hyaluronsyre, niacinamid, <a href="/hudpleje/c-vitamin/">C-vitamin</a> og <a href="/hudpleje/retinol/">retinol</a>. Læs, hvad produktet er lavet til, og vælg ét, der passer til dit behov.</p><h3>Én ting ad gangen</h3><p>Introducer ét nyt serum ad gangen, så du kan se, hvordan huden reagerer. Nogle aktive ingredienser kan irritere, især hvis de kombineres. Følg producentens anvisninger, og tal med en hudlæge, hvis du har en hudsygdom.</p><h3>Afslut med creme</h3><p>Et serum erstatter ikke en fugtighedscreme. Læg en <a href="/hudpleje/dagcreme/">dagcreme</a> eller <a href="/hudpleje/natcreme/">natcreme</a> ovenpå for at holde på fugten.</p><h3>Opbevaring</h3><p>Nogle aktive ingredienser er følsomme over for lys og luft. Luk flasken godt, og opbevar den mørkt og køligt. Ændrer serummet farve eller lugt, er det tid til en ny. Sammenlign serummer og priser her, og se butikkernes egne tilbud.</p>',
		'faq'   => [
			[ 'Hvornår skal serum bruges i rutinen?', 'Efter rens og eventuelt toner, men før creme. Tynde produkter lægges som regel før tykke.' ],
			[ 'Kan jeg bruge flere serummer på én gang?', 'Det kan du, men start med ét ad gangen. Nogle ingredienser passer ikke godt sammen, så læs producentens anvisninger.' ],
			[ 'Erstatter serum min creme?', 'Nej, de fleste har stadig brug for en creme oven på serummet for at holde på fugten.' ],
		],
	],
	'oejencreme'         => [
		'intro' => 'Øjencreme, øjengel og eye patches til den tynde hud omkring øjnene. Fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Øjencreme – pleje til et sart område</h2><p>Huden omkring øjnene er tyndere end resten af ansigtet og kan hurtigt føles tør. En øjencreme er lavet til netop det område. Her finder du øjencreme og øjengel fra de butikker, vi samarbejder med.</p><h3>Creme eller gel</h3><p>En gel føles ofte let og kølende, især om morgenen. En creme er typisk mere fyldig og kan passe godt om aftenen eller til tør hud. Eye patches kan bruges en gang imellem som en ekstra forkælelse.</p><h3>Sådan påfører du den</h3><p>Brug en meget lille mængde, og dup cremen ud med ringfingeren langs orbitalknoglen. Undgå at gnide eller trække i huden, og hold produktet væk fra selve øjet.</p><h3>Forventninger</h3><p>En øjencreme kan give fugt og få området til at føles blødere. Mørke rande skyldes ofte flere ting, som søvn og arv. Vil du skjule dem, kan en <a href="/makeup/concealer/">concealer</a> hjælpe. Se også resten af <a href="/hudpleje/">hudplejen</a>.</p><h3>Sart hud og allergi</h3><p>Øjnene er følsomme, så vælg gerne en øjencreme uden parfume, især hvis du har sarte øjne eller bruger kontaktlinser. Svier eller klør det, så stop med at bruge produktet. Sammenlign øjencremer og priser her, og hold øje med butikkernes egne tilbud.</p>',
		'faq'   => [
			[ 'Har jeg brug for en særlig øjencreme?', 'Ikke nødvendigvis, men mange foretrækker en creme lavet til øjenområdet, fordi den er tilpasset den sarte hud.' ],
			[ 'Hvornår skal jeg bruge øjencreme?', 'Morgen, aften eller begge dele. Brug den efter serum og før din ansigtscreme.' ],
			[ 'Kan øjencreme bruges med kontaktlinser?', 'Ja, men hold produktet væk fra selve øjet, og sæt linserne i før eller vent, til cremen er trukket ind.' ],
		],
	],
	'ansigtsrens'        => [
		'intro' => 'Ansigtsrens, makeupfjerner, micellar vand og toner – første trin i en god hudplejerutine. Fra de butikker, vi samarbejder med.',
	],
	'ansigtsmaske'       => [
		'intro' => 'Ansigtsmasker, sheet masks og patches til en ekstra omgang pleje en gang imellem. Fra de butikker, vi samarbejder med.',
	],
	'peeling'            => [
		'intro' => 'Peeling og eksfoliering med syrer, enzymer eller scrub, der giver huden en glattere overflade. Start forsigtigt. Fra de butikker, vi samarbejder med.',
	],
	'retinol'            => [
		'intro' => 'Retinol, retinal og bakuchiol til aftenrutinen. Start langsomt, og brug solcreme om dagen. Se udvalget fra de butikker, vi samarbejder med.',
		'seo'   => '<h2>Retinol – et populært aktivt stof i aftenrutinen</h2><p>Retinol er en form for A-vitamin, som mange bruger i hudplejen for at få en jævnere og glattere hudoverflade. Her finder du produkter med retinol og beslægtede ingredienser fra de butikker, vi samarbejder med.</p><h3>Start roligt</h3><p>Retinol kan give rødme, tørhed eller afskalning, især i starten. Begynd med at bruge det et par aftener om ugen, og øg langsomt, hvis huden har det godt. Brug en god <a href="/hudpleje/natcreme/">natcreme</a> bagefter, og følg producentens anvisninger.</p><h3>Solbeskyttelse er vigtig</h3><p>Retinol kan gøre huden mere følsom over for sol. Brug derfor <a href="/solcreme/solcreme-til-ansigt/">solcreme til ansigt</a> om dagen, mens du bruger det.</p><h3>Hvornår skal du vente?</h3><p>Er du gravid, ammer eller har en hudsygdom som eksem eller rosacea, så tal med din læge eller en hudlæge, før du bruger retinol. Bakuchiol beskrives ofte som et mildere plantebaseret alternativ. Se også <a href="/hudpleje/serum/">serum</a> med andre ingredienser.</p><h3>Kombinationer</h3><p>Retinol kan irritere mere, hvis det bruges samtidig med andre stærke aktive ingredienser som syrer. Mange vælger derfor at bruge dem på forskellige dage. Læs producentens anvisning, og hold rutinen enkel. Sammenlign produkter og priser her.</p>',
		'faq'   => [
			[ 'Hvor tit skal jeg bruge retinol?', 'Start med et par aftener om ugen, og øg gradvist, hvis huden tåler det. Følg altid producentens anvisning.' ],
			[ 'Kan jeg bruge retinol, når jeg er gravid?', 'Tal med din læge, før du bruger retinol under graviditet eller amning. Mange producenter fraråder det i den periode.' ],
			[ 'Hvorfor skal jeg bruge solcreme, når jeg bruger retinol?', 'Retinol kan gøre huden mere følsom over for sol. Solcreme om dagen hjælper med at beskytte den.' ],
		],
	],
	'c-vitamin'          => [
		'intro' => 'Serum og cremer med C-vitamin til morgenrutinen – for en frisk og strålende hud. Fra de butikker, vi samarbejder med.',
	],
	'hudpleje-til-maend' => [
		'intro' => 'Hudpleje til mænd – rens, fugtighedscreme og øjencreme i enkle rutiner. Se udvalget fra de butikker, vi samarbejder med.',
	],
	'skoenhedsapparater' => [
		'intro' => 'Rensebørster, LED-masker, gua sha, ansigtsruller og andre skønhedsapparater til hjemmebrug. Følg producentens anvisninger. Fra de butikker, vi samarbejder med.',
	],
];
