/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function grabarUsuario(){
    if(confirmPassword()){
        grabar();
    }
}

function confirmPassword(){
    var pwd1 = document.getElementById("password");
    var pwd2 = document.getElementById("confirmPassword");
    var msg = "";
    switch(true){
        //case pwd1.value == "":
        //    msg = "Debe ingresar la contraseña!\n";
        case pwd2.value == "":
            msg += "Debe ingresar la confirmación de contraseña!";
            break;
        default:
            if(pwd1.value != pwd2.value){
                msg += "La contraseña y la confirmación de contraseña no coinciden!";
            }
    }
    if(msg != ""){
        alert(msg);
    }
    return msg == "";
}

