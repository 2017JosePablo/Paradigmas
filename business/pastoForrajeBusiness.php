<?php
include '../data/pastoForrajeData.php';

class PastoForrajeBusiness{
  private $pastoForrajeData;

  function PastoForrajeBusiness(){
    $this->pastoForrajeData = new PastoForrajeData();
  }

  function insertarTBPastoForraje($pastoForraje){
    return $this->pastoForrajeData->insertarTBPastoForraje($pastoForraje);
  }

  function mostrarPastosForraje(){
    return $this->pastoForrajeData->mostrarPastosForraje();
  }

}




 ?>
