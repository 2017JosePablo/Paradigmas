<?php
	include './herdBusiness.php';


	if (isset($_POST['registerHerd'])) {
		echo "Escuche el boton";

		$socioid = $_POST['socioid'];
		$socioname = $_POST['socioname'];
		$sociofirst = $_POST['sociofirst'];
		$sociolast = $_POST['sociolast'];
		$sociophonehome = $_POST['sociophonehome'];
		$sociophone = $_POST['sociophone'];

		if (strlen($socioid)> 0 && strlen($socioname) > 0  &&  strlen($sociofirst)  &&  strlen($sociolast) && strlen($sociophonehome) > 0  && strlen($sociophone) > 0) {
			
		}else{	
			header("location: ../view/censoView.php?error=emptyField");
		}


	}




?>