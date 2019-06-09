 <div class="row">
  <div class="col s12 m3"></div>
    <div class="col s12 m6">
      <div class="card white">
        <div class="card-content">
          <span class="card-title">Silahkan Tambah data anak</span>
          <form action="<?= base_url('pasien/tambah') ?>" method="post">
      <div class="row">
        <div class="input-field col s6">
          <input id="first_name" type="text" class="validate" name="depan">
          <label for="first_name">Nama Depan</label>
          <?= form_error('depan', '<small class="red-text pl-4">', '</small>') ?>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate" name="belakang">
          <label for="last_name">Nama Belakang</label>
          <?= form_error('belakang', '<small class="red-text pl-4">', '</small>') ?>
        </div>
      </div>
      <div class="row">
      <div class="input-field col s12">
      <input type="text" class="datepicker" name="tanggal">
      <label for="tanggal lahir">Tanggal Lahir</label>
      <?= form_error('tanggal', '<small class="red-text pl-4">', '</small>') ?>
      </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
            <select name="jekel">
              <option value="" disabled selected>Choose your option</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
            </select>
            <label>Pilih Jenis kelamin</label>
            <?= form_error('jekel', '<small class="red-text pl-4">', '</small>') ?>
          </div>
      </div>
   
        </div>
        <div class="card-action">
          <button type="submit" class="btn">Simpan</button>
        </div>
      </form>
      </div>
    </div>
    <div class="col s12 m3"></div>
  </div>