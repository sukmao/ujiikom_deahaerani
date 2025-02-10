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
                                <li class="breadcrumb-item"><a href="#">Kategori</a></li>
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
                                <h3 class="card-title">Data Kategori</h3>
                                <a href="kategori-add.html" class="btn float-right btn-outline-secondary btn-md">
                                    <li class="fa fa-plus"></li> Add Data Kategori
                                </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="col-md-6">
                                    <div class="form form-group">
                                        <label for="textNamaKategori">Nama Kategori</label>
                                        <input type="text" name="textNamaKategori" id="textNamaKategori" class="form form-control">
                                    </div>
                                    <div class="form form-group">
                                        <label for="textDeskripsi">Deskripsi</label>
                                        <input type="text" name="textDeskripsi" id="textDeskripsi" class="form form-control">
                                    </div>
                                    <div class="form form-group">
                                        <a href="kategori.html" class="btn btn-success btn-md"><li class="fa fa-save"></li> Simpan</a>
                                    </div>
                                </div>
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
