<?php
class actaAprobacion{
	private $socioID;
	private $secion;
	private $fecha;
	private $condicion;
	private $motivo;

	function actaAprobacion($socioID,$secion,$fecha,$condicion,$motivo){
		$this->socioID=$socioID;
		$this->secion=$secion;
		$this->fecha=$fecha;
		$this->condicion=$condicion;
		$this->motivo=$motivo;

	}

	public function setSicioID($socioID){
		$this->socioID=$socioID;
	}
	public function setSecion($secion){
		$this->secion=$secion;
	}
	public function setFecha($fecha){
		$this->fecha=$fecha;
	}
	public function setCondicion($condicion){
		$this->condicion=$condicion;
	}

	public function setMotivo($motivo){
		$this->motivo=$motivo;
	}
	
	public function getSicioID(){
		return$this->socioID;
	}
	public function getSecion(){
		return$this->secion;
	}
	public function getFecha(){
		return$this->fecha;
	}
	public function getCondicion(){
		return$this->condicion;
	}

	public function getMotivo(){
		return$this->motivo;
	}



}
?>