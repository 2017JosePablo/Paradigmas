<?php
include_once('UI.php');
$ui = new UI();
$path = $ui->get_path();
?>

<?php
if(isset($title)){
	$title = " | ".$title;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title>Lecher&iacute;a<?=$title?></title>
<link href="<?=$path?>css/animations.css" rel="stylesheet"/>
<link href="<?=$path?>css/flexslider.css" rel="stylesheet"/>
<link href="<?=$path?>css/style.css" rel="stylesheet"/>
<link href="<?=$path?>js/pgwmodal.min.css" rel="stylesheet">
<script src="<?=$path?>js/jquery.min.js"></script>
<script src="<?=$path?>js/jquery.flexslider.js"></script>
<script src="<?=$path?>js/functions.js"></script>
<script src="<?=$path?>js/pgwmodal.min.js"></script>
</head>

<body>

	<header>
    	
        <h1>Sistema de control de lecher&iacute;as</h1>
            
        <!-- Place somewhere in the <body> of your page -->
        <div class="flexslider">
          <ul class="slides">
            <li><img src="<?=$path?>img/slider0.jpg" /></li>
            <li><img src="<?=$path?>img/slider1.jpg" /></li>
            <li><img src="<?=$path?>img/slider2.jpg" /></li>
            <li><img src="<?=$path?>img/slider3.jpg" /></li>
          </ul>
        </div>
        
        <div class="trapecio"></div>
        
    </header>