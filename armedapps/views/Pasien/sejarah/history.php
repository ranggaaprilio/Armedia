<div class="section">
	<div class="row">
		<div class="col s12 m12">
	      <div class="card white">
	        <div class="card-content">
	          <span class="card-title">History Pemeriksaan</span>
	    		<div class="responsive-table">
                            <table class="table table-bordered" id="table-datatable" style="width:100%;">
                                <thead>
                                    <tr>
           
                                        <td>No Rawat</td>
                                        <th>Nama Pasien</th>
                                        <th>Tanggal</th>
                                        <th>Dokter</th>
                                        <th>Kategori</th>
                                        <th>Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($daftar as $u) {
                                        ?>
                                        <tr>
                                            <td><?php echo $u->no_rawat ?></td>
                                            <td><?php
                                                $pasien = $this->Base_model->get_data_where('pasien', 'no_rekamedis', $u->no_rekamedis)->row();
                                                echo $pasien->nama_pasien;
                                                ?></td>
                                            <td><?php echo $u->tanggal_daftar; ?></td>
                                            <td><?php
                                                $dokter = $this->Base_model->get_data_where('dokter', 'id_dokter', $u->id_dokter)->row();
                                                echo $dokter->nama;
                                                ?></td>
                                                <td><?php 
                                               echo  $u->kategori;
                                                 ?></td>
                                            <td>

                                               
                                                <?php if ($u->status=='1') {?>
                                                    <a class="waves-effect waves-light btn blue"><i class=" fas fa-check"></i></a>
                                                     <a href="<?php echo base_url() . 'pasien/lihat_obat/' . $u->no_rawat ?>" class="waves-effect waves-light btn disabled"><i class="fa fa-medkit"></i></a>
                                                <?php } else {?>
                                                    <button class="btn btn-primary btn-xs"><i class="fas fa-clipboard-check"> Selesai</i></button>
                                                     <a href="<?php echo base_url() . 'pasien/lihat_obat/' . $u->no_rawat ?>" class="waves-effect waves-light btn red"><i class="fa fa-medkit"></i></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php
                                } ?>
                                </tbody>
                            </table>
                        </div>
                 </div>
	      </div>
	    </div>
	</div>
</div>