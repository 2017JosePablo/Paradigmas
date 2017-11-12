
	<!DOCTYPE html>
	<html>
	<head>
		<title>
			Censo de ASOTURGA
		</title>
<link rel="stylesheet" href="../../css/style.css">
		<link rel="stylesheet" href="../css/diseno.css">
	</head>

	<script type='text/javascript'>

	function validar(){

	var todo_correcto = true;
	var cont = 0;
	/*Para comprobar la edad, utilizaremos la función isNaN(), que nos dirá si el valor
	ingresado NO es un número (NaN son las siglas de Not a Number). Si la edad no es un
	número, todo_correcto será false.*/

	if(document.getElementById('terneros').value.length > 0){
		if(isNaN(document.getElementById('terneros').value)){
			todo_correcto = false;
		}
	}else{
		cont ++;
	}



	if(document.getElementById('terneras').value.length > 0){
		if(isNaN(document.getElementById('terneras').value)){
			todo_correcto = false;
		}
	}else{
		cont ++;
	}

	if(document.getElementById('novillos').value.length > 0){
		if(isNaN(document.getElementById('novillos').value)){
			todo_correcto = false;
		}
	}else{
		cont ++;
	}

	if(document.getElementById('novillas').value.length > 0){
		if(isNaN(document.getElementById('novillas').value)){
			todo_correcto = false;
		}
	}else{
		cont ++;
	}

	if(document.getElementById('novillaspregnadas').value.length > 0){
		if(isNaN(document.getElementById('novillaspregnadas').value)){
			todo_correcto = false;
		}
	}else{
		cont ++;
	}

	if(document.getElementById('toros').value.length > 0){
		if(isNaN(document.getElementById('toros').value)){
			todo_correcto = false;
		}
	}else{
		cont ++;
	}

	if(document.getElementById('vacas').value.length > 0){
		if(isNaN(document.getElementById('vacas').value)){
			todo_correcto = false;
		}
	}else{
		cont ++;
	}


	if (cont == 7) { todo_correcto = false;}

	if (!todo_correcto) {
		alert('Algunos campos no están correctos, vuelva a revisarlos');
	}


	return todo_correcto;
	}

	</script>






	<body>

	    <?php
	    if (isset($_GET['error'])) {
	        if ($_GET['error'] == "emptyField") {
	            echo '<p style="color: red">Campo(s) vacio(s) debe ingresar almenos un bobino</p>';
	        } else if ($_GET['error'] == "numberFormat") {
	            echo '<p style="color: red">Error, formato de numero al ingresar la cantidad de bobinos</p>';
	        } else if ($_GET['error'] == "dbError") {
	            echo '<center><p style="color: red">Error al procesar la transacción</p></center>';
	        }else if($_GET['error'] == "emptyActivity"){
				echo '<center><p style="color: red">No se selecciono una Actividad</p></center>';
	        }
	    } else if (isset($_GET['success'])) {
	        echo '<p style="color: green">Transacción realizada</p>';
	    }
	    ?>


	<p>Registro de hato para socios de ASOTURGA</p>

	<p>Datos personales:</p>

	<form method="post" onsubmit="return validar()" action="../business/hatoAction.php">

			<table>
				<tr>
					<td>
						Cedula
					</td>


					<td>
						Nombre
					</td>

					<td>
						Primer Apellido
					</td>

					<td>
						Segundo Apellido
					</td>

					<td>
						Telefono Fijo
					</td>


					<td>
						Telefono Movil
					</td>

				</tr>
				<tr>

					<td>
						<input type="text" name="sociocedula" id="sociocedula"  required>
					</td>
					<td>
						<input type="text" name="socionombre" id="socionombre"  required>
					</td>
					<td>
						<input type="text" name="socioprimerapellido" id="socioprimerapellido"  required>
					</td>
					<td>
						<input type="text" name="sociosegundoapellido" id="sociosegundoapellido"  required>
					</td>

					<td>
						<input type="text" name="sociotelcasa" id="sociotelcasa">
					</td>

					<td>


						<input type="text" name="sociotelmovil" id="sociotelmovil">

					</td>
				</tr>

			</table>

		<p>Tipo de Actividad</p>

		 <?php

	 include '../business/actividadBusiness.php';
            $actividadBusiness = new actividadBusiness();
            $actividades = $actividadBusiness->obtenerTodosTBActividad();
   			     echo '<table>';
            foreach ($actividades as $current) {
                echo '<tr>';
                if($current->getId()==1){
                	 echo '<td> <input type="radio" name="tipoactividad" checked="" value='.$current->getId().'> '.$current->getNombreActividad().'<br> </td>';
                }else{
                	 echo '<td> <input type="radio" name="tipoactividad" value='.$current->getId().'> '.$current->getNombreActividad().'<br></td>';
                }
                echo '</tr>';
            }
                echo '</table>';

            ?>

			<p>Cantidad de animales</p>

		<table>
			<tr>
				<td>
					Terneros
				</td>

				<td>
					<input type="text" id="terneros" name="terneros" placeholder="0">
				</td>
			</tr>
			<tr>
				<td>
					Terneras
				</td>
				<td>
					<input type="text" id="terneras" name="terneras" placeholder="0" >
				</td>
		</tr>
			<tr>
				<td>
					Novillos
				</td>
				<td>
					<input type="text" id="novillos"  name="novillos" placeholder="0">
				</td>
		</tr>
			<tr>
				<td>
					Novillas
				</td>
				<td>
					<input type="text" id="novillas" name="novillas" placeholder="0">
				</td>
		</tr>
			<tr>
				<td>
					Novillas Pregnadas
				</td>
				<td>
					<input type="text" id="novillaspregnadas" name="novillaspregnadas" placeholder="0">
				</td>
		</tr>
			<tr>
				<td>
					Toros
				</td>
				<td>
					<input type="text" id="toros"  name="toros" placeholder="0">
				</td>

		</tr>
			<tr>
				<td>
					Vacas
				</td>
				<td>
					<input type="text" id="vacas" name="vacas" placeholder="0">
				</td>


			</tr>

		</table>



			<input type="submit" name="registrarhato" id="registrarhato" value="Registrar Hato">


</form>
<br> <br>
<a href="../index.php">Regresar</a>
<?php
	include_once "../../footer.php";
 ?>
</body>
</html>
