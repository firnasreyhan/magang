<!-- Begin Page Content -->
<div class="container-fluid">

    <?php
    if (sizeof($isRegister) != 0) {
    ?>
        <div class="alert alert-success" role="alert"> Berhasil Mendaftar Lowongan Ini </div>
    <?php
    }
    ?>
    <!-- <h1 class="h3 mb-2 text-gray-800">Daftar Lowongan</h1> -->
    &nbsp;
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <!-- DataTales Example -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-3">

        </div>
        <div class="col-xl-6 col-md-6 mb-6">
            <div class="card shadow h-100">
                <div class="card-body">
                    <img src="<?php echo $lowongan[0]->FOTO; ?>" width="100%">
                    &nbsp;
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $lowongan[0]->NAME; ?> - <?php echo $lowongan[0]->JUDUL; ?></div>
                            <hr />
                            <div class="row">
                                <div class="col md-4">
                                    <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                        Kuota
                                    </div>
                                    <div class="text-md text-dark text-uppercase mb-1">
                                        <i class="fas fa-users"></i>&nbsp;&nbsp;&nbsp;<?php echo $lowongan[0]->KUOTA; ?> Orang
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                Deskripsi
                            </div>
                            <div class="text-md text-dark">
                                <?php echo $lowongan[0]->DESKRIPSI_LOWONGAN; ?>
                            </div>
                            <?php
                            if ($lowongan[0]->KUOTA > 0 && sizeof($isRegister) == 0) {
                            ?>
                                <hr />
                                <a data-toggle="modal" data-target="#mdlAdd" class="btn btn-primary btn-icon-split" style="width: 100%;">
                                    <span class="text">Daftar</span>
                                </a>
                            <?php
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">

        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<br />

<!-- Modal Add -->
<div class="modal fade" id="mdlAdd" tabindex="-1" aria-labelledby="mdlAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlAdd">Daftar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url('detailLowonganMahasiswa/daftar') ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Dokumen Pendukung</label>
                        <input type="file" class="form-control" name="DOKUMEN_PENDUKUNG" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control" name="ID_LOWONGAN" value="<?php echo $lowongan[0]->ID_LOWONGAN; ?>">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>