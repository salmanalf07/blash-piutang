<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blash Email</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets/img/binusicon.png" rel="icon">
  <link href="/assets/img/binus.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">
  <style>
    .layer3 {
      padding-left: 60px !important;
    }

    .blue span {
      color: #4154f1;
    }
  </style>


</head>

<body>
  <div id="pageloader">
    <img src="http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif" alt="processing..." />
  </div>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">

        <img src="/assets/img/ribbon.svg" alt="">
        <span class="d-none d-lg-block">Blash Email</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->





        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Auth::user()->name }}</h6>
              <!-- <span>LSC</span> -->
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/user/profile">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <li>
                <a class="dropdown-item d-flex align-items-cente-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                          this.closest('form').submit(); " role="button">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Sign Out</span>
                </a>
              </li>
            </form>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link {{ request()->is('dashboard') ? 'active' : 'collapsed'}}" href="/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <?php $link = ['reaktif', 'reak_history', 'infoautodebet', 'infoautodebet_history', 'hasilautodebet', 'hasilautodebet_history']; ?>
      <li class="nav-item">
        <a class="nav-link {{ request()->is($link) ? 'active' : 'collapsed'}}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Blash</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse {{ request()->is($link) ? 'show' : ''}}" data-bs-parent="#sidebar-nav">
          <li>
            <a class="nav-link {{ request()->is('reaktif','reak_history') ? 'blue' : 'collapsed'}}" data-bs-target="#reaktif-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-chevron-down" style="margin-right: 5px;"></i><span>Reaktif</span>
            </a>
            <ul id="reaktif-nav" class="nav-content collapse {{ request()->is('reaktif','reak_history') ? 'show' : ''}}">
              <li>
                <a class="layer3 {{ request()->is('reaktif') ? 'active' : ''}}" href="/reaktif">
                  <span>Dashboard</span>
                </a>
              </li>
              <li>
                <a class="layer3 {{ request()->is('reak_history') ? 'active' : ''}}" href="/reak_history">
                  <span>History</span>
                </a>
              </li>
            </ul>
          </li>
          <li>
            <a class="nav-link {{ request()->is('infoautodebet','infoautodebet_history') ? 'blue' : 'collapsed'}}" data-bs-target="#infoautodebet-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-chevron-down" style="margin-right: 5px;"></i><span>Info Next Autodebet</span>
            </a>
            <ul id="infoautodebet-nav" class="nav-content collapse {{ request()->is('infoautodebet','infoautodebet_history') ? 'show' : ''}}">
              <li>
                <a class="layer3 {{ request()->is('infoautodebet') ? 'active' : ''}}" href="/infoautodebet">
                  <span>Dashboard</span>
                </a>
              </li>
              <li>
                <a class="layer3 {{ request()->is('infoautodebet_history') ? 'active' : ''}}" href="/infoautodebet_history">
                  <span>History</span>
                </a>
              </li>
            </ul>
          </li>
          <li>
            <a class="nav-link {{ request()->is('hasilautodebet','hasilautodebet_history') ? 'blue' : 'collapsed'}}" data-bs-target="#hasilautodebet-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-chevron-down" style="margin-right: 5px;"></i><span>Info Hasil Autodebet</span>
            </a>
            <ul id="hasilautodebet-nav" class="nav-content collapse {{ request()->is('hasilautodebet','hasilautodebet_history') ? 'show' : ''}}">
              <li>
                <a class="layer3 {{ request()->is('hasilautodebet') ? 'active' : ''}}" href="/hasilautodebet">
                  <span>Dashboard</span>
                </a>
              </li>
              <li>
                <a class="layer3 {{ request()->is('hasilautodebet_history') ? 'active' : ''}}" href="/hasilautodebet_history">
                  <span>History</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>

  </aside><!-- End Sidebar-->

  @yield('konten')

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>IT BINUS UNIV. BEKASI 2022</span></strong>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/chart.js/chart.min.js"></script>
  <script src="/assets/vendor/echarts/echarts.min.js"></script>
  <script src="/assets/vendor/quill/quill.min.js"></script>
  <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>

</body>

</html>