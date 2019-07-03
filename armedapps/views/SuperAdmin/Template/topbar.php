</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg fixed-top" style="background-color:#00897b !important">
                <a id="logo-container" href="#" class="brand-logo mx-4"><img src="<?= base_url() ?>assets/img/logo armedia.png" alt="Logo" width="200" height="65"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        
                       
                        
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url('assets/img/user/').$this->session->userdata('foto'); ?>" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info" style="background-color: #00897b !important">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $this->session->userdata('nama'); ?></h5>
                                    <span class="status"></span><span class="ml-2">Aktif</span>
                                </div>
                                <a class="dropdown-item" href="<?php echo base_url('Superadmin/account/').$this->session->userdata('id'); ?>"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="fas fa-cog mr-2"></i>Change Password</a>
                                <a class="dropdown-item" href="<?php echo base_url() ?>auth/logout"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <!-- modal Ganti Password -->

<!-- Modal -->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
   
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Ganti Password</h5>
         </div>

         <div class="modal-body">
            <form action="superadmin/g_pass" method="post">
             <div class="col-md-9">
                <input type="hidden" value="<?php echo $this->session->userdata('id');?>" name="id">
                    <!-- password -->
                    <div class="form-group">
                    <label for="inputPassword">New Password</label>
                    <input id="inputPassword" type="password" placeholder="Password" class="form-control" name="password1">
                    <?= form_error('password1', '<small class="text-danger pl-4">', '</small>') ?>
                    </div>
                    </div>
                    <div class="col-md-9">
                    <!-- Repeat Password -->             
                    <div class="form-group">
                     <label for="inputRepeatPassword">Repeat Password</label>
                     <input id="inputRepeatPassword" data-parsley-equalto="#inputPassword" type="password" placeholder="Ulangi Password" class="form-control" name="password2">
                     <?= form_error('password2', '<small class="text-danger pl-4">', '</small>') ?>

                    </div>
                    </div>
                    <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class=" fas fa-arrow-right"></i></button>
                                <button type="submit" class="btn btn-warning  " style="background-color:#00897b !important"><i class="fas fa-save text-white"></i></button>
                                </form>
                    </div>
         </div>
        
         
       
    </div>
  </div>
</div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->