<?php

	

	if (isset($_POST['crearactividad'])) {
		

		$nombreactividad = $_POST['tipoactividad'];
		echo "Nombre de la Actividad: ".$nombreactividad;
		if(isset($nombreactividad)){
			if (strlen($nombreactividad)) {


				require './actividadBusiness.php';
				$actividadBusiness  = new actividadBusiness();
				
				$actividadid = "9";
				$actividad = new Actividad($actividadid,$nombreactividad);

				$resultado = $actividadBusiness->insertarTBActividad($actividad);
				echo "Aquii resultado ".$resultado ."</br>";
				if ($resultado ==1) {
					header ('location: ../view/actividadView.php?success=inserted');
				}else{
					header ('location: ../view/actividadView.php?error=errortoinserted');
				}




			}	
		}
		
			
	}



		




?>y

