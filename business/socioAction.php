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
		$sociodetalle = $_POST['sociodetalle'];		

		echo "Provincia: ".$provincia."</br>";
		echo "Canton: ".$canton."</br>";
		echo "Distrito: ".$distrito."</br>";
		

		
		echo "Fecha de Ingreos: ".$fechaingreso."</br>";
		echo "Cedula: ".$cedula."</br>";


		echo "Tipo de Finca: ".$tipofinca."</br>";
		echo "Tipo de Actividad: ".$tipoactividad."</br>";

		if (strlen($cedula) &&strlen($nombre) &&strlen($primerapellido) &&strlen($segundoapellido) &&strlen($telcasa) &&strlen($telmovil) &&strlen($correo) &&strlen($provincia)  &&strlen($canton) &&strlen($distrito) &&strlen($pueblo)  &&strlen($correo) &&strlen($tipoactividad)  &&strlen($tipofinca) &&strlen($fechaingreso) &&strlen($sociodetalle)  ) {	
			require 'socioBusiness.php';
			$socioBusiness = new socioBusiness();



//			$socio = new Socio($cedula,$nombre,$primerapellido,$segundoapellido,$telcasa,$telmovil,$correo,$fechaingreso,$tipoactividad, $tipofinca , $sociodetalle);

		$socio = new Socio('123','Adan','Carranza','Adaro','1244-1345','4353-5422','DDaa@g.com','2017-02-12','1','1','1');

//			$resultado = $socioBusiness->insertarTBSocio($socio);

				if ($resultado ==1) {
					header("location: ../view/socioView.php?successs=inserted");
				}else{

					echo "Error al insertar un socio: ".@$resultado;
					//header("location: ../view/socioView.php?error=errorinserted");
				}

		}else{
			echo " Algunos campos no existen...";
			//header("location: ../view/socioView.php?error=emptyFile");
		}



	}



?>