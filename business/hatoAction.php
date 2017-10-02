<?php
	

	if (isset($_POST['cedulaHato']) == true && empty($_POST['cedulaHato'])== false) {
		
		require '../data/hatoData.php';
        $hatoBusiness = new hatoData();
        $result=$hatoBusiness->obtenerSocioHato($_POST['cedulaHato']);
        echo $result;
		
	}


?>