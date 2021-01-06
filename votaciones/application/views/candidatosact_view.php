<script src="<?php echo base_url('props/bootstrap/js/candidato.js');?>"></script>
<body> 
	<div class="container">
		<?php foreach ($candidato as $c){ ?>
			<form action="<?php echo base_url().'candidato_controller/actualizar' ?>" method="POST" class="mx-auto" onsubmit="return validarFormulario()">
				
				<input type="hidden" name="id_candidato" value="<?= $c->id_candidato ?>">
				<div class="row my-3">
					<div class="col">
						<div class="input-group">
							<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Votacion</span>
							<select name="votacion" id="votacion">
								<option value="">-- Seleccione una Votacion --</option>
								<?php foreach ($votacion as $v) { ?>
									<option value="<?= $c->id_votacion ?>" <?php if($v->id_votacion == $v->id_votacion){ echo 'selected'; } ?>><?= $v->descrippcion ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col">
						<div class="input-group">
							<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>DUI_Persona</span>
							<select name="persona" id="persona" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
								<option value="">-- Seleccione una persona --</option>
								<?php foreach ($persona as $p) { ?>
									<option value="<?= $p->id_persona ?>" <?php if($p->id_persona == $p->id_persona){ echo 'selected'; } ?>><?= $p->DUI_Persona ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>

				<div class="row my-3">
					<div class="col">
						<div class="input-group">
							<span class="input-group-text" ><i class="fa fa-tags" >&nbsp</i>Partido Politico</span>
							<select name="partido" id="partido">
								<option value="">-- Seleccione un Partido --</option>
								<?php foreach ($partido as $ci) { ?>
									<option value="<?= $pa->id_partido ?>" <?php if($pa->id_partido == $pa->id_partido){ echo 'selected'; } ?>><?= $pa->nombre_partido ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<input type="submit" value="Guardar" class="btn btn-primary">
						</div>
					</div>
				</form>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>

		</div>
	</div>
	</form>
<?php } ?>
</div>


