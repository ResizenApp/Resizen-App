<!DOCTYPE html>
<html>
    <head>
        <title>Residente</title>
        <style>
            #formulario{
                padding-left:25px;
                background-color: rgb(204,232,255);
                overflow-y: scroll;
            }
            input[type="button"]{
                background-color: white;
                color: rgb(60,150,160);
            }
            #for{
                padding-left:25px;
                padding-top:25px;
            }
        </style>
    </head>
    <body>
        <div id='formulario'>
            <br><center>Mensaje de contacto con familiar de referencia</center><br><br>
            <?php
                sleep(1);
                session_start();
                require("conexion.php");
                $con = conexion("resizen");
                $mail = $_POST['mail'];
                $consulta = "select nombre,apellidos from residentes where mailcontacto='$mail';";
                $result = mysqli_query($con,$consulta);
                $datos = mysqli_fetch_array($result);
                echo("
                    <form id='for' method='#'>
                        Residente: <input type='text' name='nom' id='nom' value='".$datos['nombre']." ". $datos['apellidos']."' readonly='readonly'><br><br>
                        Para: <input type='mail' name='dest' id='dest' value='".$mail."' readonly='readonly'><br><br>
                        Asunto: <input type='text' name='asunto' id='asunto'><br><br>
                        <p>Mensaje</p>
                        <textarea name='correo' id='correo' cols='75' rows='25'></textarea><br><br>
                        <input type='button' name='enviar' id='enviar' value='Enviar' onclick='enviarmail()'>
                    </form>
                ");
            ?>
        </div>
    </body>
</html>