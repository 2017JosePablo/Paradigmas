<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Area Administrativa de Juntas</title>
    <link rel="icon" href="../resources/icons/bull.png">
    <link rel="stylesheet" href="../resources/css/css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php
    include '../business/juntaBusiness.php';
    ?>

</head>

<body>

    <section id="form">
        <table>
            <tr>
                <th>ID Junta</th>
                <th>Precidente</th>
                <th>Vicepresidente</th>
                <th>Tesorero</th>
                <th>Secretario</th>
                <th>Vocal 1</th>
                <th>Vocal 2</th>
                <th>Vocal 3</th>
                <th></th>
            </tr>
            <form method="post" enctype="multipart/form-data" action="../business/juntaAction.php">
                <tr>
                    
                    <td><input required type="text" name="idjunta" id="idjunta"/></td>

                    <td><input required type="text" name="presidentejunta" id="presidentejunta"/></td>

                    <td><input required type="text" name="vicepresidentejunta" id="vicepresidentejunta"/></td>

                    <td><input required type="text" name="tesorerojunta" id="tesorerojunta"/></td>

                    <td><input required type="text" name="secretariojunta" id="secretariojunta"/></td>

                    <td><input required type="text" name="vocal1junta" id="vocal1junta"/></td>

                    <td><input required type="text" name="vocal2junta" id="vocal2junta"/></td>

                    <td><input required type="text" name="vocal3junta" id="vocal3junta"/></td>

                    <td><input type="submit" value="Crear Junta" name="create" id="create"/></td>

                </tr>
            </form>

            <!--<?php
            $juntaBusiness = new JuntaBusiness();
            $allJuntas = $juntasBusiness->getAllTBJunta();
            foreach ($allJuntas as $current) {
                echo '<form method="post" enctype="multipart/form-data" action="../business/juntaAction.php">';
                echo '<input type="hidden" name="idjunta" value="' . $current->getJu() . '">';
                echo '<tr>';
                echo '<input type="hidden" name="ranch" id="ranch" value="' . $current->getRanchTBBull() . '"/>';
                echo '<td><input type="text" name="code" id="code" value="' . $current->getCodeTBBull() . '"/></td>';
                echo '<td><input type="text" name="name" id="name" value="' . $current->getNameTBBull() . '"/></td>';
                echo '<td><input type="text" name="commercialcase" id="commercialcase" value="' . $current->getCommercialCaseTBBull() . '"/></td>';
                echo '<td><input type="date" name="buydate" id="buydate" value="' . $current->getBuyDateTBBull() . '"/></td>';
                echo '<td><input type="number" name="strawsquantity" id="sstrawsquantity" value="' . $current->getStrawsQuantityTBBull() . '"/></td>';
                echo '<td><input type="number" name="strawsprice" id="sstrawsprice" value="' . $current->getStrawsPriceTBBull() . '"/></td>';
                echo '<td><input type="submit" value="Actualizar" name="update" id="update"/></td>';
                echo '<td><input type="submit" value="Eliminar" name="delete" id="delete"/></td>';
                echo '</tr>';
                echo '</form>';
            }
            ?>
-->

            <tr>
                <td></td>
                <td>
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
                </td>
            </tr>
        </table>
    </section>

    <footer>
    </footer>

</body>
</html>