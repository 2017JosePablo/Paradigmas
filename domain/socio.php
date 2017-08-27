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



	function Socio($socioId,$cedula,$nombre,$primerApellido,$segundoApellido,$phone,$correo,$tipoActividadId,$fincatipoId,$fechaIngreso,$estadosociodetalle){
		$this->socioId = $socioId;
		$this->cedula = $id;
		$this->nombre = $nombre;
		$this->primerApellido =  $primerApellido;
		$this->segundoApellido = $segundoApellido;
		$this->telMovil = $phone;
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
		$this->fincatipoid = $fincatipoid;
	}

	public function getFincaTipo(){
		return $this->fincatipoid;
	}

	public function setEstadoSocioDetalle($estadosociodetalle){
		$this->estadosociodetalle = $estadosociodetalle;
	}

	public function getEstadoSocioDetalle(){
		return $this->estadosociodetalle;
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
	public function setCorreo($correo){
		$this->correo = $correo;
	}
	public function getCorreo(){
		return $this->correo;
	}
	public function setFechaIngreso($fechaIngreso){
		$this->fechaIngreso = $fechaIngreso;
	}
	public function getFechaIngreso(){
		return $this->fechaIngreso;
	}

}

?>
