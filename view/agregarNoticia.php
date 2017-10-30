<?php
  session_start();
    if (!isset($_SESSION["usuario"])) {
        header("Location: loginView.php?error=needlogin");
    }
//    echo $_SESSION["usuario"];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Agregar Noticia</title>
    <link rel="stylesheet" href="../css/diseno.css">
  </head>
  <body>
    <h1>Agregando un nuevo anuncio.</h1>
    <form class="" action="../business/agregarNoticiaAction.php" method="post" enctype="multipart/form-data">
      <label for="">Tema</label>
      <br>
      <input type="text" name="temaAnuncio" value="" placeholder="¿De que se trata el aviso?" required>
      <br><br>
      <label for="">Detalles</label>
      <br>
      <textarea name="detalleAnuncio" rows="8" cols="80" placeholder="¡Ingrese una detallada descripcion del Aviso!" required></textarea>
      <br><br>

      <label for="">Foto</label>
      <br>
      <input type="file" name="imagen" value="" placeholder="Seleccione una foto" required>
      <br><br>
      <input type="submit" name="registrarAviso" value="Guardar Datos">
      <hr>
      <a href="../">Regresar</a>
    </form>

  </body>
</html>
