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

	}else if (isset($_POST['hatoCenso'])) {
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


			/// consultA PARA sabeer si el valor digitado es valido
				if (is_numeric($ternero) &&  $ternero >  0 || is_numeric($ternera) && $ternera > 0 ||
					is_numeric($novillo) && $novillo > 0 || is_numeric($novilla) && $novilla > 0 || 
					is_numeric($novillaprenada) && $novillaprenada > 0 || is_numeric($torosServicio)&& $torosEngorde > 0 || is_numeric($vacasCria)&& $vacasCria > 0 || is_numeric($torosServicio)&& $torosServicio > 0  || is_numeric($vacasEngorde) && $vacasEngorde > 0 ) {

					require './hatoBusiness.php';
				
					$hato = new Hato($socioid,$razas,$ternero ,$ternera,$novillo,$novilla,$novillaprenada,$torosServicio,$torosEngorde,$vacasCria,$vacasEngorde);
				
					$hatoBusiness = new hatoBusiness();		

					$resultado2 = $hatoBusiness->insertarTBHato($hato);
					if ($resultado2 == 1) {
						require './hatoActividadBusiness.php';
						$hatoActividadBusiness = new hatoActividadBusiness();
						$resultado2=$hatoActividadBusiness->insertarTBHatoActividad($socioid,$_POST['tipoactividad']);
						if ($resultado2 == 1) {
							header("location: ../index.php?success=insertedHato");	
						}else{
							header("location: ../view/censoView.php?error=error");			
						}
					
					}else{
							header("location: ../view/censoView.php?error=error");			
					}

				}else{
					header("location: ../view/censoView.php?error=numberFormat");	
				}
				
			}else{
				header("location: ../view/censoView.php?error=emptyField");	
			}

		
	}else	if (isset($_POST['registrarhato']) || isset($_POST['hatoMod'])) {
		require 'socioBusiness.php';
		$socioBusiness = new socioData();
		
		$socioid=$_POST['socioId'];

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




		if (strlen($razas) > 0 ||strlen($ternero) > 0 || strlen($ternera) > 0 ||strlen($novillo) > 0 || strlen($novilla) > 0 || strlen($novillaprenada) > 0 || strlen($torosServicio) > 0 || strlen($torosEngorde) > 0 || strlen($vacasCria) > 0|| strlen($vacasEngorde) > 0 ) {


			/// consultA PARA sabeer si el valor digitado es valido
				if (is_numeric($ternero) &&  $ternero >  0 || is_numeric($ternera) && $ternera > 0 ||
					is_numeric($novillo) && $novillo > 0 || is_numeric($novilla) && $novilla > 0 || 
					is_numeric($novillaprenada) && $novillaprenada > 0 || is_numeric($torosServicio)&& $torosEngorde > 0 || is_numeric($vacasCria)&& $vacasCria > 0 || is_numeric($torosServicio)&& $torosServicio > 0  || is_numeric($vacasEngorde) && $vacasEngorde > 0 ) {



					require './hatoBusiness.php';
				
					
					$hato = new Hato($socioid,$razas,$ternero ,$ternera,$novillo,$novilla,$novillaprenada,$torosServicio,$torosEngorde,$vacasCria,$vacasEngorde);

					//BRUCELAS
					$examenvigente= $_POST['radioBrusela'];
					$date = new DateTime($_POST['fechaBrusela']);
					$examenfechavencimiento= $date->format('Y-m-d');
					$examenBruselasBusiness = new examenBruselasBusiness();				
					$examenBrusela = new examenBruselas('',$examenvigente,$examenfechavencimiento,$idSocio);
					$resultado2 =$examenBruselasBusiness->insertarExamen($examenBrusela);


					//TUBERCULINA
					$examenvigente= $_POST['radioTuberculosis'];
					$date = new DateTime($_POST['fechaTuberculosis']);
					$examenfechavencimiento= $date->format('Y-m-d');
					$examenTuberculosisBusiness = new examenTuberculosisBusiness();				
					$examenTuberculosis = new examenTuberculosis('',$examenvigente,$examenfechavencimiento,$idSocio);
					$resultado3 = $examenTuberculosisBusiness->insertarExamen($examenTuberculosis);


					$hatoBusiness = new hatoBusiness();		

					$resultado = $hatoBusiness->actualizarTBHato($hato);
				
					if ($resultado == 1 && $resultado2 == 1 && $resultado3 == 1) {
						header("location: ../index.php?success=updateHato");	
					}else{
						
						if($resultado!=1){
							echo @.resultado;
							header("location: ../view/hatoView.php?error=errorInsertHato");	
						}else{
							if ($resultado2!=1) {
								echo @.resultado2;
								header("location: ../view/hatoView.php?error=errorInsertBrucela");	
							}else{
								if ($resultado3!=1) {
									echo @.resultado3;
									header("location: ../view/hatoView.php?error=errorInsertTuberculina");		
								}
							}
						}
					}

				}else{
					header("location: ../view/hatoView.php?error=numberFormat");	
				}
			}else{
				header("location: ../view/hatoView.php?error=emptyField");	
			}

		}
?>