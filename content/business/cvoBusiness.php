<?php
	include '../data/cvoData.php';

	class cvoBusiness 
	{
		private $cvo;
		function __construct()
		{
			$this->cvo = new cvoData();	
		}

		public function insertarCvo($cvo)
		{
			return $this->cvo ->insertarCvo($cvo);
		}
		
		public function obtenerCvoSocio($id)
		{
			return $this->cvo ->obtenerCvoSocio($id);
		}

		public function modificarCvoSocio($cvo)
		{
			return $this->cvo ->modificarCvoSocio($cvo);
		}

		public function eliminarCvoSocio($idsocio)
		{
			return $this->cvo ->actualizarTBFincaDireccion($idsocio);
		}
	}
?>