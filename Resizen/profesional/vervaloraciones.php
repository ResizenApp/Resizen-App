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
        </style>
    </head>
    <body>
        <?php
            sleep(1);
            session_start();
            require("conexion.php");
            $con = conexion("resizen");
            $val = $_POST['idval'];
            $pro = $_SESSION['idprofesional'];
            $consulta2 = "select nombre,categoria from profesional where id_profesional='$pro';";
            $consulta3 ="select id_residente,tipo,fecha,valoracion from valoraciones where id_valoracion ='$val';";
            $result2 = mysqli_query($con,$consulta2);
            $result3 = mysqli_query($con,$consulta3);
            $datos2 = mysqli_fetch_array($result2);
            $datos3 = mysqli_fetch_array($result3);
            $id = $datos3['id_residente'];
            $consulta = "select nombre,apellidos from residentes where id_residente='$id';";
            $result = mysqli_query($con,$consulta);
            $datos = mysqli_fetch_array($result);
            echo("
            <div id='formulario'>
                <form>
                    <center><p>Valoracion de residente</p></center>
                    <p>Residente</p>
                    Nombre: <input type='text' name='nom' id='nom' value='".$datos['nombre']."' readonly='readonly'>
                    Apellidos: <input type='text' name='ape' id='ape' value='".$datos['apellidos']."' readonly='readonly'><br><br>
                    <p>Profesional</p>
                    Nombre: <input type='text' name='nomp' id='nomp' value='".$datos2['nombre']."'  readonly='readonly' size='25'>
                    Categoria: <input type='text' name='apep' id='apep' value='".$datos2['categoria']."' readonly='readonly'><br><br>
                    Tipo: <input type='text' name='tipo' id='tipo' value='".$datos3['tipo']."' readonly='readonly'>
                    Fecha: <input type='date' name='fecha' id='fecha' value='".$datos3['fecha']."' readonly='readonly'><br><br>
                    <p>valoracion</p>
                    <textarea readonly='readonly' cols='75' rows='10'>".$datos3['valoracion']."</textarea><br><br>
                </form>
                <button onclick='atrasvaloraciones(\"".$id."\")'>Atras</button>
            </div>
            ");
        ?>
    </body>
</html>