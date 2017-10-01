<?php
class TodoFinca{

	private $cedula;
	private $nombre;
	private $primerApellido;
	private $segundoApellido;
	private $area;
	private $cantidadBovinos;
	private $fincacerca;
	private $fincaTipo;
	private $tipoActividadId;

	function TodoFinca($cedula,$nombre,$primerApellido,$segundoApellido,$area,$cantidadBovinos,$fincacerca,$fincaTipo,$fincatipoId){
		$this->cedula = $cedula;
		$this->nombre = $nombre;
		$this->primerApellido =  $primerApellido;
		$this->segundoApellido = $segundoApellido;
		$this->area = $area;
		$this->fincaTipo = $fincaTipo;
		$this->cantidadBovinos = $cantidadBovinos;
		$this->fincacerca = $fincacerca;
		$this->tipoActividadId = $fincatipoId;
	}
	public function setFincaTipo($finca){
		$this->fincaTipo = $finca;
	}
	public function getFincaTipo(){
		return $this->fincaTipo;
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

	public function setTipoActividad($tipoActividadId){
		$this->tipoActividadId = $tipoActividadId;
	}

	public function getTipoActividad(){
		return $this->tipoActividadId;
	}
	public function setArea($area){
		$this->area = $area;
	}
	public function setCantidadBovinos($cantidadBovinos){
		$this->cantidadBovinos = $cantidadBovinos;
	}
	public function getArea(){
		return $this->area;
	}

	public function setCerca($cerca){
		$this->fincacerca = $cerca;
	}
	public function getCerca(){
		return $this->fincacerca;
	}
	public function getCantidadBovinos(){
		return $this->cantidadBovinos;
	}
}

?>

