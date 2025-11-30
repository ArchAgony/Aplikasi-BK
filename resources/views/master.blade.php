<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - Bootstrap Only</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="{{ asset('/Lib/bootstrap-icons-1.11.1/bootstrap-icons.min.css') }}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap5.min.css') }}"> -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"
        rel="stylesheet" />
    <link href="
{{ asset('Css/sweetalert2.min.css') }}
" rel="stylesheet">
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

        .card-header {
            font-weight: bold;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
        }

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
                    <a class="nav-link {{ Request::is('/*') ? 'active-link' : 'text-dark' }}" href="/">
                        <i class="bi bi-house-door me-2"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('siswa*') ? 'active-link' : 'text-dark' }}" href="/siswa">
                        <i class="bi bi-person me-2"></i>Siswa
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('laporan*') ? 'active-link' : 'text-dark' }}" href="/laporan">
                        <i class="bi bi-graph-up me-2"></i>Laporan Konseling
                        {{-- Buku Kasus --}}
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
                <div class="d-flex align-items-center">

                    <form action="/logout" method="POST" id="logout-form">
                        @csrf
                        <button type="button" class="dropdown-item text-danger" onclick="confirmLogout()">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <script src="{{ asset('Js/jquery-3.7.1.js') }}"></script>
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
            document.addEventListener('click', function(event) {
                const sidebar = document.getElementById('sidebar');
                const toggle = document.querySelector('.sidebar-toggle');

                if (window.innerWidth <= 768) {
                    if (!sidebar.contains(event.target) && !toggle.contains(event.target)) {
                        sidebar.classList.remove('show');
                    }
                }
            });

            // Handle window resize
            window.addEventListener('resize', function() {
                const sidebar = document.getElementById('sidebar');
                if (window.innerWidth > 768) {
                    sidebar.classList.remove('show');
                }
            });
        </script>
        <script src="{{ asset('Js/jquery-3.7.1.js') }}"></script>
        <script src="{{ asset('/Lib/bootstrap/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('/Lib/chart.js/Chart.min.js') }}" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
        </script>
        <script src="{{ asset('Js/jquery.dataTables.min.js') }}"></script>
        <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
        <script src="{{ asset('Js/dataTables.responsive.js') }}"></script>
        <script src="{{ asset('Js/responsive.dataTables.js') }}"></script>
        <script src="{{ asset('Js/sweetalert2.all.min.js') }}"></script>
        <script src="{{ asset('Js/signature_pad.umd.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    timer: 2000,
                    showConfirmButton: false
                });
            </script>
        @endif

        @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: '{{ session('error') }}'
                });
            </script>
        @endif

        <script>
            $(document).ready(function () {
            var table = $('#datatablesSimple').DataTable({
                responsive: false, 
                destroy: true,
                dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rtip',
                language: {
                    search: "Cari:",
                    searchPlaceholder: "Cari data...",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    infoEmpty: "Tidak ada data",
                    infoFiltered: "(disaring dari _MAX_ total data)",
                    zeroRecords: "Tidak ada data yang cocok",
                    emptyTable: "Tidak ada data dalam tabel",
                    paginate: {
                        first: "Pertama",
                        previous: "Sebelumnya",
                        next: "Berikutnya",
                        last: "Terakhir"
                    }
                },
                order: [[0, 'asc']],
                pageLength: 10,
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "Semua"]
                ],
                columnDefs: [{
                    className: "text-center",
                    targets: [0, 1, 4, 7]
                }, {
                    orderable: false,
                    targets: [7] 
                }]
            });

            $('#datatablesSimple').on('draw.dt', function () {
                $('[data-bs-toggle="dropdown"]').dropdown();
            });

            setTimeout(function () {
                var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
                var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
                    return new bootstrap.Dropdown(dropdownToggleEl)
                });
            }, 500);
        });

            function confirmDelete(id) {
                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + id).submit();
                    }
                })
            }

            function confirmLogout() {
                Swal.fire({
                    title: 'Konfirmasi Logout',
                    text: 'Apakah Anda yakin ingin keluar?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: '<i class="fas fa-sign-out-alt"></i> Ya, Logout',
                    cancelButtonText: '<i class="fas fa-times"></i> Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('logout-form').submit();
                    }
                });
            }

            document.addEventListener('DOMContentLoaded', function() {

                const jurusanInputs = document.querySelectorAll('.format-jurusan');

                jurusanInputs.forEach(function(input) {
                    input.addEventListener('input', function(e) {
                        let cursorPosition = e.target.selectionStart;
                        let oldValue = e.target.value;

                        let newValue = oldValue.toUpperCase().replace(/ /g, '-');

                        e.target.value = newValue;

                        e.target.setSelectionRange(cursorPosition, cursorPosition);
                    });
                });
            });

            $(document).ready(function() {
                $('#search-select').select2({
                    theme: 'bootstrap-5',
                    placeholder: 'Ketik untuk mencari siswa...',
                    allowClear: true,
                    width: '100%'
                });
            });
        </script>
</body>

</html>
