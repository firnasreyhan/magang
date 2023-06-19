<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?php
    // if ($this->session->flashdata('message')) {
    echo $this->session->tempdata('dashboardMahasiswaView');
    // }
    // $this->session->sess_destroy(); 
    ?>
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <!-- DataTales Example -->
    <div class="row">
        <div class="col-2">
            <h1 class="h3 mb-2 text-gray-800">Daftar Lowongan</h1>
        </div>
        <div class="col-6">
            <a data-toggle="modal" data-target="#mdlAdd" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Lowongan</span>
            </a>
        </div>
    </div>
    <br />
    <div class="row">
        <?php
        if (count($lowongans) > 0) {
            foreach ($lowongans as $data) {
        ?>
                <div class="col-xl-3 col-md-6 mb-3">
                    <a href="<?php echo site_url("detailLowonganPerusahaan/detail/" . $data->ID_LOWONGAN); ?>" style="text-decoration:none">
                        <div class="card shadow h-100">
                            <img src="<?php echo $data->FOTO; ?>">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data->JUDUL; ?></div>
                                        &nbsp;
                                        <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                            <i class="fas fa-building"></i>&nbsp;&nbsp;&nbsp;<?php echo $data->NAME; ?>
                                        </div>
                                        <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                            <i class="fas fa-users"></i>&nbsp;&nbsp;&nbsp;<?php echo $data->KUOTA; ?> Orang
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            <?php
            }
        } else {
            ?>
            <div class="col-xl-12 col-md-12 mb-12">
                <div class="card shadow h-100" style="align-items: center;">
                    <img style="width: 30%;" src="<?php echo base_url("assets/img/undraw_empty_xct9.png"); ?>">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">TIDAK ADA LOWONGAN MAGANG</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Add -->
<div class="modal fade" id="mdlAdd" tabindex="-1" aria-labelledby="mdlAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlAdd">Tambah Lowongan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url("lowonganPerusahaan/tambah"); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="JUDUL" placeholder="Judul" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="DESKRIPSI_LOWONGAN" placeholder="Deskripsi Lowongan" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="KUOTA" placeholder="Kuota" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="mdlDelete" tabindex="-1" aria-labelledby="mdlDelete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlAdd">Hapus Aturan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url("aturan/delete"); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <p>Apakah anda yakin ingin mengahpus data ini?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control" name="ID_ATURAN" placeholder="Keterangan" id="INPUT_ID_ATURAN">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Iya</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Aktif -->
<div class="modal fade" id="mdlAktif" tabindex="-1" aria-labelledby="mdlAktif" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlAktif">Aktifkan Aturan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url("aturan/updateAturanAktif"); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <p>Apakah anda yakin ingin mengahpus data ini?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control" name="ID_ATURAN" placeholder="Keterangan" id="INPUT_ATURAN">
                    <input type="hidden" class="form-control" name="KATEGORI" placeholder="Keterangan" id="INPUT_ID_KATEGORI">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Iya</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>

<script>
    $('#dataTable tbody').on('click', '.mdlDelete', function() {
        const id = $(this).data('id');
        $('#INPUT_ID_ATURAN').val(id);
    })

    $('#dataTable tbody').on('click', '.mdlAktif', function() {
        const aturan = $(this).data('aturan');
        const kategori = $(this).data('kategori');

        $('#INPUT_ATURAN').val(aturan);
        $('#INPUT_ID_KATEGORI').val(kategori);
    })
</script>