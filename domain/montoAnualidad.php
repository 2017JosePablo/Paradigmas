<?php
	class MontoAnualidad{
		private $idMontoAnualidad;
		private $montoAnualidad;
		private $idResponsable;
		private $fechaCreacion;

		function MontoAnualidad($idMontoAnualidad,$montoAnualidad,$idResponsable,$fechaCreacion){
			$this->idMontoAnualidad=$idMontoAnualidad;
			$this->montoAnualidad=$montoAnualidad;
			$this->idResponsable=$idResponsable;
			$this->fechaCreacion=$fechaCreacion;
		}
		function setIdMontoAnualidad($idMontoAnualidad){
			$this->idMontoAnualidad=$idMontoAnualidad;
		}
		function getIdMontoAnualidad(){
			return $this->idMontoAnualidad;
		}
		function setMonto($montoAnualidad){
			$this->montoAnualidad=$montoAnualidad;
		}
		function getMonto(){
			return $this->montoAnualidad;
		}
		function setResponsableId($idResponsable){
			$this->idResponsable=$idResponsable;
		}
		function getResponsableId(){
			return  $this->idResponsable;
		}
		function setFechaActualizacion($fechaCreacion){
			$this->fechaCreacion=$fechaCreacion;
		}
		function getFechaActualizacion(){
			return $this->fechaCreacion;
		}
	}
?>