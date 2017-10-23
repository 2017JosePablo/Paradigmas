<?php

if (isset($_POST['cancelarAprobacion'])) {
  $motivo = $_POST['motivoRechazo'];
  $socioid = $_POST['socioid'];
  $estado = "rechazado";

  $sesion = "Sin definir";
  $fecha = $_POST['fechaAprovacion'];

  if(isset($motivo) && !empty($motivo)){
    include_once './aprovacionBusiness.php';
    $aprovacion = new AprovacionBusiness();

    require_once '../domain/actaAprobacion.php';
    $acta = new actaAprobacion('',$socioid,$sesion,$fecha,'Rechazado',$motivo);
    $resultado = $aprovacion->actualizarActa($acta);
    if ($resultado ==1) {
      header ('location: ../index.php?success=insertedAprovation');
    }else{
      header ('location: ../view/aprovacionSocioView.php?error=errortoinserted');
    }
  }
  }elseif (isset($_POST['enviarAprobacion'])) {
    $socioid = $_POST['socioid'];
    $sesion = "Sin definir";
    $fecha = $_POST['fechaAprovacion'];
      if(isset($sesion) && !empty($sesion)){
        include_once './aprovacionBusiness.php';
        include '../domain/actaAprobacion.php';
        $aprovacion = new AprovacionBusiness();
        $acta = new actaAprobacion('',$socioid,$sesion,$fecha,'Aceptado','Solicitud Aceptada.');
        $resultado = $aprovacion->actualizarActa($acta);

        if ($resultado ==1) {
          header ('location: ../index.php?success=insertedAprovation');
        }else{
          header ('location: ../view/aprovacionSocioView.php?error=errortoinserted');
        }
      }
}
?>
