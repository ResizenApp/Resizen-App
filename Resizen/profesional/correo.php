<!DOCTYPE html>
<html>
    <head>
        <title>Residente</title>
        <style>
            #formulario{
                background-color: rgb(204,232,255);
                height:555px;
                overflow-y: scroll;
                padding-left:25px;
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
        echo("
        <div id='formulario'>
            <br><center>Mensaje de contacto con profesional de referencia</center><br><br>
            <form action='correo.php' method='POST'>
                Asunto: <input type='text' name='asun' id='asun'><br><br>
                <p>Mensaje</p>
                <textarea name='men' id='men' cols='75' rows='25' placeholder='Por favor indique el nombre de su familiar y su relacion con el'></textarea><br><br>
                <input type='button' name='enviar' id='enviar' value='Enviar' onclick='correoext()'>
            </form><br>
            <button onclick='atrascorreo()'>Atras</button><br><br>
        </div>
        ");
        ?>
    </body>
</html>