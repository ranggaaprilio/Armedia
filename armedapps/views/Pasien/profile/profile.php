<?php $this->load->view('pasien/template/sidebar'); ?>
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('alert'); ?>"></div>
<div class="col s8 m8">
  <div class="card white">
    <div class="card-content ">
      <span class="card-title">Ubah Data Diri</span>
      <div class="row">
        <form class="col s12" action="<?php echo base_url() ?>pasien/update_data" method="post">
          <input type="hidden" value="<?php echo $pasien->no_rekamedis ?>" name="no_rm">
          <?php $no_rm = $pasien->no_rekamedis ?>
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_prefix" type="text" class="validate" name="name" value="<?php echo $pasien->nama_pasien ?>">
              <label for="icon_prefix">Nama Lengkap</label>
              <?= form_error('name', '<small class="red-text pl-4">', '</small>') ?>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">card_membership</i>
              <input id="icon_telephone" type="tel" class="validate" name="ktp" value="<?php echo $pasien->no_ktp ?>">
              <label for="icon_telephone">Nomor KTP</label>
              <?= form_error('ktp', '<small class="red-text pl-4">', '</small>') ?>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">location_city</i>
              <input id="icon_telephone" type="tel" class="validate" name="te_lahir" value="<?php echo $pasien->tempat_lahir ?>">
              <label for="icon_telephone">Tempat Lahir</label>
              <?= form_error('te_lahir', '<small class="red-text pl-4">', '</small>') ?>
            </div>
            <div class="input-field col s6">
              <input type="text" class="datepicker" name="tanggal" value="<?php echo $pasien->tanggal_lahir ?>">
              <label>Tanggal Lahir</label>
              <?= form_error('tanggal', '<small class="red-text pl-4">', '</small>') ?>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">contact_phone</i>
              <input id="icon_telephone" type="tel" class="validate" name="telp" value="<?php echo $pasien->no_telp ?>">
              <label for="icon_telephone">Telepon</label>
              <?= form_error('telp', '<small class="red-text pl-4">', '</small>') ?>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">location_on</i>
              <input id="icon_telephone" type="tel" class="validate" name="alamat" value="<?php echo $pasien->alamat ?>">
              <label for="icon_telephone">Alamat</label>
              <?= form_error('alamat', '<small class="red-text pl-4">', '</small>') ?>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">person_pin</i>
              <input id="icon_telephone" type="tel" class="validate" name="pj" value="<?php echo $pasien->pj ?>">
              <label for="icon_telephone">Penanggung Jawab</label>
              <?= form_error('pj', '<small class="red-text pl-4">', '</small>') ?>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">email</i>
              <input id="icon_telephone" type="tel" class="validate" name="email" value="<?php echo $pasien->email ?>">
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
      <button type="submit" class="waves-effect waves-light btn">Update</button>
    </div>
    </form>
  </div>
</div>
<div class="col s8 m8">
  <div class="card white">
    <div class="card-content ">
      <span class="card-title">Ubah Password</span>
      <form class="" action="<?php echo base_url('pasien/ubah_pass/') ?>" method="post">
        <div class="row">
          <input type="hidden" value="<?php echo $pasien->no_rekamedis ?>" name="no_rm">
          <div class="input-field col s6">
            <i class="material-icons prefix">edit</i>
            <input id="icon_telephone" type="password" class="validate" name="password1">
            <label for="icon_telephone">Password</label>
            <?= form_error('password1', '<small class="red-text pl-4">', '</small>') ?>
          </div>
          <div class="input-field col s6">
            <i class="material-icons prefix">edit</i>
            <input id="icon_telephone" type="password" class="validate" name="password2">
            <label for="icon_telephone">Re-type Password</label>
            <?= form_error('password2', '<small class="red-text pl-4">', '</small>') ?>
          </div>
        </div>
        <div class="card-action">
          <button type="submit" class="waves-effect waves-light btn">Ubah Password</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>


</div>
</div>