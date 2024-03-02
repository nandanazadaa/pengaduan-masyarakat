
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Registrasi Masyarakat</h3>
                                </div>
                                <div class="card-body">

                                    <form method="post" action="<?= base_url('Auth/registrasi'); ?>">
                                        <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()) ?>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="nik" name="nik" type="text" placeholder="Enter your first name" />
                                                <label for="inputFirstName">Nik</label>
                                                <?= form_error('nik', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-floating">
                                                <input class="form-control" id="username" name="username" type="text" placeholder="Enter your last name" />
                                                <label for="inputLastName">Username</label>
                                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-floating">
                                                <input class="form-control" id="nama" name="nama" type="text" placeholder="Enter your last name" />
                                                <label for="inputLastName">Nama</label>
                                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="no_telp" name="no_telp" type="text" placeholder="Nomor Telepon" />
                                            <label for="telepon">Telepon</label>
                                            <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="password1" name="password1" type="password" placeholder="Create a password" />
                                                    <label for="inputPassword">Password</label>
                                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="password2" name="password2" type="password" placeholder="Confirm password" />
                                                    <label for="inputPasswordConfirm">Confirm Password</label>
                                                    <?= form_error('password2', '<small class="text-danger pl-3">', '</small>') ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-4 mb-0">
                                            <button type="submit" class="btn btn-block" style="background-color: #93764D; color:white;">Simpan</button>
                                        </div>

                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="<?= base_url('Auth') ?>">Sudah memiliki Akun?.Silahkan login !</a></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>