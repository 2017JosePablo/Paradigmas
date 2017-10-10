<?php
	include '../data/PagoAnualidadData.php';

	if (isset($_POST['idSocio']) && !empty($_POST['idSocio'])) {
		
		echo "Adan me la mam***";	
	}
	class RegistroAnualidadBusiness {

		private $pagoAnualidad;
		
		function RegistroAnualidadBusiness(){
			$this->pagoAnualidad = new pagoAnualidadData();
		}

		function insertarPagoAnualidad($anualidad){
			return $this->pagoAnualidad->insertarPagoAnualidad($anualidad);

		}

		function getInformacionPago($idSocio){
			return $this->pagoAnualidad->obtenerFechasSocio($idSocio);
		}
	}
	
?>