<?php
	include '../data/fincaCercaData.php';


	class fincaCercaBusiness
	{
		private $fincaCerca;

		function fincaCercaBusiness()
		{
			$this->fincaCerca = new fincaCercaData();

		}
		public function getTipoCerca()
		{
			return $this->fincaCerca->getTipoCerca();
		}

		function socioTipoCerca(){
			return $this->fincaCerca->socioTipoCerca();
		}
	}

?>
