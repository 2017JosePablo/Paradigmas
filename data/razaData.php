<?php

	include 'data.php';

	require_once '../domain/raza.php';
	class razaData extends data
	{

		private  $data ;
		
		function __construct()
		{
			$this->data = new Data();
		}

		public function insertarRaza($raza)
		{	
			$conn = new mysqli($this->data->getServidor(), $this->data->getUsuario(), $this->data->getContrasena(), $this->data->getDbNombre());
				

			$sql = "";

			$resultado = $conn->query($sql);

			



		}





	}

?>