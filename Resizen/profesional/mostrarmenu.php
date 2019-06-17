<!DOCTYPE html>
<html>
    <head>
        <title>Residente</title>
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
                $tipo = $_POST['tipodieta'];
                $consulta = "select id_dietamenu,fecha from dietamenu where tipodieta='$tipo' order by fecha asc;";
                $result = mysqli_query($con,$consulta);
                $col = mysqli_num_rows($result);
                if($col>0){
                    echo("
                    <center><p>Menus tipo dieta: ".$tipo."</p></center>
                    <center>
                        <table>
                            <tr>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                    ");
                            for($i=0;$i<$col;$i++){
                            $datos = mysqli_fetch_array($result);
                            echo("<tr>
                                <td>".$datos['fecha']."</td>
                                <td>
                                    <button onclick='vermenu(\"". $datos['id_dietamenu']."\")'>Ver</button>
                                </td>
                            </tr>");
                            }
                        echo("</table><br><br>
                        <button onclick='atrasdieta()'>Atras</button>
                    </center>
                    ");
                }
                else{
                    echo("<center><p>No hay menus que mostrar aun</p>
                    <button onclick='atrasdieta()'>Atras</button>
                    </center>");
                }           
            ?>
        </div>
    </body>
</html>