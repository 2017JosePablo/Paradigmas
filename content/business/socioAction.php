
<?php
	if(isset($_POST['cedula']) == true && empty($_POST['cedula'])== false){
		require_once './socioBusiness.php';
		$socioBusiness = new socioData();
		$result = $socioBusiness->obtenerUnSoloTBSocio($_POST['cedula']);
		echo $result;
	}
	if(isset($_POST['versocio']) == true && empty($_POST['versocio'])== false){
			require 'socioBusiness.php';
			$socioBusiness = new socioBusiness();
			$result = $socioBusiness->obtenerUnTBSocio($_POST['versocio']);
			echo $result;
	}

	if (isset($_POST['desactivar'])== true && empty($_POST['desactivar'])== false ){
		require 'socioBusiness.php';

		$socioBusiness = new socioData();
		$result = $socioBusiness->editarEstado($_POST['desactivar'],'3');
		echo $result;
	}


	include_once 'socioBusiness.php';


	$socioBusiness = new socioBusiness();

	require_once '../domain/socio.php';



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
		$responsable= $_POST['responsable'];
		$beneficiario= $_POST['beneficiario'];

		/*
		$provincia =2;
		$canton = 2;
		$distrito = 1;
		$pueblo = "Rio Claro";

*/

	echo $provincia."<br>";
	echo $canton."<br>";
	echo $distrito."<br>".$pueblo;

		$sociodetalle = $_POST['socioestado'];

		$recomendacion1 = $_POST['recomendacion1'];
		$recomendacion2 = $_POST['recomendacion2'];


		$date = new DateTime($_POST['fecha']);
		$fechaIngreso =$date->format('Y-m-d');

		$contrasena = $_POST['clavesocio'];


		$tipoactividad = 1;

		$fierroCheck = $_POST['radioFierro'];

		// if (isset($contrasena) && !empty($contrasena) &&strlen($cedula) &&strlen($nombre)  &&strlen($primerapellido) &&strlen($segundoapellido) &&strlen($telmovil) &&strlen($correo) &&strlen($provincia)  &&strlen($canton) &&strlen($distrito) &&strlen($pueblo)  &&strlen($correo) &&strlen($tipoactividad)  &&strlen($sociodetalle)  ) {

			require 'fincaBusiness.php';

			require_once '../domain/socioDireccion.php';
			require_once '../domain/fincaDireccion.php';

			require '../domain/fierro.php';


			if($socioBusiness->verificarCedula($cedula)==0){
			 	$fechaIngreso =$date->format('Y-m-d');

//	function Socio($socioId,$cedula,$nombre,$primerApellido,$segundoApellido,$telMovil,$correo,$fechaIngreso,$tipoActividadId,$fincatipoId,$estadosociodetalle,$recomentacion1,$recomentacion2,$responsable,$beneficiario){

				$socio = new Socio('',$cedula,$nombre,$primerapellido,$segundoapellido,$telmovil,$correo,$fechaIngreso,
				$tipoactividad, 1 , 5,$recomendacion1,$recomendacion2,$responsable,$beneficiario);

				$resultado0 = $socioBusiness->insertarTBSocio($socio);
				echo "resutador 0 : ".$resultado0."<br>";
				//si inserta el socio entonces se disparn las otras tablas insert
				//if($resultado0==1){

					//donde se inserta la direccion del socio
					$socioDireccion = new socioDireccion('',$provincia,$canton,$distrito,$pueblo);
					$resultadodireccion = $socioBusiness->insertarTBSocioDireccion($socioDireccion);



					$idSocio=$socioBusiness->getSocioId($cedula);
					$fincaBusiness= new fincaBusiness();
					$finca= new Finca('',$idSocio,'','','');
					$resultado1=$fincaBusiness->insertarFinca($finca);

					$fincaDireccion= new fincaDireccion('','','','','','');
					$resultado3= $fincaBusiness->insertarTBFincaDireccion($fincaDireccion);

					echo "Resulado finca direcion: ".$resultado3."</br>";

					$nombre_img = $_FILES['imagen']['name'];
					$tipo = $_FILES['imagen']['type'];
					$tamano = $_FILES['imagen']['size'];

					//Si existe imagen y tiene un tamaño correcto
					if (($nombre_img == !NULL)){
					   //indicamos los formatos que permitimos subir a nuestro servidor
					   if (($_FILES["imagen"]["type"] == "image/gif")
					   || ($_FILES["imagen"]["type"] == "image/jpeg")
					   || ($_FILES["imagen"]["type"] == "image/jpg")
					   || ($_FILES["imagen"]["type"] == "image/png"))
					   {
					      // Ruta donde se guardarán las imágenes que subamos
					     //$directorio = $_SERVER['DOCUMENT_ROOT'].'/paradigmas/uploads/';
							 $directorio = '../uploads/fierros/';
					      // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
								$tipo = explode('/',$_FILES["imagen"]["type"]);
								$direccionFierro = $directorio.$cedula.".".$tipo[1];
					      move_uploaded_file($_FILES['imagen']['tmp_name'],$direccionFierro);
								echo "DIRECCION->".$directorio.$cedula.".".$tipo[1];
					    }else{
					       //si no cumple con el formato
					       echo "No se puede subir una imagen con ese formato ";
					    }
					}else{
					   //si existe la variable pero se pasa del tamaño permitido
						 $direccionFierro = 'https://www.google.com/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&cad=rja&uact=8&ved=0ahUKEwif9uCNuKvXAhUGRCYKHSFJBscQjRwIBw&url=http%3A%2F%2Fporcelanasbidasoaymontgatina.com%2Fproducto-etiqueta%2Flampara%2F&psig=AOvVaw0OvY2JVi7XFthW5Cx1qg-u&ust=1510108870518982';

					}

					require 'fierroBusiness.php';

					$fierroBusiness = new FierroBusiness();



//  function Fierro($fierroid,$fierrotiene,$fierrorutaimagen,$idsocio)
					$fierro = new Fierro('',$fierroCheck,$direccionFierro,$idSocio);
					$resultadoFierro = $fierroBusiness->insertarFierro($fierro);


					require './hatoBusiness.php';
					$hato = new Hato($idSocio,'','','','','','','','','','');
					$hatoBusiness = new hatoBusiness();
					$resultado4 = $hatoBusiness->insertarTBHato($hato);

					echo "Resulado de hato: ".$resultado4."</br>";

					require './hatoActividadBusiness.php';
					$hatoActividadBusiness = new hatoActividadBusiness();
					$resultado5=$hatoActividadBusiness->insertarTBHatoActividad($idSocio,$tipoactividad);
					echo "Resulado de hato actividad: ".$resultado5."</br>";


					echo " include 1</br>";
					require '../domain/actaAprobacion.php';
					echo "include 2 </br>";
					$acta = new actaAprobacion('',$idSocio,'','','progreso','');
					echo "SOcio .".$acta->getSocioID()."</br>";
					echo "Fecha .".$acta->getFecha()."</br>";
					echo "Condicion .".$acta->getCondicion()."</br>";
					echo "nueva acta</br>";

					include_once '../data/actaAprobacionData.php';

					echo "incluyo aprovacionBusiness</br>";
					//$temporalAprovacion = new AprovacionBusiness();
					$aprovacionData = new actaAprobacionData();
					echo "nueva instancia</br>";
					$resultado6  = $aprovacionData->insertarActaAprobacionData($acta);

					echo "Resulado de acta: ".$resultado6."</br>";

					require 'loginBusiness.php';
					require '../domain/login.php';
//($idLogin,$socioId,$usiario,$contrasena,$rol)
					$loginBusiness = new loginBusiness();
					$login =  new Login('',$idSocio,$correo,$contrasena,1);
					$result7 = $loginBusiness->insertarTBLogin($login);

				}else{
					header("location: ../view/socioView.php?error=userExist");
				}
				echo "Socio->".$resultado0."<br>";
				echo "Socio->".$resultado1."<br>";
				echo "Socio DIRECCION->".$resultadodireccion."<br>";
				echo "Socio->".$resultado3."<br>";
				echo "Socio->".$resultado4."<br>";
				echo "Socio->".$resultado5."<br>";
				echo "Socio->".$resultado6."<br>";

				if ($resultado0 ==1 && $resultado1 ==1 && $resultadodireccion == 1 && $resultado3==1&& $resultado4==1&& $resultado5==1&&$resultado6==1 && $result7 == 1 && $resultadoFierro == 1) {
					header("location: ../../index.php?success=insertedSocio");
				}else{
					if($resultado0!=1){
						header("location: ../view/socioView.php?error=errorToRegister");
					}else{
						if($resultado1!=1){
							header("location: ../view/socioView.php?error=insertedFinca");
						}else{
							if($resultadodireccion!=1){
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
											}else{
												if ($result7 != 1) {
													header("location: ../view/socioView.php?error=insertedLogin");
												}else{
													if ($resultadoFierro != 1) {
														header("location: ../view/socioView.php?error=insertedFierro");
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

	//	}else{
			//header('location: ../view/socioView.php?error=empyInput');
		//}
	}


 		if (isset($_POST['modificarsocio'])){

			require '../domain/fierro.php';

		$cedula2 = $_POST['cedulaVieja'];
		$cedula = $_POST['sociocedula'];
		$nombre = $_POST['socionombre'];
		$primerapellido = $_POST['socioprimerapellido'];
		$segundoapellido = $_POST['sociosegundoapellido'];
		$telmovil = $_POST['sociotelmovil'];
		$correo = $_POST['sociocorreo'];
		$tipoactividad =$_POST['tipoactividad'];
		$recomendacion1 = $_POST['recomendacion1'];
		$recomendacion2 = $_POST['recomendacion2'];

		$responsable= $_POST['responsable'];
		$beneficiario= $_POST['beneficiario'];


		if($_POST['ModUbi'] == 1){
			$provincia = $_POST['provE'];
			$canton = $_POST['canE'];
			$distrito = $_POST['disE'];
			$pueblo = $_POST['pueE'];

		}else{
			$provincia = $_POST['listaProvincias'];
			$canton = $_POST['listadoCantones'];
			$distrito = $_POST['listadoDistritos'];
			$pueblo = $_POST['sociopueblo'];

		}
		/////////////////
		$nombre_img = $_FILES['imagen']['name'];

		if (($nombre_img == !NULL)){
			 //indicamos los formatos que permitimos subir a nuestro servidor
			 if (($_FILES["imagen"]["type"] == "image/gif")
			 || ($_FILES["imagen"]["type"] == "image/jpeg")
			 || ($_FILES["imagen"]["type"] == "image/jpg")
			 || ($_FILES["imagen"]["type"] == "image/png"))
			 {
					// Ruta donde se guardarán las imágenes que subamos
				 //$directorio = $_SERVER['DOCUMENT_ROOT'].'/paradigmas/uploads/';
				 $directorio = '../uploads/fierros/';
					// Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
					$tipo = explode('/',$_FILES["imagen"]["type"]);
					$direccionFierro = $directorio.$cedula.".".$tipo[1];
					move_uploaded_file($_FILES['imagen']['tmp_name'],$direccionFierro);
				}else{
					 echo "No se puede subir una imagen con ese formato ";
				}
		}
		$idSocio=$socioBusiness->getSocioId($cedula);

		require 'fierroBusiness.php';
		$fierroBusiness = new FierroBusiness();

//  function Fierro($fierroid,$fierrotiene,$fierrorutaimagen,$idsocio)
		$fierro = new Fierro('',$fierroCheck,$direccionFierro,$idSocio);
		$resultadoFierro = $fierroBusiness->modificarFierroSocio($fierro);
		/////////////////


		$sociodetalle = $_POST['socioestado'];


		$fecha = explode("/", $_POST['fecha']);

		$fechaingreso = $fecha[2] .'-'.$fecha[0].'-'.$fecha[1] ;

		//if (strlen($cedula2) &&strlen($cedula) &&strlen($nombre) &&strlen($primerapellido) &&strlen($segundoapellido) &&strlen($telmovil) &&strlen($correo) &&strlen($provincia)  &&strlen($canton) &&strlen($distrito) &&strlen($pueblo)  &&strlen($correo) &&strlen($tipoactividad)   &&strlen($fechaingreso) &&strlen($sociodetalle)  ) {


			$socioBusiness = new socioBusiness();
			$socioid=$socioBusiness->getSocioId($cedula2);
			//	echo "idSocio".$socioid;

				$socio = new Socio($socioid,$cedula,$nombre,$primerapellido,$segundoapellido,$telmovil,$correo,$fechaingreso,
					$tipoactividad, '1' , $sociodetalle,$recomendacion1, $recomendacion2,$responsable,$beneficiario);

				$resultado = $socioBusiness->actualizarTBSocio($socio);

				require_once '../domain/socioDireccion.php';

				$socioDireccion = new socioDireccion($socioid,$provincia,$canton,$distrito,$pueblo);
				$resultado2 = $socioBusiness-> actualizarTBSocioDireccion($socioDireccion);

				if ($resultado ==1 && $resultado2 == 1 && $resultadoFierro == 1 ) {
						header("location: ../../index.php?success=updatedSocio");
				}else{

				//	echo "Error al actualizar un socio: ".@$resultado;
			//		echo "Error al actualizar un socioDireccion: ".@$resultado2;
					header("location: ../view/socioView.php?error=erroractualizar");
				}

		//}else{
		//	echo " Algunos campos no existen...";
			//header("location: ../view/socioView.php?error=emptyFile");
		//}

	}



?>
