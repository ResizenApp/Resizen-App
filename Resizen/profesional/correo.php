<!DOCTYPE html>
<html>
    <head>
        <title>Residente</title>
        <style>
            #formulario{
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
        <div id='formulario'>
            <br><center>Mensaje de contacto con profesional de referencia</center><br><br>
            <form action='correo.php' method='POST'>
                Asunto: <input type='text' name='asun' id='asun'><br><br>
                <p>Mensaje</p>
                <textarea name='men' id='men' cols='75' rows='25' placeholder='Por favor indique el nombre de su familiar y su relacion con el'></textarea><br><br>
                <input type='submit' name='enviar' id='enviar' value='Enviar'>
            </form>
            <?php
                if(isset($_POST['enviar'])){
                    session_start();
                    require("conexion.php");
                    $con = conexion("resizen");
                    $asun = $_POST['asun'];
                    $men = $_POST['men'];
                    $usu = $_SESSION['usuario'];
                    $consulta = "select profesional,familiar from residentes where usuario='$usu';";
                    $result = mysqli_query($con,$consulta);
                    $datos = mysqli_fetch_array($result);
                    $nom = $datos['familiar'];
                    $id = $datos['profesional'];
                    $consulta2 = "select mail from profesional where id_profesional='$id';";
                    $result2 = mysqli_query($con,$consulta2);
                    $datos2 = mysqli_fetch_array($result2);
                    $desti = $datos2['mail'];
                    $correo = mail($desti,$asun,$men);
                    if($correo){
                        echo("
                            <script>
                                alert('Correo enviado');
                                window.close('correo.php');
                            </script>
                        ");
                    }
                }
            ?>
        </div>
    </body>
</html>