<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar Pengaduan</title>
    <!-- plugins:css -->
     <!-- Tambahkan ini di bagian head atau sebelum penutup body -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
    <link rel="stylesheet" href="../../assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.addons.css">
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
      <nav class="navbar default-layout col-lg-12 col-12 p-0  d-flex flex-row">
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
            <!-- Page Title Header Starts-->
<!-- Page Title Header Starts -->
<div class="row page-title-header">
    <div class="col-12">
        <div class="page-header d-flex justify-content-between align-items-center">
            <h4 class="page-title">Pengaduan</h4>
            
            <!-- Kontainer untuk Search & Export yang rata kanan -->
            <div class="d-flex ms-auto">
                <!-- Input Search -->
                <input type="text" class="form-control me-2" placeholder="Search Here" style="width: 200px;">
                
                <!-- Tombol Export -->
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownexport" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Export
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownexport">
                        <a class="dropdown-item" href="#">Export as PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Title Header Ends -->

<!-- Page Title Header Ends-->

             
              
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Daftar Pengaduan</h4>
                    <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                        <th>No</th>
                        <th>Judul Pengaduan</th>
                        <th>Nama Fasilitas</th>
                        <th>Gambar</th>
                        <th>Keluhan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($pengaduan as $index => $pengaduan)
                          <tr>
                            <td> {{ $index + 1 }} </td>
                            <td> {{ $pengaduan->no }} </td>
                            <td> {{ $pengaduan->judul_pengaduan}} </td>
                            <td> {{ $pengaduan->nama_fasilitas }} </td>
                            <td> {{ $pengaduan->gambar }} </td>
                            <td> {{ $pengaduan->keluhan }} </td>
                            <td> {{ $pengaduan->tanggal }} </td>
                            <td> {{ $pengaduan->status_pengaduan }} </td>
                            <td> {{ $pengaduan->aksi }} </td>
                            <td>
                          <td> 
                            <a href="" class="btn btn-sm btn-info mr-2">
                                <i class="mdi mdi-pencil"></i> Edit
                            </a>

                    <form action="" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="mdi mdi-delete"></i> Hapus
                        </button>
                    </form> </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
    

              
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="../../assets/js/shared/off-canvas.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../../assets/js/shared/jquery.cookie.js" type="text/javascript"></script>
    <!-- End custom js for this page-->
  </body>
</html>