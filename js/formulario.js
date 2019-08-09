/*********************Formulario validado***************************************** */
var mensaje = ['No se admiten números en este campo', 'No se admiten números en este campo', 'Porfavor, Introduce un email válido', 'Introduce un número de teléfono válido', 'Introduce un nombre de empresa válido', 'Introduce un giro empresarial válido', 'Introduce una calle válida', 'Introduce un Número exterior válido', 'Introduce un Número interior válido', 'Introduce una colonia válida', 'Debes seleccionar una opción', 'Introduce un mensaje no muy extenso'];
var objetos = null;

function crearAviso(msj, pos){
    objetos = document.createElement('DIV');
    var t = document.createTextNode(msj);

    objetos.appendChild(t);
    objetos.className = 'error-msj';
    objetos.style.top = pos + "px";
    document.body.appendChild(objetos);
}

function destruirAviso(){
    document.body.removeChild(objetos);
    objetos = null;
}

function validar(event){
    var form = document.forms[0];
    var l = form.length-1;
    var n = 612;

    if(objetos != null){
        destruirAviso(objetos);
    }

    for(var i = 0; i<=l; i++){
        if(!form[i].validity.valid){
            crearAviso(mensaje[i], n);
            event.preventDefault();
            break;
        }

        n+=90;
    }
}