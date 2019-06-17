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
                $idresidente = $_POST['idresidente'];
                $consulta = "select residentes.nombre,residentes.apellidos,clinica.id_clinica,clinica.enfermedades,clinica.tratamiento from residentes inner join clinica on residentes.id_residente = clinica.id_residente where residentes.id_residente='$idresidente';";
                $result = mysqli_query($con,$consulta);
                $col = mysqli_num_rows($result);
                if($col>0){
                    echo("<center><p>Clinica del residente</p></center>");
                    echo("<center>
                        <table>
                            <tr>
                                <th>Sintomatologia</th>
                                <th>Tratamiento</th>
                                <th>Acciones</th>
                            </tr>");
                            for($i=0;$i<$col;$i++){
                                $datos = mysqli_fetch_array($result);
                                echo("<tr>
                                    <td>".$datos['enfermedades']."</td>
                                    <td>".$datos['tratamiento']."</td>");
                                    if($_SESSION['categoria']!="Auxiliar de enfermeria"){
                                    echo("
                                        <td>
                                            <button onclick='modificarclinica(\"". $datos['id_clinica']."\")'>Modificar tratamiento</button>
                                        </td>
                                    ");
                                    }      
                                echo("</tr>");     
                        }
                        echo("</table><br><br>
                            <button onclick='atrasclinica()'>Atras</button>
                    </center>");
                }
                else{
                    if($_SESSION['categoria']!= "Auxiliar de enfermeria" || $_SESSION['categoria']!= "Familiar"){
                        echo("<center><p>El residente aun no tiene historial clinico</p>
                            <button onclick='crearclinica(\"".$idresidente."\")'>Crear clinica</button>
                            <button onclick='atrasclinica()'>Atras</button>
                        </center>");
                    }
                    else{
                        echo("<center><p>El residente aun no tiene historial clinico</p>
                            <button onclick='atrasclinica()'>Atras</button>
                        </center>");
                    }
                }
            ?>
        </div>
    </body>
</html>