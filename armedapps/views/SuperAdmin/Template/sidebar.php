        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark bg-white">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none text-dark" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider text-dark">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-white mb-1 btn-rounded" style="background-color:#00897b !important" href="<?= base_url('SuperAdmin') ?>"><i class="fa fa-fw fa-desktop text-white"></i>Dashboard <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white mb-1 btn-rounded" style="background-color:#00897b !important" href="<?= base_url('SuperAdmin/Daftar_admin') ?>"><i class="fa fa-user-circle text-white"></i>Kelola Admin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white mb-1 btn-rounded" style="background-color:#00897b !important" href="<?= base_url('SuperAdmin/Data_dokter') ?>"><i class=" fas fa-user-md text-white"></i>Data Dokter</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white mb-1 btn-rounded" style="background-color:#00897b !important" href="<?= base_url('SuperAdmin/Data_obat') ?>"><i class=" fas fa-flask text-white"></i>Data Obat</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white mb-1 btn-rounded" style="background-color:#00897b !important" href="<?= base_url('SuperAdmin/jadwal_dokter') ?>"><i class="fas fa-clock text-white"></i>Jadwal Dokter</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white mb-1 btn-rounded" style="background-color:#00897b !important" href="<?= base_url('SuperAdmin/Data_pasien') ?>"><i class=" fas fa-users text-white"></i>Data Pasien</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white mb-1 btn-rounded" style="background-color:#00897b !important" href="<?= base_url('SuperAdmin/Data_pendaftaran') ?>"><i class=" far fa-list-alt text-white"></i>Data Pendafaran</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white mb-1 btn-rounded" style="background-color:#00897b !important" href="<?= base_url('SuperAdmin/Data_tindakan') ?>"><i class=" fas fa-file-medical text-white"></i>Data Tindakan</a>
                            </li>
                              <a class="nav-link text-white mb-1 btn-rounded" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2" style="background-color:#00897b !important"><i class="fa fa-fw fa-rocket text-white"></i>Laporan</a>
                                <div id="submenu-2" class="collapse submenu" style="background-color:#00897b !important">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link text-white" href="pages/cards.html">Laporan Data Pasien</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-white" href="pages/general.html">Laporan Data Kunjungan</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->