<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Area Administrativa de Actividas</title>
	<link rel="stylesheet" href="">

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

         <?php
 
             include '../business/actividadBusiness.php';
            $actividadBusiness = new actividadBusiness();
            $actividades = $actividadBusiness->obtenerTodosTBActividad();
             echo '<table border = "1"> <tr><td colspan= "3">Listado de tipos de actividades</td></tr> <tr><td>Id</td><td>Actividad</td><td align="center">Acciones</td> </tr>';
            foreach ($actividades as $current) {     
                echo '<tr>';
                    echo '<td>'.$current->getId().'</td>';
                    echo '<td> '.$current->getNombreActividad().'</td>';
                    echo '<td> <button type= "button" value = "'.$current->getId().'-'.$current->getNombreActividad().'-Mod">Modificar</button</td>';
                    echo '</tr>';
            }
                echo '</table>';

            ?>
            <br>
            <button onclick="ocultarCajas()" > Agregar Actividad</button>
            <br><br>

       

<form method="post" action="../business/actividadAction.php">
    <input type="hidden" name="idActividad" value="" id="idActividad">
   
    <div id="regActividad" style="display: none;" >
        Tipo de Actividad: <input type="text" name="tipoactividad" onkeypress="return validarLetras(event)"><br>
        <button type="submit" name="crearactividad" id="crearactiviad">Crear Actividad</button>
    </div>

    <div id="modActividad" style="display: none;">
        Editar Actividad: <br><br><input type="text" name="tipoactividadMod" id="tipoactividadMod"  onkeypress="return validarLetras(event)"><br><br>
         <button type="submit"name="modificarActividad" id="modActividad">Guardar Cambios</button>
    </div>



</form>
 

    <a href="../index.php">Regresar</a>
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../js/editarActividad.js"></script>
</body>
</html>
