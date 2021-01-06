function validar(){

   var passold = document.getElementById('passold').value;
   var pass1 = document.getElementById('pass1').value;
   var pass2 = document.getElementById('pass2').value;

    //Validar campo obligatorio
    if(passold.length == 0){ 
        document.getElementById("passold").style.boxShadow = '0 0 15px red'; 
        document.getElementById("passold").placeholder = "Este campo es obligatorio";
        
        return false;
    }else{
        document.getElementById("passold").style.boxShadow = '0 0 15px green';
    }

    if(pass1.length == 0){ 
        document.getElementById("pass1").style.boxShadow = '0 0 15px red'; 
        document.getElementById("pass1").placeholder = "Este campo es obligatorio";
        
        return false;
    }else{
        document.getElementById("pass1").style.boxShadow = '0 0 15px green';
    }   

    if(pass2.length == 0){ 
        document.getElementById("pass2").style.boxShadow = '0 0 15px red'; 
        document.getElementById("pass2").placeholder = "Este campo es obligatorio";
        
        return false;
    }else{
        document.getElementById("pass2").style.boxShadow = '0 0 15px green';
    }

    if(passold == pass1){ 
        document.getElementById("pass1").style.boxShadow = '0 0 15px red';
        document.getElementById("pass1").value = '';
        document.getElementById("pass1").placeholder = "Las contraseñas no deben ser las mismas";
        
        return false;
    }else{
        document.getElementById("pass1").style.boxShadow = '0 0 15px green';
    }

    return true;

// PARA COLOCAR COLOR A UN INPUT QUE ESTA VACIO
// document.getElementById("nombre").style.backgroundColor = "red";
}