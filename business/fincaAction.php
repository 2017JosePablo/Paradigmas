<?php

if(isset($_POST['finalizar'])){

	$idsocio = $_POST['idsocio'];
	$fincaarea =$_POST['fincaarea'];
	$cantidadbobinos =$_POST['cantidadbobinos'];

	$listaProvincias =$_POST['listaProvincias'];
	$listadoCanton =$_POST['listadoCantones'];
	$listadoDistrito=$_POST['listadoDistrito'];
	$fincapueblo =$_POST['fincapueblo'];
	$fincaexacta =$_POST['fincaexacta'];


	if(isset($idsocio) && isset($fincaarea) &&isset($cantidadbobinos) &&isset($listaProvincias) &&isset($listadoDistrito) &&isset($listadoCanton) &&isset($fincapueblo) &&isset($fincaexacta)  ){
			require 'fincaBusiness.php';

			$finca = new Finca($idsocio,$fincaarea,$cantidadbobinos);

			$fincaBusiness = new fincaBusiness();

			require_once '../domain/fincaDireccion.php';

			$fincaDireccion = new FincaDireccion($listaProvincias,$listadoCanton,$listadoDistrito,$fincapueblo,$fincaexacta);

			$resultado2 = $fincaBusiness ->insertarFinca($finca);
			
			$resultado1 = $fincaBusiness->insertarTBFincaDireccion($fincaDireccion);
			


			if ($resultado1 == 1 && $resultado2 ==1) {
				header("location: ../index.php?success=inserted");
			}else{
				echo "Error";
			//	header("location: ../view/fincaView.php?error=error");
			}



	}else{
		echo "Datos vacios...</br>";
	}




}

?>

