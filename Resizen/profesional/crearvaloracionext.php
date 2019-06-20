<?php
    sleep(1);
    session_start();
    require("conexion.php");
    $con = conexion("resizen");
    mysqli_set_charset($con, 'utf8');           
    $idres = $_POST['dni'];
    $idpro = $_SESSION['idprofesional'];
    $tipo = $_POST['tipo'];
    $fecha = $_POST['fecha'];
    $val = $_POST['val'];
    $consulta = "insert into valoraciones (id_residente,id_profesional,tipo,fecha,valoracion) values ('$idres','$idpro','$tipo','$fecha','$val');";
    $result = mysqli_query($con,$consulta);
    if($result){
        echo("
            <center>
                <p>Valoracion creada correctamente</p>
                <button onclick='atrasvaloraciones(\"".$idres."\")'>Atras</button>
            </center>
        ");        
    }
    else{
        echo("
            <center>
                <p>No se ha podido crear, intentelo de nuevo</p>
                <button onclick='atrasvaloraciones(\"".$idres."\")'>Atras</button>
            </center>
        ");                        
    }
?>