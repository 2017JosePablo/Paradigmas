<?php

include '../data/loginData.php';
private loginData;
class loginBusiness{
  function loginBusiness(){
      $this->loginData = new loginData();
  }
  public function insertarTBLogin($login){
    return $this->loginData->insertarTBLogin($login);
  }
  public function validarLogin($user,$contrasena){
    return $this->loginData->validarLogin($user,$contrasena);
  }
  public function verificarLogin($user,$contrasena){
    return $this->loginData->verificarLogin($user,$contrasena);
  }
  public function actualizarContrasena($usuario,$contrasenaVieja,$contrasenaNueva){
    return $this->loginData->actualizarContrasena($usuario,$contrasenaVieja,$contrasenaNueva);
  }
  public function optenerTodasContrasenas(){
    return $this->loginData->optenerTodasContrasenas();
  }
}
?>
