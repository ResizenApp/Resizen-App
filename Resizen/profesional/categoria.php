<?php
    require("conexion.php");
    $con = conexion("resizen");
    $consulta = "select * from categoria";
    $result = mysqli_query($con,$consulta);
    $cant = mysql_num_rows($result);
    if($cant != 0) {
        echo '<option value="0">[SELECCIONE]</option>';
        while ($fila = mysql_fetch_array($query)) {
 
            echo '<option value="'.$fila['tipo'].'">'.$fila['tipo'].'</option>';
        }
    }
?>
