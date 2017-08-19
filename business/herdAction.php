<?php
	include './herdBusiness.php';


	if (isset($_POST['registerHerd'])) {
		echo "Escuche el boton";
// Personal information
		$socioid = $_POST['socioid'];
		$socioname = $_POST['socioname'];
		$sociofirst = $_POST['sociofirstname'];
		$sociolast = $_POST['sociolastname'];
		$sociophonehome = $_POST['sociophonehome'];
		$sociophone = $_POST['sociophone'];

		// Activities Information

		$milk = $_POST['$milk'];
		$breedingMeat = $_POST['$breedingMeat'];
		$fatteningMeat = $_POST['$fatteningMeat'];
		$doublePurpose = $_POST['$doublePurpose'];

		////  Quantity Animals
		$calf = $_POST['calf'];
		$beal = $_POST['beal'];
		$steer = $_POST['steer'];
		$heifer = $_POST['heifer'];
		$impregnatedHeifer = $_POST['impregnatedHeifer'];
		$bull =$_POST['bull'];
		$cow =$_POST['cow'];




 
		if (strlen($socioid)> 0 && strlen($socioname) > 0  &&  strlen($sociofirst)  &&  strlen($sociolast) && strlen($sociophonehome) > 0  && strlen($sociophone) > 0) {

			if(isset($milk))
			 {
			   echo "yeah milk";
			 }  



			if (strlen($calf) > 0 || strlen($beal) > 0 ||strlen($steer) > 0 || strlen($heifer) > 0 || strlen($impregnatedHeifer) > 0 || strlen($bull) > 0  || strlen($cow) > 0 ) {
				/// consultA PARA sabeer si el valor digitado es valido
				if (is_numeric($calf) &&  $calf >  0 || is_numeric($beal) && $beal > 0 ||
					is_numeric($steer) && $steer > 0 || is_numeric($heifer) && $heifer > 0 || 
					is_numeric($impregnatedHeifer) && $impregnatedHeifer > 0 || is_numeric($bull)&& $bull > 0  || is_numeric($cow) && $cow > 0 ) {
					

					echo "Datos totalmente correctos";
				}else{
					header("location: ../view/censoView.php?error=numberFormat");	
				}

			}else{
				header("location: ../view/censoView.php?error=emptyField");	
			}


		}else{	
			header("location: ../view/censoView.php?error=emptyField");
		}


	}




?>