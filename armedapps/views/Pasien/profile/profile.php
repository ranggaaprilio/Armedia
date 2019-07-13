<?php $this->load->view('pasien/template/sidebar'); ?>
    <div class="col s8 m8">
      <div class="card white">
        <div class="card-content ">
          <span class="card-title">Ubah Data Diri</span>
            <div class="row">
        <form class="col s12" action="<?php echo base_url() ?>application/add_pasien" method="post">
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_prefix" type="text" class="validate" name="name" value="<?= set_value('name') ?>">
              <label for="icon_prefix">Nama Lengkap</label>
               <?= form_error('name', '<small class="red-text pl-4">', '</small>') ?>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">card_membership</i>
              <input id="icon_telephone" type="tel" class="validate" name="ktp" value="<?= set_value('ktp') ?>">
              <label for="icon_telephone">Nomor KTP</label>
               <?= form_error('ktp', '<small class="red-text pl-4">', '</small>') ?>
            </div>
             <div class="input-field col s6">
              <i class="material-icons prefix">location_city</i>
              <input id="icon_telephone" type="tel" class="validate" name="te_lahir" value="<?= set_value('te_lahir') ?>">
              <label for="icon_telephone">Tempat Lahir</label>
               <?= form_error('te_lahir', '<small class="red-text pl-4">', '</small>') ?>
            </div>
             <div class="input-field col s6">
             <input type="text" class="datepicker" name="tanggal" value="<?= set_value('tanggal') ?>">
              <label>Tanggal Lahir</label>
               <?= form_error('tanggal', '<small class="red-text pl-4">', '</small>') ?>
            </div>
             <div class="input-field col s6">
              <i class="material-icons prefix">contact_phone</i>
              <input id="icon_telephone" type="tel" class="validate"  name="telp" value="<?= set_value('telp') ?>">
              <label for="icon_telephone">Telepon</label>
               <?= form_error('telp', '<small class="red-text pl-4">', '</small>') ?>
            </div>
             <div class="input-field col s6">
              <i class="material-icons prefix">location_on</i>
              <input id="icon_telephone" type="tel" class="validate" name="alamat" value="<?= set_value('alamat') ?>">
              <label for="icon_telephone">Alamat</label>
               <?= form_error('alamat', '<small class="red-text pl-4">', '</small>') ?>
            </div>
             <div class="input-field col s6">
              <i class="material-icons prefix">person_pin</i>
              <input id="icon_telephone" type="tel" class="validate" name="pj" value="<?= set_value('pj') ?>">
              <label for="icon_telephone">Penanggung Jawab</label>
               <?= form_error('pj', '<small class="red-text pl-4">', '</small>') ?>
            </div>
             <div class="input-field col s6">
              <i class="material-icons prefix">email</i>
              <input id="icon_telephone" type="tel" class="validate" name="email" value="<?= set_value('email') ?>">
              <label for="icon_telephone">Email</label>
               <?= form_error('email', '<small class="red-text pl-4">', '</small>') ?>
            </div>
          </div>
          <div class="row">
            <div class="col s10 m10"></div>
            <div class="col s12 m12">
              
            </div>
          </div>
      
      </div>
        
        </div>
        <div class="card-action">
         <button type="submit" class="waves-effect waves-light btn">Daftar</button>
        </div>
          </form>
      </div>
        </div>
        <div class="col s8 m8">
      <div class="card white">
        <div class="card-content ">
          <span class="card-title">Ubah Password</span>
            
        </div>
      </div>
    </div>
      </div>
    </div>
   
  
  </div>
  </div>
  