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
                        <h2 class="pageheader-title">Kelola Obat</h2>
                        <p class="pageheader-text">Aplikasi Rekam Medis dan Diagnosa</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Kelola Obat</a></li>

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
                        <a href="<?php echo base_url() . 'dokter/add_obat'; ?>" class="btn btn-rounded btn-xs text-white" style="background-color: #00897b !important">Tambah Obat</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="table-datatable" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Obat</th>
                                        <th>Nama Obat</th>
                                        <th>Jenis Obat</th>
                                        <th>Dosis Obat</th>
                                        <th>Satuan</th>
                                        <th>Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($obat as $o) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $o->id_obat ?></td>
                                            <td><?php echo $o->nama_obat; ?></td>
                                            <td><?php echo $o->jenis_obat; ?></td>
                                            <td><?php echo $o->dosis_aturan_obat; ?></td>
                                            <td><?php echo $o->satuan; ?></td>
                                            <td class="nowrap">
                                                <a href="<?php echo base_url() . 'dokter/edit_obat/' . $o->id_obat ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                                <a href="<?php echo base_url() . 'dokter/delete_obat/' . $o->id_obat ?>" class="btn btn-warning btn-xs"><i class="fa fa-trash"></i></a>
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