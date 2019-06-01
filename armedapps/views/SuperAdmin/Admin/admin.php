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
                        <h2 class="pageheader-title">Kelola Admin</h2>
                        <p class="pageheader-text">Aplikasi Rekam Medis dan Diagnosa</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Kelola Admin</a></li>

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
                        <a href="<?php echo base_url() . 'superadmin/add_admin'; ?>" class="btn btn-rounded btn-xs text-white " style="background-color: #00897b !important">Tambah Pengguna</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="table-datatable" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Admin</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>No Telepon</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Bergabung</th>
                                        <th>Foto</th>
                                        <th>Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($admin as $u) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $u->id_admin ?></td>
                                            <td><?php echo $u->nama_admin; ?></td>
                                            <td><?php echo $u->email; ?></td>
                                            <td><?php echo $u->no_telp; ?></td>
                                            <td><?php echo $u->alamat; ?></td>
                                            <td><?php echo $u->tgl_input ?></td>
                                            <td><img src="<?php echo base_url('assets/img/') . $u->foto ?>" alt="foto profil" width="50" height="50"></td>
                                            <td class="nowrap">
                                                <a href="<?php echo base_url() . 'superadmin/edit_admin/' . $u->id_admin ?>" class="btn btn-primary btn-xs mb-2"><i class="fa fa-edit"></i></a>
                                                <a href="<?php echo base_url() . 'superadmin/delete_admin/' . $u->id_admin ?>" class="btn btn-warning btn-xs"><i class="fa fa-trash"></i></a>
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