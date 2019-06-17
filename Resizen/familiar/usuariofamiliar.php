<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <style>
            #formulario{
                height:555px;
                background-color: rgb(204,232,255);
                overflow-y: scroll;
            }
            #usu{
                margin-left:25px;
            }
            th,td{
                border-collapse:collapse;
                width:300px;
                color: #8383bd;
            }
            tr:nth-child(odd){
                background-color: white;
            }
            tr:nth-child(even){
                background-color: rgb(203, 227, 228);
            }
            table{
                border:1px solid rgb(203, 227, 228);
                border-collapse:collapse;
            }
            input{
                border:2px solid rgb(52,181,177);
            }
       </style>
    </head>
    <body>
        <div id='formulario'>
            <?php
                sleep(1);
                session_start();
                require("conexion.php");
                $con = conexion("resizen");
                $usu = $_SESSION['usuario'];
                $consulta = "select familiar,relacionfamiliar,usuario,contrasena from residentes where usuario='$usu';";
                $result = mysqli_query($con,$consulta);
                $datos = mysqli_fetch_array($result);
                echo("
                    <center><p>Datos personales de usuario</p></center>
                    <form id='usu'>
                        <p>Nombre:</p>
                        <input type='text' name='nom' id='nom' value='".$datos['familiar']."' readonly='readonly'><br><br>
                        <p>Relacion con el residente:</p>
                        <input type='text' name='rel' id='rel' value='".$datos['relacionfamiliar']."'>
                        <p>Usuario:</p>
                        <input type='text' name='usuario' id='usuario' value='".$datos['usuario']."' readonly='readonly'><br><br>
                        <p>Contraseña:</p>
                        <input type='text' name='text' id='fecha' value='".$datos['contrasena']."' readonly='readonly'><br><br>
                    </form>
                    <center>
                        <button onclick='modificarfamiliar()'>Modificar</button>
                    </center>
                ");
                ?>
        </div>
    </body>
</html>