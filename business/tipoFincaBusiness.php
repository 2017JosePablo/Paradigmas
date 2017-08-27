<?php
	include '../data/tipoFincaData.php';	
	class tipoFincaBusiness
	{
	
		private  $tipoFinca;
		function tipoFincaBusiness()
		{
			$tipoFinca = new tipoFincaData();

		}

		public function obtenerTodosTBTipos()
		{
			return $this->tipoFinca->obtenerTodosTBTipos();
		}


	}



?>