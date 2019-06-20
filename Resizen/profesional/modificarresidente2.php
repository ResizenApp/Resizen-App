<?php
    session_start();
?>  
<!DOCTYPE html>
<html>
    <head>
        <title>Modificar residente</title>
        <meta charset="utf-8">
        <style>
            #formulario{
                padding-left:25px;
                height:555px;
                background-color: rgb(204,232,255);
                overflow-y: scroll;
            }
            input[type="submit"]{
                background-color: white;
                color: rgb(60,150,160);
            }
            input[type="button"]{
                background-color: white;
                color: rgb(60,150,160);
            }
            button{
                background-color: white;
                color: rgb(60,150,160);
            }
        </style>
    </head>
    <body>
    <div id='formulario'>
    <?php
    sleep(1);
    require("conexion.php");
    $con = conexion("resizen");
    $id = $_POST['idresidente'];
    $consulta = "select * from residentes where id_residente = '$id'";
    $result = mysqli_query($con,$consulta);
    $col = mysqli_num_rows($result);
    if($col>0){
        for($i=0;$i<$col;$i++){
            $datos = mysqli_fetch_array($result);
            echo("
                    <h3>Datos de usuario</h3>
                    <form action='#' method='post'>
                        DNI: <input type='text' id='dni' name='dni' value='" . $datos['id_residente'] . "'readonly='readonly'>
                        Numero de habitacion: <input type='number' id='num_hab' name='num_hab' value='". $datos['n_hab']."'><br><br>
                        Nombre: <input type='text' id='nombre' name='nombre' value='". $datos['nombre']."' readonly='readonly'>
                        Apellidos: <input type='text' id='apellidos' name='apellidos' value='". $datos['apellidos']."' readonly='readonly'><br><br>
                        Fecha de nacimiento: <input type='date' id='fecha_nac' name='fecha_nac' value='". $datos['fecha_nac']."' readonly='readonly'><br><br>
                        Sexo: <input type='text' id='sexo' name='sexo' value='" . $datos['sexo'] . "' readonly='readonly'>
                        Centro: <select name='centro' id='centro'>");
                            require("conexion.php");
                            $con = conexion("resizen");
                            $accion = "select nombre from centros";
                            $result = mysqli_query($con,$accion);
                            while ($fila = mysqli_fetch_row($result)){ 
		                        foreach ($fila as $valor){
                                    if($valor == $datos['centro']){
                                        echo("<option value='" . $valor . "' selected>".$valor."</option>");
                                    }
                                    else{
                                        echo("<option value='" . $valor . "'>".$valor."</option>");
                                    }
		                        }
	                        }    
                        echo("</select><br><br>
                        Dieta: <select name='dieta' id='dieta'>");
                            $con = conexion("resizen");
                            $accion = "select dieta from tipodieta";
                            $result = mysqli_query($con,$accion);
                            while ($fila = mysqli_fetch_row($result)){ 
                                foreach ($fila as $valor){
                                    if($valor == $datos['dieta']){
                                        echo "<option value='" . $valor . "' selected>".$valor."</option>";
                                    }
                                    else{
                                        echo "<option value='" . $valor . "'>".$valor."</option>";
                                    }
                                }
                            }
                        echo("</select>
                        Alergias: <input type='text' id='alergias' name='alergias' value='" . $datos['alergias'] . "'><br><br>
                        Sujecciones en cama:<select name='cama' id='cama'>");
                            $con = conexion("resizen");
                            $accion = "select sujeccion from sujecciones";
                            $result = mysqli_query($con,$accion);
                            while ($fila = mysqli_fetch_row($result)){ 
                                foreach ($fila as $valor){
                                    if($valor == $datos['sujecciones_cama']){
                                        echo "<option value='" . $valor . "' selected size='30'>".$valor."</option>";
                                    }
                                    else{
                                        echo "<option value='" . $valor . "' size='30'>".$valor."</option>";
                                    }
                                }
                            }
                        echo("</select>
                        Sujecciones en silla: <select name='silla' id='silla'>");
                            $con = conexion("resizen");
                            $accion = "select sujeccion from sujecciones";
                            $result = mysqli_query($con,$accion);
                            while ($fila = mysqli_fetch_row($result)){ 
                                foreach ($fila as $valor){
                                    if($valor == $datos['sujecciones_silla']){
                                        echo "<option value='" . $valor . "' selected size='30'>".$valor."</option>";
                                    }
                                    else{
                                        echo "<option value='" . $valor . "' size='30'>".$valor."</option>";
                                    }
                                }
                            }
                        echo("</select><br><br>
                        Profesional de referencia: <select name='profesional' id='profesional'>");
                            $accion = "select id_profesional,nombre from profesional";
                            $result2 = mysqli_query($con,$accion);
                            $col = mysqli_num_rows($result2);
                            for($i=0;$i<$col;$i++){ 
                                $datos2 = mysqli_fetch_array($result2);
                                    if($datos2['id_profesional'] == $datos['profesional']){
                                        echo "<option value='" . $datos2['id_profesional'] . "' selected size='30'>".$datos2['nombre']."</option>";
                                    }
                                    else{
                                        echo "<option value='" . $datos2['id_profesional'] . "' size='30'>".$datos2['nombre']."</option>";
                                    }
                            }
                        echo("</select><br><br>
                        <p>Patologias:</p>
                        <textarea id='patologias' name='patologias' id='patologias' cols='50' rows='3'>" . $datos['patologias'] . "</textarea>
                        <p>Medicacion: </p>
                        <textarea id='medicacion' name='medicacion' id='medicacion' cols='50' rows='3'>" . $datos['medicacion'] . "</textarea><br><br>
                        Familiar de referencia: <input type='text' name='familiar' id='familiar' value='".$datos['familiar']."'>
                        Relacion familiar: <select name='rel' id='rel'>");
                            $accion = "select relacion from relacionfamiliar";
                            $result = mysqli_query($con,$accion);
                            while ($fila = mysqli_fetch_row($result)){ 
                                foreach ($fila as $valor){
                                    if($valor == $datos['relacionfamiliar']){
                                        echo "<option value='" . $valor . "' selected size='30'>".$valor."</option>";
                                    }
                                    else{
                                        echo "<option value='" . $valor . "' size='30'>".$valor."</option>";
                                    }
                                }
                            }
                        echo("</select><br></br>
                        Telefono de contacto: <input type='tel' id='telefono' name='telefono' value='". $datos['tel_contac']."'>
                        Mail de contacto: <input type='email' id='email' name='email' value='". $datos['mailcontacto']."'><br><br>
                        Usuario: <input type='text' id='usu' name='usu' value='". $datos['usuario']."'><br><br>
                        Password: <input type='password' id='pass' name='pass' value='". $datos['contrasena']."'><br><br>
                        <input type='button' name='guardar' id='guardar' value='Guardar Cambios' onclick='modificarext()'>
                    </form><br>
                    <button onclick='residentes()'>Atras</button><br><br>
            ");
        }    
    }                      
    ?>
    </div>
    </body>
</html>