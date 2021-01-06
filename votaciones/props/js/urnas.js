
function validar(){

	var jrv = document.getElementById('jrv').value;
	var nombre = document.getElementById('nombre').value;
	var sede = document.getElementById('sede').selectedIndex;


//se crea un if para validar el campo obligatorio

if(isNaN(jrv) || jrv.length == 0){
	document.getElementById("jrv").style.boxShadow = '0 0 15px red'; 
	return false;
}else{
	document.getElementById("jrv").style.boxShadow = '0 0 15px green';
}

if(jrv <= 0){
	document.getElementById("jrv").style.boxShadow = '0 0 15px red';
	document.getElementById("jrv").value = '';
	document.getElementById("jrv").placeholder = "Cantidad minima: 1";
	return false;
}else{
	document.getElementById("jrv").style.boxShadow = '0 0 15px green';
}

if(jrv > 99999){
	document.getElementById("jrv").style.boxShadow = '0 0 15px red';
	document.getElementById("jrv").value = '';
	document.getElementById("jrv").placeholder = "Cantidad maxima: 99999";
	return false;
}else{
	document.getElementById("jrv").style.boxShadow = '0 0 15px green';
}

if(nombre.length == 0){
	document.getElementById("nombre").style.boxShadow = '0 0 15px red'; 
	document.getElementById("nombre").placeholder = "Este campo es obligatorio";

	return false;
}else{
	document.getElementById("nombre").style.boxShadow = '0 0 15px green';
	document.getElementById("nombre").style.backgroundColor= 'white'; 
}


if(nombre.length > 20){
	document.getElementById("nombre").style.boxShadow = '0 0 15px red';
	document.getElementById("nombre").value = '';
	document.getElementById("nombre").placeholder = "Este campo admite 20 caracteres";

	return false;
}else{
	document.getElementById("nombre").style.boxShadow = '0 0 15px green';
	document.getElementById("nombre").style.backgroundColor= 'white'; 
}



if(sede == 0){
	document.getElementById('sede').style.boxShadow = '0 0 15px red';
	document.getElementById('sede').placeholder = 'Este campo es obligatorio';

	return false;
}else{
	document.getElementById('sede').style.boxShadow = '0 0 15px green';
	document.getElementById('municipio').style.backgroundColor = 'white';
}

return true;
}