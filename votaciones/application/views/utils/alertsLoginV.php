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
						window.location.href = "../LoginVotante_controller/index";/*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
					}
				})
			</script>	
		<?php } 

		if ($msj=="Error1"){ ?>
			<script type="text/javascript">
				Swal.fire({
					title: 'Error!',
					text: "No puede ingresar porque no esta habilitado para votar.",
					icon: 'error',
					showCancelButton: false,
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Aceptar'
				}).then((result) => {
					if (result.value) {
						window.location.href = "../LoginVotante_controller/index";/*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
					}
				})
			</script>	
		<?php }

		if ($msj=="Error2"){ ?>
			<script type="text/javascript">
				Swal.fire({
					title: 'Error!',
					text: "No puede ingresar porque posee DUI vencido.",
					icon: 'error',
					showCancelButton: false,
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Aceptar'
				}).then((result) => {
					if (result.value) {
						window.location.href = "../LoginVotante_controller/index";/*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
					}
				})
			</script>	
		<?php } 

		if ($msj=="Error3"){ ?>
			<script type="text/javascript">
				Swal.fire({
					title: 'Error!',
					text: "No puede ingresar porque ya ejercio su voto.",
					icon: 'error',
					showCancelButton: false,
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Aceptar'
				}).then((result) => {
					if (result.value) {
						window.location.href = "../LoginVotante_controller/index";/*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
					}
				})
			</script>	
		<?php }

		if ($msj=="Error4"){ ?>
			<script type="text/javascript">
				Swal.fire({
					title: 'Error!',
					text: "No puede ingresar porque no pertenece a un padron.",
					icon: 'error',
					showCancelButton: false,
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Aceptar'
				}).then((result) => {
					if (result.value) {
						window.location.href = "../LoginVotante_controller/index";/*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
					}
				})
			</script>	
		<?php }

		if($msj=='success') { ?>
		<script>
			Swal.fire({
				title: 'Felicidades!!!',
				text: "Usted ha ejercido su voto",
				icon: 'success',
				showCancelButton: false,
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Aceptar'
			}).then((result) => {
				if (result.value) {
					window.location.href = "../../LoginVotante_controller/index" ; /*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
				}
			})
		</script>
	<?php }

	}
	?>