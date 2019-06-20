<?php
    sleep(1);
    session_start();
    require("conexion.php");
    $con = conexion("resizen");
    $asun = $_POST['asun'];
    $men = $_POST['men'];
    $usu = $_SESSION['usuario'];
    $consulta = "select profesional,familiar from residentes where usuario='$usu';";
    $result = mysqli_query($con,$consulta);
    $datos = mysqli_fetch_array($result);
    $nom = $datos['familiar'];
    $id = $datos['profesional'];
    $consulta2 = "select mail from profesional where id_profesional='$id';";
    $result2 = mysqli_query($con,$consulta2);
    $datos2 = mysqli_fetch_array($result2);
    $desti = $datos2['mail'];
    $correo = mail($desti,$asun,$men);
    if($correo){
        echo("
            <center>
                <p>Correo enviado correctamente</p>
                <button onclick='atrascorreo()'></button>
            </center>
        ");
    }
    else{
        echo("
            <center>
                <p>No se ha podido enviar, intentelo de nuevo</p>
                <button onclick='atrascorreo()'></button>
            </center>
        ");
    }
?>