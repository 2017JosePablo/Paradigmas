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
		





	}






?>