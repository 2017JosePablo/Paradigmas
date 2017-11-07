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
    require_once 'socioBusiness.php';
    $socioid = $_POST['socioid'];

    $socioBusiness = new socioBusiness();
    $cedulaSocio = $socioBusiness->obtenerCedulaSocio($socioid);


    $sesion = "Sin definir";
    $fecha = $_POST['fechaAprovacion'];
      if(isset($sesion) && !empty($sesion)){
        include_once './aprovacionBusiness.php';
        include '../domain/actaAprobacion.php';

        $aprovacion = new AprovacionBusiness();
        $acta = new actaAprobacion('',$socioid,$sesion,$fecha,'Aceptado','Solicitud Aceptada.');
        $resultado = $aprovacion->actualizarActa($acta);

        $resultadoEditarEstado = $socioBusiness->editarEstado($cedulaSocio,'2');
        echo "Cedula->".$cedulaSocio."<br>";
        echo "->".$resultadoEditarEstado;

        if ($resultadoEditarEstado == 1) {
          header ('location: ../index.php?success=insertedAprovation');
        }else{
          if($resultadoEditarEstado != 1){
            header ('location: ../view/aprovacionSocioView.php?error=updateEstado');
          }else{
            if($resultado != 1 ){
              header ('location: ../view/aprovacionSocioView.php?error=errortoinserted');
            }
          }

        }
      }
}
?>
