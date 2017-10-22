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

		$sociodetalle = $_POST['socioestado'];

		$recomendacion1 = $_POST['recomendacion1'];
		$recomendacion2 = $_POST['recomendacion2'];


		$date = new DateTime($_POST['fecha']);
		$fechaIngreso =$date->format('Y-m-d');




		if (strlen($cedula) &&strlen($nombre)  &&strlen($primerapellido) &&strlen($segundoapellido) &&strlen($telmovil) &&strlen($correo) &&strlen($provincia)  &&strlen($canton) &&strlen($distrito) &&strlen($pueblo)  &&strlen($correo) &&strlen($tipoactividad)  &&strlen($sociodetalle)  ) {

			require 'socioBusiness.php';
			require 'fincaBusiness.php';


			require_once '../domain/socioDireccion.php';
			require_once '../domain/fincaDireccion.php';
			include '../domain/socio.php';

			//require_once '../domain/hato.php';
			//require_once '../domain/finca.php';
			$socioBusiness = new socioBusiness();

			if($socioBusiness->verificarCedula($cedula)==0){

			//	echo "Fecha cvo: ".$_POST['fechaCVO']."</br>";


			 	$fechaIngreso =$date->format('Y-m-d');


				$socio = new Socio('',$cedula,$nombre,$primerapellido,$segundoapellido,$telmovil,$correo,$fechaIngreso,
				$tipoactividad, '' , $sociodetalle,$recomendacion1,$recomendacion2);

				$resultado0 = $socioBusiness->insertarTBSocio($socio);



				//si inserta el socio entonces se disparn las otras tablas insert
				if($resultado0==1){

					$idSocio=$socioBusiness->getSocioId($cedula);
					$fincaBusiness= new fincaBusiness();
					$finca= new Finca('',$idSocio,'','','');
					$resultado1=$fincaBusiness->insertarFinca($finca);

					$socioDireccion = new socioDireccion('',$provincia,$canton,$distrito,$pueblo);
					$fincaDireccion= new fincaDireccion('','','','','','');
					$resultado3= $fincaBusiness->insertarTBFincaDireccion($fincaDireccion);


					$nombre_img = $_FILES['imagen']['name'];
					$tipo = $_FILES['imagen']['type'];
					$tamano = $_FILES['imagen']['size'];

					//Si existe imagen y tiene un tamaño correcto
					if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 200000)){
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
					    }else{
					       //si no cumple con el formato
					       echo "No se puede subir una imagen con ese formato ";
					    }
					}else{
					   //si existe la variable pero se pasa del tamaño permitido
					   if($nombre_img == !NULL) echo "La imagen es demasiado grande ";
					}

					require './hatoBusiness.php';
					$hato = new Hato($idSocio,'','','','','','','','','','');
					$hatoBusiness = new hatoBusiness();
					$resultado4 = $hatoBusiness->insertarTBHato($hato);

					require './hatoActividadBusiness.php';
					$hatoActividadBusiness = new hatoActividadBusiness();
					$resultado5=$hatoActividadBusiness->insertarTBHatoActividad($idSocio,$tipoactividad);

					require './aprovacionBusiness.php';
					require '../domain/actaAprobacion.php';
					$acta = new actaAprobacion($idSocio,'','','progreso','');
					$actaBusiness = new AprovacionBusiness();
					$resultado6  = $actaBusiness->insertarActa($acta);

				}

				}


				if ($resultado0 ==1 && $resultado1 ==1 && $resultado2 == 1 && $resultado3==1&& $resultado4==1&& $resultado5==1&&$resultado6==1) {
					header("location: ../view/socioView.php?success=insertedSocio");
				}else{
					if($resultado0!=1){
						header("location: ../view/socioView.php?error=insertedSocio");
					}else{
						if($resultado1!=1){
							header("location: ../view/socioView.php?error=insertedFinca");
						}else{
							if($resultado2!=1){
								header("location: ../view/socioView.php?error=insertedSocioDireccion");
							}else{
								if($resultado3!=1){
									header("location: ../view/socioView.php?error=insertedFincaDireccion");
								}else{
									if ($resultado4!=1) {
										header("location: ../view/socioView.php?error=insertedHato");
									}else{
										if($resultado5!=1){
											header("location: ../view/socioView.php?error=insertedHatoActividad");
										}else{
											if($resultado6!=1){
												header("location: ../view/socioView.php?error=insertedAprovacion");
											}
										}
									}
								}
							}
						}
					}
				}
			}
	}


 		if (isset($_POST['modificarsocio'])){

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

		$sociodetalle = $_POST['socioestado'];


		$fecha = explode("/", $_POST['fecha']);

		$fechaingreso = $fecha[2] .'-'.$fecha[0].'-'.$fecha[1] ;

		if (strlen($cedula2) &&strlen($cedula) &&strlen($nombre) &&strlen($primerapellido) &&strlen($segundoapellido) &&strlen($telmovil) &&strlen($correo) &&strlen($provincia)  &&strlen($canton) &&strlen($distrito) &&strlen($pueblo)  &&strlen($correo) &&strlen($tipoactividad)   &&strlen($fechaingreso) &&strlen($sociodetalle)  ) {

			require 'socioBusiness.php';
			$socioBusiness = new socioBusiness();
			$socioid=$socioBusiness->getSocioId($cedula2);
		//	echo "idSocio".$socioid;

				$socio = new Socio($socioid,$cedula,$nombre,$primerapellido,$segundoapellido,$telmovil,$correo,$fechaingreso,
					$tipoactividad, '' , $sociodetalle);

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
