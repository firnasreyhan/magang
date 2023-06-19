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
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <!-- DataTales Example -->
    <div class="row">
        <div class="col-4">

        </div>
        <div class="col-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <img src="<?php echo $lowongan[0]->FOTO; ?>" width="100%">
                    &nbsp;
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <form action="<?php echo site_url("lowonganPerusahaan/ubah"); ?>" enctype="multipart/form-data" method="post">
                                <div class="form-group">
                                    <label">Judul</label>
                                        <input type="text" class="form-control" value="<?php echo $lowongan[0]->JUDUL; ?>" name="JUDUL" placeholder="Judul" required>
                                </div>
                                <div class="form-group">
                                    <label">Deskripsi Lowongan</label>
                                        <textarea class="form-control" name="DESKRIPSI_LOWONGAN" placeholder="Deskripsi Lowongan" required><?php echo $lowongan[0]->DESKRIPSI_LOWONGAN; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label">Kuota</label>
                                        <input type="number" class="form-control" value="<?php echo $lowongan[0]->KUOTA; ?>" name="KUOTA" placeholder="Kuota" required>
                                </div>
                                <input type="text" class="form-control" value="<?php echo $lowongan[0]->ID_LOWONGAN; ?>" name="ID_LOWONGAN" placeholder="ID LOWONGAN" required hidden>
                                <button type="submit" style="width: 100%;" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">

        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>

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