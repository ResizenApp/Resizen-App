<?php
    sleep(1);
    session_start();
    $usu = $_POST['usuario'];
    $pass = $_POST['pass'];
    require("conexion.php");
    $con = conexion("resizen");
    $consulta = "select familiar,usuario,contrasena from residentes where usuario='$usu';";
    $result = mysqli_query($con,$consulta);
    $datos = mysqli_fetch_array($result);
    $col = mysqli_num_rows($result);
    if($col>0){
        $veri = password_verify($pass,$datos['contrasena']);
        if($veri){
            $_SESSION['categoria'] = "Familiar";
            $_SESSION['usuario'] = $datos['usuario'];
            echo($datos['familiar']);
        }
        else{
            echo("si");
        }
    }
    else{
        echo("si");
    }
?>