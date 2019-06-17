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
                var usu = document.getElementById("usuario").value;
                var usu_exp = /^[a-zA-Z0-9]{9,9}$/;
                if(usu_exp.test(usu)==true){
                    $("#usuario").css("border","2px dotted green");
                    return true;
                }
                else{
                    $("#usuario").css("border","2px dotted red");
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
                height:400px;
                padding-left:25px;
            }
            body{
                background-color: rgb(204,232,255);
            }
            input[type="submit"]{
                background-color: white;
                color: rgb(60,150,160);
            }
        </style>
    </head>
    <body>
        <?php
            session_start();
            $usu = $_SESSION['usuario'];
            require("conexion.php");
            $con = conexion("resizen");
            $consulta = "select familiar,usuario,contrasena from residentes where usuario='$usu'";
            $result = mysqli_query($con,$consulta);
            $datos = mysqli_fetch_array($result);
            echo("
                <div id='formulario'>
                    <center><p>Datos de usuario</p></center>
                    <form action='modificarfamiliar.php' method='post' onsubmit='comprobar(),comprobar2(),comprobar3()'>
                        <p>Nombre:</p>
                        <input type='text' name='nom' id='nom' value='".$datos['familiar']."' onchange='comprobar()'><br><br>
                        <p>Usuario:</p>
                        <input type='text' name='usuario' id='usuario' value='".$datos['usuario']."' onchange='comprobar2()' title='Introduzca  9 caracteres entre letras y numeros'><br><br>
                        <p>Contraseña:</p>
                        <input type='text' name='pass' id='pass' value='".$datos['contrasena']."' onchange='comprobar3()' title='Introduzca 8 caracteres entre letras y numeros'><br><br>
                        <input type='submit' name='modificar' id='modificar' value='Modificar'>
                    </form>
                </div>
            ");
            if(isset($_POST['modificar'])){
                $nom = $_POST['nom'];
                $usu = $_POST['usuario'];
                $pass = $_POST['pass'];
                $usuario = $_SESSION['usuario'];
                $consulta = "update residentes set familiar='$nom',usuario='$usu',contrasena='$pass' where usuario='$usuario';";
                $result = mysqli_query($con,$consulta);
                if($result){
                    echo("
                        <script>
                            alert('Datos modificados correctamenmte. Reinicie la aplicacion');
                            window.close('modificarfamiliar.php');
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