<?php

class Ctrl
{
  public function getEquipes()
  {
    require('wrk.php');
    $equipe = new Wrk();
    return $equipe->getEquipesFromDB();
  }
}

?>