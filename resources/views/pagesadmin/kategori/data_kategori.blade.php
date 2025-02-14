@extends('layoutsadmin.app')
@section('contentadmin')

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
                                <a href="tambah_kategori" class="btn float-right btn-outline-secondary btn-md">
                                    <li class="fa fa-plus"></li> Add Data Kategori
                                </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Kategori</th>
                                            <th>Deskripsi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach ($kategoris as $kategori)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $kategori->nama_kategori }}</td>
                                            <td>{{ $kategori->deskripsi }}</td>
                                            @unless(auth()->user()->role == 'petugas')

                                            <td>
                                                <a href="/edit_kategori/{{$kategori->id}}" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="javascript:void(0);" class="btn btn-danger"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Hapus"
                                                    onclick="confirmDeletion({{ $kategori->id }});">
                                                    <i class="fa fa-close color-danger">Hapus</i>
                                                </a>

                                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                    <script>
                                                        function confirmDeletion(id) {
                                                            Swal.fire({
                                                                title: 'Yakin ingin menghapus data ini?',
                                                                icon: 'warning',
                                                                showCancelButton: true,
                                                                confirmButtonColor: '#d33',
                                                                cancelButtonColor: '#3085d6',
                                                                confirmButtonText: 'Ya, hapus!',
                                                                cancelButtonText: 'Batal'
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    // Buat form secara dinamis untuk method DELETE
                                                                    const form = document.createElement('form');
                                                                    form.action = `/destroy_kategori/${id}`;
                                                                    form.method = 'POST';

                                                                    const csrfField = document.createElement('input');
                                                                    csrfField.type = 'hidden';
                                                                    csrfField.name = '_token';
                                                                    csrfField.value = '{{ csrf_token() }}';
                                                                    form.appendChild(csrfField);

                                                                    const methodField = document.createElement('input');
                                                                    methodField.type = 'hidden';
                                                                    methodField.name = '_method';
                                                                    methodField.value = 'DELETE';
                                                                    form.appendChild(methodField);

                                                                    document.body.appendChild(form);
                                                                    form.submit();
                                                                }
                                                            });
                                                        }
                                                    </script>

                                            </td>
                                            @endunless
                                        </tr>
                                        @endforeach

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
@endsection
