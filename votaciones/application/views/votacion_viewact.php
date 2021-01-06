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
  					<a href="<?php echo base_url('votacion_controller/index') ?>">Votacion</a>
  				</li>                
  				<li class="breadcrumb-item active">Actualizar</li>
  			</ol>

  			<!-- Page Content -->
        <?php foreach ($votacion as $v) { ?>
          <?php date_default_timezone_set('America/El_Salvador'); ?>
          <form  method="POST" action="<?php echo base_url('votacion_controller/actualizar') ?>" onsubmit="return validar()">
            <input type="hidden" name="id" value="<?php echo $v->id_votacion ?>">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">Descripcion</div>
              </div>
              <textarea placeholder="Escriba una descripcion de la votacion" rows="2" cols="75" maxlength="255" name="descripcion" id="descripcion" class="form-control"><?php echo $v->descripcion ?></textarea>
            </div>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">Cantidad de Votos</div>
              </div>
              <input type="number" name="cantvoto" id="cantvoto" class="form-control" value="<?php echo $v->cantidadvotos ?>">
            </div>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">Estado</div>
              </div>
              <select name="estado" id="estado" class="form-control">
                <option value="">seleccione estado</option>
                <?php foreach($estado as $e) { ?>
                  <option value="<?= $e->id_estado ?>"<?php if ($e->id_estado == $v->id_estado) { echo "selected";} ?>><?= $e->nombre_estado ?></option>
                <?php } ?>
              </select>
            </div> 
            <?php $date = new DateTime($v->fecha_inicio); 
            $dt= $date->format('Y-m-d\TH:i'); ?>
            <div class="form-row">
              <div class="input-group col-md-6">
                <div class="input-group-prepend">
                  <div class="input-group-text">Inicio</div>
                </div>
                <input type="datetime-local" name="finicial" id="date_start" value="<?php echo $dt ?>" class="form-control">
              </div>
              <?php $date = new DateTime($v->fecha_final); 
              $dt= $date->format('Y-m-d\TH:i'); ?>
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
            <input type="submit" name="actualizar" class="btn btn-primary">
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