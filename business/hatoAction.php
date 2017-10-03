<?php
	

	if(isset($_POST['idSocio']) == true && empty($_POST['idSocio'])== false){

 		require '../data/hatoData.php';
 
        $hatoBusiness = new hatoData();

 		require 'hatoBusiness.php';  

        $hatoBusiness = new hatoBusiness();
        $result=$hatoBusiness->obtenerSocioHato($_POST['idSocio']);
        echo $result;

	}else if(isset($_POST['idSocioModificar']) == true && empty($_POST['idSocioModificar'])== false){
 	
 		require './hatoBusiness.php';
      

        $hatoBusiness = new hatoBusiness();
        $result=$hatoBusiness->obtenerSocioHatoModificar($_POST['idSocioModificar']);
        echo $result;

	}else if (isset($_POST['registrarhato'])) {
		require 'socioBusiness.php';
		$socioBusiness = new socioData();
		$socioid=$_POST['socioId'];
		
		//$socioid = $socioBusiness->obtenerUnSoloTBSocio($cedula);

		////  Quantity Animals
		$ternero = $_POST['terneros'];
		$ternera = $_POST['terneras'];
		$novillo = $_POST['novillos'];
		$novilla = $_POST['novillas'];
		$novillaprenada = $_POST['novillaspregnadas'];
		$torosServicio =$_POST['torosServicio'];
		$torosEngorde =$_POST['torosEngorde'];
		$vacasCria =$_POST['vacasCria'];
		$vacasEngorde =$_POST['vacasEngorde'];
		$razas =$_POST['razas'];

		echo "Razas: ".$razas;

		if (strlen($razas) > 0 ||strlen($ternero) > 0 || strlen($ternera) > 0 ||strlen($novillo) > 0 || strlen($novilla) > 0 || strlen($novillaprenada) > 0 || strlen($torosServicio) > 0 || strlen($torosEngorde) > 0 || strlen($vacasCria) > 0|| strlen($vacasEngorde) > 0 ) {

/*
			/// consultA PARA sabeer si el valor digitado es valido
				if (is_numeric($ternero) &&  $ternero >  0 || is_numeric($ternera) && $ternera > 0 ||
					is_numeric($novillo) && $novillo > 0 || is_numeric($novilla) && $novilla > 0 || 
					is_numeric($novillaprenada) && $novillaprenada > 0 || is_numeric($torosServicio)&& $torosEngorde > 0 || is_numeric($vacasCria)&& $vacasCria > 0 || is_numeric($torosServicio)&& $torosServicio > 0  || is_numeric($vacasEngorde) && $vacasEngorde > 0 ) {

					require './hatoBusiness.php';
				
					$hato = new Hato($socioid,$razas,$ternero ,$ternera,$novillo,$novilla,$novillaprenada,$torosServicio,$torosEngorde,$vacasCria,$vacasEngorde);
					
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
				*/
			}else{
				header("location: ../view/censoView.php?error=emptyField");	
			}

		
	}else	if (isset($_POST['actualizar'])) {
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
		$torosServicio =$_POST['torosServicio'];
		$torosEngorde =$_POST['torosEngorde'];
		$vacasCria =$_POST['vacasCria'];
		$vacasEngorde =$_POST['vacasEngorde'];
		$razas =$_POST['razas'];

		echo "Razas: ".$razas;


		if (strlen($razas) > 0 ||strlen($ternero) > 0 || strlen($ternera) > 0 ||strlen($novillo) > 0 || strlen($novilla) > 0 || strlen($novillaprenada) > 0 || strlen($torosServicio) > 0 || strlen($torosEngorde) > 0 || strlen($vacasCria) > 0|| strlen($vacasEngorde) > 0 ) {


			/// consultA PARA sabeer si el valor digitado es valido
				if (is_numeric($ternero) &&  $ternero >  0 || is_numeric($ternera) && $ternera > 0 ||
					is_numeric($novillo) && $novillo > 0 || is_numeric($novilla) && $novilla > 0 || 
					is_numeric($novillaprenada) && $novillaprenada > 0 || is_numeric($torosServicio)&& $torosEngorde > 0 || is_numeric($vacasCria)&& $vacasCria > 0 || is_numeric($torosServicio)&& $torosServicio > 0  || is_numeric($vacasEngorde) && $vacasEngorde > 0 ) {



					require './hatoBusiness.php';
				
					
					$hato = new Hato($socioid,$razas,$ternero ,$ternera,$novillo,$novilla,$novillaprenada,$torosServicio,$torosEngorde,$vacasCria,$vacasEngorde);

					$hatoBusiness = new hatoBusiness();		

					$resultado = $hatoBusiness->actualizarTBHato($hato);
					echo "Resultado: ".$Resultado;
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

		}

?>