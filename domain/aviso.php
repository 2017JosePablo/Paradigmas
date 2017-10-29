<?php
class Aviso{
<<<<<<< HEAD
private $idaviso;
private $idsocio;
private $temaaviso;
private $detalleaviso;
private $fotoaviso;

function Aviso($idaviso,$idsocio,$temaaviso,$detalleaviso,$fotoaviso){
	$this->idaviso = $idaviso;
  $this->idsocio = $idsocio;
  $this->temaaviso = $temaaviso;
  $this->detalleaviso = $detalleaviso;
  $this->fotoaviso = $fotoaviso;
}

public function setIdAviso($idaviso){
	$this->idaviso=$idaviso;
}
public function getIdAviso(){
	return $this->idaviso;
}


public function setIdSocio($idsocio){
	$this->idsocio=$idsocio;
}
public function getIdSocio(){
	return $this->idsocio;
}


public function setTemaAviso($temaaviso){
	$this->temaaviso=$temaaviso;
}
public function getTemaAviso(){
	return $this->temaaviso;
}


public function setDetalleAviso($detalleaviso){
	$this->detalleaviso=$detalleaviso;
}
public function getDetalleAviso(){
	return $this->detalleaviso;
}


public function setFotoAviso($fotoaviso){
	$this->fotoaviso=$fotoaviso;
}
public function getFotoAviso(){
	return $this->fotoaviso;
}

}
?>
=======
	private $idAviso;
	private $socioId;
	private $tema; 	
	private $detalle;
	private $rutaFoto;

	function Aviso($idAviso,$socioId, $tema,$detalle,$rutaFoto){
		$this->idAviso=$idAviso;
		$this->socioId=$socioId;
		$this->tema=$tema;
		$this->detalle=$detalle;
		$this->rutaFoto=$rutaFoto;
	}

	public function setIdAviso($idAviso){
		$this->idAviso=$idAviso;
	}

	public function getIdAviso(){
		return $this->idAviso;
	}

	public function setSocioId($socioId){
		$this->socioId=$socioId;
	}

	public function getSocioId(){
		return $this->socioId;
	}

	public function setTema($tema){
		$this->tema=$tema;
	}

	public function getTema(){
		return $this->tema;
	}

	public function setDetalle($detalle){
		$this->detalle=$detalle;
	}

	public function getDetalle(){
		return $this->detalle;
	}

	public function setRutaFoto($rutaFoto){
		$this->rutaFoto=$rutaFoto;
	}

	public function getRutaFoto(){
		return $this->rutaFoto;
	}



}


  ?>
>>>>>>> 759bd1776f0cd8adbc910e100543bcb047237be8
