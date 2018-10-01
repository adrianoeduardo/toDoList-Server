<?php

require_once '../Models/Dados.php';

header('Access-Control-Allow-Origin:http://localhost:4200');
header("Access-Control-Allow-Headers: Content-Type");
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Methods: GET, POST, DELETE, PUT");
$params = explode("/", substr(@$_SERVER['PATH_INFO'], 1));
$postdata = file_get_contents("php://input");
$request = (object)json_decode($postdata);
$metodo = $_SERVER['REQUEST_METHOD'];
$id = $params[0];
$t=isset($request->tarefa)?$request->tarefa:"";

$dados = new Dados;
	switch ($metodo) {
		case "GET":
			$response = $dados->lerTarefas($id);
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($response);
			break;
		case "POST":
			$response = $dados->addTarefa ($t);
			if ($response == ""){
				$msg = "Tarefa adicionada a lista com sucesso";
				echo $msg;
			} else{
				echo $response;
			}			
			break;
		case "PUT":
			$response = $dados->editarTarefa ($id, $t);
			if ($response == ""){
				$msg = "Tarefa alterada com sucesso";
				echo $msg;
			} else{
				echo $response;
			}	
			break;
		case "DELETE":
			$response = $dados->excluirTarefa ($id);
			if ($response == ""){
				$msg = "A tarefa foi removida da lista com sucesso";
				echo $msg;
			} else{
				echo $response;
			}	
			break;
	}

?>