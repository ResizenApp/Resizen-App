<!DOCTYPE html>
<html>
    <head>
        <title>Nueva incidencia</title>
        <style>
            form{
                padding-left:25px;
            }
            body{
                background-color: rgb(204,232,255);
            }
            #id{
                visibility:hidden;
            }
            input[type="submit"]{
                background-color: white;
                color: rgb(60,150,160);
            }
        </style>
    </head>
    <body>
        <?php
            session_start();
            require("conexion.php");
            $con = conexion("resizen");
            mysqli_set_charset($con, 'utf8');
            $residente = $_GET['idresidente'];
            $pro = $_SESSION['idprofesional'];
            $consulta = "select nombre,apellidos from residentes where id_residente = '$residente';";
            $consulta2 = "select nombre,categoria from profesional where id_profesional='$pro';";
            $result = mysqli_query($con,$consulta);
            $result2 = mysqli_query($con,$consulta2);
            $datos = mysqli_fetch_array($result);
            $datos2 = mysqli_fetch_array($result2);
            echo("
                <form action='crearincidencia.php?idresidente=".$residente."' method='post'>
                    <p>Incidencia</p>
                    DNI: <input type='text' name='dni' id='dni' value='".$residente."' readonly='readonly'>
                    Residente: <input type='text' name='res' id='res' value='".$datos['nombre'] ." ".$datos['apellidos']."'><br><br>
                    Profesional: <input type='text' name='pro' id='pro' value='".$datos2['nombre'] ."' readonly='readonly'>
                    Categoria: <input type='text' name='cat' id='cat' value='".$datos2['categoria']."' readonly='readonly'><br><br>
                    Fecha de la incidencia: <input type='date' name='fecha' id='fecha'><br><br>
                    Lugar de la incidencia: <input type='text' name='lugar' id='lugar'><br><br>
                    Causa de la incidencia: <input name='causa' id='causa' rows='10' cols='40'><br><br>
                    <p>Descripcion de la incidencia</p>
                    <textarea name='des' id='des' rows='10' cols='40'></textarea><br><br>
                    <p>Atencion y cuidados</p>
                    <textarea name='aten' id='aten' rows='10' cols='40'></textarea><br><br>
                    <input type='submit' name='crear' id='crear' value='Guardar'>
                </form>
            ");
            if(isset($_POST['crear'])){
                $idres = $_POST['dni'];
                $idpro = $_SESSION['idprofesional'];
                $res = $_POST['res'];
                $pro = $_POST['pro'];
                $cat = $_POST['cat'];
                $fec = $_POST['fecha'];
                $lug = $_POST['lugar'];
                $causa = $_POST['causa'];
                $des = $_POST['des'];
                $aten = $_POST['aten'];
                $consulta3 = "insert into incidencias (id_residente,id_profesional,residente,profesional,categoria,fecha,lugar,causa,descripcion,atencion) values ('$idres','$idpro','$res','$pro','$cat','$fec','$lug','$causa','$des','$aten');";
                $result3 = mysqli_query($con,$consulta3) or die ('No se pudo guardar: ' . mysqli_error($con));
                if($result3){
                    echo("
                        <script>
                            alert('Insercion correcta');
                            window.close('crearincidencia.php');
                        </script>
                    ");
                }
                else{
                    echo("<script>alert('Insercion incorrecta');</script>");
                }
            }
        ?>
    </body>
</html>