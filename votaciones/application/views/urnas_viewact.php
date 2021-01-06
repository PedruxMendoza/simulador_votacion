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
  					<a href="<?php echo base_url('urnas_controller/index') ?>">Urna</a>
  				</li>                
  				<li class="breadcrumb-item active">Actualizar</li>
  			</ol>

  			<!-- Page Content -->
  			<?php foreach ($urnas as $u) { ?>
         <form action="<?php echo base_url().'urnas_controller/actualizar' ?>" method="POST" onsubmit="return validar()">
           <div class="input-group mb-2">
            <div class="input-group-prepend">
             <div class="input-group-text">jrv</div>
           </div>
           <input type="text" name="id_urnas" id="jrv" autocomplete="off"  class="form-control" value="<?= $u->id_urnas?>">
         </div>
         <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text">nombre</div>
          </div>
          <input type="text" name="nombre_urnas" id="nombre" value="<?= $u->nombre_urnas?>" autocomplete="off"  class="form-control">
        </div>
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text">sede</div>
          </div>
          <select name="sede" id="sede"autocomplete="off"  class="form-control"  >
            <option value="">--Seleccione un sede--</option>
            <?php foreach($sede as $s){ ?>
              <option value="<?= $s->id_sede ?>"<?php if ($s->id_sede == $u->id_sede) {
                echo "selected";} ?>><?= $s->nombre_sede ?></option>
              <?php } ?>
            </select>
          </div><br>
          <br>
          <div>
            <input type="submit" name="actualizar" value="actualizar" class="btn btn-info">
          </div>
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