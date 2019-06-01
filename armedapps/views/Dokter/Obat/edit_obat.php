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
                        <h2 class="pageheader-title">Edit Obat</h2>
                        <p class="pageheader-text">Aplikasi Rekam Medis dan Diagnosa</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Kelola Obat</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Edit Obat</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header " style=" background-color: #00897b !important;">
                        <h4 style="font-size: 25px;" class="text-white my-auto">Ubah data Obat</h4>
                    </div>
                    <div class="card-body">
                        <?php


                        foreach ($edit as $e) {
                            ?>
                            <?php echo form_open('dokter/update_obat'); ?>
                            <input type="hidden" value="<?php echo $e->id_obat ?>" name="id_obat">
                            <!-- Nama Obat -->
                            <div class="form-group">
                                <label for="inputUserName">Nama Obat</label>
                                <input id="inputUserName" type="text" name="name" placeholder="Masukan Nama Lengkap" autocomplete="off" class="form-control" value="<?php echo $e->nama_obat ?>">
                                <?= form_error('name', '<small class="text-danger pl-4">', '</small>') ?>
                            </div>
                            <!-- Jenis Obat -->
                            <div class="form-group">
                                <label for="input-jenis">Jenis Obat</label>
                                <input type="text" value="<?= $e->jenis_obat ?>" placeholder="Masukan Jenis Obat" readonly class="form-control" name="jenis">
                                <?= form_error('jenis', '<small class="text-danger pl-4">', '</small>') ?>
                            </div>
                            <!-- Dosis Obat -->
                            <div class="form-group">
                                <label for="dosisObat">Dosis Obat</label>
                                <input id="dosisObat" type="text" name="dosis_aturan_obat" placeholder="Masukan Dosis Obat" autocomplete="off" class="form-control" value="<?= $e->dosis_aturan_obat ?>">
                                <?= form_error('dosis_aturan_obat', '<small class="text-danger pl-4">', '</small>') ?>
                            </div>
                            <!-- Satuan -->
                            <div class="form-group">
                                <label for="satuan">Satuan Obat</label>
                                <input type="text" value="<?= $e->satuan ?>" placeholder="Masukan satuan" readonly class="form-control" name="satuan">
                            </div>
                            <!-- Pilihan -->
                            <div class="row">
                                <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">

                                </div>
                                <div class="col-sm-6 pl-0">
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space  " style="background-color:#00897b !important"><i class="fas fa-save text-white"></i></button>
                                        <a href="<?= base_url('dokter/data_obat') ?>" class="btn btn-space btn-warning"><i class=" fas fa-arrow-right"></i></a>
                                    </p>
                                </div>
                            </div>
                            <?= form_close(); ?>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->

        </div>
    </div>