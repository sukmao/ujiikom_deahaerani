@extends('layoutsadmin.app')
@section('contentadmin')
    <!-- Content Header (Page header) -->
    <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Pegawai</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Pegawai</a></li>
                                <li class="breadcrumb-item active">Index</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Pegawai</h3>
                                <a href="tambah_pegawai" class="btn float-right btn-outline-secondary btn-md">
                                    <li class="fa fa-plus"></li> Add Data Pegawai
                                </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>3207172222000001</td>
                                            <td>Lukman</td>
                                            <td>Admin</td>
                                            <td>
                                                <a href="pegawai-detail.html" class="btn btn-warning btn-xs"
                                                    title="Edit Masyarakat">
                                                    <li class="fa fa-edit"></li>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>3207172222000002</td>
                                            <td>Fery</td>
                                            <td>Petugas</td>
                                            <td>
                                                <a href="pegawai-detail.html" class="btn btn-warning btn-xs"
                                                    title="Edit Masyarakat">
                                                    <li class="fa fa-edit"></li>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>3207172222000003</td>
                                            <td>Samsu</td>
                                            <td>Admin</td>
                                            <td>
                                                <a href="pegawai-detail.html" class="btn btn-warning btn-xs"
                                                    title="Edit Masyarakat">
                                                    <li class="fa fa-edit"></li>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
@endsection
