<?php
  session_start();

  if (isset($_SESSION["usuario"]) && isset($_SESSION["rol"])){
    if ($_SESSION['rol'] == "admi") {
 ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Area Administrativa de Actividas</title>
  <link rel="stylesheet" href="../../css/style.css">


    <script type="text/javascript">

    function ocultarCajas(){
        document.getElementById('regActividad').style = "display:block";
        document.getElementById('modActividad').style = "display:none";
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
  <form method="post" action="../business/actividadAction.php">

    <div id="cuerpo">

			<div style="overflow-x:auto;">
				<h1>Gestíon de  actividades</h1>
         <?php

             include '../business/actividadBusiness.php';
            $actividadBusiness = new actividadBusiness();
            $actividades = $actividadBusiness->obtenerTodosTBActividad();

             echo '<table><tr><td>Actividad</td><td >Acciones</td> </tr>';

            foreach ($actividades as $current) {
                echo '<tr>';
                    echo '<td> '.$current->getNombreActividad().'</td>';
                    echo '<td> <a><button type= "button" value = "'.$current->getId().'-'.$current->getNombreActividad().'-Mod">Modificar</button>  </a> </td> ';
                    echo '</tr>';
            }
                echo '</table>';

            ?>
					</div>
            <br>

            <a><input type="button" onclick="ocultarCajas()"  value="Agregar Actividad"></a>
            <a href="../../"><input type="button" value="Regresar" ></a>



    <input type="hidden" name="idActividad" value="" id="idActividad">
    <div id="regActividad" style="display: none;" >
			<hr>
        Tipo de Actividad: <input type="text" name="tipoactividad" onkeypress="return validarLetras(event)"><br>
				</br></br>
        <a><input type="submit" name="crearactividad" id="crearactiviad" value="Guardar Datos" ></a>
				<a href="actividadView.php"><input type="button" value="Cancelar" ></a>
    </div>

    <div id="modActividad" style="display: none;">
			<hr>
        Editar Actividad: <br><br><input type="text" name="tipoactividadMod" id="tipoactividadMod"  onkeypress="return validarLetras(event)" placeholder="Nombre de la Actividad" required>

         <a><input type="submit" name="modificarActividad" id="modActividad" value="Actualizar Datos" ></a>
				 <a href="actividadView.php"><input type="button" value="Cancelar" ></a>
    </div>


</form>





  </div>


    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../js/editarActividad.js"></script>


    <?php
    	include_once "../../footer.php";
     ?>
</body>
</html>
<?php
    }else{header("Location: ../index.php?error=dontPermisse");}
  }else{
     header("Location: ../index.php?error=dontPermisse");
  }

 ?>
