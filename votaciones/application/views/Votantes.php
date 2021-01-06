<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Votaciones || Votantes</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('props/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('props/css/sb-admin.css') ?>" rel="stylesheet">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="<?php echo base_url('/props/js/jquery.inputmask.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="<?php echo base_url('props/js/loginV.js');?>"></script>

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Bienvenido Votantes</div>
      <div class="card-body">
        <form action="<?php echo base_url().'LoginVotante_controller/iniciar' ?>" method="POST" autocomplete="off" onsubmit="return validar()" >
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="DUI" id="DUI" class="form-control" placeholder="DUI">
              <label for="DUI">Ingrese tu DUI</label>
              <script type="text/javascript">
                $(function () {
                  var selector = document.getElementById("DUI");

                  var im = new Inputmask("99999999-9", { "clearIncomplete": true });
                  im.mask(selector);
                });
              </script>
            </div>
          </div>
          <input type="submit" value="Enviar" class="btn btn-primary btn-block">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo base_url('loginController/index') ?>">Login Usuarios</a>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view('utils/alertsLoginV.php') ?>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('props/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('props/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

</body>

</html>
