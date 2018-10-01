<?php 
class ConfigBD {
        private $server;
        private $user;
        private $senha;
        private $bd;
        private $codcaracteres;
        
    public function __construct() {
            $this->setServer();
            $this->setUser();
            $this->setSenha();
            $this->setBd();
            $this->setCodcaracteres();
        }
    public function getServer() {
        return $this->server;
    }
    public function setServer() {
        $this->server = "localhost";
    }
    public function getUser() {
        return $this->user;
    }
    public function setUser(){
        $this->user = "root";
    }
    public function getSenha() {
        return $this->senha;
    }
    public function setSenha() {
        $this->senha = "";
    }
    public function getBd(){
        return $this->bd;
    }
    public function setBd(){
        $this->bd = "bdtodolist";
    }
    public function getCodcaracteres(){
        return $this->codcaracteres;
    }
    public function setCodcaracteres(){
        $this->codcaracteres = "utf8";
    }
    

    public function conectarBD(){
        $link=mysqli_connect($this->getServer(), $this->getUser(), $this->getSenha(), $this->getBd());
        mysqli_set_charset($link, $this->getCodcaracteres());
        if (!$link){
            $erro = '';
            return $erro;
        }
        else{
            return $link;
        }
        
    }
    public function fecharBD ($link){
        mysqli_close($link);
    }
    
}
?>
