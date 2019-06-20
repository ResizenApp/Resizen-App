<?php
    sleep(1);
    require("conexion.php");
    $con = conexion("resizen");
    $med = $_POST['med'];
    $idcli = $_POST['id'];
    $consulta = "update clinica set tratamiento='$med' where id_clinica='$idcli';";
    $result = mysqli_query($con,$consulta);
    if($result){
        echo("
            <center>
                <p>Clinica modificada correctamente</p>
                <button onclick='atrasclinica()'>Atras</button>
            </center>
        ");
    }
    else{
        echo("
            <center>
                <p>No se pudo modificar, intentelo de nuevo</p>
                <button onclick='atrasclinica()'>Atras</button>
            </center>
        ");       
    }
?>