<?php

include '../data/avisosData.php';

class AvisosBusiness{
  private $dataAviso;

  function AvisosBusiness(){
    $this->dataAviso =  new avisosData();
  }
  function insertarTBAvisos($aviso){
    return $this->insertarTBAvisos($aviso);
  }
  function actualizarAviso($aviso){
    return $this->dataAviso->actualizarAviso($aviso);
  }
  function mostrarTodosAvisos(){
    return $this->dataAviso->mostrarTodosAvisos();
  }
  function getIndiceImagen($idsocio){
    return $this->dataAviso->getIndiceImagen($idsocio);
  }
}
 ?>
