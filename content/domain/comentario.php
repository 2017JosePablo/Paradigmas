<?php
class comentarioAviso{

	private $idcomentario;
	private $idaviso;
	private $idsocio;
	private $mensajecomentario;

	function comentarioAviso($idcomentario,$idaviso,$idsocio,$mensajecomentario){
		$this->idcomentario = $idcomentario;
    $this->idaviso = $idaviso;
    $this->idsocio = $idsocio;
    $this->mensajecomentario = $mensajecomentario;
	}

	public function getIdComentario(){
		return $this->idcomentario;
	}
  public function getIdAviso(){
    return $this->idaviso;
  }
  public function getIdSocio(){
		return $this->idsocio;
	}
  public function getMensaje(){
		return $this->mensajecomentario;
	}


}
?>
