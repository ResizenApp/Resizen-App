<?php
    sleep(1);
    session_start();
    require("conexion.php");
    $con = conexion("resizen");
    $pro = $_SESSION['idprofesional'];
    $idres = $_POST['id'];
    $npro = $_POST['npro'];
    $cat = $_POST['cat'];
    $res = $_POST['res'];
    $fec = $_POST['fecha'];
    $lug = $_POST['lugar'];
    $tipo = $_POST['tipo'];
    $des =$_POST['des'];
    $consulta = "insert into informes (id_profesional,id_residente,profesional,categoria,nombre,fecha,lugar,tipo,descripcion) values ('$pro','$idres','$npro','$cat','$res','$fec','$lug','$tipo','$des');";
    $result = mysqli_query($con,$consulta) or die ('No se pudo guardar: ' . mysqli_error($con));
    if($result){
        echo("
            <center>
                <p>Informe creado correctamente</p>
                <button onclick='mostrarinforme(\"". $idres."\")'>Mostrar</button></td>
            </center>
        ");  
    }
    else{
        echo("
            <center>
                <p>El iinforme no se pudo crear, intentelo de nuevo</p>
                <button onclick='mostrarinforme(\"". $idres."\")'>Mostrar</button></td>
            </center>
        ");  
    }
?>