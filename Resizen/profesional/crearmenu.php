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
                $tipo = $_GET['tipodieta'];
                echo("
                <center><p>Crear menu dieta: ".$tipo." </p></center>
                <form action='crearmenu.php?tipodieta=".$tipo."' method='post'>
                    Tipo de dieta: <input type='text' name='tipo' id='tipo' value='".$tipo."'>");
            ?>
                    Fecha del menu: <input type='date' name='fecha' id='fecha' required><br><br>
                    </select>
                    <p>Desayuno</p>
                    <textarea name='des' id='des' cols='50' rows='3' required></textarea><br><br>
                    <p>Almuerzo</p>
                    <textarea name='alm' id='alm' cols='50' rows='3' required></textarea><br><br>
                    <p>Comida</p>
                    <textarea name='com' id='com' cols='50' rows='3' required></textarea><br><br>
                    <p>Merienda</p>
                    <textarea name='mer' id='mer' cols='50' rows='3' required></textarea><br><br>
                    <p>Cena</p>
                    <textarea name='cen' id='cen' cols='50' rows='3' required></textarea><br><br>
                    <input type='submit' name='crear' id='crear' value='Crear'>
                </form>
            <?php
                if(isset($_POST['crear'])){
                    $dieta = $_POST['tipo'];
                    $fecha = $_POST['fecha'];
                    $des = $_POST['des'];
                    $alm = $_POST['alm'];
                    $com = $_POST['com'];
                    $mer = $_POST['mer'];
                    $cen = $_POST['cen'];
                    $consulta = "insert into dietamenu (tipodieta,fecha,desayuno,almuerzo,comida,merienda,cena) values ('$dieta','$fecha','$des','$alm','$com','$mer','$cen');";
                    $result = mysqli_query($con,$consulta);
                    if($result){
                        echo("
                            <script>
                                alert('Menu creado correctamente');
                                window.opener.location.reload('principalprofesional.html');
                                self.close();
                            </script>
                        ");
                    }
                    else{
                        echo("
                            <script>
                                alert('El menu no se ha creado correctamente, intentelo de nuevo');
                            </script>
                        ");
                    }
                }
            ?>
        </div>   
    </body>
</html>