<style>
    .foto {
        height: 150px;
        width: 150px;
        position: relative;
        border: 5px solid #fff;
        border-radius: 50%;
        background: url('<?= base_url('assets/img/propil.png') ?>');
        background-size: 100% 100%;
        margin: 100px auto;
        overflow: hidden;
    }

    .my_file {
        position: absolute;
        bottom: 0;
        outline: none;
        color: transparent;
        width: 100%;
        box-sizing: border-box;
        padding: 95px 700px;
        cursor: pointer;
        transition: 0.5s;
        background: rgba(red, green, blue, alpha);
    }

    .my_file::-webkit-file-upload-button {
        visibility: hidden;
    }

    .my_file::before {
        font-family: fontAwesome;
        font-size: 50px;
        color: #000;
        display: inline-block;
        -webkit-user-select-: none;
    }

    .profile {
        height: 50px;
        width: 50px;
        position: relative;
        border: 5px solid #fff;
        border-radius: 50%;
        background: url('<?= base_url('assets/img/propil.png') ?>');
        background-size: 100% 100%;
        margin: auto;
        overflow: hidden;
    }

    .myfile {
        position: absolute;
        bottom: 0;
        outline: none;
        color: transparent;
        width: 100%;
        box-sizing: border-box;
        padding: 95px 700px;
        cursor: pointer;
        transition: 0.5s;
        background: rgba(red, green, blue, alpha);
    }

    .myfile::-webkit-file-upload-button {
        visibility: hidden;
    }

    .myfile::before {
        font-family: fontAwesome;
        font-size: 50px;
        color: #000;
        display: inline-block;
        -webkit-user-select-: none;
    }
</style>

<div class="page-wrapper" style="background-color:#BA9868;">
    <!-- PAGE CONTAINER-->
    <div class="page-container" style="background-color:#BA9868;">
        <div class="wrapper">
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Penganduan</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Dashboard v1</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3">
                            </div>
                            <div class="col-lg-6">
                                <div class="card shadow" style="background-color:#93764D ;">
                                    <div class="card-header py-3">
                                        <h3 class="m-0 font-weight-bold text-dark">Profile</h3>
                                    </div>

                                    <div class="foto">
                                        <input type="file" class="my_file">
                                    </div>
                                    <div class="card-body">
                                        <?= $this->session->flashdata('profile') ?>
                                        <h4 style="color:#fff ;">Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $get['nama'] ?></h4>
                                        <hr style="background-color:#fff ;">
                                        <h4 style="color:#fff ;">Username &nbsp;&nbsp;&nbsp;: <?= $get['username'] ?></h4>
                                        <hr style="background-color:#fff ;">
                                        <h4 style="color:#fff ;">NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $get['nik'] ?></h4>
                                        <hr style="background-color:#fff ;">
                                        <h4 style="color:#fff ;">Telepon &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $get['no_telp'] ?></h4>

                                        <hr style="background-color:#fff ;">
                                        <button class="btn" data-target="#edit<?= $get['id'] ?>" data-toggle="modal" style="background-color:#BA9868; color:white; border: 3px solid #fff;"><i class="fa fa-edit"></i> Edit Profil</button>
                                        <a class="btn btn-danger" style="border: 3px solid #fff;" href="<?= base_url('Auth/logout') ?>"><i class="fas fa-sign-out-alt "></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- edit user Modal-->
                <div class="modal fade" id="edit<?= $get['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="edit">Edit data user</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    <div class="profile">
                                        <input type="file" class="myfile" name="avatar">                                       
                                    </div>                                    
                                <form action="<?= base_url('Masyarakat/edit_profile/') . $get['nik'] ?>" method="post">
                                    
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>NIK</label>
                                            <input type="number" name="nik" id="nik" class="form-control" disabled placeholder="<?= $get['nik'] ?>">
                                        </div>

                                        <div class="col-lg-6">
                                            <label>Username</label>
                                            <input type="text" name="username" id="username" class="form-control" disabled placeholder="<?= $get['username'] ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mt-3 col-lg-6">
                                            <label>Nama</label>
                                            <input type="text" name="nama" id="nama" class="form-control" value="<?= $get['nama'] ?>">
                                        </div>
                                        <div class="mt-3 col-lg-6">
                                            <label>Telepon</label>
                                            <input type="number" name="no_telp" id="telp" class="form-control" value="<?= $get['no_telp'] ?>">
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal" style="background-color:#BA9868; color:white; border: 3px solid #000;">Cancel</button>
                                <button class="btn" type="submit" style="background-color:#BA9868; color:white; border: 3px solid #000;">Update</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright © Nandana Zada Abiproya. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>