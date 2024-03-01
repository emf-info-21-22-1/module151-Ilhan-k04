<?php
include_once("connexion.php");

class loginDBManager
{
    private $connexion;
    private $session;

    public function __construct()
    {
        $this->connexion = connexion::getInstance();
    }

    public function checkLogin($username, $password)
    {

        $requete = "SELECT * FROM `t_utilisateurs` WHERE nom = :username";
        $stmt = $this->connexion->prepare($requete);
        $stmt->execute(array(':username' => $username));
        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($utilisateur && password_verify($password, $utilisateur['mdp'])) {
            return true;
        } else {
            return false;
        }
    }

    public function inscription($username, $passwd)
    {
        $hashedPass = password_hash($passwd, PASSWORD_DEFAULT);

        $requete = "INSERT INTO t_utilisateurs (nom, mdp) VALUES (:username, :passwd)";
        $stmt = $this->connexion->prepare($requete);
        $stmt->execute(array(':username' => $username, ':passwd' => $hashedPass));
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }

    }
}
?>