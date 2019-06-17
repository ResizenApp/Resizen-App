<?php
    session_start();
    if(isset($_SESSION['categoria'])){
        session_destroy();
        echo("adios");
    }
?>