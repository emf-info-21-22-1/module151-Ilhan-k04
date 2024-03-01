<?php

header('Access-Control-Allow-Origin: http://localhost:8092');
header('Access-Control-Allow-Credentials: true');


require_once("Ctrl/sessionManager.php");
include_once("Ctrl/hotelsManager.php");
include_once("Ctrl/loginManager.php");
include_once("Ctrl/reservationManager.php");

$sessionCtrl = new sessionManager();
$hotelCtrl = new hotelsManager();
$reservationCtrl = new reservationManager();
$loginCtrl = new loginManager();

echo $hotelCtrl->getHotelsJSON();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['action'] == "checkLogin"){
        if(isset($_POST["loginUsername"]) && isset($_POST["loginPassword"]))
            $check = new loginDBManager();
        $request = $check->checkLogin($_POST["loginUsername"], $_POST["loginPassword"]);
        return $request;
    }

    
}
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    

}



?>
