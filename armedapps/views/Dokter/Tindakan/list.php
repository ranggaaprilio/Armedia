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
                        <h2 class="pageheader-title">Data Tindakan Berobat</h2>
                        <p class="pageheader-text">Aplikasi Rekam Medis dan Diagnosa</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Data Tindakan Berobat</a></li>

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
                        <h3>Input Data Tindakan Berobat</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="table-datatable" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No Pendaftaran</th>
                                        <td>No Rawat</td>
                                        <th>Nama Pasien</th>
                                        <th>Tanggal</th>
                                        <th>Dokter</th>
                                        <th>Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($daftar as $u) {
                                        ?>
                                        <?php if ($u->status=='1') {?>
                                          <tr>
                                        
                                            <td><?php echo $u->no_registrasi ?></td>
                                            <td><?php echo $u->no_rawat ?></td>
                                            <td><?php
                                                $pasien = $this->Base_model->get_data_where('pasien', 'no_rekamedis', $u->no_rekamedis)->row();
                                                echo $pasien->nama_pasien;
                                                ?></td>
                                            <td><?php echo $u->tanggal_daftar; ?></td>
                                            <td><?php
                                                $dokter = $this->Base_model->get_data_where('dokter', 'id_dokter', $u->id_dokter)->row();
                                                echo $dokter->nama;
                                                ?></td>
                                            <td>
                                                

                                                <?php if ($u->kategori=='Dewasa') {?>
                                                    <a href="<?php echo base_url() . 'dokter/detail_rawat/' . $u->no_rawat ?>" class="btn btn-success btn-md"><i class="fas fa-pencil-alt"></i></a>
                                               <?php }else {?>
                                                <a href="<?php echo base_url() . 'dokter/detail_riwayat/' . $u->no_rawat ?>" class="btn btn-success btn-md"><i class="fas fa-pencil-alt"></i></a>
                                               <?php } ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
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