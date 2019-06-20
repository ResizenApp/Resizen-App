<!DOCTYPE html>
<html>
    <head>
        <title>Nuevo residente</title>
        <script src="jquery-3.3.1.min.js"></script>
        <script type="application/x-javascript"></script>
        </script>
        <style>
            #formulario{
                height:555px;
                overflow-y: scroll;
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
       </style>
    </head>
    <body>
        <div id='formulario'>
            <?php
                sleep(1);
                session_start();
                require("conexion.php");
                $con = conexion("resizen");
                $usu = $_SESSION['usuario'];
                $consulta = "select id_residente,nombre,apellidos from residentes where usuario='$usu';";
                $result = mysqli_query($con,$consulta);
                $col = mysqli_num_rows($result);
                if($col>0){
                    echo("<center><p>Familiares internos</p></center>");
                        echo("<center><table>");
                            echo("<tr>");
                                echo("<th>Nombre</th>");
                                echo("<th>Apellidos</th>");
                                echo("<th>Acciones</th>");
                            echo("</tr>");
                        for($i=0;$i<$col;$i++){
                        $datos = mysqli_fetch_array($result);
                            echo("<tr>");
                                echo("<td>" . $datos['nombre'] . "</td>");
                                echo("<td>" . $datos['apellidos'] . "</td>");
                                echo("<td><button onclick='mostrarincidencias(\"". $datos['id_residente']."\")'>Mostrar</button></td>");
                            echo("</tr>");
                        }
                    echo("</table></centre>");
                }
            ?>
        </div>
    </body>
</html>