  <div class="section">
    <div class="row">
      <div class="col s4 m4">
        <div class="card teal">
          <div class="card-image">
            <?php $pasien = $this->db->get_where('pasien', ['no_rekamedis' => $this->session->userdata('id')])->row(); ?>
            <img src="<?php echo base_url('assets/img/user/') . $pasien->foto; ?>" height="100" width="100" class="responsive-img">
            <button data-target="modal1" class=" modal-trigger btn-floating halfway-fab waves-effect waves-light red"><i class="fas fa-plus"></i></button>
            <!-- <a class="btn-floating halfway-fab waves-effect waves-light red" href="<?= base_url('Pasien/dashboard/#modal1') ?>"><i class="fas fa-plus"></i></a> -->
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
      <!-- Modal Structure -->
      <div id="modal1" class="modal">
        <div class="modal-content">
          <h4>Ganti Foto Profil</h4>
          <form action="<?php echo base_url('pasien/upload_foto') ?>" method="post" enctype="multipart/form-data">
            <div class="file-field input-field">
              <div class="btn">
                <span>File</span>
                <input type="file" name="foto">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" name="img">
              </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="modal-close waves-effect waves-green btn-flat">Submit</button>
        </div>
        </form>
      </div>