<!DOCTYPE html>
<html>
    <head>
        <title>Residente</title>
        <style>
            #formulario{
                height:555px;
                overflow-y: scroll;
                background-color: rgb(204,232,255);
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
                $id = $_POST['iddietamenu'];
                require("conexion.php");
                $con = conexion("resizen");
                $consulta = "select * from dietamenu where id_dietamenu='$id';";
                $result = mysqli_query($con,$consulta);
                $datos = mysqli_fetch_array($result);
                $col = mysqli_num_rows($result);
                echo("
                    <center><p>Menus dia:".$datos['fecha']."</p></center>
                    <center>
                        <table>
                            <tr>
                                <th>Horario</th>
                                <th>Menu</th>
                            </tr>
                ");
                for($i=0;$i<$col;$i++){
                        echo("
                            <tr>
                                <td>Desayuno</td>
                                <td>".$datos['desayuno']."</td>
                            </tr>
                            <tr>
                                <td>Almuerzo</td>
                                <td>".$datos['almuerzo']."</td>
                            </tr>
                            <tr>
                                <td>Comida</td>
                                <td>".$datos['comida']."</td>
                            </tr>
                            <tr>
                                <td>Merienda</td>
                                <td>".$datos['merienda']."</td>
                            </tr>
                            <tr>
                                <td>Cena</td>
                                <td>".$datos['cena']."</td>
                            </tr>
                    ");
                }
                echo("
                        </table><br><br>
                        <button onclick='atrasvermenu(\"". $datos['tipodieta']."\")'>Atras</button>
                    </center>
                ");
            ?>
        </div>
    </body>
</html>