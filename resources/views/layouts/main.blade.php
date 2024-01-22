<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Perpustakaan Digital</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/library.svg') }}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
    class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="#" class="app-brand-link">
            <span class="app-brand-logo demo">
              <svg width="800px" height="800px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">

                <g data-name="18_Online Library" id="_18_Online_Library">

                  <path d="M59,52H5a1,1,0,0,1-1-1V16a3,3,0,0,1,3-3H57a3,3,0,0,1,3,3V51A1,1,0,0,1,59,52Z"
                    style="fill:#0455bf" />

                  <path
                    d="M42,50A36,36,0,0,1,6,14H6a2.943,2.943,0,0,1,.141-.859A2.993,2.993,0,0,0,4,16V51a1,1,0,0,0,1,1H59a1,1,0,0,0,1-1V50Z"
                    style="fill:#004787" />

                  <path d="M55,48H9a1,1,0,0,1-1-1V18a1,1,0,0,1,1-1H55a1,1,0,0,1,1,1V47A1,1,0,0,1,55,48Z"
                    style="fill:#fdfeff" />

                  <path d="M14,45l32,.039h0a1,1,0,0,0,1-1V17H13V44A1,1,0,0,0,14,45Z" style="fill:#b8ced3" />

                  <path d="M48,40.039h0L16,40a1,1,0,0,1-1-1V5a3,3,0,0,1,3-3H46a3,3,0,0,1,3,3V39.039a1,1,0,0,1-1,1Z"
                    style="fill:#03a65a" />

                  <path d="M17.614,39.922A1,1,0,0,1,17,39V5a3,3,0,0,1,3-3H18a3,3,0,0,0-3,3V39a1,1,0,0,0,1,1l1.615,0Z"
                    style="fill:#027d44" />

                  <path d="M26,16a1,1,0,0,1-.556-.169L23.005,14.2l-2.451,1.631A1,1,0,0,1,19,15V2h8V15a1,1,0,0,1-1,1Z"
                    style="fill:#027d44" />

                  <path d="M27,15a1,1,0,0,1-.556-.169L24.005,13.2l-2.451,1.631A1,1,0,0,1,20,14V2h8V14a1,1,0,0,1-1,1Z"
                    style="fill:#febc00" />

                  <path d="M22,14V2H20V14a1,1,0,0,0,1.554.833l.564-.375A.99.99,0,0,1,22,14Z" style="fill:#edaa03" />

                  <rect height="2" style="fill:#febc00" width="6" x="39" y="27" />

                  <rect height="2" style="fill:#febc00" width="6" x="39" y="31" />

                  <rect height="2" style="fill:#febc00" width="2" x="35" y="27" />

                  <rect height="2" style="fill:#febc00" width="2" x="35" y="31" />

                  <path d="M53,60H11a9.01,9.01,0,0,1-9-9,1,1,0,0,1,1-1H61a1,1,0,0,1,1,1A9.01,9.01,0,0,1,53,60Z"
                    style="fill:#0455bf" />

                  <path
                    d="M55,58H13a9.01,9.01,0,0,1-8.941-8H3a1,1,0,0,0-1,1,9.01,9.01,0,0,0,9,9H53a8.984,8.984,0,0,0,7.276-3.724A8.942,8.942,0,0,1,55,58Z"
                    style="fill:#004787" />

                  <rect height="4" style="fill:#004787" width="2" x="13" y="13" />

                  <path
                    d="M18.5,36H49a0,0,0,0,1,0,0v5a2,2,0,0,1-2,2H18.5A3.5,3.5,0,0,1,15,39.5v0A3.5,3.5,0,0,1,18.5,36Z"
                    style="fill:#fdfeff" />

                  <path
                    d="M20.72,41a3.7,3.7,0,0,1-3.57-2.517,3.358,3.358,0,0,1,.092-2.241,3.494,3.494,0,0,0-2.225,3.606A3.617,3.617,0,0,0,18.672,43H47a2,2,0,0,0,2-2H20.72Z"
                    style="fill:#dfeaef" />

                  <polygon points="38 53 26 53 24 50 40 50 38 53" style="fill:#febc00" />

                  <path d="M25.667,50H24l2,3H38l.667-1H29.4A4.492,4.492,0,0,1,25.667,50Z" style="fill:#edaa03" />

                </g>

              </svg>

            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">DigiLab</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item {{ (request()->is('dashboard')) ? 'active' : '' }}">
            <a href="/dashboard" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>

          <!-- Pages -->
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Halaman</span>
          </li>
          <li class="menu-item" id="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-detail"></i>
              <div data-i18n="Form Master">Form Master</div>
            </a>
            <ul class="menu-sub">

              <li class="menu-item {{ (request()->is('kategoribuku')) ? 'active' : '' }}">
                <a href="{{route('kategoribuku.index')}}" class="menu-link">
                  <div data-i18n="Kategori">Kategori Buku</div>
                </a>
              </li>
              <li class="menu-item {{ (request()->is('buku')) ? 'active' : '' }}">
                <a href="{{route('buku.index')}}" class="menu-link">
                  <div data-i18n="Book">Buku</div>
                </a>
              </li>
              <li class="menu-item {{ (request()->is('user')) ? 'active' : '' }}">
                <a href="{{route('user.index')}}" class="menu-link">
                  <div data-i18n="User">User</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item" id="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-detail"></i>
              <div data-i18n="Form Transaksi">Form Transaksi</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="auth-login-basic.html" class="menu-link" target="_blank">
                  <div data-i18n="Basic">Login</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="auth-register-basic.html" class="menu-link" target="_blank">
                  <div data-i18n="Basic">Register</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="auth-forgot-password-basic.html" class="menu-link" target="_blank">
                  <div data-i18n="Basic">Forgot Password</div>
                </a>
              </li>
            </ul>
          </li>

          <!-- Report -->
          <li class="menu-header small text-uppercase"><span class="menu-header-text">Laporan</span></li>
          <!-- Cards -->

          <!-- Extended components -->
          <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-copy"></i>
              <div data-i18n="Extended UI">Laporan</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="#" class="menu-link">
                  <div data-i18n="Perfect Scrollbar">Laporan Data Buku</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="#" class="menu-link">
                  <div data-i18n="Text Divider">Laporan Data Peminjam</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="#" class="menu-link">
                  <div data-i18n="Text Divider">Laporan Data Peminjaman</div>
                </a>
              </li>
            </ul>
          </li>


        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
                  aria-label="Search..." />
              </div>
            </div>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- Place this tag where you want the button to render. -->
              <li class="nav-item lh-1 me-3">
                <a class="github-button" href="https://github.com/themeselection/sneat-html-admin-template-free"
                  data-icon="octicon-star" data-size="large" data-show-count="true"
                  aria-label="Star themeselection/sneat-html-admin-template-free on GitHub">Star</a>
              </li>

              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt
                              class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block">John Doe</span>
                          <small class="text-muted">Admin</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-cog me-2"></i>
                      <span class="align-middle">Settings</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <span class="d-flex align-items-center align-middle">
                        <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                        <span class="flex-grow-1 align-middle">Billing</span>
                        <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                      </span>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="auth-login-basic.html">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Log Out</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            @yield('content')
          </div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->


  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="{{ asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
  <script src="{{ asset('assets/vendor/libs/popper/popper.js')}}"></script>
  <script src="{{ asset('assets/vendor/js/bootstrap.js')}}"></script>
  <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

  <script src="{{ asset('assets/vendor/js/menu.js')}}"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

  <!-- Main JS -->
  <script src="{{ asset('assets/js/main.js')}}"></script>

  <!-- Page JS -->
  <script src="{{ asset('assets/js/dashboards-analytics.js')}}"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js')}}"></script>
  {{-- <script>
    $(document).ready(function() {
      $('.menu-item').click(function() {
        $('.menu-item').removeClass('active');
        $(this).addClass('active');
      });
    });
  </script> --}}
  <script>
    setTimeout(function() {
                    document.getElementById('notification').style.display = 'none';
                }, 5000); // Menutup notifikasi setelah 5 detik (5000 milidetik)
  </script>
</body>

</html>