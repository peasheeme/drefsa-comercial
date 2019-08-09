

/********************función de botones************************ */
$(function(){
    var buttons = $('#buttons-form button');

    buttons.click(function(){
        buttons.removeClass('activo');
        $(this).addClass('activo');
    });
});

$('#btn-10').click(function(){
    $('#formulario-ajax').show("fast");
    $('#formulario-ajax2').hide("swing");
    document.getElementById('buttons-form').style.marginTop="-25px";
});

$('#btn-11').click(function(){
    $('#formulario-ajax2').show("fast");
    $('#formulario-ajax').hide("swing");
    document.getElementById('buttons-form').style.marginTop="-25px";
});


//-------------TEXT-ROTATOR-------------
$(".rotate").textrotator({
    animation: "dissolve",
    separator: "|",
    speed: 2000
});
//-------------CAROUSEL-------------
$("#owl-clients").owlCarousel({
items : 10,
slideSpeed : 300,
paginationSpeed : 400,
autoPlay: 5000,
singleItem: false
});
//-------------FORMULARIOS-------------

/*$(function(){
$("#btn-ajax").click(function(){
    var url = "mail/ajax.php";

    $.ajax({
        type:"POST",
        url: url,
        data:$("#formulario-ajax").serialize(),
        success: function(data){
            
                $("#nombre-status").html('');
                $("#apellido-status").html('');
                $("#email-status").html('');
                $("#telefono-status").html('');
                $("#empresa-status").html('');
                $("#giro-status").html('');
                $("#calle-status").html('');
                $("#ext-status").html('');
                $("#int-status").html('');
                $("#colonia-status").html('');
                $("#municipio-status").html('');
                $("#mensaje-status").html('');
                $("#mensajeErr-status").html(data);//muestra los datos del script PHP
            }
        });
    return false;//evita la recarga de botón
    });

    $('#btn-ajax2').click(function () { 
        var url = 'mail/ajax.php';

        $.ajax({
            type: "POST",
            url: url,
            data: $('#formulario-ajax2').serialize(),
            success: function (data) {
                $("#nombre2-status").html('');
                $("#apellido2-status").html('');
                $("#email2-status").html('');
                $("#telefono2-status").html('');
                $("#calle2-status").html('');
                $("#ext2-status").html('');
                $("#int2-status").html('');
                $("#colonia2-status").html('');
                $("#municipio2-status").html('');
                $("#mensaje2-status").html('');
                $("#mensajeErr2-status").html(data);//muestra los datos del script PHP
            }
        });

        return false;
     });
});*/

//validar solo letras
function validarLetras(e){
key = e.keyCode || e.which;
tecla = String.fromCharCode(key).toString();
letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
especiales = [8, 37, 39, 46, 6];

tecla_especial = false;

for(var i in especiales){
if(key == especiales[i]){
   tecla_especial = true;
   break;
}
}

if(letras.indexOf(tecla) == -1 && !tecla_especial){
alert('Tecla no aceptada');
return false;
}
}

//validar solo números
function soloNumeros(evt){
    if(window.event){
    keynum = evt.keyCode;
    }else{
    keynum = evt.which;
}

if((keynum >47 && keynum<58) || keynum == 8 || keynum == 13 || keynum == 6){
    return true;
    }else{
    alert('Sólo números');
    return false;
    }
}