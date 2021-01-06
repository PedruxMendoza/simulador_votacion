function validar(){

   var partido = document.getElementById('partido').value;
   var imagen = document.getElementById('imagen').value;
   var votacion = document.getElementById('votacion').selectedIndex;   
   var persona = document.getElementById('persona').selectedIndex;   

    //Validar campo obligatorio
    if(partido.length == 0){ 
        document.getElementById("partido").style.boxShadow = '0 0 15px red'; 
        document.getElementById("partido").placeholder = "Este campo es obligatorio";
        
        return false;
    }else{
        document.getElementById("partido").style.boxShadow = '0 0 15px green';
    }

    if(partido.length > 70){
        document.getElementById('partido').style.boxShadow = '0 0 15px red';
        document.getElementById('partido').value = '';
        document.getElementById('partido').placeholder = 'Este campo admite 70 caracteres' ;
        
        return false;
    }else{
        document.getElementById('partido').style.boxShadow = '0 0 15px green';
        
    }

    if(imagen.length == 0){ 
        document.getElementById("imagen").style.boxShadow = '0 0 15px red'; 
        
        return false;
    }else{
        document.getElementById("imagen").style.boxShadow = '0 0 15px green';
    }

    //Validar comboBox
    if(votacion == 0){
        document.getElementById("votacion").style.boxShadow = '0 0 15px red'; 
        return false;
    }else{
        document.getElementById("votacion").style.boxShadow = '0 0 15px green';
    }

    if(persona == 0){
        document.getElementById("persona").style.boxShadow = '0 0 15px red'; 
        return false;
    }else{
        document.getElementById("persona").style.boxShadow = '0 0 15px green';
    }

    return true;

// PARA COLOCAR COLOR A UN INPUT QUE ESTA VACIO
// document.getElementById("nombre").style.backgroundColor = "red";
}