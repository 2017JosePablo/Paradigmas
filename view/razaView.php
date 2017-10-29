<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Area Administrativa de Raza</title>
	<link rel="stylesheet" href="../css/diseno.css">


    <script type="text/javascript">
        function ocultarDatos(){
            document.getElementById('cajaEdi').style="display:none";

            document.getElementById('cajaReg').style="display:block";

        }

    </script>
    <script type="text/javascript">
        function validarLetras(e) {
            tecla = (document.all) ? e.keyCode : e.which;
            if (tecla==8) return true;
            patron =/[A-Za-z\s]/;
            te = String.fromCharCode(tecla);
        return patron.test(te);
    }
     </script>

</head>
<body>
	<div style="overflow-x:auto;">

		<h1>Listado de razas</h1>
	 <?php

	 include '../business/razaBusiness.php';
            $razaBusiness = new razaBusiness();

            $todasRazas = $razaBusiness->obtenerTodoTBRaza();
            echo '<table ><tr class="cabeceraTabla">  <td>Nombre de la Raza</td><td colspan="2">Acciones</td> </tr>';

            foreach ($todasRazas as $current) {
                echo '<tr>';

                echo '<td> '.$current->getNombreRaza().'</td>';

                echo "<td> <button type='submit' value='".$current->getIdRaza().'-'.$current->getNombreRaza()."-Mod'> Modificar</button> </td>";

                echo '</tr>';
            }
                echo '</table>';


            ?>
</div>
            <br>

            <button onclick="ocultarDatos()">Agregar Raza</button>


            <form method="post" enctype="multipart/form-data" action="../business/razaAction.php">
            <input type="hidden" name="idRaza" id="idRaza" value="">
            <div id="cajaReg" style="display: none;">
                <p>Agregar Raza</p>
                <label>Raza: </label><input type="text"  onkeypress="return validarLetras(event)" name="razanombre" id="razanombre"/><br><br>
                <button type="submit" name="crearraza" id="crearraza">Agregar nueva Raza</button>
            </div>

            <div id="cajaEdi" style="display: none;">
                <p>Editar Raza</p>
                <label>Raza: </label><input type="text"  onkeypress="return validarLetras(event)" name="razanombreMod" id="razanombreMod"/><br><br>
                <button type="submit" name="modificarRaza" id="crearraza">Editar nueva Raza</button>
            </div>


            </form>
						<hr>
						<a href="../index.php">Regresar</a>
    			<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    			<script src="../js/editarRaza.js"></script>
</body>
</html>
