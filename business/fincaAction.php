<?php

 if(isset($_POST['finalizar'])){
	
 	if(isset($_POST['socioFinca'])){
 		$sociofinca = $_POST['socioFinca'];
 		echo "Encontrado ".$sociofinca;
 	}

	
	$fincaarea =$_POST['fincaarea'];
	$cantidadbobinos =$_POST['cantidadbobinos'];
	echo "ced:".$socioFinca;
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

			
	

			if ($resultado2 == 1 && $resultado2 == 1) {
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

}

?>

