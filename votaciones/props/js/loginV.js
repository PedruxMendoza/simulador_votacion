function validar(){

 var DUI   = document.getElementById('DUI').value;

    //Validar campo obligatorio
    if(DUI.length == 0){ 
        document.getElementById("DUI").style.boxShadow = '0 0 15px red';       
        return false;
    }else{
        document.getElementById("DUI").style.boxShadow = '0 0 15px green';
    }

    return true;

// PARA COLOCAR COLOR A UN INPUT QUE ESTA VACIO
// document.getElementById("nombre").style.backgroundColor = "red";
}