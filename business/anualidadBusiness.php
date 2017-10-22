<?php
	include '../data/anualidadData.php';

class AnualidadBusiness{
	private $anualidad;

	function AnualidadBusiness(){
		$this->anualidad = new anualidadData();
	}
	function insertarAnualidad($anualidad){
		return $this->anualidad->insertarAnualidad($anualidad);
	}
	function actualizarAnualidad($anualidad){
		return $this->anualidad->actualizarPagoAnualidad($anualidad);
	}
	function actualizarEstado($fecha){
		$this->anualidad->actualizarEstado($fecha);
	}
}

?>
