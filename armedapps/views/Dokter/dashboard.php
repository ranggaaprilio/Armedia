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
                    <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
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

        <div class="row">
            <!-- Card Admin -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <span><i class=" fas fa-user-circle" style="font-size:75px;color:#00897b"></i></span>
                            </div>
                            <div class="col-8 text-right">
                                <div class="huge">
                                    <font size="18"><b><?php echo $this->Base_model->get_data('admin', 'id_admin')->num_rows(); ?></b></font>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div><b>Jumlah Admin yang terdaftar</b></div>
                        <a href="<?php echo base_url() . 'dokter/Daftar_admin' ?>" style="color: #00897b;
                            text-decoration: none;">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat Detail</span>
                                <span class="pull-right"><i class="fas fa-arrow-alt-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Card Admin -->
            <!-- Card Dokter -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <span><i class=" fas fa-stethoscope " style="font-size:75px;color:#00897b"></i></span>
                            </div>
                            <div class="col-8 text-right">
                                <div class="huge">
                                    <font size="18"><b><?php echo $this->Base_model->get_data('dokter', 'id_dokter')->num_rows(); ?></b></font>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div><b>Jumlah Dokter yang terdaftar</b></div>
                        <a href="<?php echo base_url() . 'dokter/Data_dokter' ?>" style="color: #00897b;
                            text-decoration: none;">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat Detail</span>
                                <span class="pull-right"><i class="fas fa-arrow-alt-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Card Dokter -->
            <!-- Card obat -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <span><i class=" fas fa-flask " style="font-size:75px;color:#00897b"></i></span>
                            </div>
                            <div class="col-8 text-right">
                                <div class="huge">
                                    <font size="18"><b><?php echo $this->Base_model->get_data('obat', 'id_obat')->num_rows(); ?></b></font>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div><b>Jumlah Obat yang terdaftar</b></div>
                        <a href="<?php echo base_url() . 'dokter/Data_obat' ?>" style="color: #00897b;
                            text-decoration: none;">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat Detail</span>
                                <span class="pull-right"><i class="fas fa-arrow-alt-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- end card obat -->
            <!-- Card Pasien -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <span><i class="fas fa-users " style="font-size:75px;color:#00897b"></i></span>
                            </div>
                            <div class="col-8 text-right">
                                <div class="huge">
                                    <font size="18"><b><?php echo $this->Base_model->get_data('pasien', 'no_rekamedis')->num_rows(); ?></b></font>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div><b>Jumlah Pasien yang terdaftar</b></div>
                        <a href="<?php echo base_url() . 'dokter/Data_pasien' ?>" style="color: #00897b;
                            text-decoration: none;">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat Detail</span>
                                <span class="pull-right"><i class="fas fa-arrow-alt-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- end card Pasien -->
        </div>
        <!-- end class row -->
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-4">
                                <h3>Daftar Antrian Hari ini</h3>
                                <p><?php echo $tanggal ?></p>
                            </div>
                            <div class="col-8 text-right">
                                <div class="huge">
                                    <font size="18"><b><?php echo $daftar ?></b></font>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No Registrasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($show as $s) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $s->no_registrasi ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <hr>
                        <a href="<?php echo base_url() . 'dokter/Data_pendaftaran' ?>" style="color: #00897b;
                            text-decoration: none;">
                            <div class="panel-footer">
                                <span class="pull-left text-right">Lihat Detail</span>
                                <span class="pull-right"><i class="fas fa-arrow-alt-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    $this->load->view('dokter/template/js');
    ?>



    <?php
    $this->load->view('dokter/template/foot');
    ?>