<?php

require 'pastoForrajeBusiness.php';
$forrajeBusiness = new PastoForrajeBusiness();

require_once '../domain/pastoForraje.php';

if (isset($_POST['crearForraje'])) {

  $nombreForraje = $_POST['forrajeNombre'];
  $pastoForraje = new PastoForraje('',$nombreForraje);

  $result = $forrajeBusiness->insertarTBPastoForraje($pastoForraje);

  if($result == 1){
    header('location: ../../index.php?success=insertedForraje');
  }
}
if (isset($_POST['editarForraje'])) {
  $nombreForraje = $_POST['nombreForraje'];
  $idForraje = $_POST['idForraje'];
  $pastoForraje = new PastoForraje($idForraje,$nombreForraje);
  $result=$forrajeBusiness->modificarPastoForraje($pastoForraje);

  if($result == 1){
    header('location: ../../index.php?success=updatedForraje');
  }
}



 ?>
