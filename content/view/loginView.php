
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inicio de seccion</title>
    <link rel="stylesheet" href="../../css/style.css">


      <script type="text/javascript">
        function verClave() {
          var clave = document.getElementById('clavelogin').value;
          alert(clave);
          return false;
        }



      </script>


  </head>
  <body>
    <fieldset >
      <h1>Inicio de Seccion </h1>

      <div id="cuerpo">
        <form class="" action="../business/loginAction.php" method="post">
          <table>
            <tr>
              <td>
                  <label for="">Digite su correo</label>
              </td>
              <td>
                  <input type="email" name="correologin" value="" placeholder="Ingrese el correo" required>
              </td>
            </tr>

            <tr>
              <td>
                <label for="">Digite su contrasena</label>
              </td>
              <td>
                  <input type="password" name="clavelogin" id="clavelogin" value="" placeholder="Ingrese el clave" required>
                  <a onclick="verClave()">Ver</a>
              </td>
            </tr>

          </table>
                <input type="submit" name="accederlogin" value="Acceder">

                <a href="../"><input type="button" value="Regresar">  </a>


      </form>

    </div>
      </fieldset>
    <hr>

      <?php
      	  include_once "../../footer.php";
       ?>
  </body>
</html>



<?php

    if(isset($_GET['error'])){
        if ($_GET['error'] == "needlogin") {
          echo "<script>alert('Inicie session para poder registrar una noticia.') </script>";
        }else{
          echo "<script>alert('El usuario o contraseña ingresada no son validos.') </script>";
        }
    }
 ?>
