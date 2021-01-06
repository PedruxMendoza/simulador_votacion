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
                <li class="breadcrumb-item active">Sede</li>
              </ol>
            </div>
            <div class="col-2" style="line-height:2.7em">
              <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
				Nueva Urna/Votación
			</button>
            </div>
          </div>
          <br>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
            Sede</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Votación</th>
						<th>Estado</th>
						<th>Fecha de inicio</th>
						<th>Fecha de finalización</th>
						<th>Urna</th>
						<th>Sede</th>
						<th>Departamento y muncicipio</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php foreach ($urnas_votacion as $u) { ?>
							<td><?=$u->descripcion ?></td>
							<td><?=$u->nombre_estado ?></td>
							<td><?=$u->fecha_inicio  ?></td>
							<td><?=$u->fecha_final  ?></td>
							<td><?=$u->id_urnas.", ".$u->nombre_urnas  ?></td>
							<td><?=$u->nombre_sede  ?></td>
							<td><?=$u->nombre.", ".$u->nombre_municipio  ?></td>
							<td><button onclick="alerta_eliminar(<?= $u->id_UV ?>)" class="btn btn-danger">Eliminar</button></td>
						</tr>
					<?php } ?>
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
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Nueva urna/votación</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
								<form method="POST" onsubmit="return validarFormulario()" action="<?= base_url('uv_controller/ingresar') ?>" >
									       <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">Votación</div>
        </div>
											<select id="sexo" name="votacion" class="form-control" required="">
												<option value="">--Seleccione una votación--</option>
												<?php foreach ($votacion as $v) { ?>
													<option value="<?= $v->id_votacion ?>"><?= $v->descripcion ?></option>
												<?php } ?>
											</select>
     </div>
       <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">Urna</div>
        </div>
											<select id="sexo" name="urnas" class="form-control" required="">
												<option value="">--Seleccione una urna--</option>
												<?php foreach ($urnas as $u) { ?>
													<option value="<?= $u->id_urnas ?>"><?= $u->nombre_urnas ?></option>
												<?php } ?>
											</select>
     </div>
     <br>
<input type="submit" value="Guardar" class="btn btn-primary">
<button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
								</form>
						</div>
					</div>
				</div>
			</div>
</div>
<!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->
<?php $this->load->view('utils/uv_alertas') ?>