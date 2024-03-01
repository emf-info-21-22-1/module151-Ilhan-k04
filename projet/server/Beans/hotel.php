<?php

class Hotel {
    // Attributs de la classe Hotel
    private $lieu;
    private $nom;
    private $nombrePlaceDispo;
    private $pk_hotel;
    
    // Constructeur de la classe Hotel
    public function __construct($lieu, $nom, $nombrePlaceDispo, $pk_hotel) {
        $this->lieu = $lieu;
        $this->nom = $nom;
        $this->nombrePlaceDispo = $nombrePlaceDispo;
        $this->pk_hotel = $pk_hotel;
    }
    
    // Méthodes pour accéder aux attributs (getters)
    public function getLieu() {
        return $this->lieu;
    }
    
    public function getNom() {
        return $this->nom;
    }
    
    public function getNombrePlaceDispo() {
        return $this->nombrePlaceDispo;
    }
    
    public function getPkHotel() {
        return $this->pk_hotel;
    }
    
    // Méthodes pour modifier les attributs (setters)
    public function setLieu($lieu) {
        $this->lieu = $lieu;
    }
    
    public function setNom($nom) {
        $this->nom = $nom;
    }
    
    public function setNombrePlaceDispo($nombreDePlaceDispo) {
        $this->nombrePlaceDispo = $nombreDePlaceDispo;
    }

}

?>