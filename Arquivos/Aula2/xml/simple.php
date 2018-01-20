<?php 
//sudo apt-get install php7.0-xml -y comando para instalar o xml no linux pelo terminal
echo '<pre>';
echo htmlspecialchars(file_get_contents('mulheres.xml'));
$mulheres = new SimpleXMLElement(file_get_contents('mulheres.xml'));
print_r($mulheres);
$mulheres->mulher[0]->nome = 'Urso';
$nova = $mulheres->addChild('mulher');
$nova->addChild('nome','angelina');
unset($mulheres->mulher[0]->sobrenome);
$med = $mulheres->mulher[0]->medidas->attributes();
echo '<hr>';
echo $med->unidade;
$med->unidade = "m";
$med->addAttribute('qualidade','1');
print_r($mulheres);
 ?>