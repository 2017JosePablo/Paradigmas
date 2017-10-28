<!doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Ordenar alfabéticamente elementos del html con jquery</title>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

		<script>
			$(function(){
				var mylist = $('#myId');
				var listitems = mylist.children('li').get();
				listitems.sort(function(a, b) {
				   var compA = $(a).text().toUpperCase();
				   var compB = $(b).text().toUpperCase();
				   return (compA < compB) ? -1 : (compA > compB) ? 1 : 0;
				})
				$.each(listitems, function(idx, itm) { mylist.append(itm); });
			});
		</script>

	</head>
	<h1>ordenar alfabéticamente elementos del html con jquery</h1>

		<ul id="myId">
			<li>w</li>
			<li>e</li>
      <li>a</li>
      <li>z</li>
			<li>x</li>
      <li>a</li>
			<li>m</li>
			<li>a</li>
		</ul>

	<body>
	<?php 


    require '../data/loginData.php';
    $login= new loginData();

    $result= $login->optenerTodasContrasenas();

           echo '<table border = "1"> <tr>  <td align = "center" colspan = "3">Listado de Contraseñas </td> </tr><tr>  <td>Datos del Socio </td><td colspan="2">Contraseña</td> </tr>';

            foreach ($result as $current) {
                echo '<tr>';

                echo '<td> '."[".$current->getCedula()."] ".$current->getNombre()." ".$current->getPrimerApellido()." ".$current->getSegundoApellido().'</td>';
                echo '<td> '.$current->getContrasena().'</td>';

                echo '</tr>';
            }
                echo '</table>';

           echo '<br>';echo '<br>';echo '<br>';     
     


	echo "ValidanDo:<br> usuario: adanca16@gmail.com ---&--- conreaseña: 1234 <br>";      
	echo "MENSAJE DE LOGUEO: ";
	$result2= $login->validarLogin("adanca16@gmail.com","1234");
	echo '<br>';  
	echo '<br>';  
	echo '<br>';             

	echo "Cambiando contraseña del <br>usuario: adanca16@gmail.com ---&--- conreaseña: [1234] por [1234] <br>";

	echo "MENSAJE DEL SISTEMA: ".$result3= $login->actualizarContrasena(" adanca16@gmail.com","1234","1234");

	echo '<br>';  
	echo '<br>';  
    echo '<br>'; 

	echo "AVISOS";
	echo '<br>';  
	echo '<br>';  
	echo '<br>'; 
	require '../data/avisosData.php';
	$aviso= new avisosData();
	$result4=$aviso->mostrarTodosAvisos();
   echo '<table border = "1"> <tr>  <td align = "center" colspan = "4">Listado de AVISOS </td> </tr><tr>  <td>Tema </td> <td>Detalle </td><td>Foto </td><td colspan="2">AutorID</td> </tr>';

    foreach ($result4 as $current) {
        echo '<tr>';

        echo '<td> '.$current->getTema().'</td>';
        echo '<td>'.$current->getDetalle().'</td>';
        echo '<td><img src="'.$current->getRutaFoto().'"</td>';
        echo '<td> '.$current->getSocioId().'</td>';

        echo '</tr>';
    }
        echo '</table>';

   echo '<br>';echo '<br>';echo '<br>';     



     ?>




	</body>

</html>
