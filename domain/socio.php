<?php
class Socio{
	private $cedula;
	private $nombre;
	private $primerApellido;
	private $segundoApellido;
	private $telMovil;
	private $correo;
	private $fechaIngreso;
	private $tipoActividad;
	private $tipoFinca;
	private $detalle;


	function Socio($cedula,$nombre,$primerApellido,$segundoApellido,$phone,$correo,$fechaIngreso,$tipoActividad,$tipoFinca,$detalle){
		$this->cedula = $id;
		$this->nombre = $nombre;
		$this->primerApellido =  $primerApellido;
		$this->segundoApellido = $segundoApellido;
		$this->telMovil = $phone;
		$this->correo = $correo;
		$this->fechaIngreso = $fechaIngreso;
		$this->tipoActividad = $tipoActividad;
		$this->tipoFinca = $tipoFinca;
		$this->detalle = $detalle;
	}

	public function setTipoActividad($tipoActividad){
		$this->tipoActividad = $tipoActividad;
	}

	public function getTipoActividad(){
		return $this->tipoActividad;
	}


	public function setTipoFinca($tipoFinca){
		$this->tipoFinca = $tipoFinca;
	}

	public function getTipoFinca((){
		return $this->tipoFinca;
	}

	public function setDetalle($detalle){
		$this->detalle = $detalle;
	}

	public function getDetalle((){
		return $this->detalle;
	}



	public function setCedula($cedula){
		$this->cedula = $cedula;
	}

	public function getCedula(){
		return $this->cedula;
	

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
	public function setCorreo($correo){
		$this->correo = $correo;
	}
	public function getCorreo(){
		return $this->correo;
	}
	public function setFechaIngreso($fechaIngreso){
		$this->fechaIngreso = $fechaIngreso;
	}

}

?>
