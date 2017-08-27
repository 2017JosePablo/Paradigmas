<?php
	include '../data/tipoFincaData.php';
	class tipoFincaBusiness
	{
		private  $tipoFincaData;

		function tipoFincaBusiness()
		{	
		
			$tipoFincaData = new tipoFincaData();

		}

		public function getAllTBTiposFincas()
		{
			return $this->tipoFincaData->getAllTBTiposFincas();
		}


	}



?>