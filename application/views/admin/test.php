<!DOCTYPE html>
<html lang="en">


<head>
    <link rel="icon" type="image/x-icon" href="assets/images/logoboi.png" />
    <style type="text/css">
        .img {
            width: 100%;
            max-width: 130px;
            height: auto;
        }
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login || BOII</title>

    <!-- Custom fonts for this template-->
    <link href="assets/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/template/css/sb-admin-2.min.css" rel="stylesheet">
    <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="  https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
    <link href=" https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="login.css">



</head>

<body>
    <style>
        body {
            background-image: url("assets/dist/img/abcd.png");
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>


    <div class="container">

        <div class="wrapper">

            <img src="assets\dist\img\logo.png" style="display:block; margin:auto;" class="text-center mr-6" width="130px" height="60px" alt="">
            <div>
                <br>
                <h6 class="text-center">Bank of India Indonesia Tbk </h6>
            </div>
            <!-- <div class="text-center mt-4 name">
            Bank of India Indonesia
        </div> -->
            <form action="" role="form" id="quickForm" method="post">
                <div class="form-field d-flex align-items-center">
                    <span class="far fa-user"></span>
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-key"></span>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <button type="button" id="login" value="Login" class="btn mt-3">Login</button>

            </form>
            <div class="text-center fs-6">



                <div style="position: relative; top:260px; left: 5px;">

                    <h6> &copy; Copyright 2023 IT Division</h6>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
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
                            $('[name="' + data.inputerror[i] + '"]').closest('.kosong').append('<span></span>');
                            $('[name="' + data.inputerror[i] + '"]').next().next().text(data.error_string[i]).addClass('invalid-feedback');
                        }
                    }
                }
            });

        });
    </script>
    </form>