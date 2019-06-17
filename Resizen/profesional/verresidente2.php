<!DOCTYPE html>
<html>
    <head>
        <title>Residente</title>
        <style>
            #formulario{
                height:555px;
                padding-left:25px;
                overflow-y: scroll;
                background-color: rgb(204,232,255);
            }
            .foto{
                padding-left: 50px;
                padding-right: 50px;
            }
            input{
                border:2px solid rgb(52,181,177);
            }
            textarea{
                border:2px solid rgb(52,181,177);
                max-width:450px; 
                max-height:100px;
                min-width:450px;
                min-height:100px;
            }
        </style>
    </head>
    <body>
        <?php
            sleep(1);
            require("conexion.php");
            $con = conexion("resizen");
            $id = $_POST['idresidente'];
            $consulta = "select * from residentes where id_residente = '$id';";
            $result = mysqli_query($con,$consulta);
            $datos = mysqli_fetch_array($result);
            $pro = $datos['profesional'];
            $consulta2 = "select nombre from profesional where id_profesional='$pro';";
            $result2 = mysqli_query($con,$consulta2);
            $datos2 = mysqli_fetch_array($result2);
            echo("
            <div id='formulario'>
                <form>
                    <p><img class='foto' src='./fotos/" . $datos['id_residente'] . ".jpg' width='50px' height='50px'>Ficha de residente</p>
                    <p>Datos personales</p>
                    DNI: <input type='text' id='dni' name='dni' value='" . $datos['id_residente'] . "' readonly='readonly'>
                    Numero de habitacion: <input type='number' id='num_hab' name='num_hab' value='". $datos['n_hab']."' readonly='readonly'><br><br>
                    Nombre: <input type='text' id='nombre' name='nombre' value='". $datos['nombre']."' readonly='readonly'>
                    Apellidos: <input type='text' id='apellidos' name='apellidos' value='". $datos['apellidos']."' readonly='readonly'>
                    Fecha de nacimiento: <input type='date' id='fecha_nac' name='fecha_nac' value='". $datos['fecha_nac']."'><br><br>
                    Sexo: <input type='text' id='sexo' name='sexo' value='" . $datos['sexo'] . "' readonly='readonly'>
                    Centro: <input type='text' id='centro' name='centro' value='" . $datos['centro'] . "' readonly='readonly'>
                    Fecha de ingreso: <input type='date' id='fechain' name='fechain' value='".$datos['fechaingreso']."' readonly='readonly'><br><br>
                    Dieta: <input type='text' id='dieta' name='dieta' value='" . $datos['dieta'] . "' readonly='readonly'>
                    Alergias: <input type='text' id='alergias' name='alergias' value='" . $datos['alergias'] . "' readonly='readonly'><br><br>
                    Sujecciones en cama:<input type='text' id='sujcama' name='sujcama' value='" . $datos['sujecciones_cama'] . "' readonly='readonly'>
                    Sujecciones en silla: <input type='text' id='centro' name='centro' value='" . $datos['sujecciones_silla'] . "' readonly='readonly'><br><br>
                    Profesional de referencia: <input type='text' name='pro' id='pro' value='".$datos2['nombre']."' readonly='readonly' size='40'><br><br>
                    <p>Patologias:</p>
                    <textarea id='patologias' name='patologias' id='patologias' readonly='readonly' cols='40' rows='2'>" . $datos['patologias'] . "</textarea>
                    <p>Medicacion: </p>
                    <textarea id='medicacion' name='medicacion' id='medicacion' readonly='readonly' cols='40' rows='2'>" . $datos['medicacion'] . "</textarea><br><br>
                    Familiar de referencia: <input type='text' name='familiar' id='familiar' value='".$datos['familiar']."' readonly='readonly'>
                    Relacion familiar: <input type='text' name='relfa' id='relfa' value='".$datos['relacionfamiliar']."' readonly='readonly'><br><br>
                    Telefono de contacto: <input type='tel' id='telefono' name='telefono' value='". $datos['tel_contac']."' readonly='readonly'>
                    Mail de contacto: <input type='email' id='mail' name='mail' value='". $datos['mailcontacto']."' readonly='readonly'><br><br>
                </form>
                <button onclick='atrasresidente()'>Atras</button>
                <button onclick='contactofamiliar(\"".$datos['mailcontacto']."\")'>Enviar email</button><br><br>
            </div>
            ");
        ?>
    </body>
</html>