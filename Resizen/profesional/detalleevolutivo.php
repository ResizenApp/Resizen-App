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
            session_start();
            require("conexion.php");
            $con = conexion("resizen");
            $evo = $_POST['id'];
            $consulta = "select * from evolutivos where id_evolutivo='$evo';";
            $result = mysqli_query($con,$consulta);
            $datos = mysqli_fetch_array($result);
            $idres = $datos['id_residente'];
            $consulta2 = "select nombre,apellidos from residentes where id_residente='$idres';";
            $result2 = mysqli_query($con,$consulta2);
            $datos2 = mysqli_fetch_array($result2);
            $idpro = $_SESSION['idprofesional'];
            $consulta3 = "select nombre,categoria from profesional where id_profesional='$idpro';";
            $result3 = mysqli_query($con,$consulta3);
            $datos3 = mysqli_fetch_array($result3);
            echo("
                <div id='formulario'>
                    <center><p>Evolutivo dia ".$datos['fecha'] . "</p></center>
                    <form>
                        Residente: <input type='text' value='".$datos2['nombre'] . " " . $datos2['apellidos'] ."' readonly='readonly'>
                        Fecha: <input type='date' value='".$datos['fecha'] . "' readonly='readonly'>
                        Turno: <input type='text' value='".$datos['turno'] . "' readonly='readonly'><br><br>
                        Profesional: <input type='text' value='".$datos3['nombre'] . "' readonly='readonly'>
                        Categoria: <input type='text' value='".$datos3['categoria'] . "' readonly='readonly'><br><br>
                        <p>Actividades</p>
                        <textarea>".$datos['actividades'] . "</textarea><br><br>
                        <p>Incidencias</p>
                        <textarea cols='40' rows='5'>".$datos['incidencias'] . "</textarea><br><br>
                        Diuresis: <input type='number' value='".$datos['diuresis'] . "' readonly='readonly' size='8'>
                        Deposiciones: <input type='text' value='".$datos['deposiciones'] . "' readonly='readonly' size='12'>
                        Numero de deposiciones: <input type='number' value='".$datos['num_depo'] . "' readonly='readonly' size='8'><br><br>
                        Cambios posturales: <input type='text' value='".$datos['cambiosposturales'] . "' readonly='readonly'><br><br>
                    </form>
                    <button onclick='atrasdetalle(\"".$idres."\")'>Atras</button><br><br>
                </div>
            ");
        ?>
    </body>
</html>