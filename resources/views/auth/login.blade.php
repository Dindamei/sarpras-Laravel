<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Pengaduan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body.my-login-page {
            background-image: url("{{ asset('assets/images/poltek22.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
        }

    .login-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .card-body {
        padding: 40px;
    }

    .form-group label {
        font-weight: 600;
        color: #333;
    }


    .form-control {
        border-radius: 8px;
        padding: 12px;
        border: 1px solid #ced4da;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-control:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .btn-primary {
        border-radius: 8px;
        padding: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4);
    }
    .input-group-text {
        border-top-right-radius: 8px;
        border-bottom-right-radius: 8px;
        cursor: pointer;
    }
    .login-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 30px;
    text-transform: uppercase;
    letter-spacing: 2px;
    position: relative;
    padding-bottom: 15px;
}

.login-title::after {
    content: '';
    position: absolute;
    left: 50%;
    bottom: 0;
    transform: translateX(-50%);
    height: 4px;
    width: 50px;
    background-color: #007bff; /* Sesuaikan dengan warna tema Anda */
    border-radius: 2px;
}
.login-title::before {
    content: ''; /* Hapus emoji */
    display: inline-block;
    width: 45px; /* Lebar gambar */
    height: 45px; /* Tinggi gambar */
    margin-right: 10px;
    vertical-align: middle;
    background-image: url("{{ asset('assets/images/downloadplotek.png') }}"); /* Path ke gambar */
    background-size: contain; /* Sesuaikan ukuran gambar */
    background-repeat: no-repeat; /* Hindari pengulangan gambar */
    background-position: center; /* Pusatkan gambar */
}


    </style>
</head>
<body class="my-login-page">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="card login-card">
                <div class="card-body">
                    <h4 class="card-title text-center login-title">Login</h4>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @if($errors->has('username'))
                                {{ $errors->first('username') }}
                            @endif
                            @if($errors->has('password'))
                                {{ $errors->first('password') }}
                            @endif
                        </div>
                    @endif

                    <form method="POST" action="login">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input id="username" type="text" value="{{ old('username') }}" name="username" class="form-control"  placeholder="Masukkan Username Anda">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input id="password" type="password" value="{{ old('password') }}" name="password" class="form-control" placeholder="Masukkan Password Anda">
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="togglePassword()">
                                        <i class="fas fa-eye" id="toggleEye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group m-0">
                            <button type="submit" class="btn btn-primary btn-block">
                                Login
                            </button>
                        </div>
                        <div class="form-group mt-3 text-center">
    <a href="{{ route('auth.google') }}" class="btn btn-light btn-block text-secondary border">
    <img src="https://fonts.gstatic.com/s/i/productlogos/googleg/v6/24px.svg" 
         alt="Google Logo" 
         style="width: 20px; height: 20px; margin-right: 8px;"> Login with Google
    </a>
</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</a>

    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var toggleEye = document.getElementById("toggleEye");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleEye.classList.remove("fa-eye");
                toggleEye.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                toggleEye.classList.remove("fa-eye-slash");
                toggleEye.classList.add("fa-eye");
            }
        }
    </script>
</body>
</html>
