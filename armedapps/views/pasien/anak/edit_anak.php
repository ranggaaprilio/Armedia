 <div class="row">
  <div class="col s12 m3"></div>
    <div class="col s12 m6">
      <div class="card white">
        <div class="card-content">
          <span class="card-title">Silahkan Edit data anak</span>
          <form action="<?= base_url('pasien/update_anak') ?>" method="post">
             <input type="hidden" value="<?php echo $edit->id_balita ?>" name="id">
      <div class="row">
        <div class="input-field col s12">
          <input id="first_name" type="text" class="validate" name="nama" value="<?php echo $edit->nama ?>">
          <label for="first_name">Nama Lengkap</label>
          <?= form_error('nama', '<small class="red-text pl-4">', '</small>') ?>
        </div>
      </div>
      <div class="row">
      <div class="input-field col s12">
      <input type="text" class="datepicker" name="tanggal" value="<?php echo $edit->tanggal_lahir ?>">
      <label for="tanggal lahir">Tanggal Lahir</label>
      <?= form_error('tanggal', '<small class="red-text pl-4">', '</small>') ?>
      </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
         
            <select name="jekel">
            <?php if ($edit->jekel=='Laki-laki') {?>
            <option value="" disabled selected>Choose your option</option>
            <option value="Laki-laki" selected>Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
         <?php } else { ?>
            <option value="" disabled selected>Choose your option</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan"selected>Perempuan</option>
        <?php  }
           ?>
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