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
                <li class="breadcrumb-item active">Partido Politico</li>
              </ol>
            </div>
            <div class="col-2" style="line-height:2.7em">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
					Nuevo Partido
				</button>
            </div>
          </div>
          <br>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
            Partido Politico</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				  <thead>
					<tr>
						<th>Partido Político</th>
						<th><center>Bandera</center></th>
						<th>Nombre Candidato</th>
						<th>Votación</th>

						<th>Eliminar</th>
					</tr>
				  </thead>
                  <tbody>
	<?php foreach ($partido_politico as $p) { ?>
		<tr>
			<td><?=$p->nombre_partido ?></td>
			<td><center><img  style="width: 20%; border-radius: 5px" src="<?= base_url($p->img) ?>"></center></td>
			<td><?=$p->nombre1." ".$p->nombre2." ".$p->apellido1." ".$p->apellido2 ?></td>
			<td><?=$p->descripcion ?></td>
      <!-- <?php echo base_url().'partido_controller/eliminar/'.$p->id_partido; ?> -->
			<td class="text-center"><a onclick="alerta_eliminar('<?= $p->id_partido ?>')"><button type="button" class="btn btn-danger">Eliminar</button></td>
					<!--<td class="text-center"><a href="<?php echo base_url().'partido_controller/get_datos/'.$p->id_partido; ?>">Actualizar</td>-->
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
							<form onsubmit="return validar();" enctype="multipart/form-data" action="<?php echo base_url('partido_controller/ingresar') ?>" method="POST"  autocomplete="off">
		<div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text">Partido Político</div>
          </div>
          <input type="text" id="partido" name="nombre_partido" class="form-control">
        </div>
		<div class="input-group mb-2 align-items-center">
          <div class="input-group-prepend">
            <div class="input-group-text">Imagen</div>
          </div>
          <input id="imagen" name="img" type="file" class="form-control">
        </div>
		<div class="input-group mb-2 align-items-center">
          <div class="input-group-prepend">
            <div class="input-group-text">Votación</div>
          </div>
				<select name="votacion" id="votacion" class="form-control">
					<option value="">Selecione una Votacion</option>
						<?php  foreach ($votacion as $v ) { ?>
					<option value="<?=$v->id_votacion?>"><?=$v->descripcion?></option>
						<?php } ?>
				</select>
         </div>
		<div class="input-group mb-2 align-items-center">
          <div class="input-group-prepend">
            <div class="input-group-text">Nombre</div>
          </div>
				<select name="persona" id="persona" class="form-control">
					<option value="">Selecione un Nombre</option>
						<?php  foreach ($candidato as $c ) { ?>
							<option value="<?=$c->id_candidato ?>"><?=$c->nombre1." ".$c->apellido1?></option>
						<?php } ?>
				</select>
         </div>
         <br>
         <input type="submit" name="guardar" class="btn btn-primary">
         <button type="button"  class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					</form>
			</div>

          </div>
        </div>
      </div>
    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- /#wrapper -->
  <?php $this->load->view('utils/alertspartido') ?> 