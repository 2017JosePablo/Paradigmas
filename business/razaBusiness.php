<?php

	include '../data/razaData.php';
	/**
	* 
	*/
	class razaBusiness
	{
		private $dataRaza;

		public function razaBusiness()
		{
			$this->dataRaza = new razaData();
		}


		public function insertarTBRaza($Raza)
		{
			return $this->dataRaza ->insertarTBRaza($Raza);
		}

		public function modificarTBRaza($Raza)
		{
			return $this->dataRaza ->modificarRaza($Raza);
		}

		public function eliminarTBRaza($Raza)
		{
			return $this->dataRaza ->eliminarTBRaza($Raza);
		}

		public function obtenerTodoTBRaza()
		{
			return $this->dataRaza ->obtenerTodoTBRaza();
		}

		public function obtenerUnTBRaza($idraza)
		{
			return $this->dataRaza->obtenerUnTBRaza($idraza);
		}


	}


?>

