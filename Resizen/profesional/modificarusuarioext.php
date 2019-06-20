<?php
    sleep(1);
    require("conexion.php");
    $con = conexion("resizen");
    $dni = $_POST['dni'];
    $cat = $_POST['cat'];
    $centro = $_POST['centro'];
    $mail = $_POST['email'];
    $usu = $_POST['usu'];
    $hash =  password_hash($_POST["pass"], PASSWORD_DEFAULT);
    $consulta = "update profesional set categoria='$cat',centro='$centro',mail='$mail',usuario='$usu',contrasena='$hash' where id_profesional='$dni';";
    $result = mysqli_query($con,$consulta) or die ('No se pudo guardar: ' . mysqli_error($con));
    if($result){
        echo("
            <center>
                <p>Usuario modificado correctamente</p>
                <button onclick='atrasusuario()'>Atras</button><br><br>
            </center>
        ");    
    }
    else{
        echo("
            <center>
                <p>No se pudo modificar el usuario</p>
                <button onclick='atrasusuario()'>Atras</button><br><br>
            </center>
        ");                       
    }
?>