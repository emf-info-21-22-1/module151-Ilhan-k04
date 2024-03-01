<?php

require_once("Wrk/reservationDBManager.php");

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
        if ($this->manager->addReservation($date, $nombreReservation, $fk_hotel, $fk_utilisateur)) {
            http_response_code(200);
        } else {
            http_response_code(401);
        }
    }
    public function deleteReservation($pk_reservation)
    {
        if ($this->manager->deleteReservation($pk_reservation)) {
            http_response_code(200);
        }else{
            http_response_code(401);
        }
    }
}

?>