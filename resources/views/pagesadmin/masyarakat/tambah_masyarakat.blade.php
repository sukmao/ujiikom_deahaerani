@extends('layoutsadmin.app')
@section('contentadmin')



            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Masyarakat</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Masyarakat</a></li>
                                <li class="breadcrumb-item active">Add Data Masyarakat</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card" style="background-color: #efc6c6;">
                            <div class="card-header">
                                <h3 class="card-title">Form Add Data Masyarakat</h3>
                                <a href="/masyarakat" class="btn float-right btn-outline-warning btn-md">
                                    <li class="fa fa-undo"></li> Kembali
                                </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="/store/masyarakat" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="nik" class="form-label">NIK</label>
                                            <input type="text" name="nik" id="nik_masyarakat" class="form-control form-control-lg" placeholder="Masukkan NIK" value="{{ old('nik') }}" required>
                                            @error('nik')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="nama_lengkap" class="form-label">Nama</label>
                                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control form-control-lg" placeholder="Masukkan Nama" value="{{ old('nama_lengkap') }}" required>
                                            @error('nama_lengkap')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-control-lg" required>
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Masukkan Username" value="{{ old('username') }}" required>
                                            @error('username')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Masukkan Password" required>
                                            @error('password')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="no_telepon_masyarakat" class="form-label">No Telepon</label>
                                            <input type="text" name="no_telepon" id="no_telepon_masyarakat" class="form-control form-control-lg" placeholder="Masukkan No Telepon" value="{{ old('no_telepon') }}">
                                            @error('no_telepon')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea name="alamat" id="alamat" class="form-control form-control-lg" rows="4" placeholder="Masukkan Alamat">{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="hidden" name="role" value="masyarakat">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-lg mt-3 w-100" style="background-color: #6762FF;">Simpan</button>
                                    </div>
                                </form>
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
