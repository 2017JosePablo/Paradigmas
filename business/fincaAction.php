<?php

	if(isset($_POST['cedulaSocio']) == true && empty($_POST['cedulaSocio'])== false){
   require 'socioBusiness.php';
   $socioBusiness = new socioBusiness();
   $idsocio = $socioBusiness->getSocioId($_POST['cedulaSocio']);

   	require_once '../data/fincaData.php';

      $temp = new FincaData();

      echo  $temp->obtenerFinca($idsocio);	
		
	}

 if(isset($_POST['finalizar'])){
	
	$sociofinca = $_POST['socioFinca'];
	$fincaarea =$_POST['fincaarea'];
	$cantidadbobinos =$_POST['cantidadbobinos'];
	$listaProvincias =$_POST['listaProvincias'];
	$listadoCanton =$_POST['listadoCantones'];
	$listadoDistrito=$_POST['listadoDistrito'];
	$fincapueblo =$_POST['fincapueblo'];
	$fincaexacta =$_POST['fincaexacta'];


	if(isset($sociofinca) && isset($fincaarea) &&isset($cantidadbobinos) &&isset($listaProvincias) &&isset($listadoDistrito) &&isset($listadoCanton) &&isset($fincapueblo) &&isset($fincaexacta)){

			require './fincaBusiness.php';
			require './socioBusiness.php';
			include '../domain/fincaDireccion.php';
			$socioBusiness= new socioBusiness();
			$idsocio=$socioBusiness->getSocioId($sociofinca);
			
			$fincaBusiness = new fincaBusiness();
			$finca = new Finca($idsocio,$idsocio,$fincaarea,$cantidadbobinos);

			$fincaDireccion = new FincaDireccion($idsocio,$listaProvincias,$listadoCanton,$listadoDistrito,$fincapueblo,$fincaexacta);
			
		
			$resultado2 = $fincaBusiness ->actualizarTBfinca($finca);
			$resultado1 = $fincaBusiness->actualizarTBfincaDireccion($fincaDireccion);

			
	

			if ($resultado1 == 1 && $resultado2 == 1) {
				echo "Finca actualizada con exito";
				header("location: ../index.php?success=actualizado");
			}else{
				if($resultado2!=1){
					header("location: ../view/fincaView.php?error=errorActualizarFinca");

				}else{
					if($resultado1!=1){
						header("location: ../view/fincaView.php?error=errorActualizarDireccion");
					}
				}
				
			}

	}else{
		echo "Datos vacios...</br>";
	}

}else if(isset($_POST['actualizar'])){

	$fincaid = $_POST['cedula'];

	$fincaarea =$_POST['fincaarea'];
	$cantidadbobinos =$_POST['cantidadbobinos'];
	
	echo "Socio: ".$fincaid;


	if(isset($fincaid) && isset($fincaarea) &&isset($cantidadbobinos)){

		require './fincaBusiness.php';

		$fincaBusiness = new fincaBusiness();
		$finca = new Finca($fincaid,$fincaid,$fincaarea,$cantidadbobinos);

		$resultado = $fincaBusiness ->actualizarTBfinca($finca);
		if ($resultado == 1) {
				echo "Finca actualizada con exito";
				header("location: ../index.php?success=actualizado");
		}else{
			header("location: ../view/fincaView.php?error=errorActualizarFinca");
		}

	}else{
		echo "Datos vacios...</br>";
	}


}

?>

