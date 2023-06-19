<?php 
    $dataNotif      = $this->db->query('SELECT event.JUDUL, presensi.EMAIL FROM presensi JOIN event ON event.ID_EVENT = presensi.ID_EVENT WHERE IS_SEEN = 0 ORDER BY ID_PRESENSI DESC LIMIT 3')->result();
    $countDataNotif = $this->db->query('SELECT * FROM presensi WHERE IS_SEEN = 0')->num_rows();
    if($this->session->userdata('role') == "Event Manager"){
?>
<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bell fa-fw"></i>
    <!-- Counter - Alerts -->
    <span class="badge badge-danger badge-counter"><?php echo $countDataNotif;?></span>
</a>
<?php if($countDataNotif > 0){ ?>
<!-- Dropdown - Alerts -->
<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
    <h6 class="dropdown-header">
        Alerts Center
    </h6>
    <?php foreach($dataNotif as $data){ ?>
    <a class="dropdown-item d-flex align-items-center notifikasi" href="<?php echo site_url('daftarEvent')?>">
    <!-- <a class="dropdown-item d-flex align-items-center notifikasi" href="http://facebook.com"> -->
        <div class="mr-3">
            <div class="icon-circle bg-primary">
                <i class="fas fa-file-alt text-white"></i>
            </div>
        </div>
        <div>
            <div class="font-weight-bold">Email <?php echo $data->EMAIL ?></div>
            <span class="small text-gray-500">Mendaftar Event '<?php echo $data->JUDUL?>'</span>
        </div>
    </a>
    <?php }?>
    <a class="dropdown-item text-center small text-gray-500" href="<?php echo site_url('daftarEvent')?>">Show All Alerts</a>
</div>
    <?php }}?>