<?php 
include_once('UI.php');
$ui = new UI('ERROR 404'); 
?>

<?php $ui->get_header(); ?>

<div id="cuerpo">
    <?php $ui->get_menu(); ?>

    <section>
    

        <!-- INICIA EL CODIGO CORRESPONDIENTE A LA PAGINA -->
        
        <h1>ERROR 404</h1>
        
        <h2>Parece que te has perdido...</h2>
        
        <p>Visita la p&aacute;gina principal del sistema <a href="index1.php">AQU&Iacute;</a></p>
    
        <!-- FINALIZA EL CODIGO -->
        

    </section>
    
</div>

<?php $ui->get_footer(); ?>