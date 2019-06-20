<?php
    sleep(1);
    session_start();
    require("conexion.php");
    $con = conexion("resizen");
    mysqli_set_charset($con, 'utf8');
    $idres = $_POST['dni'];
    $idpro = $_SESSION['idprofesional'];
    $fec = $_POST['fecha'];
    $turno = $_POST['turno'];
    $actv = $_POST['actv'];
    $inci = $_POST['inci'];
    $pis = $_POST['pis'];
    $caca = $_POST['caca'];
    $ncaca = $_POST['ncaca'];
    $cpos = $_POST['cpos'];
    $consulta = "insert into evolutivos (id_residente,id_profesional,fecha,turno,actividades,incidencias,diuresis,deposiciones,num_depo,cambiosposturales) values ('$idres','$idpro','$fec','$turno','$actv','$inci',$pis,'$caca',$ncaca,'$cpos');";
    $result = mysqli_query($con,$consulta);
    if($result){
        echo("
            <center>
                <p>Evolutivo creado</p>
                <button onclick='atrasdetalle(\"".$idres."\")'>Atras</button><br><br>
            </center>
        ");                
    }
    else{
        echo("
            <center>
                <p>No se ha podido crear, intentelo de nuevo mas tarde</p>
                <button onclick='atrasdetalle(\"".$idres."\")'>Atras</button><br><br>
            </center>
        ");                
    }
?>