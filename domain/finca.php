<?php

class Finca{
	private $socioId;
	private $area;
	private $cantidadBovinos;


	function Finca($socioId,$area,$cantidadBovinos){
		$this->socioId = $socioId;
		$this->area = $area;
		$this->cantidadBovinos = $cantidadBovinos;
	}
	public function setSocioId($socio){
		$this->socioId = $socio;
	}
	
	public function setArea($area){
		$this->area = $area;
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
	
	public function getCantidadBovinos(){
		return $this->cantidadBovinos;
	}
	
}

?>