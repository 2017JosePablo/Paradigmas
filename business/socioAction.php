<?php


	if(isset($_POST['cedula']) == true && empty($_POST['cedula'])== false){
		require 'socioBusiness.php';
		$socioBusiness = new socioData();
		$result = $socioBusiness->obtenerUnSoloTBSocio($_POST['cedula']);
		echo $result;
	}
	if(isset($_POST['versocio']) == true && empty($_POST['versocio'])== false){
			require 'socioBusiness.php';
			$socioBusiness = new socioData();
			$result = $socioBusiness->obtenerUnTBSocio($_POST['versocio']);
			echo $result;
	}



	if (isset($_POST['desactivar'])== true && empty($_POST['desactivar'])== false ){
		require 'socioBusiness.php';
		$socioBusiness = new socioData();
		$result = $socioBusiness->editarEstado($_POST['desactivar']);
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
		$fechaingreso = $_POST['fecha'];
		$sociodetalle = $_POST['socioestado'];

		$recomendacion1 = $_POST['recomendacion1'];
		$recomendacion2 = $_POST['recomendacion2'];


		$dateIngreso = new DateTime($fechaingreso);





		if (strlen($cedula) &&strlen($nombre) &&strlen($primerapellido) &&strlen($segundoapellido) &&strlen($telmovil) &&strlen($correo) &&strlen($provincia)  &&strlen($canton) &&strlen($distrito) &&strlen($pueblo)  &&strlen($correo) &&strlen($tipoactividad)  &&strlen($fechaingreso) &&strlen($sociodetalle)  ) {

			require 'socioBusiness.php';
			require 'fincaBusiness.php';
			require 'cvoBusiness.php';


			require_once '../domain/socioDireccion.php';
			require_once '../domain/fincaDireccion.php';


			require_once '../domain/cvo.php';
			require_once '../domain/examenBruselas.php';
			require_once '../domain/examenTuberculosis.php';
			//require_once '../domain/hato.php';
			//require_once '../domain/finca.php';
			$socioBusiness = new socioBusiness();



			if($socioBusiness->verificarCedula($cedula)==0){

			//	echo "Fecha cvo: ".$_POST['fechaCVO']."</br>";

				$date = new DateTime($_POST['fechaCVO']);

				echo $date->format('Y-m-d');


				$socio = new Socio('',$cedula,$nombre,$primerapellido,$segundoapellido,$telmovil,$correo,$dateIngreso,
					$tipoactividad, $tipofinca , $sociodetalle,$recomendacion1,$recomendacion2);

				$resultado0 = $socioBusiness->insertarTBSocio($socio);

				$idSocio=$socioBusiness->getSocioId($cedula);
				$fincaBusiness= new fincaBusiness();
				$finca= new Finca('',$idSocio,'','','');
				$resuntadoFinca=$fincaBusiness->insertarFinca($finca);


				$cvotiene= $_POST['radioCVO'];
				$date = new DateTime($_POST['fechaCVO']);
				//echo $date->format('Y-m-d');
				$cvofechavigencia= $date->format('Y-m-d');
				$cvoBusiness = new cvoBusiness();
				$cvo = new Cvo('',$cvotiene,$cvofechavigencia,$idSocio);
				$resultado1 = $cvoBusiness->insertarCvo($cvo);

				$socioDireccion = new socioDireccion('',$provincia,$canton,$distrito,$pueblo);
				$resultado4 = $socioBusiness-> insertarTBSocioDireccion($socioDireccion);

				$fincaDireccion= new fincaDireccion('','','','','','');
				$resultado5= $fincaBusiness->insertarTBFincaDireccion($fincaDireccion);


				////////////////////////////////SUBIENDO IMAGEN
				$nombre_img = $_FILES['imagen']['name'];
				$tipo = $_FILES['imagen']['type'];
				$tamano = $_FILES['imagen']['size'];

				//Si existe imagen y tiene un tamaño correcto
				if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 200000))
				{
				   //indicamos los formatos que permitimos subir a nuestro servidor
				   if (($_FILES["imagen"]["type"] == "image/gif")
				   || ($_FILES["imagen"]["type"] == "image/jpeg")
				   || ($_FILES["imagen"]["type"] == "image/jpg")
				   || ($_FILES["imagen"]["type"] == "image/png"))
				   {
				      // Ruta donde se guardarán las imágenes que subamos
				     $directorio = $_SERVER['DOCUMENT_ROOT'].'/paradigmas/uploads/';
				      // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
				      move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
				    }
				    else
				    {
				       //si no cumple con el formato
				       echo "No se puede subir una imagen con ese formato ";
				    }
				}
				else
				{
				   //si existe la variable pero se pasa del tamaño permitido
				   if($nombre_img == !NULL) echo "La imagen es demasiado grande ";
				}

				////////////////////////////////SUBIENDO IMAGEN


				if ($resultado0 ==1 && $resultado1 == 1 && $resultado4==1&& $resultado5==1) {

					require './hatoBusiness.php';
					$hato = new Hato($idSocio,'','','','','','','','','','');
					$hatoBusiness = new hatoBusiness();
					$resultado6 = $hatoBusiness->insertarTBHato($hato);

					echo "Resultado 6: ".$resultado6."</br>";
					if ($resultado6 == 1) {
						require './hatoActividadBusiness.php';
						$hatoActividadBusiness = new hatoActividadBusiness();
						$resultado7=$hatoActividadBusiness->insertarTBHatoActividad($idSocio,$tipoactividad);

						echo "Resultado 7: ".$resultado7."</br>";

						if($resultado7==1){
							header("location: ../index.php?success=insertedSocio");
						}else{
						//	header("location: ../view/socioView.php?error=errorinsertarhatoactividad");
						}

					}else{
						//	header("location: ../view/socioView.php?error=errorinsertarhato");
					}

					//	header("location: ../index.php");
				}else{


				//	header("location: ../view/socioView.php?error=errorinserted");
				}

			}else{
			//	header("location: ../view/socioView.php?error=userexits");
			}
		}else{
			echo " Algunos campos no existen...";
			//header("location: ../view/socioView.php?error=emptyFile");
		}



	}else if (isset($_POST['modificarsocio'])){

		$cedula2 = $_POST['cedulaVieja'];
		$cedula = $_POST['sociocedula'];
		$nombre = $_POST['socionombre'];
		$primerapellido = $_POST['socioprimerapellido'];
		$segundoapellido = $_POST['sociosegundoapellido'];
		$telmovil = $_POST['sociotelmovil'];
		$correo = $_POST['sociocorreo'];



		if($_POST['ModUbi'] == 1){
			$provincia = $_POST['provE'];
			$canton = $_POST['canE'];
			$distrito = $_POST['disE'];
			$pueblo = $_POST['pueE'];

		}else if($_POST['ModUbi'] == 0){
			$provincia = $_POST['listaProvincias'];
			$canton = $_POST['listadoCantones'];
			$distrito = $_POST['listadoDistritos'];
			$pueblo = $_POST['sociopueblo'];

		}

		$tipoactividad = $_POST['tipoactividad'];
		$tipofinca =  $_POST['tipofinca'];

		$sociodetalle = $_POST['socioestado'];


		$fecha = explode("/", $_POST['fecha']);

		$fechaingreso = $fecha[2] .'-'.$fecha[0].'-'.$fecha[1] ;

		if (strlen($cedula2) &&strlen($cedula) &&strlen($nombre) &&strlen($primerapellido) &&strlen($segundoapellido) &&strlen($telmovil) &&strlen($correo) &&strlen($provincia)  &&strlen($canton) &&strlen($distrito) &&strlen($pueblo)  &&strlen($correo) &&strlen($tipoactividad)  &&strlen($tipofinca) &&strlen($fechaingreso) &&strlen($sociodetalle)  ) {

			require 'socioBusiness.php';
			$socioBusiness = new socioBusiness();
			$socioid=$socioBusiness->getSocioId($cedula2);
		//	echo "idSocio".$socioid;

				$socio = new Socio($socioid,$cedula,$nombre,$primerapellido,$segundoapellido,$telmovil,$correo,$fechaingreso,
					$tipoactividad, $tipofinca , $sociodetalle);

				$resultado = $socioBusiness->actualizarTBSocio($socio);

				require_once '../domain/socioDireccion.php';

				$socioDireccion = new socioDireccion($socioid,$provincia,$canton,$distrito,$pueblo);
				$resultado2 = $socioBusiness-> actualizarTBSocioDireccion($socioDireccion);

				if ($resultado ==1 && $resultado2 == 1 ) {
						header("location: ../index.php?success=updatedSocio");
				}else{

				//	echo "Error al actualizar un socio: ".@$resultado;
			//		echo "Error al actualizar un socioDireccion: ".@$resultado2;
					header("location: ../view/socioView.php?error=erroractualizar");
				}

		}else{
		//	echo " Algunos campos no existen...";
			//header("location: ../view/socioView.php?error=emptyFile");
		}

	}



?>
