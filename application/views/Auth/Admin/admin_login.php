<div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login Admin !</h3>
                                </div>
                                
                                <?= $this->session->flashdata('message'); ?>
                                <div class="card-body">
                                    <form method="POST" action="<?= base_url('Auth/admin_login') ?>">
                                    <?php echo form_hidden($this->security->get_csrf_token_name(),$this->security->get_csrf_hash()) ?>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="username" name="username" type="text" placeholder="name@example.com" />
                                            <label for="username">Username</label>
                                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="password" name="password" type="password" placeholder="Password" />
                                            <label for="inputPassword">Password</label>
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>
                                        <button type="submit" class="btn btn-user btn-block btn-login" style="background-color: #93764D; color:white;">Login</button>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="<?= base_url('Auth/admin_register') ?>">Belum memiliki akun? Silahkan registrasi !</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>
