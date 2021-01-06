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
                <li class="breadcrumb-item active">Candidato Politicos</li>
              </ol>
          <br>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
            Candidato Politicos</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th scope="col">Nombre Candidato</th>
					<th scope="col">Partido Politico</th>
					<!--<th colspan="2">operciones</th>-->
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($candidato as $c){ ?>
					<tr> 
						<td><?=$c->nombre1." ".$c->nombre2." ".$c->apellido1." ".$c->apellido2 ?></td>
						<td><?= $c->nombre_partido ?></td>
							<!-- <td><button type="button" class="btn btn-danger" onclick="alerta_eliminar(<?= $c->id_candidato; ?>)"><a style="color: white;">Eliminar</a></button></td>
							<td class="text-center"><a href="<?php echo base_url().'candidatos_controller/get_datos/'.$c->id_candidato; ?>"><button class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a></td>
						</tr>-->
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
</div>
<!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->
<?php $this->load->view('utils/alertscandidato') ?>