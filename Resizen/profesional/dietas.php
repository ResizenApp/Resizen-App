<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
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
            $consulta="select dieta from tipodieta";
            $result = mysqli_query($con,$consulta);
            $col = mysqli_num_rows($result);
            if($col>0){
            echo("<div id='formulario'>");
                echo("<center><p>Dietas y menus</p></center>");
                echo("<center><table>");
                    echo("<tr>");
                        echo("<th>Dieta</th>");
                        echo("<th>Menus</th>");
                echo("</tr>");
                for($i=0;$i<$col;$i++){
                    $datos = mysqli_fetch_array($result);
                    echo("<tr>");
                        echo("<td>" . $datos['dieta'] . "</td>");
                        if($_SESSION['categoria'] =="Auxiliar de enfermeria" || $_SESSION['categoria'] =="Familiar" ){
                            echo("<td>
                                <button onclick='mostrarmenu(\"". $datos['dieta']."\")'>Mostrar menu</button>
                            </td>");
                        }
                        else{
                            echo("<td>
                                    <button onclick='mostrarmenu(\"". $datos['dieta']."\")'>Mostrar menu</button>
                                    <button onclick='crearmenu(\"". $datos['dieta']."\")'>Crear menu</button>
                                </td>");
                        }
                    echo("</tr>");
                }
                echo("</table></center>");
            echo("</div>");
            }
            else{
                echo("<center><p>No hay residentes actualmente en la base de datos</p></center>");
            }
        ?>
        </div>
    </body>
</html>