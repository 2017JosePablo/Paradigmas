<?php

	/**
	* 
	*/
	class raza
	{
		$idraza;
		$nombreraza;

		public function($idraza,$razanombre){
			$this->idraza = $idraza;
			$this->razanombre = $razanombre;
		}

		public function setIdRaza($idraza)
		{
			$this->idraza = $idraza;
		}

		public function setNombreRaza($nombreraza)
		{
			$this->nombreraza = $nombreraza;
		}

		public function getIdRaza(){
			return $this->idraza;
		}

		public function getNombreRaza(){
			return $this->nombreraza;
		}

	}







?>