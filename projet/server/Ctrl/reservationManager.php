<?php

require_once("Wrk/reservationDBManager.php");
include_once("Beans/hotel.php");

class reservationManager
{
    private $manager;

    public function __construct()
    {
        $this->manager = new reservationDBManager();
    }


    public function getReservationJSON()
    {
        $reservations = $this->manager->getReservation();
        $result = array();
        foreach ($reservations as $reservation) {
            $result[] = array(
                "pk_hotels" => $reservation->getPkReservation(),
                "date" => $reservation->getDate(),
                "nombreReservation" => $reservation->getNombreReservation(),
                "fk_hotel" => $reservation->getFkHotel(),
                "fk_utilisateur" => $reservation->getFkUtilisateur()
            );
        }
        return json_encode($result);
    }
    

    public function addReservation($date, $nombreReservation, $fk_hotel, $fk_utilisateur)
    {
        if (!empty($date) && !empty($nombreReservation) && !empty($fk_hotel) && !empty($fk_utilisateur)) {
            $result = $this->manager->addReservation($date, $nombreReservation, $fk_hotel, $fk_utilisateur);
            if ($result) {
                
                http_response_code(200);
            } else {
                http_response_code(401);
            }

        } else {
            http_response_code(400);
        }
    }
    public function deleteReservation($pk_reservation)
    {
        if (!empty($pk_reservation)) {
            $result = $this->manager->deleteReservation($pk_reservation);
            if ($result) {
                http_response_code(200);
            } else {
                http_response_code(401);
            }
        } else {
            http_response_code(400);
        }
    }
}

?>