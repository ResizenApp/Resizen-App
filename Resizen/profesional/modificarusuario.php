<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Residente</title>
        <style>
            #formulario{
                height:555px;
                padding-left:25px;
                overflow-y: scroll;
            }
            body{
                background-color: rgb(204,232,255);
            }
            input[type="submit"]{
                background-color: white;
                color: rgb(60,150,160);
            }
        </style>
        <script src="jquery-3.3.1.min.js"></script>
        <script type="application/x-javascript">
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
            function categoria(){
                var peticion = $.ajax({
                    url: "categoriausuario.php",
                    type: "POST",
                    async: true,
                    success: function(data){
                        $("#cat").html(peticion.responseText);
                    }
                })
            }
            function comprobar(){
                var mail = document.getElementById("mail").value;
                var mail_exp = /[\w]+@{1}[\w]+\.[a-z]{2,3}/;
                if(mail_exp.test(mail)==true){
                    $("#mail").css("border","2px dotted green");
                    return true;
                }
                else{
                    $("#mail").css("border","2px dotted red");
                    return false;
                }
            }
        </script>
    </head>
    <body onload='centros(),categoria()'>
        <?php
            require("conexion.php");
            $id = $_GET['id'];
            $con = conexion("resizen");
            $consulta = "select * from profesional where id_profesional='$id'";
            $result = mysqli_query($con,$consulta);
            $datos = mysqli_fetch_array($result);
            $_SESSION['centro'] = $datos['centro'];
            $_SESSION['categoriausuario'] = $datos['categoria'];
            echo("
                <div id='formulario'>
                    <center><p>Datos de usuario</p></center>
                    <form action='modificarusuario.php?id=".$id."' method='post' onsubmit='comprobar()'>
                        DNI: <input type='text' name='dni' id='dni' value='".$datos['id_profesional']."' readonly='readonly'>
                        Nombre: <input type='text' name='nom' id='nom' value='".$datos['nombre']."' readonly='readonly'><br><br>
                        Categoria: <select name='cat' id='cat'></select>
                        Fecha ingreso: <input type='date' name='fecha' id='fecha' value='".$datos['fechaingreso']."' readonly='readonly'>
                        Centro: <select id='centro' name='centro'></select><br><br>
                        Correo electronico: <input type='email' name='mail' id='mail' value='".$datos['mail']."' onchange='comprobar()'><br><br>
                        Usuario: <input type='text' name='usu' id='usu' value='".$datos['usuario']."'>
                        Contraseña: <input type='text' name='pass' id='pass' value='".$datos['contrasena']."'><br><br>
                        <input type='submit' name='modificar' id='modificar' value='Modificar'><br>
                    </form>
                </div>
            ");
            ?>
            <?php
            if(isset($_POST['modificar'])){
                $con = conexion("resizen");
                $dni = $_POST['dni'];
                $cat = $_POST['cat'];
                $centro = $_POST['centro'];
                $mail = $_POST['mail'];
                $usu = $_POST['usu'];
                $pass = $_POST['pass'];
                $consulta = "update profesional set categoria='$cat',centro='$centro',mail='$mail',usuario='$usu',contrasena='$pass' where id_profesional='$dni';";
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
    </body>
</html>