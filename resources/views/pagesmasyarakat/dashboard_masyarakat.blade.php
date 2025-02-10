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
    <section id="pengaduan" class="register">
      <div class="container">
        <div class="row">

    <div class="col-lg-12 pt-4 pt-lg-0">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title text-center">Form Pengaduan</h4>
        </div>
        <div class="card-body">
            <form action="/pengaduan/store" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Hidden field for logged-in user -->
                <input type="hidden" name="textNamaLogin" value="">

                <!-- Kategori Pengaduan -->
                <div class="form-group mt-3">
                    <label for="kategori_id">Kategori Pengaduan</label>
                    <select name="kategori_id" class="form-control">
                        <option value="1">Kategori 1</option>
                        <option value="2">Kategori 2</option>
                        <option value="3">Kategori 3</option>
                    </select>
                </div>

                <!-- Tanggal Pengaduan -->
                <div class="form-group mt-3">
                    <label for="tanggal_pengaduan">Tanggal Pengaduan</label>
                    <input type="date" name="tanggal_pengaduan" class="form-control">
                </div>

                <!-- Foto Pengaduan -->
                <div class="form-group mt-3">
                    <label for="foto">Foto Pengaduan</label>
                    <input type="file" name="foto" class="form-control-file">
                </div>

                <!-- Isi Pengaduan -->
                <div class="form-group mt-3">
                    <label for="isi_pengaduan">Isi Pengaduan</label>
                    <textarea name="isi_pengaduan" class="form-control" rows="4" placeholder="Tulis pengaduan Anda di sini"></textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success btn-md mt-4 btn-block">
                    <i class="bi bi-card-checklist"></i> Kirim Pengaduan
                </button>
            </form>
        </div>
    </div>
</div>

        </div>
      </div>
    <hr>
    </section>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
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
