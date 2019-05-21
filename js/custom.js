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

$(function(){
$("#btn-ajax").click(function(){
var url = "../mail/ajax.php";

$.ajax({
   type:"POST",
   url: url,
   data:$("#formulario-ajax").serialize(),
   success: function(data){
       
       $("#nombre-status").html('');
       $("#apellido-status").html('');
       $("#email-status").html('');
       $("#telefono-status").html('');
       $("#calle-status").html('');
       $("#ext-status").html('');
       $("#int-status").html('');
       $("#colonia-status").html('');
       $("#municipio-status").html('');
       $("#fecha-status").html('');
       $("#servicio-status").html('');
       $("#mensaje-status").html('');
       $("#mensajeErr-status").html(data);//muestra los datos del script PHP
   }
});
return false;//evita la recarga de botón
});
});

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