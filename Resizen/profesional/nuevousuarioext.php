<?php
    sleep(1);
    require("conexion.php");
    $con = conexion("resizen");
    $dni = $_POST['dni'];
    $nom = $_POST['nombre'];
    $cat = $_POST['cat'];
    $fecha = $_POST['fecha'];
    $centro = $_POST['centro'];
    $mail = $_POST['email'];
    $usu = $_POST['usu'];
    $hash =  password_hash($_POST["pass"], PASSWORD_DEFAULT);
    $consulta = "insert into profesional (id_profesional,categoria,centro,fechaingreso,nombre,mail,usuario,contrasena) values('$dni','$cat','$centro','$fecha','$nom','$mail','$usu','$hash');";
    $result = mysqli_query($con,$consulta);
    if($result){
        echo("
            <center>
                <p>Profesional creado correctamente</p>
                <button onclick='atrasusuario()'>Atras</button><br><br>
            </center>
        ");
    }
    else{
        echo("
            <center>
                <p>No se pudo crear correctamente</p>
                <button onclick='atrasusuario()'>Atras</button><br><br>
            </center>
        ");             
    }
?>