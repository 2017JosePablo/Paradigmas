<?php
	include '../data/herdData.php';

	
	class herdBusiness 
	{
		private $herd;
		

		function herdBusiness()
		{
			$this->herd = new herdData();

		}

		public function insertTBHerd($herd)
		{
			return $this->herd->insertTBHerd($herd);
		}

		public function updateTBHerd($herd)
		{
			return $this->herd->updateTBHerd($herd);
		}

		public function deleteTBHerd($herd)
		{
			return $this->herd->deleteTBHerd($herd);
		}

		public function getAllTBHerd($herd)
		{
			return $this->herd->getAllTBHerd($herd);
		}

	}

?>