<?php $this->load->view('pasien/template/sidebar'); ?>
    <div class="col s8 m8">
      <div class="card white">
        <div class="card-content ">
          <span class="card-title">Riwayat Obat atas nama <?php echo $this->session->userdata('nama'); ?></span>
           <div class="responsive-table">
                            <table class="table table-striped table-bordered" id="table-datatable" style="width:100%;">
                                <thead>
                                    <tr>
                                      <th scope="col">No</th>
                                      <th scope="col">No Rawat</th>
                                      <th scope="col">Nama Obat</th>
                                      <th scope="col">Jenis</th>
                                      <th scope="col">Dosis</th>
                                      <th scope="col">Satuan</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                        $where = array('no_rekamedis' => $this->session->userdata('id') ,'kategori'=>'Dewasa');

                        $temp=$this->Base_model->edit_data($where,'temp_obat')->result();
                        $no=1;
                        foreach ($temp as $t ) {
                            $id_obat=$t->id_obat;
                            $obat=$this->Base_model->get_data_where('obat','id_obat',$id_obat)->result();

                            foreach ($obat as $o) {?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $t->no_rawat ?></td>
                                    <td><?php echo $o->nama_obat ?></td>
                                    <td><?php echo $o->jenis_obat ?></td>
                                    <td><?php echo $o->dosis_aturan_obat ?></td>
                                    <td><?php echo $o->satuan?></td>   

                                </tr>
                                
                                      
                          <?php  }
                        }

                          ?>
                                </tbody>
                            </table>
                        </div>
        </div>
      </div>
    </div>
   
  </div>
  </div>
  