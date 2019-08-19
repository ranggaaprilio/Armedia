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
                        <h2 class="pageheader-title">Jadwal Praktek Dokter</h2>
                        <p class="pageheader-text">Aplikasi Rekam Medis dan Diagnosa</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Jadwal Dokter</a></li>

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
                        <h3>Jadwal Dokter</h3>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="table-datatable" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Dokter</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Jam Mulai</th>
                                        <th>Jam Akhir</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($jadwal as $j) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $j->id_dokter ?></td>
                                            <td><?php echo $j->nama; ?></td>
                                            <td><?php echo $j->tanggal; ?></td>
                                            <td><?php echo $j->jam_mulai; ?></td>
                                            <td><?php echo $j->jam_akhir; ?></td>
                                            
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