
<?php

	include '../data/hatoActividadData.php';

	
	class hatoActividadBusiness 
	{
		private $hatoActividadBusiness;
		

		function hatoActividadBusiness()
		{
			$this->hatoActividadBusiness = new hatoActividadData();

		}

		public function insertarTBHatoActividad($idpersona, $tipoactividad)
		{
			return $this->hatoActividadBusiness->insertarTBHatoActividad($idpersona,$tipoactividad);
		}


	}

?>