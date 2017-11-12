<?php
class Aviso{
	private $idAviso;
	private $socioId;
	private $tema;
	private $detalle;
	private $rutaFoto;
	private $fechaAviso;

	function Aviso($idAviso,$socioId, $tema,$detalle,$rutaFoto,$fechaAviso){
		$this->idAviso=$idAviso;
		$this->socioId=$socioId;
		$this->tema=$tema;
		$this->detalle=$detalle;
		$this->rutaFoto=$rutaFoto;
		$this->fechaAviso=$fechaAviso;
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
	public function setFechaAviso($fechaAviso){
		$this->fechaAviso=$fechaAviso;
	}

	public function getFechaAviso(){
		return $this->fechaAviso;
	}



}


  ?>
