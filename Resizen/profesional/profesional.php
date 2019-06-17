<?php
    session_start();
    require("conexion.php");
    $con = conexion("resizen");
    $accion = "select id_profesional,nombre from profesional";
    $result = mysqli_query($con,$accion);
    $col = mysqli_num_rows($result);
    for($i=0;$i<$col;$i++){ 
		$datos = mysqli_fetch_array($result);
            if($datos['id_profesional'] == $_SESSION['profesional']){
                echo "<option value='" . $datos['id_profesional'] . "' selected size='30'>".$datos['nombre']."</option>";
            }
            else{
                echo "<option value='" . $datos['id_profesional'] . "' ize='30'>".$datos['nombre']."</option>";
            }
	}
?>