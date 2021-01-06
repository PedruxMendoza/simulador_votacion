function validacion(){

	var urna = document.getElementById('urna').selectedIndex;
	var dui = document.getElementById('DUI').selectedIndex;
	
	


	if (urna == 0) {
		document.getElementById('urna').style.boxShadow = '0 0 15px red';
		alert('Campo Urna es obligatorio');
		return false;
	}else{
		document.getElementById('urna').style.boxShadow = '0 0 15px green';
	}

	if (dui == 0) {
		document.getElementById('DUI').style.boxShadow = '0 0 15px red';
		alert('Campo DUI es obligatorio');
		return false;
	}else{
		document.getElementById('DUI').style.boxShadow = '0 0 15px green';
	}
 
	return true;
}


function validacionact(){

	var urna = document.getElementById('urna1').selectedIndex;
	var dui= document.getElementById('DUI1').selectedIndex;



	if (urna == 0) {
		document.getElementById('urna1').style.boxShadow = '0 0 15px red';
		alert('Campo Urna es obligatorio');

		return false;
	}else{
		document.getElementById('urna1').style.boxShadow = '0 0 15px green';
	}

	if (dui == 0) {
		document.getElementById('DUI1').style.boxShadow = '0 0 15px red';
		alert('Campo DUI es obligatorio');
		return false;
	}else{
		document.getElementById('DUI1').style.boxShadow = '0 0 15px green';
	}

	return true;
}


