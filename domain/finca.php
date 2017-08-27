<?php

class Finca{
	private $area;
	private $cantidadBovinos;


	function Finca($area,$cantidadBovinos){
		$this->area = $area;
		$this->cantidadBovinos = $cantidadBovinos;
	}
	public function setArea($area){
		$this->area = $area;
		$this->cantidadBovinos = $cantidadBovinos;
	}
	public function getArea(){
		return $this->area;
	}
	public function setCantidadBovinos($cantidadBovinos){
		$this->cantidadBovinos = $cantidadBovinos;
	}
	public function getCantidadBovinos(){
		return $this->cantidadBovinos;
	}
	
}

?>