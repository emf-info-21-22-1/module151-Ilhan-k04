<?php

class Reservation
{
    // Attributs de la classe Reservation
    private $date;
    private $nombreReservation;
    private $pk_reservation;
    private $fk_hotel;
    private $fk_utilisateur;

    // Constructeur de la classe Reservation
    public function __construct($date, $nombreReservation, $pk_reservation, $fk_hotel, $fk_utilisateur)
    {
        $this->date = $date;
        $this->nombreReservation = $nombreReservation;
        $this->pk_reservation = $pk_reservation;
        $this->fk_hotel = $fk_hotel;
        $this->fk_utilisateur = $fk_utilisateur;
    }

    // Méthodes pour accéder aux attributs (getters)
    public function getDate()
    {
        return $this->date;
    }

    public function getNombreReservation()
    {
        return $this->nombreReservation;
    }

    public function getPkReservation()
    {
        return $this->pk_reservation;
    }

    public function getFkHotel()
    {
        return $this->fk_hotel;
    }

    public function getFkUtilisateur()
    {
        return $this->fk_utilisateur;
    }

    // Méthodes pour modifier les attributs (setters)
    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setNombreReservation($nombreReservation)
    {
        $this->nombreReservation = $nombreReservation;
    }

    public function setPkReservation($pk_reservation)
    {
        $this->pk_reservation = $pk_reservation;
    }

    public function setFkHotel($fk_hotel)
    {
        $this->fk_hotel = $fk_hotel;
    }
    public function setFkutilisateur($fk_utilisateur)
    {
        $this->fk_utilisateur = $fk_utilisateur;
    }
}

?>