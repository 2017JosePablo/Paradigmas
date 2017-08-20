<?php

	//include './personBusiness.php';
//	include './herdBusiness.php';
	
//	include './herdActivityBusiness.php';

	if (isset($_POST['registerHerd'])) {
// Personal information
		$socioid = $_POST['socioid'];
		$socioname = $_POST['socioname'];
		$sociofirst = $_POST['sociofirstname'];
		$sociolast = $_POST['sociolastname'];
		$sociophonehome = $_POST['sociophonehome'];
		$sociophone = $_POST['sociophone'];

		////  Quantity Animals
		$calf = $_POST['calf'];
		$beal = $_POST['beal'];
		$steer = $_POST['steer'];
		$heifer = $_POST['heifer'];
		$impregnatedHeifer = $_POST['impregnatedHeifer'];
		$bull =$_POST['bull'];
		$cow =$_POST['cow'];
		//Variable para saber el tipo de actividad...
		$activitytype = "";


		if (strlen($socioid)> 0 && strlen($socioname) > 0  &&  strlen($sociofirst)  &&  strlen($sociolast) && strlen($sociophonehome) > 0  && strlen($sociophone) > 0) {


			if (isset($_POST['milk'])) {
				$activitytype.="1,";	# code...
			}
			if (isset($_POST['breedingMeat'])) {
				$activitytype.="2,";	# code...	
			}
			if (isset($_POST['fatteningMeat'])) {
				$activitytype.="3,";	# code...	
			}
			if (isset($_POST['doublePurpose'])) {
				$activitytype.="4,";	# code...	
			}		
			// Valido para saber si selecciono almenos una actividad..
			if (strlen($activitytype) != 0) {
				if (strlen($calf) > 0 || strlen($beal) > 0 ||strlen($steer) > 0 || strlen($heifer) > 0 || strlen($impregnatedHeifer) > 0 || strlen($bull) > 0  || strlen($cow) > 0 ) {
				/// consultA PARA sabeer si el valor digitado es valido
					if (is_numeric($calf) &&  $calf >  0 || is_numeric($beal) && $beal > 0 ||
						is_numeric($steer) && $steer > 0 || is_numeric($heifer) && $heifer > 0 || 
						is_numeric($impregnatedHeifer) && $impregnatedHeifer > 0 || is_numeric($bull)&& $bull > 0  || is_numeric($cow) && $cow > 0 ) {

//include './herdBusiness.php';
						require './personBusiness.php';
						$person = new Person($socioid,$socioname,$sociofirst,$sociolast,$sociophonehome,$sociophone);
						$personBusiness = new personBusiness();
						$result = $personBusiness->insertTBPerson($person);


						echo "resultado: ".$result;
						if ($result == 1) {

						require './herdBusiness.php';
						$herd = new Herd($socioid,$calf ,$beal,$steer,$heifer,$impregnatedHeifer,$bull,$cow);
						
						//	$herd = new Herd("503930363",49,0,0,1,1,0,0);

						$herdBusiness = new herdBusiness();		

						$result2 = $herdBusiness->insertTBHerd($herd);
						if ($result2 == 1) {
							require './herdActivityBusiness.php';
							$herdActivityBusiness = new herdActivityBusiness();
							$result2=$herdActivityBusiness->insertTBHerdActivity($socioid,$activitytype);
							if ($result2==1) {
								echo "<script> alert('Datos insertados con exito!!!')</script>"; 
								header("location: ../index.php");	
							}
						}else{
								header("location: ../view/censoView.php?error=registerHerdActivity");		
							}
						
						}else{
							header("location: ../view/censoView.php?error=registerHerd");	
						}

					
					echo "Datos totalmente correctos: activitytype: ".$activitytype;

					
					}else{
						header("location: ../view/censoView.php?error=numberFormat");	
					}
				}else{
					header("location: ../view/censoView.php?error=emptyField");	
				}
			}else{
				header("location: ../view/censoView.php?error=emptyActivity");	
			}
		}else{	
			header("location: ../view/censoView.php?error=emptyField");
		}
	}



?>