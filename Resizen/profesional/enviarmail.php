<?php
    require("conexion.php");
    $con = conexion("resizen");
    $dest = $_POST['dest'];
    $asun = $_POST['asunto'];
    $correo = $_POST['correo'];
    $mail = mail($dest,$asun,$correo);
    if($mail){
        echo("<center><p>Correo enviado correctamemte</p>
            <button onclick='atrasresidente()'>Atras</button>
        <center>");
    } 
    else{
        echo("<center><p>No ha sido posible enviar el mensaje</p>
            <button onclick='atrasresidente()'>Atras</button>
        <center>");
    }
?>