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
			return $this->idAnualidad;
		}
		function setIdSocio($idSocio){
			$this->idSocio=$idSocio;
		}
		function getIdSocio(){
			return  $this->idSocio;
		}
		function setFechaVencimientoAnterior($fechaVencimientoAnterior){
			$this->fechaVencimientoAnterior=$fechaVencimientoAnterior;
		}
		function getFechaVencimientoAnterior(){
			return $this->fechaVencimientoAnterior;
		}
		function setFechaPago($fechaPagoActual){
			$this->fechaPagoActual=$fechaPagoActual;
		}
		function getFechaPago(){
			return $this->fechaPagoActual;
		}
		function setFechaVencimientoProximo($fechaVencimientoProximo){
			$this->fechaVencimientoProximo=$fechaVencimientoProximo;
		}
		function getFechaVencimientoProximo(){
			return $this->fechaVencimientoProximo;
		}	
	}
?>