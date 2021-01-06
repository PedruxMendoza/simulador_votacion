function validar(){

 var correo   = document.getElementById('correo').value;
 var clave   = document.getElementById('clave').value;

    //Validar campo obligatorio
    if(correo.length == 0){ 
        document.getElementById("correo").style.boxShadow = '0 0 15px red';       
        return false;
    }else{
        document.getElementById("correo").style.boxShadow = '0 0 15px green';
    }

    if(clave.length == 0){ 
        document.getElementById("clave").style.boxShadow = '0 0 15px red';       
        return false;
    }else{
        document.getElementById("clave").style.boxShadow = '0 0 15px green';
    }
    return true;

// PARA COLOCAR COLOR A UN INPUT QUE ESTA VACIO
// document.getElementById("nombre").style.backgroundColor = "red";
}