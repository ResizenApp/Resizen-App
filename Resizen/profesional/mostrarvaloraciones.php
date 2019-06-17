<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
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
                require("conexion.php");
                $con = conexion("resizen");
                $id = $_POST['id'];
                $consulta = "select residentes.nombre,residentes.apellidos,valoraciones.id_valoracion,valoraciones.tipo,valoraciones.fecha from valoraciones inner join residentes on residentes.id_residente='$id';";
                $result = mysqli_query($con,$consulta);
                $col = mysqli_num_rows($result);
                if($col>0){
                    echo("<center><p>Valoraciones de Residentes</p></center>");
                    echo("<center><table>");
                        echo("<tr>");
                            echo("<th>Nombre</th>");
                            echo("<th>Tipo</th>");
                            echo("<th>Fecha</th>");
                        echo("</tr>");
                    for($i=0;$i<$col;$i++){
                    $datos = mysqli_fetch_array($result);
                        echo("<tr>");
                            echo("<td>". $datos['nombre'] . " " . $datos['apellidos'] . "</td>");
                            echo("<td>" . $datos['tipo'] . "</td>");
                            echo("<td>" . $datos['fecha'] . "</td>");
                            echo("<td><button onclick='vervaloraciones(". $datos['id_valoracion'] .")'>Ver</button></td>");
                        echo("</tr>");
                    }
                    echo("
                        </table>
                        <button onclick='atrasmostrarvaloraciones()'>Atras</button>
                        </center><br><br>
                    ");
                }
                else{
                    echo("
                        <center>
                            <p>El residente no tiene valoraciones que mostrar</p>
                            <button onclick='atrasmostrarvaloraciones()'>Atras</button>
                        </center>
                    ");
                }
            ?>
        </div>
    </body>
</html>