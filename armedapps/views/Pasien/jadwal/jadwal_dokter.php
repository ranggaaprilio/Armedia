  <!-- Page Content -->
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('alert'); ?>"></div>
  <?php $this->load->view('pasien/template/sidebar'); ?>
    <div class="col s8 m8">
      <div class="card white">
        <div class="card-content">
          <span class="card-title">Selamat Datang <?php echo $this->session->userdata('nama'); ?></span>
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
         <a class="waves-effect waves-light btn-small">Ubah Data Diri</a>
        </div>
      </div>
    </div>
    <div class="col s8 m8">
      <div class="card white">
        <div class="card-content">
          <span class="card-title">Jadwal Dokter</span>
          <div class="responsive-table">
                            <table class="table table-striped table-bordered" id="table-datatable" style="width:100%;">
                              <tr>
                                        <th>No</th>
                                        <th>ID Dokter</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Jam Mulai</th>
                                        <th>Jam Akhir</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($jadwal as $j) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $j->id_dokter ?></td>
                                            <td><?php echo $j->nama; ?></td>
                                            <td><?php echo $j->tanggal; ?></td>
                                            <td><?php echo $j->jam_mulai; ?></td>
                                            <td><?php echo $j->jam_akhir; ?></td>
                                            
                                        </tr>
                                    <?php
                                } ?>
                            </table>
                        </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  