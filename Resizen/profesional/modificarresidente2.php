<?php
    session_start();
?>  
<!DOCTYPE html>
<html>
    <head>
        <title>Modificar residente</title>
        <meta charset="utf-8">
        <script src="jquery-3.3.1.min.js"></script>
        <script type="application/x-javascript">
            function sujeccioncama(){
                var peticion = $.ajax({
                    url: "sujecciones.php",
                    type: "POST",
                    async: true,
                    success: function(data){
                        $("#cama").html(peticion.responseText);
                    }
                })
            }
            function sujeccionsilla(){
                var peticion = $.ajax({
                    url: "sujecciones2.php",
                    type: "POST",
                    async: true,
                    success: function(data){
                        $("#silla").html(peticion.responseText);
                    }
                })
            }
            function centros(){
                var peticion = $.ajax({
                    url: "centro.php",
                    type: "POST",
                    async: true,
                    success: function(data){
                        $("#centro").html(peticion.responseText);
                    }
                })
            }
            function dieta(){
                var peticion = $.ajax({
                    url: "dieta.php",
                    type: "POST",
                    async: true,
                    success: function(data){
                        $("#dieta").html(peticion.responseText);
                    }
                })
            }
            function profesional(){
                var peticion = $.ajax({
                    url: "profesional.php",
                    type: "POST",
                    async: true,
                    success: function(data){
                        $("#profesional").html(peticion.responseText);
                    }
                })
            }
            function relacion(){
                var peticion = $.ajax({
                    url: "familiar.php",
                    type: "POST",
                    async: true,
                    success: function(data){
                        $("#rel").html(peticion.responseText);
                    }
                })
            }
            function salir(){
                window.close("modificarresidente2.php");
            }
        </script>
        <style>
            body{
                background-color: rgb(204,232,255);
            }
            input[type="submit"]{
                background-color: white;
                color: rgb(60,150,160);
            }
            input[type="button"]{
                background-color: white;
                color: rgb(60,150,160);
            }
            button{
                background-color: white;
                color: rgb(60,150,160);
            }
        </style>
    </head>
    <body onload='sujeccioncama(),sujeccionsilla(),centros(),dieta(),profesional(),relacion()'>
    <?php
    if(isset($_GET['idresidente'])){
    require("conexion.php");
    $con = conexion("resizen");
    $id = $_GET['idresidente'];
    $consulta = "select * from residentes where id_residente = '$id'";
    $result = mysqli_query($con,$consulta);
    $col = mysqli_num_rows($result);
    if($col>0){
        for($i=0;$i<$col;$i++){
            $datos = mysqli_fetch_array($result);
            $_SESSION['centro'] = $datos['centro'];
            $_SESSION['dieta'] = $datos['dieta'];
            $_SESSION['cama'] = $datos['sujecciones_cama'];
            $_SESSION['silla'] = $datos['sujecciones_silla'];
            $_SESSION['profesional'] = $datos['profesional'];
            $_SESSION['relacion'] = $datos['relacionfamiliar'];
            echo("
                    <h3>Datos de usuario</h3>
                    <form action='modificarresidente2.php' method='post'>
                        DNI: <input type='text' id='dni' name='dni' value='" . $datos['id_residente'] . "'readonly='readonly'>
                        Numero de habitacion: <input type='number' id='num_hab' name='num_hab' value='". $datos['n_hab']."'><br><br>
                        Nombre: <input type='text' id='nombre' name='nombre' value='". $datos['nombre']."' readonly='readonly'>
                        Apellidos: <input type='text' id='apellidos' name='apellidos' value='". $datos['apellidos']."' readonly='readonly'><br><br>
                        Fecha de nacimiento: <input type='date' id='fecha_nac' name='fecha_nac' value='". $datos['fecha_nac']."' readonly='readonly'><br><br>
                        Sexo: <input type='text' id='sexo' name='sexo' value='" . $datos['sexo'] . "' readonly='readonly'>
                        Centro: <select name='centro' id='centro'></select><br><br>
                        Dieta: <select name='dieta' id='dieta'></select>
                        Alergias: <input type='text' id='alergias' name='alergias' value='" . $datos['alergias'] . "'><br><br>
                        Sujecciones en cama:<select name='cama' id='cama'></select>
                        Sujecciones en silla: <select name='silla' id='silla'></select><br><br>
                        Profesional de referencis: <select name='profesional' id='profesional'></select><br><br>
                        <p>Patologias:</p>
                        <textarea id='patologias' name='patologias' id='patologias' cols='50' rows='3'>" . $datos['patologias'] . "</textarea>
                        <p>Medicacion: </p>
                        <textarea id='medicacion' name='medicacion' id='medicacion' cols='50' rows='3'>" . $datos['medicacion'] . "</textarea><br><br>
                        Familiar de referencia: <input type='text' name='familiar' id='familiar' value='".$datos['familiar']."'>
                        Relacion familiar: <select name='rel' id='rel'></select><br></br>
                        Telefono de contacto: <input type='tel' id='telefono' name='telefono' value='". $datos['tel_contac']."'>
                        Mail de contacto: <input type='email' id='email' name='email' value='". $datos['mailcontacto']."'><br><br>
                        Usuario: <input type='text' id='usu' name='usu' value='". $datos['usuario']."'><br><br>
                        Password: <input type='password' id='pass' name='pass' value='". $datos['contrasena']."'><br><br>
                        <input type='submit' name='guardar' id='guardar' value='Guardar Cambios'>
                    </form>
            ");
        }    
    }  
    }                     
    ?>
        <div id="visualizar">
            <?php
                if(isset($_POST["guardar"])){
                    require("conexion.php");
                    $con = conexion("resizen");
                    $dni = $_POST['dni'];
                    $centro = $_POST['centro'];
                    $nombre = $_POST['nombre'];
                    $apellidos = $_POST['apellidos'];
                    $fecha = $_POST['fecha_nac'];
                    $sexo = $_POST['sexo'];
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
                    $pass = $_POST['pass'];
                    $consulta = "update residentes set centro = '$centro',nombre='$nombre',apellidos='$apellidos',fecha_nac='$fecha',sexo='$sexo',dieta='$dieta',alergias='$alergias',sujecciones_cama='$sujcama',sujecciones_silla='$sujsilla',patologias='$pat',medicacion='$medi',n_hab='$hab',familiar='$fam',relacionfamiliar='$rel',tel_contac='$tel',mailcontacto='$mail',usuario='$usu',contrasena='$pass' where id_residente='$dni';";
                    $result = mysqli_query($con,$consulta) or die ('No se pudo guardar: ' . mysqli_error($con));
                    if($result){
                        echo("
                            <script>
                                alert('Datos modificados correctamenmte');
                                window.opener.location.reload('principalprofesional.html');
                                self.close();
                            </script>
                        ");
                    }
                    else{
                        echo("<script>alert('Modificacion incorrecta');</script>");
                    }
                }
            ?>
        </div>
    </body>
</html>