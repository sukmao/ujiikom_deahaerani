@extends('layoutsadmin.app')
@section('contentadmin')
<section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Masyarakat</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Masyarakat</a></li>
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
                                <h3 class="card-title">Data Masyarakat</h3>
                                <a href="tambah_masyarakat" class="btn float-right btn-outline-secondary btn-md">
                                    <li class="fa fa-plus"></li> Add Data Masyarakat
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
                                            <th>jenis kelamin</th>
                                            <th>username</th>
                                            <th>no telepon</th>
                                            <th>Jabatan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                                        @php $no = 1; @endphp
                                    @foreach ($masyarakats as $petugas)
                                        @if ($petugas->role === 'masyarakat')
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $petugas->nik }}</td>
                                                <td>{{ $petugas->nama_lengkap }}</td>
                                                <td>{{ $petugas->jenis_kelamin }}</td>
                                                <td>{{ $petugas->username }}</td>
                                                <td>{{ $petugas->no_telepon }}</td>
                                                <td>{{ $petugas->role }}</td>
                                                @unless(auth()->user()->role == 'petugas' ?? 'admin')

                                                <td>
                                                    <a href="/edit_masyarakat/{{$petugas->id}}" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="javascript:void(0);" class="btn btn-danger"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Hapus"
                                                        onclick="confirmDeletion({{ $petugas->id }});">
                                                        <i class="fa fa-close color-danger">Hapus</i>
                                                    </a>

                                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                    <script>
                                                        function confirmDeletion(id) {
                                                            Swal.fire({
                                                                title: "Data ini akan dihapus dan tidak bisa dikembalikan!",
                                                                text: 'Apakah Anda yakin?',
                                                                icon: 'warning',
                                                                showCancelButton: true,
                                                                confirmButtonColor: '#3085d6',
                                                                cancelButtonColor: '#d33',
                                                                confirmButtonText: 'Ya, hapus!',
                                                                cancelButtonText: 'Batal'
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    // Kirim request DELETE
                                                                    fetch(`/destroy_petugas/${id}`, {
                                                                        method: 'DELETE',
                                                                        headers: {
                                                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                                        }
                                                                    })
                                                                    .then(response => response.json())
                                                                    .then(data => {
                                                                        if (data.success) {
                                                                            Swal.fire({
                                                                                icon: 'success',
                                                                                title: 'Berhasil!',
                                                                                text: data.message,
                                                                                showConfirmButton: false,
                                                                                timer: 2000
                                                                            });
                                                                            setTimeout(() => {
                                                                                location.reload(); // Refresh halaman tabel petugas
                                                                            }, 2000);
                                                                        } else {
                                                                            Swal.fire({
                                                                                icon: 'error',
                                                                                title: 'Gagal!',
                                                                                text: 'Terjadi kesalahan saat menghapus data.',
                                                                                showConfirmButton: false,
                                                                                timer: 2000
                                                                            });
                                                                        }
                                                                    })
                                                                    .catch(error => {
                                                                        console.error('Terjadi kesalahan:', error);
                                                                        Swal.fire({
                                                                            icon: 'error',
                                                                            title: 'Error!',
                                                                            text: 'Terjadi kesalahan pada server.',
                                                                            showConfirmButton: false,
                                                                            timer: 2000
                                                                        });
                                                                    });
                                                                }
                                                            });
                                                        }
                                                    </script>
                                                </td>
                                                @endunless
                                            </tr>
                                        @endif
                                    @endforeach
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
