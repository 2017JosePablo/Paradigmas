<?php

include '../data/pastoCorteData.php';

class PastoCorteBusiness {

  private $pastoCorteData;


  function PastoCorteBusiness(){
    $this->pastoCorteData = new PastoCorteData();
  }

  function insertarPastoCorte($pastoCorte){
    return $this->pastoCorteData->insertarPastoCorte($pastoCorte);
  }

  function obtenerTodosPastoCorte(){
    return $this->pastoCorteData->insertarPastoCorte($pastoCorte);
  }


}





 ?>
