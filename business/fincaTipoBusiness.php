<?php
	include '../data/fincaTipoData.php';
//	ini_set("memory_limit", '512M');
	/**
	* 
	*/
	class fincaTipoBusiness
	{
		private $fincaTipo;

		function fincaTipoBusiness()
		{
			$this->fincaTipo = new fincaTipoData();

		}

		public function insertarTBfincaTipo($fincaTipo)
		{
			return $this->fincaTipo->insertarTBfincaTipo($fincaTipo);
		}

		public function eliminarTBfincaTipo($fincaTipo)
		{
			return $this->fincaTipo->eliminarTBfincaTipo($fincaTipo);		
		}

		public function actualizarTBfincaTipo($fincaTipo)
		{
			return $this->fincaTipo->actualizarTBfincaTipo($fincaTipo);	
		}
		

		public function obtenerTodosTBfincaTipo()
		{
			return $this->fincaTipo->obtenerTodosTBfincaTipo();
		}
	}



?>