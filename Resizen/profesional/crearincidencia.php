<!DOCTYPE html>
<html>
    <head>
        <title>Nueva incidencia</title>
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
        </style>
    </head>
    <body>
        <div id='formulario'>
        <?php
            sleep(1);
            session_start();
            require("conexion.php");
            $con = conexion("resizen");
            mysqli_set_charset($con, 'utf8');
            $residente = $_POST['id'];
            $pro = $_SESSION['idprofesional'];
            $consulta = "select nombre,apellidos from residentes where id_residente = '$residente';";
            $consulta2 = "select nombre,categoria from profesional where id_profesional='$pro';";
            $result = mysqli_query($con,$consulta);
            $result2 = mysqli_query($con,$consulta2);
            $datos = mysqli_fetch_array($result);
            $datos2 = mysqli_fetch_array($result2);
            echo("
                <form action='#' method='post'>
                    <p>Incidencia</p>
                    DNI: <input type='text' name='dni' id='dni' value='".$residente."' readonly='readonly'>
                    Residente: <input type='text' name='res' id='res' value='".$datos['nombre'] ." ".$datos['apellidos']."'><br><br>
                    Profesional: <input type='text' name='pro' id='pro' value='".$datos2['nombre'] ."' readonly='readonly'>
                    Categoria: <input type='text' name='cat' id='cat' value='".$datos2['categoria']."' readonly='readonly'><br><br>
                    Fecha de la incidencia: <input type='date' name='fecha' id='fecha'><br><br>
                    Lugar de la incidencia: <input type='text' name='lugar' id='lugar'><br><br>
                    Causa de la incidencia: <input name='causa' id='causa' rows='10' cols='40'><br><br>
                    <p>Descripcion de la incidencia</p>
                    <textarea name='des' id='des' rows='10' cols='75'></textarea><br><br>
                    <p>Atencion y cuidados</p>
                    <textarea name='aten' id='aten' rows='10' cols='75'></textarea><br><br>
                    <input type='button' name='crear' id='crear' value='Guardar' onclick='crearincidenciaext()'>
                    <button onclick='atrasincidencias(\"".$residente."\")'>Atras</button><br><br> 
                </form>
            ");
        ?>
        </div>
    </body>
</html>