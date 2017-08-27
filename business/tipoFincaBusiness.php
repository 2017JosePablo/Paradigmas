<?php
  require '../data/tipoFincaData.php';
	class tipoFincaBusiness
	{
		private  $tipoFincaData;

		function tipoFincaBusiness()
		{	

		}

		public function getAllTBTiposFincas()
		{
			return $this->tipoFincaData->getAllTBTiposFincas();
		}


	}



?>