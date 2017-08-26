<?php
class Hato{
	private $propietarioid;
	private $terneros;
	private $terneras;
	private $novillos;
	private $novillas;
	private $novillasprenadas;
	private $toros;
	private $vacas;

	function Hato($propietarioid,$terneros,$terneras,$novillos,$novillas,$novillasprenadas,$toros,$vacas){
		$this->propietarioid = $propietarioid;
		$this->terneros = $terneros;
		$this->terneras =  $terneras;
		$this->novillos = $novillos;
		$this->novillas = $novillas;
		$this->novillasprenadas = $novillasprenadas;
		$this->toros =  $toros;
		$this->vacas =$vacas;
	}

	public function setPropietario($id){
		$this->propietarioid = $id;
	}

	public function getPropietario(){
		return $this->propietarioid;
	}
	public function setTerneros($terneros){
		$this->terneros = $terneros;
	}
	public function getTerneros(){
		return $this->terneros;
	}
	public function setTerneras($terneras){
		$this->terneras = $terneras;
	}
	public function getTerneras(){
		return $this->terneras;
	}
	public function setNovillos($novillos){
		$this->novillos = $novillos;
	}
	public function getNovillos(){
		return $this->novillos;
	}
	public function setNovillas($novillas){
		$this->novillas = $novillas;
	}
	public function getNovillas(){
		return $this->novillas;
	}
	public function setNovillasPrenadas($novillasprenadas){
		$this->novillasprenadas = $novillasprenadas;
	}
	public function getNovillasPrenadas(){
		return $this->novillasprenadas;
	}
	public function setToros($toros){
		$this->toros = $toros;
	}
	public function getToros(){
		return $this->toros;
	}
	public function setVacas($vacas){
		$this->vacas = $vacas;
	}
	public function getVacas(){
		return $this->vacas;
	}
}

?>