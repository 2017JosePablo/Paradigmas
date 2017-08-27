<?php

	private $socioestadoid;
	private $socioestadodetalle;


	public function socioEstado($idestado,$detalle){
		$this->socioestadoid = $idestado;
		$this->socioestadodetalle = $socioestadodetalle;
	}

	public function getSocioEstadoId()
	{
		return $this->socioestadoid;
	}

	public function setSocioEstadoId($socioestadoid)
	{
		$this->socioestadoid = $socioestadoid;
	}
		
	public function setSocioEstadoDetalles($socioestadodetalle)
	{
		$this->socioestadodetalle = $socioestadodetalle;
	}


?>