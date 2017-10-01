<?php

	if (isset($_POST['cedulaHato'])) {
		require './hatoBusiness.php';
		$socioid=$_POST['cedulaHato'];	
		$hatoBusiness = new hatoData();
		$result=$hatoBusiness->obtenerSocioHato($socioid);
		echo $result;

	}


	if (isset($_POST['registrarhato'])) {
		require 'socioBusiness.php';
		$socioBusiness = new socioData();
		$cedula=$_POST['cedula'];
		$socioid = $socioBusiness->obtenerUnSoloTBSocio($cedula);

		////  Quantity Animals
		$ternero = $_POST['terneros'];
		$ternera = $_POST['terneras'];
		$novillo = $_POST['novillos'];
		$novilla = $_POST['novillas'];
		$novillaprenada = $_POST['novillaspregnadas'];
		$toro =$_POST['toros'];
		$vaca =$_POST['vacas'];
		$razas =$_POST['razas'];

		if (strlen($razas) > 0 ||strlen($ternero) > 0 || strlen($ternera) > 0 ||strlen($novillo) > 0 || strlen($novilla) > 0 || strlen($novillaprenada) > 0 || strlen($toro) > 0  || strlen($vaca) > 0 ) {


			/// consultA PARA sabeer si el valor digitado es valido
				if (is_numeric($ternero) &&  $ternero >  0 || is_numeric($ternera) && $ternera > 0 ||
					is_numeric($novillo) && $novillo > 0 || is_numeric($novilla) && $novilla > 0 || 
					is_numeric($novillaprenada) && $novillaprenada > 0 || is_numeric($toro)&& $toro > 0  || is_numeric($vaca) && $vaca > 0 ) {

					require './hatoBusiness.php';
				
					$hato = new Hato($socioid,$razas,$ternero ,$ternera,$novillo,$novilla,$novillaprenada,$toro,$vaca);
					
					//	$herd = new Herd("503930363",49,0,0,1,1,0,0);

					$hatoBusiness = new hatoBusiness();		

					$resultado2 = $hatoBusiness->insertarTBHato($hato);
					if ($resultado2 == 1) {
						require './hatoActividadBusiness.php';
						$hatoActividadBusiness = new hatoActividadBusiness();
						$resultado2=$hatoActividadBusiness->insertarTBHatoActividad($socioid,$_POST['tipoactividad']);
					
							header("location: ../index.php?success=inserted");	
					
					}else{
							header("location: ../view/censoView.php?error=error");			
					}

				}else{
					header("location: ../view/censoView.php?error=numberFormat");	
				}
			}else{
				header("location: ../view/censoView.php?error=emptyField");	
			}

		}else{	
			header("location: ../view/censoView.php?error=emptyField");
		}

/******************************HATO********************************************************/		

	if (isset($_POST['registrar']) || isset($_POST['actualizar'])) {
		require 'socioBusiness.php';
		$socioBusiness = new socioData();
		$cedula=$_POST['cedula'];
		$socioid = $socioBusiness->obtenerUnSoloTBSocio($cedula);

		////  Quantity Animals
		$ternero = $_POST['terneros'];
		$ternera = $_POST['terneras'];
		$novillo = $_POST['novillos'];
		$novilla = $_POST['novillas'];
		$novillaprenada = $_POST['novillaspregnadas'];
		$toro =$_POST['toros'];
		$vaca =$_POST['vacas'];
		$razas =$_POST['razas'];

		if (strlen($razas) > 0 ||strlen($ternero) > 0 || strlen($ternera) > 0 ||strlen($novillo) > 0 || strlen($novilla) > 0 || strlen($novillaprenada) > 0 || strlen($toro) > 0  || strlen($vaca) > 0 ) {


			/// consultA PARA sabeer si el valor digitado es valido
				if (is_numeric($ternero) &&  $ternero >  0 || is_numeric($ternera) && $ternera > 0 ||
					is_numeric($novillo) && $novillo > 0 || is_numeric($novilla) && $novilla > 0 || 
					is_numeric($novillaprenada) && $novillaprenada > 0 || is_numeric($toro)&& $toro > 0  || is_numeric($vaca) && $vaca > 0 ) {

					require './hatoBusiness.php';
				
					$hato = new Hato($socioid,$razas,$ternero ,$ternera,$novillo,$novilla,$novillaprenada,$toro,$vaca);

					$hatoBusiness = new hatoBusiness();		

					$resultado = $hatoBusiness->actualizarTBHato($hato);
					if ($resultado == 1) {
						header("location: ../index.php?success=inserted");	
					
					}else{
							header("location: ../view/hatoView.php?error=error");			
					}

				}else{
					header("location: ../view/hatoView.php?error=numberFormat");	
				}
			}else{
				header("location: ../view/hatoView.php?error=emptyField");	
			}

		}else{	
			header("location: ../view/hatoView.php?error=emptyField");
		}
	


?>