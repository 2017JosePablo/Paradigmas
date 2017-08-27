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
			$this->dataSocio = new dataSocio();
		}


		public function insertarTBSocio($socio)
		{
			return $this->dataSocio ->insertarSocio($socio);
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



	}


?>

