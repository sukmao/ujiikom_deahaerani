@extends('layoutsadmin.app')
@section('contentadmin')

<section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Laporan Masuk</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Laporan Masuk</a></li>
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
                                <h3 class="card-title">Data Laporan Masuk</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                            <div class="row">
    <!-- Filter Berdasarkan Status -->
                                <div class="col-md-3 float-right">
                                    <label for="selectFilterStatus">Filter Berdasarkan Status</label>
                                    <select name="status" id="selectFilterStatus" class="form-control" onchange="this.form.submit()">
                                        <option value="">-- Filter Status --</option>
                                        <option value="0" {{ request('status') == 'o' ? 'selected' : '' }}>New</option>
                                        <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>Process</option>
                                        <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                                </div>

                                <!-- Filter Berdasarkan Kategori -->
                                <div class="col-md-3 float-right">
                                    <label for="selectFilterKategori">Filter Berdasarkan Kategori</label>
                                    <select name="kategori" id="selectFilterKategori" class="form-control" onchange="this.form.submit()">
                                        <option value="">-- Filter Kategori --</option>
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}" {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                                                {{ $kategori->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Form agar filter langsung submit -->
                            <form method="GET" action="{{ route('laporan') }}" id="filterForm">
                                @csrf
                                <button>filter</button>
                            </form>

                            <script>
                                // Auto-submit form saat filter berubah
                                document.getElementById("selectFilterStatus").addEventListener("change", function () {
                                    document.getElementById("filterForm").submit();
                                });

                                document.getElementById("selectFilterKategori").addEventListener("change", function () {
                                    document.getElementById("filterForm").submit();
                                });
                            </script>

                                <hr>
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>nama pengadu</th>
                                                    <th>Kategori Pengaduan</th>
                                                    <th>Tanggal Pengaduan</th>
                                                    <th>isi pengadu</th>
                                                    <th>foto</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php $no = 1; @endphp
                                                @foreach ($pengaduans as $index => $pengaduan)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $pengaduan->masyarakat->nama_lengkap ?? 'Tidak Ada Data' }}</td>
                                                        <td>{{ $pengaduan->kategori->nama_kategori ?? 'Tidak Ada Data' }}</td>
                                                        <td>{{ $pengaduan->tanggal_pengaduan }}</td>
                                                        <td>{{ $pengaduan->isi_pengaduan }}</td>
                                                        <td>
                                                        @if ($pengaduan->foto)
                                                            <img src="{{ Storage::url($pengaduan->foto) }}" alt="Foto Pengaduan" width="100">
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

                                            </tbody>
                                        </table>
                                        <div class="d-flex justify-content-center">
                                    {{ $pengaduans->links() }}
                                </div>
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
@endsection
