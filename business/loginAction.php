<?php
include 'loginBusiness.php';

if(isset($_POST['accederlogin'])){
  $usuario = $_POST['correologin'];
  $contrasena = $_POST['clavelogin'];
  if(isset($usuario) && !empty($usuario) && isset($usuario) && !empty($usuario) ){
    $loginBusiness = new loginBusiness();
    $result = $loginBusiness->validarLogin($usuario,$contrasena);

    if($result == 'true'){
      session_start();
      $usuarioJson = $loginBusiness->verificarLogin($usuario,$contrasena);
      $usuario = json_decode($usuarioJson, true);
      $_SESSION['usuario'] = $usuario['socioId'];
      header('location: ../index.php?success=bienvenido');
    }else{
      header('location: ../view/loginView.php?error=notExist');
    }
  }
}
?>
