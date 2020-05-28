function validar() {

    var email = document.getElementById("login_email").value;
    var password = document.getElementById("login_password").value;

    var expresion = /\w+@\w+\.+[a-z]{2,3}/; 
    //Expressao regular de um email, nome@dominio.url.

    if(email==""){
        errorbox("Introduza o seu email.")
    }else if(!expresion.test(email)) {
        //verifica a expressao do email
        errorbox("Endereço de email errado.");
    }else if(password==""){
        errorbox("Introduza a password")
    }
}