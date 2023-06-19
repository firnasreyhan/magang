<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-tasks"></i>
        </div>
        <div class="sidebar-brand-text mx-3">MAGANG</div>
    </a>

    <?php if ($this->session->userdata('role') == "Admin") { ?>

        <!-- Divider -->
        <!-- <hr class="sidebar-divider my-0"> -->

        <!-- Nav Item - Dashboard -->
        <!-- <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li> -->

        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('dashboardDosen') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Manajemen
        </div>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('daftarPerusahaan') ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Daftar Perusahaan</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('jeniskegiatan') ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Jenis Kegiatan</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('lingkupkegiatan') ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Lingkup Kegiatan</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('perankegiatan') ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Peran Kegiatan</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('user') ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>User</span></a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li> -->

        <!-- Nav Item - Utilities Collapse Menu -->
        <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li> -->

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Validasi
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li> -->

        <!-- Nav Item - Charts -->
        <!-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li> -->

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('kegiatan') ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Validasi Kegiatan</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('tugaskhusus') ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Validasi Tugas Khusus</span></a>
        </li>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Riwayat
        </div>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('riwayatTugasKhusus') ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Riwayat Tugas Khusus</span></a>
        </li>

    <?php } else if ($this->session->userdata('role') == "Dosen") { ?>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('dashboardDosen') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Manajemen
        </div>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('bimbinganDosen') ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Daftar Bimbingan</span></a>
        </li>

    <?php } else if ($this->session->userdata('role') == "Perusahaan") { ?>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('dashboardPerusahaan') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Manajemen
        </div>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('lowonganPerusahaan') ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Daftar Lowongan</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('daftarMahasiswaMagang') ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Daftar Mahasiswa</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('daftarAbsenMahasiswaMagang') ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Daftar Absen</span></a>
        </li>

    <?php } else if ($this->session->userdata('role') == "Mahasiswa") { ?>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('dashboardMahasiswa') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Manajemen
        </div>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('lowonganMahasiswa') ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Daftar Lowongan</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('riwayatLamaran') ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Riwayat Lamaran</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('absenMagangMahasiswa') ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Absen Magang</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('bimbinganMahasiswa') ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Bimbingan Magang</span></a>
        </li>

    <?php } ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">