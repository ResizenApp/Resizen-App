<!DOCTYPE html>
<html>
    <head>
        <title>Nuevo residente</title>
        <style>
            #formulario{
                padding-left:25px;
                height:555px;
                background-color: rgb(204,232,255);
                overflow-y: scroll;
            }
            #sujcama{
                width:200px;
            }
            #sujsilla{
                width:200px;
            }
            input[type="button"]{
                background-color: white;
                color: rgb(60,150,160);
            }
        </style>
    </head>
    <body>
        <?php
            sleep(1);
        ?>
        <div id='formulario'>
            <center><p>Introduzca datos de nuevo residente</p></center>
            <form method="post" action="#" onsubmit="return comprobar()">
                DNI: <input type="text" name="dni" id="dni" required onchange='comprobar()'>
                Centro: <select id="centro" name="centro" required>
                <?php
                    require("conexion.php");
                    $con = conexion("resizen");
                    $accion = "select nombre from centros";
                    $result = mysqli_query($con,$accion);
                    while ($fila = mysqli_fetch_row($result)){ 
					    foreach ($fila as $valor){
						    echo "<option value='" . $valor . "'>".$valor."</option>";
					    }
				    }
                ?>
                </select>
                Numero de habitacion: <input type="number" id="num_hab" name="num_hab" required><br><br>
                Nombre: <input type="text" id="nombre" name="nombre" required onchange='comprobar2()'>
                Apellidos: <input type="text" id="apellidos" name="apellidos" required onchange='comprobar3()'><br><br>
                Fecha de ingreso: <input type="date" id="fechain" name="fechain" required>
                Fecha de nacimiento: <input type="date" id="fecha_nac" name="fecha_nac" required><br><br>
                Sexo: <select id="sexo" name="sexo" required>
                <?php
                    $accion = "select sexo from sexo";
                    $result = mysqli_query($con,$accion);
                    while ($fila = mysqli_fetch_row($result)){ 
					    foreach ($fila as $valor){
						    echo "<option value='" . $valor . "'>".$valor."</option>";
					    }
				    }
                ?>
                </select>
                Dieta: <select id="dieta" name="dieta" required>
                <?php
                    $accion = "select dieta from tipodieta";
                    $result = mysqli_query($con,$accion);
                    while ($fila = mysqli_fetch_row($result)){ 
					    foreach ($fila as $valor){
						    echo "<option value='" . $valor . "'>".$valor."</option>";
					    }
				    }
                ?>
                </select>
                Alergias: <input type="text" id="alergias" name="alergias" required><br><br>
                Sujecciones en cama: <select id="sujcama" name="sujcama" width='25' required>
                <?php
                    $accion = "select sujeccion from sujecciones";
                    $result = mysqli_query($con,$accion);
                    while ($fila = mysqli_fetch_row($result)){ 
				    	foreach ($fila as $valor){
				    		echo "<option value='" . $valor . "'>".$valor."</option>";
				    	}
				    }
                ?>
                </select>
                Sujecciones en silla: <select id="sujsilla" name="sujsilla" width='25' required>
                <?php
                    $accion = "select sujeccion from sujecciones";
                    $result = mysqli_query($con,$accion);
                    while ($fila = mysqli_fetch_row($result)){ 
					    foreach ($fila as $valor){
					    	echo "<option value='" . $valor . "'>".$valor."</option>";
					    }
				    }
                ?>
                </select><br><br>
                Profesional de referencia: <select name="pro" id="pro">
                <?php
                    $accion = "select id_profesional,nombre from profesional";
                    $result = mysqli_query($con,$accion);
                    $col = mysqli_num_rows($result);
                    for($i=0;$i<$col;$i++){ 
                        $datos = mysqli_fetch_array($result);
                        echo "<option value='" . $datos['id_profesional'] . "' size='30'>".$datos['nombre']."</option>";
                    }
                ?>
                </select><br><br>
                <p>Patologias: </p>
                <textarea id="patologia" name="patologia" cols='85' rows='10' required></textarea><br><br>
                <p>Medicacion: </p>
                <textarea id="medicacion" name="medicacion" cols='85' rows='10' required></textarea><br><br>
                Familiar de referencia: <input type="text" id="familiar" name="familiar" onchange="comprobar2()" required>
                Relacion familiar: <select id="relfa" name="relfa" required>
                <?php
                    $accion = "select relacion from relacionfamiliar";
                    $result = mysqli_query($con,$accion);
                    while ($fila = mysqli_fetch_row($result)){ 
			    		foreach ($fila as $valor){
			    			echo "<option value='" . $valor . "'>".$valor."</option>";
			    		}
			    	}
                ?>   
                </select><br><br>
                Telefono de contacto: <input type="number" id="telefono" name="telefono" required>
                Mail de contacto: <input type="text" name="email" id="email" onchange="comprobar4()" required><br><br>
                Usuario: <input type="text" id="usu" name="usu" required>
                Password: <input type="password" id="pass" name="pass" required><br><br>
                <input type="button" id="crear" name="crear" value="Insertar" onclick='nuevoext()'>
                <button onclick='residentes()'>Atras</button><br><br>
            </form>
        </div>
    </body>
</html>