<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?php
    // if ($this->session->flashdata('message')) {
    echo $this->session->tempdata('daftarAbsenView');
    // }
    // $this->session->sess_destroy(); 
    ?>
    <h1 class="h3 mb-2 text-gray-800">Bimbingan</h1>
    &nbsp;
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <!-- DataTales Example -->
    <div class="row">
        <div class="col-3">
            <div class="card shadow h-100">
                <img src="<?= $mahasiswa[0]->FOTO; ?>">
                <div class="card-body">
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $mahasiswa[0]->NAME; ?></div>
                    <?php
                    if ($pembimbing[0]->FILE_AKHIR != "") {
                    ?>
                        <br />
                        <a href="<?= $pembimbing[0]->FILE_AKHIR ?>" style="width:100%;" class="btn btn-primary btn-icon-split">
                            <!-- <span class="icon text-white-50">
                                <i class="fas fa-download"></i>
                            </span> -->
                            <span class="text">Unduh Dokumen Laporan Akhir</span>
                        </a>
                        <br />
                    <?php
                    }
                    ?>

                    <?php
                    if ($pembimbing[0]->NILAI == "") {
                    ?>
                    <br />
                        <form action="<?php echo site_url("bimbinganDosen/mahasiswa/nilaiAkhir"); ?>" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <label>Nilai Akhir</label>
                                <input type="number" class="form-control" name="NILAI_AKHIR" placeholder="Nilai Akhir" required />
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" value="<?= $pembimbing[0]->ID_PEMBIMBING ?>" name="ID_PEMBIMBING" placeholder="ID_PEMBIMBING" required>
                                <input type="hidden" class="form-control" value="<?= $pembimbing[0]->USERNAME_MHS ?>" name="USERNAME_MHS" placeholder="USERNAME_MHS" required>
                            </div>
                            <button type="submit" style="float:right;" class="btn btn-primary">Kirim</button>
                        </form>
                    <?php
                    } else {
                    ?>
                        <br />
                        <div class="form-group">
                            <label>Nilai Akhir</label>
                            <input type="number" class="form-control" value="<?= $pembimbing[0]->NILAI ?>" name="NILAI_AKHIR" placeholder="Nilai Akhir" disabled />
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="m-0 font-weight-bold text-primary">Bimbingan</h6>
                        </div>
                        <div class="col-6">

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Bimbingan Ke</th>
                                    <th>Tanggal Bimbingan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Bimbingan Ke</th>
                                    <th>Tanggal Bimbingan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($bimbingans as $data) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data->TANGGAL_BIMBINGAN; ?></td>
                                        <td><?php if ($data->STATUS == "0") {
                                                echo "<span class='badge badge-pill badge-warning'>Diperiksa</span>";
                                            } else if ($data->STATUS == "1") {
                                                echo "<span class='badge badge-pill badge-success'>Selesai Diperiksa</span>";
                                            } ?></td>
                                        <td style="text-align:right">
                                            <a title="Detail" href="<?php echo site_url("bimbinganDosen/mahasiswa/detail/" . $data->ID_BIMBINGAN); ?>" class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-external-link-alt"></i>
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

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Add -->
<div class="modal fade" id="mdlAdd" tabindex="-1" aria-labelledby="mdlAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlAdd">Bimbingan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url("bimbinganMahasiswa/bimbingan"); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Dokumen Bimbingan</label>
                        <input type="file" class="form-control" name="FILE_MHS" required>
                    </div>
                    <div class="form-group">
                        <label>Catatan</label>
                        <textarea class="form-control" name="CATATAN_MHS" placeholder="Catatan" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $pembimbing[0]->ID_PEMBIMBING ?>" name="ID_PEMBIMBING" placeholder="ID_PEMBIMBING" required>
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
                <h5 class="modal-title" id="mdlAdd">Hapus Bimbingan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url("absenMagangMahasiswa/hapus"); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <p>Apakah anda yakin ingin mengahpus data ini?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control" name="ID_ABSEN" placeholder="Keterangan" id="INPUT_ID_BIMBINGAN">
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
    $('#dataTable tbody').on('click', '.mdlAdd', function() {
        const id = $(this).data('id')
        $('#INPUT_ID_PEMBIMBING').val(id)
    })

    $('#dataTable tbody').on('click', '.mdlDelete', function() {
        const id = $(this).data('id')
        $('#INPUT_ID_BIMBINGAN').val(id)
    })
</script>