<?php
class Persona{
	private $id;
	private $nombre;
	private $primerApellido;
	private $segundoApellido;
	private $telCasa;
	private $telMovil;


	function Persona($id,$nombre,$primerApellido,$segundoApellido,$telCasa,$phone){
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

	public function setnombre($nombre){
		$this->nombre = $nombre;
	}

	public function getnombre(){
		return $this->nombre;
	}

	public function setprimerApellido($primerApellido){
		$this->primerApellido = $primerApellido;
	}

	public function getprimerApellido(){
		return $this->primerApellido;
	}

	public function setsegundoApellido($segundoApellido){
		$this->segundoApellido = $segundoApellido;
	}

	public function getsegundoApellido(){
		return $this->segundoApellido;
	}

	public function settelCasa($telCasa){
		$this->telCasa = $telCasa;
	}

	public function gettelCasa(){
		return $this->telCasa;
	}

	public function settelMovil($telMovil){
		$this->telMovil = $telMovil;
	}

	public function gettelMovil(){
		return $this->telMovil;
	}

}

?>
