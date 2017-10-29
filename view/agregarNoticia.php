<?php
  $socio = 1;

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
    <form class="" action="" method="post">
      <label for="">Tema</label>
      <br>
      <input type="text" name="temaAnuncio" value="" placeholder="¿De que se trata el aviso?">
      <br><br>
      <label for="">Detalles</label>
      <br>
      <textarea name="detalleAnuncio" rows="8" cols="80" placeholder="¡Ingrese una detallada descripcion del Aviso!"></textarea>
      <br><br>
      <hr>
      <input type="submit" name="registrarAviso" value="Guardar Datos">
      <a href="../">Regresar</a>
    </form>

  </body>
</html>
