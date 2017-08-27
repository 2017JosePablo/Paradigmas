<?php
class Persona{
	private $id;
	private $nombre;
	private $primerApellido;
	private $segundoApellido;
	private $telCasa;
	private $telMovil;


	function Persona($id,$nombre,$primerApellido,$segundoApellido,$telCasa,$telMovil){
		$this->id = $id;
		$this->nombre = $nombre;
		$this->primerApellido =  $primerApellido;
		$this->segundoApellido = $segundoApellido;
		$this->telCasa = $telCasa;
		$this->telMovil = $telMovil;
		
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
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
