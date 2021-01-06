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
					window.location.href = "../usuarioController/index" ; 
				}
			});
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
					window.location.href = "../usuarioController/index";
				}
			});
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
					window.location.href = "../usuarioController/index";
				}
			});
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
				window.location.href = "../usuarioController/eliminar/"+id;
			}
		});
	}

</script>	
