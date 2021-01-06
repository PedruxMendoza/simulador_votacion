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
                <li class="breadcrumb-item active">Detalle Votacion</li>
              </ol>
            </div>
            <div class="col-2" style="line-height:2.7em">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Nueva Detalle
              </button>
            </div>
          </div>
          <br>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
            Detalle Votacion</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                  <tr>
                   <th>FechaHora</th>
                   <th>Descripcion</th>
                   <th>Persona</th>
                   <th>Candidatos</th>
                   <th>Nombre del partido</th>
                   <th>Estado</th>
<!--                    <th>Eliminar</th>
                   <th>Modificar</th> -->
                 </tr>
               </thead>
               <tbody>
                <?php foreach ($DV as $dv) { ?>
                 <tr>
                  <td><?= $dv->FechaHora ?></td>
                  <td><?= $dv->descripcion ?></td>
                  <td><?= $dv->persona ?></td>
                  <td><?= $dv->candidatos ?></td>
                  <td><?= $dv->nombre_partido ?></td>
                  <td><?= $dv->estado ?></td>
<!--                   <?php $id = base64_encode($dv->id_DV) ?>
                  <td><a onclick="alerta_eliminar(<?= $dv->id_DV ?>)" style="color: white;" class="btn btn-block btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                  <td><a href="<?php echo base_url('DV_controller/get_datos/'.$id) ?>" class="btn btn-block btn-info"><i class="fas fa-sync"></i></a></td> -->
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
          <?php date_default_timezone_set('America/El_Salvador'); ?>
          <form method="POST" action="<?php echo base_url('DV_controller/ingresar') ?>" onsubmit="return validar()">
					<?php $date = new DateTime(); // Date object using current date and time
         $dt= $date->format('Y-m-d\TH:i'); ?>
         <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text">FechaHora</div>
          </div>
          <input type="datetime-local" name="fechahora" id="fechahora" value="<?php echo $dt ?>" readonly class="form-control">
        </div>
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text">Votacion</div>
          </div>
          <select name="votacion" id="votacion" class="form-control">
            <option value="">--Seleccione la votacion--</option>
            <?php foreach ($votacion as $v) { ?>
             <option value="<?php echo $v->id_votacion ?>"><?php echo $v->descripcion ?></option>
           <?php } ?>
         </select>
       </div>
       <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">Personas</div>
        </div>
        <select name="persona" id="persona" class="form-control">
          <option value="">--Seleccione la persona que voto--</option>
          <?php foreach ($persona as $p) { ?>
           <option value="<?php echo $p->DUI_persona ?>"><?php echo $p->nombre1.' '.$p->nombre2.' '.$p->apellido1.' '.$p->apellido2.' ---> '.$p->DUI_persona ?></option>
         <?php } ?>
       </select>
     </div>
     <div class="input-group mb-2">
      <div class="input-group-prepend">
        <div class="input-group-text">Candidato</div>
      </div>
      <select name="candidato" id="candidato" class="form-control">
        <option value="">--Seleccione el candidato que voto--</option>
        <?php foreach ($candidato as $c) { ?>
         <option value="<?php echo $c->id_candidato ?>"><?php echo $c->nombre1.' '.$c->nombre2.' '.$c->apellido1.' '.$c->apellido2.' ---> '.$c->nombre_partido ?></option>
       <?php } ?>
     </select>
   </div>
   <div class="input-group mb-2">
    <div class="input-group-prepend">
      <div class="input-group-text">Estado</div>
    </div>
    <select name="estado" id="estado" class="form-control">
      <option value="">--Seleccione el estado--</option>
      <?php foreach ($estado as $e) { ?>
       <option value="<?php echo $e->id_voto ?>"><?php echo $e->descripcion ?></option>
     <?php } ?>
   </select>
 </div>
 <input type="submit" name="guardar" class="btn btn-primary">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</form>
</div>

</div>
</div>
</div>
</div>
<!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->
<?php $this->load->view('utils/alertas_DV') ?>