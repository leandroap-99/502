<?php 
echo '<pre';
$mulheres = new DOMdocument();
$mulheres->load('mulheres.xml');

//print_r ($mulheres);
//print_R($mulheres->getElementBytagname('mulher'));
//$array->item[0]->nodevalue = 'Urso';
print_r($mulheres);
echo '<pre>';
$medidas = $mulheres->getElementsBytagname('medidas');
$pe = $mulheres->createElement('pe','36');
$pes = $mulheres->getElementsBytagname('pe');
$medidas->item(0)->appendChild($pe);
print_r($mulheres);
print_r(htmlspecialchars($mulheres->saveXML()));
$medidas->item(0)->removeChild($pes->item(0));
print_r($mulheres);
 ?>