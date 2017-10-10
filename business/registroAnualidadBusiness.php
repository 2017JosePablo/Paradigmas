<?php
	include '../data/pagoAnualidadData.php';

	if (isset($_POST['idSocio']) && !empty($_POST['idSocio'])) {
		$pago = new RegistroAnualidadBusiness();
		echo $pago->getInformacionPago($_POST['idSocio']);
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