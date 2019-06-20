<?php
    session_start();
?>
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
            #id{
                visibility:hidden;
            }
            input[type="button"]{
                background-color: white;
                color: rgb(60,150,160);
            }
        </style>
    </head>
    <body>
        <?php
            sleep(1);
            require("conexion.php");
            $con = conexion("resizen");
            mysqli_set_charset($con, 'utf8');
            $id = $_POST['idresidente'];
            $pro = $_SESSION['idprofesional'];
            $consulta = "select nombre,apellidos from residentes where id_residente='$id';";
            $consulta2 = "select nombre,categoria from profesional where id_profesional='$pro';";
            $result = mysqli_query($con,$consulta);
            $result2 = mysqli_query($con,$consulta2);
            $datos = mysqli_fetch_array($result);
            $datos2 = mysqli_fetch_array($result2);
        echo("
        <div id='formulario'>
        <center><p>Informe para residentes</p></center>
        <form action='#' method='post'>
            <input type='text' name='id' id='id' value='".$id."'><br>
            Residente: <input type='text' name='res' id='res' value='".$datos['nombre'] ." ".$datos['apellidos']."' readonly='readonly'><br><br>
            Profesional: <input type='text' name='npro' id='npro' value='".$datos2['nombre'] ."' readonly='readonly' size='40'>
            Categoria: <input type='text' name='cat' id='cat' value='". $datos2['categoria'] ."' readonly='readonly'><br><br>");
            ?>
            Fecha del informe: <input type='date' name='fecha' id='fecha' required><br><br>
            Lugar del informe: <input type='text' name='lugar' id='lugar' required><br><br>
            Tipo: <select name='tipo' id='tipo' required>
            <?php
                $accion = "select tipo from tipoinforme";
                $result = mysqli_query($con,$accion);
                while ($fila = mysqli_fetch_row($result)){ 
                    foreach ($fila as $valor){
                        echo "<option value='" . $valor . "'>".$valor."</option>";
                    }
                }
            ?>
            </select>
            <p>Descripcion:</p>
            <textarea name='des' id='des' cols='100' rows='15' required></textarea><br><br>
            <input type='button' name='crear' id='crear' value='Generar informe' onclick='informemedicoext()'>
            <button onclick='atrasinforme()'>Atras</button><br><br>
        </form>
        </div>
    </body>
</html>