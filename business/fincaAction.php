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


	if(isset($idsocio) && isset($fincaarea) &&isset($cantidadbobinos) &&isset($listaProvincias) &&isset($listadoDistrito) &&isset($listadoCanton) &&isset($fincapueblo) &&isset($fincaexacta)){

			require './fincaBusiness.php';
			include '../domain/fincaDireccion.php';
			
			$fincaBusiness = new fincaBusiness();
							//Valor AI
			$finca = new Finca('',$idsocio,$fincaarea,$cantidadbobinos);

			$fincaDireccion = new FincaDireccion('',$listaProvincias,$listadoCanton,$listadoDistrito,$fincapueblo,$fincaexacta);
			
		
			$resultado2 = $fincaBusiness ->insertarFinca($finca);
			$resultado1 = $fincaBusiness->insertarTBFincaDireccion($fincaDireccion);

			
	

			if ($resultado2 == 1 && $resultado2 == 1) {
				echo "Finca insertada con exito";
				header("location: ../index.php?success=inserted");
			}else{
				if($resultado2!=1){
					header("location: ../view/fincaView.php?error=errorInsertFinca");

				}else{
					if($resultado1!=1){
						header("location: ../view/fincaView.php?error=errorInsertDireccion");
					}
				}
				
			}

	}else{
		echo "Datos vacios...</br>";
	}


}

?>

