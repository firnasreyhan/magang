<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?php
    // if ($this->session->flashdata('message')) {
    echo $this->session->tempdata('daftarAbsenView');
    // }
    // $this->session->sess_destroy(); 
    ?>
    <h1 class="h3 mb-2 text-gray-800">Daftar Absen</h1>
    &nbsp;
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <!-- DataTales Example -->

    <?php
    if (sizeof($perusahaan) > 0) {
    ?>
        <div class="row">
            <div class="col-3">
                <div class="card shadow h-100">
                    <img src="<?= $perusahaan[0]->FOTO; ?>">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $perusahaan[0]->NAME; ?></div>
                                <br />
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $perusahaan[0]->JUDUL; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-6">
                                <h6 class="m-0 font-weight-bold text-primary">Daftar Absen</h6>
                            </div>
                            <div class="col-6">
                                <a data-toggle="modal" data-target="#mdlAdd" style="float:right;" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Absen</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Kegiatan</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Kegiatan</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($absens as $data) {
                                    ?>
                                        <tr>
                                            <td><?php echo $data->KEGIATAN; ?></td>
                                            <td><?php echo $data->TANGGAL_ABSEN; ?></td>
                                            <td><?php if ($data->STATUS == "0") {
                                                    echo "<span class='badge badge-pill badge-warning'>Diproses</span>";
                                                } else if ($data->STATUS == "1") {
                                                    echo "<span class='badge badge-pill badge-success'>Diterima</span>";
                                                } else if ($data->STATUS == "2") {
                                                    echo "<span class='badge badge-pill badge-danger'>Ditolak</span>";
                                                } ?></td>
                                            <td style="text-align:right">
                                                <a title="Hapus" data-toggle="modal" data-target="#mdlDelete" data-id="<?php echo $data->ID_ABSEN ?>" class="btn btn-danger btn-icon-split mdlDelete">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card shadow h-100" style="align-items: center;">
                <img style="width: 30%;" src="<?php echo base_url("assets/img/undraw_empty_xct9.png"); ?>">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">ANDA BELUM TERDAFTAR DALAM PROGRAM MAGANG</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Add -->
<div class="modal fade" id="mdlAdd" tabindex="-1" aria-labelledby="mdlAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlAdd">Absen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url("absenMagangMahasiswa/absen"); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kegiatan</label>
                        <textarea class="form-control" name="KEGIATAN" placeholder="Kegiatan" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Acara</label>
                        <input type="date" class="form-control" name="TANGGAL_ABSEN" placeholder="Tanggal Absen" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $perusahaan[0]->ID_PENDAFTARAN; ?>" name="ID_PENDAFTARAN" placeholder="ID_PENDAFTARAN" required>
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
                <h5 class="modal-title" id="mdlAdd">Hapus Absen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url("absenMagangMahasiswa/hapus"); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <p>Apakah anda yakin ingin mengahpus data ini?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control" name="ID_ABSEN" placeholder="Keterangan" id="INPUT_ID_ABSEN">
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
        const id = $(this).data('id')
        $('#INPUT_ID_ABSEN').val(id)
    })

    $('#dataTable tbody').on('click', '.mdlQRCODE', function() {
        const qrcode = $(this).data('qrcode')
        $('#INPUT_IMG').attr("src", qrcode)
    })
</script>