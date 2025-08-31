<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Bimbel Alwi | @yield('title')</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE 4 | Unfixed Sidebar" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"
    />
    <!--end::Primary Meta Tags-->
    <!--begin::Fonts-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
    />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
      integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
      integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href=" {{ asset('css/adminlte.css')}}" />
    <!--end::Required Plugin(AdminLTE)-->
    <!--begin::Google Fonts (Inter)-->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600;700&display=swap" rel="stylesheet">
    <!--end::Google Fonts-->
    <style>
      body,
      .app-main {
        font-family: 'Source Sans 3', Arial, sans-serif !important;
        background: linear-gradient(135deg, #f4f8fb 0%, #e9f1fa 100%) !important;
        min-height: 100vh;
      }
      .app-header.navbar {
        background: linear-gradient(90deg, #a1c4fd 0%, #c2e9fb 100%) !important;
        color: #2d3a4a !important;
        font-family: 'Inter', 'Source Sans 3', Arial, sans-serif !important;
      }
      .app-header.navbar .nav-link,
      .app-header.navbar .navbar-brand,
      .app-header.navbar .navbar-nav > .nav-item > .nav-link,
      .app-header.navbar .dropdown-menu,
      .app-header.navbar .navbar-badge {
        font-family: 'Inter', 'Source Sans 3', Arial, sans-serif !important;
        font-weight: 700 !important;
        letter-spacing: 0.02em;
      }
          .action-btn {
        color: #6c757d; /* Warna default */
        transition: color 0.3s ease, transform 0.3s ease; /* Animasi transisi */
    }

    .action-btn:hover {
        color: #007bff; /* Warna saat di-hover (biru) */
        transform: scale(1.2); /* Efek memperbesar tombol */
    }
      /* Nama user di pojok kanan atas header: font normal, tidak bold, sama seperti body */
      .app-header.navbar .user-menu .nav-link .d-none.d-md-inline {
        font-family: 'Source Sans 3', Arial, sans-serif !important;
        font-weight: 400 !important;
        letter-spacing: normal;
      }
      .user-header p,
      .user-header p small {
        font-weight: 400 !important;
      }
      .app-sidebar.bg-body-secondary {
        background: #f8fafc !important;
        color: #2d3a4a !important;
      }
      .app-sidebar .nav-link,
      .app-sidebar .sidebar-brand {
        color: #2d3a4a !important;
      }
      .app-sidebar .nav-link.active,
      .app-sidebar .nav-link:hover {
        background: #e3eefd !important;
        color: #3b5998 !important;
        border-radius: 8px;
      }
      .sidebar-brand img {
        max-height: 48px;
      }
      .brand-text {
        color: #3b5998 !important;
        font-weight: bold;
        font-size: 1.2rem;
      }
      .btn-primary {
        background: #3b5998 !important;
        border: none;
      }
      .card {
        background: rgba(255,255,255,0.97);
        border-radius: 1rem;
        box-shadow: 0 2px 16px 0 rgba(60,72,88,0.07);
      }
      .table th, .table td {
        vertical-align: middle;
      }
      .sidebar-brand {
        border-bottom: 2px solid #e3eefd !important; /* warna biru muda lembut */
        box-shadow: none !important;
        margin-bottom: 0.5rem;
        }
        .sidebar-brand .brand-image {
        background: transparent !important;
        box-shadow: none !important;
        }
    </style>
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Start Navbar Links-->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>
           <li class="nav-item d-none d-md-block"><a href="{{ url('dashboard') }}" class="nav-link">Home</a></li>
            <li class="nav-item d-none d-md-block"><a href="{{ route('info') }}" class="nav-link">Info</a></li>
            <li class="nav-item d-none d-md-block"><a href="https://linktr.ee/alwicollege" target="_blank" class="nav-link">About Us</a></li>

          </ul>
          <!--end::Start Navbar Links-->
          <!--begin::End Navbar Links-->
          <ul class="navbar-nav ms-auto">
            <!--begin::Notifications Dropdown Menu-->
            <li class="nav-item dropdown">
            <a class="nav-link" data-bs-toggle="dropdown" href="#">
                <i class="bi bi-bell-fill"></i>
                <span class="navbar-badge badge text-bg-warning">2</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end shadow-sm" style="max-width: 350px; word-wrap: break-word; white-space: normal;">
                <span class="dropdown-item dropdown-header text-primary fw-bold">Notifikasi</span>
                <div class="dropdown-divider"></div>

                <a href="#" class="dropdown-item text-wrap">
                <i class="bi bi-calendar-check-fill me-2 text-success"></i>
                <span class="d-inline-block" style="max-width: 260px;">
                    Pastikan setiap <strong>SABTU</strong> untuk selalu cek jadwal les.
                </span>
                <span class="float-end text-muted fs-7">Hari ini</span>
                </a>

                <div class="dropdown-divider"></div>

                <a href="#" class="dropdown-item text-wrap">
                <i class="bi bi-arrow-repeat me-2 text-info"></i>
                <span class="d-inline-block" style="max-width: 260px;">
                    Jadwal les diperbarui untuk <strong>seminggu ke depan</strong>.
                </span>
                <span class="float-end text-muted fs-7">Hari ini</span>
                </a>

                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer text-primary">Lihat Semua Notifikasi</a>
            </div>
            </li>
            <!--end::Notifications Dropdown Menu-->

            <!--begin::Fullscreen Toggle-->
            <li class="nav-item">
              <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
              </a>
            </li>
            <!--end::Fullscreen Toggle-->
            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img
                  src="{{ asset('img/profilfoto.png')}}"
                  class="user-image rounded-circle shadow"
                  alt="User Image"
                />
                <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <!--begin::User Image-->
                <li class="user-header text-bg-primary">
                  <img
                    src="{{ asset('img/profilfoto.png')}}"
                    class="rounded-circle shadow"
                    alt="User Image"
                  />
                  <p>
                    {{ Auth::user()->name }} - {{ ucfirst((Auth::user()->role)) }}
                    <small>Member of Bimbel Alwi College</small>
                  </p>
                </li>
                <!--end::User Image-->
                <!--begin::Menu Body-->
                <!--end::Menu Body-->
                <!--begin::Menu Footer-->
                <li class="user-footer d-flex justify-content-center">
                      <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="btn btn-default btn-flat float-end">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                </li>
                <!--end::Menu Footer-->
              </ul>
            </li>
            <!--end::User Menu Dropdown-->
          </ul>
          <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
      </nav>
      <!--end::Header-->
      <!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a class='brand-link' href='/dist/pages/'>
            <!--begin::Brand Image-->
            <img
  src="{{ asset('foto/logobimbel.webp') }}"
  alt="Logo Bimbel"
  class="brand-image opacity-75 shadow"
  style="max-height:40px; background: transparent;"
/>
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-bold"
      style="font-family: 'Source Sans 3', Arial, sans-serif; font-weight:700; font-size:1.2rem; letter-spacing:0px; color:#3b5998; margin-left:8px;">
    Bimbel Alwi
</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false"
            >
            <li class="nav-item">
            <a class='nav-link' href='{{ url('dashboard')}}'>
                <i class="nav-icon bi bi-house"></i>
                <p>Dashboard</p>
            </a>
            </li>

            @if(auth()->user()->role === 'pemilik')
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#sekolahSubmenu" role="button" aria-expanded="false" aria-controls="kehadiranSubmenu">
                <span class="d-flex align-items-center">
                <i class="nav-icon bi bi-book"></i> <!-- Icon + margin -->
                <p>Data Sekolah</p>
                </span>
            <i class="bi bi-chevron-down"></i>
            </a>
            <div class="collapse ps-3" id="sekolahSubmenu">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class='nav-link' href='{{ url('sekolah')}}'>
                    <i class="nav-icon bi bi-building"></i>
                        <p>Sekolah</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class='nav-link' href='{{ url('jadwal_sekolah')}}'>
                    <i class="nav-icon bi bi-calendar-event"></i>
                        <p>Jadwal Sekolah</p>
                    </a>
                </li>
                </ul>
                </div>
            </li>
            @endif

            <li class="nav-item">
            <a class='nav-link' href='{{ url('ruangan')}}'>
                <i class="nav-icon bi bi-door-open"></i>
                <p>Ruangan</p>
            </a>
            </li>

            @if(auth()->user()->role === 'pemilik')
            <li class="nav-item">
            <a class='nav-link' href='{{ url('mata_pelajaran')}}'>
                <i class="nav-icon bi bi-journal-bookmark"></i>
                <p>Mata Pelajaran</p>
            </a>
            </li>
            @endif

            @if(auth()->user()->role === 'siswa' || auth()->user()->role === 'pemilik')
            <li class="nav-item">
            <a class='nav-link' href='{{ url('siswa')}}'>
                <i class="nav-icon bi bi-people"></i>
                <p>Siswa</p>
            </a>
            </li>
            @endif

            @if(auth()->user()->role === 'pengajar' || auth()->user()->role === 'pemilik')
            <li class="nav-item">
            <a class='nav-link' href='{{ url('pengajar')}}'>
                <i class="nav-icon bi bi-person-badge"></i>
                <p>Pengajar</p>
            </a>
            </li>
            @endif

            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#jadwalSubmenu" role="button" aria-expanded="false" aria-controls="kehadiranSubmenu">
                <span class="d-flex align-items-center">
                <i class="nav-icon bi bi-clock"></i> <!-- Icon + margin -->
                <p>Data Jadwal</p>
                </span>
            <i class="bi bi-chevron-down"></i>
            </a>
            <div class="collapse ps-3" id="jadwalSubmenu">
            <ul class="nav flex-column">
                 <li class="nav-item">
                    <a class='nav-link' href='{{ url('jadwal_les')}}'>
                    <i class="nav-icon bi bi-easel2"></i>
                        <p>Jadwal Les</p>
                    </a>
                </li>
                @if(auth()->user()->role === 'pemilik')
               <li class="nav-item">
                    <a class='nav-link' href='{{ url('jadwal_mapel')}}'>
                    <i class="nav-icon bi bi-calendar-range"></i>
                        <p>Jadwal Mata Pelajaran</p>
                    </a>
                </li>
                @endif
                @if(auth()->user()->role === 'siswa' || auth()->user()->role === 'pemilik')
                <li class="nav-item">
                    <a class='nav-link' href='{{ url('jadwal_siswa')}}'>
                    <i class="nav-icon bi bi-calendar3"></i>
                        <p>Jadwal Siswa</p>
                    </a>
                </li>
                @endif
                @if(auth()->user()->role === 'pengajar' || auth()->user()->role === 'pemilik')
                <li class="nav-item">
                    <a class='nav-link' href='{{ url('jadwal_pengajar')}}'>
                    <i class="nav-icon bi bi-calendar-check"></i>
                        <p>Jadwal Pengajar</p>
                    </a>
                </li>
                @endif
            </ul>
            </div>
        </li>

            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#kehadiranSubmenu" role="button" aria-expanded="false" aria-controls="kehadiranSubmenu">
                <span class="d-flex align-items-center">
                <i class="nav-icon bi bi-clipboard-data"></i> <!-- Icon + margin -->
                <p>Data Kehadiran</p>
                </span>
            <i class="bi bi-chevron-down"></i>
            </a>
            <div class="collapse ps-3" id="kehadiranSubmenu">
            <ul class="nav flex-column">
                @if(auth()->user()->role === 'pemilik')
                <li class="nav-item">
                <a class="nav-link" href="{{ url('kehadiran') }}">
                    <i class="bi bi-clipboard-check"></i> <p>Kehadiran</p>
                </a>
                </li>
                @endif
                @if(auth()->user()->role === 'siswa' || auth()->user()->role === 'pemilik')
                <li class="nav-item">
                <a class="nav-link" href="{{ url('absensi_siswa') }}">
                    <i class="bi bi-check2-square"></i> <p>Absensi Siswa</p>
                </a>
                </li>
                @endif
                @if(auth()->user()->role === 'pengajar' || auth()->user()->role === 'pemilik')
                <li class="nav-item">
                <a class="nav-link" href="{{ url('absensi_pengajar') }}">
                    <i class="bi bi-check2-square"></i> <p>Absensi Pengajar</p>
                </a>
                </li>
                @endif
            </ul>
                </div>
            </li>


            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">@yield('title')</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            @yield('content')
          </div>
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
      <!--begin::Footer-->
      <footer class="app-footer">
        <div class="float-end d-none d-sm-inline"></div>
        <strong>
          Copyright &copy; 2025&nbsp;
          Bimbel Alwi College.
        </strong>
        All rights reserved.
      </footer>
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
      integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="{{ asset('js/adminlte.js')}}"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <!--end::OverlayScrollbars Configure-->

<!-- jquery cdn -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var nama = $(this).data("nama");
        event.preventDefault();
        swal({
                title: `Apakah Anda yakin ingin menghapus data ${nama} ini?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>

@session('success')
<script type="text/javascript">
    swal({
        title: "Good job!",
        text: "{{ session('success') }}",
        icon: "success"
    });
</script>
@endsession
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>
