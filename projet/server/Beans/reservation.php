<?php

class Reservation
{
    // Attributs de la classe Reservation
    private $dateReservation;
    private $nombreReservation;
    private $pk_reservation;
    private $fk_hotel;
    private $fk_utilisateur;

    // Constructeur de la classe Reservation
    public function __construct($dateReservation, $nombreReservation, $fk_hotel, $fk_utilisateur)
    {
        $this->dateReservation = $dateReservation;
        $this->nombreReservation = $nombreReservation;
        $this->fk_hotel = $fk_hotel;
        $this->fk_utilisateur = $fk_utilisateur;
    }

    // Méthodes pour accéder aux attributs (getters)
    public function getDate()
    {
        return $this->dateReservation;
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
    public function setDate($dateReservation)
    {
        $this->dateReservation = $dateReservation;
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