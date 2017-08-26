<?php

	//include './personBusiness.php';
//	include './herdBusiness.php';
	
//	include './herdActivityBusiness.php';

	if (isset($_POST['registrarHato'])) {
// Personal information
		$socioid = $_POST['socioid'];
		$socionombre = $_POST['socionombre'];
		$socioprimerapellido = $_POST['socioprimerapellido'];
		$sociosegundoapellido = $_POST['sociosegundoapellido'];
		$sociotelefonocasa = $_POST['sociotelefonocasa'];
		$sociotelefono = $_POST['sociotelefono'];

		////  Quantity Animals
		$ternero = $_POST['ternero'];
		$ternera = $_POST['ternera'];
		$novillo = $_POST['novillo'];
		$novilla = $_POST['novilla'];
		$novillaprenada = $_POST['novillaprenada'];
		$toro =$_POST['toro'];
		$vaca =$_POST['vaca'];
		//Variable para saber el tipo de actividad...
		$tipoActividad = "";


		if (strlen($socioid)> 0 && strlen($socionombre) > 0  &&  strlen($socioprimerapellido)  &&  strlen($sociosegundoapellido) && strlen($sociotelefonocasa) > 0  && strlen($sociotelefono) > 0) {


			if (isset($_POST['leche'])) {
				$tipoActividad.="1,";	# code...
			}
			if (isset($_POST['criacarne'])) {
				$tipoActividad.="2,";	# code...	
			}
			if (isset($_POST['engorde'])) {
				$tipoActividad.="3,";	# code...	
			}
			if (isset($_POST['dobleproposito'])) {
				$tipoActividad.="4,";	# code...	
			}		
			// Valido para saber si selecciono almenos una actividad..
			if (strlen($tipoActividad) != 0) {
				if (strlen($ternero) > 0 || strlen($ternera) > 0 ||strlen($novillo) > 0 || strlen($novilla) > 0 || strlen($novillaprenada) > 0 || strlen($toro) > 0  || strlen($vaca) > 0 ) {
				/// consultA PARA sabeer si el valor digitado es valido
					if (is_numeric($ternero) &&  $ternero >  0 || is_numeric($ternera) && $ternera > 0 ||
						is_numeric($novillo) && $novillo > 0 || is_numeric($novilla) && $novilla > 0 || 
						is_numeric($novillaprenada) && $novillaprenada > 0 || is_numeric($toro)&& $toro > 0  || is_numeric($vaca) && $vaca > 0 ) {

//include './herdBusiness.php';
						require './personBusiness.php';
						$persona = new Persona($socioid,$socionombre,$socioprimerapellido,$sociosegundoapellido,$sociotelefonocasa,$sociotelefono);
						$personaBusiness = new personaBusiness();
						$resultado = $personaBusiness->insertTBPersona($persona);


						if ($resultado == 1) {

						require './hatoBusiness.php';
						$hato = new Hato($socioid,$ternero ,$ternera,$novillo,$novilla,$novillaprenada,$toro,$vaca);
						
						//	$herd = new Herd("503930363",49,0,0,1,1,0,0);

						$hatoBusiness = new hatoBusiness();		

						$resultado2 = $hatoBusiness->insertTBHato($hato);
						if ($resultado2 == 1) {
							require './hatoActividadBusiness.php';
							$hatoActividadBusiness = new hatoActividadBusiness();
							$resultado2=$hatoActividadBusiness->insertarTBHatoActividad($socioid,$tipoActividad);
							if ($resultado2==1) {

								header("location: ../index.php?success=inserted");	
							}
						}else{
								header("location: ../view/censoView.php?error=registerHerdActivity");		
							}
						
						}else{
							header("location: ../view/censoView.php?error=registerHerd");	
						}
							
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