<?php
    $id = $_POST['idusuario'];
    require("conexion.php");
    $con = conexion("resizen");
    $consulta = "delete from profesional where id_profesional='$id';";
    $result = mysqli_query($con,$consulta);
    if($result){
        echo("si");
    }
    else{
        echo("no");
    }
?>