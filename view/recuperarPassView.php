<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Recuperar Clave</title>
    <link rel="stylesheet" href="../css/diseno.css">
  </head>
  <body>

  <h1>Area administrativa de Recuperacion de clave</h1>
  

  <div style="overflow-x:auto;">
    <?php
    include '../business/socioBusiness.php';

    $socioBusiness = new socioBusiness();
    $socios = $socioBusiness->obtenerTodosTBSocio();

    echo '<table><tr class="cabeceraTabla" > <td>Nombre</td><td>Primer Apellido</td><td>Segundo Apellido</td> <td>Clave</td> </tr>';

    foreach ($socios as $current) {
        echo '<tr>';
        echo '<td> '.$current->getNombre().'</td>';
        echo '<td> '.$current->getPrimerApellido() .' </td>';
        echo '<td> '.$current->getSegundoApellido().' </td>';
        echo '<td> <input type="text"  id="" readonly>  </td>';
        echo '</tr>';
    }
    echo '</table>';

    ?>
  </div>
  <hr>
    <a href="../">Regresar</a>

  </body>
</html>