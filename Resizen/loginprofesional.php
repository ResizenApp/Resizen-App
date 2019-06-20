<?php
    sleep(1);
    session_start();
    $usu = $_POST['usuario'];
    $pass = $_POST['pass'];
    require("conexion.php");
    $con = conexion("resizen");
    $consulta = "select id_profesional,nombre,categoria,contrasena from profesional where usuario='$usu';";
    $result = mysqli_query($con,$consulta);
    $datos = mysqli_fetch_array($result);
    $col = mysqli_num_rows($result);
    if($col>0){
        $veri = password_verify($pass,$datos['contrasena']);
        if($veri){
            $_SESSION['idprofesional'] = $datos['id_profesional'];
            $_SESSION['categoria'] = $datos['categoria'];
            echo($datos['nombre']);
        }
        else{
            echo("si");
        }
    }
    else{
        echo("si");
    }
?>