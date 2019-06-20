<?php
    sleep(1);
    require("conexion.php");
    $con = conexion("resizen");
    $dni = $_POST['dni'];
    $centro = $_POST['centro'];
    $pro = $_POST['profesional'];
    $dieta = $_POST['dieta'];
    $alergias = $_POST['alergias'];
    $sujcama = $_POST['cama'];
    $sujsilla = $_POST['silla'];
    $pat = $_POST['patologias'];
    $medi = $_POST['medicacion'];
    $hab = $_POST['num_hab'];
    $fam = $_POST['familiar'];
    $rel = $_POST['rel'];
    $tel = $_POST['telefono'];
    $mail = $_POST['email'];
    $usu = $_POST['usu'];
    $hash =  password_hash($_POST["pass"], PASSWORD_DEFAULT);
    $consulta = "update residentes set centro = '$centro',profesional='$pro',dieta='$dieta',alergias='$alergias',sujecciones_cama='$sujcama',sujecciones_silla='$sujsilla',patologias='$pat',medicacion='$medi',n_hab='$hab',familiar='$fam',relacionfamiliar='$rel',tel_contac='$tel',mailcontacto='$mail',usuario='$usu',contrasena='$hash' where id_residente='$dni';";
    $result = mysqli_query($con,$consulta) or die ('No se pudo guardar: ' . mysqli_error($con));
    if($result){
        echo("<center><p>Residente modificado correctamente</p>
            <button onclick='residentes()'>Atras</button>
        </center>");
    }
    else{
        echo("<center><p>No se ha podido modificar</p>ç
            <button onclick='residentes()'>Atras</button>
        </center>");         
    }
?>