<?php

require_once '../data/avisosData.php';

class AvisosBusiness{
  private $dataAviso;

  function AvisosBusiness(){
    $this->dataAviso =  new avisosData();
  }
  function insertarTBAvisos($aviso){
    return $this->dataAviso->insertarTBAvisos($aviso);
  }
  function actualizarAviso($aviso){
    return $this->dataAviso->actualizarAviso($aviso);
  }
  function mostrarTodosAvisos(){
    return $this->dataAviso->mostrarTodosAvisos();
  }
  public function mostrarComentarioAviso($aviso)
  {
    return $this->dataAviso->mostrarComentarioAviso($aviso);
  }
  public function insertarComentario($comentario)
  {
    return $this->dataAviso->insertarComentario($comentario);
  }



  function mostrarMisAvisos($idSocio){
    return $this->dataAviso->mostrarMisAvisos($idSocio);
  }
  function getIndiceImagen($idsocio){
    return $this->dataAviso->getIndiceImagen($idsocio);
  }
}
 ?>
