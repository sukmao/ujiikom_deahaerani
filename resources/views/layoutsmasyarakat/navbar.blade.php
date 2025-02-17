  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">APM {{ auth()->user()->nama_lengkap }}</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#featured-services">information</a></li>
          <li><a class="nav-link scrollto" href="#pengaduan">pengaduan</a></li>
          <li><a class="nav-link scrollto" href="#datapengaduan">data pengaduan</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontak Kami</a></li>
          <li>
            @if (auth()->login ?? 'login')
                <a href="/logout">logout</a>
            @else
                <a class="nav-link scrollto" href="/login">Register / Login</a>
            @endif
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
