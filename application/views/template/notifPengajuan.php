<?php
$dataPengajuan      = $this->db->query('SELECT * FROM mahasiswa WHERE STATUS = 0 ORDER BY TANGGAL_VALIDASI DESC LIMIT 3')->result();
$countDataPengajuan = $this->db->query('SELECT * FROM mahasiswa WHERE STATUS = 0')->num_rows();
if ($this->session->userdata('role') == "Admin") {
?>
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <!-- Counter - Alerts -->
        <span class="badge badge-danger badge-counter"><?php echo $countDataPengajuan; ?></span>
    </a>
    <?php if ($countDataPengajuan > 0) { ?>
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
                Alerts Center
            </h6>
            <?php foreach ($dataPengajuan as $data) { ?>
                <a class="dropdown-item d-flex align-items-center notifikasi" href="<?php echo site_url('tugaskhusus') ?>">
                    <!-- <a class="dropdown-item d-flex align-items-center notifikasi" href="http://facebook.com"> -->
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="font-weight-bold">NRP <?php echo $data->NRP ?></div>
                        <span class="small text-gray-500">Mengajukan Validasi Tugas Khusus</span>
                    </div>
                </a>
            <?php } ?>
            <a class="dropdown-item text-center small text-gray-500" href="<?php echo site_url('tugaskhusus') ?>">Show All Alerts</a>
        </div>
<?php }
} ?>