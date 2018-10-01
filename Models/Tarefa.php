<?php

require_once 'Query.php';
require_once 'ExecuteBD.php';

class Tarefa extends Query{
    
    private $tarefa;


    public function getTarefa(){
        return $this->tarefa;
    }
    
    public function setTarefa($tarefa){
        $this->tarefa = $tarefa;       
    }

    public function getQueryinclusao(){
        return $this->queryinclusao;
    }
    public function setQueryinclusao(){
        $this->queryinclusao = "INSERT INTO tarefas values ('default', '".$this->getTarefa()."')";
    }
    public function getQueryalteracao(){
        return $this->queryalteracao;
    }
    public function setQueryalteracao($id){
        $this->queryalteracao = "UPDATE tarefas SET tarefa ='".$this->getTarefa()."' WHERE id =".$id;
    }
    public function getQueryjson(){
        return $this->queryjson;
    }
    public function setQueryjson($id){
        if ($id == ""){
            $this->queryjson = "SELECT * FROM tarefas";    
        }else {
            $this->queryjson = "SELECT * FROM tarefas WHERE id = ".$id;
        }
        
    }
    public function getQueryexclusao(){
        return $this->queryexclusao;
    }
    public function setQueryexclusao($id){
        $this->queryexclusao = "DELETE FROM tarefas WHERE id =".$id;
    }
}

?>