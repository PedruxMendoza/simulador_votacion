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
                <li class="breadcrumb-item active">Padron</li>
              </ol>
            </div>
            <div class="col-2" style="line-height:2.7em">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
				Nuevo Padron
			   </button>
            </div>
          </div>
          <br>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
            Padron</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
					<tr>
						
						<th class="text-center">Urna</th>
						<th class="text-center">Persona</th>
						<!-- <th class="text-center">Actualizar</th> -->
						<?php if ($this->session->userdata('rol') == 1) { ?>
						<th class="text-center">Eliminar</th>
						<?php } else { ?> 
							<th class="text-center">Operacion</th>
						<?php } ?>
						
					</tr>
					</thead>
					<tbody>
					<?php foreach ($padron as $k) { ?>
						<?php $id = base64_encode($k->id_padron) ?>
						<tr>
							<td class="text-center"><?php echo $k->id_urnas ?></td>
							<td class="text-center"><?php echo $k->nombre1 ." ". $k->nombre2 ." ". $k->nombre3 ." ". $k->nombre4 ." ". $k->apellido1 ." ". $k->apellido2 ." ". $k->apellido3 ."<h7 style='color:#FF0033  '>  ==DUI=> </h7>". $k->DUI_persona  ;?></td>
<!-- 							<td><a href="<?php echo base_url('padronController/get_datos/'.$id) ?>" class="btn 									btn-block btn-primary">Actualizar</a></td> -->
					   <?php if ($this->session->userdata('rol') == 1) { ?>
					   	  <td><a style="color: white" onclick="alerta_eliminar(<?= $k->id_padron; ?>)" class="btn btn-block btn-danger">Eliminar</a></td>
                        <?php } else { ?>
							<?php if ($k->id_estadoh == 1) { ?>
                          <td><a href="<?php echo base_url('padronController/cancelar/'.$k->id_padron) ?>" class="btn btn-block btn-primary">Cancelar</a></td>
                        	<?php } else { ?>
                         <td><a href="<?php echo base_url('padronController/activar/'.$k->id_padron) ?>" class="btn btn-block btn-primary">Activar</a></td>                         
                       		<?php } ?>                        	                        
                       <?php } ?>
						</tr>

					<?php }  ?>
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
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Registrar</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="post" onsubmit="return validacion()" action="<?php echo base_url('padronController/ingresar') ?>" >
					<div class="modal-body">
						<div class="input-group mb-2">
                  			<div class="input-group-prepend">
                    			<div class="input-group-text">Urna</div>
                  			</div>
								<select name="urna" id="urna" Class="form-control">
									<option value="">--Seleccione una Una--</option>
									<?php foreach ($urna as $ur) { ?>
										<option value="<?php echo $ur->id_urnas  ?>"><?= $ur->id_urnas ." ". $ur->nombre_urnas ?></option>	
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
									<option value="<?php echo $p->DUI_persona  ?>"><?php echo $p->nombre1 ." ". $p->nombre2 ." ". $p->nombre3 ." ". $p->nombre4 ." ". $p->apellido1 ." ". $p->apellido2 ." ". $p->apellido3 ." ". $p->DUI_persona   ?></option>	
								<?php } ?>
								</select>
                		</div>                		

										<?php foreach ($usuario as $u) { ?>

											<input type="hidden" name="usuario" value="<?php echo $u->id_usuario  ?>">
										<?php }  ?>

										<input type="hidden" name="fecha" class="form-control" min="now" readonly="readonly">


						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							<input type="submit" class="btn btn-primary" id="btn" value="Guardar">
						</div>
					</div>
					</form>
				</div>
				<?php if (isset($mensaje)){ echo $mensaje; } ?>
			</div>
</div>
<!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->
<?php $this->load->view('utils/alertpadron') ?>