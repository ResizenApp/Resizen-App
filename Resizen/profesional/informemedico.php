<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <script src="jquery-3.3.1.min.js"></script>
        <script type="application/x-javascript">
            function salir(){
                window.close("informemedico.php");
            }
        </script>
        <style>
            body{
                background-color: rgb(204,232,255);
            }
            #id{
                visibility:hidden;
            }
            input[type="submit"]{
                background-color: white;
                color: rgb(60,150,160);
            }
        </style>
    </head>
    <body>
        <?php
            session_start();
            require("conexion.php");
            $con = conexion("resizen");
            mysqli_set_charset($con, 'utf8');
            $id = $_GET['idresidente'];
            $pro = $_SESSION['idprofesional'];
            $consulta = "select nombre,apellidos from residentes where id_residente='$id';";
            $consulta2 = "select nombre,categoria from profesional where id_profesional='$pro';";
            $result = mysqli_query($con,$consulta);
            $result2 = mysqli_query($con,$consulta2);
            $datos = mysqli_fetch_array($result);
            $datos2 = mysqli_fetch_array($result2);
        echo("
        <center><p>Informe para residentes</p></center>
        <form action='informemedico.php?idresidente=".$id."' method='post'>
            <input type='text' name='id' id='id' value='".$id."'><br>
            Residente: <input type='text' name='res' id='res' value='".$datos['nombre'] ." ".$datos['apellidos']."' readonly='readonly'><br><br>
            Profesional: <input type='text' name='pro' id='pro' value='".$datos2['nombre'] ."' readonly='readonly' size='40'>
            Categoria: <input type='text' name='cat' id='cat' value='". $datos2['categoria'] ."' readonly='readonly'><br><br>");
            ?>
            Fecha del informe: <input type='date' name='fecha' id='fecha' required><br><br>
            Lugar del informe: <input type='text' name='lugar' id='lugar' required><br><br>
            Tipo: <select name='tipo' id='tipo' required>
            <?php
                $accion = "select tipo from tipoinforme";
                $result = mysqli_query($con,$accion);
                while ($fila = mysqli_fetch_row($result)){ 
                    foreach ($fila as $valor){
                        echo "<option value='" . $valor . "'>".$valor."</option>";
                    }
                }
            ?>
            </select>
            <p>Descripcion:</p>
            <textarea name='des' id='des' cols='100' rows='15' required></textarea><br><br>
            <input type='submit' name='crear' id='crear' value='Generar informe'>
        </form>
        <?php
        if(isset($_POST['crear'])){
            $pro = $_SESSION['idprofesional'];
            $idres = $_POST['id'];
            $npro = $_POST['pro'];
            $cat = $_POST['cat'];
            $res = $_POST['res'];
            $fec = $_POST['fecha'];
            $lug = $_POST['lugar'];
            $tipo = $_POST['tipo'];
            $des =$_POST['des'];
            $consulta3 = "insert into informes (id_profesional,id_residente,profesional,categoria,nombre,fecha,lugar,tipo,descripcion) values ('$pro','$idres','$npro','$cat','$res','$fec','$lug','$tipo','$des');";
            $result3 = mysqli_query($con,$consulta3) or die ('No se pudo guardar: ' . mysqli_error($con));
            if($result){
                echo("
                    <script>
                        alert('Informe creado correctamente');
                        window.opener.location.reload('principalprofesional.html');
                        self.close();
                    </script>
                ");
            }
            else{
                echo("<script>alert('El informe no se ha guardado, revise los datos');</script>");
            }
        }
        ?>
    </body>
</html>