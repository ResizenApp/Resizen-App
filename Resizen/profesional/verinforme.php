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
        <?php
            sleep(1);
            require("conexion.php");
            $con = conexion("resizen");
            $id = $_POST['idinforme'];
            $consulta = "select * from informes where id_informe = '$id';";
            $result = mysqli_query($con,$consulta);
            $datos = mysqli_fetch_array($result);
            echo("
            <div id='formulario'>
                <form>
                    <center><p><ins>Informe</ins></p></center>
                    Residente: <input type='text' name='res' readonly='readonly' value='".$datos['nombre']."'>
                    Fecha: <input type='date' name='fecha' readonly='readonly' value='".$datos['fecha']."'><br><br>
                    Profesional: <input type='text' name='pro' readonly='readonly' value='".$datos['profesional']."'>
                    Categoria: <input type='text' name='cat' readonly='readonly' value='".$datos['categoria']."'><br><br>
                    Lugar: <input type='text' name='lugar' readonly='readonly' value='".$datos['lugar']."'>
                    Tipo de informe: <input type='text' name='tipo' readonly='readonly' value='".$datos['tipo']."'><br><br>
                    Descripcion: <br>
                    <textarea name='des' readonly='readonly' rows='10' cols='40'>".$datos['descripcion']."</textarea><br><br>
                </form>
                <button onclick='atrasverinforme(\"".$datos['id_residente']."\")'>Atras</button><br><br>
            </div>
            ");
        ?>
    </body>
</html>