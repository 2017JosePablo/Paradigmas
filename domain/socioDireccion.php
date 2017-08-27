<?php
class SocioDireccion{

	private $provincia;
	private $canton;
	private $distrito;
	private $pueblo;

	function SopioDireccion($Provincia,$Canton,$Distrito,$Pueblo){
		$this->provincia = $Provincia;
		$this->canton = $Canton;
		$this->distrito = $Distrito;
		$this->pueblo = $Pueblo;
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
	public function setPueblo($pueblo){
		$this->pueblo = $pueblo;
	}
	public function getPueblo(){
		return $this->pueblo;
	}
}
?>