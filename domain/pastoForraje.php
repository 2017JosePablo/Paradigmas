<?php
class PastoForraje{

	private $id;
	private $nombre;
	function PastoForraje($id,$nombre){
		$this->id=$id;
		$this->nombre=$nombre;
	}

	public function setId($id){
		$this->id=$id;
	}
	public function getId(){
		return $this->id;
	}

	public function setNombre($nombre){
		$this->nombre=$nombre;
	}
	public function getNombre(){
		return $this->nombre;
	}

}
?>