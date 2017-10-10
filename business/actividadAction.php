<?php
	if (isset($_POST['crearactividad'])) {	
		$nombreactividad = $_POST['tipoactividad'];
		if(isset($nombreactividad)){
			if (strlen($nombreactividad)) {
				require './actividadBusiness.php';
				$actividadBusiness  = new actividadBusiness();
				$actividadid = "";
				$actividad = new Actividad($actividadid,$nombreactividad);

				$resultado = $actividadBusiness->insertarTBActividad($actividad);
				if ($resultado ==1) {
					header ('location: ../index.php?success=insertedActividad');
				}else{
					header ('location: ../view/actividadView.php?error=errortoinserted');
				}
			}	
		}	
	}else if (isset($_POST['modificarActividad'])) {	
		$actividadid = $_POST['idActividad'];
		$nombreactividad = $_POST['tipoactividadMod'];
		if(isset($nombreactividad)){
			if (strlen($nombreactividad)) {
				require './actividadBusiness.php';
				$actividadBusiness  = new actividadBusiness();
				$actividad = new Actividad($actividadid,$nombreactividad);
				$resultado = $actividadBusiness->actualizarTBActividad($actividad);

				if($resultado == 1){
					header ('location: ../index.php?success=updateActividad');				
				}else{
					header ('location: ../view/actividadView.php?error=updateActividad');
				}
			}	
		}		
	}
?>