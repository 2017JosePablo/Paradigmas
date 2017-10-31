<?php
  session_start();
    if (isset($_SESSION["usuario"])    &&  isset($_SESSION["rol"])) {
        session_destroy();
    }
  header("Location: ../");
?>
