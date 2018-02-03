<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Validação CPF</title>
</head>
<body>
	<form name = Validator action = "" method = "POST">
	CPF:  <input type = "text" name = "cpf"/>
	<input type= "submit" value "Enviar"/>
	</form>
</body>
</html>

<?php 
if ($_POST){
$cpf1 =  $_POST['cpf'];
$validatorcpf1 = '/(?<![^\s])\d{3}(\.)?\d{3}(\.)?\d{3}(\-)?\d{2}(?![^\s])/';

if (preg_match($validatorcpf1,$cpf1)){

	echo "CPF Verdadeiro";
}else 
{
	echo "CPF Falso";
}
}

 ?>