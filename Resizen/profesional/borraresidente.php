<?php
    $id = $_POST['idresidente'];
    require("conexion.php");
    $con = conexion("resizen");
    $consulta = "delete from residentes where id_residente='$id';";
    $result = mysqli_query($con,$consulta);
    if($result){
        echo("si");
    }
    else{
        echo("no");
    }
?>