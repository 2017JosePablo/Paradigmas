<?php

	require './registroAnualidadBusiness.php';


	if(isset($_POST["renovarAnualidad"])) {
		$socioId = $_POST['idSocio'];
		$fechaVencimientoAnterior = $_POST[''];
		$fechaPago = $_POST[''];
		$fechaVencimientoProximo[''];

		if(isset($socioId) && !empty($socioId) $$ isset($fechaVencimientoAnterior) && !empty($fechaVencimientoAnterior) &&
			isset($fechaPago) && !empty($fechaPago)  && isset($fechaVencimientoProximo) && !empty($fechaVencimientoProximo) ){
			
			require_once '../domain/anualidad.php';

			$registroAnualidad = new RegistroAnualidadBusiness();

			$anualidad = new Anualidad('',$socioId,$fechaVencimientoAnterior,$fechaPago,$fechaVencimientoProximo);

			

		}else{
			echo "ERROR";
		}


	}
?>