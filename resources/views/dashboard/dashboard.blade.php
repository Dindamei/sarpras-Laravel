<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard Admin</title>
    <!-- plugins:css -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/ionicons/dist/css/ionicons.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.addons.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('assets/css/shared/style.css')}}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets/css/demo_1/style.css')}}">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="assets/images/downloadplotek.png" style="width: 500px; height: auto;" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="" href="">
            <img src="assets/images/AduinAja.png" alt="Aduin aja"  style="width: 85px; height: auto;" /> </a>
          
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
  <ul class="navbar-nav">
    <li class="nav-item font-weight-semibold d-none d-lg-block"></li>
  </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
      <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
      <img src="{{ Auth::user()->profile_picture }}" alt="Profile Picture" width="50">
      </a>
      <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
        <div class="dropdown-header text-center">
        <img src="{{ Auth::user()->profile_picture }}" alt="Profile Picture" width="50">
          <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->username }}</p>
          <p class="font-weight-light text-muted mb-0">{{ Auth::user()->email }}</p>
        </div>
        <a class="dropdown-item" href="{{ route('logout') }}" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          Log Out<i class="dropdown-item-icon ti-power-off"></i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </li>
  </ul>
  <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
    <span class="mdi mdi-menu"></span>
  </button>
</div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div style="color: white; text-align: left; font-weight: bold; padding: 40px; font-size: 20px;">
      Selamat Datang di Website Admin AduinAja
      </div>
          <ul class="nav">
              <a href="#" class="nav-link">
              </a>
            <li class="nav-item nav-category">Main Menu</li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pengaduan') }}">
                    <i class="menu-icon typcn typcn-document-text"></i>
                    <span class="menu-title">Pengaduan</span>
                    
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('history.index') }}">
                    <i class="menu-icon typcn typcn-shopping-bag"></i>
                    <span class="menu-title">History</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('rating.index') }}">
                    <i class="menu-icon typcn typcn-th-large-outline"></i>
                    <span class="menu-title">Rating</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.index') }}">
                    <i class="menu-icon typcn typcn-bell"></i>
                    <span class="menu-title">Master Data User</span>
                </a>
            </li>
        </ul>
    </nav>


        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
              <div class="col-12">
                <div class="page-header">
                  <h4 class="page-title">Dashboard</h4>
                  <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="row d-flex justify-content-center">
    <!-- Box Pengaduan Masuk -->
    <div class="col-md-2 mx-2">
        <div class="card shadow-sm">
            <div class="card-body d-flex flex-column align-items-center text-center py-4">
                <i class="fa-solid fa-inbox text-primary mb-2" style="font-size: 35px;"></i>
                <p class="mb-1 font-weight-bold">Pengaduan Masuk</p>
                <h4 class="font-weight-semibold">150</h4>
            </div>
        </div>
    </div>

    <!-- Box Pengaduan Diproses -->
    <div class="col-md-2 mx-2">
        <div class="card shadow-sm">
            <div class="card-body d-flex flex-column align-items-center text-center py-4">
                <i class="fa-solid fa-spinner text-warning mb-2" style="font-size: 35px;"></i>
                <p class="mb-1 font-weight-bold">Pengaduan Diproses</p>
                <h4 class="font-weight-semibold">120</h4>
            </div>
        </div>
    </div>

    <!-- Box Pengaduan Ditolak -->
    <div class="col-md-2 mx-2">
        <div class="card shadow-sm">
            <div class="card-body d-flex flex-column align-items-center text-center py-4">
                <i class="fa-solid fa-times-circle text-danger mb-2" style="font-size: 35px;"></i>
                <p class="mb-1 font-weight-bold">Pengaduan Ditolak</p>
                <h4 class="font-weight-semibold">50</h4>
            </div>
        </div>
    </div>

    <!-- Box Pengaduan Selesai -->
    <div class="col-md-2 mx-2">
        <div class="card shadow-sm">
            <div class="card-body d-flex flex-column align-items-center text-center py-4">
                <i class="fa-solid fa-check-circle text-success mb-2" style="font-size: 35px;"></i>
                <p class="mb-1 font-weight-bold">Pengaduan Selesai</p>
                <h4 class="font-weight-semibold">270</h4>
            </div>
        </div>
    </div>

    <!-- Box Total Pengguna -->
    <div class="col-md-2 mx-2">
        <div class="card shadow-sm">
            <div class="card-body d-flex flex-column align-items-center text-center py-4">
                <i class="fa-solid fa-users text-info mb-2" style="font-size: 35px;"></i>
                <p class="mb-1 font-weight-bold">Total Pengguna</p>
                <h4 class="font-weight-semibold">460</h4>
            </div>
        </div>
    </div>
</div>




                    
                 
           
                 
                 
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('assets/vendors/js/vendor.bundle.addons.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{asset('assets/js/shared/off-canvas.js')}}"></script>

    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('assets/js/demo_1/dashboard.js')}}"></script>
    <!-- End custom js for this page-->
    <script src="{{asset('assets/js/shared/jquery.cookie.js')}}" type="text/javascript"></script>
  </body>
</html>