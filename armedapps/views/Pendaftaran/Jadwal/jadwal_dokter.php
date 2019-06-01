<!-- Content Header (Page header) -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Jadwal Praktek Dokter</h2>
                        <p class="pageheader-text">Aplikasi Rekam Medis dan Diagnosa</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Jadwal Dokter</a></li>

                                </ol>
                            </nav>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('alert'); ?>"></div>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class=" col-lg-10 col-md-8 col-sm-8 col-xs-8">
                                <a href="<?php echo base_url() . 'pendaftaran/add_jadwal'; ?>" class="btn btn-rounded btn-xs text-white" style="background-color: #00897b !important">Tambah Jadwal</a>
                            </div>
                            <div class=" col-lg-2 col-md-4 col-sm-4 col-xs-4">
                                <a href="<?php echo base_url() . 'pendaftaran/clear_jadwal'; ?>" class="btn btn-rounded btn-xs text-white btn-danger">Kosongkan Semua Jadwal</a>
                            </div>
                        </div>


                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="table-datatable" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Dokter</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Jam Mulai</th>
                                        <th>Jam Akhir</th>
                                        <th>Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($jadwal as $j) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $j->id_dokter ?></td>
                                            <td><?php echo $j->nama; ?></td>
                                            <td><?php echo $j->tanggal; ?></td>
                                            <td><?php echo $j->jam_mulai; ?></td>
                                            <td><?php echo $j->jam_akhir; ?></td>
                                            <td class="nowrap">
                                                <a href="<?php echo base_url() . 'pendaftaran/edit_jadwal/' . $j->id_dokter ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                                <a href="<?php echo base_url() . 'pendaftaran/delete_jadwal/' . $j->id_dokter ?>" class="btn btn-warning btn-xs"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->

        </div>
    </div>