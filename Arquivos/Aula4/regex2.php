<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Validação RG</title>
</head>
<body>
	<form name = Validator action = "" method = "POST">
	RG:  <input type = "text" name = "rg"/>
	<input type= "submit" value "Enviar"/>
	</form>
</body>
</html>

<?php 
if ($_POST){
$rg1 =  $_POST['rg'];
$validatorrg1 = '/\d{2}[\.]?\d{3}[\.]?\d{3}[-]?[\dxX]/';

if (preg_match_all($validatorrg1, $rg1, $rg)){

	echo "RG Verdadeiro";
}else 
{
	echo "RG Falso";
}
}