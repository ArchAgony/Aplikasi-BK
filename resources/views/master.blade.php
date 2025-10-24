<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - Bootstrap Only</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="{{ asset('/Lib/bootstrap-icons-1.11.1/bootstrap-icons.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap5.min.css') }}">
    <script src="{{ asset('/Lib/font-awesome-pro-5.15.4/js/all.js') }}" crossorigin="anonymous"></script>

    <style>
        :root {
            --bs-primary: #0d6efd;
            --bs-success: #198754;
            --bs-info: #0dcaf0;
            --bs-warning: #ffc107;
            --bs-danger: #dc3545;
            --bs-dark: #212529;
        }

        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            background: white;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        .main-content {
            margin-left: 250px;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }

        .stat-card {
            position: relative;
            overflow: hidden;
        }

        .stat-icon {
            position: absolute;
            top: -10px;
            left: 15px;
            /* Ubah dari right ke left */
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .bg-gradient-primary {
            background: linear-gradient(45deg, #0d6efd, #6f42c1);
        }

        .bg-gradient-success {
            background: linear-gradient(45deg, #198754, #20c997);
        }

        .bg-gradient-info {
            background: linear-gradient(45deg, #0dcaf0, #6f42c1);
        }

        .bg-gradient-warning {
            background: linear-gradient(45deg, #ffc107, #fd7e14);
        }

        .bg-gradient-dark {
            background: linear-gradient(45deg, #212529, #495057);
        }

        .chart-placeholder {
            height: 200px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }


        .nav-link {
            color: #212529;

            font-weight: normal;
        }


        .active-link {
            color: #0d6efd !important;

            font-weight: bold !important;
        }

        .chart-success {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        }

        .chart-dark {
            background: linear-gradient(135deg, #2c3e50 0%, #4a6741 100%);
        }

        .avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(45deg, #667eea, #764ba2);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.8rem;
            font-weight: bold;
            margin-right: -8px;
            border: 2px solid white;
        }

        .timeline {
            position: relative;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 20px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #e9ecef;
        }

        .timeline-item {
            position: relative;
            padding-left: 50px;
            margin-bottom: 20px;
        }

        .timeline-icon {
            position: absolute;
            left: 8px;
            top: 0;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            border: 2px solid white;
            z-index: 1;
        }

        .progress-custom {
            height: 8px;
            border-radius: 4px;
        }

        .sidebar-toggle {
            display: none;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar-toggle {
                display: block;
            }
        }

        /* Custom Card Header biar lebih cantik */
        .card-header {
            font-weight: bold;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
        }

        /* Styling tabel (opsional) */
        .table thead th {
            background-color: #f8f9fa;
            text-transform: uppercase;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="p-3 border-bottom">
            <h5 class="mb-0 text-primary">
                <i class="bi bi-speedometer2 me-2"></i>APLIKASI BK
            </h5>
        </div>
        <nav class="mt-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard*') ? 'active-link' : 'text-dark' }}" href="dashboard">
                        <i class="bi bi-house-door me-2"></i>Dashboard
                    </a>
                </li>
               <li class="nav-item">
                    <a class="nav-link {{ Request::is('laporan*') ? 'active-link' : 'text-dark' }}" href="/laporan">
                        <i class="bi bi-graph-up me-2"></i>Buku Kasus
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('tamu*') ? 'active-link' : 'text-dark' }}" href="/tamu">
                        <i class="bi bi-journal-bookmark me-2"></i>Buku Tamu
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('kunjungan*') ? 'active-link' : 'text-dark' }}" href="/kunjungan">
                        <i class="bi bi-house-exclamation me-2"></i>Kunjungan Rumah
                    </a>
                </li>
                
                 <li class="nav-item">
                    <a class="nav-link {{ Request::is('siswa*') ? 'active-link' : 'text-dark' }}" href="/siswa">
                        <i class="bi bi-person me-2"></i>Siswa
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
       <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
            <div class="container-fluid d-flex align-items-center">
                <button class="btn btn-outline-primary sidebar-toggle me-3" type="button" onclick="toggleSidebar()">
                    <i class="bi bi-list"></i>
                </button>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </nav>
                <div class="ms-auto">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="profileDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="/profile"><i class="bi bi-person"></i> Profil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{-- route('logout')--}}">
                                    @csrf
                                    <button class="dropdown-item" type="submit"><i class="bi bi-box-arrow-right"></i>
                                        Log Out</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        @yield('content') @yield('scripts')
        <!-- Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

        <script>
            // Sidebar toggle function
            function toggleSidebar() {
                const sidebar = document.getElementById('sidebar');
                sidebar.classList.toggle('show');
            }

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function (event) {
                const sidebar = document.getElementById('sidebar');
                const toggle = document.querySelector('.sidebar-toggle');

                if (window.innerWidth <= 768) {
                    if (!sidebar.contains(event.target) && !toggle.contains(event.target)) {
                        sidebar.classList.remove('show');
                    }
                }
            });

            // Handle window resize
            window.addEventListener('resize', function () {
                const sidebar = document.getElementById('sidebar');
                if (window.innerWidth > 768) {
                    sidebar.classList.remove('show');
                }
            });
        </script>
        <script src="{{ asset('Js/jquery-3.7.1.js') }}"></script>
        <script src="{{ asset('/Lib/bootstrap/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('/Lib/chart.js/Chart.min.js') }}" crossorigin="anonymous"></script>

        <script src="{{ asset('Js/jquery.dataTables.min.js') }}"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
        <script src="{{ asset('Js/dataTables.responsive.js') }}"></script>
        <script src="{{ asset('Js/responsive.dataTables.js') }}"></script>
        <script>
           $(document).ready(function () {

  // Inisialisasi datatablesSimple (halaman siswa)
  if ($('#datatablesSimple').length && !$.fn.DataTable.isDataTable('#datatablesSimple')) {
    $('#datatablesSimple').DataTable({
      responsive: true,
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Cari siswa...",
        lengthMenu: "Tampilkan _MENU_ data",
        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        paginate: { previous: "Sebelumnya", next: "Berikutnya" }
      },
      order: [[1, 'asc']]
    });
  }

  // Inisialisasi datatablesHome (halaman dashboard)
  if ($('#datatablesHome').length && !$.fn.DataTable.isDataTable('#datatablesHome')) {
    $('#datatablesHome').DataTable({
      responsive: true,
      dom: '<"row mb-2"<"col-md-6"l><"col-md-6 text-end"f>>rtip',
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Cari...",
        lengthMenu: "Tampilkan _MENU_ data",
        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        paginate: { previous: "Sebelumnya", next: "Berikutnya" },
        zeroRecords: "Data tidak ditemukan"
      },
      order: [[0, 'asc']]
    });
  }

});
        </script>
</body>
</html>
