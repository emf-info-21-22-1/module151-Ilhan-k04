<?php

require_once("connexion.php");
require_once("Beans/hotel.php");

class hotelsDBManager{
    private $connexion;

    public function __construct(){
        $this->connexion = connexion::getInstance();
    }
    public function getHotels(){
        $query = $this->connexion->selectQuery("SELECT pk_hotels, nom, lieu, nombrePlaceDispo FROM t_hotels;", null);
        $result = array();
        foreach($query as $row){
            $hotels = new Hotel($row['lieu'], $row['nom'], $row['nombrePlaceDispo'], $row['pk_hotels']);
            $result[] = $hotels;
        }
        return $result;
    }

}