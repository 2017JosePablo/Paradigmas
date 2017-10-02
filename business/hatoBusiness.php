<?php
	require_once '../data/hatoData.php';	
	class hatoBusiness 
	{
		private $hato;

		function hatoBusiness()
		{
			$this->hato = new hatoData();

		}

		public function insertarTBHato($hato)
		{
			return $this->hato->insertarTBHato($hato);
		}

		public function actualizarTBHato($hato)
		{
			return $this->hato->actualizarTBHato($hato);
		}

		public function eliminarTBHato($hato)
		{
			return $this->hato->eliminarTBHato($hato);
		}

		public function obtenerTodosTBHato()
		{
			return $this->hato->obtenerTodosTBHato();
		}

		public function obtenerSocioHato($socioid){
			return $this->hato->obtenerSocioHato($socioid);
		}
	}

?>