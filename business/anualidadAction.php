<?php
	if (isset($_POST['registrarAnualidad'])) {
		$cedula = $_POST['cedulaResponsableAnualidad'];
		$fecha = $_POST['fechaAnualidad'];
		$monto = $_POST['montoAnualidad'];

		if(isset($cedula) && !empty($cedula) && isset($fecha) && !empty($fecha) && isset($monto)){
			

		}else{
			header ('location: ../view/anualidadView.php?error=emptyInput');
		}
	}


?>