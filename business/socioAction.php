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

		

		if (strlen($cedula) &&strlen($nombre) &&strlen($primerapellido) &&strlen($segundoapellido) &&strlen($telcasa) &&strlen($telmovil) &&strlen($correo) &&strlen($provincia)  &&strlen($canton) &&strlen($distrito) &&strlen($pueblo) ) {
			
			require './socioBusiness.php';
			$socioBusiness = new socioBusiness();

			$socio = new Socio($cedula,$nombre,$primerapellido,$segundoapellido,$telcasa,$telmovil,$correo,$provincia,$canton,$distrito,$pueblo);

			$resultado = $socioBusiness->insertarTBSocio($socio);

			if ($resultado ==1) {
				header("location: ../view/socioView.php?successs=inserted");
			}else{
				header("location: ../view/socioView.php?error=errorinserted");
			}

		}else{
			header("location: ../view/socioView.php?error=emptyFile");
		}



	}



?>