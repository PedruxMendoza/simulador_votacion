<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 align="center" >Padron</h2>
			</div>
		</div>	
		<div class="row">
			
			<div class="col-md-12">
				<table class="table table-striped table-bordered" style="width:100%" id="table1">
					<thead>
					<tr>
						
						<th class="text-center">Urna</th>
						<th class="text-center">Persona</th>
						


						
					</tr>
					</thead>
					<tbody>
					<?php foreach ($padron as $k) { ?>
						
						<tr>
							<td class="text-center"><?php echo $k->id_urnas ?></td>
							<td class="text-center"><?php echo $k->nombre1 ." ". $k->nombre2 ." ". $k->nombre3 ." ". $k->nombre4 ." ". $k->apellido1 ." ". $k->apellido2 ." ". $k->apellido3 ."<h7 style='color:#FF0033  '>  ==DUI=> </h7>". $k->DUI_persona  ;?></td>

					<?php }  ?>
					</tbody>
				</table>
			</div>
		</div>
	