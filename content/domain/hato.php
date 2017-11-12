<?php
class Hato{
	private $propietarioid;
	private $listarazas;
	private $terneros;
	private $terneras;
	private $novillos;
	private $novillas;
	private $novillasprenadas;
	private $torosServicio;
	private $torosEngorde;
	private $vacasCria;
	private $vacasEngorde;

	function Hato($propietarioid,$listarazas,$terneros,$terneras,$novillos,$novillas,$novillasprenadas,$torosServicio,$torosEngorde,$vacasCria,$vacasEngorde){
		$this->propietarioid = $propietarioid;
		$this->listarazas = $listarazas;
		$this->terneros = $terneros;
		$this->terneras =  $terneras;
		$this->novillos = $novillos;
		$this->novillas = $novillas;
		$this->novillasprenadas = $novillasprenadas;
		$this->torosServicio =  $torosServicio;
		$this->vacasCria =$vacasCria;
		$this->torosEngorde =  $torosEngorde;
		$this->vacasEngorde =$vacasEngorde;
	}

	public function setPropietario($id){
		$this->propietarioid = $id;
	}

	public function getPropietario(){
		return $this->propietarioid;
	}

	public function setListadoRazas($listarazas){
		$this->listarazas = $listarazas;
	}
	public function getListadoRazas(){
		return $this->listarazas;
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
	public function setTorosServicio($torosServicio){
		$this->torosServicio = $torosServicio;
	}
	public function getTorosServicio(){
		return $this->torosServicio;
	}
	public function setvacasCria($vacasCria){
		$this->vacasCria = $vacasCria;
	}
	public function getvacasCria(){
		return $this->vacasCria;
	}
	public function setTorosEngorde($torosEngorde){
		$this->torosEngorde = $torosEngorde;
	}
	public function getTorosEngorde(){
		return $this->torosEngorde;
	}
	public function setvacasEngorde($vacasEngorde){
		$this->vacasEngorde = $vacasEngorde;
	}
	public function getvacasEngorde(){
		return $this->vacasEngorde;
	}
}

?>