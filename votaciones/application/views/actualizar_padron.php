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
  					<a href="<?php echo base_url('padronController/index') ?>">Padron</a>
  				</li>                
  				<li class="breadcrumb-item active">Actualizar</li>
  			</ol>

  			<!-- Page Content -->
	<?php  foreach ($padron as $k) {?>
		<form method="post" onsubmit="return validacionact()"  action="<?php echo base_url().'padronController/actualizar'  ?>"  >

			<input type="hidden" name="ide" value="<?php  echo $k->id_padron ?>">

<!-- 			<div class="row">
				<div class="col-md-12" align="center">
					<h2>Actualizar</h2>
				</div>

			</div>
			<br><br> -->
			
						<div class="input-group mb-2">
                  			<div class="input-group-prepend">
                    			<div class="input-group-text">Urna</div>
                  			</div>
								<select name="urna" id="urna" Class="form-control">
									<option value="">--Seleccione una Una--</option>
									<?php foreach ($urna as $ur) { ?>
										<option value="<?php echo $ur->id_urnas  ?>" <?php if ($ur->id_urnas == $k->id_urnas) {
								echo 'selected';
							}  ?>><?= $ur->id_urnas ." ". $ur->nombre_urnas ?></option>	
									<?php }  ?>
								</select>
                		</div>
                		<div class="input-group mb-2">
                		  <div class="input-group-prepend">
                		    <div class="input-group-text">DUI</div>
                  		  </div>
								<select name="DUI" id="DUI" class="form-control">
									<option value="">--Seleccione un DUI--</option>
									<?php foreach ($persona as $p) { ?>
									<option value="<?php echo $p->DUI_persona  ?>"<?php if ($p->DUI_persona == $k->DUI_persona) {
								echo 'selected';
							}  ?>><?php echo $p->nombre1 ." ". $p->nombre2 ." ". $p->nombre3 ." ". $p->nombre4 ." ". $p->apellido1 ." ". $p->apellido2 ." ". $p->apellido3 ." ". $p->DUI_persona   ?></option>	
								<?php } ?>
								</select>
                		</div>
										<?php foreach ($usuario as $u) { ?>

											<input type="hidden" name="usuario1" value="<?php echo $u->id_usuario  ?>">
										<?php }  ?> 

			<input type="hidden" name="fecha1" class="form-control" min="now" readonly="readonly">
			<br>
			<table width="100%">
				<tr>
					<td align="center"><input type="submit" name="btn1" class="btn btn-block btn-primary col-md-7" value="Guardar"></td>
					<td align="center"><a href="<?php echo base_url('padronController/index') ?>" class="btn btn-block btn-danger col-md-7">Cancelar</a></td>
				</tr>
			</table>
						
						
			</form>
		<?php }  ?>

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