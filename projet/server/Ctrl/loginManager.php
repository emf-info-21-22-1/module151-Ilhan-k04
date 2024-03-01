<?php
include_once("Wrk/loginDBManager.php");


class loginManager
{
    private $manager;

    public function __construct()
    {
        $this->manager = new loginDBManager();
    }

    public function checkLogin($username, $password)
    {
        if ($this->manager->checkLogin($username, $password)) {
            http_response_code(200);
        } else {
            http_response_code(401);
        }
    }




}
