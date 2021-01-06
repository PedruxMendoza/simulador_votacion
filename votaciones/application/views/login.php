<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Votaciones || Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('props/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('props/css/sb-admin.css') ?>" rel="stylesheet">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="<?php echo base_url('props/js/jquery.inputmask.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="<?php echo base_url('props/js/login.js');?>"></script>

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="<?php echo base_url().'loginController/iniciar' ?>" method="POST" autocomplete="off" onsubmit="return validar()">
          <div class="form-group">
            <div class="form-label-group">
              <input type="correo" id="correo" name="correo" class="form-control" placeholder="Email address">
              <label for="correo">Email</label>
            </div>
          </div>
          <script type="text/javascript">
            $(function () {
              $("#correo").inputmask({ alias: "email" , "clearIncomplete": true});
            });
          </script>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="clave" name="clave" class="form-control" placeholder="Password">
              <label for="clave">Password</label>
            </div>
          </div>
          <input type="submit" value="Login" class="btn btn-primary btn-block">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo base_url('LoginVotante_controller/index') ?>">Login Votantes</a>
          <a class="d-block small" href="<?php echo base_url('sendcorreoController/index') ?>">¿Olvidaste la Contraseña?</a>
        </div>
      </div>
    </div>
  </div>

  <?php $this->load->view('utils/alertsLogin.php') ?>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('props/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('props/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

</body>

</html>
