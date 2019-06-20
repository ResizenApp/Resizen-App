<?php
    sleep(1);
    session_start();
    require("conexion.php");
    $con = conexion("resizen");
    mysqli_set_charset($con, 'utf8');
    $dieta = $_POST['tipo'];
    $fecha = $_POST['fecha'];
    $des = $_POST['des'];
    $alm = $_POST['alm'];
    $com = $_POST['com'];
    $mer = $_POST['mer'];
    $cen = $_POST['cen'];
    $consulta = "insert into dietamenu (tipodieta,fecha,desayuno,almuerzo,comida,merienda,cena) values ('$dieta','$fecha','$des','$alm','$com','$mer','$cen');";
    $result = mysqli_query($con,$consulta);
    if($result){            
        echo("
            <center>
                <p>Menu creado correctamente</p>
                <button onclick='atrasdieta()'>Atras</button>
            </center>
        ");        
    }
    else{
        echo("
        <center>
            <p>No se pudo crear, intentelo de nuevo</p>
            <button onclick='atrasdieta()'>Atras</button>
        </center>
    ");               
    }
?>