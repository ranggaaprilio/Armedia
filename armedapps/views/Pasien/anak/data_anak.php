  <!-- Page Content -->
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('alert'); ?>"></div>
  <?php $this->load->view('pasien/template/sidebar'); ?>
    <div class="col s8 m8">
      <div class="card white">
        <div class="card-content">
          <span class="card-title">Selamat Datang <?php echo $this->session->userdata('nama'); ?></span>
        </div>
      
      </div>
    </div>
    <div class="col s8 m8">
      <div class="card white">
        <div class="card-content">
          <span class="card-title"><a href="<?php echo base_url('pasien/add_balita') ?>" class="waves-effect waves-light btn-small">Tambah Data Anak</a></span>
          <hr>
          <div class="responsive-table">
                            <table class="table table-striped table-bordered" id="table-datatable" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($balita as $u) {
                                        ?>
                                        <tr>

                                            <td><?php echo $u->nama ?></td>
                                            <td><?php echo $u->tanggal_lahir; ?></td>
                                            <td><?php echo $u->jekel ?></td>
                                             <td>
                                                <a href="<?php echo base_url() . 'pasien/edit_data/' . $u->id_balita ?>" class="btn blue smal"><i class="fa fa-edit"></i></a>
                                                <a href="<?php echo base_url() . 'pasien/delete_data/' . $u->id_balita ?>" class="btn small red "><i class="fa fa-trash"></i></a>
                                                <a href="<?php echo base_url() . 'pasien/rb_obat/' . $u->id_balita ?>" class="btn small"><i class="fa fa-medkit"></i></a>
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
  </div>
  </div>
  