<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <style>
            #formulario{
                height:555px;
                padding-left:25px;
                overflow-y: scroll;
                background-color: rgb(204,232,255);
            }
            input{
                border:2px solid rgb(52,181,177);
            }
            textarea{
                border:2px solid rgb(52,181,177);
                max-width:350px; 
                max-height:75px;
                min-width:350px;
                min-height:75px;
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
            $id = $_POST['id'];
            $consulta = "select * from actividades where id_actividades = '$id';";
            $result = mysqli_query($con,$consulta);
            $datos = mysqli_fetch_array($result);
            echo("
                <center><p>Actividades</p></center>
                <form>
                    Actividad: <input type='text' name='actv' value='".$datos['actividad']."' readonly='readonly'><br><br>
                    Fecha: <input type='date' name='fecha' readonly='readonly' value='".$datos['fecha']."'><br><br>
                    Lugar:<input type='text' name='lkugar' value='".$datos['lugar']."' readonly='readonly'><br><br>
                    <p>Descripcion</p>
                    <textarea readonly='readonly' rows='10' cols='40' readonly='readonly'>".$datos['descripcion']."</textarea>
                </form><br>
                <button onclick='atrasactividad()'>Atras</button><br><br>
            ");
        ?>
        </div>
    </body>
</html>