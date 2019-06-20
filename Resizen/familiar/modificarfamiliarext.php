<?php
    sleep(1);
    session_start();
    require("conexion.php");
    $con = conexion("resizen");
    $nom = $_POST['nom'];
    $mail = $_POST['email'];
    $usu = $_POST['usu'];
    $pass = $_POST['pass'];
    $usuario = $_SESSION['usuario'];
    $consulta = "update residentes set familiar='$nom',mailcontacto='$mail',usuario='$usu',contrasena='$pass' where usuario='$usuario';";
    $result = mysqli_query($con,$consulta);
    if($result){
        echo("
            <center>
                <p>Usuario modificado</p>
                <button onclick='usuario()'>Atras</button><br><br>
            </center>
        ");
    }
    else{
        echo("
            <center>
                <p>No se ha podido modificar, intentelo de nuevo</p>
                <button onclick='usuario()'>Atras</button><br><br>
            </center>
        ");
    }
?>