<!-- Content Header (Page header) -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <!-- biodata Pasien -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header " style=" background-color: #00897b !important;">
                        <h4 style="font-size: 25px;" class="text-white my-auto">Biodata Pasien</h4>
                    </div>
                    <div class="card-body">
                        <?php foreach ($daftar as $d) { ?>
                            <table border="0">
                                <tr>
                                    <td width="50%">No Rawat</td>
                                    <td><?php echo $d->no_rawat ?></td>
                                </tr>
                                <tr>
                                    <td width="50%">No Rekamedis</td>
                                    <td>
                                        <?php
                                        echo $d->no_rekamedis;
                                        ?>
                                        <?php $no_rm = $d->no_rekamedis; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%">Nama Ibu</td>
                                    <td>
                                        <?php
                                        $pasien = $this->Base_model->get_data_where('pasien', 'no_rekamedis', $d->no_rekamedis)->row();
                                        echo $pasien->nama_pasien;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%">Nama Balita</td>
                                    <td>
                                        <?php
                                        $balita = $this->Base_model->get_data_where('balita', 'no_rekamedis', $d->no_rekamedis)->row();
                                        $id_balita=$balita->id_balita;
                                        echo $balita->nama;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%">Tanggal Lahir</td>
                                    <td>
                                        <?php
                            
                                        echo $balita->tanggal_lahir;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%">Jenis Kelamin</td>
                                    <td>
                                        <?php
                                        
                                        echo $balita->jekel;
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        
                        <hr>
                        <div class="row">
                            <div class="col-1 col-sm-3 col-lg-2">
                                <a class="btn btn-primary btn-sm" href="#" role="button" data-toggle="modal" data-target="#exampleModalCenter">
                                    <p>Input Tindakan</p>
                                </a>
                            </div>
                            <div class="col-1 col-sm-3 col-lg-2">
                                <a class="btn btn-danger btn-sm" href="<?= base_url('superadmin/selesai/'). $d->no_rawat ?>" role="button">
                                    <p>Selesai</p>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end biodata pasien -->

            <!-- Modal -->
            <div class="modal fade  bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalCenterTitle">Input Riwayat Rekamedis <?= $pasien->nama_pasien ?></h3><br>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php
                            foreach ($daftar as $e) {
                                ?>
                                <?php echo form_open('superadmin/input_rekam_balita'); ?>
                                <input type="hidden" value="<?php echo $e->no_rekamedis ?>" name="no_rm">
                                <input type="hidden" value="<?php echo $e->no_rawat ?>" name="no_rawat">
                                <?php $no_rm = $e->no_rekamedis ?>
                                <!--  Dokter Penanggung jawab -->
                                <div class="form-group">
                                    <label for="inputUserName">Dokter Penanggung jawab</label>
                                    <input id="inputUserName" type="text" name="id" placeholder="Masukan Nama dokter" autocomplete="off" class="form-control" value="<?php echo $e->id_dokter ?>" readonly>
                                    <?= form_error('id', '<small class="text-danger pl-4">', '</small>') ?>
                                </div>
                                <!-- Tanggal -->
                                <div class="form-group">
                                    <label>Tanggal Periksa</label>
                                    <input type="text" name="tanggal" placeholder="Masukan tanggal" class="form-control" autocomplete="off" value="<?php echo $e->tanggal_daftar ?>" readonly>
                                    <?= form_error('tanggal', '<small class="text-danger pl-4">', '</small>') ?>
                                </div>

                                 <!-- id_balita -->
                                <div class="form-group">
                                    <label>ID Balita</label>
                                    <input type="text" name="id_balita" placeholder="Masukan tanggal" class="form-control" autocomplete="off" value="<?php echo $id_balita?>" readonly>
                                    <?= form_error('tanggal', '<small class="text-danger pl-4">', '</small>') ?>
                                </div>

                                <!-- Hasil -->
                                <div class="form-group">
                                    <label for="input-select">Hasil Periksa</label>
                                    <textarea name="hasil" id="hasil" cols="10" rows="5" class="form-control" placeholder="Masukan Hasil Periksa"></textarea>
                                    <?= form_error('hasil', '<small class="text-danger pl-4">', '</small>') ?>
                                </div>
                                <!-- Tindakan -->
                                <div class="form-group">
                                    <label for="input-select">Tindakan Yang dilakukan</label>
                                    <textarea name="tindakan" id="tindakan" cols="10" rows="5" class="form-control" placeholder="Masukan Tindakan"></textarea>
                                    <?= form_error('tindakan', '<small class="text-danger pl-4">', '</small>') ?>
                                </div>

                                <!-- obat -->
                                <div class="form-group">
                                    <label>Obat</label>
                                    <select class="form-control" id="input-select" name='obat'>
                                        <option value="">-PILIH-</option>
                                        <?php foreach ($obat as $o) { ?>
                                            <option value="<?php echo $o->id_obat ?>"><?= $o->nama_obat ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('obat', '<small class="text-danger pl-4">', '</small>') ?>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class=" fas fa-arrow-right"></i></button>
                                <button type="submit" class="btn btn-space btn-warning  " style="background-color:#00897b !important"><i class="fas fa-save text-white"></i></button>
                                <?= form_close(); ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end Modal -->


            <!-- Riwayat Rekamedis -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header " style=" background-color: #00897b !important;">
                        <h4 style="font-size: 25px;" class="text-white my-auto">Riwayat Tindakan</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">No Rawat</th>
                                    <th scope="col">ID Dokter</th>
                                    <th scope="col">Tindakan</th>
                                    <th scope="col">Hasil Periksa</th>
                                    <th scope="col">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $riwayat = $this->Base_model->get_data_where('tindakan_balita', 'no_rekamedis', $no_rm)->result();
                                $no = 1;
                                foreach ($riwayat as $d) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $d->no_rawat ?></td>
                                        <td><?php echo $d->id_dokter; ?></td>
                                        <td><?php echo $d->nama_tindakan; ?></td>
                                        <td><?php echo $d->hasil_periksa; ?></td>
                                        <td><?php echo $d->tanggal; ?></td>
                                    </tr>
                                <?php
                            } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
               <!-- end riwayat rekamedis -->

               <!-- Riwayat Rekamedis -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header " style=" background-color: #00897b !important;">
                        <h4 style="font-size: 25px;" class="text-white my-auto">Riwayat Obat</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">No Rawat</th>
                                    <th scope="col">Nama Obat</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Dosis</th>
                                    <th scope="col">Satuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomor=1;
                                foreach ($riwayat as $d) {
                                    ?>
                                    <tr>
                                        <td><?php echo $nomor++; ?></td>
                                        <td><?php echo $d->no_rawat ?></td>
                                        <?php 
                                        $obat=$this->Base_model->get_data_where('obat','id_obat',$d->id_obat)->result();

                                        foreach ($obat as $o) {?>
                                        <td><?php echo $o->nama_obat ?></td>
                                        <td><?php echo $o->jenis_obat ?></td>
                                        <td><?php echo $o->dosis_aturan_obat ?></td>
                                        <td><?php echo $o->satuan?></td>                                          
                                        <?php } ?>
                                        
                                    </tr>
                                <?php
                            } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
               <!-- end riwayat rekamedis -->
        </div>

     


        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->

    </div>
</div>