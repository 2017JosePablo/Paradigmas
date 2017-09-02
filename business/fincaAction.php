<?php

 if(isset($_POST['actulizarfinca'])){
	$idsocio = $_POST['idsocio'];
	$fincaarea =$_POST['fincaarea'];
	$cantidadbobinos =$_POST['cantidadbobinos'];

	$listaProvincias =$_POST['listaProvincias'];
	$listadoCanton =$_POST['listadoCantones'];
	$listadoDistrito=$_POST['listadoDistrito'];
	$fincapueblo =$_POST['fincapueblo'];
	$fincaexacta =$_POST['fincaexacta'];


	if(isset($idsocio) && isset($fincaarea) &&isset($cantidadbobinos) &&isset($listaProvincias) &&isset($listadoDistrito) &&isset($listadoCanton) &&isset($fincapueblo) &&isset($fincaexacta)){

			require './fincaBusiness.php';
			include '../domain/fincaDireccion.php';
			
			$fincaBusiness = new fincaBusiness();
							//Valor AI
			$finca = new Finca('',$idsocio,$fincaarea,$cantidadbobinos);

			$fincaDireccion = new FincaDireccion('',$listaProvincias,$listadoCanton,$listadoDistrito,$fincapueblo,$fincaexacta);
			
		
			$resultado2 = $fincaBusiness ->actualizarTBfinca($finca,$idsocio);
			$resultado1 = $fincaBusiness->actualizarTBfincaDireccion($fincaDireccion,$idsocio);

			
	

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

