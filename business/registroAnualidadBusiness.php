<?php
	include '../data/PagoAnualidadData.php';

	class RegistroAnualidadBusiness {

		private $pagoAnualidad;
		
		function RegistroAnualidadBusiness(){
			$this->pagoAnualidad = new pagoAnualidadData();
		}

		function insertarPagoAnualidad($anualidad){
			return $this->pagoAnualidad->insertarPagoAnualidad($anualidad);

		}
	}
	
?>