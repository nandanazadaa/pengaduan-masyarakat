<div class="page-wrapper">

<!-- PAGE CONTAINER-->
<div class="page-container">
    <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Petugas</h1>
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
<br>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Petugas</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr role="row">
                                            <th width="5%">No</th>
                                            <th width='20%'>Username</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Level</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width='20%'>Username</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Level</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $c = 0;
                                        foreach ($petugas as $p) {
                                            $c = $c + 1; ?>
                                            <tr>
                                                <td><?= $c ?></td>
                                                <td><?= $p['username'] ?></td>
                                                <td><?= $p['nama_petugas'] ?></td>
                                                <td><?= $p['no_telp'] ?></td>
                                                <td><?= $p['level'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </section>
    </div>