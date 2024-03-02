<div class="page-wrapper">
<!-- PAGE CONTAINER-->
<div class="page-container">
    <div class="wrapper">
    <div class="content-wrapper">
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
<br>
<br>
                <!-- Kategori -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Kategori</h3>
                        </div>
                        <div class="card-body">
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                    </tr>
                                </thead>
                                <?php $i = 1 ?>
                                <?php foreach ($kategori as $al) : ?>
                                    <tr>
                                        <th><?= $i ?></th>
                                        <input type="hidden" name="Kategori" value="<? $al['Kategori'] ?>">
                                        <td><?= $al['kategori'] ?></td>
                                      
                                    </tr>
                                <?php $i++;
                                endforeach ?>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end-kategori -->

                <!-- sub-kategori -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Sub-Kategori</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Sub-Kategori</th>
                                </tr>
                            </thead>
                            <?php $i = 1 ?>
                            <?php foreach ($joinkategori as $jb) : ?>
                                <tr>
                                    <th><?= $i ?></th>
                                    <td><?= $jb['kategori'] ?></td>
                                    <td><?= $jb['sub_kategori'] ?></td>
                                </tr>
                            <?php $i++;
                            endforeach ?>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Sub-Kategori</th>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- end sub-kategori -->
            </div>
        </section>
    </div>