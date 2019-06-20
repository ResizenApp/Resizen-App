$(document).ready(function(){
                $("#residentes").click(residentes);
                $("#dietas").click(dietas);
                $("#clinica").click(clinica);
                $("#incidencias").click(incidencias);
                $("#actividades").click(actividades);
                $("#informes").click(informes);
                $("#usuarios").click(usuarios);
                $("#valoraciones").click(valoraciones);
                $("#evolutivos").click(evolutivos);
            })
            /*Mostrar residentes*/
            function residentes(){
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/residentes1.php",
                    type:"POST",
                    async: true,
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                })
            }
            function nuevo(){
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/nuevoresidente.php",
                    type:"POST",
                    async: true,
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                })
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
            function nuevoext(){
                var dni = $("#dni").val();
                var centro = $("#centro").val();
                var pro = $("#pro").val();
                var nombre = $("#nombre").val();
                var apellidos = $("#apellidos").val();
                var sexo = $("#sexo").val();
                var fecha_nac = $("#fecha_nac").val();
                var fechain = $("#fechain").val();
                var dieta = $("#dieta").val();
                var alergias = $("#alergias").val();
                var sujcama = $("#sujcama").val();
                var sujsilla = $("#sujsilla").val();
                var patologia = $("#patologia").val();
                var medicacion = $("#medicacion").val();
                var num_hab = $("#num_hab").val();
                var familiar = $("#familiar").val();
                var relfa = $("#relfa").val();
                var telefono = $("#telefono").val();
                var email = $("#email").val();
                var usu = $("#usu").val();
                var pass = $("#pass").val();
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/nuevoresidenteext.php",
                    type:"POST",
                    async: true,
                    data: {
                        dni:dni,
                        centro:centro,
                        nombre:nombre,
                        apellidos:apellidos,
                        fechain:fechain,
                        sexo:sexo,
                        fecha_nac:fecha_nac,
                        pro:pro,
                        dieta:dieta,
                        alergias:alergias,
                        sujcama:sujcama,
                        sujsilla:sujsilla,
                        patologia:patologia,
                        medicacion:medicacion,
                        num_hab:num_hab,
                        familiar:familiar,
                        relfa:relfa,
                        telefono:telefono,
                        email:email,
                        usu:usu,
                        pass:pass
                    },
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                })
            }
            function modificarresidente(idresidente){
                var idresidente = idresidente
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/modificarresidente2.php",
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
            function modificarext(){
                var dni = $("#dni").val();
                var centro = $("#centro").val();
                var profesional = $("#profesional").val();
                var dieta = $("#dieta").val();
                var alergias = $("#alergias").val();
                var cama = $("#cama").val();
                var silla = $("#silla").val();
                var patologias = $("#patologias").val();
                var medicacion = $("#medicacion").val();
                var num_hab = $("#num_hab").val();
                var familiar = $("#familiar").val();
                var rel = $("#rel").val();
                var telefono = $("#telefono").val();
                var email = $("#email").val();
                var usu = $("#usu").val();
                var pass = $("#pass").val();
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/modificarresidenteext.php",
                    type:"POST",
                    async: true,
                    data: {
                        dni:dni,
                        centro:centro,
                        profesional:profesional,
                        dieta:dieta,
                        alergias:alergias,
                        cama:cama,
                        silla:silla,
                        patologias:patologias,
                        medicacion:medicacion,
                        num_hab:num_hab,
                        familiar:familiar,
                        rel:rel,
                        telefono:telefono,
                        email:email,
                        usu:usu,
                        pass:pass
                    },
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                })
            }
            function verresidente(idresidente){
                var idresidente = idresidente;
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/verresidente2.php",
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
            function contactofamiliar(mail){
                var mail = mail;
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/contactofamiliar.php",
                    type:"POST",
                    async: true,
                    data: {
                        mail:mail
                    },
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                })
            }
            function enviarmail(){
                var asunto = $("#asunto").val();
                var correo = $("#correo").val();
                var dest = $("#dest").val();
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/enviarmail.php",
                    type:"POST",
                    async: true,
                    data: {
                        asunto:asunto,
                        correo:correo,
                        dest:dest
                    },
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                })
            }
            function atrasresidente(){
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/residentes1.php",
                    type:"POST",
                    async: true,
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                })
            }
            function borraresidente(idresidente){
                var idresidente = idresidente;
                var opcion = confirm("Va a eliminar a este usuario de la base de datos, ¿Esta seguro?");
                if(opcion==true){
                    var peticion = $.ajax({
                        url:"./profesional/borraresidente.php",
                        type:"POST",
                        async: true,
                        data: {
                            idresidente:idresidente
                        },
                        success: function(data){
                            if(data=="si"){
                                alert('Registro borrado correctamente');
                                location.reload();
                            }
                            else{
                                alert('No ha sido posible borrar el registro');
                            }
                        }
                    })
                }
            }
            /*mostrar dietas*/
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
            function crearmenu(tipodieta){
                var tipodieta = tipodieta;
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/crearmenu.php",
                    type:"POST",
                    async: true,
                    data: {
                        tipodieta:tipodieta,
                    },
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                })
            }
            function crearmenuext(){
                var tipo = $("#tipo").val();
                var fecha = $("#fecha").val();
                var des = $("#des").val();
                var alm = $("#alm").val();
                var com = $("#com").val();
                var mer = $("#mer").val();
                var cen = $("#cen").val();
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/crearmenuext.php",
                    type:"POST",
                    async: true,
                    data: {
                        tipo:tipo,
                        fecha:fecha,
                        des:des,
                        alm:alm,
                        com:com,
                        mer:mer,
                        cen:cen
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
            /*clinica*/
            function clinica(){
                $('#visualizar').html("<div id='load'><p>Cargando...</p></div>");
                var peticion = $.ajax({
                    url:"./profesional/clinica.php",
                    type:"POST",
                    async: true,
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                })
            }
            function verclinica(idresidente){
                var idresidente = idresidente;
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/verclinica.php",
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
            function modificarclinica(idclinica){
                var id = idclinica
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/modificarclinica.php",
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
            function modificarclinicaext(){
                var id = $("#id").val();
                var med = $("#med").val();
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/modificarclinicaext.php",
                    type:"POST",
                    async: true,
                    data: {
                        id:id,
                        med:med
                    },
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                })
            }
            function crearclinica(idresidente){
                var idresidente = idresidente;
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/crearclinica.php",
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
            function crea(){
                var dni = $("#dni").val();
                var pat = $("#pat").val();
                var tra = $("#tra").val();
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/creaclinicaext.php",
                    type:"POST",
                    async: true,
                    data: {
                        dni:dni,
                        pat:pat,
                        tra:tra
                    },
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                })
            }
            function atrasclinica(){
                $('#visualizar').html("<div id='load'><p>Cargando...</p></div>");
                var peticion = $.ajax({
                    url:"./profesional/clinica.php",
                    type:"POST",
                    async: true,
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                })
            }
            /*mostrar actividades*/
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
            var nuevaactv;
            function nuevaactividad(){
                nuevaactv = window.open("./profesional/nuevaactividad.php","Usuario","width=900,height=400,left=300,top=100");
                nuevaactv.focus();
            }
            /*mostrar incidencias*/
            function incidencias(){
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/incidencias2.php",
                    type:"POST",
                    async: true,
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
            function atrasmostrarincidencia(){
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/incidencias2.php",
                    type:"POST",
                    async: true,
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                })
            }
            function crearincidencia(idresidente){
                var id = idresidente;
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/crearincidencia.php",
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
            function crearincidenciaext(){
                var dni = $("#dni").val();
                var res = $("#res").val();
                var pro = $("#pro").val();
                var cat = $("#cat").val();
                var fecha = $("#fecha").val();
                var lugar = $("#lugar").val();
                var causa = $("#causa").val();
                var des = $("#des").val();
                var aten = $("#aten").val();
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/crearincidenciaext.php",
                    type:"POST",
                    async: true,
                    data: {
                        dni:dni,
                        res:res,
                        pro:pro,
                        cat:cat,
                        fecha:fecha,
                        lugar:lugar,
                        causa:causa,
                        des:des,
                        aten:aten
                    },
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
            /*mostrar informes*/
            function informes(){
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/informes.php",
                    type:"POST",
                    async: true,
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                })
            }
            function crearinforme(idresidente){
                var idresidente = idresidente;
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/informemedico.php",
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
            function informemedicoext(){
                var id = $("#id").val();
                var npro = $("#npro").val();
                var cat = $("#cat").val();
                var res = $("#res").val();
                var fecha = $("#fecha").val();
                var lugar = $("#lugar").val();
                var tipo = $("#tipo").val();
                var des = $("#des").val();
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/informemedicoext.php",
                    type:"POST",
                    async: true,
                    data: {
                        id:id,
                        npro:npro,
                        cat:cat,
                        res:res,
                        fecha:fecha,
                        lugar:lugar,
                        tipo:tipo,
                        des:des
                    },
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                }) 
            }
            function mostrarinforme(idresidente){
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var idresidente = idresidente;
                var peticion = $.ajax({
                    url:"./profesional/mostrarinforme.php",
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
            function atrasinforme(){
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/informes.php",
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
                    url:"./profesional/mostrarinforme.php",
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
                $('#visualizar').html("<div id='load'><p>Cargando...</p></div>");
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
            /*gestion de usuarios*/
            function usuarios(){
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/usuarios.php",
                    type:"POST",
                    async: true,
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                })
            }
            function verusuario(dato){
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var datos = dato;
                var peticion = $.ajax({
                    url:"./profesional/verusuario.php",
                    type:"POST",
                    async: true,
                    data: {
                        datos:datos
                    },
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                })
            }
            function atrasusuario(){
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/usuarios.php",
                    type:"POST",
                    async: true,
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                })
            }
            function modificarusuario(idprofesional){
                var idprofesional = idprofesional;
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/modificarusuario.php",
                    type:"POST",
                    async: true,
                    data: {
                        idprofesional:idprofesional
                    },
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                })
            }
            function modificarusuarioext(){
                var dni = $("#dni").val();
                var cat  = $("#cat").val();
                var centro = $("#centro").val();
                var email = $("#email").val();
                var usu = $("#usu").val();
                var pass = $("#pass").val();
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/modificarusuarioext.php",
                    type:"POST",
                    async: true,
                    data: {
                        dni:dni,
                        cat:cat,
                        centro:centro,
                        email:email,
                        usu:usu,
                        pass:pass
                    },
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                })
            }
            function crearusuario(){
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/nuevousuario.php",
                    type:"POST",
                    async: true,
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                })
            }
            function crearusuarioext(){
                var dni = $("#dni").val();
                var nombre = $("#nombre").val();
                var cat = $("#cat").val();
                var fecha = $("#fecha").val();
                var centro = $("#centro").val();
                var email = $("#email").val();
                var usu = $("#usu").val();
                var pass = $("#pass").val();
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/nuevousuarioext.php",
                    type:"POST",
                    async: true,
                    data: {
                        dni:dni,
                        nombre:nombre,
                        cat:cat,
                        fecha:fecha,
                        centro:centro,
                        email:email,
                        usu:usu,
                        pass:pass
                    },
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                })
            }
            function borrarusuario(idusuario){
                var idusuario = idusuario;
                var opcion = confirm("Va a eliminar a este profesional de la base de datos, ¿Esta seguro?");
                if(opcion==true){
                    var peticion = $.ajax({
                        url:"./profesional/borrarusuario.php",
                        type:"POST",
                        async: true,
                        data: {
                            idusuario:idusuario
                        },
                        success: function(data){
                            if(data=="si"){
                                alert('Registro borrado correctamente');
                                location.reload();
                            }
                            else{
                                alert('No ha sido posible borrar el registro');
                            }
                        }
                    })
                }
            }
            /*valoraciones*/
            function valoraciones(){
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/valoraciones.php",
                    type:"POST",
                    async: true,
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                })
            }
            function mostrarvaloraciones(idresidente){
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var id = idresidente;
                var peticion = $.ajax({
                    url:"./profesional/mostrarvaloraciones.php",
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
            function atrasmostrarvaloraciones(){
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/valoraciones.php",
                    type:"POST",
                    async: true,
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                })
            }
            function vervaloraciones(idval){
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var idval = idval;
                var peticion = $.ajax({
                    url:"./profesional/vervaloraciones.php",
                    type:"POST",
                    async: true,
                    data: {
                        idval:idval
                    },
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                })
            }
            function crearvaloraciones(idresidente){
                var id = idresidente;
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/crearvaloracion.php",
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
            function crearvaloracionext(){
                var dni = $("#dni").val();
                var tipo = $("#tipo").val();
                var fecha = $("#fecha").val();
                var val = $("#val").val();
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/crearvaloracionext.php",
                    type:"POST",
                    async: true,
                    data: {
                        dni:dni,
                        tipo:tipo,
                        fecha:fecha,
                        val:val
                    },
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                })
            }
            function atrasvaloraciones(id){
                $('#visualizar').html("<div id='load'><p>Cargando...</p></div>");
                var id = id;
                var peticion = $.ajax({
                    url:"./profesional/mostrarvaloraciones.php",
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
            /*evolutivos*/
            function evolutivos(){
                $('#visualizar').html("<div id='load'><p>Cargando...</p></div>");
                var peticion = $.ajax({
                    url:"./profesional/evolutivos.php",
                    type:"POST",
                    async: true,
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                })
            }
            function atrasevolutivo(){
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/evolutivos.php",
                    type:"POST",
                    async: true,
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                })
            }
            function detalleevolutivo(idevolutivo){
                $('#visualizar').html("<div id='load'><p>Cargando...</p></div>");
                var id = idevolutivo;
                var peticion = $.ajax({
                    url:"./profesional/detalleevolutivo.php",
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
            function verevolutivos(idresidente){
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var id = idresidente;
                var peticion = $.ajax({
                    url:"./profesional/verevolutivos.php",
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
            function atrasdetalle(idresidente){
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var id = idresidente;
                var peticion = $.ajax({
                    url:"./profesional/verevolutivos.php",
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
            function crearevolutivo(idresidente){
                var idresidente = idresidente;
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/crearevolutivo.php",
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
            function crearevolutivoext(){
                var dni = $("#dni").val();
                var fecha = $("#fecha").val();
                var turno = $("#turno").val();
                var actv = $("#actv").val();
                var inci = $("#inci").val();
                var pis = $("#pis").val();
                var caca = $("#caca").val();
                var ncaca = $("#ncaca").val();
                var cpos = $("#cpos").val();
                $('#visualizar').html("<div id='load'><p>Cargando...</p></<div>");
                var peticion = $.ajax({
                    url:"./profesional/crearevolutivoext.php",
                    type:"POST",
                    async: true,
                    data: {
                        dni:dni,
                        fecha:fecha,
                        turno:turno,
                        actv:actv,
                        inci:inci,
                        pis:pis,
                        caca:caca,
                        ncaca:ncaca,
                        cpos:cpos
                    },
                    success: function(data){
                        $("#visualizar").html(data);
                    }
                })
            }
             /*salir*/
             function salir(){
                var peticion = $.ajax({
                    url:"salir.php",
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