<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Laporan Pasien Terdaftar</h2>
                        <p class="pageheader-text">Aplikasi Rekam Medis dan Diagnosa</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Data Pasien</a></li>

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
                                <a href="<?php echo base_url() . 'superadmin/add_pasien'; ?>" class="btn btn-rounded btn-xs text-white btn-danger">Cetak PDF</a>
                            </div>
                        </div>


                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="table-datatable" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NO.Rekam Medis</th>
                                        <th>NO.KTP</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Tempat Lahir</th>
                                        <th>No Telepon</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pasien as $j) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $j->no_rekamedis ?></td>
                                            <td><?php echo $j->no_ktp; ?></td>
                                            <td><img src="<?php echo base_url() . 'assets/img/user/' . $j->foto; ?>" alt="Tidak Ada Foto" width="50" height="50"></td>
                                            <td><?php echo $j->nama_pasien; ?></td>
                                            <td><?php echo $j->email; ?></td>
                                            <td><?php echo $j->tempat_lahir; ?></td>
                                            <td><?php echo $j->no_telp; ?></td>
                                            <td><?php echo $j->tanggal_lahir; ?></td>
                                            <td><?php echo $j->alamat; ?></td>
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