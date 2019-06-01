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
                        <h2 class="pageheader-title">Tambah Pasien</h2>
                        <p class="pageheader-text">Aplikasi Rekam Medis dan Diagnosa</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Kelola Pasien</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tambah Data Pasien</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header " style=" background-color: #00897b !important;">
                        <h4 style="font-size: 25px;" class="text-white my-auto">Ubah Data Pasien</h4>
                    </div>
                    <div class="card-body">
                          <?php
                        foreach ($edit as $e) {
                            ?>
                        <?php echo form_open('pendaftaran/update_pasien'); ?>
                        <input type="hidden" value="<?php echo $e->no_rekamedis ?>" name="id">
                        <!-- KTP -->
                        <div class="form-group">
                            <label for="NO_ktp">No KTP</label>
                            <input type="text" name="ktp" placeholder="Masukan No KTP" autocomplete="off" class="form-control" value="<?php echo $e->no_ktp ?>">
                            <?= form_error('ktp', '<small class="text-danger pl-4">', '</small>') ?>
                        </div>
                        <!-- Nama Lengkap -->
                        <div class="form-group">
                            <label for="Nama">Nama Lengkap</label>
                            <input id="inputUserName" type="text" name="name" placeholder="Masukan Nama Lengkap" autocomplete="off" class="form-control" value="<?php echo $e->nama_pasien?>">
                            <?= form_error('name', '<small class="text-danger pl-4">', '</small>') ?>
                        </div>
                        <!-- Tempat Lahir -->
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" name="te_lahir" placeholder="Masukan Tempat Lahir" class="form-control" autocomplete="off" value="<?php echo $e->tempat_lahir ?>">
                            <?= form_error('te_lahir', '<small class="text-danger pl-4">', '</small>') ?>
                        </div>
                        <!-- Tanggal Lahir -->
                        <div class="form-group">
                            <label for="input-select">Tanggal Lahir</label>
                            <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#datetimepicker4" value="<?php echo $e->tanggal_lahir ?>" />
                                <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                </div>
                            </div>
                            <?= form_error('tanggal', '<small class="text-danger pl-4">', '</small>') ?>
                        </div>

                        <!-- No Telepon -->
                        <div class="form-group">
                            <label for="No_telp">No.Telepon</label>
                            <input id="InputNo_telp" type="text" name="telp" placeholder="Masukan Nomor Telepon" autocomplete="off" class="form-control" value="<?php echo $e->no_telp ?>">
                            <?= form_error('telp', '<small class="text-danger pl-4">', '</small>') ?>
                        </div>
                        <!-- Alamat -->
                        <div class="form-group">
                            <label for="input-select">Alamat</label>
                            <textarea name="alamat" id="alamat" cols="10" rows="5" class="form-control" placeholder="Masukan Alamat"><?php echo $e->alamat ?></textarea>
                            <?= form_error('alamat', '<small class="text-danger pl-4">', '</small>') ?>
                        </div>

                        <!-- Pilihan -->
                        <div class="row">
                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">

                            </div>
                            <div class="col-sm-6 pl-0">
                                <p class="text-right">
                                    <button type="submit" class="btn btn-space  " style="background-color:#00897b !important"><i class="fas fa-save text-white"></i></button>
                                    <a href="<?= base_url('pendaftaran/data_pasien') ?>" class="btn btn-space btn-warning"><i class=" fas fa-arrow-right"></i></a>
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