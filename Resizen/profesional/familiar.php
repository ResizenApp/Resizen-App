<?php
    session_start();
    require("conexion.php");
    $con = conexion("resizen");
    $accion = "select relacion from relacionfamiliar";
    $result = mysqli_query($con,$accion);
    while ($fila = mysqli_fetch_row($result)){ 
		foreach ($fila as $valor){
            if($valor == $_SESSION['relacion']){
                echo "<option value='" . $valor . "' selected size='30'>".$valor."</option>";
            }
            else{
                echo "<option value='" . $valor . "' size='30'>".$valor."</option>";
            }
		}
	}
?>