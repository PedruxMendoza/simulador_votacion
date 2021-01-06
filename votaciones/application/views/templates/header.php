<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $titulo; ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('props/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url('props/vendor/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('props/css/sb-admin.css') ?>" rel="stylesheet">
  <script src="<?php echo base_url('props/bootstrap/js/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('props/js/jquery.inputmask.js') ?>"></script>
  <?php if ($titulo == 'Votaciones || Votaciones') { ?>
    <script src="<?php echo base_url('props/js/votacion.js');?>"></script>
  <?php }elseif ($titulo == 'Votaciones || Detalles Votaciones') { ?>
    <script src="<?php echo base_url('props/js/DV.js');?>"></script>
  <?php }elseif ($titulo == 'Votaciones || Sede') { ?>
    <script src="<?php echo base_url('props/js/validacion.js');?>"></script>
  <?php }elseif ($titulo == 'Votaciones || Urnas') { ?>
    <script src="<?php echo base_url('props/js/urnas.js');?>"></script>
  <?php }elseif ($titulo == 'Votaciones || Padron') { ?>
    <script src="<?php echo base_url('props/js/validacion_padron.js');?>"></script>
  <?php }elseif ($titulo == 'Votaciones || Partido Politico') { ?>
    <script src="<?php echo base_url('props/js/partido.js');?>"></script>
  <?php }elseif ($titulo == 'Elecciones || Usuario') { ?>
    <script src="<?php echo base_url('props/js/validacion_usuario.js');?>"></script>
  <?php }elseif ($titulo == 'Votación || Personas') { ?>
    <script type="text/javascript" src="<?= base_url('props/bootstrap/js/persona.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('props/bootstrap/js/municipio.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('props/bootstrap/js/moment.min.js') ?>"></script>
    <script src="<?php echo base_url('props/js/persona.js');?>"></script>
  <?php } ?> 
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>  

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