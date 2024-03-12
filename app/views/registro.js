function validate() {
    var name = document.getElementById('nom'); //nombre
    if(!name.value){
        name.focus();
        return false;
    }

    
    var matricula = document.getElementById('matricula'); //matricula
    if(!matricula.value){
        matricula.focus();
        event.preventDefault();
        return false;
    }

    
    var apep = document.getElementById('apep'); //paterno
    if(!apep.value){
        apep.focus();
        event.preventDefault();
        return false;
    }

    
    var apem = document.getElementById('apem'); //materno
    if(!apem.value){
        apem.focus();
        event.preventDefault();
        return false;
    }

    
    var fechan = document.getElementById('fechan'); //fecha nacimineto
    if(!fechan.value){
        fechan.focus();
        event.preventDefault();
        return false;
    }


    var email = document.getElementById('email'); //email
    var emailRegexGeneral = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/; //general
    var emailRegexUPV = /^[a-zA-Z0-9._-]+@upv\.edu\.mx$/; //institucional
    if(!email.value){
        email.focus();
        event.preventDefault();
        return false;
    }
    if (!emailRegexGeneral.test(email.value)) {
        alert('Correo NO válido');
        return false;
    }
    if (!emailRegexUPV.test(email.value)) {
        alert('Lo sentimos, de momento el sistema es solo para elementos de la UPV\n Su correo no está autorizado!');
        return false;
    }

    

    var contra = document.getElementById('contra'); //contraseña
    if(!contra.value){
        contra.focus();
        event.preventDefault();
        return false;
    }
    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!passwordRegex.test(contra.value)) {
        alert('Contraseña inválida.\nDebe tener al menos 8 caracteres, incluyendo:\n - 1 letra mayúscula\n - 1 letra minúscula\n - 1 número\n - 1 carácter especial');
        return false;
    }
    

    var tel = document.getElementById('tel'); //telefono
    if(!tel.value){
        tel.focus();
        event.preventDefault();
        return false;
    }
    var phoneRegex = /^\d{10}$/;
    if (!phoneRegex.test(tel.value)) {
        alert('Número de teléfono inválido. Debe tener al menos 10 dígitos.');
        return false;
    }


    var placas = document.getElementById('placas'); // placas
    if(!placas.value){
        placas.focus();
        event.preventDefault();
        return false;
    }


    var mode = document.getElementById('mode'); //auto
    if(!mode.value){
        mode.focus();
        event.preventDefault();
        return false;
    }

    
    var col = document.getElementById('col'); //color
    if(!col.value){
        col.focus();
        event.preventDefault();
        return false;
    }

    
    var marca = document.getElementById('marca'); //marca
    if(!marca.value){
        marca.focus();
        event.preventDefault();
        return false;
    }

    return true;
}