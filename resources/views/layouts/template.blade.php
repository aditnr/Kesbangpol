<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title') - Kesbangpol</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets/img/logo.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome for Social Media Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="/assets/css/main.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-OgVRvuATP1z7Jj0p5zFfFfU1ZJmKsdYVu6xSOJ3+Ff6jsl6ug6mTqx0xF4X2Dmc4" crossorigin="anonymous">
</head>

<body class="index-page">
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="/" class="logo d-flex align-items-center me-auto">
        <img src="/assets/img/logo.png" alt="">
        <h1 class="sitename">KESBANGPOL</h1>
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/">Beranda<br></a></li>
          <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('home.index') }}#tentang">Tentang Kesbangpol</a></li>
              <li><a href="{{ route('home.index') }}#struktur">Struktur Organisasi</a></li>
              <li><a href="{{ route('home.pegawai') }}">Pegawai</a></li>
              <li><a href="{{ route('home.index') }}#tugas">Tugas dan Fungsi</a></li>
              <li><a href="{{ route('home.index') }}#visi">Visi Misi</a></li>
              <li><a href="{{ route('home.galeri') }}">Galeri</a></li>
            </ul>
          </li>

          <li class="dropdown"><a href=""><span>Informasi Publik</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{route('home.berita')}}">Berita</a></li>
              <li><a href="{{route('home.ikm')}}">IKM</a></li>
              <li><a href="{{route('home.lkip')}}">LKIP</a></li>
              <li><a href="{{route('home.renja')}}">RENJA</a></li>
              <li><a href="{{route('home.renstra')}}">RENSTRA</a></li>
              <li><a href="{{route('home.ormas')}}">Daftar Ormas</a></li>
              <li><a href="{{route('home.parpol')}}">Daftar Parpol</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href=""><span>PPID</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="https://ppid.tasikmalayakota.go.id/">PPID Utama</a></li>
              <li><a href="{{ route('permohonan_informasi.create') }}">Permohonan Informasi</a></li>
              <li><a href="{{ route('pengajuan_keberatan.create') }}">Pengajuan Keberatan</a></li>
              <li><a href="{{ route('informasi_berkala') }}">Informasi Berkala</a></li>
              <li><a href="daftar_informasi_publik">Daftar Informasi Publik</a></li>
              <li><a href="informasi_dikecualikan">Informasi Dikecualikan</a></li>
            </ul>
          </li>
          <li><a href="#kontak">Kontak<br></a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  @yield('content')

  <footer id="kontak" class="footer">
    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-12">
            <div class="container footer-top">
              <div class="row gy-4 mt-3 mb-5">
                <div class="col-lg-4 col-md-12">
                  <h4 style="color: #000000">Lokasi</h4>
                  <div class="maps-container">
                    <iframe id="gmap_canvas"
                      width="100%"
                      height="250"
                      style="border: 2px solid #000;"
                      allowfullscreen
                      loading="lazy"
                      src="{{ optional($kontak)->maps_url ?? 'https://maps.google.com/' }}">
                    </iframe>
                  </div>
                </div>
                <div class="col-lg-4 col-md-12 footer-links">
                  <h4 style="color: #000000">Kontak</h4>
                  @if(isset($kontak))
                  <ul style="list-style-type: none; padding: 0; margin: 0;">
                    <li>
                      <i class="bi bi-building" style="color: #000000"></i>
                      {{ $kontak->nama ?? 'Nama tidak tersedia' }}
                    </li>
                    <li>
                      <i class="bi bi-geo-alt" style="color: #000000"></i>
                      {{ $kontak->alamat ?? 'Alamat tidak tersedia' }}
                    </li>
                    <li>
                      <i class="bi bi-telephone" style="color: #000000"></i>
                      {{ $kontak->telepon ?? 'Telepon tidak tersedia' }}
                    </li>
                    <li>
                      <i class="bi bi-envelope" style="color: #000000"></i>
                      <a href="mailto:{{ $kontak->email }}" style="color: #ffffff;">
                        {{ $kontak->email ?? 'Email tidak tersedia' }}
                      </a>
                    </li>
                    <li>
                      <i class="bi bi-clock" style="color: #000000"></i>
                      {{ $kontak->hari_jam_buka ?? 'Hari & Jam buka tidak tersedia' }}
                    </li>
                  </ul>
                  @else
                  <p>Kontak tidak tersedia.</p>
                  @endif
                </div>
                <div class="col-lg-4 col-md-12">
                  <h4 style="color: #000000">Media sosial</h4>
                  <p>Terhubung dengan kami di platform sosial untuk mendapatkan update terkini, berita, dan informasi penting lainnya.</p>
                  <div class="social-links justify-content-center d-flex">
                    <a href="{{ $kontak->instagram ?? 'Instagram tidak tersedia' }}" class="me-3"><i class="bi bi-instagram" style="color: #ffffff"></i></a>
                    <a href="{{ $kontak->youtube ?? 'YouTube tidak tersedia' }}" class="me-3"><i class="bi bi-youtube" style="color: #ffffff"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="container copyright text-center">
              <p>Copyright &copy; <span id="year"></span>. <strong>DISKOMINFO Kota Tasikmalaya</strong> All Rights Reserved.</p>
            </div>
            <script>
              document.getElementById("year").textContent = new Date().getFullYear();
            </script>
          </div>
        </div>
      </div>
    </div>
  </footer>


  <!-- Scroll Top -->
  <a href="" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>
  <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="/assets/js/main.js"></script>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Pemuatan CSS DataTables -->
  <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">

  <!-- Pemuatan jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Pemuatan JS DataTables -->
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>


</body>

</html>