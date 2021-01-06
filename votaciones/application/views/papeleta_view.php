<!DOCTYPE html>
<html>
<head>
  <title >Sistema de Votaciones</title>
  <link rel="stylesheet" href="<?php echo base_url('props/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('props/css/bootstrap-colorpicker.css') ?>">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> 



  <div class="row">
    <div class="col-md-12" align="center"><h1 style="background-color: white">Elecciones Presidenciales 2019
    </h1></div>
  </div>
</head>
<body style="background-color: black" >


  <br><br>
  <?php
  $conexion = new mysqli('localhost','root','','votacion');
  if($conexion->connect_errno){
    echo 'error al conectarse a mysql: '.$conexion->connect_error;
  }

  ?>
  
  <?php $sql = "SELECT * FROM partido_politico where id_partido";
  $resultado = mysqli_query($conexion,$sql); ?>

  <div class="container">



    <?php
    $des = ""; 
    $color= "";
    $f = 1;
    $a =1;

    while ( $mostrar = mysqli_fetch_row($resultado)) {



      if ($f==1) {
        ?>  
        <div class="row">
        <?php } ?>

        <div class="col-md-6 mx-auto " >  
          
            <center>
              <!-- href="<?php echo base_url('papeletaController/actualizar/'.$mostrar[0]) ?>" -->
              <a onclick="alerta_votar('<?= $mostrar[0] ?>')" type="button" style='width: 80px; height: 80px' class="btn btn-block btn-dark" name="papeleta " value="<?php  echo $mostrar[0] ?>" >
                
                <img  src='../<?php echo $mostrar[3];  ?>' style='width: 65px; height: 65px' >
                
              </a>
            </center>
          
         <p> <?php 
          echo '<center><font color="#ffffff">'.$mostrar[1].'</font></center>';
          ?>
        </p>
        
      </div>

      
      
      <?php 
      if ($f==2) {
        ?>  
      </div>
    <?php }

    if ($f==2) {
      $f=1;

    }else{
      $f++;
    }
    ?>
    
  <?php } ?> 
  
</div> 


<script>
function alerta_votar(id){
    Swal.fire({
      title: 'Esta seguro que desea votar por este partido?',
      text: "Esta accion no se podra deshacer!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Votar!'
    }).then((result) => {
      if (result.value) {
        window.location.href = "../papeletaController/actualizar/"+id;
      }
    })
  }

</script>


</body>
</html>
