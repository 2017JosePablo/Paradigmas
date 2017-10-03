<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Area Administrativa de Actividas</title>
	<link rel="stylesheet" href="">


   
</head>
<body>

 <form method="post" enctype="multipart/form-data" action="../business/actividadAction.php">
         <?php
 
             include '../business/actividadBusiness.php';
            $actividadBusiness = new actividadBusiness();
            $actividades = $actividadBusiness->obtenerTodosTBActividad();
             echo '<table border = "1"> <tr><td colspan= "3">Listado de tipos de actividades</td></tr> <tr><td>Id</td><td>Actividad</td>  <td colspan="2">Acciones</td> </tr>';
            foreach ($actividades as $current) {     
                echo '<tr>';
                    echo '<td>'.$current->getId().'</td>';
                    echo '<td> '.$current->getNombreActividad().'</td>';
                    echo '<td> <button type= "button" value = "'.$current->getId().'-Mod">Modificar</button</td>';
                    echo '</tr>';
            }
                echo '</table>';

            ?>
            <br><br><br>
       </form>

<form method="post" action="../business/actividadAction.php">
   
    <div id="regActividad" >
        Tipo de Actividad: <input type="text" name="tipoactividad" required=""><br>
        <input type="submit" value="Crear Actividad" name="crearactividad" id="crearactiviad"/><p>
    </div>

    <div id="modActividad" style="display: none;">
        Editar Actividad: <br><br><input type="text" name="tipoactividadMod" id="tipoactividadMod"><br><br>
        <input type="submit" value="Guardar Cambios" name="modActividad" id="modActividad"/><p>
    </div>



</form>
 

    <a href="../index.php">Regresar</a>
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../js/editarActividad.js"></script>
</body>
</html>
