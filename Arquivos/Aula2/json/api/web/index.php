<?php

use Symfony\Component\HttpFoundation\Request;
require_once __DIR__.'/../vendor/autoload.php';
$dsn = 'pgsql:host=localhost;dbname = api';
$user = 'leandro';
$pass = '123456';
$con = new PDO($dsn, $user, $pass);

$app = new Silex\Application();
$app->before(function (Request $request) use ($app,$con) {
	$headers = $request->headers->all();
	$data = [
	':token'=>$headers['token'][0]
	];
	
	$query = 'SELECT * FROM usuarios WHERE token = :token';
	$request = $con->prepare($query);
	$request->execute($data);
	
	if($request->rowCount()){
$app->data['logado'] = true;
	}else {
		$app->data['logado'] = false;
	}
});

$app->get('/aluno/read/', function() use($app,$con) {
	$query = 'SELECT id,nome,sobrenome,email FROM ALUNOS';
	$db = $con->query($query);
	$db->execute();
	$alunos = $db->fetchAll(PDO::FETCH_ASSOC);
    return $app->json($alunos);
});

$app->get('/aluno/{id}', function($id) use($app,$con) {

	$data = [':id'=>$id];
	$query = 'SELECT nome,sobrenome,email FROM ALUNOS WHERE id = :id';
	$request = $con->prepare($query);
	$request->execute($data);
	
	if ($request->rowCount()){
		$aluno = $request->fetch(PDO::FETCH_ASSOC);
		return $app->json($aluno);
	}else {
return $app->json(['msg'=>'Aluno nao encontrado',
	'logado'=>$app->data['logado']
	]);
	}
})->assert('id', '\d+');

$app->post('/aluno', function(Request $request) use($app,$con) {
	$post = json_decode($request->getContent());
//var_dump($post);

	if (!$app->data['logado']){
		return $app->json(['msg'=>'Usuario nao esta logado']);
}
	$data = [
	':nome'=>$post->nome,
	':sobrenome'=>$post->sobrenome,
	':email'=>$post->email
	];
	if (!filter_var($data[':email'],FILTER_VALIDATE_EMAIL)){
    	
    	return $app->json('Email Invalido',400);
    }
	$query = 'INSERT into alunos (nome,sobrenome,email)values (:nome,:sobrenome,:email)';
	$request = $con->prepare($query);
	if ($request->execute($data)){
		return $app->json(['msg'=>'Aluno incluido com sucesso!']);
	}else {
		return $app->json(['msg'=>'Erro ao incluir aluno']);
	}
    return $request->getContent();
        
});
$app->put('/aluno', function(Request $request) use($app,$con) {
	$post = json_decode($request->getContent());
	$data = [':nome'=>$post->nome,
	':id'=>$post->id
	];
	$query = 'UPDATE alunos  SET nome= :nome where id = :id';
	$request = $con->prepare($query);
	if ($request->execute($data)){
		return $app->json(['msg'=>'Cadastro Atualizado com sucesso!']);
	}else {
		return $app->json(['msg'=>'Erro ao atualizar cadastro!']);
	}
    return $request->getContent();
});
$app->delete('/aluno', function(Request $request) use($app,$con) {
	$post = json_decode($request->getContent());
	$data = [':id'=>$post->id
	];
	$query = 'delete from alunos where id = :id';
	$request = $con->prepare($query);
	if ($request->execute($data)){
		return $app->json(['msg'=>'Cadastro excluido com sucesso!']);
	}else {
		return $app->json(['msg'=>'Erro ao excluir cadastro!']);
	}
    return $request->getContent();
});


$app->run();
?>