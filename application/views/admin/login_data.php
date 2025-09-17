<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $aplikasi->title; ?> | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dist/css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- icon favixconCOKKKKK -->
  <link rel="icon" href="<?php echo base_url(); ?>assets/foto/logo/pengaduan.png" type="image/gif">
  <!-- akhir favicon jank=coiakj -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-5.5.0/css/all.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-4.3.0/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- Body style -->
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/stylearyo.css"> -->
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.css">
</head>
<style>
  .form-control:focus {
    outline: none !important;
    box-shadow: none !important;
    background: none !important;
  }
</style>
<style>
  h3 {
    font-family: Arial Bold, sans-serif;
    color: black;
    margin: 0;
    padding: 20px;
    font-size: 10;
    text-align: center;
    font-style: italic;
  }

  .gambar-kustom {
    width: 200px;
    height: 200px;
    object-fit: cover;
  }

  .togglePassword {
    position: absolute;
    top: 50%;
    right: 15px;
    transform: translateY(-50%);
    color: #999;
    cursor: pointer;
    z-index: 10;
  }
</style>



<body class="hold-transition login-page" id="gradien1">
  <img class="wave" src="assets/dist/img/wave1.png">
  <div class="container">
    <div class="img">
      <img src="assets/dist/img/bg1.svg">
    </div>
    <div class="login-content">
      <form action="" role="form" id="quickForm" method="post">
        <img src="assets/dist/img/pengaduan.png" class="gambar-kustom">
        <h3 class="title">SopOnline Apps</h3>
        <div class="input-div one">
          <div class="i">
            <i class="fas fa-user"></i>
          </div>
          <div class="div">

            <input type="text" name="username" id="username" class="form-control" value="<?php echo set_value('username'); ?>" placeholder="username">
            <span class="help-block"></span>
          </div>
        </div>
        <div class="input-div pass">
          <div class="i">
            <i class="fas fa-lock"></i>
          </div>
          <div class="input-group">
            <input type="password" name="password" id="password" class="form-control" value="<?php echo set_value('password'); ?>" placeholder="password">
            <div class="input-div one">
              <span class="" style="cursor: pointer;">
                <i class="fa fa-eye-slash" id="togglePassword"></i>
              </span>
            </div>
          </div>
          <span class="help-block"></span>


        </div>
        <br>
        <!-- <a href="#">Forgot Password?</a> -->
        <button type="button" id="login" class="btn btn-info btn-block btn-flat"><span class="fa fa-sign-in-alt"></span> Login</button>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div style="text-align: center;">
          <b>
            <?php
            // foreach ($aplikasi as $apl) {
            echo $aplikasi->copy_right . ' ' . $aplikasi->tahun . ' | ' . $aplikasi->nama_owner;
            // }

            ?>
          </b>
        </div>
      </form>

    </div>
  </div>

  <script type="text/javascript" src="js/main.js"></script>

  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- jquery-validation -->
  <script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/additional-methods.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
  <!-- SweetAlert2 -->
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>


  <script>
    $("#login").on('click', function() {
      $.ajax({
        url: '<?php echo base_url('login/login') ?>',
        type: 'POST',
        data: $('#quickForm').serialize(),
        dataType: 'JSON',
        success: function(data) {
          if (data.status) {
            toastr.success('Login Berhasil!');
            var url = '<?php echo base_url('dashboard') ?>';
            window.location = url;
          } else if (data.error) {
            toastr.error(
              data.pesan
            );
          } else {
            for (var i = 0; i < data.inputerror.length; i++) {
              $('[name="' + data.inputerror[i] + '"]').addClass('is-invalid');
              $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]).addClass('invalid-feedback');
            }
          }
        }
      });

    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const toggle = document.querySelector("#togglePassword");
      const password = document.querySelector("#password");

      toggle.addEventListener("click", function() {
        const type = password.type === "password" ? "text" : "password";
        password.type = type;
        this.classList.toggle("fa-eye");
        this.classList.toggle("fa-eye-slash");
      });
    });
  </script>

  <script type="text/javascript" src="<?php echo base_url(); ?>assets/dist/js/main.js"></script>
</body>

</html>