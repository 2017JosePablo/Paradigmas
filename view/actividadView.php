<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Area Administrativa de Actividas</title>
	<link rel="stylesheet" href="">


   
</head>
<body>
    <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "emptyField") {
                echo '<p style="color: red">Campo(s) vacio(s)</p>';
            }
        } else if (isset($_GET['success'])) {
            echo '<p style="color: green">Transacción realizada</p>';
        }
    ?>
      

<form method="post" action="../business/actividadAction.php">
    Tipo de Actividad: <input type="text" name="tipoactividad" required=""><br>

<input type="submit" value="Crear Actividad" name="crearactividad" id="crearactiviad"/><p>

</form>
 

    <a href="../index.php">Regresar</a>
</body>
</html>
