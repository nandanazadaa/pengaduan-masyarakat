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

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">

<br>
                        <!-- Kategori -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Kategori</h3>
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal1"><i class="fas fa-plus"></i>Tambah Kategori</button>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                            <?= $this->session->flashdata('kategori') ?>
                            <?= $this->session->flashdata('del_kategori') ?>


                                <table id="" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <?php $i = 1 ?>
                                    <?php foreach ($kategori as $al) : ?>
                                        <tr>
                                            <th><?= $i ?></th>
                                            <input type="hidden" name="Kategori" value="<? $al['Kategori'] ?>">
                                            <td><?= $al['kategori'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_kp_Modal<?php echo $al['id_kategori']; ?>"><i class="fas fa-pen"></i> Edit</button>
                                                <a class="btn btn-danger" href="<?= base_url('Admin/delete_kategori/' . $al['id_kategori'] . '/') ?>" onclick="return confirm('Apakah Anda Yakin?');" ><i class="fas fa-trash"></i>Hapus</a>
                                            </td>
                                        </tr>

                                        <!-- EDIT KATEGORI -->
                                        <div class="modal fade" id="edit_kp_Modal<?php echo $al['id_kategori']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url('Admin/edit_kategori/') . $al['id_kategori'] ?>" method="post">
                                                            <div class="form-group">
                                                                <label for="edit_kategori">Kategori</label>
                                                                <input type="edit_kategori" class="form-control" name="edit_kategori" id="edit_kategori" value="<?= $al['kategori'] ?>">
                                                                <input type="hidden" name="edit_id" value="<?= $al['id_kategori'] ?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                        <nav aria-label="Page navigation example">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END EDIT KATEGORI -->


                                    <?php $i++;
                                    endforeach ?>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                        <!-- ADD KATEGORI MODAL -->
                                        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url('Admin/add_admin_kategori') ?>" method="post">
                                                            <div class="form-group">
                                                                <label for="kategori">Kategori</label>
                                                                <input type="kategori" class="form-control" name="kategori" id="kategori">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                        <nav aria-label="Page navigation example">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- end-kategori -->

                        <!-- sub-kategori -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Sub-Kategori</h3>
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#tambahsubkat"><i class="fas fa-plus"></i>Tambah Subkategori</button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                            <?= $this->session->flashdata('subkategori') ?>
                            <?= $this->session->flashdata('del_subkategori') ?>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kategori</th>
                                            <th>Sub-Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php $i = 1 ?>
                                    <?php foreach ($joinkategori as $jb) : ?>
                                        <tr>
                                            <th><?= $i ?></th>
                                            <!-- <input type="hidden" name="kategori" value="<? $jb['id_subkategori'] ?>"> -->
                                            <!-- <input type="hidden" name="sub_kategori" value="<? $jb['sub_kategori'] ?>"> -->
                                            <td><?= $jb['kategori'] ?></td>
                                            <td><?= $jb['sub_kategori'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editsubkategori<?php echo $jb['id_subkategori']; ?>"><i class="fas fa-pen"></i> Edit</button>
                                                <a class="btn btn-danger" href="<?= base_url('Admin/delete_subkategori/' . $jb['id_subkategori'] . '/') ?>" onclick="return confirm('Apakah Anda Yakin?');"><i class="fas fa-trash"></i>Hapus</a>
                                            </td>
                                        </tr>


                                        <!-- EDIT SUBKATEGORI -->
                                        <div class="modal fade" id="editsubkategori<?php echo $jb['id_subkategori']; ?>" tabindex="-1" role="dialog" aria-labelledby="editsubkat" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editsubkat">Edit Data kategori</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('Admin/edit_subkategori/') . $jb['id_subkategori'] ?>" method="post">
                                                            <label for="">Kategori</label>
                                                            <select name="kategori" id="kategori" class="form-control">
                                                                <?php foreach ($kategori as $k) { ?>
                                                                    <option value="<?= $k['id_kategori'] ?>"><?= $k['kategori'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <label class="mt-3"> Subkategori </label>
                                                            <input type="text" class="form-control" name="sub_kategori" id="sub_kategori" value="<?= $jb['sub_kategori'] ?>">
                                                    </div>
                                                    <div class="modal-footer mt-3">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                        <button class="btn btn-primary" type="submit">Update</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END EDIT SUBKATEGORI -->



                                        <?php $i++;
                                        endforeach ?>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Kategori</th>
                                            <th>Sub-Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="tambahsubkat" tabindex="-1" role="dialog" aria-labelledby="tambahsubkat" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="tambahsubkat">Tambah Data Sub kategori</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('Admin/add_subkategori') ?>" method="post">
                                                            <div class="mb-3">
                                                                <label for="kategori">Kategori</label>
                                                                <select name="kategori" id="kategori" class="form-control">
                                                                    <option selected value="">-pilih-</option>
                                                                    <?php foreach ($kategori as $k) { ?>
                                                                        <option value="<?= $k['kategori'] ?>"><?= $k['kategori'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="">Sub Kategori</label>
                                                                <input type="text" class="form-control" name="subkategori" id="subkategori">
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer mt-3">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                        <button class="btn btn-primary" href="login.html">Simpan</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                            </tfoot>
                            </table>

                        </div>
                    </div>
            </div>
            </section>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © Nandana Zada Abiproya. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>