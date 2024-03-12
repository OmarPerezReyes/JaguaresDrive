function validate() {
    var name = document.getElementById('username'); //usuario
    if(!name.value){
        name.focus();
        return false;
    }


    //Ya que el login es con usuario, lo voy a comentar, pero nos sera de utilidad si lo cambiamos a login con correo
    /*var email = document.getElementById('email'); //email
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
    }*/
  

    var contra = document.getElementById('contra'); //contraseña
    if(!contra.value){
        contra.focus();
        event.preventDefault();
        return false;
    }

    return true;
}