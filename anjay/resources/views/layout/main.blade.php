<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('img/ella.png') }}" type="image/png">
    <title>Penyemangat Ella 💙</title>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- AdminLTE -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

  <style>
    body {
      background: #f9f9fb;
      font-family: 'Segoe UI', sans-serif;
    }

    /* Navbar */
    .main-header.navbar {
      background: linear-gradient(90deg, #a18cd1, #fbc2eb);
      color: #fff;
    }
    .main-header .nav-link {
      color: #fff !important;
      font-weight: 500;
    }

    /* Sidebar */
    .main-sidebar {
      background: linear-gradient(180deg, #a18cd1, #fbc2eb);
    }
    .brand-link {
      background: rgba(255, 255, 255, 0.15);
      border-bottom: none;
    }
    .nav-sidebar .nav-link {
      color: #fff;
      border-radius: 10px;
      margin: 4px 8px;
      transition: 0.3s;
    }
    .nav-sidebar .nav-link.active {
      background-color: rgba(255, 255, 255, 0.25);
      color: #fff;
      font-weight: bold;
    }
    .nav-sidebar .nav-link:hover {
      background-color: rgba(255, 255, 255, 0.35);
    }

    /* Content Wrapper */
    .content-wrapper {
      background: #fdfdfe;
      border-top-left-radius: 20px;
      border-top-right-radius: 20px;
      padding: 20px;
    }

    /* Card (jika dipakai di dalam content) */
    .card {
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.05);
      border: none;
    }

    /* Footer */
    .main-footer {
      background: #a18cd1;
      color: white;
      border-top: none;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar -->
  <aside class="main-sidebar elevation-4">
    <a href="/" class="brand-link text-center">
      <span class="brand-text font-weight-light"></span>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
          <li class="nav-item">
            <a href="{{ url('/dashboard') }}" class="nav-link active">
              <i class="nav-icon fas fa-music"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <!-- Postcards -->
        <li class="nav-item">
          <a class="nav-link d-flex justify-content-between align-items-center"
             data-bs-toggle="collapse" href="#postcardSubmenu" role="button"
             aria-expanded="false" aria-controls="postcardSubmenu">
            <span class="d-flex align-items-center">
              <i class="nav-icon fas fa-envelope"></i>
              <p>Postcards</p>
            </span>
            <i class="fas fa-chevron-down"></i>
          </a>
          <div class="collapse ps-3" id="postcardSubmenu">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="{{ url('postcards/encouragement') }}">
                  <i class="nav-icon fas fa-star"></i>
                  <p>Postcard E</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('postcards/love') }}">
                  <i class="nav-icon fas fa-heart"></i>
                  <p>Postcard L</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('postcards/light') }}">
                  <i class="nav-icon fas fa-sun"></i>
                  <p>Postcard L</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('postcards/affection') }}">
                  <i class="nav-icon fas fa-heart"></i>
                  <p>Postcard A</p>
                </a>
              </li>
            </ul>
          </div>
        </li>
            <li class="nav-item">
            <a href="{{ url('/playlist') }}" class="nav-link active">
              <i class="nav-icon fas fa-music"></i>
              <p>Playlist</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <section class="content pt-3">
      <div class="container-fluid">
        @yield('content')
      </div>
    </section>
  </div>

  <!-- Footer -->
  <footer class="main-footer text-center">
    <strong>Spotify Dashboard</strong> © {{ date('Y') }}
  </footer>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
