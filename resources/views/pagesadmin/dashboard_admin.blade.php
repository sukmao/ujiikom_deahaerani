@extends('layoutsadmin.app')
@section('contentadmin')


            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Index</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Masyarakat</span>
                                    <span class="info-box-number">
                                        10
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-book"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Kategori Pengaduan</span>
                                    <span class="info-box-number">
                                        10
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-red elevation-1"><i class="fa fa-retweet"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Laporan Pengaduan</span>
                                    <span class="info-box-number">
                                        1.000
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-green elevation-1"><i class="fa fa-envelope"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Laporan Baru</span>
                                    <span class="info-box-number">
                                        200
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    Data Laporan Masuk
                                </div>

                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tgl Pengaduan</th>
                                                <th>Judul Pengaduan</th>
                                                <th>Kategori</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            @php $no = 1; @endphp
                                            @foreach ($pengaduans as $index => $pengaduan)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $pengaduan->masyarakat->nama_lengkap ?? 'Tidak Ada Data' }}</td>
                                                    <td>{{ $pengaduan->kategori->nama_kategori ?? 'Tidak Ada Data' }}</td>
                                                    <td>{{ $pengaduan->tanggal_pengaduan }}</td>
                                                    <td>{{ $pengaduan->isi_pengaduan }}</td>
                                                    <td>
                                                    <td>
                                                        @if ($pengaduan->foto)
                                                            <img src="{{ asset('storage/foto_pengaduan/' . $pengaduan->foto) }}" alt="Foto Pengaduan" width="100">
                                                        @else
                                                            Tidak ada foto
                                                        @endif
                                                    </td>

                                                    <td>
                                                    @if(in_array($pengaduan->status, ['selesai', 'ditolak']))
                                                        @if($pengaduan->status == 'ditolak' && auth()->user()->role == 'admin')
                                                            <a href="/tambah_tanggapan/{{$pengaduan->id}}">
                                                                <span class="badge bg-danger">
                                                                    {{ ucfirst($pengaduan->status) }}
                                                                </span>
                                                            </a>
                                                        @else
                                                            <span class="badge {{ $pengaduan->status == 'selesai' ? 'bg-success' : 'bg-danger' }}">
                                                                {{ ucfirst($pengaduan->status) }}
                                                            </span>
                                                        @endif
                                                    @elseif($pengaduan->status == 'diproses' && auth()->user()->role == 'admin')
                                                        <a href="/tambah_tanggapan/{{$pengaduan->id}}">
                                                            <span class="badge bg-info">
                                                                {{ ucfirst($pengaduan->status) }}
                                                            </span>
                                                        </a>
                                                    @else
                                                        {{-- Default status tanpa respons --}}
                                                        <a href="/tambah_tanggapan/{{$pengaduan->id}}">
                                                            <span class="badge bg-warning">
                                                                belum ada respon
                                                            </span>
                                                        </a>

                                                    @endif





                                                    </td>
                                                    @unless(auth()->user()->role == 'petugas')

                                                    <td >


                                                        <a href="/edit_laporan/{{$pengaduan->id}}"class="btn btn-sm btn-info mt-1">E</a>
                                                        <!-- Link Penghapusan -->
                                                        <form id="delete-form-{{ $pengaduan->id }}" action="{{ route('destroy_pengaduan', $pengaduan->id) }}" method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDeletion({{ $pengaduan->id }})">
                                                                H
                                                            </button>
                                                        </form>

                                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                <script>
                                                    function confirmDeletion(pengaduanId) {
                                                        Swal.fire({
                                                            title: 'Apakah Anda yakin?',
                                                            text: "Data pengaduan ini akan dihapus secara permanen!",
                                                            icon: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonColor: '#d33',
                                                            cancelButtonColor: '#3085d6',
                                                            confirmButtonText: 'Ya, hapus!',
                                                            cancelButtonText: 'Batal'
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                document.getElementById('delete-form-' + pengaduanId).submit();
                                                            }
                                                        });
                                                    }

                                                    @if(session('success'))
                                                        // Show success notification at the center
                                                        Swal.fire({
                                                            icon: 'success',
                                                            title: 'Berhasil!',
                                                            text: "{{ session('success') }}",
                                                            timer: 3000,
                                                            showConfirmButton: false,
                                                            position: 'center' // Alert positioned at the center
                                                        });
                                                    @endif
                                                </script>





                                                    </td>
                                                    @endunless
                                                </tr>
                                            @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </section>
@endsection
