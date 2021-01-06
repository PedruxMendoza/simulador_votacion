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
                Nueva Sede
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
                      <th>Nombre</th>
                      <th>Direccion</th>
                      <th>Municipio</th>
                      <th>Eliminar</th>
                      <th>Actualizar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($sede as $valor) { ?>
                      <tr>
                        <td><?= $valor->nombre_sede?></td>
                        <td><?= $valor->direccion?></td>
                        <td><?= $valor->nombre_municipio?></td>
                        <?php $id = base64_encode($valor->id_sede) ?>
                        <td><a style="color: white;" class="btn btn-block btn-danger" onclick="alerta_eliminar('<?= $valor->id_sede ?>')"><i class="fas fa-trash-alt"></i></a></td>
                          <td><a  class="btn btn-block btn-success" href="<?php echo base_url('sede_controller/get_datos/'.$id) ?>"><i class="fas fa-sync"></i></a></td>
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
                 <form action="<?php echo base_url().'sede_controller/insertar' ?>" method="POST" onsubmit="return validar()">
                  <div class="input-group mb-2">
                   <div class="input-group-prepend">
                    <div class="input-group-text">Nombre Sede</div>
                  </div>
                  <input type="text" name="nombre_sede" id="nombre" autocomplete="off" class="form-control" >
                </div>
                <div class="input-group mb-2">
                 <div class="input-group-prepend">
                  <div class="input-group-text">Direccion</div>
                </div>
                <input type="text" name="direccion" id='direccion' autocomplete="off" class="form-control">
              </div>
              <div class="input-group mb-2">
               <div class="input-group-prepend">
                <div class="input-group-text">Municipio</div>
              </div>
              <select name="nombre_municipio" id="municipio" autocomplete="off" class="form-control">
                <option value="">--Seleccione un municipio--</option>
                <?php foreach($municipio as $m) { ?>
                 <option value="<?= $m->id_municipio ?>"><?= $m->nombre_municipio ?></option>
               <?php } ?>
             </select>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
             <div class=col-md-6><button type="submit" value="ingresar" class="btn btn-block btn-info" onclick="">Ingresar</button></div>
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
<?php $this->load->view('utils/alertassede') ?>