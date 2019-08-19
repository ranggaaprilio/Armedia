<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <!-- biodata Pasien -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header " style=" background-color: #00897b !important;">
                        <h4 style="font-size: 25px;" class="text-white my-auto">Pilih Anak</h4>
                    </div>
                    <div class="card-body">
                       <form action="<?php echo base_url('superadmin/get_data/') .$no_rawat?>" method="post">
                           <?php 
                        $no_rm=$daftar->no_rekamedis ;
                        $where=['no_rekamedis'=>$no_rm];
                        $anak=$this->db->get_where('balita',$where)->result();
                        ?>
                        <input type="hidden" value="<?php echo $no_rawat ?>" name="no_rawat">
                         <div class="form-group">
                        <label for="">Pilih anak</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="id_balita">
                            <option value="" disabled selected>-Pilih-</option>
                            <?php foreach ($anak as $key ) { ?>
                                <option value="<?= $key->id_balita ?>"><?= $key->nama ?></option>
                          <?php  } ?>
                        </select>
                      </div>
                           <button type="submit" class="btn btn-primary">Submit</button>
                       </form>
                        
                        
                        
                    </div>
                </div>
            </div>
            <!-- end biodata pasien -->    
            
        </div>

     


        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->

    </div>
</div>