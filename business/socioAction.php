<?php

	if (isset($_POST['agregarsocio'])) {
		


		$cedula = $_POST['sociocedula'];
		$nombre = $_POST['socionombre'];
		$primerapellido = $_POST['socioprimerapellido'];
		$segundoapellido = $_POST['sociosegundoapellido'];
		$telcasa = $_POST['sociotelcasa'];
		$telmovil = $_POST['sociotelmovil'];
		$correo = $_POST['sociocorreo'];

		$provincia = $_POST['listaProvincias'];
		$canton = $_POST['listadoCantones'];
		$distrito = $_POST['listadoDistrito'];
		$pueblo = $_POST['sociopueblo'];


		$tipoactividad = $_POST['tipoactividad'];
		$tipofinca =  $_POST['tipofinca'];
		$fechaingreso = $_POST['fecha'];

		$sociodetalle = $_POST['socioestado'];		


		echo "Estado: ".$sociodetalle;


		if (strlen($cedula) &&strlen($nombre) &&strlen($primerapellido) &&strlen($segundoapellido) &&strlen($telcasa) &&strlen($telmovil) &&strlen($correo) &&strlen($provincia)  &&strlen($canton) &&strlen($distrito) &&strlen($pueblo)  &&strlen($correo) &&strlen($tipoactividad)  &&strlen($tipofinca) &&strlen($fechaingreso) &&strlen($sociodetalle)  ) {	
			require 'socioBusiness.php';
			$socioBusiness = new socioBusiness();



			$socio = new Socio($cedula,$nombre,$primerapellido,$segundoapellido,$telcasa,$telmovil,$correo,$fechaingreso,$tipoactividad, $tipofinca , $sociodetalle);

	
	//		$resultado = "";
			$resultado = $socioBusiness->insertarTBSocio($socio);
			$resultado = $socioBusiness-> insertarTBSocioDireccion($provincia,$canton,$distrito,$pueblo);



			if ($resultado ==1) {
					header("location: ../view/fincaView.php?cedula=$cedula");
				}else{

				//	echo "Error al insertar un socio: ".@$resultado;
					header("location: ../view/socioView.php?error=errorinserted");
				}

		}else{
			//echo " Algunos campos no existen...";
			//header("location: ../view/socioView.php?error=emptyFile");
		}



	}



?>