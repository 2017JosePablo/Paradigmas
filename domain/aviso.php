<?php
class Aviso{
	private $idAviso;
	private $socioId;
	private $tema; 	
	private $detalle;
	private $rutaFoto;

	function Aviso($idAviso,$socioId, $tema,$detalle,$rutaFoto){
		$this->idAviso=$idAviso;
		$this->socioId=$socioId;
		$this->tema=$tema;
		$this->detalle=$detalle;
		$this->rutaFoto=$rutaFoto;
	}

	public function setIdAviso($idAviso){
		$this->idAviso=$idAviso;
	}

	public function getIdAviso(){
		return $this->idAviso;
	}

	public function setSocioId($socioId){
		$this->socioId=$socioId;
	}

	public function getSocioId(){
		return $this->socioId;
	}

	public function setTema($tema){
		$this->tema=$tema;
	}

	public function getTema(){
		return $this->tema;
	}

	public function setDetalle($detalle){
		$this->detalle=$detalle;
	}

	public function getDetalle(){
		return $this->detalle;
	}

	public function setRutaFoto($rutaFoto){
		$this->rutaFoto=$rutaFoto;
	}

	public function getRutaFoto(){
		return $this->rutaFoto;
	}



}


  ?>