<?php
	include '../data/hatoData.php';

	
	class hatoBusiness 
	{
		private $hato;
		

		function hatoBusiness()
		{
			$this->hato = new hatoData();

		}

		public function insertarTBHato($hato)
		{
			return $this->hato->insertTBHato($hato);
		}

		public function actualizarTBHato($hato)
		{
			return $this->hato->actualizarTBHato($hato);
		}

		public function eliminarTBHato($hato)
		{
			return $this->hato->eliminarTBHato($hato);
		}

		public function obtenerTodosTBHato($hato)
		{
			return $this->hato->obtenerTodosTBHato($hato);
		}

	}

?>