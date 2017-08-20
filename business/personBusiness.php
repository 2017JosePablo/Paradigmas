<?php
	include '../data/personData.php';

	class personBusiness 
	{
		private $person;
		

		function personBusiness()
		{
			$this->person = new personData();

		}

		public function insertTBPerson($personTemp)
		{
			return $this->person->insertTBPerson($personTemp);
		}

		public function updateTBPerson($personTemp)
		{
			return $this->person->updateTBPerson($personTemp);
		}

		public function deleteTBPerson($personTemp)
		{
			return $this->person->deleteTBPerson($personTemp);
		}

		public function getAllTBPerson()
		{
			return $this->person->getAllTBPerson();
		}

	}

?>