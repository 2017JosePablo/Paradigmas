<?php

	require './registroAnualidadBusiness.php';

	if(isset($_POST["renovarAnualidad"])) {
		$socioId = $_POST['socioId'];
		$fechaVencimientoAnterior = $_POST['fechaPagoAnterior'];
		$fechaPago = $_POST['fechaPago'];

		echo "socioId->".$socioId;
		echo "fechaVA->".$fechaVencimientoAnterior;
		echo "FE->".$fechaPago;

		if(isset($socioId) && !empty($socioId) && isset($fechaVencimientoAnterior) && !empty($fechaVencimientoAnterior) &&
			isset($fechaPago) && !empty($fechaPago)){


			$date = new DateTime($fechaPago);
			$fechaPago= $date->format('Y-m-d');

			echo "->".$fechaPago;

			$fechaProx = strtotime('+1 year',strtotime($fechaVencimientoAnterior));

			$fechaProx = date('Y-m-d',$fechaProx);


				
			
			require_once '../domain/anualidad.php';

			$registroAnualidad = new RegistroAnualidadBusiness();

			$anualidad = new Anualidad('',$socioId,$fechaVencimientoAnterior,$fechaPago,$fechaProx);

			$resultado =  $registroAnualidad ->insertarPagoAnualidad($anualidad);

			if($resultado == 1){
				header("location: ../index.php?success=insertedPago");
			}else{
				header("location: ../view/renovarAnualidad.php?error=inserted");
			}
		}else{
			header("location: ../view/renovarAnualidad.php?error=datosVacios");
		}
	}


?>