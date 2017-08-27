

<?php
	include '../data/actividadData.php';
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

		public function insertarActividad($actividad)
		{
			return $this->insertarActividad($actividad);
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