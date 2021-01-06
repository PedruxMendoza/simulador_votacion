function validarFormulario(){

	 var DUI   = document.getElementById('DUI').value;
	 var nombre1   = document.getElementById('n1').value;
	 var nombre2   = document.getElementById('n2').value;
     var apellido1 = document.getElementById('a1').value;
     var apellido2 = document.getElementById('a2').value;
     var telefono   = document.getElementById('tel').value;
     var direccion   = document.getElementById('dir').value;
     var fnacimiento = document.getElementById('fn').value;
     var estado = document.getElementById('estado').selectedIndex;
     var estadop = document.getElementById('estadop').selectedIndex;
     var sexo = document.getElementById('sex').selectedIndex;
     var departamento = document.getElementById('depa').selectedIndex;
     var municipio = document.getElementById('mun').selectedIndex;
     var imagen = document.getElementById('img').value;

    //Validar campo obligatorio
    if(DUI.length == 0){ 
        document.getElementById("DUI").style.boxShadow = '0 0 15px red';       
        return false;
    }else{
        document.getElementById("DUI").style.boxShadow = '0 0 15px green';
    }

    if(nombre1.length == 0){
		document.getElementById('n1').style.boxShadow = '0 0 15px red';
		document.getElementById('n1').placeholder = 'Este campo es obligatorio';
		
		return false;
	}else{
		document.getElementById('n1').style.boxShadow = '0 0 15px green';
		
	}

	if(nombre1.length > 25){
		document.getElementById('n1').style.boxShadow = '0 0 15px red';
		document.getElementById('n1').value = '';
		document.getElementById('n1').placeholder = 'Este campo admite 25 caracteres' ;
		
		return false;
	}else{
		document.getElementById('n1').style.boxShadow = '0 0 15px green';
		
	}

    if(nombre2.length == 0){
		document.getElementById('n2').style.boxShadow = '0 0 15px red';
		document.getElementById('n2').placeholder = 'Este campo es obligatorio';
		
		return false;
	}else{
		document.getElementById('n2').style.boxShadow = '0 0 15px green';
		
	}

	if(nombre2.length > 25){
		document.getElementById('n2').style.boxShadow = '0 0 15px red';
		document.getElementById('n2').value = '';
		document.getElementById('n2').placeholder = 'Este campo admite 25 caracteres' ;
		
		return false;
	}else{
		document.getElementById('n2').style.boxShadow = '0 0 15px green';
		
	}

    //Validar campo obligatorio
    if(apellido1.length == 0){
        document.getElementById("a1").style.boxShadow = '0 0 15px red'; 
        document.getElementById("a1").placeholder = "Este campo es obligatorio";
        return false;
    }else{
        document.getElementById("a1").style.boxShadow = '0 0 15px green';
    }

    if(apellido1.length > 35){
		document.getElementById('a1').style.boxShadow = '0 0 15px red';
		document.getElementById('a1').value = '';
		document.getElementById('a1').placeholder = 'Este campo admite 35 caracteres' ;
		
		return false;
	}else{
		document.getElementById('a1').style.boxShadow = '0 0 15px green';
		
	}

    if(apellido2.length == 0){
        document.getElementById("a2").style.boxShadow = '0 0 15px red'; 
        document.getElementById("a2").placeholder = "Este campo es obligatorio";
        return false;
    }else{
        document.getElementById("a2").style.boxShadow = '0 0 15px green';
    }

    if(apellido2.length > 35){
		document.getElementById('a2').style.boxShadow = '0 0 15px red';
		document.getElementById('a2').value = '';
		document.getElementById('a2').placeholder = 'Este campo admite 35 caracteres' ;
		
		return false;
	}else{
		document.getElementById('a2').style.boxShadow = '0 0 15px green';
		
	}

	if(telefono.length == 0){ 
        document.getElementById("tel").style.boxShadow = '0 0 15px red';       
        return false;
    }else{
        document.getElementById("tel").style.boxShadow = '0 0 15px green';
    }

	if(direccion.length == 0){
		document.getElementById('dir').style.boxShadow = '0 0 15px red';
		document.getElementById('dir').placeholder = 'Este campo es obligatorio';
		
		return false;
	}else{
		document.getElementById('dir').style.boxShadow = '0 0 15px green';
		document.getElementById('dir').style.backgroundColor = 'white';
	}

	if(direccion.length > 40){
		document.getElementById('dir').style.boxShadow = '0 0 15px red';
		document.getElementById('dir').value = '';
		document.getElementById('dir').placeholder = 'Este campo admite 40 caracteres';
		
		return false;
	}else{
		document.getElementById('dir').style.boxShadow = '0 0 15px green';
		document.getElementById('dir').style.backgroundColor = 'white';
	}

	//Validar fecha
    if(fnacimiento == ""){
    	document.getElementById("fn").style.boxShadow = '0 0 15px red'; 
        return false;
    }else{
        document.getElementById("fn").style.boxShadow = '0 0 15px green';
    }

    var edad = calcularEdad(fnacimiento);

    function calcularEdad(fecha) {
    var hoy = new Date();
    var cumpleanos = new Date(fecha);
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    var m = hoy.getMonth() - cumpleanos.getMonth();

    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
    }

    return edad;
	}

	if(edad < 18){
    // aqui haces lo que quieras con la validacion de si es mayor a 18
    	document.getElementById("fn").style.boxShadow = '0 0 15px red'; 
        return false;
	}

    //Validar comboBox
    if(estado == 0){
    	document.getElementById("estado").style.boxShadow = '0 0 15px red'; 
    	return false;
    }else{
        document.getElementById("estado").style.boxShadow = '0 0 15px green';
    }

    if(estadop == 0){
    	document.getElementById("estadop").style.boxShadow = '0 0 15px red'; 
    	return false;
    }else{
        document.getElementById("estadop").style.boxShadow = '0 0 15px green';
    }    

    if(sexo == 0){
    	document.getElementById("sex").style.boxShadow = '0 0 15px red'; 
    	return false;
    }else{
        document.getElementById("sex").style.boxShadow = '0 0 15px green';
    }

    if(departamento == 0){
    	document.getElementById("depa").style.boxShadow = '0 0 15px red'; 
    	return false;
    }else{
        document.getElementById("depa").style.boxShadow = '0 0 15px green';
    }       

    if(municipio == 0){
    	document.getElementById("mun").style.boxShadow = '0 0 15px red'; 
    	return false;
    }else{
        document.getElementById("mun").style.boxShadow = '0 0 15px green';
    }

    if(imagen.length == 0){ 
        document.getElementById("img").style.boxShadow = '0 0 15px red'; 
        
        return false;
    }else{
        document.getElementById("img").style.boxShadow = '0 0 15px green';
    }

    return true;

}