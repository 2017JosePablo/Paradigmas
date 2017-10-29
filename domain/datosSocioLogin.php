<?php
class DatosSocioLogin{
	private $socioId;
	private $cedula;
	private $nombre;
	private $primerApellido;
	private $segundoApellido;
	private $telMovil;
	private $correo;
	private $contrasena;

	function DatosSocioLogin($socioId,$cedula,$nombre,$primerApellido,$segundoApellido,$telMovil,$correo,$contrasena){


		$this->socioId = $socioId;
		$this->cedula = $cedula;
		$this->nombre = $nombre;
		$this->primerApellido =  $primerApellido;
		$this->segundoApellido = $segundoApellido;
		$this->telMovil = $telMovil;
		$this->correo = $correo;
		$this->contrasena = $contrasena;
	}



	public function setSocioId($socioId){
		$this->socioId = $socioId;
	}

	public function getSocioId(){
		return $this->socioId;
	}


	public function setCedula($cedula){
		$this->cedula = $cedula;
	}

	public function getCedula(){
		return $this->cedula;

	}
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setPrimerApellido($primerApellido){
		$this->primerApellido = $primerApellido;
	}

	public function getPrimerApellido(){
		return $this->primerApellido;
	}

	public function setSegundoApellido($segundoApellido){
		$this->segundoApellido = $segundoApellido;
	}

	public function getSegundoApellido(){
		return $this->segundoApellido;
	}



	public function setTelMovil($telMovil){
		$this->telMovil = $telMovil;
	}

	public function getTelMovil(){
		return $this->telMovil;
	}
	
	public function setCorreo($correo){
		$this->correo = $correo;
	}
	public function getCorreo(){
		return $this->correo;
	}


	public function setContrasena($contrasena){
		$this->contrasena = $contrasena;
	}

	public function getContrasena(){
		return $this->contrasena;
	}
}

?>
