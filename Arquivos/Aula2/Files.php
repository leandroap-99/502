
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action "" method = "POST" enctype = "multipart/form-data">
	<input type = "file" name = "ark">
	<input type = "submit" value = "Enviar">
	</form>
</body>
</html>
<?php 



echo '<pre>';
if (!empty($_FILES)){
	$uploaddir = '/var/www/html/501/Arquivos/';
$uploadfile = $uploaddir  . basename($_FILES['ark']['name']);
if (move_uploaded_file($_FILES['ark']['tmp_name'],$uploadfile)){

	echo "Arquivo válido e enviado com sucesso.\n";
}else{
	echo "Possivel ataque de upload de arquivo! \n";
}
}
echo "Aqui estão mais informações de debug:";
print_r($_FILES);
echo '</pre>';


 ?>