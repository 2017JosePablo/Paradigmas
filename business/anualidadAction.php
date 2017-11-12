<?php
	if (isset($_POST['registrarAnualidad'])) {

		$cedula = $_POST['cedulaResponsableAnualidad'];
		$monto = $_POST['montoAnualidad'];
		$date = new DateTime($_POST['fechaAnualidad']);
		$fecha= $date->format('Y-m-d');
		//if(isset($cedula) && !empty($cedula) && isset($fecha) && !empty($fecha) && isset($monto)){
			require '../domain/montoAnualidad.php';
			require './anualidadBusiness.php';
			$actividadBusiness = new AnualidadBusiness();

			//$idMontoAnualidad,$montoAnualidad,$idResponsable,$fechaCreacion

			$anualidad = new MontoAnualidad('',$monto,$cedula,$fecha);
			$result = $actividadBusiness->insertarAnualidad($anualidad);

			if($result == 1){
				header("location: ../index.php?success=insertedAnualidad");
			}else{
				header ('location: ../view/anualidadView.php?error=insertedAnualidad');
			}
		//}else{
			//header ('location: ../view/anualidadView.php?error=emptyInput');
		//}
	}
?>
