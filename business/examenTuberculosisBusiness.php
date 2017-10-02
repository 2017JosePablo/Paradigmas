<?php
	include '../data/examenTuberculosisData.php';

	class examenTuberculosisBusiness 
	{
		private $examen;
		function __construct()
		{
			$this->examen = new examenTuberculosisData();	
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