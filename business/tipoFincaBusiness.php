<?php
		
	class tipoFincaBusiness
	{
		require '../data/fincaTipoData.php';
		private  $tipoFinca;
		function tipoFincaBusiness()
		{
			$tipoFinca = new fincaTipoData();

		}

		public function obtenerTodosTBTipos()
		{
			return $this->tipoFinca->obtenerTodosTBTipos();
		}


	}



?>