<?php

	if (isset($_POST['agregarsocio'])) {
		


		$cedula = $_POST['sociocedula'];
		$nombre = $_POST['socionombre'];
		$primerapellido = $_POST['socioprimerapellido'];
		$segundoapellido = $_POST['sociosegundoapellido'];
		$telcasa = $_POST['sociotelcasa'];
		$telmovil = $_POST['sociotelmovil'];
		$correo = $_POST['sociocorreo'];
		$provincia = $_POST['listaprovincias'];
		$canton = $_POST['listadocanton'];
		$distrito = $_POST['listadodistrito'];
		$pueblo = $_POST['sociopueblo'];



		echo "Persona: ".$provincia;


	}



?>