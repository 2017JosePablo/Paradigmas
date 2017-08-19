<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Mostrar Junta</title>
    <link rel="icon" href="../resources/icons/bull.png">
    <link rel="stylesheet" href="../resources/css/css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php
    include '../business/juntaBusiness.php';
    ?>

</head>

<body>
                    <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "emptyField") {
                            echo '<p style="color: red">Campo(s) vacio(s)</p>';
                        } else if ($_GET['error'] == "numberFormat") {
                            echo '<p style="color: red">Error, formato de numero</p>';
                        } else if ($_GET['error'] == "dbError") {
                            echo '<center><p style="color: red">Error al procesar la transacción</p></center>';
                        }
                    } else if (isset($_GET['success'])) {
                        echo '<p style="color: green">Transacción realizada</p>';
                    }
                    ?>
  
        <h1>Mostrar Junta</h1>
        
      

            <?php
            $juntaBusiness = new JuntaBusiness();
            $allJuntas = $juntaBusiness->getAllTBJunta();
            echo '<table> <tr><td>Id</td>  <td>Presidiente</td><td>Vicepresidente</td><td>Tesorero</td><td>Secretario</td><td>Vocal 1</td><td>Vocal 2</td> <td>Vocal 3</td></tr>';
            foreach ($allJuntas as $current) {     
                echo '<tr>';
                echo '<td>  '.$current->getIdTBJunta() . ' </td>';
                echo '<td> '.$current->getPresidenteTBJunta().'</td>';
                echo '<td> '.$current->getVicepresidenteJunta().' </td>';
                echo '<td> '.$current->getTesoreroJunta() .
                ' </td>';
                echo '<td> '.$current->getSecretarioJunta().' </td>';
                echo '<td> '.$current->getVocal1Junta().'</td>';
                 echo '<td> '.$current->getVocal2Junta().'</td>';
                  echo '<td> '.$current->getVocal3Junta().'</td>';
                echo '</tr>';
            }
                echo '</table>';
            ?>

            <a href="../view/juntaCRUDView.php">Regresar</a>
</body>
</html>