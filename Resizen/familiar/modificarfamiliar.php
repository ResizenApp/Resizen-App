<!DOCTYPE html>
<html>
    <head>
        <title>Residente</title>
        <script src="jquery-3.3.1.min.js"></script>
        <script type="application/x-javascript">
            function comprobar(){
                var nom = document.getElementById("nom").value;
                var nom_exp = /^([A-Z]{1}[a-zñáéíóú]+[\s]*)+$/;
                if(nom_exp.test(nom)==true){
                    $("#nom").css("border","2px dotted green");
                    return true;
                }
                else{
                    $("#nom").css("border","2px dotted red");
                    return false;
                }
            }
            function comprobar2(){
                var usu = document.getElementById("usu").value;
                var usu_exp = /^[a-zA-Z0-9]{9,9}$/;
                if(usu_exp.test(usu)==true){
                    $("#usu").css("border","2px dotted green");
                    return true;
                }
                else{
                    $("#usu").css("border","2px dotted red");
                    return false;
                }
            }
            function comprobar3(){
                var pass = document.getElementById("pass").value;
                var pass_exp = /^[a-zA-Z0-9]{8,8}$/;
                if(pass_exp.test(pass)==true){
                    $("#pass").css("border","2px dotted green");
                    return true;
                }
                else{
                    $("#pass").css("border","2px dotted red");
                    return false;
                }
            }
        </script>
        <style>
            #formulario{
                height:555px;
                padding-left:25px;
                overflow-y: scroll;
                background-color: rgb(204,232,255);
            }
            input[type="button"]{
                background-color: white;
                color: rgb(60,150,160);
            }
        </style>
    </head>
    <body>
        <?php
            sleep(1);
            session_start();
            $usu = $_SESSION['usuario'];
            require("conexion.php");
            $con = conexion("resizen");
            $consulta = "select familiar,mailcontacto,usuario,contrasena from residentes where usuario='$usu'";
            $result = mysqli_query($con,$consulta);
            $datos = mysqli_fetch_array($result);
            echo("
                <div id='formulario'>
                    <center><p>Datos de usuario</p></center>
                    <form action='modificarfamiliar.php' method='post' onsubmit='comprobar(),comprobar2(),comprobar3()'>
                        <p>Nombre:</p>
                        <input type='text' name='nom' id='nom' value='".$datos['familiar']."' onchange='comprobar()' readonly='readonly'><br><br>
                        <p>Mail de contacto</p>
                        <input type='text' name='email' id='email' value='".$datos['mailcontacto']."' onchange='comprobar4()'><br><br>
                        <p>Usuario:</p>
                        <input type='text' name='usu' id='usu' value='".$datos['usuario']."' onchange='comprobar2()' title='Introduzca  9 caracteres entre letras y numeros'><br><br>
                        <p>Contraseña:</p>
                        <input type='text' name='pass' id='pass' value='".$datos['contrasena']."' onchange='comprobar3()' title='Introduzca 8 caracteres entre letras y numeros'><br><br>
                        <input type='button' name='modificar' id='modificar' value='Modificar' onclick='modificarfamiliarext()'>
                    </form><br><br>
                    <button onclick='usuario()'>Atras</button><br><br>
                </div>
            ");
        ?>
    </body>
</html>