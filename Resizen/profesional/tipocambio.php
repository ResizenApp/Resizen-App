<?php
    require("conexion.php");
    $con = conexion("resizen");
    $accion = "select cambio from cambiosposturales";
    $result = mysqli_query($con,$accion);
    while ($fila = mysqli_fetch_row($result)){ 
		foreach ($fila as $valor){
            echo("<option value='" . $valor . "'>".$valor."</option>");
        }
	}
?>