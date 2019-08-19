<!-- Content Header (Page header) -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="card">
              <div class="card-header">
                <h2>Halaman Profile Anda</h2>
              </div>
              <div class="card-body">
                <div class="jumbotron jumbotron-fluid">
                  <div class="container">
                    <?php foreach ($dokter as $o) {?>
                    <div class="row">
                        <div class="col-md-4 col-sm-04 "></div>
                        <div class="col-md-4 col-sm-04 ">
                            <img src="<?php echo base_url('assets/img/user/').$o->foto ?>" alt="Tidak ada gambar" class="rounded-circle " height=300px width=300px>  
                        </div>
                        <div class="col-md-4 col-sm-04 "></div>                
                    </div>
                   <div class="row">
                        <div class="col-md-4 col-sm-04 "></div>
                        <div class="col-md-7 col-sm-07 "></div>
                        <div class="col-md-1 col-sm-01 ">
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            Ubah Data
                          </button> 
                        </div>                
                    </div>
                  </div>
                </div>
                 <hr>
                <form>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label " style="font-size: 2rem">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext " id="staticEmail" value="<?= $o->nama ?>" style="font-size: 2rem">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label" style="font-size: 2rem">Email</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext  " id="staticEmail" value="<?= $o->email ?>" style="font-size: 2rem">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label" style="font-size: 2rem">Alamat</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext  " id="staticEmail" value="<?= $o->alamat ?>" style="font-size: 2rem">
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label" style="font-size: 2rem">No Telepon</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext  " id="staticEmail" value="<?= $o->no_telp ?>" style="font-size: 2rem">
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label" style="font-size: 2rem">Status</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext  " id="staticEmail" value="dokter" style="font-size: 2rem">
                    </div>
                  </div>
                  
                </form>
                <?php } ?>
              </div>
            </div>  

            <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Biodata</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <?php
                        foreach ($dokter as $e) {
                            ?>
                         <form action="<?= base_url('dokter/update_profile') ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo $e->id_dokter ?>" name="id">
                          <!-- Nama Lengkap -->
                            <div class="form-group">
                                <label for="inputUserName">Nama Lengkap</label>
                                <input id="inputUserName" type="text" name="name" placeholder="Masukan Nama Lengkap" autocomplete="off" class="form-control" value="<?php echo $e->nama ?>">
                                <?= form_error('name', '<small class="text-danger pl-4">', '</small>') ?>
                            </div>
                            <!-- Email -->
                            <div class="form-group">
                                <label>Alamat Email</label>
                                <input type="text" name="email" placeholder="Masukan Email" class="form-control" autocomplete="off" value="<?php echo $e->email ?>">
                                <?= form_error('email', '<small class="text-danger pl-4">', '</small>') ?>
                            </div>
                            <!-- No Telepon -->
                            <div class="form-group">
                                <label for="No_telp">No.Telepon</label>
                                <input id="InputNo_telp" type="text" name="telp" placeholder="Masukan Nomor Telepon" autocomplete="off" class="form-control" value="<?= $e->no_telp ?>">
                                <?= form_error('telp', '<small class="text-danger pl-4">', '</small>') ?>
                            </div>
                            <!-- Alamat -->
                            <div class="form-group">
                                <label for="input-select">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="10" rows="5" class="form-control" placeholder="Masukan Alamat"><?= $e->alamat ?></textarea>
                                <?= form_error('alamat', '<small class="text-danger pl-4">', '</small>') ?>
                            </div>
                            <!-- Foto -->
                             <div class="form-group">
                               <label>Ganti foto</label>
                                  <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="customFile" name="foto">
                                    <label class="custom-file-label" for="customFile"><?php echo $e->foto ?></label>
                                  </div>
                                <?= form_error('foto', '<small class="text-danger pl-4">', '</small>') ?>
                            </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-space  " style="background-color:#00897b !important"><i class="fas fa-save text-white"></i></button>
                         <?= form_close(); ?>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->

        </div>
    </div>