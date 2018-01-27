 
<?php 
//sudo apt-get install php7.0-xml -y comando para instalar o xml no linux pelo terminal
echo '<pre>';
echo htmlspecialchars(file_get_contents('correios.xml'));
$correios = new SimpleXMLElement(file_get_contents('correios.xml'));
print_r($correios);
echo "<pre>";
if ($correios->Servicos->cServico->Codigo= "04014"){
	echo "Sedex a Vista";
}else


echo "Codigo: ".$correios->Servicos->cServico->Codigo."<BR>";
echo "Valor: ".$correios->Servicos->cServico->Valor."<BR>";
echo "Prazo Entrega: ".$correios->Servicos->cServico->PrazoEntrega."<BR>";
echo "Entrega Sabado: ".$correios->Servicos->cServico->EntregaSabado."<BR>";
 ?>





 