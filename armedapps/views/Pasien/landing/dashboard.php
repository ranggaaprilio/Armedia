  <!-- Page Content -->
  <div class="section">
    <div class="row">
    <div class="col s4 m4">
      <div class="card teal">
        <div class="card-image">
          <img src="<?php echo base_url('assets/img/user/').$this->session->userdata('foto'); ?>" height="100" width="100" class="responsive-img">
          <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="fas fa-plus"></i></a>
        </div>
        <div class="card-content white-text">
          <div class="collection">
            <a href="#!" class="collection-item">Riwayat Obat</a>
            <a href="#!" class="collection-item">Data Anak</a>
            <a href="#!" class="collection-item">Cek Jadwal Dokter</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col s8 m8">
      <div class="card white">
        <div class="card-content">
          <span class="card-title">Selamat Datang <?php echo $this->session->userdata('nama'); ?></span>
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
         <a class="waves-effect waves-light btn-small">Ubah Data Diri</a>
        </div>
      </div>
    </div>
  </div>
  </div>
  