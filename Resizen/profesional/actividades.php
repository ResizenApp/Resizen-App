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
            $consulta="select id_actividades,actividad,fecha,lugar from actividades";
            $result = mysqli_query($con,$consulta);
            $col = mysqli_num_rows($result);
            if($col>0){
                echo("<center><p>Agenda de Actividades</p></center>");
                echo("<center><table>");
                    echo("<tr>");
                        echo("<th>Actividad</th>");
                        echo("<th>Fecha</th>");
                        echo("<th>Lugar</th>");
                        echo("<th>Acciones</th>");
                    echo("</tr>");
                for($i=0;$i<$col;$i++){
                $datos = mysqli_fetch_array($result);
                    echo("<tr>");
                        echo("<td>" . $datos['actividad'] . "</td>");
                        echo("<td>" . $datos['fecha'] . "</td>");
                        echo("<td>" . $datos['lugar'] . "</td>");
                        echo("<td><button onclick='veractividad(\"". $datos['id_actividades']."\")'>Ver Actividad</button></td>");
                    echo("</tr>");
                }
                echo("</table></center><br>");
            }
            if($_SESSION['categoria']!="Auxiliar de enfermeria" && $_SESSION['categoria']!="Familiar"){
                echo("<center><button onclick='nuevaactividad()'>Nueva Actividad</button></center>");
            }
        ?>
        </div>
    </body>
</html>