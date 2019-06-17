<!DOCTYPE html>
<html>
    <head>
        <title>Residente</title>
        <style>
            #formulario{
                height:555px;
                padding-left:25px;
                overflow-y: scroll;
                background-color: rgb(204,232,255);
            }
            .foto{
                padding-left: 50px;
                padding-right: 50px;
            }
            input{
                border:2px solid rgb(52,181,177);
            }
        </style>
    </head>
    <body>
        <?php
            sleep(1);
            $dato = $_POST['datos'];
            require("conexion.php");
            $con = conexion("resizen");
            $consulta = "select * from profesional where id_profesional='$dato'";
            $result = mysqli_query($con,$consulta);
            $datos = mysqli_fetch_array($result);
            echo("
                <div id='formulario'>
                    <center><p>Datos de usuario</p></center>
                    <p>Datos personales</p>
                    <form>
                        DNI: <input type='text' name='dni' id='dni' value='".$datos['id_profesional']."' readonly='readonly'>
                        Nombre: <input type='text' name='nom' id='nom' value='".$datos['nombre']."' readonly='readonly'><br><br>
                        Categoria: <input type='text' name='cat' id='cat' value='".$datos['categoria']."' readonly='readonly'>
                        Fecha ingreso: <input type='date' name='fecha' id='fecha' value='".$datos['fechaingreso']."' readonly='readonly'>
                        Centro: <input type='text' name='centro' id='centro' value='".$datos['centro']."' readonly='readonly'><br><br>
                        correeo electronico de contacto: <input type='mail' name='centro' id='mail' value='".$datos['mail']."' readonly='readonly'><br><br>
                        Usuario: <input type='text' name='usu' id='usu' value='".$datos['usuario']."' readonly='readonly'>
                        Contraseña: <input type='text' name='text' id='fecha' value='".$datos['contrasena']."' readonly='readonly'><br><br>
                    </form>
                    <button onclick='atrasusuario()'>Atras</button><br><br>
                </div>
            ");
        ?>
    </body>
</html>