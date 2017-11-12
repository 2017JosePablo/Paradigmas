<?php
  session_start();

  if (isset($_SESSION["usuario"]) && isset($_SESSION["rol"])){
    if ($_SESSION['rol'] == "admi") {
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Recuperar Clave</title>
    <link rel="stylesheet" href="../../css/style.css">

  </head>
  <body>

  <div id="cuerpo">

  <h1>Gestíon de recuperacion de clave</h1>


  <div style="overflow-x:auto;">
    <?php
    include '../business/loginBusiness.php';

    $socioBusiness = new loginBusiness();
    $socios = $socioBusiness->optenerTodasContrasenas();

    echo '<table><tr class="cabeceraTabla" > <td>Nombre</td><td>Primer Apellido</td><td>Segundo Apellido</td> <td>Correo</td><td>Clave</td> </tr>';

    foreach ($socios as $current) {
        echo '<tr>';
        echo '<td> '.$current->getNombre().'</td>';
        echo '<td> '.$current->getPrimerApellido() .' </td>';
        echo '<td> '.$current->getSegundoApellido().' </td>';
        echo '<td> <input type="text" value="'.$current->getCorreo().'"  id="" readonly>  </td>';
        echo '<td> <input type="text" value="'.$current->getContrasena().'"  id="" readonly>  </td>';
        echo '</tr>';

    }
    echo '</table>';

    ?>
  </div>


    <a href="../index.php"><input type="button" name="" value="Regresar"></a>

    </div>
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
