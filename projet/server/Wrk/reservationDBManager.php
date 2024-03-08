<?php

require_once("connexion.php");
require_once("Beans/reservation.php");


class reservationDBManager
{
    private $connexion;

    public function __construct()
    {
        $this->connexion = connexion::getInstance();
    }

    public function getReservation()
    {
        $query = $this->connexion->selectQuery("SELECT PK_reservation, dateReservation, nombreReservation, fk_hotel, fk_utilisateur FROM t_reservation;", null);
        $result = array();
        foreach ($query as $row) {
            $hotels = new Reservation($row['dateReservation'], $row['nombreReservation'], $row['fk_hotel'], $row['fk_utilisateur']);
            $result[] = $hotels;
        }
        return $result;
    }

    public function addReservation($dateReservation, $nombreReservation, $fk_hotel, $fk_utilisateur)
    {
        $requete = "INSERT INTO t_reservation (dateReservation, nombreReservation, fk_hotels, fk_utilisateur) VALUES (?, ?, ?, ?)";
        
        $result = $this->connexion->executeQuery($requete, [$dateReservation, $nombreReservation, $fk_hotel, $fk_utilisateur]);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteReservation($pk_reservation)
    {
        $requete = "DELETE FROM t_reservation WHERE PK_reservation = ?";
        $result = $this->connexion->executeQuery($requete, [$pk_reservation]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }




}

?>