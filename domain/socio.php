<?php
class Socio{
	private $socioId;
	private $cedula;
	private $nombre;
	private $primerApellido;
	private $segundoApellido;
	private $telMovil;
	private $correo;
	private $tipoActividadId;
	private $fincatipoId;
	private $fechaIngreso;
	private $estadosociodetalle;



	function Socio($socioId,$cedula,$nombre,$primerApellido,$segundoApellido,$telMovil,$correo,$fechaIngreso,$tipoActividadId,$fincatipoId,$estadosociodetalle){


		$this->socioId = $socioId;
		$this->cedula = $cedula;
		$this->nombre = $nombre;
		$this->primerApellido =  $primerApellido;
		$this->segundoApellido = $segundoApellido;
		$this->telMovil = $telMovil;
		$this->correo = $correo;
		$this->tipoActividadId = $tipoActividadId;
		$this->fincatipoId = $fincatipoId;
		$this->fechaIngreso = $fechaIngreso;
		$this->estadosociodetalle = $estadosociodetalle;
	}
	public function setSocioId($socioId){
		$this->socioId = $socioId;
	}

	public function getSocioId(){
		return $this->socioId;
	}

	public function setTipoActividadId($tipoActividadId){
		$this->tipoActividadId = $tipoActividadId;
	}

	public function getTipoActividadId(){
		return $this->tipoActividadId;
	}

	public function setFincaTipo($fincatipoid){
		$this->fincatipoId = $fincatipoid;
	}

	public function getFincaTipo(){
		return $this->fincatipoId;
	}

	public function setEstadoSocioDetalle($estadosociodetalle){
		$this->estadosociodetalle = $estadosociodetalle;
	}

	public function getEstadoSocioDetalle(){
		return $this->estadosociodetalle;
	}

	public function setTipoActividad($tipoActividad){
		$this->tipoActividadId = $tipoActividad;
	}

	public function getTipoActividad(){
		return $this->tipoActividadId;
	}

	public function setFechaIngreso($fechaIngreso){
		$this->fechaIngreso = $fechaIngreso;
	}

	public function getFechaIngreso(){
		return $this->fechaIngreso;
	}



	public function setTipoFinca($tipoFinca){
		$this->fincatipoId = $tipoFinca;
	}

	public function getTipoFinca(){
		return $this->fincatipoId;
	}

	public function setDetalle($detalle){
		$this->detalle = $detalle;
	}

	public function getDetalle(){
		return $this->detalle;
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
}

?>
