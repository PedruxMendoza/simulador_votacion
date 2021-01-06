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
  					<a href="<?php echo base_url('usuarioController/index') ?>">Usuario</a>
  				</li>                
  				<li class="breadcrumb-item active">Actualizar</li>
  			</ol>

  			<!-- Page Content -->
  			<form method="post" onsubmit="return validacionact()" action="<?php echo base_url('usuarioController/actualizar')  ?>"  >
  				<?php  foreach ($votacion as $k) {?>
  					<input type="hidden" name="ide" value="<?php  echo $k->id_usuario ?>">
  					<div class="input-group mb-2">
  						<div class="input-group-prepend">
  							<div class="input-group-text">Correo</div>
  						</div>
  						<input type="email" name="correo" id="correo" placeholder="ejemplo@ejemplo.com" maxlength="30" value="<?php echo $k->correo  ?>" Class="form-control" value='<?php echo $k->correo ?>'>
  					</div>
  					<div class="d-lg-none">
  						<div class="input-group-prepend">
  							<div class="input-group-text">Clave</div>
  						</div>
  						<input  type="Password" name="pass" id="pass" readonly="readonly" Class="form-control" maxlength="16" value="<?php echo $k->clave  ?>" placeholder="***********">
  					</div>
  					<div class="d-lg-none">
  						<div class="input-group-prepend">
  							<div class="input-group-text">DUI</div>
  						</div>
  						<select name="s11" id="s11" Class="form-control" disabled="disabled">
  							<option value="">--Seleccione un DUI--</option>

  							<?php foreach ($dui as $d) { ?>

  								<option value="<?php echo $d->DUI_persona;  ?>" <?php if ($d->DUI_persona == $k->DUI_persona) {
  									echo 'selected';
  								}  ?>><?php echo $d->DUI_persona;  ?></option>
  							<?php }  ?>

  						</select>
  					</div>
  					<div class="input-group mb-2">
  						<div class="input-group-prepend">
  							<div class="input-group-text">Rol</div>
  						</div>
  						<select name="s22" id="s22" Class="form-control">
  							<option>--Seleccione un Rol--</option>

  							<?php foreach ($rol as $r) { ?>
  								<option value="<?php  echo $r->id_rol; ?>" <?php  if($r->id_rol == $k->id_rol){
  									echo 'selected';
  								} ?>><?php echo $r->nombre_rol ?></option>
  							<?php }  ?>

  						</select>
  					</div>
  					<div class="row">
  						<div class="col-md-3"></div>
  						<div class="col-md-9">
  							<br><br><br>
  							<input type="submit" name="btn1" class="btn btn-block btn-primary col-md-9" value="Guardar">
  							<a href="<?php echo base_url('usuarioController/index') ?>" class="btn btn-block btn-danger col-md-9">Cancelar</a>
  						</div>
  					</div>
  				<?php }  ?>

  			</form>

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