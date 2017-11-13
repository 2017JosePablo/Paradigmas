<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>

		<?php

		$jason =[
		"idsocio"=>"jse"
		,"sociocedula"=> "sociocedula"
		,"socionombre"=>"socionombre"
		,"socioprimerapellido"=>"socioprimerapellido"
		,"sociosegundoapellido"=>"sociosegundoapellido"
		,"sociotelefono"=>"sociotelefono"
		,"sociocorreo"=>"sociocorreo"
		,"sociorecomendacionuno"=>"sociorecomendacionuno"
		,"sociorecomendaciondos"=>"sociorecomendaciondos"
		,"socioresponsable"=>"socioresponsable"
		,"sociobeneficiario"=>"sociobeneficiario"
		,"tipoactividadnombre"=>"tipoactividadnombre"
		,"sociofechaingreso"=>"sociofechaingreso"
		,"socioestadodetalle"=>"socioestadodetalle"
		,"socioprovincia"=>"socioprovincia"
		,"sociocanton"=>"sociocanton"
		,"sociodistrito"=>"sociodistrito"
		,"sociopueblo"=>"sociopueblo"
		];


		$tempo = json_encode($jason);



		include '../data/socioData.php';

		$data = new socioData();
		$v = $data->obtenerUnTBSocio("504130763");
		echo "string".$v;





		 ?>

	</body>
</html>
