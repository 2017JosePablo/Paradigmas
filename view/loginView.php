<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inicio de seccion</title>
    <link rel="stylesheet" href="../css/diseno.css">

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

      <form class="" action="../business/loginAction.php" method="post">
          <table>
            <tr>
              <td align="right">
                  <label for="">Digite su correo</label>
              </td>
              <td>
                  <input type="text" name="correologin" value="" placeholder="Ingrese el correo">
              </td>
            </tr>

            <tr>
              <td align="right">
                <label for="">Digite su contrasena</label>
              </td>
              <td>
                  <input type="password" name="clavelogin" id="clavelogin" value="" placeholder="Ingrese el clave">
                  <a onclick="verClave()">Ver</a>
              </td>
            </tr>

            <tr>
              <td colspan="2" align="center">
                <input type="submit" name="accederlogin" value="Acceder">
              </td>
            </tr>
          </table>




      </form>

      </fieldset>
    <hr>
      <a href="../">Regresar</a>
  </body>
</html>
