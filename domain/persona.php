<?php
class Persona{
	private $cedula;
	private $nombre;
	private $primerApellido;
	private $segundoApellido;
	private $telCasa;
	private $telMovil;


	function Persona($cedula,$nombre,$primerApellido,$segundoApellido,$telCasa,$phone){
		$this->cedula = $id;
		$this->nombre = $nombre;
		$this->primerApellido =  $primerApellido;
		$this->segundoApellido = $segundoApellido;
		$this->telCasa = $telCasa;
		$this->telMovil = $telMovil;
		
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

	public function setTelCasa($telCasa){
		$this->telCasa = $telCasa;
	}

	public function getTelCasa(){
		return $this->telCasa;
	}

	public function setTelMovil($telMovil){
		$this->telMovil = $telMovil;
	}

	public function getTelMovil(){
		return $this->telMovil;
	}

}

?>
