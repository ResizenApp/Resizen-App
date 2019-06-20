<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <style>
            #formulario{
                height:555px;
                overflow-y: scroll;
                padding-left:25px;
                background-color: rgb(204,232,255);
            }
            input[type="number"]{
                width:50px;
            }
            #dni{
                visibility:hidden;
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
                $idres = $_POST['id'];
                $idpro = $_SESSION['idprofesional'];
                $consulta = "select nombre,apellidos from residentes where id_residente='$idres';";
                $consulta2 = "select nombre,categoria from profesional where id_profesional='$idpro';";
                $result = mysqli_query($con,$consulta);
                $result2 = mysqli_query($con,$consulta2);
                $datos = mysqli_fetch_array($result);
                $datos2 = mysqli_fetch_array($result2);
                echo("
                <h4>Informe de valoracion</h4>
                <form action='#' method='post'>
                <input type='text' name='dni' id='dni' value='".$idres."'><br>
                Residente: <input type='text' name='nom' id='nom' value='".$datos['nombre'] . " " . $datos['apellidos']."' readonly='readonly'><br><br>
                Profesional: <input type='text' name='nomp' id='nomp' value='".$datos2['nombre'] . "' readonly='readonly' size='40'>
                Categoria: <input type='text' name='cat' id='cat' value='". $datos2['categoria']."' readonly='readonly'><br><br>
                Tipo de valoracion: <select name='tipo' id='tipo' required>");
                    $accion = "select tipoval from tipovaloracion";
                    $result = mysqli_query($con,$accion);
                    while ($fila = mysqli_fetch_row($result)){ 
		                foreach ($fila as $valor){
                            echo("<option value='" . $valor . "'>".$valor."</option>");
                        }
	                }
                echo("</select>
                Fecha: <input type='date' name='fecha' id='fecha' required><br><br>
                <p>Valoracion</p>
                <textarea name='val' id='val' cols='75' rows='10' required></textarea><br><br>
                <input type='button' name='crear' id='crear' value='Guardar' onclick='crearvaloracionext()'><br><br>
            </form>
            <button onclick='atrasvaloraciones(\"".$idres."\")'>Atras</button><br><br>");
            ?>
        </div>   
    </body>
</html>