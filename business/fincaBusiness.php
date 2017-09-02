<?php
	include '../data/fincaData.php';

	/**
	* 
	*/
	class fincaBusiness 
	{
		private $fincaData;
		function __construct()
		{
			$this->fincaData = new fincaData();	
		}


		public function insertarFinca($finca)
		{
			return $this->fincaData ->insertarFinca($finca);
		}
		
		public function insertarTBFincaDireccion($fincadireccion)
		{
			return $this->fincaData ->insertarTBFincaDireccion($fincadireccion);
		}
		

		public function obtenerTodosTBfinca()
		{
			return $this->fincaData ->obtenerTodosTBfinca();
		}

		public function actualizarTBfinca($finca,$idsocio)
		{
			return $this->fincaData ->actualizarTBfinca($finca);
		}

		public function actualizarTBfincaDireccion($fincadireccion,$idfinca)
		{
			return $this->fincaData ->actualizarTBfincaDireccion($fincadireccion);
		}



	}






?>