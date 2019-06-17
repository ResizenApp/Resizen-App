<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <style>
            body{
                background-color: rgb(204,232,255);
            }
            button{
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
        <center><p>Insercion de nueva actividad</p></center>
        <form action='nuevaactividad.php' method='post'>
            Tipo de actividad: <input type='text' name='actv' id='actv'><br><br>
            Fecha de la actividad: <input type='date' name='fecha' id='fecha'>
            Lugar de la actividad: <input type='text' name='lugar' id='lugar'><br><br>
            <p>Descripcion de la actividad:</p>
            <textarea name='des' id='des' cols='85' rows='10'></textarea><br><br>
            <input type='submit' name='guardar' id='guardar' value='Guardar'>
        </form>
        <?php
            if(isset($_POST['guardar'])){
                require("conexion.php");
                $con = conexion("resizen");
                $tipo = $_POST['actv'];
                $fecha = $_POST['fecha'];
                $lugar = $_POST['lugar'];
                $des = $_POST['des'];
                $consulta = "insert into actividades (actividad,fecha,lugar,descripcion) values ('$tipo','$fecha','$lugar','$des');";
                $result = mysqli_query($con,$consulta);
                if($result){
                    echo("
                        <script>
                            alert('Actividad guardada correctamente');
                            window.opener.location.reload('principalprofesional.html');
                            self.close();
                        </script>
                    ");
                }
                else{
                    echo("
                        <script>
                            alert('Actividad no guardada, intentelo de nuevo');
                        </script>
                    ");
                }
            }
        ?>
    </body>
</html>