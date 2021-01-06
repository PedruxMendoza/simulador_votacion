function validarFormulario(){

    var dui   = document.getElementById('DUI').value;
    var nombre1   = document.getElementById('n1').value;
    var nombre2   = document.getElementById('n2').value;
    var apellido1 = document.getElementById('a1').value;
    var apellido2 = document.getElementById('a2').value;
    var telefono   = document.getElementById('tel').value;
    var direccion   = document.getElementById('dir').value;
    var fnacimiento = document.getElementById('fn').value;
    var estado = document.getElementById('estado').selectedIndex;
    var sexo = document.getElementById('sex').selectedIndex;
    var departamento = document.getElementById('depa').selectedIndex;
    var municipio = document.getElementById('mun').selectedIndex;
    var imagen = document.getElementById('img').selectedIndex;



    if( dui.length < 10){
        document.getElementById("DUI").style.boxShadow = '0 0 15px red';
        document.getElementById("DUI").placeholder = 'campo obligatorio';
        return false;
    }else{
        document.getElementById("DUI").style.boxShadow = '0 0 15px green';
        
    }

    //Validar campo obligatorio
    if( nombre1.length == 0){

        if(document.form1.texto.length>25){
            alert(document.form1.texto.length);
            return false;
        }else{
            alert(document.form1.texto.length);
            return false;
        }
        document.getElementById("nombre1").style.borderColor = "red"; 
        document.getElementById("nombre1").style.boxShadow = '0 0 15px red';
        document.getElementById("nombre1").placeholder = "Este campo es obligatorio";
        
        return false;
    }else{
        document.getElementById("nombre1").style.boxShadow = '0 0 15px green';
    }

    if( nombre2.length == 0){

        if(document.form1.texto.length>2){
            alert(document.form1.texto.length);
            return false;
        }else{
            alert(document.form1.texto.length);
            return false;
        }
        document.getElementById("nombre2").style.borderColor = "red"; 
        document.getElementById("nombre2").style.boxShadow = '0 0 15px red';
        document.getElementById("nombre2").placeholder = "Este campo es obligatorio";
        
        return false;
    }else{
        document.getElementById("nombre2").style.boxShadow = '0 0 15px green';
    }

    //Validar campo obligatorio
    if( apellido.length == 0){
        document.getElementById("apellido").style.boxShadow = '0 0 15px red'; 
        document.getElementById("apellido").placeholder = "Este campo es obligatorio";
        return false;
    }else{
        document.getElementById("apellido").style.boxShadow = '0 0 15px green';
    }

    //Validar fecha
    if(fnacimiento == ""){
    	document.getElementById("fnacimiento").style.boxShadow = '0 0 15px red'; 
        return false;
    }else{
        document.getElementById("fnacimiento").style.boxShadow = '0 0 15px green';
    }

    if(telefono.length == 0){
        document.getElementById("telefono").style.boxShadow = '0 0 15px red'; 
        return false;
    }else{
        document.getElementById("telefono").style.boxShadow = '0 0 15px green';
    }



    if( direccion.length == 0){
        document.getElementById("dir").style.boxShadow = '0 0 15px red';
        document.getElementById("dir").placeholder = 'campo obligatorio';
        return false;
    }else{
        document.getElementById("dir").style.boxShadow = '0 0 15px green';
        
    }

    //Validar comboBox
    if(estado == 0){
    	document.getElementById("estado").style.boxShadow = '0 0 15px red'; 
    	return false;
    }else{
        document.getElementById("estado").style.boxShadow = '0 0 15px green';
    }

    if(sexo == 0){
        document.getElementById("sexo").style.boxShadow = '0 0 15px red'; 
        return false;
    }else{
        document.getElementById("sexo").style.boxShadow = '0 0 15px green';
    }

    if(departamento == 0){
        document.getElementById("departamento").style.boxShadow = '0 0 15px red'; 
        return false;
    }else{
        document.getElementById("departamento").style.boxShadow = '0 0 15px green';
    }

    if(municipio == 0){
        document.getElementById("municipio").style.boxShadow = '0 0 15px red'; 
        return false;
    }else{
        document.getElementById("municipio").style.boxShadow = '0 0 15px green';
    }


    if( imagen.length == 0){
        document.getElementById("img").style.boxShadow = '0 0 15px red';
        document.getElementById("img").placeholder = 'campo obligatorio';
        return false;
    }else{
        document.getElementById("img").style.boxShadow = '0 0 15px green';
        
    }



    return true;

// PARA COLOCAR COLOR A UN INPUT QUE ESTA VACIO
// document.getElementById("nombre").style.backgroundColor = "red";
}