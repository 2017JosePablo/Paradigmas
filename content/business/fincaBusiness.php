<?php
	require_once '../data/fincaData.php';

	class fincaBusiness
	{
		private $fincaData;
		function __construct()
		{
			$this->fincaData = new fincaData();
		}


		public function insertarFinca($finca)
		{
			return $this->fincaData->insertarFinca($finca);
		}

		public function insertarTBFincaDireccion($fincadireccion)
		{
			return $this->fincaData->insertarTBFincaDireccion($fincadireccion);
		}
		public function obtenerDatosFincaVer($fincadireccion)
		{
			return $this->fincaData->obtenerDatosFincaVer($fincadireccion);
		}





		public function obtenerTodosTBfinca()
		{
			return $this->fincaData ->obtenerTodosTBfinca();
		}

		public function obtenerFinca($id)
		{
			return $this->fincaData ->obtenerFinca(id);
		}

		public function actualizarTBfinca($finca)
		{
			return $this->fincaData ->actualizarTBfinca($finca);
		}

		public function actualizarTBfincaDireccion($fincadireccion)
		{
			return $this->fincaData ->actualizarTBFincaDireccion($fincadireccion);
		}

		public function actualizarTipoFinca($idsocio,$tipo){
			return $this->fincaData->actualizarTipoFinca($idsocio,$tipo);
		}


	}

?>
