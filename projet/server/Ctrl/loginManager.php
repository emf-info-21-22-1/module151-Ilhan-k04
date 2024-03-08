<?php
include_once("Wrk/loginDBManager.php");
include_once("Beans/user.php");


class loginManager
{
    private $manager;
    private $session;

    public function __construct()
    {
        $this->manager = new loginDBManager();
        $this->session = new sessionManager();
    }

    public function checkLogin($username, $password)
    {
        if (!empty($username) && !empty($password)) {
            $user = new User($username, $password);
            $result = $this->manager->checkLogin($user);
            if ($result) { 
                http_response_code(200);
                $this->session->set('nom', $username);
            } else {
                http_response_code(401);
            }
        } else {
            http_response_code(400);
        }

    }

    public function inscription($username, $passwd)
    {
        if (!empty($username) && !empty($passwd)) {
            $result = $this->manager->inscription($username, $passwd);
            if ($result) {
                http_response_code(200);
            } else {
                http_response_code(401);
            }
        } else {
            http_response_code(400);
        }

    }

    public function deconnexion(){
        $this->session->clear();
    }




}
