  <div id="wrapper">

  	<!-- Sidebar -->
  	<?php $this->load->view('templates/navbar') ?>

  	<div id="content-wrapper">

  		<div class="container-fluid">

  			<!-- Breadcrumbs-->
  			<ol class="breadcrumb">
  				<li class="breadcrumb-item">
  					<a href="<?php echo base_url('welcome/index') ?>">Inicio</a>
  				</li>
  				<li class="breadcrumb-item">
  					<a href="<?php echo base_url('persona_controller/index') ?>">Persona</a>
  				</li>                
  				<li class="breadcrumb-item active">Actualizar</li>
  			</ol>

  			<!-- Page Content -->
	<div class="row">
		<div class="container">
			<?php foreach ($persona as $p) { ?>
				<form enctype="multipart/form-data" method="POST" action="<?php echo base_url('persona_controller/actualizar'); ?>">
					<table>
						<tr>
							<div class="form-label-group">
								<td><label>Número de DUI:</label></td>
								<td><input type="text" id="DUI" name="DUI_persona" class="form-control" value="<?= $p->DUI_persona ?>" ></td>
								<script type="text/javascript">
									$(function () {
										var selector = document.getElementById("DUI");

										var im = new Inputmask("99999999-9");
										im.mask(selector);
									});
								</script>
							</div>
						</tr>
						<tr>
							<td><label>Nombres:</label></td>
							<td>
								<input value="<?= $p->nombre1 ?>" id="nombre" type="text" name="nombre1" class="form-control">
								<input value="<?= $p->nombre2 ?>" id="nombre" type="text" name="nombre2" class="form-control">
								<input value="<?= $p->nombre3 ?>" id="nombre" type="text" name="nombre3" class="form-control">
								<input value="<?= $p->nombre4 ?>" id="nombre" type="text" name="nombre4" class="form-control">
							</td>

						</tr>
						<tr>
							<td><label>Apellidos:</label></td>
							<td><input value="<?= $p->apellido1 ?>" id="apellido" type="text" name="apellido1" class="form-control"></td>
							<td><input value="<?= $p->apellido2 ?>" id="apellido" type="text" name="apellido2" class="form-control"></td>
							<td><input value="<?= $p->apellido3 ?>" id="apellido" type="text" name="apellido3" class="form-control"></td>
							<td></td>
						</tr>
						<tr>
							<td><label>Telefono:</label></td>
							<td><input value="<?= $p->telefono ?>" id="telefono" type="text" name="telefono" class="form-control"></td>
							<script type="text/javascript">
								$(function () {
									var selector = document.getElementById("telefono");

									var im = new Inputmask("9999-9999");
									im.mask(selector);
								});
							</script>
						</tr>
						<tr>
							<td><label>Direccion:</label></td>
							<td><input value="<?= $p->direccion ?>" id="" type="text" name="direccion" class="form-control"></td>
						</tr>
						<tr>
							<td><label>Fecha de nacimiento:</label></td>
							<td><input value="<?= $p->fnacimiento ?>" id="fnacimiento" type="date" name="fnacimiento" class="form-control"></td>
						</tr>
						<tr>
							<td><label>Estado:</label></td>
							<td><select id="sexo" name="estado" class="form-control">
								<option value="">--Seleccione un estado--</option>
								<?php foreach($estado as $e){ ?>
									<option value="<?= $e->id_estadoh ?>" <?php if($p->id_estadoh == $e->id_estadoh){ echo "selected";} ?>><?= $e->nombre_estadoh ?></option>
								<?php } ?>
							</select></td>
						</tr>
						<tr>
							<td><label>Estado de la persona:</label></td>
							<td><select id="estado" name="estadop" class="form-control">
								<option value="">--Seleccione un estado--</option>
								<?php foreach($estadop as $ep){ ?>
									<option value="<?= $ep->id_estadov ?>" <?php if($p->id_estadov == $ep->id_estadov){ echo "selected";} ?> ><?= $ep->nombre_estadov ?></option>
								<?php } ?>
							</select></td>
						</tr>
						<tr>
							<td><label>Sexo:</label></td>
							<td><select id="sexo" name="sexo" class="form-control">
								<option value="">--Seleccione un sexo--</option>
								<?php foreach($sexo as $s){ ?>
									<option value="<?= $s->id_sexo ?>" <?php if($p->id_sexo == $s->id_sexo){ echo "selected";} ?>><?= $s->nombre_sexo ?></option>
								<?php } ?>
							</select></td>
						</tr>
						<tr>
							<td><label>Municipio:</label></td>
							<td><select class="form-control" name="municipio">
								<option value="">--Seleccione un municipio--</option>
								<?php foreach ($municipio as $m) { ?>
									<option value="<?= $m->id_municipio ?>" <?php if($p->id_municipio == $m->id_municipio){ echo "selected";} ?> ><?= $m->nombre_municipio ?></option>
								<?php } ?>
							</select></td>
						</tr>
						<tr>
							<td><label>Foto:</label></td>
							<td><div class="custom-file">
								<input type="file" id="img" name="img" accept="image/png, image/jpeg"></label>
							</div></td>
						</tr>
						<tr>
							<td></td>
							<td><img  style="width: 50%; border-radius: 15px" src="<?= base_url($p->foto) ?>"></td>
						</tr>
						<tr>
							<td><input id="guardar" class="form-control" type="submit" value="Guardar" class="form-control"></td>
						</tr>
					</table>	
				</form>
			<?php } ?>
		</div>
	</div>
		<br><br>
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
       <div class="container my-auto">
        <div class="copyright text-center my-auto">
         <span>Copyright © Votaciones 2019</span>
       </div>
     </div>
   </footer>

 </div>
 <!-- /.content-wrapper -->

</div>
  		<!-- /#wrapper -->