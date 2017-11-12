<?php

class Finca{
	private $fincaid;
	private $socioId;
	private $area;
	private $cantidadBovinos;
	private $cerca;

	function Finca($fincaid,$socioId,$area,$cantidadBovinos,$cerca){
		$this->fincaid = $fincaid;
		$this->socioId = $socioId;
		$this->area = $area;
		$this->cantidadBovinos = $cantidadBovinos;
		$this->cerca=$cerca;
	}
	public function setFincaId($fincaid){
		$this->fincaid = $fincaid;
	}
	public function getFincaId(){
		return $this->fincaid;
	}
	public function setSocioId($socio){
		$this->socioId = $socio;
	}
	
	public function setArea($area){
		$this->area = $area;
	}

	public function setCerca($cerca){
		$this->cerca = $carca;
	}
	
	public function setCantidadBovinos($cantidadBovinos){
		$this->cantidadBovinos = $cantidadBovinos;
	}

	public function getSocioId(){
		return $this->socioId;
	}

	public function getArea(){
		return $this->area;
	}
	
	public function getCerca(){
		return $this->cerca;
	}

	public function getCantidadBovinos(){
		return $this->cantidadBovinos;
	}
	
}

?>