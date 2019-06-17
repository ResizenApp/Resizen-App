<!DOCTYPE html>
<html>
    <head>
        <title>Nuevo residente</title>
        <script src="jquery-3.3.1.min.js"></script>
        <script type="application/x-javascript">
            function salir(){
                window.close("nuevousuario.php");
            }
            function comprobar(){
                var dni = document.getElementById("dni").value;
                var dni_exp = /^[0-9]{8,8}[A-Z]$/;
                if(dni_exp.test(dni)==true){
                    $("#dni").css("border","2px dotted green");
                    return true;
                }
                else{
                    $("#dni").css("border","2px dotted red");
                    return false;
                }
            }
            function comprobar2(){
                var nom = document.getElementById("nombre").value;
                var nom_exp = /^([A-Z]{1}[a-zñáéíóú]+[\s]*)+$/;
                if(nom_exp.test(nom)==true){
                    $("#nombre").css("border","2px dotted green");
                    return true;
                }
                else{
                    $("#nombre").css("border","2px dotted red");
                    return false;
                }
            }
            function comprobar3(){
                var ape = document.getElementById("apellidos").value;
                var nom_exp = /^([A-Z]{1}[a-zñáéíóú]+[\s]*)+$/;
                if(nom_exp.test(ape)==true){
                    $("#apellidos").css("border","2px dotted green");
                    return true;
                }
                else{
                    $("#apellidos").css("border","2px dotted red");
                    return false;
                }
            }
        </script>
        <style>
            body{
                background-color: rgb(204,232,255);
            }
            #sujcama{
                width:200px;
            }
            #sujsilla{
                width:200px;
            }
            input[type="submit"]{
                background-color: white;
                color: rgb(60,150,160);
            }
        </style>
    </head>
    <body>
        <center><p>Introduzca datos de nuevo residente</p></center>
        <form id="nuevore" method="post" action="nuevoresidente.php" onsubmit="return comprobar()">
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
            Sexo: <select id='sexo' name='sexo' required>
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
            Familiar de referencia: <input type="text" id="familiar" name="familiar" required>
            Relacion familiar: <select id='relfa' name='relfa' required>
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
            Telefono de contacto: <input type="tel" id="telefono" name="telefono" required>
            Mail de contacto: <input type='email' name='email' id='email'><br><br>
            Usuario: <input type="text" id="usu" name="usu" required>
            Password: <input type="password" id="pass" name="pass" required><br><br>
            <input type="submit" id="crear" name="crear" value="Insertar"><br><br>
        </form>
        <div id="visualizar">
            <?php
                if(isset($_POST["crear"])){
                    $dni = $_POST['dni'];
                    $centro = $_POST['centro'];
                    $nombre = $_POST['nombre'];
                    $fechain = $_POST['fechain'];
                    $apellidos = $_POST['apellidos'];
                    $fecha = $_POST['fecha_nac'];
                    $sexo = $_POST['sexo'];
                    $dieta = $_POST['dieta'];
                    $alergias = $_POST['alergias'];
                    $sujcama = $_POST['sujcama'];
                    $sujsilla = $_POST['sujsilla'];
                    $pro = $_POST['pro'];
                    $pat = $_POST['patologia'];
                    $medi = $_POST['medicacion'];
                    $hab = $_POST['num_hab'];
                    $fam = $_POST['familiar'];
                    $relfa = $_POST['relfa'];
                    $tel = $_POST['telefono'];
                    $mail = $_POST['email'];
                    $usu = $_POST['usu'];
                    $pass = $_POST['pass'];
                    $consulta = "insert into residentes (id_residente,centro,profesional,fechaingreso,nombre,apellidos,fecha_nac,sexo,dieta,alergias,sujecciones_cama,sujecciones_silla,patologias,medicacion,n_hab,familiar,relacionfamiliar,tel_contac,mailcontacto.usuario,contrasena) values ('$dni','$centro','$pro','$fechain','$nombre','$apellidos','$fecha','$sexo','$dieta','$alergias','$sujcama','$sujsilla','$pat','$medi',$hab,'$fam','$relfa',$tel,'$mail','$usu','$pass');";
                    $result = mysqli_query($con,$consulta);
                    if($result){
                        echo("<script>
                            alert('Residente guardado correctamente');
                            window.opener.location.reload('principalprofesional.html');
                            self.close();
                        </script>");
                    }
                    else{
                        echo("<script>
                            alert('Insercion fallida, revise los datos e intentelo de nuevo');
                        </script>");
                    }
                }
            ?>
        </div>
    </body>
</html>