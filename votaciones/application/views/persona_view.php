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
                <li class="breadcrumb-item active">Persona</li>
              </ol>
            </div>
            <div class="col-2" style="line-height:2.7em">
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseMain" aria-expanded="false" aria-controls="collapseExample">
    Nueva Persona
  </button>
            </div>
          </div>
          <br>
<div class="collapse" id="collapseMain">
  <div class="card card-body">
  				<form enctype="multipart/form-data" onsubmit="return validarFormulario()" action="<?= base_url('persona_controller/ingresar') ?>" method="POST" >
				<table style="margin: 0 auto;">
					<tr>
						<div class="form-label-group">
							<td><label>Número de DUI:</label></td>
							<td><input type="text" id="DUI" name="DUI_persona" class="form-control"></td>
              <script type="text/javascript">
                $(function () {
                  var selector = document.getElementById("DUI");

                  var im = new Inputmask("99999999-9", { "clearIncomplete": true });
                  im.mask(selector);
                });
              </script>
              			<td><label>Estado de votación:</label></td>
						<td><select id="estado" name="estado" class="form-control">
							<option value="">--Seleccione un estado--</option>
							<?php foreach($estado as $e){ ?>
								<option value="<?= $e->id_estadoh ?>"><?= $e->nombre_estadoh ?></option>
							<?php } ?>
						</select></td>					
						</div>
					</tr>
					<tr>
						<td><label>Nombres:</label></td>
						<td>
							<input id="n1" type="text" name="nombre1" class="form-control" min >
							<input id="n2" type="text" name="nombre2" class="form-control">

							<div class="container">
								<div class="row">
									<p>
										<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
											+
										</button>
									</p>
									<div class="collapse" id="collapseExample">
										<div class="card card-body">
											<!-- Tercer y cuarto input para nombres  -->
											<input type="text" name="nombre3" class="form-control">
											<input type="text" name="nombre4" class="form-control">
										</div>
									</div>
								</div>
							</div>
						</td>
						<td><label>Estado de la persona:</label></td>
						<td><select id="estadop" name="estadop" class="form-control">
							<option value="">--Seleccione un estado--</option>
							<?php foreach($estadop as $ep){ ?>
								<option value="<?= $ep->id_estadov ?>"><?= $ep->nombre_estadov ?></option>
							<?php } ?>
						</select></td>
					</tr>
					<tr>
						<td><label>Apellidos:</label></td>
						<td>
							<input id="a1" type="text" name="apellido1" class="form-control">
							<input id="a2" type="text" name="apellido2" class="form-control">

							<div class="container">
								<div class="row">
									<p>
										<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
											+
										</button>
									</p>
									<div class="collapse" id="collapseExample2">
										<div class="card card-body">
											<!-- Tercer input para apellido -->
											<input type="text" name="apellido3" class="form-control">

										</div>
									</div>
								</div>
							</div>
						</td>
						<td><label>Sexo:</label></td>
						<td><select id="sex" name="sexo" class="form-control">
							<option value="">--Seleccione un sexo--</option>
							<?php foreach($sexo as $s){ ?>
								<option value="<?= $s->id_sexo ?>"><?= $s->nombre_sexo ?></option>
							<?php } ?>
						</select></td>
					</tr>
					<tr>
						<td><label>Telefono:</label></td>
						<td><input id="tel" type="text" name="telefono" class="form-control"></td>
              <script type="text/javascript">
                $(function () {
                  var selector = document.getElementById("tel");

                  var im = new Inputmask("9999-9999", { "clearIncomplete": true });
                  im.mask(selector);
                });
              </script>
						<td><label>Departamento:</label></td>
						<td><select id="depa"  onchange="load(this.value)" name="departamento" class="form-control">
							<option value="">--Seleccione un departamento--</option>
							<?php foreach($departamento as $d){ ?>
								<option value="<?= $d->id_departamento ?>"><?= $d->nombre ?></option>
							<?php } ?>
						</select></td>              							
					</tr>
					<tr>
						<td><label>Direccion:</label></td>
						<td><input id="dir" type="text" name="direccion" class="form-control"></td>
						<td><label>Municipio:</label></td>
						<td><div id="municipio"><select id="mun" class="form-control" name="municipio">
							<option value="">--Primero seleccione un departamento--</option>
						</select></div></td>
					</tr>
					<tr>
						<td><label>Fecha de nacimiento:</label></td>
						<td><input id="fn" type="date" name="fnacimiento" class="form-control"></td>
						<td><label>Foto:</label></td>
						<td><div class="custom-file">
							<input type="file"
							id="img" name="img"
							accept="image/png, image/jpeg"></label>
						</div></td>
					</tr>
					<tr>
						<td colspan="4"><input onclick="comprobarMayoria(dateSelected)" id="guardar" type="submit" value="Guardar" class="form-control"></td>
					</tr>
				</table>
			</form>
  </div>
</div>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
            Persona</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>N° de DUI</th>
						<th>Nombres</th>
						<th>Apellidos</th>
						<th>Teléfono</th>
						<th>Dirección</th>
						<th>Fecha de nacimiento</th>
						<th>Expedición</th>
						<th>Expiración</th>
						<th>Estado</th>
						<th>Sexo</th>
						<th>Departamento y municipio</th>
						<th>Foto</th>
						<th>Eliminar</th>
						<th>Actualizar</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($persona as $p) { ?>

						<tr>
							<td><?= $p->DUI_persona  ?></td>
							<td><?php echo $p->nombre1." ".$p->nombre2;
							if(isset($p->nombre3, $p->nombre4)){ echo " ".$p->nombre3." ".$p->nombre4; } ?></td>

							<td><?php echo $p->apellido1." ".$p->apellido2;
							if(isset($p->apellido3)){ echo " ".$p->apellido3; }  ?></td>

							<td><?= $p->telefono  ?></td>
							<td><?= $p->direccion  ?></td>
							<td><?= $p->fnacimiento  ?></td>
							<td><?= $p->fexpedicion  ?></td>
							<td><?= $p->fexpiracion  ?></td>
							<td><?= $p->nombre_estadoh  ?></td>
							<td><?= $p->nombre_sexo  ?></td>
							<td><?= $p->nombre.", ".$p->nombre_municipio  ?></td>
							<?php $id = base64_encode($p->DUI_persona) ?>
							<td><img  style="width: 150%; border-radius: 15px" src="<?= base_url($p->foto) ?>"></td>
							<td><button class="btn btn-block btn-danger" onclick="alerta_eliminar('<?= $p->DUI_persona ?>')" id="id"><i class="fas fa-trash-alt"></i></button></td>
							<td><a href="<?= base_url().'persona_controller/get_datos/'.$id;  ?>"><button class="btn btn-block btn-info" id="id2" ><i class="fas fa-sync"></i></button></a></td>
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

    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- /#wrapper -->
  <?php $this->load->view('utils/alertspersona'); ?>