
<?php

	include '../data/hatoActividadData.php';

	
	class hatoActividadBusiness 
	{
		private $hatoActividadBusiness;
		

		function hatoActividadBusiness()
		{
			$this->hatoActividadBusiness = new hatoActividadData();

		}

		public function insertTBhatoActividad($idpersona, $tipoactividad)
		{
			return $this->hatoActividadBusiness->insertTBhatoActividad($idpersona,$tipoactividad);
		}


	}

?>