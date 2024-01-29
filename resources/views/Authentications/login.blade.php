<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

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
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />
    <!-- Helpers -->
   <!-- Helpers -->
<script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="{{ asset('assets/js/config.js') }}"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="#" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                    <svg width="800px" height="800px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                    
                        <g data-name="18_Online Library" id="_18_Online_Library">
                    
                            <path d="M59,52H5a1,1,0,0,1-1-1V16a3,3,0,0,1,3-3H57a3,3,0,0,1,3,3V51A1,1,0,0,1,59,52Z" style="fill:#0455bf" />
                    
                            <path
                                d="M42,50A36,36,0,0,1,6,14H6a2.943,2.943,0,0,1,.141-.859A2.993,2.993,0,0,0,4,16V51a1,1,0,0,0,1,1H59a1,1,0,0,0,1-1V50Z"
                                style="fill:#004787" />
                    
                            <path d="M55,48H9a1,1,0,0,1-1-1V18a1,1,0,0,1,1-1H55a1,1,0,0,1,1,1V47A1,1,0,0,1,55,48Z" style="fill:#fdfeff" />
                    
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
                    
                            <path d="M18.5,36H49a0,0,0,0,1,0,0v5a2,2,0,0,1-2,2H18.5A3.5,3.5,0,0,1,15,39.5v0A3.5,3.5,0,0,1,18.5,36Z"
                                style="fill:#fdfeff" />
                    
                            <path
                                d="M20.72,41a3.7,3.7,0,0,1-3.57-2.517,3.358,3.358,0,0,1,.092-2.241,3.494,3.494,0,0,0-2.225,3.606A3.617,3.617,0,0,0,18.672,43H47a2,2,0,0,0,2-2H20.72Z"
                                style="fill:#dfeaef" />
                    
                            <polygon points="38 53 26 53 24 50 40 50 38 53" style="fill:#febc00" />
                    
                            <path d="M25.667,50H24l2,3H38l.667-1H29.4A4.492,4.492,0,0,1,25.667,50Z" style="fill:#edaa03" />
                    
                        </g>
                    
                    </svg>
                  </span>
                  <span class="app-brand-text demo text-body fw-bolder">Digital Library</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Welcome to Digital Library! 👋</h4>
              <p class="mb-4">Please sign-in to your account and start the adventure</p>

              <form id="formAuthentication" class="mb-3" action="{{ route('login.post') }}" method="POST">
                {{ csrf_field() }}
                <div class="mb-3">
                  <label for="Email" class="form-label">Email or Username</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="Email"
                    placeholder="Enter your email or username"
                    autofocus
                  />
                  @error('Email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="Password">Password</label>
                    <a href="#">
                      <small>Forgot Password?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="Password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    @error('Password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
              </form>

              <p class="text-center">
                <span>New on our platform?</span>
                <a href="auth-register-basic.html">
                  <span>Create an account</span>
                </a>
              </p>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->

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
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>
        setTimeout(function() {
                        document.getElementById('notification').style.display = 'none';
                    }, 5000); // Menutup notifikasi setelah 5 detik (5000 milidetik)
    </script>
    @yield('js')
  </body>
</html>