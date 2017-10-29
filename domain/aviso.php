<?php
class Aviso{
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
