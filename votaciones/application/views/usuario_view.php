    <div id="wrapper">

    	<!-- Sidebar -->
    	<?php $this->load->view('templates/navbar') ?>

    	<div id="content-wrapper">

    		<div class="container-fluid">
    			<div class="row">
    				<div class="col-10">
    					<!-- Breadcrumbs-->
    					<ol class="breadcrumb">
    						<li class="breadcrumb-item">
    							<a href="<?php echo base_url('welcome/index') ?>">Inicio</a>
    						</li>
    						<li class="breadcrumb-item active">Usuario</li>
    					</ol>
    				</div>
    				<div class="col-2" style="line-height:2.7em">
    					<!-- Button trigger modal -->
    					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
    						Registrar Usuario
    					</button>
    				</div>
    			</div>
    			<br>
    			<!-- DataTables Example -->
    			<div class="card mb-3">
    				<div class="card-header">
    					<i class="fas fa-table"></i>
    				Usuario</div>
    				<div class="card-body">
    					<div class="table-responsive">
    						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    							<thead>
    								<tr>
    									<th>Nombre</th>
    									<th>Direccion</th>
    									<th>Municipio</th>
    									<th>Eliminar</th>
    									<th>Actualizar</th>
    								</tr>
    							</thead>
    							<tbody>
    								<?php  foreach ($votacion as $k) { ?>


    									<tr>
    										<td><?php echo $k->correo  ?></td>
    										<td><?php echo $k->DUI_persona  ?></td>
    										<td><?php echo $k->nombre_rol ?></td>
                                            <?php $id = base64_encode($k->id_usuario) ?>
    										<td><a href="<?php echo base_url('usuarioController/get_datos/'.$id)  ?>" class="btn btn-block btn-primary">Actualizar</a></td>
    										<td><a style="color: white;" type="button" id="eliminar" onclick="alerta_eliminar(<?= $k->id_usuario; ?>)"  class="btn btn-block btn-danger">Eliminar</a></td>
    									</tr>
    								<?php }  ?>
    							</tbody>
    						</table>
    					</div>
    				</div>
    				<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    			</div>

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

    		<!-- Modal -->
    		<form method="post"  action="<?php echo base_url('usuarioController/ingresar')  ?>" onsubmit="return validacion()">

    			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    				<div class="modal-dialog modal-lg" role="document">
    					<div class="modal-content">
    						<div class="modal-header">
    							<h5 class="modal-title" id="exampleModalLabel">Registrar</h5>
    							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    								<span aria-hidden="true">&times;</span>
    							</button>
    						</div>
    						<div class="modal-body">
    							<div class="input-group mb-2">
    								<div class="input-group-prepend">
    									<div class="input-group-text">Correo</div>
    								</div>
    								<input type="email" name="email" id="email" placeholder="ejemplo@ejemplo.com" maxlength="30" Class="form-control" >
    							</div>
    							<div class="input-group mb-2">
    								<div class="input-group-prepend">
    									<div class="input-group-text">Clave</div>
    								</div>
    								<input ID="clave" type="Password" name="clave" Class="form-control" maxlength="20" placeholder="*******" onkeydown="soloLetrasYNum('clave')" title=" 1 Mayuscula,1 Numero y el resto en minuscula" >
    								<div class="input-group-append"><button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button></div>
    							</div>
    							<div class="input-group mb-2">
    								<div class="input-group-prepend">
    									<div class="input-group-text">DUI</div>
    								</div>
    								<select name="s1" id="s1" Class="form-control">
    									<option value="">--Seleccione un DUI--</option>
    									<?php foreach ($dui as $d) { ?>

    										<option value="<?php echo $d->DUI_persona;  ?>"><?php echo $d->DUI_persona;  ?></option>
    									<?php }  ?>
    								</select>
    							</div>
    							<div class="input-group mb-2">
    								<div class="input-group-prepend">
    									<div class="input-group-text">Rol</div>
    								</div>
    								<select name="s2" id="s2" Class="form-control" >
    									<option value="">--Seleccione un Rol--</option>
    									<?php foreach ($rol as $r) { ?>
    										<option value="<?php  echo $r->id_rol ?>"><?php echo $r->nombre_rol ?></option>
    									<?php }  ?>
    								</select>
    							</div>
    						</div>
    						<div class="modal-footer">
    							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    							<input type="submit" class="btn btn-primary" id="btn" value="Guardar">
    						</div>

    					</div>
    				</div>
    			</div>
    		</form>
    	</div>
    	<!-- /.content-wrapper -->
    </div>
    <!-- /#wrapper -->
    <?php $this->load->view('utils/alerts_usuario') ?>	