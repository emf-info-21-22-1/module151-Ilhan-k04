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

$putdata = file_get_contents("php://input");
parse_str($putdata, $_DELETE);



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == "checkLogin") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $loginCtrl->checkLogin($username, $password);

    }
    if ($_POST['action'] == "inscription") {
        $username = $_POST["username"];
        $password = $_POST['password'];
        $loginCtrl->inscription($username, $password);

    }
    if ($_POST['action'] == "addReservation") {
        if ($sessionCtrl->get('nom')) {
            $dateReservation = $_POST['dateReservation'];
            $nombreReservation = $_POST['nombreReservation'];
            $fk_hotel = $_POST['fk_hotel'];
            $fk_utilisateur = $_POST['fk_utilisateur'];
            $reservationCtrl->addReservation($dateReservation, $nombreReservation, $fk_hotel, $fk_utilisateur);
            
        }else{
            http_response_code(401);
            return json_encode(
                array(
                    'success' => false,
                    'message' => 'Erreur Session'
                )
            );
        }
    }
    if ($_POST['action'] == "deleteReservation") {
        if ($sessionCtrl->get('nom')) {
            $pk_reservation = $_POST['pk_reservation'];
            $reservationCtrl->deleteReservation($pk_reservation);
        }else{
            http_response_code(401);
            return json_encode(
                array(
                    'success' => false,
                    'message' => 'Erreur Session'
                )
            );
        }
    }

    if ($_POST['action'] == "deconnexion") {
        $loginCtrl->deconnexion();
        echo "ok";
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($_GET['action'] == "getHotels") {
        $hotelCtrl->getHotelsJSON();
    }
    if ($_GET['action'] == "getReservations") {
        if ($sessionCtrl->get('nom')) {
            $reservationCtrl->getReservationJSON();
        }
    }
    if($_Get['action'] == "getLieu"){
        $hotelCtrl->getLieuHotelJSON();
    }
    if($_GET['action'] == "getNomHotel"){
        $hotelCtrl->getNomHotelJson();
    }

}

?>