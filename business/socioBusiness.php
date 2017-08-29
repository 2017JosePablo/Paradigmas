<?php

	include '../data/socioData.php';
	/**
	* 
	*/
	class socioBusiness
	{
		private $dataSocio;

		public function socioBusiness()
		{
			$this->dataSocio = new socioData();
		}


		public function insertarTBSocio($socio)
		{
			return $this->dataSocio ->insertarTBSocio($socio);
		}

		public function modificarTBSocio($socio)
		{
			return $this->dataSocio ->modificarSocio($socio);
		}

		public function eliminarTBSocio($socio)
		{
			return $this->dataSocio ->eliminarSocio($socio);
		}

		public function obtenerTodosTBSocio()
		{
			return $this->dataSocio ->obtenerTodosTBSocio();
		}

		public function insertarTBSocioDireccion($temp){
			return $this ->dataSocio->insertarTBSocioDireccion($temp);
		}

		public function obtenerSocioEstado(){
			return $this->dataSocio->obtenerSocioEstado();
		}

		public function getSocioId($cedula)
		{
			return $this->dataSocio->getSocioId($cedula);
		}


	}


?>

