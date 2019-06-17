<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <style>
            #formulario{
                height:555px;
                overflow-y: scroll;
            }
            #usu{
                margin-left:25px;
            }
            th,td{
                border-collapse:collapse;
                width:300px;
                color: #8383bd;
            }
            tr:nth-child(odd){
                background-color: white;
            }
            tr:nth-child(even){
                background-color: rgb(203, 227, 228);
            }
            table{
                border:1px solid rgb(203, 227, 228);
                border-collapse:collapse;
            }
            input{
                border:2px solid rgb(52,181,177);
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
                $categoria = $_SESSION['categoria'];
                $idprofesional = $_SESSION['idprofesional'];
                if($categoria == "Administrador"){
                    $consulta="select id_profesional,nombre,categoria from profesional";
                    $result = mysqli_query($con,$consulta);
                    $col = mysqli_num_rows($result);
                    if($col>0){
                    echo("<center><p>Usuarios</p></center>");
                        echo("<center><table>");
                            echo("<tr>");
                                echo("<th>Nombre</th>");
                                echo("<th>Categoria</th>");
                                echo("<th>Acciones</th>");
                            echo("</tr>");
                        for($i=0;$i<$col;$i++){
                        $datos = mysqli_fetch_array($result);
                            echo("<tr>");
                                echo("<td>" . $datos['nombre'] . "</td>");
                                echo("<td>" . $datos['categoria'] . "</td>");
                                echo("<td>
                                    <button onclick='verusuario(\"". $datos['id_profesional'] ."\")'>Ver</button>
                                    <button onclick='modificarusuario(\"". $datos['id_profesional'] ."\")'>Modificar</button>
                                    <button onclick='borrarusuario(\"" . $datos['id_profesional'] . "\")'>Borrar</button>
                                </td>");
                            echo("</tr>");
                        }
                        echo("</table></center><br><br>");
                        echo("<center><button onclick='crearusuario()'>Nuevo usuario</button></center>");
                    }
                }
                else{
                    $consulta = "select * from profesional where id_profesional='$idprofesional'";
                    $result = mysqli_query($con,$consulta);
                    $datos = mysqli_fetch_array($result);
                    echo("
                        <center><p>Datos de usuario</p></center>
                        <form id='usu'>
                            <p>Datos personales</p>
                            DNI: <input type='text' name='dni' id='dni' value='".$datos['id_profesional']."' readonly='readonly'>
                            Nombre: <input type='text' name='nom' id='nom' value='".$datos['nombre']."' readonly='readonly'><br><br>
                            Categoria: <input type='text' name='cat' id='cat' value='".$datos['categoria']."' readonly='readonly'>
                            Fecha ingreso: <input type='date' name='fecha' id='fecha' value='".$datos['fechaingreso']."' readonly='readonly'>
                            Centro: <input type='text' name='centro' id='centro' value='".$datos['centro']."' readonly='readonly'><br><br>
                            Usuario: <input type='text' name='usu' id='usu' value='".$datos['usuario']."' readonly='readonly'>
                            Contraseña: <input type='text' name='text' id='fecha' value='".$datos['contrasena']."' readonly='readonly'><br><br>
                        </form>
                    ");
                }
            ?>
        </div>
    </body>
</html>