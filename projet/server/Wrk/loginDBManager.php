<?php
include_once("connexion.php");

class loginDBManager
{
    private $connexion;

    public function __construct()
    {
        $this->connexion = connexion::getInstance();
    }

    public function checkLogin($user)
    {
        $requete = "SELECT * FROM `t_utilisateurs` WHERE nom = ?";
        $result = $this->connexion->selectSingleQuery($requete, [$user->getUsername()]);
        if ($result) {
            //L'utilisateur existe 

            if (password_verify($user->getMdp(), $result['mdp'])) {
                return true;
            } else {
                return false;
            }


        } else {
            //Utilisateur innexistant
            return false;


        }

    }

    public function inscription($username, $passwd)
    {
        $hashedPass = password_hash($passwd, PASSWORD_DEFAULT);

        $requete = "INSERT INTO t_utilisateurs (nom, mdp) VALUES (?, ?)";
        $result = $this->connexion->executeQuery($requete, [htmlspecialchars($username), $hashedPass]);
        if ($result) {
            return true;
        } else {
            return false;
        }

    }

    

}
?>