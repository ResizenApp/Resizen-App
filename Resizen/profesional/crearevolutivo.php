<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <script src="jquery-3.3.1.min.js"></script>
        <script type="application/x-javascript">
            function salir(){
                window.close("crearevolutivo.php");
            }
        </script>
        <style>
            body{
                background-color: rgb(204,232,255);
            }
            #formulario{
                height:555px;
                padding-left:25px;
            }
            input[type="number"]{
                width:50px;
            }
            input[type="submit"]{
                background-color: white;
                color: rgb(60,150,160);
            }
        </style>
    </head>
    <body>
        <div id='formulario'>
            <h4>Evolutivo diario</h4>
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
                <form action='crearevolutivo.php?idresidente=".$idres."' method='post'>
                Residente: <input type='text' name='nom' id='nom' value='".$datos['nombre'] . " " . $datos['apellidos']."' readonly='readonly'><br><br>
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
                <input type='submit' name='crear' id='crear' value='Guardar'><br><br>
            </form>
            <?php
                if(isset($_POST['crear'])){
                    $idres = $idres;
                    $idpro = $_SESSION['idprofesional'];
                    $fec = $_POST['fecha'];
                    $turno = $_POST['turno'];
                    $actv = $_POST['actv'];
                    $inci = $_POST['inci'];
                    $pis = $_POST['pis'];
                    $caca = $_POST['caca'];
                    $ncaca = $_POST['ncaca'];
                    $cpos = $_POST['cpos'];
                    $consulta = "insert into evolutivos (id_residente,id_profesional,fecha,turno,actividades,incidencias,diuresis,deposiciones,num_depo,cambiosposturales) values ('$idres','$idpro','$fec','$turno','$actv','$inci',$pis,'$caca',$ncaca,'$cpos');";
                    $result = mysqli_query($con,$consulta);
                    if($result){
                        echo("
                            <script>
                                alert('Evolutivo guardado');
                                window.opener.location.reload('principalprofesional.html');
                                self.close();
                            </script>
                        ");
                    }
                    else{
                        echo("
                            <script>
                                alert('No se ha podido guardar, intentelo de nuevo');
                            </script>
                        ");
                    }
                }
            ?>
        </div>   
    </body>
</html>