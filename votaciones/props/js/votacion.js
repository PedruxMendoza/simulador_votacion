function validar(){

 var descripcion   = document.getElementById('descripcion').value;
 var date_start = document.getElementById('date_start').value;
 var date_end = document.getElementById('date_end').value;
 var cantvoto = document.getElementById('cantvoto').value;
 var estado = document.getElementById('estado').selectedIndex;



    //Validar campo obligatorio
    if(descripcion.length == 0){ 
        document.getElementById("descripcion").style.boxShadow = '0 0 15px red'; 
        document.getElementById("descripcion").placeholder = "Este campo es obligatorio";
        
        return false;
    }else{
        document.getElementById("descripcion").style.boxShadow = '0 0 15px green';
    }

    //Validar fecha
    if(date_start == ""){
    	document.getElementById("date_start").style.boxShadow = '0 0 15px red'; 
        return false;
    }else{
        document.getElementById("date_start").style.boxShadow = '0 0 15px green';
    }

    if(date_end == ""){
        document.getElementById("date_end").style.boxShadow = '0 0 15px red'; 
        return false;
    }else{
        document.getElementById("date_end").style.boxShadow = '0 0 15px green';
    }

    if(date_start == date_end)
    {
        document.getElementById("date_start").style.boxShadow = '0 0 15px red'; 
        document.getElementById("date_end").style.boxShadow = '0 0 15px red';
        return false;
    }else if (date_start > date_end) {
        document.getElementById("date_start").style.boxShadow = '0 0 15px red'; 
        document.getElementById("date_end").style.boxShadow = '0 0 15px red';
        return false;
    }else{
        document.getElementById("date_start").style.boxShadow = '0 0 15px green';
        document.getElementById("date_end").style.boxShadow = '0 0 15px green';
    }

    if(isNaN(cantvoto) || cantvoto.length == 0){
        document.getElementById("cantvoto").style.boxShadow = '0 0 15px red'; 
        return false;
    }else{
        document.getElementById("cantvoto").style.boxShadow = '0 0 15px green';
    }

    if(cantvoto <= 0){
        document.getElementById("cantvoto").style.boxShadow = '0 0 15px red';
        document.getElementById("cantvoto").value = '';
        document.getElementById("cantvoto").placeholder = "Cantidad minima: 1";
        return false;
    }else{
        document.getElementById("cantvoto").style.boxShadow = '0 0 15px green';
    }

    if(cantvoto > 6427479){
        document.getElementById("cantvoto").style.boxShadow = '0 0 15px red';
        document.getElementById("cantvoto").value = '';
        document.getElementById("cantvoto").placeholder = "Cantidad maxima: 6427479";
        return false;
    }else{
        document.getElementById("cantvoto").style.boxShadow = '0 0 15px green';
    }

    //Validar comboBox
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