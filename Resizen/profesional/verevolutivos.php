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
            $consulta = "select residentes.nombre,residentes.apellidos,evolutivos.id_evolutivo,evolutivos.turno,evolutivos.fecha from residentes inner join evolutivos where residentes.id_residente='$id';";
            $result = mysqli_query($con,$consulta);
            $col = mysqli_num_rows($result);
            if($col>0){
                echo("<center><h3>Evolutivos actuales</h3></center>");
                echo("<center><table>");
                    echo("<tr>");
                        echo("<th>Nombre</th>");
                        echo("<th>Apellidos</th>");
                        echo("<th>Turno</th>");
                        echo("<th>Fecha</th>");
                    echo("</tr>");
                for($i=0;$i<$col;$i++){
                    $datos = mysqli_fetch_array($result);
                    echo("<tr>");
                        echo("<td>" . $datos['nombre'] . "</td>");
                        echo("<td>" . $datos['apellidos'] . "</td>");
                        echo("<td>" . $datos['turno'] . "</td>");
                        echo("<td>" . $datos['fecha'] . "</td>");
                        echo("<td>
                            <button onclick='detalleevolutivo(". $datos['id_evolutivo'] .")'>Detalles</button>
                        </td>");
                    echo("</tr>");
                }
                echo("</table></center><br><br>");
                echo("<center><button class='boton' onclick='atrasevolutivo()'>Atras</button></center><br><br>");
            }
            else{
                echo("<center>
                <p>No dispone de evolutivos que consultar</p>
                <button class='boton' onclick='atrasevolutivo()'>Atras</button></center><br><br>
            ");
            }
        ?>
        </div>
    </body>
</html>