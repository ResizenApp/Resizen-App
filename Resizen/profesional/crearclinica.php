<!DOCTYPE html>
<html>
    <head>
        <style>
            #formulario{
                height:555px;
                overflow-y: scroll;
                background-color: rgb(204,232,255);
            }
            #for{
                padding-left:25px;
                padding-top:25px;
            }
            input[type="button"]{
                background-color: white;
                color: rgb(60,150,160);
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
                $id = $_POST['idresidente'];
                $consulta = "select nombre,apellidos from residentes where id_residente='$id';";
                $result = mysqli_query($con,$consulta);
                $datos = mysqli_fetch_array($result);
                echo("
                    <form id='for' method='#'>
                        Nombre:<input type='text' name='nom' id='nom' value='".$datos['nombre']." ".$datos['apellidos']."' readonly='readonly'>
                        Identificador residente: <input type='text' name='dni' id='dni' value='".$id."' readonly='readonly'><br><br>
                        Patologia: <input type='text' name='pat' id='pat'><br><br>
                        Tratamiento: <input type='text' name='tra' id='tra'><br><br>
                        <input type='button' name='creaclinica' id='creaclinica' value='Crear' onclick='crea()'>
                    </form>
                ");
            ?>
        </div>
    </body>
</html>