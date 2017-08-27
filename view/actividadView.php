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

 <form method="post" enctype="multipart/form-data" action="../business/actividadAction.php">
         <?php
 
             include '../business/actividadBusiness.php';
            $actividadBusiness = new actividadBusiness();
            $actividades = $actividadBusiness->obtenerTodosTBActividad();
             echo '<table> <tr><td>Actividad</td>  <td colspan="2">Acciones</td> </tr>';
            foreach ($actividades as $current) {     
                echo '<tr>';
                     if($current->getId()==1){
                     echo '<td> <input type="radio" name="tipoactividad" checked="" value='.$current->getId().'> '.$current->getNombreActividad().'<br> </td>';
                     //echo '<td> <a href="../business/actividadAction.php?ideliminar='.$current->getId().'"> Eliminar</a> </td>';
                     //echo "<td> <a href=''> Modificar</a> </td>";
                }else{
                     echo '<td> <input type="radio" name="tipoactividad" value='.$current->getId().'> '.$current->getNombreActividad().'<br></td>'; 
                  //  echo '<td> <a href="../business/actividadAction.php?ideliminar='.$current->getId().'"> Eliminar</a> </td>';
                   //  echo "<td> <a href=''> Modificar</a> </td>";
                }

                 echo '</tr>';
            }
                echo '</table>';

            ?>
            <br><br><br>
       </form>

<form method="post" action="../business/actividadAction.php">
    Tipo de Actividad: <input type="text" name="tipoactividad" required=""><br>

<input type="submit" value="Crear Actividad" name="crearactividad" id="crearactiviad"/><p>

</form>
 

    <a href="../index.php">Regresar</a>
</body>
</html>
