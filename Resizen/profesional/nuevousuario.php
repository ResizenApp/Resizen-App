<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <script src="jquery-3.3.1.min.js"></script>
        <script type="application/x-javascript">
            function comprobar(){
                var dni = document.getElementById("dni").value;
                var dni_exp = /^[0-9]{8,8}[A-Z]$/;
                if(dni_exp.test(dni)==true){
                    $("#dni").css("border","2px dotted green");
                    return true;
                }
                else{
                    $("#dni").css("border","2px dotted red");
                    return false;
                }
            }
            function comprobar2(){
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
            function comprobar3(){
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
        <style>
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
        <center><p>Insercion de nuevo usuario</p></center>
        <form action='nuevousuario.php' method='post'>
            Nombre completo:<input type='text' name='nom' id='nom' size='60' required onchange='comprobar2()'><br><br>
            DNI profesional: <input type='text' name='dni' id='dni' required onchange='comprobar()'>
            Categoria profesional: <select type='text' name='cat' id='cat' required>
                <?php
                    require("conexion.php");
                    $con = conexion("resizen");
                    $accion = "select categoria from categorias;";
                    $result = mysqli_query($con,$accion);
                    $cantidad = mysqli_num_rows($result);
                    for($i=0;$i<$cantidad;$i++){
                        $datos = mysqli_fetch_array($result);
                        echo("<option value='" . $datos['categoria'] . "'>" . $datos['categoria'] . "</option>");
                    }
                ?>
            </select><br><br>
            Fecha de ingreso: <input type='date' name='fecha' id='fecha' required>
            Centro de trabajo: <select name='centro' id='centro' required>
                <?php
                    $accion = "select nombre from centros;";
                    $result = mysqli_query($con,$accion);
                    $cantidad = mysqli_num_rows($result);
                    for($i=0;$i<$cantidad;$i++){
                        $datos = mysqli_fetch_array($result);
                        echo("<option value='" . $datos['nombre'] . "'>" . $datos['nombre'] . "</option>");
                    }
                ?>
            </select><br><br>
            Correo electronico: <input type='email' name='mail' id='mail' onchange='comprobar3()'><br><br>
            Usuario: <input type='text' name='usu' id='usu' required>
            Contraseña: <input type='pass' name='pass' id='pass' required><br><br>
            <input type='submit' name='guardar' id='guardar' value='Guardar'>
        </form>
        <?php
            if(isset($_POST['guardar'])){
                $dni = $_POST['dni'];
                $nom = $_POST['nom'];
                $cat = $_POST['cat'];
                $fecha = $_POST['fecha'];
                $centro = $_POST['centro'];
                $mail = $_POST['mail'];
                $usu = $_POST['usu'];
                $pass = $_POST['pass'];
                $consulta = "insert into profesional (id_profesional,categoria,centro,fechaingreso,nombre,mail,usuario,contrasena) values('$dni','$cat','$centro','$fecha','$nom','$mail','$usu','$pass');";
                $result = mysqli_query($con,$consulta);
                if($result){
                    echo("
                        <script>
                            alert('Usuario registrado correctamente');
                            window.close('nuevousuario.php');
                        </script>
                    ");
                }
                else{
                    echo("
                        <script>
                            alert('Usuario no registrado, intentelo de nuevo');
                        </script>
                    ");
                }
            }
        ?>
    </body>
</html>