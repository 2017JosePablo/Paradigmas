<?php
class FincaDireccion{
	private $socioid;

	private $provincia;
	private $canton;
	private $distrito;
	private $pueblo;
	private $dirExacta;

	function FincaDireccion($socioid,$Provincia,$Canton,$Distrito,$Pueblo,$dirExacta){
		$this->socioid = $socioid;
		$this->provincia = $Provincia;
		$this->canton = $Canton;
		$this->distrito = $Distrito;
		$this->pueblo = $Pueblo;
		$this->dirExacta = $dirExacta;
	}
	public function setSocioId($socioid){
		$this->socioid=$socioid;
	}
	public function getSocioId(){
		return $this->socioid;
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
	public function setDireccionExacta($dir){
		$this->dirExacta = $dir;
	}
	public function getDireccionExacta(){
		return $this->dirExacta;
	}
}
?>