<?php
    sleep(1);
    require("conexion.php");
    $con = conexion("resizen");
    $id = $_POST['dni'];
    $pat = $_POST['pat'];
    $tra = $_POST['tra'];
    $consulta = "insert into clinica (id_residente,enfermedades,tratamiento) values ('$id','$pat','$tra');";
    $result = mysqli_query($con,$consulta);
    if($result){
        echo("<center><p>Clinica creada correctamente</p>
            <button onclick='atrasclinica()'>Atras</button>
        </center>");
    }
    else{
        echo("<center><p>No se pudo crear la clinica</p>
        <button onclick='atrasclinica()'>Atras</button>
        </center>");
    }
?>