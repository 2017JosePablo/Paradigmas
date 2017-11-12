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
	private $recomentacion1;
	private $recomentacion2;
	private $responasble;
	private $beneficiario;


	function Socio($socioId,$cedula,$nombre,$primerApellido,$segundoApellido,$telMovil,$correo,$fechaIngreso,$tipoActividadId,$fincatipoId,$estadosociodetalle,$recomentacion1,$recomentacion2,$responsable,$beneficiario){


		$this->socioId = $socioId;
		$this->cedula = $cedula;
		$this->nombre = $nombre;
		$this->primerApellido =  $primerApellido;
		$this->segundoApellido = $segundoApellido;
		$this->telMovil = $telMovil;
		$this->recomentacion1=$recomentacion1;
		$this->recomentacion2=$recomentacion2;
		$this->responsable=$responsable;
		$this->beneficiario=$beneficiario;


		$this->correo = $correo;
		$this->tipoActividadId = $tipoActividadId;
		$this->fincatipoId = $fincatipoId;
		$this->fechaIngreso = $fechaIngreso;
		$this->estadosociodetalle = $estadosociodetalle;
	}

	public function setRecomendacion1($recomentacion1){
				$this->recomentacion1=$recomentacion1;
	}
	public function getRecomendacion1(){
		return $this->recomentacion1;
	}
	public function setRecomendacion2($recomentacion2){
				$this->recomentacion2=$recomentacion2;
	}
	public function getRecomendacion2(){
		return $this->recomentacion2;
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
	public function setResponsable($responsable){
		$this->responsable = $responsable;
	}
	public function getResponsable(){
		return $this->responsable;
	}

	public function setBeneficiario($beneficiario){
		$this->beneficiario = $beneficiario;
	}
	public function getBeneficiario(){
		return $this->beneficiario;
	}	

}

?>
