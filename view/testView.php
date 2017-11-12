<!doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>test</title>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>


		<link rel="stylesheet" href="../css/diseno.css">

	</head>

	<body>

		<?php

		$cont =1;
		include '../business/fincaCercaBusiness.php';
		$fincaBusiness = new fincaCercaBusiness();
		$cerca = $fincaBusiness->getTipoCerca();
		echo '<table > <tr>  <td align = "center" >Forraje</td> </tr><tr></tr>';

		foreach ($cerca as $current) {
				echo '<tr>';
				echo '<td> <input  name ="checkbox" value="'.$current.'"type="checkbox" id="'.$cont.'" >'.$current.'</td>';
				echo '</tr>';
				$cont++;
		}
				echo '</table>';
	?>




	</body>

</html>
