  <div class="navbar-fixed">
    <nav class="teal darken-1 " role="navigation">
      <div class="nav-wrapper container">
        <a id="logo-container" href="#" class="brand-logo"><img src="<?= base_url() ?>assets/img/logo Armedia.png" alt="Logo" width="200" height="65"></a>
        <ul class="right hide-on-med-and-down">
          <li><a class="white-text " href="<?=base_url('pasien/Dashboard') ?>"><i class="fas fa-home"></i> Dashboard</a></li>
          <li><a class="white-text" href="<?= base_url('pasien/pendaftaran/'). $this->session->userdata('id');?>"><i class="fas fa-hospital"></i> Pendaftaran Pemeriksaan</a></li>
          <li><a class="white-text" href="<?=base_url('pasien/history/') ?>"><i class="fas fa-history"> </i>History</a></li>
          <li><a class="white-text" href="<?= base_url() ?>auth/logout"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
        </ul>

        <ul id="nav-mobile" class="sidenav white">
          <li><a href="#">Home</a></li>
          <li><a href="#">Home</a></li>
          <li><a href="#">Pelayanan</a></li>
          <li><a href="#">Tentang Kami</a></li>
          <li><a href="#">Login</a></li>
        </ul>
        <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      </div>
    </nav>
  </div>

  <div class="container">