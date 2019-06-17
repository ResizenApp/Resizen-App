<?php
    sleep(1);
    session_start();
    $usu = $_POST['usuario'];
    $pass = $_POST['pass'];
    require("conexion.php");
    $con = conexion("resizen");
    $consulta = "select id_profesional,nombre,categoria from profesional where usuario='$usu' and contrasena='$pass'";
    $result = mysqli_query($con,$consulta);
    $datos = mysqli_fetch_array($result);
    $col = mysqli_num_rows($result);
    if($col>0){
        $_SESSION['idprofesional'] = $datos['id_profesional'];
        $_SESSION['categoria'] = $datos['categoria'];
        echo($datos['nombre']);
    }
    else{
        echo("si");
    }
?>