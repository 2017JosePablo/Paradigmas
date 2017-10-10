<?php

	require './registroAnualidadBusiness.php';

	if(isset($_POST["renovarAnualidad"])) {
		$socioId = $_POST['socioId'];
		$fechaVencimientoAnterior = $_POST['fechaPagoAnterior'];
		$fechaPago = $_POST['fechaPago'];

		if(isset($socioId) && !empty($socioId) $$ isset($fechaVencimientoAnterior) && !empty($fechaVencimientoAnterior) &&
			isset($fechaPago) && !empty($fechaPago)){



			//FECHA del proximo pago
            $fechaVenc = explode('/', $fechaVencimientoAnterior);
            $ano = $fechaVenc[2]+1;
            $fechaProxVen = $ano."-".$fechaVenc[0]."-".$fechaVenc[1];

				
			
			require_once '../domain/anualidad.php';

			$registroAnualidad = new RegistroAnualidadBusiness();

			$anualidad = new Anualidad('',$socioId,$fechaVencimientoAnterior,$fechaPago,$fechaProxVen);

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