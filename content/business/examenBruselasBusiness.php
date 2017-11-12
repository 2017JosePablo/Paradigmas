<?php
	include '../data/examenBruselasData.php';

	class examenBruselasBusiness 
	{
		private $examen;
		function __construct()
		{
			$this->examen = new examenBruselasData();	
		}

		public function insertarExamen($examen)
		{
			return $this->examen ->insertarExamen($examen);
		}
		
		public function obtenerExamenSocio($id)
		{
			return $this->examen ->obtenerExamenSocio($id);
		}

		public function modificarExamenSocio($examen)
		{
			return $this->examen ->modificarExamenSocio($examen);
		}

		public function eliminarExamenSocio($idsocio)
		{
			return $this->examen ->actualizarTBFincaDireccion($idsocio);
		}
	}
?>