<?php 


$arquivo = fopen('aluno.csv', 'a+');
$alunos = [];
$index = 0;
$remover = 2;
while (($linha = fgetcsv($arquivo))!== false) {
	
	//$alunos[]=explode(',',$linha);
	$alunos[] = $linha;
	
	$index++;
}
unset ($alunos[$remover]);
//echo file_get_contents('aluno.csv');
echo '<pre>';
echo '</pre>';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inserir nomes no arquivo</title>
</head>
<body>
<form action="" method="POST">
	Nome: <input type="text" name=nome><br>
	Sobrenome: <input type="text" name=sobrenome><br>
	Idade: <input type="text" name=idades><br>
	<button>Salvar</button>
</form>
<table border="1">
	<thead>
		<tr>
			<th>Linha</th>
			<th>Nome</th>
			<th>Sobrenome</th>
			<th>Idade</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		<?php
			$index = 0;
			foreach($alunos as $aluno): ?>
			<td><?= $index++   ?></td>
			<td><?= $aluno[0] ?></td>
			<td><?= $aluno[1] ?></td>
			<td><?= $aluno[2] ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
<?php
$arquivo = fopen('aluno.csv','w+');
$texto = '';
foreach ($alunos as $aluno){
fwrite($arquivo,join(',',$aluno).PHP_EOL);	
}
 echo $texto;
 fclose($arquivo)
 ?>
</body>
</html>
<?php 
if ($_POST){
$nome1 = $_POST['nome'];
$sobrenome1 = $_POST['sobrenome'];
$idade1 = $_POST['idades'];
fwrite($arquivo,"$nome1,$sobrenome1,$idade1".PHP_EOL);
fclose($arquivo);
header ('Location:exemplo3.php');

}

 ?>




