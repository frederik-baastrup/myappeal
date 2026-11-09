<?php
// Test af kategorireglerne uden WordPress: php dev/test-classifier.php
function get_option($k){return false;}
$src=__DIR__."/../wp-content/plugins/playform-feeds/src/";
require $src.'Config.php'; require $src.'Classifier.php';
use Playform\Feeds\{Classifier,Config};
$cases=[
['Remington glattejern S9600 Silk','haarstyling'],['Philips hårtørrer 5000 Series','haarstyling'],['BaByliss krøllejern 25 mm','haarstyling'],
['Braun Lysepilator (IPL) PL5210','haarfjerning'],['Philips Epilator Series 8000','haarfjerning'],['Oral-B Eltandbørste iO2 Night Black','tandpleje'],
['Philips Tandbørstehoveder Sonicare 4 stk','tandpleje'],['Philips Skægtrimmer 5000 Series','barbering'],['Braun Barbermaskine Series 7','barbering'],
['Essie neglelak 13,5 ml','negle'],['Hugo Boss Bottled EDT 100 ml','parfume'],['Maybelline mascara Lash Sensational','makeup'],
['La Roche-Posay Anthelios SPF50+ 50 ml','solcreme'],['Olaplex No. 4 shampoo 250 ml','haarpleje'],['CeraVe Moisturising Lotion 473 ml','kropspleje'],
['Rexona deodorant roll-on 50 ml','kropspleje'],['The Ordinary Niacinamide serum 30 ml','hudpleje'],['Clinique Moisture Surge dagcreme','hudpleje'],
['Beurer blodtryksmåler BM 28','exclude'],['Kosttilskud til hår og negle, 60 kapsler','exclude'],['Hundeshampoo 250 ml','exclude'],
];
$bad=0;foreach($cases as [$n,$want]){ $got=Classifier::classify(['name'=>$n,'brand'=>'','shop_category'=>'','price'=>100,'shop'=>'well']); if($got!==$want){$bad++; echo "FAIL: $n -> $got (ville have $want)\n";}}
echo count($cases)-$bad."/".count($cases)." ok\n";
