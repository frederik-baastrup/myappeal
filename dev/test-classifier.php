<?php
// Test af kategorireglerne uden WordPress: php dev/test-classifier.php
function get_option($k){return false;}
$src=__DIR__."/../wp-content/plugins/playform-feeds/src/";
require $src.'Config.php'; require $src.'Classifier.php';
use Playform\Feeds\{Classifier,Config};
$cases=[
['Remington glattejern S9600 Silk','haarstyling'],['Philips hårtørrer 5000 Series','haarstyling'],['BaByliss krøllejern 25 mm','haarstyling'],
['Braun Lysepilator (IPL) PL5210','haarfjerning'],['Philips Epilator Series 8000','haarfjerning'],['Oral-B Eltandbørste iO2 Night Black','tandpleje'],
['Philips Tandbørstehoveder Sonicare 4 stk','tandpleje'],['Philips Skægtrimmer 5000 Series','exclude'],['Braun Barbermaskine Series 7','exclude'],
['Essie neglelak 13,5 ml','negle'],['Lancôme La Vie est Belle EDP 50 ml','parfume'],['Hugo Boss Bottled EDT 100 ml','exclude'],['Philips Ladyshaver Series 6000','haarfjerning'],['Bio-Vitae Snail Peptide Serum 30 ml','hudpleje'],['Maybelline mascara Lash Sensational','makeup'],
['La Roche-Posay Anthelios SPF50+ 50 ml','solcreme'],['Olaplex No. 4 shampoo 250 ml','haarpleje'],['CeraVe Moisturising Lotion 473 ml','kropspleje'],
['Rexona deodorant roll-on 50 ml','kropspleje'],['The Ordinary Niacinamide serum 30 ml','hudpleje'],['Clinique Moisture Surge dagcreme','hudpleje'],
['Beurer blodtryksmåler BM 28','exclude'],['Kosttilskud til hår og negle, 60 kapsler','exclude'],['Hundeshampoo 250 ml','exclude'],
];
$bad=0;foreach($cases as [$n,$want]){ $got=Classifier::classify(['name'=>$n,'brand'=>'','shop_category'=>'','price'=>100,'shop'=>'test']); if($got!==$want){$bad++; echo "FAIL: $n -> $got (ville have $want)\n";}}
echo count($cases)-$bad."/".count($cases)." ok\n";
// Butikker med category_map ('!<slug>', 'map_parents', '*', mærke + navn i udelukkelserne), 10. nov. 2026.
$shop_cases=[
['Wella SP Repair Mask 200 ml.','Wella','Håret > Hårkur og Hårolie > Hårkur','well','haarpleje'],
['Remington D1500 Rejsehårtørrer','Remington','Håret','well','haarstyling'],
['Gucci Guilty EDT 50 ml.','Gucci','','well','exclude'],
['Nivea Luminous630 Skin Glow Serum (15 ml)','Nivea','','well','hudpleje'],
['Sachajuan Thickening Shampoo','Sachajuan','Personlig Pleje > Dufte > Dufte til ham > Parfume','well','exclude'],
['Eros Eau De Toilette 100ml','Versace','Parfume','beova','exclude'],
['Yara EdP 100ml','Lattafa','Parfume','beova','parfume'],
['Bagsværd Lakrids Classic','Bagsværd Lakrids','Alle produkter, Gavekort','glowstudio','exclude'],
['MADARA Cellular Serum','MADARA','Alle produkter, Gavekort, Hudpleje','glowstudio','hudpleje'],
['Bvlgari - Aqva Pour Homme - 100 ml - Edt','Bvlgari','Parfumer og dufte > Mænd - Herredufte','billigparfume','exclude'],
['Ladyshaver - Blå - med batteridisplay','skyskin','Ladyshaver','skyskin','haarfjerning'],
];
$bad2=0;foreach($shop_cases as [$n,$b,$c,$s,$want]){ $got=Classifier::classify(['name'=>$n,'brand'=>$b,'shop_category'=>$c,'price'=>100,'shop'=>$s]); if($got!==$want){$bad2++; echo "FAIL ($s): $n -> $got (ville have $want)\n";}}
echo count($shop_cases)-$bad2."/".count($shop_cases)." ok (butikker)\n";
