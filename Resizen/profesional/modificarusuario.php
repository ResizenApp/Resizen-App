<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Residente</title>
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
        <?php
            sleep(1);
            require("conexion.php");
            $id = $_POST['idprofesional'];
            $con = conexion("resizen");
            $consulta = "select * from profesional where id_profesional='$id'";
            $result = mysqli_query($con,$consulta);
            $datos = mysqli_fetch_array($result);
            echo("
                <div id='formulario'>
                    <center><p>Datos de usuario</p></center>
                    <form action='#' method='post' onsubmit='comprobar4()'>
                        DNI: <input type='text' name='dni' id='dni' value='".$datos['id_profesional']."' readonly='readonly'>
                        Nombre: <input type='text' name='nom' id='nom' value='".$datos['nombre']."' readonly='readonly'><br><br>
                        Categoria: <select name='cat' id='cat'>");
                            $accion = "select categoria from categorias";
                            $result = mysqli_query($con,$accion);
                            while ($fila = mysqli_fetch_row($result)){ 
                                foreach ($fila as $valor){
                                    if($valor == $datos['categoria']){
                                        echo("<option value='" . $valor . "' selected>".$valor."</option>");
                                    }
                                    else{
                                        echo("<option value='" . $valor . "'>".$valor."</option>");
                                    }
                                }
                            }
                        echo("</select>
                        Fecha ingreso: <input type='date' name='fecha' id='fecha' value='".$datos['fechaingreso']."' readonly='readonly'>
                        Centro: <select id='centro' name='centro'>");
                            $accion = "select nombre from centros";
                            $result = mysqli_query($con,$accion);
                            while ($fila = mysqli_fetch_row($result)){ 
                                foreach ($fila as $valor){
                                    if($valor == $datos['centro']){
                                        echo("<option value='" . $valor . "' selected>".$valor."</option>");
                                    }
                                    else{
                                        echo("<option value='" . $valor . "'>".$valor."</option>");
                                    }
                                }   
                            }
                        echo("</select><br><br>
                        Correo electronico: <input type='email' name='email' id='email' value='".$datos['mail']."' onchange='comprobar4()'><br><br>
                        Usuario: <input type='text' name='usu' id='usu' value='".$datos['usuario']."'>
                        Contraseña: <input type='password' name='pass' id='pass' value='".$datos['contrasena']."'><br><br>
                        <input type='button' name='modificar' id='modificar' value='Modificar' onclick='modificarusuarioext()'>
                        <button onclick='atrasusuario()'>Atras</button><br><br>
                    </form>
                </div>
            ");
            ?>
    </body>
</html>