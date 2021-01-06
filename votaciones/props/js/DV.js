function validar(){

   var fechahora = document.getElementById('fechahora').value;
   var votacion = document.getElementById('votacion').selectedIndex;
   var persona = document.getElementById('persona').selectedIndex;
   var candidato = document.getElementById('candidato').selectedIndex;
   var estado = document.getElementById('estado').selectedIndex;

    //Validar fecha
    if(fechahora == ""){
    	document.getElementById("fechahora").style.boxShadow = '0 0 15px red'; 
        return false;
    }else{
        document.getElementById("fechahora").style.boxShadow = '0 0 15px green';
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

    if(estado == 0){
        document.getElementById("estado").style.boxShadow = '0 0 15px red'; 
        return false;
    }else{
        document.getElementById("estado").style.boxShadow = '0 0 15px green';
    }       

    return true;

// PARA COLOCAR COLOR A UN INPUT QUE ESTA VACIO
// document.getElementById("nombre").style.backgroundColor = "red";
}