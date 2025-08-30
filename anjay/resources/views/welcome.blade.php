<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('img/ella.png') }}" type="image/png">
    <title>Penyemangat Ella 💙</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            /* Gradient biru estetik */
            background: linear-gradient(135deg, #89f7fe 0%, #66a6ff 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            background: rgba(255,255,255,0.9);
            backdrop-filter: blur(4px);
            border: none;
        }
        .btn-primary {
            background: linear-gradient(90deg, #4facfe 0%, #00f2fe 100%);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #00f2fe 0%, #4facfe 100%);
            color: #fff;
        }
        .form-control {
            border-radius: 50px;
        }
        .logo {
            max-width: 120px;
            margin-bottom: 15px;
            filter: drop-shadow(0px 4px 6px rgba(0,0,0,0.2));
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center min-vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4 text-center">

                        <!-- Logo estetik cheerleader -->
                        <img src="/img/pocoyo.png"
                             alt="Cheer Pom-Pom" class="logo">

                        <h2 class="fw-bold mb-2 text-primary">Login Spesial ✨</h2>
                        <p class="text-secondary mb-4">
                            Masukkan nama & tanggal lahirmu untuk melanjutkan 💙
                        </p>

                        <!-- Error -->
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <!-- Form Login -->
                        <form method="POST" action="{{ url('/login') }}">
                            @csrf
                            <div class="mb-3 text-start">
                                <label class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control" placeholder="contoh: ella" required>
                            </div>
                            <div class="mb-3 text-start">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" name="birthdate" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill fw-semibold">
                                <i class="bi bi-box-arrow-in-right me-2"></i> Masuk
                            </button>
                        </form>

                        <hr class="my-4">
                        <small class="text-muted">Website spesial penyemangat untuk orang favoritku 💙</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
