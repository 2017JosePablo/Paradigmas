

<?php
	include '../data/actividadData.php';
	ini_set("memory_limit", '512M');
	/**
	* 
	*/
	class actividadBusiness
	{
		private $actividad;

		function actividadBusiness()
		{
			$this->actividad = new actividadData();

		}

		public function insertarTBActividad($actividad)
		{
			return $this->insertarTBActividad($actividad);
		}

		public function eliminarTBActividad($actividad)
		{
			return $this->actividad->eliminarTBActividad($actividad);		
		}

		public function actualizarTBActividad($actividad)
		{
			return $this->actividad->actualizarTBActividad($actividad);	
		}
		

		public function obtenerTodosTBActividad()
		{
			return $this->actividad->obtenerTodosTBActividad();
		}
	}



?>