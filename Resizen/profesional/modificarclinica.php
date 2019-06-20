<?php
    session_start();
?>
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
            input[type="button"]{
                background-color: white;
                color: rgb(60,150,160);
            }
            #id{
                visibility:hidden;
            }
        </style>
    </head>
    <body>
        <?php
            sleep(1);
            require("conexion.php");
            $id = $_POST['id'];
            $con = conexion("resizen");
            $consulta = "select * from clinica where id_clinica='$id'";
            $result = mysqli_query($con,$consulta);
            $datos = mysqli_fetch_array($result);
            echo("
                <div id='formulario'>
                    <center><p>Datos de usuario</p></center>
                    <form action='#' method='post'>
                        Sintomatologia: <input type='text' name='sin' id='sin' value='".$datos['enfermedades']."' readonly='readonly'><br><br>
                        Medicacion: <input type='text' name='med' id='med' value='".$datos['tratamiento']."'>
                        <input type='text' name='id' id='id' value='".$id."'><br><br>
                        <input type='button' name='modificar' id='modificar' value='Modificar' onclick='modificarclinicaext()'>
                        <button onclick='atrasclinica()'>Atras</button><br>
                    </form>
                </div>
            ");
        ?>
    </body>
</html>