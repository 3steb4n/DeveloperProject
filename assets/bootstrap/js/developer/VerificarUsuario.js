function UserExists(usuarioEmail, usuarioClave){
    var mensajeError = document.getElementById("labelError");

    if(usuarioEmail=="" || usuarioClave==""){
        mensajeError.innerHTML = "Error. Uno de los campos obligatorios está vacio."
    }else{
        var xmlStart = new XMLHttpRequest();
        xmlStart.onreadystatechange = function(){
            if (this.status == 200 && this.readyState == 4) {
                if (this.responseText == "El usuario está incorrecto o no existe.") {
                    mensajeError.innerHTML = this.responseText;
                }else if(this.responseText == "Usuario existe."){
                    location.href = "views/index.php";
                }else{
                    mensajeError.innerHTML = "Error con la comunicación. Intentelo mas tarde."
                }
            }
        };
    }
    xmlStart.open('GET', 'controllers/personas_controller.php?userEmail=' + usuarioEmail + '&userPassword=' + usuarioClave, 'true');
    xmlStart.send();

}