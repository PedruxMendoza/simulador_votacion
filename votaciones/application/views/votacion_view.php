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
                <li class="breadcrumb-item active">Votacion</li>
              </ol>
            </div>
            <div class="col-2" style="line-height:2.7em">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Nueva Votacion
              </button>
            </div>
          </div>
          <br>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
            Votacion</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Descripcion</th>
                      <th>Fecha de Inicio</th>
                      <th>Fecha de Finalizacion</th>
                      <th>Cantidad de Votos</th>
                      <th>Estado</th>
                      <th>Eliminar</th>
                      <th>Modificar</th>
<!--                       <th>Opciones</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($votacion as $v) { ?>
                      <tr>
                        <td><?= $v->descripcion ?></td>
                        <td><?= $v->fecha_inicio ?></td>
                        <td><?= $v->fecha_final ?></td>
                        <td><?= $v->cantidadvotos ?></td>
                        <td><?= $v->nombre_estado ?></td>
                        <?php $id = base64_encode($v->id_votacion) ?>
                        <td><a onclick="alerta_eliminar(<?= $v->id_votacion ?>)" style="color: white;" class="btn btn-block btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                        <td><a href="<?php echo base_url('votacion_controller/get_datos/'.$id) ?>" class="btn btn-block btn-info"><i class="fas fa-sync"></i></a></td>
<!--                         <?php if ($v->id_estado == 1) { ?>
                          <td><a href="<?php echo base_url('votacion_controller/cancelar/'.$v->id_votacion) ?>" class="btn btn-block btn-primary">Cancelar</a></td>
                        <?php } else { ?>
                         <td><a href="<?php echo base_url('votacion_controller/activar/'.$v->id_votacion) ?>" class="btn btn-block btn-primary">Activar</a></td>                         
                       <?php } ?> -->
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
              <form  method="POST" action="<?php echo base_url('votacion_controller/ingresar') ?>" onsubmit="return validar()">
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">Descripcion</div>
                  </div>
                  <textarea placeholder="Escriba una descripcion de la votacion" rows="2" cols="75" maxlength="255" name="descripcion" id="descripcion" class="form-control"></textarea>
                </div>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">Cantidad de Votos</div>
                  </div>
                  <input type="number" name="cantvoto" id="cantvoto" class="form-control">
                </div>
                <div class="d-lg-none">
                  <div class="input-group-prepend">
                    <div class="input-group-text">Estado</div>
                  </div>
                  <select name="estado" id="estado" class="form-control">
                    <option value="">seleccione estado</option>
                    <?php foreach($estado as $e) { ?>
                      <option value="<?= $e->id_estado ?>"<?php if ($e->id_estado == 1) { echo "selected";} ?>><?= $e->nombre_estado ?></option>
                    <?php } ?>
                  </select>
                </div> 
                <?php $date = new DateTime(); // Date object using current date and time
                $dt= $date->format('Y-m-d\TH:i'); ?>
                <div class="form-row">
                  <div class="input-group col-md-6">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Inicio</div>
                    </div>
                    <input type="datetime-local" name="finicial" id="date_start" value="<?php echo $dt ?>" class="form-control">
                  </div>
                  <div class="input-group col-md-6">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Finalizacion</div>
                    </div>
                    <input type="datetime-local" name="ffinal" id="date_end" value="<?php echo $dt ?>" class="form-control">
                  </div>
                </div>
                <script type="text/javascript">

                  var start=document.querySelector('input[type="datetime-local"]#date_start'), end = document.querySelector('input[type="datetime-local"]#date_end');

                  start.value = start.value;
                  end.stepUp(540);

                  $("#date_start").on("click keyup", function(){
                    end.value =  start.value;
                    end.stepUp(540);
                  });

                </script>
                <br>
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
  <?php $this->load->view('utils/alertas_votacion') ?>  