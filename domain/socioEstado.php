<?php

	class  socioEstado{


		private $socioestadoid;
		private $socioestadodetalle;


		public function socioEstado($idestado,$detalle){
			$this->socioestadoid = $idestado;
			$this->socioestadodetalle = $detalle;
		}

		public function getSocioEstadoId()
		{
			return $this->socioestadoid;
		}

		public function setSocioEstadoId($socioestadoid)
		{
			$this->socioestadoid = $socioestadoid;
		}
			
		public function getSocioEstadoDetalle()
		{
			return $this->socioestadodetalle;
		}
	}

?>