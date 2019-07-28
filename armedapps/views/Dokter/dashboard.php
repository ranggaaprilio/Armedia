<?php
$this->load->view('dokter/template/head');
?>


<?php
$this->load->view('dokter/template/topbar');
$this->load->view('dokter/template/sidebar');
?>

<!-- Content Header (Page header) -->
<div class="dashboard-wrapper">

    <div class="container-fluid dashboard-content ">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Dashboard</h2>
                    <p class="pageheader-text"></p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->

        <div class="card">
            <div class="card-body">
                <h1>Selamat Datang , <?php echo $this->session->userdata('nama'); ?></h1>
            </div>
        </div>




        <?php
        $this->load->view('dokter/template/js');
        ?>



        <?php
        $this->load->view('dokter/template/foot');
        ?>