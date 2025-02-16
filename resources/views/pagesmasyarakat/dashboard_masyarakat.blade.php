@extends('layoutsmasyarakat.app')
@section('contentmasyarakat')


<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1>Aplikasi Pengaduan Online</h1>
                <h5>Sampaikan aduanmu sekarang, dan kami siap menanggapi secara cepat.</h5>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img">
                <img src="assetsuser/img/hero-img.png" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container">

        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="icon-box">
                <div class="icon"><i class="bi bi-laptop"></i></div>
              <h4 class="title"><a href="">Pelayanan 24 Jam</a></h4>
              <p class="description">Pelayanan selama 24 jam, sampaikan aduan anda kapan saja, dimana saja dan jam
                berapa saja.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
                <div class="icon"><i class="bi bi-card-checklist"></i></div>
                <h4 class="title"><a href="">Identitas terlindungi</a></h4>
                <p class="description">Setiap data Identitas pengaduan yang dilakukan oleh masyarakat kami lindungi secara
                aman </p>
            </div>
        </div>
          <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
            <div class="icon-box">
                <div class="icon"><i class="bi bi-clipboard-data"></i></div>
                <h4 class="title"><a href="">Penanganan Cepat</a></h4>
                <p class="description">Penanganan pengaduan yang di sampaikan, akan kami proses secara cepat</p>
            </div>
        </div>
        </div>

    </div>
</section><!-- End Featured Services Section -->

<!-- ======= Counts Section ======= -->
<section id="counts" class="counts">
    <div class="container mt-5">

        <div class="row counters">

          <div class="col-lg-4 col-6 text-center">
              <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1"
              class="purecounter"></span>
            <p>Masyarakat</p>
          </div>

          <div class="col-lg-4 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="1200" data-purecounter-duration="1"
              class="purecounter"></span>
            <p>Pengaduan</p>
          </div>

          <div class="col-lg-4 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="100" data-purecounter-duration="1"
              class="purecounter"></span>
            <p>Kategori Pengaduan</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->
    <hr>
    <section id="pengaduan" class="register" style="background-color: #efc6c6;">
      <div class="container" >
        <div class="row" >

    <div class="col-lg-12 pt-4 pt-lg-0">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title text-center">Form Pengaduan</h4>
        </div>
        <div class="card-body">
        <div class="col-lg-6">
          <form action="/store/laporan" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-6">

                        <input type="hidden" value="{{ auth()->user()->id }}" name="masyarakat_id" id="masyarakat_id">


                        </div>
                        <div class="col-md-12">
                            <label for="kategori_id" class="form-label fw-semibold">Masukan Kategori</label>
                            <select name="kategori_id" class="form-control" required>
                                <option value="{{old('kategori_id')}}">-- Pilih Kategori --</option>
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">

                        <div class="col-md-12">
                            <label for="tanggal_pengaduan" class="form-label fw-semibold">Tanggal Pengaduan</label>
                            <input type="date" value="{{ old('tanggal_pengaduan') }}" name="tanggal_pengaduan" id="tanggal_pengaduan" class="form-control form-control-lg" placeholder="Masukkan tanggal_pengaduan" >
                            @error('tanggal_pengaduan')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="col-12 mb-3">
                            <label for="foto">Upload Foto (Opsional)</label>
                            <input type="file" id="foto" name="foto" class="form-control" accept="image/png, image/jpeg, image/jpg">
                            @error('foto')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>




                    </div>


                    <div class="row mb-4">
                    <div class="col-12 mb-3">
                            <label for="isi_pengaduan">Isi Pengaduan</label>
                            <textarea name="isi_pengaduan" class="form-control" rows="6" placeholder="Deskripsi Pengaduan Anda" >{{ old('isi_pengaduan') }}</textarea>
                            @error('isi_pengaduan')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                    </div>



                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-lg w-100">Simpan Data Laporan</button>
                    </div>
                </form>

          </div>
        </div>
    </div>
</div>

        </div>
      </div>
    <hr>
    </section>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <section id="datapengaduan" class="create_pengaduan section" style="background-color: #efc6c6;">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Daftar Pengaduan</h2>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Masyarakat</th>
                            <th>Kategori Pengaduan</th>
                            <th>Tanggal Pengaduan</th>
                            <th>Isi Laporan</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th class="{{ auth()->user()->role == 'masyarakat' ? 'd-none' : '' }}">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $no = 1; @endphp
                    @foreach ($pengaduans as $index => $pengaduan)
                        <tr>
                            <td>{{ $pengaduans->firstItem() + $index }}</td>
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
                                @if(in_array($pengaduan->status, ['diproses', 'selesai', 'ditolak']))
                                    <a href="/tanggapandariadmin/{{$pengaduan->id}}">
                                        <span class="badge
                                            @if($pengaduan->status == 'diproses') bg-info
                                            @elseif($pengaduan->status == 'selesai') bg-success
                                            @elseif($pengaduan->status == 'ditolak') bg-danger
                                            @endif">
                                            {{ ucfirst($pengaduan->status) }}
                                        </span>
                                    </a>
                                @else
                                    <span class="badge bg-warning">
                                        Belum Ada Respon
                                    </span>
                                @endif
                            </td>

                            @if(auth()->user()->role !== 'masyarakat')
                                <td>
                                    <a href="{{ route('admin.tanggapan.create', ['id' => $pengaduan->id]) }}" class="btn btn-warning btn-sm">c</a>
                                    <a href="/edit_pengaduan/{{$pengaduan->id}}" class="btn btn-sm btn-info mt-1">E</a>
                                    <form action="" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus pengaduan ini?')">H</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $pengaduans->links() }}
        </div>
    </div>
</section >

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" style="background-color: #efc6c6;">
      <div class="container">

        <div class="section-title">
          <span>Kontak Kami</span>
          <h2>Kontak Kami</h2>
        </div>

        <div class="row">

          <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                  <i class="bi bi-geo-alt"></i>
                <h4>Alamat:</h4>
                <p>Jl. Banyu Mengalir No. 123 Jawa Barat KP. 12345</p>
              </div>

              <div class="email">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                <p>info@apm.com</p>
              </div>

              <div class="phone">
                  <i class="bi bi-phone"></i>
                  <h4>Call Center:</h4>
                  <p>+1 1233456788</p>
                </div>

              <iframe
              src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
              frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>
        </div>
        </div>

    </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->


@endsection
