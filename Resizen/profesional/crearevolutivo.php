<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <style>
            #formulario{
                height:555px;
                padding-left:25px;
                overflow-y: scroll;
                background-color: rgb(204,232,255);
            }
            input[type="number"]{
                width:50px;
            }
            input[type="button"]{
                background-color: white;
                color: rgb(60,150,160);
            }
            #dni{
                visibility:hidden;
            }
        </style>
    </head>
    <body>
        <div id='formulario'>
            <h4>Evolutivo diario</h4>
            <?php
                sleep(1);
                session_start();
                require("conexion.php");
                $con = conexion("resizen");
                mysqli_set_charset($con, 'utf8');
                $idres = $_POST['idresidente'];
                $idpro = $_SESSION['idprofesional'];
                $consulta = "select nombre,apellidos from residentes where id_residente='$idres';";
                $consulta2 = "select nombre,categoria from profesional where id_profesional='$idpro';";
                $result = mysqli_query($con,$consulta);
                $result2 = mysqli_query($con,$consulta2);
                $datos = mysqli_fetch_array($result);
                $datos2 = mysqli_fetch_array($result2);
                echo("
                <form action='#' method='post'>
                Residente: <input type='text' name='nom' id='nom' value='".$datos['nombre'] . " " . $datos['apellidos']."' readonly='readonly'>
                <input type='text' name='dni' id='dni' value='".$idres."'><br><br>
                Profesional: <input type='text' name='nomp' id='nomp' value='".$datos2['nombre'] . "' readonly='readonly'>
                Categoria: <input type='text' name='cat' id='cat' value='". $datos2['categoria']."' readonly='readonly'><br><br>
                ");
                ?>
                Fecha: <input type='date' name='fecha' id='fecha' required>
                Turno: <select name='turno' id='turno' required>
                <?php
                    $accion = "select turno from turnos";
                    $result = mysqli_query($con,$accion);
                    while ($fila = mysqli_fetch_row($result)){ 
		                foreach ($fila as $valor){
                            echo("<option value='" . $valor . "'>".$valor."</option>");
                        }
	                }
                ?>
                </select><br><br>
                <p>Actividades</p>
                <textarea name='actv' id='actv' cols='75' rows='10' required></textarea><br><br>
                <p>Incidencias</p>
                <textarea name='inci' id='inci' cols='75' rows='10' required></textarea><br><br>
                Diuresis: <input type='number' name='pis' id='pis' required>
                Deposiciones: <select name='caca' id='caca' required>
                <?php
                    $accion = "select deposicion from tipodeposicion";
                    $result = mysqli_query($con,$accion);
                    while ($fila = mysqli_fetch_row($result)){ 
                        foreach ($fila as $valor){
                            echo("<option value='" . $valor . "'>".$valor."</option>");
                        }
                    }
                ?>
                </select>
                Numero de deposiciones: <input type='number' name='ncaca' id='ncaca' required><br><br>
                Cambios posturales: <select name='cpos' id='cpos' required>
                <?php
                    $accion = "select cambio from cambiosposturales";
                    $result = mysqli_query($con,$accion);
                    while ($fila = mysqli_fetch_row($result)){ 
                        foreach ($fila as $valor){
                            echo("<option value='" . $valor . "'>".$valor."</option>");
                        }
                    }
                ?>
                </select><br><br>
                <input type='button' name='crear' id='crear' value='Guardar' onclick='crearevolutivoext()'>
                <?php
                    echo("<button onclick='atrasdetalle(\"".$idres."\")'>Atras</button><br><br>");
                ?>
            </form>
        </div>   
    </body>
</html>