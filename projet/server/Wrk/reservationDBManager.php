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
        $query = $this->connexion->selectQuery("SELECT PK_reservation, date, nombreReservation, fk_hotel, fk_utilisateur FROM t_reservation;", null);
        $result = array();
        foreach ($query as $row) {
            $hotels = new Reservation($row['date'], $row['nombreReservation'], $row['PK_reservation'], $row['fk_hotel'], $row['fk_utilisateur']);
            $result[] = $hotels;
        }
        return $result;
    }

    public function addReservation($date, $nombreReservation, $fk_hotel, $fk_utilisateur)
    {
        $requete = "INSERT INTO t_reservation (date, nombreReservation, fk_hotel, fk_utilisateur) VALUES (:date, :nombreReservation, :fk_hotel, :fk_utilisateur)";
        $stmt = $this->connexion->prepare($requete);
        $success = $stmt->execute(array(':date' => $date, ':nombreReservation' => $nombreReservation, ':fk_hotel' => $fk_hotel, ':fk_utilisateur' => $fk_utilisateur));
        if ($success) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteReservation($pk_reservation)
    {
        $requete = "DELETE FROM t_reservation WHERE PK_reservation = :PK_reservation";
        $stmt = $this->connexion->prepare($requete);
        $success = $stmt->execute(array(':PK_reservation' => $pk_reservation));
        if ($success) {
            return true;
        } else {
            return false;
        }
    }




}

?>