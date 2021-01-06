<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <style>
    .container {
      width: 960px;
      margin:20px auto;
    }

    @media only screen and (min-width: 768px) and (max-width: 1000px) {
      .container {
        width: 768px;
      }
    }
    @media only screen and (max-width: 767px) {
      .container {
        width: 420px;
      }
    }
    @media only screen and (max-width: 480px) {
      .container {
        width: 300px;
      }
    }

    a img {
      border:none;
    }

    h1, h2, h3, h4, h5, h6{ 
      font-weight:normal; 
    }
    h1{ 
      font-size:26px; 
      line-height:32px; 
    }
    p, ul{
      margin-bottom:10px;
    }
  </style>

  <title>Votaciones || Inicio</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('props/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url('props/vendor/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('props/css/sb-admin.css') ?>" rel="stylesheet">
  <script src="<?php echo base_url('props/js/contras.js');?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> 

  <!-- Jquery is required, embed on your page if not already - don't embed 2 versions -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- End Jquery -->

  <!-- Map scripts - add the below to your page -->
  <!-- jsmaps-panzoom.js is optional if you are using enablePanZoom -->
  <link href="<?php echo base_url('props/jsmaps/jsmaps.css') ?>" rel="stylesheet" type="text/css" />
  <script src="<?php echo base_url('props/jsmaps/jsmaps-libs.js') ?>" type="text/javascript"></script>
  <script src="<?php echo base_url('props/jsmaps/jsmaps-panzoom.js') ?>"></script>
  <script src="<?php echo base_url('props/jsmaps/jsmaps.min.js') ?>" type="text/javascript"></script>
  <script src="<?php echo base_url('props/maps/elSalvador.js') ?>" type="text/javascript"></script>
  <!-- End Map scripts -->

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="<?php echo base_url('welcome/index') ?>"><?= $this->session->userdata('nombre') ?></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-0 my-0 my-md-0">
      <div class="input-group">
      	<a href="<?php echo base_url().'loginController/cerrar';?>"><button class="btn btn-secondary" type="button">
         Cerrar Sesion <i class="fas fa-sign-out-alt"></i>
       </button></a>
     </div>
   </form>

 </nav>

 <div id="wrapper">

  <!-- Sidebar -->
  <?php $this->load->view('templates/navbar') ?>

  <div id="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Inicio</a>
        </li>
        <li class="breadcrumb-item active">Tablero</li>
      </ol>

      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-key"></i>
              </div>
              <div class="mr-5">¿Cambiar Contraseña?</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#" data-toggle="modal" data-target="#passModal">
              <span class="float-left">Click aqui!</span>
              <span class="float-right">
                <i class="fas fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>

      <!-- Area Chart Example-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-chart-area"></i>
        Mapas de Sedes en El Salvador</div>
        <div class="card-body">
          <div class="container">

            <!-- Map html - add the below to your page -->
            <div class="jsmaps-wrapper" id="elSalvador-map"></div>
            <!-- End Map html -->
          </div>
          <script type="text/javascript">

            $(function() {

              $('#elSalvador-map').JSMaps({
                map: 'elSalvador'
              });

            });

          </script>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>

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
  <!-- Modal -->
  <div class="modal fade" id="passModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cambiar Contraseña</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url('Welcome/cambiarcontra') ?>" method="POST" autocomplete="off" onsubmit="return validar()">
            <div class="d-lg-none">
              <label class="sr-only" for="usuario">Usuario</label>
              <div class="input-group-prepend">
                <div class="input-group-text">Usuario</div>
              </div>
              <input type="number" class="form-control" id="usuario" name="usuario" value="<?php echo $this->session->userdata('id') ?>" readonly>
            </div>
            <div class="input-group mb-2">
              <label class="sr-only" for="passold">Antigua Clave</label>
              <div class="input-group-prepend">
                <div class="input-group-text">Antigua Clave</div>
              </div>
              <input type="password" class="form-control" id="passold" name="clave" placeholder="Digite su antigua clave...">
            </div>
            <div class="input-group mb-2">
              <label class="sr-only" for="pass1">Nueva Clave</label>
              <div class="input-group-prepend">
                <div class="input-group-text">Nueva Clave</div>
              </div>
              <input type="password" class="form-control" id="pass1" name="newclave" placeholder="Digite su nueva clave...">
            </div>
            <div class="input-group mb-2">
              <label class="sr-only" for="pass2">Nueva Clave</label>
              <div class="input-group-prepend">
                <div class="input-group-text">Confirme su Nueva clave</div>
              </div>
              <input type="password" class="form-control" id="pass2" name="newclave" placeholder="Confirme su nueva clave...">
            </div>
            <br>
            <input type="submit" value="Guardar Contraseña" class="btn btn-primary">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
            //Este script compara las contraseñas para saber si son identicas 
            //si lo son realiza el INSERT y si no muestra un mensaje de alerta 
            window.onload = function () {
              document.getElementById("pass1").onchange = validatePassword;
              document.getElementById("pass2").onchange = validatePassword;
            }
            function validatePassword(){
              var pass2=document.getElementById("pass2").value;
              var pass1=document.getElementById("pass1").value;
              if(pass1!=pass2)
                document.getElementById("pass1").setCustomValidity("Las contraseñas no coinciden");
              else
                document.getElementById("pass1").setCustomValidity('');  
              
            }
      //Fin del script
    </script>  
    <?php $this->load->view('utils/alertsLogin.php') ?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('props/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('props/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url('props/vendor/chart.js/Chart.min.js') ?>"></script>
    <script src="<?php echo base_url('props/vendor/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('props/vendor/datatables/dataTables.bootstrap4.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('props/js/sb-admin.min.js') ?>"></script>

    <!-- Demo scripts for this page-->
    <script src="<?php echo base_url('props/js/demo/datatables-demo.js') ?>"></script>
    <script src="<?php echo base_url('props/js/demo/chart-area-demo.js') ?>"></script>

  </body>

  </html>
