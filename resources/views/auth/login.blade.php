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

  <title>Login</title>

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
                <span class="app-brand-text demo text-heading fw-bold">Login Kesbangpol</span>
              </a>
            </div>

            @error('loginError')
            <div class="alert alert-danger">
              <strong>Error</strong>
              <p>{{ $message }}</p>
            </div>
            @enderror
            <form method="post">
              @csrf
              <div class="mb-6">
                <label for="username" class="form-label">Username</label>
                <input
                  type="text"
                  class="form-control"
                  id="username"
                  name="username"
                  placeholder="Enter your username"
                  autofocus />
                @error('username')
                <small style="color:red">{{ $message }}</small>
                @enderror
              </div>
              <div class="mb-6 form-password-toggle">
                <label class="form-label" for="password">Password</label>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password"
                    class="form-control"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"></span>
                </div>
                @error('password')
                <small style="color:red">{{ $message }}</small>
                @enderror
              </div>
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Core JS -->
  <script src="/admin/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="/admin/assets/vendor/libs/popper/popper.js"></script>
  <script src="/admin/assets/vendor/js/bootstrap.js"></script>
  <script src="/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="/admin/assets/vendor/js/menu.js"></script>


  <!-- Main JS -->
  <script src="/admin/assets/js/main.js"></script>

  <!-- Page JS -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>