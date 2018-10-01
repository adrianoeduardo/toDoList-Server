<?php

	require_once 'ExecuteBD.php';
	require_once 'Tarefa.php';
	
	class Dados{  

	    public function lerTarefas ($id){
	    	$banco = new ExecuteBD;
			$tarefa = new Tarefa;	
	    	$tarefa->setQueryjson($id);
			$query = $tarefa->getQueryjson();
			$dados=$banco->retornaJson($query);			
			return $dados;
		}	   
		public function addTarefa ($t){
		 	$banco = new ExecuteBD;
			$t = $banco->protegerBD($t);
			$tarefa = new Tarefa;
		    $tarefa->setTarefa($t);
		    $tarefa->setQueryinclusao();
			$res = $banco->executarQuery($tarefa->getQueryinclusao());
			return $res;	
		}
		public function editarTarefa ($id, $t){
			$banco = new ExecuteBD;
			$t = $banco->protegerBD($t);
			$tarefa = new Tarefa;
		    $tarefa->setTarefa($t);
		    $tarefa->setQueryalteracao($id);
		    $res = $banco->executarQuery($tarefa->getQueryalteracao());
			return $res;
		}
		public function excluirTarefa ($id){
			$banco = new ExecuteBD;
			$tarefa = new Tarefa;
			$tarefa->setQueryexclusao($id);
		    $res = $banco->executarQuery($tarefa->getQueryexclusao());
			return $res;

		}

	   
	}
?>