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

<form method="post" action="../business/herdAction.php">

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
					<input type="text" name="sicionombre" id="sicionombre"  required>
				</td>
				<td>
					<input type="text" name="sicioprimerapellido" id="sicioprimerapellido"  required>
				</td>		
				<td>
					<input type="text" name="siciosegundoapellido" id="siciosegundoapellido"  required>
				</td>
				
				<td>
					<input type="text" name="siciotelcasa" id="siciotelcasa" required>
				</td>
				
				<td>

			
					<input type="text" name="siciotelmovil" id="siciotelmovil"  required>

				</td>
			</tr>

		</table>		
	
	<p>Tipo de Actividad</p>

	<table>
		<tr>
			<td>
			<input type="radio" name="tipoactividad" value="leche"> Leche<br>	
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
				<input type="text" name="terneros" placeholder="0">
			</td>
		</tr>
		<tr>
			<td>
				Terneras
			</td>
			<td>
				<input type="text" name="terneras" placeholder="0" >
			</td>
	</tr>
		<tr>
			<td>
				Novillos
			</td>
			<td>
				<input type="text" name="novillos" placeholder="0">
			</td>
	</tr>
		<tr>
			<td>
				Novillas
			</td>
			<td>
				<input type="text" name="novillas" placeholder="0">
			</td>
	</tr>
		<tr>
			<td>
				Novillas Pregnadas
			</td>
			<td>
				<input type="text" name="Novillaspregnadas" placeholder="0">
			</td>
	</tr>
		<tr>
			<td>
				Toros
			</td>
			<td>
				<input type="text" name="toros" placeholder="0">
			</td>

	</tr>
		<tr>
			<td>
				Vacas
			</td>
			<td>
				<input type="text" name="vacas" placeholder="0">
			</td>


		</tr>

	</table>



		<input type="submit" name="registrarhato" id="registrarhato" value="Registrar Hato"> 


		



</form>
<br> <br>
<a href="../index.php">Regresar</a>
</body>
</html>