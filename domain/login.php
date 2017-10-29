<?php
class Login{
private $idLogin;
private $socioId;
private $usiario;
private $contrasena:
private $rol;


function Login($idLogin,$socioId,$usiario,$contrasena,$rol){
	$this->idLogin=$idLogin;
	$this->socioId=$socioId;
	$this->usiario=$usiario;
	$this->contrasena=$contrasena;
	$this->rol=$rol;
}
public function setIdLogin($idLogin){
	$this->idLogin=$idLogin;
}
public function getIdLogin(){
	return $this->idLogin;
}

public function setSocioId($socioId){
	$this->socioId=$socioId;
}
public function getSocioId(){
	return $this->socioId;
}
public function setUsuario($usuario){
	$this->usiario=$usiario;
}
public function getUsuario(){
	return $this->usiario;
}

public function setContrasena($contrasena){
	$this->contrasela=$Contrasena;
}
public function getContrasena(){
	return $this->contrasena;
}

public function setRol($rol){
	$this->rol=$rol;
}
public function getRol(){
	return $this->rol;
}





}

?>
