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
                        <h4 style="font-size: 25px;" class="text-white my-auto">Masukan Data Pasien Baru</h4>
                    </div>
                    <div class="card-body">
                        <?php echo form_open('pendaftaran/add_pasien'); ?>
                        <!-- KTP -->
                        <div class="form-group">
                            <label for="NO_ktp">No KTP</label>
                            <input type="text" name="ktp" placeholder="Masukan No KTP" autocomplete="off" class="form-control" value="<?= set_value('ktp') ?>">
                            <?= form_error('ktp', '<small class="text-danger pl-4">', '</small>') ?>
                        </div>
                        <!-- Nama Lengkap -->
                        <div class="form-group">
                            <label for="Nama">Nama Lengkap</label>
                            <input id="inputUserName" type="text" name="name" placeholder="Masukan Nama Lengkap" autocomplete="off" class="form-control" value="<?= set_value('name') ?>">
                            <?= form_error('name', '<small class="text-danger pl-4">', '</small>') ?>
                        </div>
                        <!-- Tempat Lahir -->
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" name="te_lahir" placeholder="Masukan Tempat Lahir" class="form-control" autocomplete="off" value="<?= set_value('te_lahir') ?>">
                            <?= form_error('te_lahir', '<small class="text-danger pl-4">', '</small>') ?>
                        </div>
                        <!-- Tanggal Lahir -->
                        <div class="form-group">
                            <label for="input-select">Tanggal Lahir</label>
                            <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#datetimepicker4" value="<?= set_value('tanggal') ?>" />
                                <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                </div>
                            </div>
                            <?= form_error('tanggal', '<small class="text-danger pl-4">', '</small>') ?>
                        </div>

                        <!-- No Telepon -->
                        <div class="form-group">
                            <label for="No_telp">No.Telepon</label>
                            <input id="InputNo_telp" type="text" name="telp" placeholder="Masukan Nomor Telepon" autocomplete="off" class="form-control" value="<?= set_value('telp') ?>">
                            <?= form_error('telp', '<small class="text-danger pl-4">', '</small>') ?>
                        </div>
                        <!-- Alamat -->
                        <div class="form-group">
                            <label for="input-select">Alamat</label>
                            <textarea name="alamat" id="alamat" cols="10" rows="5" class="form-control" placeholder="Masukan Alamat"><?= set_value('alamat') ?></textarea>
                            <?= form_error('alamat', '<small class="text-danger pl-4">', '</small>') ?>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" placeholder="Masukan Email" class="form-control" autocomplete="off" value="<?= set_value('email') ?>">
                            <?= form_error('email', '<small class="text-danger pl-4">', '</small>') ?>
                        </div>
                        <!-- password -->
                        <div class="form-group">
                            <label for="inputPassword">Password</label>
                            <input id="inputPassword" type="password" placeholder="Password" class="form-control" name="password1">
                            <?= form_error('password1', '<small class="text-danger pl-4">', '</small>') ?>
                        </div>
                        <!-- Repeat Password -->
                        <div class="form-group">
                            <label for="inputRepeatPassword">Repeat Password</label>
                            <input id="inputRepeatPassword" data-parsley-equalto="#inputPassword" type="password" placeholder="Ulangi Password" class="form-control" name="password2">
                            <?= form_error('password2', '<small class="text-danger pl-4">', '</small>') ?>
                        </div>
                        <!-- Pilihan -->
                        <div class="row">
                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">

                            </div>
                            <div class="col-sm-6 pl-0">
                                <p class="text-right">
                                    <button type="submit" class="btn btn-space  " style="background-color:#00897b !important"><i class="fas fa-save text-white"></i></button>
                                    <a href="<?= base_url('pendaftaran/data_dokter') ?>" class="btn btn-space btn-warning"><i class=" fas fa-arrow-right"></i></a>
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