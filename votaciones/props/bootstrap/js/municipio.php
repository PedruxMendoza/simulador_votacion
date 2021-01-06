<?php

class conexion{

	public function conex(){
		$pdo = new PDO("mysql:host=localhost;dbname=votacion;charset=utf8","root","");
		return $pdo;

	}
}

class persona{

	public $con;

	public function __construct(){
		$this ->con = conexion::conex();
	}
	public function get_municipio($departamento){
		$query = "SELECT * FROM municipio WHERE id_departamento=?";
		$exe = $this->con->prepare($query);
		$exe->execute([$departamento]);
		return $exe->fetchAll();
	}	
}

$persona = new persona;

if(empty($_POST['p'])){
}else{ 
	$iddepa = $_POST['p'];
	?>

	<select name="municipio" id="mun" class="form-control" >
		<option  value="">-- Seleccione un municipio --</option>
		<?php foreach ($persona -> get_municipio($iddepa) as $valor) { ?>
			<option value="<?php echo $valor[0] ?>"><?php echo $valor[1] ?></option>
		<?php	} ?>
	</select>
</div>

<?php  }	?>	