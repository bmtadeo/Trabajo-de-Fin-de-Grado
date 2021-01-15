function registroUsuarioAdmin(){
    var nombre = document.registroAdmin.nombre;
    var apellido1 = document.registroAdmin.apellido1;
    var apellido2 = document.registroAdmin.apellido2;
    var email = document.registroAdmin.email;
    var telf = document.registroAdmin.telf;
    var nacimiento = document.registroAdmin.nacimiento;
    if(nombre.value==""||apellido1.value==""||nacimiento.value==""){
        alert("Por favor, rellena todos los campos obligatorios. El campo de Documentación no es obligatorio");
    }else if(nombre.length>50){
        alert("El nombre es demasiado largo.");
    }else if(apellido1.length>50){
        alert("El apellido 1 es demasiado largo.");
    }else if(apellido2.length>50){
        alert("El apellido 2 es demasiado largo.");
    }else if(email.length>50){
        alert("El email es demasiado largo.");
    }else if(telf.length>20){
        alert("El telefono es demasiado largo.");
    }else{
        document.registroAdmin.submit();
    }
}

function cambioContrasenya(){
    var usuario = document.cambioContra.usuario;
    var contraAnt = document.cambioContra.contraAnt;
    var contraNue = document.cambioContra.contraNue;
    if (contraNue.value == "" ||contraAnt.value == "" || usuario.value == "") {
        alert("Por favor, rellena todos los campos.");
    }else if(contraNue.length<8){
        alert("La contraseña es demasiado corta.");
    }else{
        document.cambioContra.submit();
    }
}
