<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .min-vh-100 {
            min-height: 100vh !important;
        }
        .banner {
            background: url("{{ asset('Images/BlueAbs.jpg') }}") no-repeat center center/cover;
            position: relative;
        }
        .banner::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(58, 145, 195, 0.7);
        }
        .banner-content {
            position: relative;
            z-index: 2;
        }
        .btn {
            background-color: #3A91C3;
            border: none;
            transition: background-color 0.3s ease ;
        }
        .hv {
            color: #3A91C3;
            text-decoration: none;
            transition: color 0.3s ease ;
        }
        .btn:hover,
        .btn:focus {
            background-color: #2C6E8C;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row min-vh-100">
            <!-- Left side banner -->
            <div class="col-md-6 d-none d-md-flex banner text-white align-items-center justify-content-center">
                <div class="banner-content text-center px-4">
                    <h4 class="fw-bold">"Pendidikan adalah kunci masa depan"</h4>
                    <p>Bergabunglah dengan kami untuk memberikan pendidikan terbaik bagi generasi penerus bangsa.</p>
                </div>
            </div>

            <!-- Right side form -->
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="w-75">
                    <h3 class="fw-bold mb-3">Register Guru</h3>
                    <p class="mb-4">Silakan lengkapi data untuk mendaftar</p>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control" id="nama_guru" name="nama_guru" placeholder="Nama Guru" value="{{ old('nama_guru') }}" required>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="NIP" name="NIP" placeholder="NIP" value="{{ old('NIP') }}" required>
                        </div>

                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                        </div>

                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>

                        <div class="mb-3">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn text-white fw-bold">Daftar</button>
                        </div>
                    </form>

                    <p class="mt-3 text-sm">Sudah punya akun? <a href="{{ route('login') }}" class="hv fw-bold">Sign in</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>