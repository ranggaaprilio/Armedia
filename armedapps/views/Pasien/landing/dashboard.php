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
          <span class="card-title">Lihat Antrian Berdasarkan Dokter</span>
          <div class="row"> 
         <form method="post" action="<?php echo base_url('pasien/show') ?>">
              <div class="input-field col s12 m12">
                <select id="id" name="id">
                  <option value="" disabled selected>Choose your option</option>
                   <?php foreach ($dokter as $d) { ?>
                    <option value="<?php echo $d->id_dokter ?>"><?php echo $d->nama  ?></option>
                  <?php } ?>
                </select>
                <label>Pilih Dokter</label>
              </div>
              <div class="col s0 m10">
              </div>
              <div class="col s0 m2">
                <button class="waves-effect waves-light btn blue">Cari</button>
              </div>
          </form>
          </div>
        </div>
      </div>
    </div>
    <?php if ($daftar != 0) {?>
     <div class="col s8 m8">
      <div class="card white">
        <div class="card-content">
          <span class="card-title">Daftar Antrian Hari ini</span>
          <div class="responsive-table">
                            <table class="table table-striped table-bordered" id="table-datatable" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No Rawat</th>
                                        <th>Tanggal</th>
                                        <th>Dokter</th>
                                        <th>Status</th>
                                  
                                    </tr>
                                </thead>
                                <tbody id=daftar>
                                 <?php
                                    $no = 1;
                                    foreach ($daftar as $u) {
                                        ?>
                                        <tr>

                                            <td><?php echo $u->no_rawat ?></td>
                                            <td><?php echo $u->tanggal_daftar; ?></td>
                                            <td><?php
                                                $dokter = $this->Base_model->get_data_where('dokter', 'id_dokter', $u->id_dokter)->row();
                                                echo $dokter->nama;
                                                ?></td>
                                            <td> 
                                                <?php if ($u->status=='1') {?>
                                                    <a class="waves-effect waves-light btn blue"><i class=" fas fa-clock"></i> Waiting</a>
                                                <?php } else {?>
                                                    <button class="btn btn-primary btn-xs"><i class="fas fa-clipboard-check"> Selesai</i></button>
                                                <?php } ?></td>
                                        </tr>
                                    <?php
                                } ?>
                                </tbody>
                            </table>
                        </div>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
  </div>
  