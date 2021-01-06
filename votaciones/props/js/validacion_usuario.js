function validacion(){

	var email = document.getElementById('email').value;
	var clave = document.getElementById('clave').value;
	var dui = document.getElementById('s1').selectedIndex;
	var rol = document.getElementById('s2').selectedIndex;
	var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)([A-Za-z\d]|[^ ]){6,16}$/;
	


	if (!(/\S+@\S+\.\S+/.test(email))) {
		document.getElementById('email').style.boxShadow = '0 0 15px red';
		document.getElementById('email').placeholder = 'Campo Obligatorio';
		return false;
	}else{
		document.getElementById('email').style.boxShadow = '0 0 15px green';
	}
 

	if (clave.length == 0) {
		document.getElementById('clave').style.boxShadow = '0 0 15px red';
		document.getElementById('clave').placeholder = 'Campo Obligatorio';
		return false;

	}else{
		document.getElementById('clave').style.boxShadow = '0 0 15px green';
	}if (clave.length < 6) {
		document.getElementById('clave').style.boxShadow = '0 0 15px red';
		alert('La contraseña es menor a 6 caracteres');
		return false;
	}else{
		document.getElementById('clave').style.boxShadow = '0 0 15px green';
	}if(clave.length > 16){
		document.getElementById('clave').style.boxShadow = '0 0 15px red';
		alert('La contraseña solo puede ser de 16 caracteres');
		return false;
	}else{
		document.getElementById('clave').style.boxShadow = '0 0 15px green';
	}

	var espacios = false;
	var cont = 0;

	while (!espacios && (cont < clave.length)) {
		if (clave.charAt(cont) == " ")
			espacios = true;
		cont++;
	}

	if (!(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)([A-Za-z\d]|[^ ]){6,16}$/.test(clave))) {
		document.getElementById('clave').style.boxShadow = '0 0 15px red';
		alert('hay un caracter no aceptado');
		return false;

	}else{
		document.getElementById('clave').style.boxShadow = '0 0 15px green';
	}

	if (espacios) {
		document.getElementById('clave').style.boxShadow = '0 0 15px red';
		alert ("La contraseña no puede contener espacios en blanco");
		return false;
	}else{
		document.getElementById('clave').style.boxShadow = '0 0 15px green';
	}

	if (dui == 0) {
		document.getElementById('s1').style.boxShadow = '0 0 15px red';

		return false;
	}else{
		document.getElementById('s1').style.boxShadow = '0 0 15px green';
	}

	if (rol == 0) {
		document.getElementById('s2').style.boxShadow = '0 0 15px red';

		return false;
	}else{
		document.getElementById('s2').style.boxShadow = '0 0 15px green';
	}

	return true;
}


function validacionact(){

	var email = document.getElementById('correo').value;
	var clave = document.getElementById('pass').value;
	var dui = document.getElementById('s11').selectedIndex;
	var rol = document.getElementById('s22').selectedIndex;


	if (!(/\S+@\S+\.\S+/.test(email))) {
		document.getElementById('correo').style.boxShadow = '0 0 15px red';
		document.getElementById('correo').placeholder = 'Campo Obligatorio';
		return false;
	}else{
		document.getElementById('correo').style.boxShadow = '0 0 15px green';
	}

	if (clave.length == 0) {
		document.getElementById('pass').style.boxShadow = '0 0 15px red';
		document.getElementById('pass').placeholder = 'Campo Obligatorio';
		return false;
	}else{
		document.getElementById('pass').style.boxShadow = '0 0 15px green';
	}

	if (dui == 0) {
		document.getElementById('s11').style.boxShadow = '0 0 15px red';

		return false;
	}else{
		document.getElementById('s11').style.boxShadow = '0 0 15px green';
	}

	if (rol == 0) {
		document.getElementById('s22').style.boxShadow = '0 0 15px red';

		return false;
	}else{
		document.getElementById('s22').style.boxShadow = '0 0 15px green';
	}

	return true;
}



//Ocultar o ver contraseña de vista Registrar//

function mostrarPassword(){
	var cambio = document.getElementById("clave");
	if(cambio.type == "password"){
		cambio.type = "text";
		$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
	}else{
		cambio.type = "password";
		$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
	}
} 

$(document).ready(function () {
	//CheckBox mostrar contraseña
	$('#ShowPassword').click(function () {
		$('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
	});
});

