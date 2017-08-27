<?php
class FincaDireccion{

	private $Provincia;
	private $Canton;
	private $Distrito;
	private $Pueblo;
	private $dirExacta;

	function Direccion($Provincia,$Canton,$Distrito,$Pueblo,$dirExacta){
		$this->Provincia = $Provincia;
		$this->Canton = $Canton;
		$this->Distrito = $Distrito;
		$this->Pueblo = $Pueblo;
		$this->dirExacta = $dirExacta;
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