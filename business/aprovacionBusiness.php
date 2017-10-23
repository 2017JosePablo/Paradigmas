<?php
class AprovacionBusiness{
  private $aprovacionData;

  function AprovacionBusiness(){
      require_once '../data/actaAprobacionData.php';
      $this->aprovacionData = new actaAprobacionData();
  }
  public function insertarActa($acta){
    return $this->aprovacionData->insertarActaAprobacionData($acta);
  }
  public function actualizarActa($acta){
    return $this->aprovacionData->actualizarActaAprobacionCondicion($acta);
  }
  public function sociosEnProgreso()
  {
    return $this->aprovacionData->sociosEnProgreso();
  }
}

 ?>
