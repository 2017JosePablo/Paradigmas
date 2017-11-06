<?php
class DatosSocioReportes{
	private $socioId;
	private $cedula;
	private $nombre;
	private $primerApellido;
	private $segundoApellido;
	private $telMovil;
	private $correo;
	private $provincia;
	private $canton;
	private $distrito;

	function DatosSocioReportes($socioId,$cedula,$nombre,$primerApellido,$segundoApellido,$telMovil,$correo,$provincia,$canton,$distrito){


		$this->socioId = $socioId;
		$this->cedula = $cedula;
		$this->nombre = $nombre;
		$this->primerApellido =  $primerApellido;
		$this->segundoApellido = $segundoApellido;
		$this->telMovil = $telMovil;
		$this->correo = $correo;
		$this->provincia = $provincia;
		$this->canton = $Canton;
		$this->distrito = $distrito;
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


	public function setProvincia($provincia){
		$this->provincia = $provincia;
	}

	public function getProvincia(){
		return $this->provincia;
	}
	public function setCanton($canton){
		$this->canton = $canton;
	}
	public function getCanton(){
		return $this->canton;
	}
	public function setDistrito($distrito){
		$this->distrito = $distrito;
	}
	public function getDistrito(){
		return $this->distrito;
	}
}

?>
