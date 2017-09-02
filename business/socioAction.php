<?php

	
	if(isset($_POST['cedula']) == true && empty($_POST['cedula'])== false){
		require 'socioBusiness.php';
		$socioBusiness = new socioData();
		$result = $socioBusiness->obtenerUnSoloTBSocio($_POST['cedula']);
		echo $result; 
	}

	if (isset($_POST['agregarsocio'])) {

		$cedula = $_POST['sociocedula'];
		$nombre = $_POST['socionombre'];
		$primerapellido = $_POST['socioprimerapellido'];
		$segundoapellido = $_POST['sociosegundoapellido'];
		$telmovil = $_POST['sociotelmovil'];
		$correo = $_POST['sociocorreo'];

		$provincia = $_POST['listaProvincias'];
		$canton = $_POST['listadoCantones'];
		$distrito = $_POST['listadoDistritos'];
		$pueblo = $_POST['sociopueblo'];


		$tipoactividad = $_POST['tipoactividad'];
		$tipofinca =  $_POST['tipofinca'];
		$fechaingreso = $_POST['fecha'];

		$sociodetalle = $_POST['socioestado'];		


		

		if (strlen($cedula) &&strlen($nombre) &&strlen($primerapellido) &&strlen($segundoapellido) &&strlen($telmovil) &&strlen($correo) &&strlen($provincia)  &&strlen($canton) &&strlen($distrito) &&strlen($pueblo)  &&strlen($correo) &&strlen($tipoactividad)  &&strlen($tipofinca) &&strlen($fechaingreso) &&strlen($sociodetalle)  ) {	

			require 'socioBusiness.php';
			require 'fincaBusiness.php';
			$socioBusiness = new socioBusiness();
				
			if($socioBusiness->verificarCedula($cedula)==false){

				$socio = new Socio('',$cedula,$nombre,$primerapellido,$segundoapellido,$telmovil,$correo,$fechaingreso,
					$tipoactividad, $tipofinca , $sociodetalle);
		
				$resultado = $socioBusiness->insertarTBSocio($socio);


				$fincaBusiness= new fincaBusiness();
				$finca= new Finca('','','','');
				$resuntadoFinca=$fincaBusiness->insertarFinca($finca);

				require_once '../domain/socioDireccion.php';
				require_once '../domain/fincaDireccion.php';

				$socioDireccion = new socioDireccion('',$provincia,$canton,$distrito,$pueblo);
				$resultado2 = $socioBusiness-> insertarTBSocioDireccion($socioDireccion);

				$fincaDireccion= new fincaDireccion('','','','','','');
				$resuntadoFinca2= $fincaBusiness->insertarTBFincaDireccion($fincaDireccion);


				if ($resultado ==1 && $resultado2 == 1 && $resuntadoFinca==1 && $resuntadoFinca2==1) {
						header("location: ../index.php");
				}else{

					echo "Error al insertar un socio: ".@$resultado;
					echo "Error al insertar un socioDireccion: ".@$resultado2;
					header("location: ../view/socioView.php?error=errorinserted");
				}

			}else{
				header("location: ../socioView.php?error=userexits");
			}
		}else{
			echo " Algunos campos no existen...";
			//header("location: ../view/socioView.php?error=emptyFile");
		}



	}else if (isset($_POST['modificarsocio'])){

		$cedula = $_POST['sociocedula'];
		$nombre = $_POST['socionombre'];
		$primerapellido = $_POST['socioprimerapellido'];
		$segundoapellido = $_POST['sociosegundoapellido'];
		$telmovil = $_POST['sociotelmovil'];
		$correo = $_POST['sociocorreo'];

		$provincia = $_POST['listaProvincias'];
		$canton = $_POST['listadoCantones'];
		$distrito = $_POST['listadoDistritos'];
		$pueblo = $_POST['sociopueblo'];
		echo 'Distrito'.$distrito;

		$tipoactividad = $_POST['tipoactividad'];
		$tipofinca =  $_POST['tipofinca'];
		$fechaingreso = $_POST['fecha'];

		$sociodetalle = $_POST['socioestado'];		


		

		if (strlen($cedula) &&strlen($nombre) &&strlen($primerapellido) &&strlen($segundoapellido) &&strlen($telmovil) &&strlen($correo) &&strlen($provincia)  &&strlen($canton) &&strlen($distrito) &&strlen($pueblo)  &&strlen($correo) &&strlen($tipoactividad)  &&strlen($tipofinca) &&strlen($fechaingreso) &&strlen($sociodetalle)  ) {	

			require 'socioBusiness.php';
			$socioBusiness = new socioBusiness();
			$socioid=$socioBusiness->getSocioId($cedula); 
			
				$socio = new Socio($socioid,$cedula,$nombre,$primerapellido,$segundoapellido,$telmovil,$correo,$fechaingreso,
					$tipoactividad, $tipofinca , $sociodetalle);
		
				$resultado = $socioBusiness->actualizarTBSocio($socio);

				require_once '../domain/socioDireccion.php';

				$socioDireccion = new socioDireccion($socioid,$provincia,$canton,$distrito,$pueblo);
				$resultado2 = $socioBusiness-> actualizarTBSocioDireccion($socioDireccion);

				if ($resultado ==1 && $resultado2 == 1 ) {
						header("location: ../index.php");
				}else{

					echo "Error al actualizar un socio: ".@$resultado;
					echo "Error al actualizar un socioDireccion: ".@$resultado2;
					header("location: ../view/socioView.php?error=erroractualizar");
				}

		}else{
			echo " Algunos campos no existen...";
			//header("location: ../view/socioView.php?error=emptyFile");
		}

	}



?>