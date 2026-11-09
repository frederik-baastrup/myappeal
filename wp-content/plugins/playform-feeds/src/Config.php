<?php
namespace Playform\Feeds;

/**
 * Al opsætning for nichen ét sted: sitets navn, shops, kategoritræ, sorteringsregler og filtre.
 * Myappeal (skønhed og personlig pleje). Samme kode som Kitzhen, Fitbase, Pizzalicious, Outdoorland og Koffee;
 * kun denne fil er særlig for nichen.
 */
final class Config {

	/** Sitets navn og kontaktoplysninger. Bruges af temaet (playform_site()) og importens tekster. */
	public static function site(): array {
		return [
			'name'     => 'Myappeal',
			'domain'   => 'myappeal.dk',
			'email'    => 'kontakt@myappeal.dk',
			'niche'    => 'skønhed og personlig pleje', // "Find skønhed og personlig pleje fra …"
			'tagline'  => 'Hudpleje, makeup, parfume, hårpleje og stylingapparater fra de butikker, vi samarbejder med',
			'company'  => 'Mondae',
			'cvr'      => '37208329',
			'address'  => 'Rønnevej 19 B, kl., 5270 Odense N',
			'owner'    => 'Frederik Baastrup',
			'accent'   => '#FD0D9D', // pink fra logoet
		];
	}

	/** Varer, der ikke matcher en kategori, kommer slet ikke med (Proshop og HvidevareShoppen har titusindvis af andre varer). */
	public static function skip_uncategorized(): bool {
		return true;
	}

	/**
	 * Partner-ads feeds (partnerid 14854). Proshop og HvidevareShoppen er godkendt (Outdoorland/Kitzhen); kun de nævnte
	 * butikskategorier kommer med. '?<slug>' = vores regler placerer varen, ellers lander den i <slug> (se Classifier).
	 * Godkendte skønhedsbutikker uden feed-link endnu (url tom = springes over): BilligParfume.dk, Well.dk, Made4men,
	 * Helsebixen.dk. Indsæt "&bannerid=…&feedid=…" fra Partner-ads, når feed-linkene er hentet.
	 * Kan overstyres med option 'playform_shops'.
	 */
	public static function shops(): array {
		$base     = 'https://www.partner-ads.com/dk/feed_udlaes.php?partnerid=14854';
		$defaults = [
			'billigparfume'    => [ 'name' => 'BilligParfume.dk', 'url' => '' ],
			'well'             => [ 'name' => 'Well.dk', 'url' => '' ],
			'made4men'         => [ 'name' => 'Made4men', 'url' => '' ],
			'helsebixen'       => [ 'name' => 'Helsebixen.dk', 'url' => '' ],
			'proshop'          => [ 'name' => 'Proshop.dk', 'url' => "$base&bannerid=67757&feedid=1399", 'category_map' => [
				'parfume og dufte'      => '?parfume',
				'ansigtspleje'          => '?hudpleje',
				'makeup'                => '?makeup',
				'makeupspejl'           => '?makeup',
				'haarpleje'             => '?haarpleje',
				'haar styling'          => '?haarpleje',
				'kropspleje'            => '?kropspleje',
				'anden personlig pleje' => '?',
				'eltandboerste'         => '?tandpleje',
				'barbermaskine'         => '?barbering',
				'barbergrej'            => '?barbering',
				'haartrimmer'           => '?barbering',
				'epilatoripl'           => '?haarfjerning',
				'glattejern'            => '?haarstyling',
				'kroellejern'           => '?haarstyling',
				'haartoerrer'           => '?haarstyling',
				'glatteboerste'         => '?haarstyling',
			] ],
			'hvidevareshoppen' => [ 'name' => 'HvidevareShoppen.dk', 'url' => "$base&bannerid=56457&feedid=1000", 'category_map' => [
				'velvære > hårpleje'                                => '?haarstyling',
				'velvære > hårpleje > krøllejern'                   => '?haarstyling',
				'velvære > hårpleje > hårtørrer'                    => '?haarstyling',
				'velvære > hårpleje > fladjern'                     => '?haarstyling',
				'velvære > barbering/trimning'                      => '?barbering',
				'velvære > barbering/trimning > barbermaskiner'     => '?barbering',
				'velvære > barbering/trimning > hår og skægtrimmer' => '?barbering',
				'velvære > barbering/trimning > øre og næsetrimmer' => '?barbering',
				'velvære > barbering/trimning > folie og skær til barbermaskine' => '?barbering',
				'velvære > barbering/trimning > rensning'           => '?barbering',
				'velvære > skønhed og helse > tandpleje'            => '?tandpleje',
				'velvære > skønhed og helse'                        => '?',
			] ],
		];
		$custom = get_option( 'playform_shops' );
		return is_array( $custom ) && $custom ? $custom : $defaults;
	}

	/**
	 * Myappeals kategorier. 'match' testes først mod produktnavnet (uden mærket), derefter mod butikkens kategori.
	 * Rækkefølgen betyder noget – den første, der matcher, vinder: apparater før pleje (en hårtørrer er ikke hårpleje),
	 * tandpleje før barbering (tungeskraber), makeup og solcreme før hud- og kropspleje (BB cream, sollotion),
	 * hår- og kropspleje før hudpleje (hudplejens brede ord som creme/gel må kun tage det, der er tilbage).
	 * Slugs må aldrig starte med "bedste-" – det er forbeholdt guides på roden (se permalinks.php).
	 */
	public static function categories(): array {
		return [
			'haarstyling'  => [ 'name' => 'Hårstyling', 'match' => 'glattejern|fladjern|straightener|krøllejern|krølle ?jern|krøllestav|krøllejern|curling ?(iron|wand|tong)|\bcurler|bølgejern|crimp|hårtørrer|hår ?tørrer|føntørrer|\bføn\b|hair ?dryer|hårføn|varmluftsbørste|hot ?air ?(brush|styler)|air ?wrap|airwrap|air ?styler|multistyler|multi ?styler|glattebørste|straight(ening)? ?brush|volumi[sz]er|hair ?styler|varmeruller|hot ?rollers?|diffuser', 'not' => 'beard|skæg|hood|hætte|stativ|holder til|vægbeslag|spray|creme|cream|olie|oil|serum|duft|\d+ ?ml\b|eyelash|vippe|\blash' ],
			'haarfjerning' => [ 'name' => 'Hårfjerning', 'match' => 'epilator|epilering|lysepilator|\bipl\b|lumea|silk-?expert|ladyshave|lady ?shaver|bikini ?trimmer|bikinitrimmer|venus|voksstrimler|voks ?strips|wax ?(strips|pearls|beans|warmer|heater)|voksvarmer|sukkervoks|varm voks|hårfjerningsvoks|hårfjerning|hårfjerner|hair ?remov|depilat|veet', 'not' => 'næse|nose|øre\b|ear\b|shaving heads' ],
			'tandpleje'    => [ 'name' => 'Tandpleje', 'match' => 'tandbørste|tand ?børste|toothbrush|sonicare|børstehoved|brush ?heads?|tandtråd|\bfloss|flosser|mundskyl|munddouche|tandpasta|toothpaste|tandblegning|teeth ?whitening|tungeskraber|interdental|mellemrumsbørste|tandstik|bideskinne', 'not' => 'hund|kat\b|\bpet\b|toilet|wc' ],
			'barbering'    => [ 'name' => 'Barbering & skæg', 'match' => 'barbermaskine|barber ?maskine|shaver|barberhoved|shaving|skærhoved|oneblade|skægtrimmer|skæg ?trimmer|beard|skæg|hårtrimmer|hår ?trimmer|hårklipper|hår ?klipper|hair ?clipper|clipper|trimmer|body ?groom|multigroom|grooming|næsehår|razor|skraber|barberblad|barber ?blad|\bblades?\b|barberskum|barbergel|barbersæbe|barberkost|barber ?børste|aftershave|after ?shave|pre ?shave|cleaning ?cartridge|rensevæske|shavercare|combipack|barber', 'not' => 'græs|hæk|grass|hedge|kæledyr|hund|\bpet\b|negle|nail|frisørkappe' ],
			'negle'        => [ 'name' => 'Negle', 'match' => 'neglelak|negle ?lak|nail ?polish|nail ?lacquer|gellak|gel ?lak|gel ?polish|neglefil|negle ?fil|nail ?file|neglebånd|cuticle|neglesaks|negleklipper|nail ?clipper|neglelampe|nail ?lamp|uv[ /-]?(led ?)?lampe|top ?coat|base ?coat|negleolie|neglepleje|negleforstærker|neglepynt|kunstige negle|press ?on|negle\b|nails?\b|manicure|neglebørste', 'not' => 'hånd- og negle|hånd og negle|hand ?(&|and|og) ?nail|nail ?cream|hand ?cream' ],
			'parfume'      => [ 'name' => 'Parfume', 'match' => 'eau de (parfum|toilette|cologne)|\bedp\b|\bedt\b|\bedc\b|parfume|parfum\b|perfume|cologne|body ?mist|hair ?mist|duftspray|extrait|fragrance|parfumesæt|duftsæt', 'not' => '\bdeo|deodorant|anti-?perspirant|shower|brusegel|body ?lotion|bodylotion|lotion|sæbe|soap|after ?shave|aftershave|parfumefri|uden parfume|fragrance ?free|duftlys|\blys\b|diffuser|\bbil\b|vaskemiddel|skyllemiddel|duftpinde|creme|cream' ],
			'makeup'       => [ 'name' => 'Makeup', 'match' => 'make-?up|foundation|concealer|mascara|eye ?liner|eyeliner|kajal|læbestift|lipstick|lip ?gloss|lipgloss|lip ?liner|lip ?(balm|oil|tint|stain|butter)|læbepomade|læbe|rouge|blush|bronzer|highlighter|contour|pudder|powder|primer|setting ?spray|fixing ?spray|øjenskygge|eye ?shadow|eyeshadow|shadow ?stick|cream ?shadow|eye ?pencil|cheek|palette|\bbb ?cream|\bcc ?cream|skin ?tint|cushion|bryn|brow|vipper|vippe|lashes|\blash|makeupbørste|kabuki|beauty ?blender|makeupsvamp|sminkesvamp|spejl|mirror', 'not' => 'remover|fjerner|\brens|cleans|micellar|tørshampoo|dry ?shampoo|dust|volumish|hår|hair|spejlskab|bil\b|serum' ],
			'solcreme'     => [ 'name' => 'Solcreme & selvbruner', 'match' => '\bspf|solcreme|sol ?creme|sun ?(cream|screen|lotion|spray|protect|stick|fluid|milk|care|oil|mist)|solbeskyttelse|after ?sun|aftersun|solspray|sollotion|solfaktor|anthelios|selvbruner|self[ -]?tan|tanning|bronzing ?(drops|water|mist)|spray ?tan|tan ?(mousse|drops|lotion|water)', 'not' => 'moisturi[sz]er|dagcreme|day ?cream|fugtighedscreme|daily ?protect' ],
			'haarpleje'    => [ 'name' => 'Hårpleje', 'match' => 'shampoo|shampo|balsam|conditioner|hårkur|hår ?kur|hair ?(mask|masque|treatment|oil|serum|spray|wax|gel|cream|perfume|primer|powder|tonic|lotion|fiber|paste|clay)|hårmaske|hår ?maske|hårolie|hår ?olie|leave-?in|hårspray|hårlak|hairspray|hårvoks|hår ?voks|\bwax\b|pomade|\bclay\b|\bpaste\b|fiber|mousse|stylingcreme|styling ?(cream|creme|gel|spray|paste)|varmebeskyttelse|heat ?protect|tørshampoo|tør ?shampoo|dry ?shampoo|hårfarve|hår ?farve|hair ?colou?r|hårbørste|hår ?børste|hair ?brush|tangle ?teezer|paddle ?brush|\bkam\b|redekam|hårelastik|scrunchie|hårspænde|hårklemme|hårbånd|bond ?(oil|smoother|maintenance|building)|olaplex|curl ?(cream|creme|defin)|krøllecreme|volume ?spray|texture ?spray|salt ?spray|sea ?salt|dust ?powder|volumish|hårpudder|hårtab|anti-?(dandruff|chute)|skæl|hårpleje|haarpleje', 'not' => 'læbe|lip|skæg|beard|hund|\bpet\b|kosttilskud' ],
			'kropspleje'   => [ 'name' => 'Kropspleje', 'match' => 'body ?lotion|bodylotion|body ?butter|body ?cream|kropscreme|krops ?lotion|body ?oil|kropsolie|body ?scrub|bodyscrub|kropsscrub|shower ?(gel|oil|cream|foam)|brusegel|bruse ?gel|bruseolie|bruseskum|badeolie|badesalt|bath ?(oil|salt|bomb)|sæbe|soap|deodorant|\bdeo\b|anti-?perspirant|roll-?on|håndcreme|hånd ?creme|hand ?(cream|balm|lotion)|hånd- og negle|fodcreme|fod ?creme|foot ?(cream|balm|file|mask)|fodpleje|hård hud|hard ?skin|fodfil|vacupedi|hælcreme|intim|body ?wash|bodywash|body ?milk|bodymilk|\blotion\b|kropspleje|nivea creme', 'not' => 'ansigt|face|øjen|eye|læbe|lip|hund|\bpet\b' ],
			'hudpleje'     => [ 'name' => 'Hudpleje', 'match' => 'ansigtscreme|ansigts ?creme|face ?(cream|oil|mask|wash|serum|mist|scrub)|dagcreme|day ?cream|natcreme|night ?(cream|mask)|serum|øjencreme|øjen ?creme|eye ?(cream|gel|serum|patch)|øjengel|ansigtsrens|cleanser|cleansing|rensegel|renseskum|rensemælk|renseolie|micellar|make-?up ?remover|makeupfjerner|toner|ansigtsvand|essence|ampoule|ansigtsmaske|sheet ?mask|\bmaske\b|\bmasks?\b|peeling|exfoliat|retinol|retinal|vitamin ?c|hyaluron|niacinamide|\baha\b|\bbha\b|moisturi[sz](er|ing)|fugtighedscreme|\bcreme\b|\bcream\b|\bkrem\b|\bgel\b|\bbalm\b|ansigtsolie|rensebørste|ansigtsbørste|led[ -]?(mask|maske)|derma ?roller|gua ?sha|ansigtsrulle|jade ?roller|ansigtspleje|hudpleje|anti-?age|anti-?ageing|rynke', 'not' => 'hund|\bpet\b|kosttilskud' ],
		];
	}

	/**
	 * Underkategorier = egne landingssider (lang hale), fx /haarstyling/glattejern/.
	 * 'match' testes mod produktnavnet, 'desc' mod butikkens beskrivelse, 'not' udelukker ud fra navnet. Et produkt kan ligge i flere.
	 */
	public static function subcategories(): array {
		return [
			'haarstyling' => [
				'haartoerrer'        => [ 'name' => 'Hårtørrer', 'match' => 'hårtørrer|hår ?tørrer|føntørrer|\bføn\b|hair ?dryer|hårføn', 'not' => 'børste|brush|styler' ],
				'glattejern'         => [ 'name' => 'Glattejern', 'match' => 'glattejern|fladjern|straightener', 'not' => 'børste|brush' ],
				'kroellejern'        => [ 'name' => 'Krøllejern', 'match' => 'krøllejern|krølle ?jern|krøllestav|curling|curler|bølgejern|crimp|wave' ],
				'varmluftsboerste'   => [ 'name' => 'Varmluftsbørste', 'match' => 'varmluftsbørste|hot ?air|air ?brush|volumi[sz]er|rund ?børste' ],
				'multistyler'        => [ 'name' => 'Multistyler', 'match' => 'airwrap|air ?wrap|air ?styler|multistyler|multi ?styler|hair ?styler|\d+-i-1|\d+ ?in ?1' ],
				'glatteboerste'      => [ 'name' => 'Glattebørste', 'match' => 'glattebørste|straight(ening)? ?brush' ],
				'varmeruller'        => [ 'name' => 'Varmeruller', 'match' => 'varmeruller|hot ?rollers?|curlers? set' ],
				'traadloes-haarstyling' => [ 'name' => 'Trådløs hårstyling', 'match' => 'trådløs|cordless|wireless|usb|genopladelig|rechargeable|batteri' ],
			],
			'haarfjerning' => [
				'ipl'          => [ 'name' => 'IPL', 'match' => '\bipl\b|lysepilator|lumea|silk-?expert|intense pulsed light', 'desc' => '\bipl\b' ],
				'epilator'     => [ 'name' => 'Epilator', 'match' => 'epilator|epilering', 'not' => '\bipl\b|lysepilator|lumea' ],
				'ladyshave'    => [ 'name' => 'Ladyshave og bikinitrimmer', 'match' => 'ladyshave|lady ?shaver|bikini|venus|body ?trimmer' ],
				'voks'         => [ 'name' => 'Voks og voksstrimler', 'match' => 'voks|wax|sukker' ],
				'haarfjerningscreme' => [ 'name' => 'Hårfjerningscreme', 'match' => 'creme|cream|depilat|veet' ],
			],
			'tandpleje' => [
				'el-tandboerste'      => [ 'name' => 'Eltandbørste', 'match' => 'eltandbørste|el-tandbørste|elektrisk tandbørste|electric toothbrush|sonic|vitality|\bio\d?\b|pro ?\d|series|diamondclean|protectiveclean|expertclean', 'not' => 'tandbørstehoveder|brush ?heads|refill|flosser|pasta|tandtråd|nozzle|dyse|case\b|etui' ],
				'boerstehoveder'      => [ 'name' => 'Børstehoveder', 'match' => 'børstehoved|tandbørstehoved|brush ?heads?|refill|udskiftning', 'not' => 'eltandbørste' ],
				'vandflosser'         => [ 'name' => 'Vandflosser', 'match' => 'vandflosser|water ?flosser|power ?flosser|mundskylning|munddouche|oral ?irrigator|aquacare' ],
				'tandblegning'        => [ 'name' => 'Tandblegning', 'match' => 'tandblegning|whitening|blegning|white strips' ],
				'tandpasta-og-tandtraad' => [ 'name' => 'Tandpasta og tandtråd', 'match' => 'tandpasta|toothpaste|tandtråd|\bfloss\b|mundskyl|interdental|mellemrumsbørste|tandstik', 'not' => 'flosser' ],
				'boerne-tandboerste'  => [ 'name' => 'Tandbørste til børn', 'match' => 'kids|junior|børn|frozen|spider|disney|\d+\+', 'not' => 'hoveder|heads?\b|refill' ],
			],
			'barbering' => [
				'barbermaskine'      => [ 'name' => 'Barbermaskine', 'match' => 'barbermaskine|barber ?maskine|shaver|series \d|s\d{4}|oneblade(?!.*(blade|replacement))', 'not' => 'hoved|head|blade|replacement|cartridge|rens|clean|folie|skær|combipack|tilbehør|ladyshave|lady' ],
				'skaegtrimmer'       => [ 'name' => 'Skægtrimmer', 'match' => 'skægtrimmer|skæg ?trimmer|beard ?trimmer|skæg|beard|stubble', 'not' => 'olie|oil|balm|balsam|voks|wax|shampoo|glattebørste|straightener' ],
				'haartrimmer'        => [ 'name' => 'Hårtrimmer og hårklipper', 'match' => 'hårtrimmer|hår ?trimmer|hårklipper|hår ?klipper|hair ?(clipper|cutter|trimmer)|clipper|head ?shaver' ],
				'multitrimmer'       => [ 'name' => 'Multitrimmer og bodygroom', 'match' => 'multigroom|multi ?trimmer|multitrimmer|body ?groom|bodytrimmer|body ?trimmer|grooming ?kit|\d+-i-1' ],
				'naesehaarstrimmer'  => [ 'name' => 'Næse- og øretrimmer', 'match' => 'næse|nose|øre\b|ear\b|bryn|eyebrow' ],
				'barberskraber'      => [ 'name' => 'Barberskraber og barberblade', 'match' => 'skraber|razor|barberblad|barber ?blad|\bblades?\b|safety|shavette', 'not' => 'oneblade|replacement' ],
				'barberhoveder'      => [ 'name' => 'Barberhoveder og tilbehør', 'match' => 'barberhoved|shaving ?heads?|skærhoved|combipack|replacement|udskiftelig|cleaning ?cartridge|shavercare|rensevæske|folie|skær\b|\bcc\d' ],
				'barberskum'         => [ 'name' => 'Barberskum og barbergel', 'match' => 'barberskum|barbergel|shav(e|ing) ?(gel|foam|cream|soap|oil)|barbersæbe|pre ?shave|barberolie' ],
				'aftershave'         => [ 'name' => 'Aftershave', 'match' => 'after ?shave|aftershave' ],
				'skaegpleje'         => [ 'name' => 'Skægpleje', 'match' => '(skæg|beard) ?(olie|oil|balm|balsam|voks|wax|shampoo|conditioner|børste|brush|kam|comb)', 'not' => 'trimmer' ],
			],
			'negle' => [
				'neglelak'       => [ 'name' => 'Neglelak', 'match' => 'neglelak|negle ?lak|nail ?(polish|lacquer|colou?r)|top ?coat|base ?coat', 'not' => 'gel|fjerner|remover' ],
				'gellak'         => [ 'name' => 'Gellak og gelenegle', 'match' => 'gellak|gel ?lak|gel ?polish|gelenegle|gel\b|builder|polygel|acryl' ],
				'uv-lampe'       => [ 'name' => 'UV-lampe til negle', 'match' => 'lampe|lamp|uv|led' ],
				'neglepleje'     => [ 'name' => 'Neglepleje og værktøj', 'match' => 'neglefil|negle ?fil|nail ?file|neglebånd|cuticle|neglesaks|negleklipper|nail ?clipper|negleolie|neglepleje|negleforstærker|neglebørste|manicure|fil\b|saks|klipper|remover|fjerner' ],
				'kunstige-negle' => [ 'name' => 'Kunstige negle og neglepynt', 'match' => 'kunstige|press ?on|tips|neglepynt|nail ?art|stickers|negle ?lim|nail ?glue' ],
			],
			'parfume' => [
				'dameparfume'    => [ 'name' => 'Dameparfume', 'match' => 'women|woman|femme|\bher\b|for kvinder|dame|lady|girl|\bmiss\b|\bshe\b|donna', 'desc' => 'dameparfume|til kvinder|feminin|dufte til hende', 'not' => 'homme|\bmen\b|\bman\b|uomo|\bhim\b|herre' ],
				'herreparfume'   => [ 'name' => 'Herreparfume', 'match' => 'homme|\bmen\b|\bman\b|uomo|\bhim\b|herre|\bboy\b|\bmale\b|for him', 'desc' => 'herreparfume|til mænd|maskulin|dufte til ham', 'not' => 'femme|women|woman|\bher\b|dame' ],
				'unisex-parfume' => [ 'name' => 'Unisex parfume', 'match' => 'unisex', 'desc' => 'unisex' ],
				'eau-de-parfum'  => [ 'name' => 'Eau de parfum', 'match' => 'eau de parfum|\bedp\b|parfum intense' ],
				'eau-de-toilette' => [ 'name' => 'Eau de toilette', 'match' => 'eau de toilette|\bedt\b' ],
				'body-mist'      => [ 'name' => 'Body mist og hair mist', 'match' => 'body ?mist|hair ?mist|bodyspray|body ?spray' ],
				'parfume-gavesaet' => [ 'name' => 'Parfume gavesæt', 'match' => 'gavesæt|gave ?sæt|gaveæske|gift ?set|giftset|\bset\b|sæt\b|coffret' ],
			],
			'makeup' => [
				'foundation'      => [ 'name' => 'Foundation', 'match' => 'foundation|skin ?tint|bb ?cream|cc ?cream|cushion|tinted moisturi' ],
				'concealer'       => [ 'name' => 'Concealer', 'match' => 'concealer|corrector' ],
				'pudder'          => [ 'name' => 'Pudder', 'match' => 'pudder|powder', 'not' => 'eyeshadow|øjenskygge|bryn|brow|blush|bronz|highlight' ],
				'rouge-og-bronzer' => [ 'name' => 'Rouge, bronzer og highlighter', 'match' => 'blush|bronzer|highlighter|contour|glow ?stick|cheek|kinder' ],
				'mascara'         => [ 'name' => 'Mascara', 'match' => 'mascara' ],
				'eyeliner'        => [ 'name' => 'Eyeliner og kajal', 'match' => 'eye ?liner|kajal|khol|kohl' ],
				'oejenskygge'     => [ 'name' => 'Øjenskygge', 'match' => 'øjenskygge|eye ?shadow|eyeshadow|palette', 'not' => 'bryn|brow|contour|blush|face' ],
				'bryn'            => [ 'name' => 'Brynprodukter', 'match' => 'bryn|brow' ],
				'kunstige-vipper' => [ 'name' => 'Kunstige vipper', 'match' => 'vipper|lashes|vippelim|lash ?(glue|bond)|underlash', 'not' => 'mascara|serum' ],
				'laebestift'      => [ 'name' => 'Læbestift og lipgloss', 'match' => 'læbestift|lipstick|lip ?gloss|lipgloss|lip ?liner|lip ?(tint|stain|colou?r|lacquer)|læbe ?farve', 'not' => 'balm|pomade|butter|oil|scrub|mask' ],
				'laebepleje'      => [ 'name' => 'Læbepomade og læbepleje', 'match' => 'læbepomade|lip ?(balm|butter|oil|mask|scrub|care)|læbe ?(pleje|balsam|pomade)' ],
				'primer-og-setting-spray' => [ 'name' => 'Primer og setting spray', 'match' => 'primer|setting ?spray|fixing ?spray|fixer' ],
				'makeupboerster'  => [ 'name' => 'Makeupbørster og svampe', 'match' => 'børste|brush|kabuki|blender|svamp|sponge|puff' ],
				'makeupspejl'     => [ 'name' => 'Makeupspejl', 'match' => 'spejl|mirror' ],
			],
			'solcreme' => [
				'solcreme-til-ansigt' => [ 'name' => 'Solcreme til ansigt', 'match' => 'ansigt|face|facial|fluid|anthelios|uvmune|\b(30|50) ?ml\b|stick', 'not' => 'body|krop|after|selvbrun|tan' ],
				'solcreme-til-krop'   => [ 'name' => 'Solcreme til krop', 'match' => 'body|krop|lotion|spray|oil|olie|milk|\b(150|200|250|300|400) ?ml\b', 'not' => 'after|selvbrun|tan|face|ansigt' ],
				'solcreme-til-boern'  => [ 'name' => 'Solcreme til børn', 'match' => 'kids|børn|children|baby|junior|sensitive kids' ],
				'after-sun'           => [ 'name' => 'After sun', 'match' => 'after ?sun|aftersun' ],
				'selvbruner'          => [ 'name' => 'Selvbruner', 'match' => 'selvbrun|self[ -]?tan|tanning|bronzing|spray ?tan|\btan\b|\bglow\b' ],
			],
			'haarpleje' => [
				'shampoo'          => [ 'name' => 'Shampoo', 'match' => 'shampoo|shampo', 'not' => 'tør|dry|conditioner|balsam|\bsæt\b|\bset\b' ],
				'balsam'           => [ 'name' => 'Balsam', 'match' => 'balsam|conditioner', 'not' => 'leave-?in|shampoo' ],
				'haarkur'          => [ 'name' => 'Hårkur og hårmaske', 'match' => 'hårkur|hår ?kur|hair ?(mask|masque|treatment)|hårmaske|kur\b|mask|masque|treatment|leave-?in|bond' ],
				'haarolie'         => [ 'name' => 'Hårolie og serum', 'match' => 'olie|oil|serum|elixir' ],
				'stylingprodukter' => [ 'name' => 'Stylingprodukter', 'match' => 'hårvoks|\bwax\b|voks|pomade|clay|paste|fiber|gel|mousse|hårspray|hårlak|hairspray|spray|stylingcreme|styling|texture|volume|salt|dust|powder|pudder|curl', 'not' => 'shampoo|balsam|conditioner|tør ?shampoo|dry ?shampoo|varmebeskyttelse|heat ?protect' ],
				'toershampoo'      => [ 'name' => 'Tørshampoo', 'match' => 'tørshampoo|tør ?shampoo|dry ?shampoo' ],
				'varmebeskyttelse' => [ 'name' => 'Varmebeskyttelse', 'match' => 'varmebeskyttelse|heat ?protect|thermal|termo' ],
				'haarfarve'        => [ 'name' => 'Hårfarve og silvershampoo', 'match' => 'hårfarve|hår ?farve|hair ?colou?r|silver|toning|toner|lilla|purple|farve' ],
				'haarboerste'      => [ 'name' => 'Hårbørster og kamme', 'match' => 'børste|brush|tangle|\bkam\b|redekam|comb' ],
				'haartilbehoer'    => [ 'name' => 'Hårelastikker og hårpynt', 'match' => 'elastik|scrunchie|spænde|klemme|hårbånd|clips|hårpynt|claw' ],
				'haartab'          => [ 'name' => 'Hårtab og hovedbund', 'match' => 'hårtab|anti-?chute|thinning|hair ?loss|skæl|dandruff|hovedbund|scalp|psolution' ],
			],
			'kropspleje' => [
				'bodylotion'      => [ 'name' => 'Bodylotion og body butter', 'match' => 'body ?lotion|bodylotion|body ?butter|body ?cream|kropscreme|body ?milk|bodymilk|lotion|creme|cream|baume|balm', 'not' => 'hånd|hand|fod|foot|hæl|shower|bruse|sun|sol' ],
				'brusegel'        => [ 'name' => 'Brusegel og sæbe', 'match' => 'shower|brusegel|bruse|sæbe|soap|body ?wash|bodywash|cleansing|syndet|bade' ],
				'deodorant'       => [ 'name' => 'Deodorant', 'match' => '\bdeo|deodorant|anti-?perspirant|roll-?on' ],
				'haandcreme'      => [ 'name' => 'Håndcreme', 'match' => 'hånd|hand' ],
				'fodpleje'        => [ 'name' => 'Fodpleje', 'match' => 'fod|foot|feet|hæl|hård hud|hard ?skin|vacupedi|pedi' ],
				'kropsscrub'      => [ 'name' => 'Bodyscrub', 'match' => 'scrub|peeling|exfoliat' ],
				'kropsolie'       => [ 'name' => 'Kropsolie', 'match' => 'body ?oil|kropsolie|olie|oil', 'not' => 'shower|bruse' ],
			],
			'hudpleje' => [
				'dagcreme'        => [ 'name' => 'Dagcreme og fugtighedscreme', 'match' => 'dagcreme|day ?cream|moisturi[sz]|fugtighedscreme|hydrator|gel-?cream|ansigtscreme|face ?cream|\bcreme\b|\bcream\b', 'not' => 'nat|night|øjen|eye|rens|cleans' ],
				'natcreme'        => [ 'name' => 'Natcreme', 'match' => 'natcreme|night|nat ?creme|sleeping|overnight' ],
				'serum'           => [ 'name' => 'Serum', 'match' => 'serum|ampoule|essence|booster|\bshot\b|drops', 'not' => 'øjen|eye|hår|hair' ],
				'oejencreme'      => [ 'name' => 'Øjencreme', 'match' => 'øjen|eye' ],
				'ansigtsrens'     => [ 'name' => 'Ansigtsrens og makeupfjerner', 'match' => 'rens|cleans|micellar|remover|fjerner|wash|skum|foam|toner|ansigtsvand' ],
				'ansigtsmaske'    => [ 'name' => 'Ansigtsmaske', 'match' => 'mask|maske|patch', 'not' => 'led' ],
				'peeling'         => [ 'name' => 'Peeling og eksfoliering', 'match' => 'peeling|exfoliat|scrub|\baha\b|\bbha\b|\bpha\b|glycol|salicyl|enzym' ],
				'retinol'         => [ 'name' => 'Retinol', 'match' => 'retinol|retinal|retinoid|bakuchiol' ],
				'c-vitamin'       => [ 'name' => 'C-vitamin til huden', 'match' => 'vitamin ?c|c-vitamin|vita ?c|ascorbic' ],
				'hudpleje-til-maend' => [ 'name' => 'Hudpleje til mænd', 'match' => '\bmen\b|homme|for men|\bman\b|herre' ],
				'skoenhedsapparater' => [ 'name' => 'Skønhedsapparater', 'match' => 'rensebørste|ansigtsbørste|led[ -]?(mask|maske)|derma ?roller|gua ?sha|ansigtsrulle|jade ?roller|microcurrent|ultralyd|sonic|apparat|device' ],
			],
		];
	}

	/** Mærker, der kun laver én slags produkter: deres varer uden et kategoriord i navnet lander her. */
	public static function brand_categories(): array {
		return [
			'olaplex' => 'haarpleje', 'k18' => 'haarpleje', 'moroccanoil' => 'haarpleje', 'idhair' => 'haarpleje', 'kérastase' => 'haarpleje',
			'wella' => 'haarpleje', 'milk shake' => 'haarpleje', 'redken' => 'haarpleje', 'davines' => 'haarpleje', 'maria nila' => 'haarpleje',
			'ghd' => 'haarstyling', 'dyson' => 'haarstyling', 'babyliss' => 'haarstyling', 'gillian jones' => 'makeup',
			'oral-b' => 'tandpleje', 'gillette' => 'barbering',
		];
	}

	/** Produkter, der aldrig skal med (navn eller butikkens kategori). */
	public static function exclude(): array {
		return [
			'gavekort|kursus|workshop|behandling hos',
			'kosttilskud|gummies|kapsler\b|tabletter|tablets|capsules|proteinpulver|protein ?bar|vitaminer\b',
			'blodtryk|blood ?pressure|termometer|thermometer|oximeter|personvægt|badevægt|kropsanalyse|inhalator|nebulizer|otoscope|ear-?clean|ørerens|høreapparat|varmetæppe|varmepude|massagepistol|massageapparat|tens\b',
			'smykke|jewel|organi[sz]er|organisator|toilettaske|toilet ?taske|rejsetaske|shaker ?bottle|football|fodbold',
			'\bhund|hunde|\bkat\b|katte|\bpet\b|hest|kæledyr',
			'strømforsyning|oplader\b|charger|adapter|kabel\b|ledning',
			'frisørkappe|sprayflaske|græstrimmer|hækkeklipper|plæneklipper',
		];
	}

	/** Butikskategorier, hvor kun vores egne regler må afgøre placeringen (de siger intet om produktet). */
	public static function meaningless_shop_categories(): array {
		return [ 'brands', 'mærker', 'tilbud', 'udsalg', 'nyheder', 'gaveideer', 'gaver', 'alle produkter', 'black friday', 'black month', 'sortiment', 'bundle', 'diverse', 'skønhed', 'beauty', 'personlig pleje', 'anden personlig pleje', 'velvære' ];
	}

	/**
	 * Maskinkategorier, hvor tilbehør (filtre, reservedele, låg …) i stedet skal til 'accessory_target'.
	 * Fitbase bruger det til løbebånd m.m.; Myappeal bruger det ikke.
	 */
	public static function machine_categories(): array {
		return [];
	}

	public static function accessory_pattern(): string {
		return 'reservedel|filter til|kande til|skål til|knivblad til|tilbehør til';
	}

	public static function accessory_target(): string {
		return 'barbering';
	}

	/**
	 * Hvilke filteregenskaber Attributes skal udtrække fra teksten (se Attributes::extract()).
	 * Fitbase: foldable, incline, max_speed, max_weight, weight_kg. Myappeal: ingen endnu.
	 */
	public static function attributes(): array {
		return [];
	}

	/** Prisintervaller i filtre og mega-menu: nøgle => [ label, min, max ]. */
	public static function price_bands(): array {
		return [
			'0-100'     => [ 'Under 100 kr', 0, 100 ],
			'100-250'   => [ '100–250 kr', 100, 250 ],
			'250-500'   => [ '250–500 kr', 250, 500 ],
			'500-1000'  => [ '500–1.000 kr', 500, 1000 ],
			'1000-2000' => [ '1.000–2.000 kr', 1000, 2000 ],
			'2000-4000' => [ '2.000–4.000 kr', 2000, 4000 ],
			'4000-'     => [ 'Over 4.000 kr', 4000, PHP_INT_MAX ],
		];
	}

	public static function uncategorized_slug(): string {
		return 'ukategoriseret';
	}
}
