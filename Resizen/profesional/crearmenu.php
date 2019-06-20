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
            #formulario{
                height:555px;
                padding-left:25px;
                overflow-y: scroll;
                background-color: rgb(204,232,255);
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
                $tipo = $_POST['tipodieta'];
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
                    <input type='button' name='crear' id='crear' value='Crear' onclick='crearmenuext()'>
                </form><br><br>
                <button onclick='atrasdieta()'>Atras</button><br><br>
        </div>   
    </body>
</html>