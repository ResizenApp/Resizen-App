<?php 
    sleep(1);
    session_start();
    require("conexion.php");
    $con = conexion("resizen");
    $idres = $_POST['dni'];
    $idpro = $_SESSION['idprofesional'];
    $res = $_POST['res'];
    $pro = $_POST['pro'];
    $cat = $_POST['cat'];
    $fec = $_POST['fecha'];
    $lug = $_POST['lugar'];
    $causa = $_POST['causa'];
    $des = $_POST['des'];
    $aten = $_POST['aten'];
    $consulta = "insert into incidencias (id_residente,id_profesional,residente,profesional,categoria,fecha,lugar,causa,descripcion,atencion) values ('$idres','$idpro','$res','$pro','$cat','$fec','$lug','$causa','$des','$aten');";
    $result = mysqli_query($con,$consulta) or die ('No se pudo guardar: ' . mysqli_error($con));
    if($result){
        echo("
            <center>
               <p>Incidencia creada</p>
               <button onclick='atrasincidencias(\"".$idres."\")'>Atras</button><br><br> 
            </center>
        ");
    }
    else{
        echo("
            <center>
               <p>No se ha podido crear la incidencia, intentelo de nuevo</p>
               <button onclick='atrasincidencias(\"".$idres."\")'>Atras</button><br><br> 
            </center>
        ");
    }
?>