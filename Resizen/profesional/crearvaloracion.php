<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <script src="jquery-3.3.1.min.js"></script>
        <script type="application/x-javascript">
            function salir(){
                window.close("crearvaloracion.php");
            }
        </script>
        <style>
            body{
                background-color: rgb(204,232,255);
            }
            #formulario{
                padding-left:25px;
            }
            input[type="number"]{
                width:50px;
            }
            #dni{
                visibility:hidden;
            }
            input[type="submit"]{
                background-color: white;
                color: rgb(60,150,160);
            }
            input[type="submit"]{
                background-color: white;
                color: rgb(60,150,160);
            }
        </style>
    </head>
    <body>
        <div id='formulario'>
            <?php
                session_start();
                require("conexion.php");
                $con = conexion("resizen");
                mysqli_set_charset($con, 'utf8');
                $idres = $_GET['idresidente'];
                $idpro = $_SESSION['idprofesional'];
                $consulta = "select nombre,apellidos from residentes where id_residente='$idres';";
                $consulta2 = "select nombre,categoria from profesional where id_profesional='$idpro';";
                $result = mysqli_query($con,$consulta);
                $result2 = mysqli_query($con,$consulta2);
                $datos = mysqli_fetch_array($result);
                $datos2 = mysqli_fetch_array($result2);
                echo("
                <h4>Informe de valoracion</h4>
                <form action='crearvaloracion.php?idresidente=".$idres."' method='post'>
                <input type='text' name='dni' id='dni' value='".$idres."'><br>
                Residente: <input type='text' name='nom' id='nom' value='".$datos['nombre'] . " " . $datos['apellidos']."' readonly='readonly'><br><br>
                Profesional: <input type='text' name='nomp' id='nomp' value='".$datos2['nombre'] . "' readonly='readonly' size='40'>
                Categoria: <input type='text' name='cat' id='cat' value='". $datos2['categoria']."' readonly='readonly'><br><br>
                ");
                ?>
                Tipo de valoracion: <select name='tipo' id='tipo' required>
                <?php
                    $accion = "select tipoval from tipovaloracion";
                    $result = mysqli_query($con,$accion);
                    while ($fila = mysqli_fetch_row($result)){ 
		                foreach ($fila as $valor){
                            echo("<option value='" . $valor . "'>".$valor."</option>");
                        }
	                }
                ?>
                </select>
                Fecha: <input type='date' name='fecha' id='fecha' required><br><br>
                <p>Valoracion</p>
                <textarea name='val' id='val' cols='75' rows='10' required></textarea><br><br>
                <input type='submit' name='crear' id='crear' value='Guardar'><br><br>
            </form>
            <?php
                if(isset($_POST['crear'])){
                    $idres = $idres;
                    $idpro = $_SESSION['idprofesional'];
                    $tipo = $_POST['tipo'];
                    $fecha = $_POST['fecha'];
                    $val = $_POST['val'];
                    $consulta = "insert into valoraciones (id_residente,id_profesional,tipo,fecha,valoracion) values ('$idres','$idpro','$tipo','$fecha','$val');";
                    $result = mysqli_query($con,$consulta);
                    if($result){
                        echo("
                            <script>
                                alert('Valoracion creada correctamente');
                                window.opener.location.reload('principalprofesional.html');
                                self.close();
                            </script>
                        ");
                    }
                    else{
                        echo("<script>alert('No se ha creado la validacion, revise e intentelo de nuevo');</script>");
                    }
                }
            ?>
        </div>   
    </body>
</html>