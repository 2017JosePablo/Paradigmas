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

		public function insertarTBSocioDireccion($provincia,$canton,$distrito, $pueblo){
			return $this ->dataSocio->insertarTBSocioDireccion($provincia,$canton,$distrito, $pueblo);
		}

		public function obtenerSocioEstado(){
			return $this->dataSocio->obtenerSocioEstado();
		}


	}


?>

