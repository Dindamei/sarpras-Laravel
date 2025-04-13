<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Master Data User</title>
    <!-- plugins:css -->
     <!-- Tambahkan ini di bagian head atau sebelum penutup body -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/ionicons/dist/css/ionicons.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.addons.css')}}">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('assets/css/shared/style.css')}}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets/css/demo_1/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.9/typicons.css">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="assets/images/downloadplotek.png" />
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
            <div class="row page-title-header">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="page-title">Data User</h4>
            <a href="{{ route('user.create') }}" class="btn btn-primary">
                <i class="mdi mdi-plus-circle"></i> Tambah User
            </a>
        </div>
    </div>
</div>

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Daftar User</h4>
                    
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session('success') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif
                    
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> No </th>
                            <th> Username </th>
                            <th> Email </th>
                            <th> Role </th>
                            <th> Aksi </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                            <a href="#" class="btn btn-sm btn-info mr-2" data-toggle="modal" data-target="#editUserModal" onclick="loadUserData('{{ $user->id_user }}')">
                                <i class="mdi mdi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('user.destroy', $user->id_user) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="mdi mdi-delete"></i> Hapus
                        </button>
                    </form>
                            <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="editUserForm">
                @csrf
                @method('PUT')
                <input type="hidden" id="user_id" name="id_user">

                <div class="form-group row mb-3">
                    <label for="username" class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="role" class="col-sm-3 col-form-label">Role</label>
                    <div class="col-sm-9">
                        <select name="role" id="role" class="form-control">
                            <option value="Super Admin">Super Admin</option>
                            <option value="Admin">Admin</option>
                            <option value="Pengelola Sarpras">Pengelola Sarpras</option>
                            <option value="Pengguna">Pengguna</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-sm-9 offset-sm-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function loadUserData(id) {
        $.ajax({
            url: '/user/' + id + '/edit',
            type: 'GET',
            success: function(response) {
                $('#user_id').val(response.id_user);
                $('#username').val(response.username);
                $('#email').val(response.email);
                $('#role').val(response.role);
                $('#editUserModal').modal('show'); // Tampilkan modal
            },
            error: function(xhr) {
                alert("Gagal mengambil data! " + xhr.responseText);
            }
        });
    }

    $('#editUserForm').submit(function(e) {
        e.preventDefault();
        let id = $('#user_id').val();
        let formData = $(this).serialize(); // Ambil semua data form

        $.ajax({
            url: '/user/' + id,
            type: 'PUT', // Laravel tidak menerima PUT langsung dari form biasa
            data: formData,
            success: function(response) {
                alert('Data berhasil diperbarui!');
                $('#editUserModal').modal('hide'); // Tutup modal setelah update
                location.reload(); // Refresh halaman agar data diperbarui
            },
            error: function(xhr) {
                alert("Gagal memperbarui data! " + xhr.responseText);
            }
        });
    });
</script>                
           </td>
            </tr>
            @endforeach
                          
                          @if(count($users) == 0)
                          <tr>
                            <td colspan="5" class="text-center">Tidak ada data user</td>
                          </tr>
                          @endif
                        </tbody>
                      </table>
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