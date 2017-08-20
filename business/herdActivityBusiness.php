<?php

	include '../data/herdActivityData.php';

	
	class herdActivityBusiness 
	{
		private $herdActivityBusiness;
		

		function herdActivityBusiness()
		{
			$this->herdActivityBusiness = new herdActivityData();

		}

		public function insertTBHerdActivity($idperson, $activitytype)
		{
			return $this->herdActivityBusiness->insertTBHerdActivity($idperson,$activitytype);
		}


	}

?>