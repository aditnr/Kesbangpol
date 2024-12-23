<!doctype html>
<html
  lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="/admin/assets/"
  data-template="vertical-menu-template-free"
  data-style="light">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>@yield('title') Kesbangpol</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="/admin/assets/img/logo.png" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="/admin/assets/vendor/fonts/boxicons.css" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


  <!-- Core CSS -->
  <link rel="stylesheet" href="/admin/assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="/admin/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="/admin/assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="/admin/assets/vendor/libs/apex-charts/apex-charts.css" />

  <!-- Page CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Helpers -->
  <script src="/admin/assets/vendor/js/helpers.js"></script>
  <script src="/admin/assets/js/config.js"></script>



</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="/dashboard" class="app-brand-link">
            <span class="app-brand-logo demo">
              <img src="/admin/assets/img/logo.png" alt="" style="width: 30px; height: auto;">
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">Kesbangpol</span>
          </a>
          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
          </a>
        </div>
        <div class="menu-inner-shadow"></div>
        <ul class="menu-inner py-1">
          <!-- Dashboards -->
          <li class="menu-item active open">
            <a href="dashboard" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-smile"></i>
              <div class="text-truncate" data-i18n="Dashboard">Dashboard</div>
            </a>
          </li>
          <!-- Layouts -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-user"></i>
              <div class="text-truncate" data-i18n="Layouts">Profil</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="/tentang" class="menu-link">
                  <div class="text-truncate" data-i18n="Without menu">Tentang</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="/struktur" class="menu-link">
                  <div class="text-truncate" data-i18n="Without navbar">Struktur</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="/pegawais" class="menu-link">
                  <div class="text-truncate" data-i18n="Fluid">Pegawai</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="/tugas" class="menu-link">
                  <div class="text-truncate" data-i18n="Container">Tugas dan fungsi</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="visi" class="menu-link">
                  <div class="text-truncate" data-i18n="Blank">Visi Misi</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="/galeris" class="menu-link">
                  <div class="text-truncate" data-i18n="Blank">Galeri</div>
                </a>
              </li>
            </ul>
          </li>
          <!-- Front Pages -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-info-circle"></i>
              <div class="text-truncate" data-i18n="Front Pages">Informasi</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="/beritas" class="menu-link">
                  <div class="text-truncate" data-i18n="Without menu">Berita</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="/ikms" class="menu-link">
                  <div class="text-truncate" data-i18n="Without navbar">IKM</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="/lkips" class="menu-link">
                  <div class="text-truncate" data-i18n="Fluid">LKIP</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="/renjas" class="menu-link">
                  <div class="text-truncate" data-i18n="Container">RENJA</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="/renstras" class="menu-link">
                  <div class="text-truncate" data-i18n="Blank">RENSTRA</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="/ormass" class="menu-link">
                  <div class="text-truncate" data-i18n="Blank">Daftar Ormas</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="/parpols" class="menu-link">
                  <div class="text-truncate" data-i18n="Blank">Daftar Parpol</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-git-pull-request"></i>
              <div class="text-truncate" data-i18n="Front Pages">PPID</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="" class="menu-link">
                  <div class="text-truncate" data-i18n="Without menu">PPID Utama</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="/permohonan_informasi" class="menu-link">
                  <div class="text-truncate" data-i18n="Without navbar">Permohonan Informasi</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="/pengajuan_keberatan" class="menu-link">
                  <div class="text-truncate" data-i18n="Fluid">Pengajuan Keberatan</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="/informasi_berkalas" class="menu-link">
                  <div class="text-truncate" data-i18n="Fluid">Informasi Berkala</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="/daftar_informasi_publiks" class="menu-link">
                  <div class="text-truncate" data-i18n="Fluid">Daftar Informasi Publik</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="/informasi_dikecualikans" class="menu-link">
                  <div class="text-truncate" data-i18n="Fluid">Informasi Dikecualikan</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="/kontak" class="menu-link">
              <i class="menu-icon tf-icons bx bx-phone"></i>
              <div class="text-truncate" data-i18n="Contact">Kontak</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="/" target="_blank" class="menu-link">
              <i class="menu-icon tf-icons bx bx-link-external"></i>
              <div class="text-truncate" data-i18n="Lihat Website">Lihat Website</div>
            </a>
          </li>
        </ul>
      </aside>
      <div class="layout-page">
        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
              <i class="bx bx-menu bx-md"></i>
            </a>
          </div>
          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <h4 class="card-title text-primary">@yield('title')<h4>
              </div>
            </div>
            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="/admin/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="/admin/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <h6 class="mb-0">{{ Auth::user()->username }}</h6>
                          <small class="text-muted">Kesbangpol</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider my-1"></div>
                  </li>
                  <li class="bg-danger">
                    <a class="dropdown-item" href="{{route('logout')}}">
                      <i class="bx bx-power-off bx-md me-3"></i><span>Log Out</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
              <div class="col-xxl-8 mb-6 order-0">
                <div class="card">
                  <div class="d-flex align-items-start row">
                    <div class="col-sm-12">
                      <div class="card-body">

                        @yield('content')

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
              <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                <div class="text-body">
                  <p>Copyright &copy; <span id="year"></span>. <strong>DISKOMINFO Kota Tasikmalaya</strong> All Rights Reserved.</p>
                </div>
                <script>
                  document.getElementById("year").textContent = new Date().getFullYear();
                </script>
              </div>
            </div>
          </footer>
          <div class="content-backdrop fade"></div>
        </div>
      </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->

  <script src="/admin/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="/admin/assets/vendor/libs/popper/popper.js"></script>
  <script src="/admin/assets/vendor/js/bootstrap.js"></script>
  <script src="/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="/admin/assets/vendor/js/menu.js"></script>

  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="/admin/assets/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="/admin/assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="/admin/assets/js/dashboards-analytics.js"></script>

  <!-- Place this tag before closing body tag for github widget button. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>


</body>

</html>