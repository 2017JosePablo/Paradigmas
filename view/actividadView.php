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
                    echo '<td> <input type= "submit" name= "'.$current->getId().'" value = "Modificar"></td>';
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
