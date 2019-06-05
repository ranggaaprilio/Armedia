  <!-- Page Content -->
  <div class="section">
    <div class="row">
    <div class="col s4 m4">
      <div class="card  blue-grey darken-1">
        <div class="card-image">
          <img src="<?php echo base_url('assets/img/user/').$this->session->userdata('foto'); ?>" height="100" width="100" class="responsive-img">
          <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="fas fa-plus"></i></a>
        </div>
        <div class="card-content white-text">
          <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
        </div>
      </div>
    </div>
    <div class="col s8 m8">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">Selamat Datang <?php echo $this->session->userdata('nama'); ?></span>
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
         <a class="waves-effect waves-light btn-small">Button</a>
         <a class="waves-effect waves-light btn-small">Button</a>
        </div>
      </div>
    </div>
  </div>
  </div>
  