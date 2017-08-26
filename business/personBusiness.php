<?php
	include '../data/personaData.php';

	class personaBusiness 
	{
		private $persona;
		

		function personaBusiness()
		{
			$this->persona = new personaData();

		}

		public function insertarTBpersona($personaTemp)
		{
			return $this->persona->insertarTBpersona($personaTemp);
		}

		public function actualizarTBpersona($personaTemp)
		{
			return $this->persona->actualizarTBpersona($personaTemp);
		}

		public function eliminarTBpersona($personaTemp)
		{
			return $this->persona->eliminarTBpersona($personaTemp);
		}

		public function obtenerTodosTBpersona()
		{
			return $this->persona->obtenerTodosTBpersona();
		}

	}

?>