$(document).ready(function(){
    $("#residentes").click(residentes);
    $("#dietas").click(dietas);
    $("#actividades").click(actividades);
    $("#incidencias").click(incidencias);
    $("#informes").click(informes);
    $("#usuario").click(usuario);
    $("#correomail").click(correomail);
})
/*residentes del familiar*/
function residentes(){
    $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
    var peticion = $.ajax({
        url:"./familiar/residentesfamiliar.php",
        type:"POST",
        async: true,
        success: function(data){
            $("#visualizar").html(data);
        }
    })
}
function verfamiliar(idresidente){
    $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
    var idresidente = idresidente;
    var peticion = $.ajax({
        url:"./profesional/verfamiliar.php",
        type:"POST",
        async: true,
        data: {
            idresidente:idresidente
        },
        success: function(data){
            $("#visualizar").html(data);
        }
    })
}
function atrasfamiliar(){
    $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
    var peticion = $.ajax({
        url:"./familiar/residentesfamiliar.php",
        type:"POST",
        async: true,
        success: function(data){
            $("#visualizar").html(data);
        }
    })
}
/*actividades*/
function actividades(){
    $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
    var peticion = $.ajax({
        url:"./profesional/actividades.php",
        type:"POST",
        async: true,
        success: function(data){
            $("#visualizar").html(data);
        }
    })
}
function veractividad(idactividad){
    $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
    var id = idactividad;
    var peticion = $.ajax({
        url:"./profesional/veractividad.php",
        type:"POST",
        async: true,
        data: {
            id:id
        },
        success: function(data){
            $("#visualizar").html(data);
        }
    })
}
function atrasactividad(){
    $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
    var peticion = $.ajax({
        url:"./profesional/actividades.php",
        type:"POST",
        async: true,
        success: function(data){
            $("#visualizar").html(data);
        }
    })
}
/*dietas*/
function dietas(){
    $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
    var peticion = $.ajax({
        url:"./profesional/dietas.php",
        type:"POST",
        async: true,
        success: function(data){
            $("#visualizar").html(data);
        }
    })
}
function mostrarmenu(tipodieta){
    var tipodieta = tipodieta;
    $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
    var peticion = $.ajax({
        url:"./profesional/mostrarmenu.php",
        type:"POST",
        async: true,
        data: {
            tipodieta:tipodieta
        },
        success: function(data){
            $("#visualizar").html(data);
        }
    })
}
function vermenu(iddietamenu){
    var iddietamenu = iddietamenu;
    $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
    var peticion = $.ajax({
        url:"./profesional/vermenu.php",
        type:"POST",
        async: true,
        data: {
            iddietamenu:iddietamenu,
        },
        success: function(data){
            $("#visualizar").html(data);
        }
    })
}
function atrasvermenu(tipodieta){
    var tipodieta = tipodieta;
    $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
    var peticion = $.ajax({
        url:"./profesional/mostrarmenu.php",
        type:"POST",
        async: true,
        data: {
            tipodieta:tipodieta
        },
        success: function(data){
            $("#visualizar").html(data);
        }
    })
}
function atrasdieta(){
    $('#visualizar').html("<div id='load'><p>Cargando...</p></div>");
    var peticion = $.ajax({
        url:"./profesional/dietas.php",
        type:"POST",
        async: true,
        success: function(data){
            $("#visualizar").html(data);
        }
    })
}
/*incidencias*/
function incidencias(){
    $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
    var peticion = $.ajax({
        url:"./familiar/incidenciasfamiliar.php",
        type:"POST",
        async: true,
        success: function(data){
            $("#visualizar").html(data);
        }
    })
}
function mostrarincidencias(id){
    $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
    var id = id;
    var peticion = $.ajax({
        url:"./profesional/mostrarincidencias.php",
        type:"POST",
        async: true,
        data:{
            id:id
        },
        success: function(data){
            $("#visualizar").html(data);
        }
    })
}
function abririncidencia(idincidencia){
    $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
    var idincidencia = idincidencia;
    var peticion = $.ajax({
        url:"./profesional/verincidencia.php",
        type:"POST",
        async: true,
        data: {
            idincidencia:idincidencia
        },
        success: function(data){
            $("#visualizar").html(data);
        }
    })
}
function atrasmostrarincidencia(){
    $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
    var peticion = $.ajax({
        url:"./familiar/incidenciasfamiliar.php",
        type:"POST",
        async: true,
        success: function(data){
            $("#visualizar").html(data);
        }
    })
}
function atrasincidencias(id){
    $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
    var id = id;
    var peticion = $.ajax({
        url:"./profesional/mostrarincidencias.php",
        type:"POST",
        async: true,
        data: {
            id:id
        },
        success: function(data){
            $("#visualizar").html(data);
        }
    })
}
/*informes*/
function informes(){
    $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
    var peticion = $.ajax({
        url:"./familiar/informesfamiliar.php",
        type:"POST",
        async: true,
        success: function(data){
            $("#visualizar").html(data);
        }
    })
}
function mostrarinformes(idresidente){
    $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
    var idresidente = idresidente;
    var peticion = $.ajax({
        url:"./familiar/mostrarinformefamiliar.php",
        type:"POST",
        async: true,
        data: {
            idresidente:idresidente
        },
        success: function(data){
            $("#visualizar").html(data);
        }
    })
}
function verinforme(idinforme){
    $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
    var idinforme = idinforme;
    var peticion = $.ajax({
        url:"./profesional/verinforme.php",
        type:"POST",
        async: true,
        data: {
            idinforme:idinforme
        },
        success: function(data){
            $("#visualizar").html(data);
        }
    })
}
function atrasinforme(){
    $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
    var peticion = $.ajax({
        url:"./familiar/informesfamiliar.php",
        type:"POST",
        async: true,
        success: function(data){
            $("#visualizar").html(data);
        }
    })
}
function atrasverinforme(idresidente){
    $('#visualizar').html("<div id='load'><p>Cargando...</p></div>");
    var idresidente = idresidente;
    var peticion = $.ajax({
        url:"./familiar/mostrarinformefamiliar.php",
        type:"POST",
        async: true,
        data: {
            idresidente:idresidente
        },
        success: function(data){
            $("#visualizar").html(data);
        }
    })
}
/*usuario*/
function usuario(){
    $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
    var peticion = $.ajax({
        url:"./familiar/usuariofamiliar.php",
        type:"POST",
        async: true,
        success: function(data){
            $("#visualizar").html(data);
        }
    })
}
function modificarfamiliar(){
    $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
    var peticion = $.ajax({
        url:"./familiar/modificarfamiliar.php",
        type:"POST",
        async: true,
        success: function(data){
            $("#visualizar").html(data);
        }
    })
}
function modificarfamiliarext(){
    var nom = $("#nom").val();
    var email = $("#email").val();
    var usu = $("#usu").val();
    var pass = $("#pass").val();
    $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
    var peticion = $.ajax({
        url:"./familiar/modificarfamiliarext.php",
        type:"POST",
        async: true,
        data: {
            nom:nom,
            email:email,
            usu:usu,
            pass:pass
        },
        success: function(data){
            $("#visualizar").html(data);
        }
    })
}
/*contacto*/
function correomail(){
    $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
    var peticion = $.ajax({
        url:"./profesional/correo.php",
        type:"POST",
        async: true,
        success: function(data){
            $("#visualizar").html(data);
        }
    })
}
function correoext(){
    var asun = $("#asun").val();
    var men = $("#men").val();
    var usu = $("#usu").val();
    $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
    var peticion = $.ajax({
        url:"./profesional/correoext.php",
        type:"POST",
        async: true,
        data: {
            asun:asun,
            men:men,
            usu:usu
        },
        success: function(data){
            $("#visualizar").html(data);
        }
    })
}
function atrascorreo(){
    $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
    var peticion = $.ajax({
        url:"./familiar/residentesfamiliar.php",
        type:"POST",
        async: true,
        success: function(data){
            $("#visualizar").html(data);
        }
    })
}
/*salir*/
function salir(){
    var peticion = $.ajax({
        url:"./familiar/salir.php",
        type:"POST",
        async: true,
        success: function(data){
            var opcion = confirm("¿Desea abandonar la aplicacion?");
            if(opcion==true){
                window.location.assign("index.html");
            }
        }
    })
}
function comprobar(){
    var nom = document.getElementById("nom").value;
    var nom_exp = /^([A-Z]{1}[a-zñáéíóú]+[\s]*)+$/;
    if(nom_exp.test(nom)==true){
        $("#nom").css("border","2px dotted green");
        return true;
    }
    else{
        $("#nom").css("border","2px dotted red");
        return false;
    }
}
function comprobar2(){
    var usu = document.getElementById("usu").value;
    var usu_exp = /^[a-zA-Z0-9]{9,9}$/;
    if(usu_exp.test(usu)==true){
        $("#usu").css("border","2px dotted green");
        return true;
    }
    else{
        $("#usu").css("border","2px dotted red");
        return false;
    }
}
function comprobar3(){
    var pass = document.getElementById("pass").value;
    var pass_exp = /^[a-zA-Z0-9]{8,8}$/;
    if(pass_exp.test(pass)==true){
        $("#pass").css("border","2px dotted green");
        return true;
    }
    else{
        $("#pass").css("border","2px dotted red");
        return false;
    }
}
function comprobar4(){
    var mail = document.getElementById("email").value;
    var mail_exp = /[\w]+@{1}[\w]+\.[a-z]{2,3}/;
    if(mail_exp.test(mail)==true){
        $("#email").css("border","2px dotted green");
        return true;
    }
    else{
        $("#mail").css("border","2px dotted red");
        return false;
    }
}