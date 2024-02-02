<?php
include_once("wrk.php");
class Ctrl
{

  public function __construct(){

  }
  public function getEquipes()
  {
    $equipe = new Wrk();
    return $equipe->getEquipesFromDB();
  }
}

?>