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
                        <h2 class="pageheader-title">Kelola Dokter</h2>
                        <p class="pageheader-text">Aplikasi Rekam Medis dan Diagnosa</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Kelola dokter</a></li>

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
                        <a href="<?php echo base_url() . 'pendaftaran/add_dokter'; ?>" class="btn btn-rounded btn-xs text-white" style="background-color: #00897b !important">Tambah Dokter</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="table-datatable" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Dokter</th>
                                        <th>Nama Lengkap</th>
                                        <th>Alamat</th>
                                        <th>No Telepon</th>
                                        <th>Email</th>
                                        <th>Foto</th>
                                        <th>Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($dokter as $d) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $d->id_dokter ?></td>
                                            <td><?php echo $d->nama; ?></td>
                                            <td><?php echo $d->alamat; ?></td>
                                            <td><?php echo $d->no_telp; ?></td>
                                            <td><?php echo $d->email; ?></td>
                                            <td><img src="<?php echo base_url('assets/img/user/') . $d->foto ?>" alt="foto profil" width="50" height="50"></td>
                                            <td class="nowrap">
                                                <a href="<?php echo base_url() . 'pendaftaran/edit_dokter/' . $d->id_dokter ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                                <a href="<?php echo base_url() . 'pendaftaran/delete_dokter/' . $d->id_dokter ?>" class="btn btn-warning btn-xs"><i class="fa fa-trash"></i></a>
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