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
                $id = $_POST['id'];
                $consulta = "select incidencias.id_incidencia,residentes.id_residente,residentes.nombre,residentes.apellidos,incidencias.fecha from residentes inner join incidencias on residentes.id_residente = incidencias.id_residente where residentes.id_residente = '$id';";
                $result = mysqli_query($con,$consulta);
                $col = mysqli_num_rows($result);
                if($col>0){
                    echo("<center><p>Incidencias</p></center>");
                    echo("<center><table>");
                        echo("<tr>");
                            echo("<th>Nombre</th>");
                            echo("<th>Apellidos</th>");
                            echo("<th>Fecha</th>");
                            echo("<th>Acciones</th>");
                        echo("</tr>");
                    for($i=0;$i<$col;$i++){
                    $datos = mysqli_fetch_array($result);
                        echo("<tr>");
                            echo("<td>" . $datos['nombre'] . "</td>");
                            echo("<td>" . $datos['apellidos'] . "</td>");
                            echo("<td>" . $datos['fecha'] . "</td>");
                            echo("<td>
                                <button onclick='abririncidencia(\"". $datos['id_incidencia']."\")'>Ver</button>
                            </td>");
                        echo("</tr>");
                }
                    echo("</table></centre><br><br>");
                    if($_SESSION['categoria']!="Familiar"){
                        echo("<button onclick='crearincidencia(\"".$datos['id_residente']."\")'>Crear Incidencia</button>");
                        echo("<button onclick='atrasmostrarincidencia()'>Atras</button>");
                    }
                    else{
                        echo("<button onclick='atrasmostrarincidencia()'>Atras</button>");
                    }
                }
                else{
                    $consulta2 = "select id_residente,nombre,apellidos from residentes where id_residente='$id';";
                    $result2 = mysqli_query($con,$consulta2) or die ('No se pudo consultar: ' . mysqli_error($con));
                    $datos2 = mysqli_fetch_array($result2);
                    echo("<center><p>El residente ".$datos2['nombre'] ." ". $datos2['apellidos']." no tiene ninguna incidencia</p></center>");
                    echo("<center>
                        <button onclick='crearincidencia(\"".$datos2['id_residente']."\")'>Crear Incidencia</button>
                        <button onclick='atrasmostrarincidencia()'>Atras</button>
                    </center>");
                }
            ?>
        </div>
    </body>
</html>