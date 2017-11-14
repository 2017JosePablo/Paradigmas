<?php

include 'pastoCorteBusiness.php';
$pastoCorteBusiness = new PastoCorteBusiness();

require_once '../domain/pastoCorte.php';

if (isset($_POST['crearCorte'])) {

  $nombreCorte = $_POST['corteNombre'];
  echo "NOmbre ".$nombreCorte;
  $pastoCorte = new PastoCorte('',$nombreCorte);
  $result = $pastoCorteBusiness->insertarPastoCorte($pastoCorte);
  if ($result == 1) {
    header("location: ../../index.php?sucess=insertedCorte");
  }else{
    header("location: ../../index.php?error=insertedCorte");
  }
}
if (isset($_POST['editarCorte'])) {

  $nombreCorte = $_POST['nombreCorte'];
  $idCorte = $_POST['idCorte'];

  $postoCorte = new PastoCorte($idCorte,$nombreCorte);
  $result = $pastoCorteBusiness->modificarPastoCorte($postoCorte);
  if ($result == 1) {
    header("location: ../../index.php?sucess=updatedCorte");
  }else{
      header("location: ../../index.php?error=updatedCorte");
  }
}
 ?>
