<?php
  require_once '../data/actaAprobacionData.php';
class AprovacionBusiness{
  private $aprovacionData;

  function AprovacionBusiness(){
      $this->aprovacionData = new actaAprobacionData();
    echo "Cree el constructor de aprovacion Data";
  }
  public function insertarActa($acta){
    return $this->aprovacionData->insertarActaAprobacionData($acta);
  }
  public function actualizarActa($acta){
    return $this->actaAprovacionData->actualizarActaAprobacionCondicion($acta);
  }
}


 ?>
