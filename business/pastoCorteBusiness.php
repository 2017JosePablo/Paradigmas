<?php

include '../data/pastoCorteData.php';

class PastoCorteBusiness {

  private $pastoCorteData;


  function PastoCorteBusiness(){
    $this->pastoCorteData = new PastoCorteData();
  }

  function insertarPastoCorte($pastoCorte){
    return $this->pastoCorteData->insertarTBPastoCorte($pastoCorte);
  }

  function mostrarPastosCorte(){
    return $this->pastoCorteData->mostrarPastosCorte();
  }


}





 ?>
