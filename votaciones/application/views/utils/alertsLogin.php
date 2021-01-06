	<?php if (isset($msj)) { 

		if ($msj=="Error"){ ?>
			<script type="text/javascript">
				Swal.fire({
					title: 'Error al validar sus credenciales!!',
					text: "Si cree que hay un error, contacte al administrador del sistema.",
					icon: 'error',
					showCancelButton: false,
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Aceptar'
				}).then((result) => {
					if (result.value) {
						window.location.href = "../loginController/index";/*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
					}
				})
			</script>	
		<?php }

		if ($msj=="success"){ ?>
			<script type="text/javascript">
				Swal.fire({
					title: 'Se ha modificado correctamente la contraseña!',
					text: "La proxima vez, inicie con su nueva contraseña",
					icon: 'success',
					showCancelButton: false,
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Aceptar'
				}).then((result) => {
					if (result.value) {
						window.location.href = "../welcome/index";/*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
					}
				})
			</script>	
		<?php }

		if ($msj=="ErrorCP"){ ?>
			<script type="text/javascript">
				Swal.fire({
					title: 'Error al validar sus credenciales!!',
					text: "Ha escrito mal su contraseña, Por favor intentelo de Nuevo.",
					icon: 'error',
					showCancelButton: false,
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Aceptar'
				}).then((result) => {
					if (result.value) {
						window.location.href = "../welcome/index";/*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
					}
				})
			</script>	
		<?php }

		if ($msj=="errorCorreo"){ ?>
			<script type="text/javascript">
				Swal.fire({
					title: 'Error en correo!!',
					text: "El correo no se encuentra registrado en nuestra base de datos!.",
					icon: 'info',
					showCancelButton: false,
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Aceptar'
				}).then((result) => {
					if (result.value) {
						window.location.href = "../../loginController/index";/*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
					}
				})
			</script>	
		<?php }

		if ($msj=="okCorreo"){ ?>
			<script type="text/javascript">
				Swal.fire({
					title: 'Correo enviado!!',
					text: "Se envio su contraseña al correo especificado!.",
					icon: 'success',
					showCancelButton: false,
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Aceptar'
				}).then((result) => {
					if (result.value) {
						window.location.href = "../../loginController/index";/*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
					}
				})
			</script>	
		<?php }

		if ($msj=="errorEnviar"){ ?>
			<script type="text/javascript">
				Swal.fire({
					title: 'El correo no pudo ser enviado!!',
					text: "Contacte con el administrador del sistema!.",
					icon: 'error',
					showCancelButton: false,
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Aceptar'
				}).then((result) => {
					if (result.value) {
						window.location.href = "../../loginController/index";/*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
					}
				})
			</script>	
		<?php }

	}
	?>