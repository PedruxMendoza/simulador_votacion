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
                <li class="breadcrumb-item active">Urnas</li>
              </ol>
            </div>
            <div class="col-2" style="line-height:2.7em">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Nueva Urna
              </button>
            </div>
          </div>
          <br>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
            Urnas</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Junta Receptiva de Votos</th>
                      <th>NOMBRE</th>
                      <th>SEDE</th>
                      <th>Eliminar</th>
                      <th>Actualizar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($urnas as $valor) { ?>
                      <tr>
                        <td><?= $valor->id_urnas?></td>
                        <td><?= $valor->nombre_urnas?></td>
                        <td><?= $valor->nombre_sede?></td>
                        <?php $id = base64_encode($valor->id_urnas) ?>
                        <td><a style="color: white;" class="btn btn-block btn-danger" onclick="alerta_eliminar('<?= $valor->id_urnas ?>')"><i class="fas fa-trash-alt"></a></td>
                          <td><a  class="btn btn-block btn-success" href="<?php echo base_url('urnas_controller/get_datos/'.$id) ?>"><i class="fas fa-sync"></a></td>
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
                  <form action="<?php echo base_url().'urnas_controller/insertar' ?>" method="POST" onsubmit="return validar()">
                    <div class="input-group mb-2">
                     <div class="input-group-prepend">
                      <div class="input-group-text">jrv</div>
                    </div>
                    <input type="number" name="id_urnas" id="jrv" autocomplete="off"  class="form-control">
                  </div>
                  <div class="input-group mb-2">
                   <div class="input-group-prepend">
                    <div class="input-group-text">nombre</div>
                  </div>
                  <input type="text" name="nombre_urnas" id="nombre" autocomplete="off" class="form-control">
                </div>
                <div class="input-group mb-2">
                 <div class="input-group-prepend">
                  <div class="input-group-text">Sede</div>
                </div>
                <select name="sede" id="sede" autocomplete="off" class="form-control">
                  <option value="">--Seleccione un sede--</option>
                  <?php foreach($sede as $s) { ?>
                    <option value="<?= $s->id_sede ?>"><?= $s->nombre_sede ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="modal-footer">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
               <div class=col-md-6><button type="submit" value="insertar" class="btn btn-block btn-info" onclick="">Ingresar</button></div>
             </div>
           </form>
         </div>

          </div>
        </div>
      </div>
    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- /#wrapper -->
  <?php $this->load->view('utils/alertasurnas') ?>