<?php

	class raza
	{
		private $idraza;
		private $razanombre;

		
		function raza($idraza , $razanombre){
			$this->idraza = $idraza;
			$this->razanombre = $razanombre;
		}

		public function setIdRaza($idraza)
		{
			$this->idraza = $idraza;
		}

		public function setNombreRaza($razanombre)
		{
			$this->razanombre = $razanombre;
		}

		public function getIdRaza(){
			return $this->idraza;
		}

		public function getNombreRaza(){
			return $this->razanombre;
		}

	}







?>