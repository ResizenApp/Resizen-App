<?php
    session_start();
    require("conexion.php");
    $con = conexion("resizen");
    $accion = "select nombre from centros";
    $result = mysqli_query($con,$accion);
    while ($fila = mysqli_fetch_row($result)){ 
		foreach ($fila as $valor){
            if($valor == $_SESSION['centro']){
                echo("<option value='" . $valor . "' selected>".$valor."</option>");
            }
            else{
                echo("<option value='" . $valor . "'>".$valor."</option>");
            }
		}
	}
?>