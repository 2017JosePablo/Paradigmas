<?php
		
	class tipoFincaBusiness
	{
		require '../data/tipoFincaData.php';
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