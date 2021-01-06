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
  					<a href="<?php echo base_url('DV_controller/index') ?>">Detalle Votacion</a>
  				</li>                
  				<li class="breadcrumb-item active">Actualizar</li>
  			</ol>

  			<!-- Page Content -->
	<?php foreach ($DV as $dv) { ?>
		<form method="POST" action="<?php echo base_url('DV_controller/actualizar') ?>">
			<input type="hidden" name="id" value="<?php echo $dv->id_DV ?>">
				<?php $date = new DateTime($dv->FechaHora); 
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
							<option value="<?php echo $v->id_votacion ?>"<?php if ($v->id_votacion == $dv->id_votacion) { echo "selected";} ?>><?php echo $v->descripcion ?></option>
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
							<option value="<?php echo $p->DUI_persona ?>"<?php if ($p->DUI_persona == $dv->DUI_persona) { echo "selected";} ?>><?php echo $p->nombre1.' '.$p->nombre2.' '.$p->apellido1.' '.$p->apellido2.' ---> '.$p->DUI_persona ?></option>
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
							<option value="<?php echo $c->id_candidato ?>"<?php if ($c->id_candidato == $dv->id_candidato) { echo "selected";} ?>><?php echo $c->nombre1.' '.$c->nombre2.' '.$c->apellido1.' '.$c->apellido2.' ---> '.$c->nombre_partido ?></option>
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
							<option value="<?php echo $e->id_voto ?>"<?php if ($e->id_voto == $dv->id_voto) { echo "selected";} ?>><?php echo $e->descripcion ?></option>
						<?php } ?>
					</select>
                </div>
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