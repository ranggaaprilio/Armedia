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
                        <h2 class="pageheader-title">Kelola Pendaftaran</h2>
                        <p class="pageheader-text">Aplikasi Rekam Medis dan Diagnosa</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Kelola pendaftaran</a></li>

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
                        <a href="<?php echo base_url() . 'superadmin/clear_daftar'; ?>" class="btn btn-rounded btn-xs btn-danger text-white ">Kosongkan Pendaftaran</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="table-datatable" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No Pendaftaran</th>
                                        <td>No Rawat</td>
                                        <th>Nama Pasien</th>
                                        <th>Tanggal</th>
                                        <th>Dokter</th>
                                        <th>Kategori</th>
                                        <th>Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($daftar as $u) {
                                        ?>
                                        <tr>

                                            <td><?php echo $u->no_registrasi ?></td>
                                            <td><?php echo $u->no_rawat ?></td>
                                            <td><?php
                                                $pasien = $this->Base_model->get_data_where('pasien', 'no_rekamedis', $u->no_rekamedis)->row();
                                                echo $pasien->nama_pasien;
                                                ?></td>
                                            <td><?php echo $u->tanggal_daftar; ?></td>
                                            <td><?php
                                                $dokter = $this->Base_model->get_data_where('dokter', 'id_dokter', $u->id_dokter)->row();
                                                echo $dokter->nama;
                                                ?></td>
                                                <td><?php 
                                               echo  $u->kategori;
                                                 ?></td>
                                            <td>

                                                <a href="<?php echo base_url() . 'superadmin/delete_daftar/' . $u->no_rawat ?>" class="btn btn-warning btn-xs"><i class="fa fa-trash"></i></a>
                                                <?php if ($u->status=='1') {?>
                                                    <a href="<?php echo base_url() . 'superadmin/selesai/' . $u->no_rawat ?>" class="btn btn-success btn-xs"><i class=" fas fa-check"></i></a>
                                                <?php } else {?>
                                                    <button class="btn btn-primary btn-xs"><i class="fas fa-clipboard-check"> Selesai</i></button>
                                                <?php } ?>
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