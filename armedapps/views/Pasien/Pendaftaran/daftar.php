<div class="section">
	<form action="" class="col 12">
		<div class="row">
		<div class="col s12 m6">
	      <div class="card white">
	        <div class="card-content">
	          <span class="card-title">Lakukan Pendaftaran</span>
	         <div class="row">
	         	<div class="input-field col s12">
				    <select>
				      <option value="" disabled selected>Choose your option</option>
				      <?php foreach ($dokter as $d) {?>
				      	<option value="<?= $d->id_dokter ?>"><?= $d->nama ?></option>
				     <?php } ?>
				    </select>
				    <label>Pilih Dokter</label>
				  </div>
	         </div>
	         <div class="">
	         	 <label for="">Tentukan Tanggal</label>
	         	 <input type="text" class="datepicker" placeholder="Input tanggal pemeriksaan">
	         </div>
	          <div class="row">
	         	<div class="input-field col s12">
				    <select>
				      <option value="" disabled selected>Choose your option</option>
				      <option value="1">Option 1</option>
				      <option value="2">Option 2</option>
				      <option value="3">Option 3</option>
				    </select>
				    <label>Pilih Kategori</label>
				  </div>
	         </div>
	        </div>
	        <div class="card-action">
	          <a href="#" class="waves-effect waves-light btn-small">Daftar</a>
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
		          <input disabled value="<?= $p->no_rekamedis ?>" id="disabled" type="text" class="validate">
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
		          <label for="no_rm">Alamat</label>
		        </div>
		      </div>
		      <div class="row">
		        <div class="input-field col s12">
		          <input disabled value="<?= $p->no_telp ?>" id="disabled" type="text" class="validate">
		          <label for="no_rm">No telepon</label>
		        </div>
		      </div>
	         <?php } ?>
	          
	        </div>
	      </div>
	    </div>
	</div>
	</form>
	
</div>