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

	$fincaid = $_POST['cedula'];
	$fincaarea =$_POST['fincaarea'];
	$cantidadbobinos =$_POST['cantidadbobinos'];
		//	En caso de que no editara la ubicacion
	if ($_POST["editoUbicacion"] == 0) {
		$listaProvincias =$_POST['listaProvincias'];
		$listadoCanton =$_POST['listadoCantones'];
		$listadoDistrito=$_POST['listadoDistrito'];
		$fincapueblo =$_POST['fincapueblo'];
		$fincaexacta =$_POST['fincaexacta'];

		}else{
			$listaProvincias =$_POST['editoPor'];
			$listadoCanton =$_POST['editoCan'];
			$listadoDistrito=$_POST['editoDis'];
			$fincapueblo =$_POST['editoPueblo'];
			$fincaexacta =$_POST['editoOtro'];
		}

	
	$tipoactividad =$_POST['tipoactividad'];
	$fincatipo =$_POST['tipofinca'];
	$cercas =$_POST['tiposCerca'];


//	echo "datos".$fincaid;

	if(isset($cercas) && isset($fincaid) && isset($fincaarea) &&isset($cantidadbobinos)  &&isset($listaProvincias) &&isset($listadoDistrito) &&isset($listadoCanton) &&isset($fincapueblo) &&isset($fincaexacta)&&isset($tipoactividad)&&isset($fincatipo)){

		require './fincaBusiness.php';
		require './socioBusiness.php';
		include '../domain/fincaDireccion.php';
		$socioBusiness= new socioBusiness();

		$idSocio=$socioBusiness->getSocioId($fincaid);
		$fincaBusiness = new fincaBusiness();
		$finca = new Finca($idSocio,$idSocio,$fincaarea,$cantidadbobinos,$cercas);
		$resultado2 = $fincaBusiness ->actualizarTBfinca($finca);


		$fincaDireccion = new FincaDireccion($idSocio,$listaProvincias,$listadoCanton,$listadoDistrito,$fincapueblo,$fincaexacta);
		$resultado1 = $fincaBusiness->actualizarTBfincaDireccion($fincaDireccion);

		$resultado3=$socioBusiness->actualizarDatoActividad($idSocio,$fincatipo,$tipoactividad);

		if ($resultado1 == 1 && $resultado2 == 1 && $resultado3 == 1) {
			echo "Finca actualizada con exito";
			header("location: ../index.php?success=actualizado");
		}else{
			if($resultado2!=1){
				header("location: ../view/fincaView.php?error=errorActualizarFinca");

			}else{
				if($resultado1!=1){
					header("location: ../view/fincaView.php?error=errorActualizarDireccion");
				}else{
					if($resultado3!=1){
						header("location: ../view/fincaView.php?error=errorActualizarActividades");
					}	
				}
			}
			
		}

	}else{
		echo "Datos vacios...</br>";
	}


}

?>

