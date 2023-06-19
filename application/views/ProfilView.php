                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <?php
                    // if ($this->session->flashdata('message')) {
                    echo $this->session->tempdata('updateProfil');
                    // }
                    // $this->session->sess_destroy(); 
                    ?>
                    <h1 class="h3 mb-2 text-gray-800">Profil</h1>
                    &nbsp;

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Profil</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo site_url("profilUpdate"); ?>" enctype="multipart/form-data" method="post">
                                <div class="modal-body">
                                    <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                        Email
                                    </div>
                                    <div class="form-group">
                                        <input value="<?php echo $user[0]->EMAIL; ?>" type="text" class="form-control" disabled>
                                    </div>
                                    <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                        Role
                                    </div>
                                    <div class="form-group">
                                        <input value="<?php
                                                        foreach ($role as $key) {
                                                            if ($user[0]->ID_ROLE == $key->ID_ROLE) {
                                                                echo $key->ROLE;
                                                            }
                                                        }
                                                        ?>" type="text" class="form-control" disabled>
                                    </div>
                                    <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                        Nama
                                    </div>
                                    <div class="form-group">
                                        <input value="<?php echo $user[0]->NAMA; ?>" type="text" class="form-control" name="NAMA" placeholder="Nama">
                                    </div>
                                    <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                        Telepon
                                    </div>
                                    <div class="form-group">
                                        <input value="<?php echo $user[0]->TELEPON; ?>" type="text" class="form-control" name="TELEPON" placeholder="Telepon">
                                    </div>
                                    <hr />
                                    <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                        Password Baru
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="PASSWORD" placeholder="Password Baru">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input value="<?php echo $user[0]->EMAIL; ?>" type="hidden" class="form-control" name="EMAIL">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->