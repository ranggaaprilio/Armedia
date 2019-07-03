<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Laporan Kunjungan Pemeriksaan</h2>
                        <p class="pageheader-text">Aplikasi Rekam Medis dan Diagnosa</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Data Pasien</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>

         <div class="card">
          <div class="card-body">
            <form action="<?php echo base_url() ?>superadmin/laporan_kunjungan" method ="post">
             <!-- Tanggal Mulai-->
                 <div class="form-group">
                     <label for="input-select">Dari Tanggal</label>
                         <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                             <input type="text" name="dari" class="form-control datetimepicker-input" data-target="#datetimepicker4" />
                              <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                 <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                              </div>
                         </div>
                     <?= form_error('dari', '<small class="text-danger pl-4">', '</small>') ?>
                 </div>
                 
                  <!-- Tanggal Akhir -->
                 <div class="form-group">
                     <label for="input-select">Sampai Tanggal</label>
                         <div class="input-group date" id="datetimepicker44" data-target-input="nearest">
                             <input type="text" name="sampai" class="form-control datetimepicker-input" data-target="#datetimepicker44" />
                              <div class="input-group-append" data-target="#datetimepicker44" data-toggle="datetimepicker">
                                 <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                              </div>
                         </div>
                     <?= form_error('sampai', '<small class="text-danger pl-4">', '</small>') ?>
                 </div>
              
                         <button type="submit" class="btn btn-primary">Cari</button>
                </form>
          </div>
          </div>
        </div>

            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->

        </div>
    </div>