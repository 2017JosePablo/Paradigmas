<?php

include '../data/fierroData.php';

class FierroBusiness{
  private $dataFierro;

  function FierroBusiness(){
    $this->dataFierro = new fierroData();
  }
  function insertarFierro($fierro){
    return $this->dataFierro->insertarFierroSocio($fierro);
  }
  function actualizarFierro($fierro){
    return $this->dataFierro->actualizarFierro($fierro);
  }
  function obtenerFierroSocio($idSocio){
    return $this->dataFierro->obtenerFierroSocio($idSocio);
  }
}
?>
