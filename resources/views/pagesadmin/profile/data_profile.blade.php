@extends('layoutsadmin.app')
@section('contentadmin')


<section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Profile</a></li>
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
                        @foreach ($profiles as $admin )

                        <div class="card bg-light">
                            <div class="card-header text-muted border-bottom-0">
                                NIK : <span>{{ $admin->nik }}</span>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead"><b>Maman Suparman</b></h2>
                                        <p class="text-muted text-sm"><b>Jenis Kelamin : </b> Laki-laki </p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small"><span class="fa-li"><i
                                            class="fas fa-lg fa-building"></i></span> Alamat : Dusun
                                            Pakidulan Desa Pakulonan Kabupaten Bandung </li>
                                            <li class="small"><span class="fa-li"><i
                                            class="fas fa-lg fa-phone"></i></span> Phone : +628212345678
                                            </li>
                                            <li class="small"><span class="fa-li"><i
                                            class="fas fa-lg fa-envelope"></i></span> Email : maman@apm.com
                                            </li>
                                            <li class="small"><span class="fa-li"><i
                                            class="fas fa-lg fa-briefcase"></i></span> Jabatan : Admin
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src="../../dist/img/user1-128x128.jpg" alt="" class="img-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <a href="profile-edit.html" class="btn btn-sm btn-primary">
                                        <i class="fas fa-user"></i> Ubah Profile
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                        @endforeach
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
@endsection
