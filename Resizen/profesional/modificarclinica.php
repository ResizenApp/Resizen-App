<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Residente</title>
        <style>
            #formulario{
                height:555px;
                padding-left:25px;
                overflow-y: scroll;
            }
            body{
                background-color: rgb(204,232,255);
            }
            input[type="submit"]{
                background-color: white;
                color: rgb(60,150,160);
            }
        </style>
        <script src="jquery-3.3.1.min.js"></script>
        <script type="application/x-javascript">
        </script>
    </head>
    <body>
        <?php
            require("conexion.php");
            $id = $_GET['id'];
            $con = conexion("resizen");
            $consulta = "select * from clinica where id_clinica='$id'";
            $result = mysqli_query($con,$consulta);
            $datos = mysqli_fetch_array($result);
            echo("
                <div id='formulario'>
                    <center><p>Datos de usuario</p></center>
                    <form action='modificarclinica.php?id=".$id."' method='post' onsubmit='comprobar()'>
                        Sintomatologia: <input type='text' name='sin' id='sin' value='".$datos['enfermedades']."' readonly='readonly'><br><br>
                        Medicacion: <input type='text' name='med' id='med' value='".$datos['tratamiento']."'><br><br>
                        <input type='submit' name='modificar' id='modificar' value='Modificar'><br>
                    </form>
                </div>
            ");
            if(isset($_POST['modificar'])){
                $med = $_POST['med'];
                $idcli = $id;
                $consulta = "update clinica set tratamiento='$med' where id_clinica='$idcli';";
                $result = mysqli_query($con,$consulta);
                if($result){
                    echo("
                        <script>
                            alert('Datos modificados correctamenmte');
                            window.opener.location.reload('principalprofesional.html');
                            self.close();
                        </script>
                    ");
                }
                else{
                    echo("<script>alert('Modificacion incorrecta');</script>");
                }
            }
        ?>
    </body>
</html>