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
            $consulta = "select id_residente,nombre,apellidos from residentes";
            $result = mysqli_query($con,$consulta);
            $col = mysqli_num_rows($result);
            if($col>0){
                echo("<center><p>Evolutivos de residentes</p></center>");
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
                            <button onclick='verevolutivos(\"". $datos['id_residente'] ."\")'>Ver</button>
                            <button onclick='crearevolutivos(\"". $datos['id_residente'] ."\")'>Crear</button>
                        </td>");
                    echo("</tr>");
                }
                echo("</table></center><br><br>");
            }
        ?>
        </div>
    </body>
</html>