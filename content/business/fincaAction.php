<?php

	if(isset($_POST['cedulaSocio']) == true && empty($_POST['cedulaSocio'])== false){
	   require 'socioBusiness.php';

	   $socioBusiness = new socioBusiness();
	   $idsocio = $socioBusiness->getSocioId($_POST['cedulaSocio']);

	   	require_once '../data/fincaData.php';


	      $temp = new FincaData();

	      echo  $temp->obtenerFinca($idsocio);

	}

	if(isset($_POST['cedulafinca']) == true && empty($_POST['cedulafinca'])== false){
		require 'fincaBusiness.php';
		$fincaBusiness = new fincaData();
		$result = $fincaBusiness->obtenerDatosFincaVer($_POST['cedulafinca']);
		echo $result;
	}

	if(isset($_POST['fincamodificar']) == true && empty($_POST['fincamodificar'])== false){
		require 'fincaBusiness.php';
		$fincaBusiness = new fincaData();
		$result = $fincaBusiness->obtenerDatosFincaModificar($_POST['fincamodificar']);
		echo $result;
	}

	if(isset($_POST['verificarfinca']) == true && empty($_POST['verificarfinca'])== false){
		require 'fincaBusiness.php';
		$fincaBusiness = new fincaData();
		$result = $fincaBusiness->verificarFinca($_POST['verificarfinca']);
		echo $result;
	}


 if(isset($_POST['finalizar']) || isset($_POST['actualizar'])){

	$cvotiene= $_POST['radioCVO'];
	$date = new DateTime($_POST['fechaCVO']);
	//echo $date->format('Y-m-d');
	$cvofechavigencia= $date->format('Y-m-d');

	$fincaid = $_POST['cedula'];
	$fincaarea =$_POST['fincaarea'];
	$cantidadbobinos =$_POST['cantidadbobinos'];

	echo "Finca area ".$fincaarea."<br>";
	echo "Cantidad de bobinos ".$cantidadbobinos."<br>";
		//	En caso de que no editara la ubicacion
	if ($_POST["editoUbicacion"] == 0) {
		$listaProvincias =$_POST['listaProvincias'];
		$listadoCanton =$_POST['listadoCantones'];
		$listadoDistrito=$_POST['listadoDistrito'];
		$fincapueblo =$_POST['fincapueblo'];
		$fincaexacta =$_POST['fincaexacta'];

		}else{
			$listaProvincias =$_POST['editoPro'];
			$listadoCanton =$_POST['editoCan'];
			$listadoDistrito=$_POST['editoDis'];
			$fincapueblo =$_POST['editoPueblo'];
			$fincaexacta =$_POST['editoOtros'];
		}
		echo "finca id->".$fincaid."<br>";
		echo"provinciaSeleccionada->".$listaProvincias."<br>";
		echo"canton seleccinoado->".$listadoCanton ."<br>";
		echo"listado de distrito->".$listadoDistrito."<br>";
		echo"pueblo->".$fincapueblo."<br>";
		echo"finca exActa->".$fincaexacta."<br>";

	$fincatipo =$_POST['tipofinca'];
	$cercas =$_POST['tiposCerca'];


	//if(isset($cercas) && isset($fincaid) && isset($fincaarea) &&isset($cantidadbobinos)  &&isset($listaProvincias) &&isset($listadoDistrito) &&isset($listadoCanton) &&isset($fincapueblo) &&isset($fincaexacta)&&isset($fincatipo)){

		require_once './fincaBusiness.php';
		require './socioBusiness.php';
		include '../domain/fincaDireccion.php';

		require 'cvoBusiness.php';
		require_once '../domain/cvo.php';
		require_once '../domain/finca.php';
		$socioBusiness= new socioBusiness();

		$idSocio=$socioBusiness->getSocioId($fincaid);
		echo "ID SOCIO ->".$idSocio."<br>";
		$fincaBusiness = new fincaBusiness();
		$finca = new Finca($idSocio,$idSocio,$fincaarea,$cantidadbobinos,$cercas);
		$resultado2 = $fincaBusiness ->actualizarTBfinca($finca);


		$fincaDireccion = new FincaDireccion($idSocio,$listaProvincias,$listadoCanton,$listadoDistrito,$fincapueblo,$fincaexacta);
		$resultado1 = $fincaBusiness->actualizarTBfincaDireccion($fincaDireccion);

		$resultado3=$socioBusiness->actualizarDatoActividad($idSocio,$fincatipo);

		$resultado2=$fincaBusiness->actualizarTipoFinca($idSocio,$fincatipo);




		//CVO
		$cvoBusiness = new cvoBusiness();
		$cvo = new Cvo('',$cvotiene,$cvofechavigencia,$idSocio);
		$resultado4 = $cvoBusiness->insertarCvo($cvo);


		if ($resultado1 == 1 && $resultado2 == 1 && $resultado3 == 1 && $resultado4 == 1 ) {
			header("location: ../../index.php?success=updateFinca");
		}else{
			if($resultado2!=1){
				header("location: ../view/fincaView.php?error=errorActualizarFinca");

			}else{
				if($resultado1!=1){
					header("location: ../view/fincaView.php?error=errorActualizarDireccion");
				}else{
					if($resultado3!=1){
						header("location: ../view/fincaView.php?error=errorActualizarActividades");
					}else{
						if($resultado4!=1){
							header("location: ../view/fincaView.php?error=errorInsertCVO");
						}
					}
				}
			}

		}


}

?>
