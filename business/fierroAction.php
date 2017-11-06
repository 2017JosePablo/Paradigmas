<?php
if (isset($_POST['fierro'])) {
  require 'fierroBusiness.php';
  $fierroBusiness = new FierroBusiness();

  require_once 'socioBusiness.php';
  $socioBusiness = new socioBusiness();

  $idSocio = $socioBusiness->getSocioId($_POST['fierro']);
  echo $fierroBusiness->obtenerFierroSocio($idSocio);
}


 ?>
