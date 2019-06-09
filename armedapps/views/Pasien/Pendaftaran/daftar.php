<div class="section">
	<form action="<?php echo base_url('pasien/add_daftar') ?>" class="col 12" method="post">
		<div class="row">
		<div class="col s12 m6">
	      <div class="card white">
	        <div class="card-content">
	          <span class="card-title">Lakukan Pendaftaran</span>
	         <div class="row">
	         	<div class="input-field col s12">
				    <select name="id">
				      <option value="" disabled selected>Choose your option</option>
				      <?php foreach ($dokter as $d) {?>
				      	<option value="<?= $d->id_dokter ?>"><?= $d->nama ?></option>
				     <?php } ?>
				    </select>
				    <label>Pilih Dokter</label>
				    <?= form_error('id', '<small class="red-text pl-4">', '</small>') ?>
				  </div>	   
	         </div>
	         <div class="">
	         	 <label for="">Tentukan Tanggal</label>
	         	 <input type="text" class="datepicker" placeholder="Input tanggal pemeriksaan" name="tanggal_d">
	         	 <?= form_error('tanggal_d', '<small class="red-text pl-4">', '</small>') ?>
	         </div>
	          <div class="row">
	         	<div class="input-field col s12">
				    <select name="kategori">
				      <option value="" disabled selected>Choose your option</option>
				      <option value="Dewasa">Dewasa</option>
                      <option value="Balita">Balita</option>
				    </select>
				    <label>Pilih Kategori</label>
				      <?= form_error('kategori', '<small class="red-text pl-4">', '</small>') ?>
				  </div>	
	         </div>
	        </div>
	        <div class="card-action">
	           <button type="submit" class="waves-effect waves-light btn-small">Daftar</button>
	          <a href="#" class="waves-effect waves-light btn-small">Batal</a>
	        </div>
	      </div>
	    </div>
	    <div class="col s12 m6">
	      <div class="card white">
	        <div class="card-content">
	          <span class="card-title">Data Pasien</span>
	          <?php foreach ($pasien as $p) {?>
	          <div class="row">
		        <div class="input-field col s12">
		          <input disabled value="<?= $p->no_rekamedis ?>" id="disabled" type="text" class="validate" name="no_rm">
		          <label for="no_rm">No Rekamedis</label>
		        </div>
		      </div>
		      <div class="row">
		        <div class="input-field col s12">
		          <input disabled value="<?= $p->nama_pasien ?>" id="disabled" type="text" class="validate">
		          <label for="nama">Nama Pasien</label>
		        </div>
		      </div>
		      <div class="row">
		        <div class="input-field col s6">
		          <input disabled value="<?= $p->tempat_lahir ?>" id="disabled" type="text" class="validate">
					<label for="Tm">Tempat lahir</label>
		        </div>
		      <!-- </div> -->
		      <!-- <div class="row"> -->
		        <div class="input-field col s6">
		          <input disabled value="<?= $p->tanggal_lahir ?>" id="disabled" type="text" class="validate">
		          <label for="Tanggal">Tanggal Lahir</label>
		        </div>
		      </div>
		      <div class="row">
		        <div class="input-field col s12">
		          <input disabled value="<?= $p->alamat ?>" id="disabled" type="text" class="validate">
		          <label for="alamat">Alamat</label>
		        </div>
		      </div>
		      <div class="row">
		        <div class="input-field col s12">
		          <input disabled value="<?= $p->no_telp ?>" id="disabled" type="text" class="validate">
		          <label for="no_telp">No telepon</label>
		        </div>
		      </div>
	         <?php } ?>
	          
	        </div>
	      </div>
	    </div>
	</div>
	</form>
	
</div>