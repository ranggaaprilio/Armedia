<div class="section">
	<div class="row">
		<div class="col s12 m12">
	      <div class="card white">
	        <div class="card-content">
	          <span class="card-title">No. Rawat: <?php echo $id; ?></span>
              <span><hr></span>
	    		<table class="responsive-table">
                  <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Obat</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Satuan</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;foreach ($riwayat as $r) {
                    $id_obat=$r->id_obat;
                    $obat=$this->Base_model->get_data_where('obat','id_obat',$id_obat)->result(); 
                    foreach ($obat as $o) {
                    ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $o->nama_obat ?></td>
                        <td><?php echo $o->jenis_obat ?></td>
                        <td><?php echo $o->satuan?></td>  
                      </tr>
                    <?php }
                    }
                     ?>
                </tbody>
                </table>
            </div>
	      </div>
	    </div>
	</div>
</div>