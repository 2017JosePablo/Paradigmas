<?php
	require './registroAnualidadBusiness.php';

	if(isset($_POST["renovarAnualidad"])) {
		$socioId = $_POST['socioId'];
		$fechaVencimientoAnterior = $_POST['fechaPagoAnterior'];
		$fechaPago = $_POST['fechaPago'];

		if(isset($socioId) && !empty($socioId) && isset($fechaVencimientoAnterior) && !empty($fechaVencimientoAnterior) &&
			isset($fechaPago) && !empty($fechaPago)){

			$date = new DateTime($fechaPago);
			$fechaPago= $date->format('Y-m-d');


			$fechaProx = strtotime('+1 year',strtotime($fechaVencimientoAnterior));

			$fechaProx = date('Y-m-d',$fechaProx);
			
			require_once '../domain/anualidad.php';

			$registroAnualidad = new RegistroAnualidadBusiness();

			$anualidad = new Anualidad('',$socioId,$fechaVencimientoAnterior,$fechaPago,$fechaProx);

			$resultado =  $registroAnualidad ->insertarPagoAnualidad($anualidad);

			if($resultado == 1){
				header("location: ../index.php?success=insertedPago");
			}else{
				header("location: ../view/renovarAnualidadView.php?error=inserted");
			}
		}else{
			header("location: ../view/renovarAnualidadView.php?error=datosVacios");
		}
	}

	if(isset($_POST["primerAnualidad"])) {
		$socioId = $_POST['socioId'];
		$fechaPago = $_POST['fechaPago'];

		if(isset($socioId) && !empty($socioId) && isset($fechaPago) && !empty($fechaPago)){

			$date = new DateTime($fechaPago);
			$fechaPago= $date->format('Y-m-d');

			$fechaProx = strtotime('+1 year',strtotime($fechaPago));

			$fechaProx = date('Y-m-d',$fechaProx);
			
			require_once '../domain/anualidad.php';

			$registroAnualidad = new RegistroAnualidadBusiness();

			$anualidad = new Anualidad('',$socioId,$fechaPago,$fechaPago,$fechaProx);

			$resultado =  $registroAnualidad ->insertarPagoAnualidad($anualidad);

			if($resultado == 1){
				header("location: ../index.php?success=insertedPagoPrimero");
			}else{
				header("location: ../view/pagoPrimeroAnualidadView.php?error=inserted");
			}
		}else{
			header("location: ../view/pagoPrimeroAnualidadView.php?error=datosVacios");
		}


	}
?>