<?php 
if (isset($msj)) {
	if($msj=='set') { ?>
		<script>
			Swal.fire({
				title: 'Persona agregada correctamente.',
				text: "Se ha insertado correctamente un nuevo registro de persona",
				icon: 'success',
				showCancelButton: false,
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Aceptar'
			}).then((result) => {
				if (result.value) {
					window.location.href = "../persona_controller/index" ; /*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
				}
			})
		</script>
	<?php }

	if($msj=='seterror') { ?>
		<script>
			Swal.fire({
				title: 'Error al Agregar!!!',
				text: "La imagen es demasiado grande para realizar esta operacion",
				icon: 'error',
				showCancelButton: false,
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Aceptar'
			}).then((result) => {
				if (result.value) {
					window.location.href = "../persona_controller/index" ; /*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
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
					window.location.href = "../../persona_controller/index" ; /*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
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
					window.location.href = "../../persona_controller/index" ; /*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
				}
			})
		</script>
	<?php } 

	if ($msj=='act') { ?>
		<script>
			Swal.fire({
				title: 'Modificado correctamente!!!',
				text: "Se ha modificado correctamente el registro de la persona",
				icon: 'success',
				showCancelButton: false,
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Aceptar'
			}).then((result) => {
				if (result.value) {
					window.location.href = "../persona_controller/index";/*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
				}
			})
		</script>
	<?php }

	if ($msj=='noact') { ?>
		<script>
			Swal.fire({
				title: 'No se modifico el registro!!!',
				text: "Hubo un error al modificar, no realizo ninguna modificación",
				icon: 'error',
				showCancelButton: false,
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Aceptar'
			}).then((result) => {
				if (result.value) {
					window.location.href = "../persona_controller/index";/*Aqui se cambia por el nombre del controlado que se ira a copiar (../nombre_controller/index)*/
				}
			})
		</script>
	<?php }
}
?>
<!-- PEGAR AQUI ALERTAS DE ELIMINAR (CREADAS EN LAS VISTAS) -->
<script>
function alerta_eliminar(id){
		Swal.fire({
			title: '¿Esta seguro que desea eliminar?',
			text: "Esta accion no se podra deshacer!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, eliminar'
		}).then((result) => {
			if (result.value) {
				window.location.href = "../persona_controller/eliminar/"+id;
			}
		})
	}

</script>	