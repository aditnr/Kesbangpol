<!doctype html>
<html
  lang="en"
  class="light-style layout-wide customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="/admin/assets/"
  data-template="vertical-menu-template-free"
  data-style="light">

<head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Register</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="/admin/assets/img/logo.png" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="/admin/assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="/admin/assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="/admin/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="/admin/assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="/admin/assets/vendor/css/pages/page-auth.css" />

  <!-- Helpers -->
  <script src="/admin/assets/vendor/js/helpers.js"></script>
  <script src="/admin/assets/js/config.js"></script>
</head>

<body>
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <div class="card px-sm-6 px-0">
          <div class="card-body">
            <div class="app-brand justify-content-center">
              <a href="" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                  <img src="/admin/assets/img/logo.png" alt="" style="width: 30px; height: auto;">
                </span>
                <span class="app-brand-text demo text-heading fw-bold">Register Kesbangpol</span>
              </a>
            </div>
            <form action="{{ route('register') }}" method="POST">
              @csrf
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
              </div>
              <button type="submit" class="btn btn-primary">Register</button>
            </form>
            <p class="text-center">
              Already have an account? <a href="{{ route('login') }}">Login</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="/admin/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="/admin/assets/vendor/libs/popper/popper.js"></script>
  <script src="/admin/assets/vendor/js/bootstrap.js"></script>
  <script src="/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="/admin/assets/vendor/js/menu.js"></script>
  <script src="/admin/assets/js/main.js"></script>
</body>

</html>