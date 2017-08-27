<?php

	require './actividadBusiness.php';

	if (isset($_POST['crearactividad'])) {

		$actividadBusiness  = new actividadBusiness();

		$nombreactividad = $_POST['tipoactividad'];
		echo "Nombre de la Actividad: ".$nombreactividad;
		if(isset($nombreactividad)){
			if (strlen($nombreactividad)) {
				$actividadid = '';
				$actividad = new Actividad($actividadid,$nombreactividad);

				$resultado = $actividadBusiness->insertarTBActividad($actividad);

				if ($resultado ==1) {
					header ('location: ../view/actividadView.php?success=inserted');
				}else{
					header ('location: ../view/actividadView.php?error=errortoinserted');
				}




			}	
		}
		
			
	}



		




?>

