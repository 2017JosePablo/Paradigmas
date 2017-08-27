<!DOCTYPE html>
<html>
<head>
	<title>
		Censo de ASOTURGA
	</title>

    <?php
    //include '../business/heardAction.php';
    ?>

</head>
<script type='text/javascript'>

function validar(){
	alert("DD");

	var todo_correcto = false;


	if(document.getElementById('terneros').value.length>0){
		if (!/^([0-9])*$/.test(document.getElementById('terneros').value)){
	 	alert("El valor " + numero + " no es un número");
		}else{
			 alert("El valor " + numero + " es un número");
		}


	    todo_correcto = false;
	    return false;
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
  
<p>Advertencia: Al ingresar un daro "Erroneo" se perderan los datos temporales.</p>
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
					<input type="text" name="socioid" id="socioid"  required>
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

	<table>
		<tr>
			<td>
			<input type="radio" name="tipoactividad" selected value="leche"> Leche<br>	
			</td>
			</tr> <tr>
			<td>
			<input type="radio" name="tipoactividad" value="leche"> Carne Cría<br>
			</td>
			</tr> <tr>
			<td>
			<input type="radio" name="tipoactividad" value="leche"> Carne Engorde<br>
			</td>
			</tr> <tr>
			<td>
			<input type="radio" name="tipoactividad" value="leche"> Doble Proposito<br>
			</td>
		</tr>

	</table>

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
				<input type="text" id="Novillaspregnadas" name="Novillaspregnadas" placeholder="0">
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
</body>
</html>