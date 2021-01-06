<?php 
if (isset($msj)) {
	if($msj=='success') { ?>
		<script>
			Swal.fire({
				title: ' Se agrego el registro correctamente!!!',
				text: "Se ha insertado correctamente el registro",
				icon: 'success',
				showCancelButton: false,
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Aceptar'
			}).then((result) => {
				if (result.value) {
					window.location.href = "../padronController/index" ; /*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
				}
			})
		</script>
	<?php }

	if($msj=='successE') { ?>
		<script>
			Swal.fire({
				title: 'Eliminado correctamente!!!',
				text: "Se ha Eliminado correctamente el dato",
				icon: 'success',
				showCancelButton: false,
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Aceptar'
			}).then((result) => {
				if (result.value) {
					window.location.href = "../../padronController/index" ; /*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
				}
			})
		</script>
	<?php } 

	if($msj=='errorE') { ?>
		<script>
			Swal.fire({
				title: 'Error al Eliminar!!!',
				text: "No se ha podido eliminar porque esta relacionado con una tabla",
				icon: 'error',
				showCancelButton: false,
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Aceptar'
			}).then((result) => {
				if (result.value) {
					window.location.href = "../../padronController/index" ; /*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
				}
			})
		</script>
	<?php }	 

	if ($msj=='modi') { ?>
		<script>
			Swal.fire({
				title: 'Modificado correctamente!!!',
				text: "Se ha modificado correctamente el dato",
				icon: 'success',
				showCancelButton: false,
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Aceptar'
			}).then((result) => {
				if (result.value) {
					window.location.href = "../padronController/index";/*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
				}
			})
		</script>
	<?php }

	if ($msj=='cancel') { ?>
		<script>
			Swal.fire({
				title: 'Cancelado correctamente!!!',
				text: "Se ha cancelado correctamente la persona",
				icon: 'success',
				showCancelButton: false,
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Aceptar'
			}).then((result) => {
				if (result.value) {
					window.location.href = "../../padronController/index";/*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
				}
			})
		</script>
	<?php }

	if($msj=='errorC') { ?>
		<script>
			Swal.fire({
				title: 'Error al Modificar!!!',
				text: "No se ha podido eliminar porque esta relacionado con una tabla",
				icon: 'error',
				showCancelButton: false,
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Aceptar'
			}).then((result) => {
				if (result.value) {
					window.location.href = "../../padronController/index" ; /*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
				}
			})
		</script>
	<?php }	

	if ($msj=='active') { ?>
		<script>
			Swal.fire({
				title: 'Activado correctamente!!!',
				text: "Se ha activado correctamente la persona",
				icon: 'success',
				showCancelButton: false,
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Aceptar'
			}).then((result) => {
				if (result.value) {
					window.location.href = "../../padronController/index";/*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
				}
			})
		</script>
	<?php }

	if($msj=='errorA') { ?>
		<script>
			Swal.fire({
				title: 'Error al Activar!!!',
				text: "No se ha podido eliminar porque esta relacionado con una tabla",
				icon: 'error',
				showCancelButton: false,
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Aceptar'
			}).then((result) => {
				if (result.value) {
					window.location.href = "../../padronController/index" ; /*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
				}
			})
		</script>
	<?php }

	if ($msj=='ErrorM') { ?>
		<script>
			Swal.fire({
				title: 'No se modifico el registro!!!',
				text: "No se hizo ninguna modificacion",
				icon: 'error',
				showCancelButton: false,
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Aceptar'
			}).then((result) => {
				if (result.value) {
					window.location.href = "../padronController/index";/*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
				}
			})
		</script>
	<?php }
}
?>

<!---Alerta de eliminar --->
<script>
	function alerta_eliminar(id){
		Swal.fire({
			title: 'Esta seguro que desea eliminar?',
			text: "Este Registro no se podra Recuperar!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, eliminar!'
		}).then((result) => {
			if (result.value) {
				window.location.href = "../padronController/eliminar/"+id;
			}
		})
	}

</script>	



