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
        <?php
            sleep(1);
            session_start();
            require("conexion.php");
            $con = conexion("resizen");
            $categoria = $_SESSION['categoria'];
            $consulta = "select id_residente,nombre,apellidos from residentes";
            $result = mysqli_query($con,$consulta);
            $col = mysqli_num_rows($result);
            if($col>0){
                echo("<div id='formulario'>");
                echo("<center><p>Listado de residentes</p></center>");
                echo("<center><table>");
                    echo("<tr>");
                        echo("<th id='col'>Nombre</th>");
                        echo("<th id='col'>Apellidos</th>");
                        echo("<th id='bot'>Acciones</th>");
                    echo("</tr>");
                for($i=0;$i<$col;$i++){
                $datos = mysqli_fetch_array($result);
                    echo("<tr>");
                        echo("<td id='col'>" . $datos['nombre'] . "</td>");
                        echo("<td id='col'>" . $datos['apellidos'] . "</td>");
                        if($categoria=="Auxiliar de enfermeria"){
                            echo("<td id='bot'><button onclick='verresidente(\"". $datos['id_residente'] ."\")'>Ver</button></td>");
                        }
                        else{
                            echo("<td id='bot'>
                                <button onclick='verresidente(\"". $datos['id_residente'] ."\")'>Ver</button>
                                <button onclick='modificarresidente(\"". $datos['id_residente'] ."\")'>Modificar</button>
                                <button onclick='borraresidente(\"". $datos['id_residente'] ."\")'>Borrar</button></<button>
                            ");
                        }
                    echo("</tr>");
                }
                if($categoria!="Auxiliar de enfermeria"){
                    echo("</table><br><br><button onclick='nuevo()'>Nuevo residente</button></center><br><br>");
                }
                echo("</div>");
            }
            else{
                echo("
                    <center>
                        <button onclick='nuevo()'>Nuevo residente</button>
                        <h3>Residentes</h3>
                    </center>");  
            }
        ?>
    </body>
</html>