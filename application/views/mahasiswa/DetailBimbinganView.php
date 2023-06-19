<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?php
    // if ($this->session->flashdata('message')) {
    echo $this->session->tempdata('daftarEventView');
    // }
    // $this->session->sess_destroy(); 
    ?>
    <h1 class="h3 mb-2 text-gray-800">Detail Bimbingan</h1>
    &nbsp;
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <!-- DataTales Example -->
    <div class="row">
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="m-0 font-weight-bold text-primary">Mahasiswa</h6>
                        </div>
                        <div class="col-6">

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Catatan Mahasiswa</label>
                        <p><?= $bimbingan[0]->CATATAN_MHS ?></p>
                    </div>
                    <a href="<?= $bimbingan[0]->FILE_MHS ?>" style="float:right;" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-download"></i>
                        </span>
                        <span class="text">Unduh Dokumen</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="m-0 font-weight-bold text-primary">Dosen</h6>
                        </div>
                        <div class="col-6">

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Catatan Dosen</label>
                        <p>
                            <?php 
                                if ($bimbingan[0]->CATATAN_DSN == "") {
                                    echo "-";
                                } else {
                                    echo $bimbingan[0]->CATATAN_DSN;
                                }
                            ?>
                        </p>
                    </div>
                    <a href="<?php if($bimbingan[0]->FILE_DSN == "") {echo "#";} else {echo $bimbingan[0]->FILE_DSN;} ?>" style="float:right;" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-download"></i>
                        </span>
                        <span class="text"><?php if($bimbingan[0]->FILE_DSN == "") {echo "Dokumen Belum Tersedia";} else {echo "Unduh Dokumen";} ?></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>