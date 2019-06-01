<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- font-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!--CSS-->
    <link href="<?= base_url() ?>assets/css/bootstrap/bootstrap.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/animate/animate.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/custom/login.css">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            background-image: url('<?php echo base_url('assets/img/back-login.jpg'); ?>');
            -webkit-background-size: 100% 100%;
            -moz-background-size: 100% 100%;
            -o-background-size: 100% 100%;
            background-size: 100% 100%;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block "><img src="<?php echo   base_url() ?>assets/img/login.png" alt="" style="background-position: center;
	              background-size: cover;" height="600" width="500" class="wow jackInTheBox"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Sign In</h1>
                                    </div>
                                    <?php
                                    if (isset($_GET['pesan'])) {
                                        if ($_GET['pesan'] == "gagal") {
                                            echo "<div class='alert alert-danger alert-danger alert-message'>";
                                            echo $this->session->flashdata('alert');
                                            echo "</div>";
                                        } else if ($_GET['pesan'] == "logout") {
                                            if ($this->session->flashdata()) {
                                                echo "<div class='alert alert-danger alert-success alert-message'>";
                                                echo $this->session->flashdata('Anda telah logout');
                                                echo "</div>";
                                            }
                                        } else if ($_GET['pesan'] == "Belum Login") {
                                            if ($this->session->flashdata()) {
                                                echo "<div class='alert alert-danger alert-primary alert-message'>";
                                                echo $this->session->flashdata('alert');
                                                echo "</div>";
                                            }
                                        }
                                    } else {
                                        if ($this->session->flashdata()) {
                                            echo "<div class='alert alert-danger alert-message'>";
                                            echo $this->session->flashdata('alert');
                                            echo "</div>";
                                        }
                                    }
                                    ?>
                                    <div class="login-box-body">
                                        <form class="user" method="post" action="auth/cheklogin">
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Email" name="email" autofocus="required" value="<?php echo set_value('email'); ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">Remember Me</label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-user btn-block" style="background-color: #00897b !important"><strong class="text-white">Sign In</strong></button>
                                            <hr>
                                            <a href="<?= base_url() ?>" class="btn btn-user btn-block btn-outline-primary">
                                                Kembali
                                            </a>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div> <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>assets/js/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/wow/dist/wow.min.js"></script>
    <script>
        //animasi gambar login
        new WOW().init();

        //animasi alert login
        $('.alert-message').alert().delay(3000).slideUp('slow');
    </script>

</body>

</html> 