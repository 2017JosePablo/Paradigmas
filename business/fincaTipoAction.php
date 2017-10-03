<?php
	if (isset($_POST['crearTipoFinca'])) {	
		$nombreaFinca = $_POST['tipofinca'];
		

		echo "Aqui insertando:  ".$nombreaFinca."</br>";
		if(isset($nombreaFinca)){
			if (strlen($nombreaFinca)) {
				require './fincaTipoBusiness.php';
				include_once '../domain/fincaTipo.php';

				$fincaTipoBusiness  = new fincaTipoBusiness();
				
				
				$actividad = new fincaTipo('',$nombreaFinca);

				$resultado = $fincaTipoBusiness->insertarTBfincaTipo($actividad);
				echo "Aquii resultado ".$resultado ."</br>";
				if ($resultado ==1) {
					header ('location: ../index.php?success=inserted');
				}else{
					header ('location: ../index.php?error=errortoinserted');
				}
			}	
		}	
	}else if (isset($_POST['modificarTipoFinca'])) {	
		$nombreaFinca = $_POST['tipofincaUpdate'];
		$actividadid = $_POST['idTipoFinca'];

		
		if(isset($nombreaFinca)){
			if (strlen($nombreaFinca)) {
				require './fincaTipoBusiness.php';
				include_once '../domain/fincaTipo.php';

				$fincaTipoBusiness  = new fincaTipoBusiness();
				$fincaTipo = new fincaTipo($actividadid,$nombreaFinca);

				$resultado = $fincaTipoBusiness->actualizarTBfincaTipo($fincaTipo);
					header ('location: ../index.php?success=inserted');
			}	
		}		
	}
?>