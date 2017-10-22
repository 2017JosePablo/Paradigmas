<?php

include '../data/actaAprobacionData.php';

class AprovacionBusiness{
  private $aprovacionData;

  function AprovacionBusiness(){
    $this->$aprovacionData = new actaAprobacionData();
  }
  public function insertarActa($acta){
    return $this->$aprovacionData->insertarActaAprobacionData($acta);
  }
  public function actualizarActa($acta){
    return $this->actaAprovacionData->actualizarActaAprobacionCondicion($acta);
  }
}


 ?>
