<!DOCTYPE html>
<html>
    <head>
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
                if($col>1){
                    echo("<center><p>Informes de residentes</p></center>");
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
                                echo("<td>
                                    <button onclick='mostrarinformes(\"". $datos['id_residente']."\")'>Mostrar</button></td>");
                                echo("</tr>");
                        }
                    echo("</table></centre>");
                }
                else{
                    $consulta2 = "select id_informe,nombre,fecha,tipo from informes where id_residente=(select id_residente from residentes where usuario='$usu');";
                    $result2 = mysqli_query($con,$consulta2);
                    $datos = mysqli_fetch_array($result2);
                    $col = mysqli_num_rows($result2);
                    echo("<center><p>Informes de residente: ".$datos['nombre']."</p></center>");
                        echo("<center><table>");
                            echo("<tr>");
                                echo("<th>Fecha</th>");
                                echo("<th>Tipo</th>");
                                echo("<th>Acciones</th>");
                            echo("</tr>");
                        for($i=0;$i<$col;$i++){
                             echo("<tr>");
                                echo("<td>" . $datos['fecha'] . "</td>");
                                echo("<td>" . $datos['tipo'] . "</td>");
                                echo("<td>
                                    <button onclick='verinforme(\"". $datos['id_informe']."\")'>Mostrar</button></td>");
                                echo("</tr>");
                        }
                    echo("</table></centre>");

                }
            ?>
        </div>
    </body>
</html>