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
            var ventana;
            function nuevo(){
                ventana = window.open("./profesional/nuevoresidente.php","Usuario","width=800,height=600,left=300");
                ventana.focus();
            }
            var vent;
            function modificarresidente(idresidente){
                var idresidente = idresidente;
                var pagina = "./profesional/modificarresidente2.php?idresidente="+idresidente;
                vent = window.open(pagina,"Usuario","width=900,height=600,left=300");
                vent.focus();
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
            var crearmenus;
            function crearmenu(tipodieta){
                var tipodieta = tipodieta;
                var pagina = "./profesional/crearmenu.php?tipodieta="+tipodieta;
                crearmenus = window.open(pagina,"Usuario","width=900,height=600,left=300,top=50");
                crearmenus.focus();
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
            var modclinica;
            function modificarclinica(idclinica){
                var id = idclinica
                var pagina = "./profesional/modificarclinica.php?id=" + id;
                modclinica = window.open(pagina,"Usuario","width=900,height=400,left=300,top=100");
                modclinica.focus();
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
            var incidencia;
            function crearincidencia(idresidente){
                var id = idresidente;
                var pagina = "./profesional/crearincidencia.php?idresidente="+idresidente;
                incidencia = window.open(pagina,"Usuario","width=800,height=600,left=300");
                incidencia.focus();
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
            var informe;
            function crearinforme(idresidente){
                var idresidente = idresidente;
                var pagina = "./profesional/informemedico.php?idresidente="+idresidente;
                informe = window.open(pagina,"Usuario","width=800,height=600,left=300");
                informe.focus();
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
            var modusuario;
            function modificarusuario(idprofesional){
                var id = idprofesional;
                var pagina = "./profesional/modificarusuario.php?id="+id;
                modusuario = window.open(pagina,"Usuario","width=800,height=600,left=300");
                modusuario.focus();
            }
            var nuevousuario;
            function crearusuario(){
                nuevousuario = window.open("./profesioinal/nuevousuario.php","Usuario","width=800,height=300,left=300,top=100");
                nuevousuario.focus();
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
            var crearvaloracion;
            function crearvaloraciones(idresidente){
                var idresidente = idresidente;
                var pagina = "./profesional/crearvaloracion.php?idresidente="+idresidente;
                crearvaloracion = window.open(pagina,"Usuario","width=800,height=500,left=300,top=100");
                crearvaloracion.focus();
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
            var evolutivo;
            function crearevolutivos(idresidente){
                var idresidente = idresidente;
                var pagina = "./profesional/crearevolutivo.php?idresidente="+idresidente;
                evolutivo = window.open(pagina,"Usuario","width=800,height=600,left=300");
                evolutivo.focus();
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