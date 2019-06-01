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
                        <h2 class="pageheader-title">Tambah Jadwal Dokter</h2>
                        <p class="pageheader-text">Aplikasi Rekam Medis dan Diagnosa</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Jadwal Praktek Dokter</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tambah jadwal Dokter</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header " style=" background-color: #00897b !important;">
                        <h4 style="font-size: 25px;" class="text-white my-auto">Masukan Jadwal Dokter</h4>
                    </div>
                    <div class="card-body">
                        <?php echo form_open('pendaftaran/add_jadwal'); ?>
                        <!-- Nama Dokter -->
                        <div class="form-group">
                            <label for="input-select">Nama Dokter</label>
                            <select class="form-control" id="input-select" name='id'>
                                <option value="">-PILIH-</option>
                                <?php foreach ($dokter as $d) { ?>
                                    <option value="<?= $d->id_dokter ?>"><?= $d->nama ?></option>

                                <?php } ?>
                            </select>
                              <?= form_error('id', '<small class="text-danger pl-4">', '</small>') ?>
                        </div>
                        <!-- Tanggal -->
                        <div class="form-group">
                            <label for="input-select">Tanggal</label>
                            <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#datetimepicker4" />
                                <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                </div>
                            </div>
                              <?= form_error('tanggal', '<small class="text-danger pl-4">', '</small>') ?>
                        </div>
                        <!-- Jam Mulai -->
                        <div class="form-group">
                            <label for="input-select">Jam Mulai</label>
                            <div class="input-group date" id="datetimepicker33" data-target-input="nearest">
                                <input type="text" name="jam_m" class="form-control datetimepicker-input" data-target="#datetimepicker33" />
                                <div class="input-group-append" data-target="#datetimepicker33" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                </div>
                            </div>
                              <?= form_error('jam_m', '<small class="text-danger pl-4">', '</small>') ?>
                        </div>
                        <!-- Jam Akhir -->
                        <div class="form-group">
                            <label for="input-select">Jam Akhir</label>
                            <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                <input type="text" name="jam_a" class="form-control datetimepicker-input" data-target="#datetimepicker3" />
                                <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                </div>
                            </div>
                              <?= form_error('jam_a', '<small class="text-danger pl-4">', '</small>') ?>
                        </div>
                        <!-- Pilihan -->
                        <div class="row">
                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">

                            </div>
                            <div class="col-sm-6 pl-0">
                                <p class="text-right">
                                    <button type="submit" class="btn btn-space  " style="background-color:#00897b !important"><i class="fas fa-save text-white"></i></button>
                                    <a href="<?= base_url('pendaftaran/jadwal_dokter') ?>" class="btn btn-space btn-warning"><i class=" fas fa-arrow-right"></i></a>
                                </p>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->

        </div>
    </div>