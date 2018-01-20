<!DOCTYPE html>
<html>
<head>
	<title>Formulário</title>
</head>
<body>
<h1>Diferença de datas</h1><br>
<form  method="POST">
<input type "" name=data1>
<input type "" name=data2>
<input type="submit" value = "Enviar">
</form>
</body>
</html>
<?php



if ($_POST){
	$P1 = explode ('/',$_POST['data1']);
	$P1 = $P1[1].'/'.$P1[0].'/'.$P1[2];	
	$P2 = explode ('/',$_POST['data2']);
	$P2 = $P2[1].'/'.$P2[0].'/'.$P2[2];	
	$d1 = new DateTime("$P1");
	$d2 = new DateTime("$P2");
	$intervalo = $d1->diff($d2);
		echo "Diferença de:".$intervalo->format('%Y anos, %m meses e %d dias');
	if ($d1>$d2){
		echo "A data maior é: {$d1->format('d/m/Y')} ";
		/*d1 se tornou objeto então não podemos usar o eco direto apenas da forma mencionada acima*/
		
	}else {
		echo "A data maior é: {$d2->format('d/m/Y')} ";
		/*d2 se tornou objeto então não podemos usar o eco direto apenas da forma mencionada acima*/
			
	}
}

/*$P1->format('d/m/Y');
$P2->format('d/m/Y');*/

/*$d1->format('m/d/Y');
$d2->format('m/d/Y');*/


 ?>