<?php



	class fincaCercaBusiness
	{
		private $fincaCerca;

		function fincaCercaBusiness()
		{
			require '../data/fincaCercaData.php';
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
