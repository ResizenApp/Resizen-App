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
        <?php
            sleep(1);
            session_start();
            require("conexion.php");
            $con = conexion("resizen");
            $id = $_POST['idresidente'];
            $consulta = "select informes.id_informe,informes.tipo,residentes.nombre,residentes.apellidos from informes inner join residentes on informes.id_residente = residentes.id_residente where residentes.id_residente='$id';";
            $result = mysqli_query($con,$consulta);
            $col = mysqli_num_rows($result);
            if($col>0){
                echo("<center><p>Informes de residentes</p></center>");
                echo("<center><table>");
                echo("<tr>");
                    echo("<th>Nombre</th>");
                    echo("<th>Apellidos</th>");
                    echo("<th>Tipo</th>");
                    echo("<th>Acciones</th>");
                echo("</tr>");
                for($i=0;$i<$col;$i++){
                    $datos = mysqli_fetch_array($result);
                    echo("<tr>");
                        echo("<td>" . $datos['nombre'] . "</td>");
                        echo("<td>" . $datos['apellidos'] . "</td>");
                        echo("<td>" . $datos['tipo'] . "</td>");
                        echo("<td>
                            <button onclick='verinforme(\"". $datos['id_informe']."\")'>Ver</button>
                        </td>");
                    echo("</tr>");
                }
                echo("</table><br><br>");
                if($_SESSION['categoria']!="Auxiliar de enfermeria"){
                    echo("<center>
                        <button onclick='crearinforme(\"". $id."\")'>Crear informe</button>
                        <button onclick='atrasinforme()'>Atras</button>
                    </center>");
                }
                else{
                    echo("<center>
                        <button onclick='atrasinforme()'>Atras</button>
                    </center>");
                }
                
            }
            else{
                echo("<center>
                    <p>No hay informes que mostrar para el residente seleccionado</p>
                    <button onclick='atrasinforme()'>Atras</button>
                    <button onclick='crearinforme(\"". $id."\")'>Crear informe</button>
                </center>");
            }
        ?>
    </body>
</html>