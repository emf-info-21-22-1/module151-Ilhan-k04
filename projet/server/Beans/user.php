<?php

class User{
    private $username;
    private $pk_user;
    private $mdp;


    public function __construct($username, $mdp){
        $this->username = $username;
        $this->mdp = $mdp;
    }

    public function getPk(){
        return $this->pk_user;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getMdp(){
        return $this->mdp;
    }

    public function setPk($pk_user){
        return $this->pk_user = $pk_user;
    }

    public function setUsername($username){
        return $this->username = $username;
    }

    public function setMdp($mdp){
        $this->mdp = $mdp;
    }
}
?>