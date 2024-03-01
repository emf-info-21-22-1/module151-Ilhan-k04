<?php
require_once("Wrk/hotelsDBManager.php");

class hotelsManager
{

    private $manager;

    public function __construct()
    {
        $this->manager = new hotelsDBManager();
    }

    public function getHotelsJSON()
    {
        $hotels = $this->manager->getHotels();
        $result = array();
        foreach ($hotels as $hotel) {
            $result[] = array(
                "pk_hotels" => $hotel->getPkHotel(),
                "nom" => $hotel->getNom(),
                "lieu" => $hotel->getLieu(),
                "nombrePlaceDispo" => $hotel->getNombrePlaceDispo()
            );
        }
        return json_encode($result);
    }

}
?>