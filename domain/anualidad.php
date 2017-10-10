<?php

	class Anualidad{

		private $idAnualidad;
		private $idSocio;
		private $fechaVencimientoAnterior;
		private $fechaPagoActual;
		private $fechaVencimientoProximo;

		function Anualidad($idAnualidad,$idSocio,$fechaVencimientoAnterior,$fechaPagoActual,$fechaVencimientoProximo){
			$this->idAnualidad=$idAnualidad;
			$this->idSocio=$idSocio;
			$this->fechaVencimientoAnterior=$fechaVencimientoAnterior;
			$this->fechaPagoActual=$fechaPagoActual;
			$this->fechaVencimientoProximo=$fechaVencimientoProximo;

		}

		function setIdAnualidad($idAnualidad){
			$this->idAnualidad=$idAnualidad;
		}
		function getIdAnualidad(){
			$this->idAnualidad;
		}
		function setIdSocio($idSocio){
			$this->idSocio=$idSocio;
		}
		function getIdSocio(){
			$this->idSocio;
		}
		function setFechaVencimientoAnterior($fechaVencimientoAnterior){
			$this->fechaVencimientoAnterior=$fechaVencimientoAnterior;
		}
		function getFechaVencimientoAnterior(){
			$this->fechaVencimientoAnterior;
		}
		function setFechaPago($fechaPagoActual){
			$this->fechaPagoActual=$fechaPagoActual;
		}
		function getFechaPago(){
			$this->fechaPagoActual;
		}
		function setFechaVencimientoProximo($fechaVencimientoProximo){
			$this->fechaVencimientoProximo=$fechaVencimientoProximo;
		}
		function getFechaVencimientoProximo(){
			$this->fechaVencimientoProximo;
		}	
	}
?>