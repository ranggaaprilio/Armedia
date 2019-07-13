  <div class="section">
    <div class="row">
    <div class="col s4 m4">
      <div class="card teal">
        <div class="card-image">
          <img src="<?php echo base_url('assets/img/user/').$this->session->userdata('foto'); ?>" height="100" width="100" class="responsive-img">
          <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="fas fa-plus"></i></a>
        </div>
        <div class="card-content white-text">
          <h5>Menu</h5>
          <div class="collection">
            <a href="<?php echo base_url('pasien/r_obat') ?>" class="collection-item">Riwayat Obat</a>
            <a href="<?php echo base_url('pasien/data_anak') ?>" class="collection-item">Data Anak</a>
            <a href="<?php echo base_url('pasien/cek_jadwal') ?>" class="collection-item">Cek Jadwal Dokter</a>
             <a href="<?php echo base_url('pasien/ubah_data_diri') ?>" class="collection-item">Ubah Data Diri</a>
          </div>
          <br>
          <br>

          <!-- <p>copyright Armedia.All right reserved</p> -->
        </div>
      </div>
    </div>
