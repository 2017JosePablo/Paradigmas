<?php
class SocioDireccion{

	private $Provincia;
	private $Canton;
	private $Distrito;
	private $Pueblo;
	private $idSocioDir;

	function SocioDireccion($idSocioDir,$Provincia,$Canton,$Distrito,$Pueblo){

		$this->idSocioDir = $idSocioDir;
		$this->Provincia = $Provincia;
		$this->Canton = $Canton;
		$this->Distrito = $Distrito;
		$this->Pueblo = $Pueblo;
	}
	public function setIdSocioDir($idSocioDir){
		$this->idSocioDir = $idSocioDir;
	}
	public function getIdSocioDir(){
		return $this->idSocioDir;
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