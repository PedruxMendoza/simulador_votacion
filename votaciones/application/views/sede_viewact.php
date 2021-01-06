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
  					<a href="<?php echo base_url('sede_controller/index') ?>">Sede</a>
  				</li>                
  				<li class="breadcrumb-item active">Actualizar</li>
  			</ol>

  			<!-- Page Content -->
  			<?php foreach ($sede as $s) { ?>
  				<form action="<?php echo base_url().'sede_controller/actualizar' ?>" method="POST" onsubmit="return validar()" >
  					<input type="hidden" name="id" value="<?= $s->id_sede?>" >
  					<div class="input-group mb-2">
  						<div class="input-group-prepend">
  							<div class="input-group-text">Nombre Sede</div>
  						</div>
  						<input type="text" name="nombre_sede" id="nombre" autocomplete="off" class="form-control" value="<?= $s->nombre_sede?>">
  					</div>
  					<div class="input-group mb-2">
  						<div class="input-group-prepend">
  							<div class="input-group-text">Direccion</div>
  						</div>
  						<input type="text" name="direccion" id='direccion' autocomplete="off" class="form-control" value="<?= $s->direccion?>">
  					</div>
  					<div class="input-group mb-2">
  						<div class="input-group-prepend">
  							<div class="input-group-text">Municipio</div>
  						</div>
  						<select name="nombre_municipio" id="municipio" autocomplete="off" class="form-control">
  							<option value="">--Seleccione un municipio--</option>
  							<?php foreach($municipio as $m) { ?>
  								<option value="<?= $m->id_municipio ?>"<?php if($m->id_municipio == $s->id_municipio){ echo 'selected'; } ?>><?= $m->nombre_municipio ?></option>
  							<?php } ?>
  						</select>
  					</div><br>
  					<br>
  					<div>
  						<input type="submit" name="actualizar" value="actualizar" class="btn btn-warning
  						">
  					</div>
  				</form>
  			<?php } ?>

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