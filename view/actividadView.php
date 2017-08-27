<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Area Administrativa de Actividas</title>
	<link rel="stylesheet" href="">


   
</head>
<body>

<p>Tipos de Actividad</p>
    

         <?php
 
             include '../business/actividadBusiness.php';
            $actividadBusiness = new actividadBusiness();
            $actividades = $actividadBusiness->obtenerTodosTBActividad();
             echo '<table> <tr><td>Actividad</td>  <td colspan="2">Acciones</td> </tr>';
            foreach ($actividades as $current) {     
                echo '<tr>';
                echo '<td> ".$current->getNombreActividad().'<br>" </td>';
                echo '<td> <a href="../business/actividadAction.php?ideliminar='.$current->getId.'"> Eliminar</a> </td>';
                 echo "<td> <a href=''> Modificar</a> </td>";
            }
                echo '</table>';

            ?>
      

<form method="post" action="../business/actividadAction.php">
    Tipo de Actividad: <input type="text" name="tipoactividad" required=""><br>

<input type="submit" value="Crear Actividad" name="crearactividad" id="crearactiviad"/><p>

</form>
 

    <a href="../index.php">Regresar</a>
</body>
</html>
