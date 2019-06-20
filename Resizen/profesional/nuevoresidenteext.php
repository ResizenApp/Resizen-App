<?php
    sleep(1);
    require("conexion.php");
    $con = conexion("resizen");
    $dni = $_POST['dni'];
    $centro = $_POST['centro'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $fechain = $_POST['fechain'];
    $fecha = $_POST['fecha_nac'];
    $sexo = $_POST['sexo'];
    $dieta = $_POST['dieta'];
    $alergias = $_POST['alergias'];
    $sujcama = $_POST['sujcama'];
    $sujsilla = $_POST['sujsilla'];
    $pro = $_POST['pro'];
    $pat = $_POST['patologia'];
    $medi = $_POST['medicacion'];
    $hab = $_POST['num_hab'];
    $fam = $_POST['familiar'];
    $relfa = $_POST['relfa'];
    $tel = $_POST['telefono'];
    $mail = $_POST['email'];
    $usu = $_POST['usu'];
    $hash =  password_hash($_POST["pass"], PASSWORD_DEFAULT);
    $consulta = "insert into residentes (id_residente,centro,profesional,fechaingreso,nombre,apellidos,fecha_nac,sexo,dieta,alergias,sujecciones_cama,sujecciones_silla,patologias,medicacion,n_hab,familiar,relacionfamiliar,tel_contac,mailcontacto,usuario,contrasena) values ('$dni','$centro','$pro','$fechain','$nombre','$apellidos','$fecha','$sexo','$dieta','$alergias','$sujcama','$sujsilla','$pat','$medi',$hab,'$fam','$relfa',$tel,'$mail','$usu','$hash');";
    $result = mysqli_query($con,$consulta) or die ('No se pudo guardar: ' . mysqli_error($con));
    if($result){
        echo("
            <center>
                <p>Residente creado correctamente</p>
                <button onclick='residentes()'>Atras</button><br><br>
            </center>
        ");      
    }
    else{
        echo("
            <center>
                <p>No se ha podido guardar la informacion, intentelo de nuevo</p>
                <button onclick='residentes()'>Atras</button><br><br>
            </center>
        ");                  
    }    
?>