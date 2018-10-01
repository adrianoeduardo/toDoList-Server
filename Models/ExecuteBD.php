<?php

require_once 'ConfigBD.php';

class ExecuteBD {

	 public function executarQuery($query){
	 	$banco = new ConfigBD;
        $link= $banco->conectarBD();
        $sql= mysqli_query($link, $query);
        if (!$sql){
            $erro = "Erro no Banco de Dados: ".mysqli_error($link)." :/";
            return $erro;
        }else{
            $msg = "";
            return $msg;
        }
        fecharBD ($link);
    }
    public function retornaJson ($query){
        $banco = new ConfigBD;
        $link= $banco->conectarBD();
        $sql= mysqli_query($link, $query);
        $dados=[];
        while ($consultar = mysqli_fetch_object($sql)) {
            array_push($dados, $consultar);
        }
        return $dados;
        fecharBD ($link);
    }
    public function protegerBD($dados){
        $banco = new ConfigBD;
        $link= $banco->conectarBD();
        $dados=mysqli_real_escape_string($link, $dados);
        return $dados;
    }
}