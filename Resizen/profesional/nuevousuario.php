<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <style>
            #formulario{
                padding-left:25px;
                height:555px;
                background-color: rgb(204,232,255);
                overflow-y: scroll;
            }
            input[type="button"]{
                background-color: white;
                color: rgb(60,150,160);
            }
        </style>
    </head>
    <body>
        <?php
            sleep(1);
        ?>
        <div id='formulario'>
            <center><p>Insercion de nuevo usuario</p></center>
            <form action='#' method='post'>
                Nombre completo:<input type='text' name='nombre' id='nombre' size='60' required onchange="comprobar2()"><br><br>
                DNI profesional: <input type='text' name='dni' id='dni' required onchange="comprobar()">
                Categoria profesional: <select type='text' name='cat' id='cat' required>
                <?php
                    require("conexion.php");
                    $con = conexion("resizen");
                    $accion = "select categoria from categorias;";
                    $result = mysqli_query($con,$accion);
                    $cantidad = mysqli_num_rows($result);
                    for($i=0;$i<$cantidad;$i++){
                        $datos = mysqli_fetch_array($result);
                        echo("<option value='" . $datos['categoria'] . "'>" . $datos['categoria'] . "</option>");
                    }
                ?>
                </select><br><br>
                Fecha de ingreso: <input type='date' name='fecha' id='fecha' required>
                Centro de trabajo: <select name='centro' id='centro' required>
                <?php
                    $accion = "select nombre from centros;";
                    $result = mysqli_query($con,$accion);
                    $cantidad = mysqli_num_rows($result);
                    for($i=0;$i<$cantidad;$i++){
                        $datos = mysqli_fetch_array($result);
                        echo("<option value='" . $datos['nombre'] . "'>" . $datos['nombre'] . "</option>");
                    }
                ?>
                </select><br><br>
                Correo electronico: <input type='email' name='email' id='email' onchange="comprobar4()"><br><br>
                Usuario: <input type='text' name='usu' id='usu' required>
                Contraseña: <input type='password' name='pass' id='pass' required><br><br>
                <input type='button' name='guardar' id='guardar' value='Guardar' onclick='crearusuarioext()'>
                <button onclick='atrasusuario()'>Atras</button><br><br>
            </form>
        </div>
    </body>
</html>