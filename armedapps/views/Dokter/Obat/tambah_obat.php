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
                        <h2 class="pageheader-title">Tambah Obat</h2>
                        <p class="pageheader-text">Aplikasi Rekam Medis dan Diagnosa</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Kelola Obat</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tambah Data Obat</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header " style=" background-color: #00897b !important;">
                        <h4 style="font-size: 25px;" class="text-white my-auto">Masukan Data Obat Baru</h4>
                    </div>
                    <div class="card-body">
                        <?php echo form_open('dokter/add_obat'); ?>
                        <!-- Nama Obat -->
                        <div class="form-group">
                            <label for="inputNamaObat">Nama Obat</label>
                            <input id="inputNamaObat" type="text" name="name" placeholder="Masukan Nama Obat" autocomplete="off" class="form-control" value="<?= set_value('name') ?>">
                            <?= form_error('name', '<small class="text-danger pl-4">', '</small>') ?>
                        </div>
                        <!-- Jenis Obat -->
                        <div class="form-group">
                                <label for="input-select">Jenis Obat</label>
                                <select class="form-control" id="input-select" name='jenis'>
                                    <option value="">-PILIH-</option>
                                        <option value="Kapsul">Kapsul</option>
                                        <option value="Tablet">Tablet</option>
                                        <option value="Bedak">Bedak</option>
                                        <option value="Makanan PG">Makanan PG</option>
                                        <option value="Suntik KB">Suntik KB</option>
                                        <option value="Cairan Alkohol">Cairan Alkohol</option>
                                        <option value="Suplemen">Suplemen</option>
                                        <option value="Obat Tetes">Obat Tetes</option>
                                </select>
                                <?= form_error('jenis', '<small class="text-danger pl-4">', '</small>') ?>
                            </div>
                        <!-- Satuan -->
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <select class="form-control" id="satuan" name='satuan'>
                                    <option value="">-PILIH-</option>
                                        <option value="Strip">Strip</option>
                                        <option value="Buah">Buah</option>
                                        <option value="Botol">Botol</option>
                                        <option value="Suntikan">Suntikan</option>
                                </select>
                                <?= form_error('satuan', '<small class="text-danger pl-4">', '</small>') ?>
                        </div>
                        <!-- Dosis Aturan Obat -->
                        <div class="form-group">
                            <label for="dosis-aturan-obat">Dosis Aturan Obat</label>
                            <input id="dosis-aturan-obat" type="text" name="dosis_aturan_obat" placeholder="Masukan Dosis Aturan Obat" autocomplete="off" class="form-control" value="<?= set_value('dosis-aturan-obat   ') ?>">
                            <?= form_error('dosis-aturan-obat', '<small class="text-danger pl-4">', '</small>') ?>
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
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->

        </div>
    </div>