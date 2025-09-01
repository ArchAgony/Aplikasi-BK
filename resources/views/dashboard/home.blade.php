<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Bootstrap Only</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
    
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
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
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
            left: 15px; /* Ubah dari right ke left */
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
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="p-3 border-bottom">
            <h5 class="mb-0 text-primary">
                <i class="bi bi-speedometer2 me-2"></i>Dashboard
            </h5>
        </div>
        <nav class="mt-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active text-primary" href="#">
                        <i class="bi bi-house-door me-2"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">
                        <i class="bi bi-person me-2"></i>Users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">
                        <i class="bi bi-folder me-2"></i>Projects
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">
                        <i class="bi bi-graph-up me-2"></i>Analytics
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
            <div class="container-fluid">
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
                    <button class="btn btn-outline-secondary">
                        <i class="bi bi-person-circle"></i>
                    </button>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <!-- Stats Cards -->
            <div class="row mb-4">
                 <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card stat-card border-0 shadow-sm">
                        <div class="stat-icon bg-gradient-dark">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                        <div class="card-body">
                            <div class="text-end">
                                <p class="text-muted small mb-1">Jumlah Siswa</p>
                                <h4 class="mb-0">{{-- Jumlah --}} 2000</h4>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <small class="text-success">
                                <i class="bi bi-arrow-up"></i> +55% than last week
                            </small>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card stat-card border-0 shadow-sm">
                        <div class="stat-icon bg-gradient-primary">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="card-body">
                            <div class="text-end">
                                <p class="text-muted small mb-1">Jumlah Kasus</p>
                                <h4 class="mb-0">{{-- Sum Kasus --}} 319</h4>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <small class="text-success">
                                <i class="bi bi-arrow-up"></i> +3% than last month
                            </small>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card stat-card border-0 shadow-sm">
                        <div class="stat-icon bg-gradient-success">
                            <i class="bi bi-person-plus"></i>
                        </div>
                        <div class="card-body">
                            <div class="text-end">
                                <p class="text-muted small mb-1">Kasus Tuntas</p>
                                <h4 class="mb-0">{{-- SumKasusTuntas --}} 215</h4>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <small class="text-danger">
                                <i class="bi bi-arrow-down"></i> -2% than yesterday
                            </small>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card stat-card border-0 shadow-sm">
                        <div class="stat-icon bg-gradient-info">
                            <i class="bi bi-cart"></i>
                        </div>
                        <div class="card-body">
                            <div class="text-end">
                                <p class="text-muted small mb-1">Kasus Sedang Berjalan</p>
                                <h4 class="mb-0">20</h4>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <small class="text-success">
                                <i class="bi bi-arrow-up"></i> +5% than yesterday
                            </small>
                        </div>
                    </div>
                </div>
            <!-- Charts Row -->
            <div class="row mb-4">
                <div class="col-lg-4 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-0">
                            <div class="chart-placeholder">
                                <div class="text-center">
                                    <i class="bi bi-bar-chart-fill mb-2" style="font-size: 2rem;"></i>
                                    <div>Website Views</div>
                                    <small>Bar Chart</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <h6 class="mb-1">Website Views</h6>
                            <p class="text-muted small">Last Campaign Performance</p>
                            <div class="d-flex align-items-center text-muted">
                                <i class="bi bi-clock me-1"></i>
                                <small>Campaign sent 2 days ago</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-0">
                            <div class="chart-placeholder chart-success">
                                <div class="text-center">
                                    <i class="bi bi-graph-up mb-2" style="font-size: 2rem;"></i>
                                    <div>Daily Sales</div>
                                    <small>Line Chart</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <h6 class="mb-1">Daily Sales</h6>
                            <p class="text-muted small">(<strong>+15%</strong>) increase in today sales</p>
                            <div class="d-flex align-items-center text-muted">
                                <i class="bi bi-clock me-1"></i>
                                <small>Updated 4 min ago</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-0">
                            <div class="chart-placeholder chart-dark">
                                <div class="text-center">
                                    <i class="bi bi-check-circle-fill mb-2" style="font-size: 2rem;"></i>
                                    <div>Completed Tasks</div>
                                    <small>Progress Chart</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <h6 class="mb-1">Completed Tasks</h6>
                            <p class="text-muted small">Last Campaign Performance</p>
                            <div class="d-flex align-items-center text-muted">
                                <i class="bi bi-clock me-1"></i>
                                <small>Just updated</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Projects and Timeline -->
            <div class="row">
                <div class="col-lg-8 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Projects</h6>
                                <p class="text-muted small mb-0">
                                    <i class="bi bi-check-circle text-info me-1"></i>
                                    <strong>30 done</strong> this month
                                </p>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-link text-muted" type="button" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Company</th>
                                            <th>Members</th>
                                            <th class="text-center">Budget</th>
                                            <th class="text-center">Completion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-primary me-3">XD</div>
                                                    <div>
                                                        <h6 class="mb-0 small">Material XD Version</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="avatar bg-info">RT</div>
                                                    <div class="avatar bg-success">RH</div>
                                                    <div class="avatar bg-warning">AS</div>
                                                    <div class="avatar bg-danger">JD</div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge bg-light text-dark">$14,000</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress progress-custom flex-grow-1 me-2">
                                                        <div class="progress-bar bg-info" style="width: 60%"></div>
                                                    </div>
                                                    <small>60%</small>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-warning me-3">AT</div>
                                                    <div>
                                                        <h6 class="mb-0 small">Add Progress Track</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="avatar bg-success">RH</div>
                                                    <div class="avatar bg-danger">JD</div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge bg-light text-dark">$3,000</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress progress-custom flex-grow-1 me-2">
                                                        <div class="progress-bar bg-info" style="width: 10%"></div>
                                                    </div>
                                                    <small>10%</small>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-info me-3">SL</div>
                                                    <div>
                                                        <h6 class="mb-0 small">Fix Platform Errors</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="avatar bg-warning">AS</div>
                                                    <div class="avatar bg-primary">RT</div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge bg-light text-muted">Not set</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress progress-custom flex-grow-1 me-2">
                                                        <div class="progress-bar bg-success" style="width: 100%"></div>
                                                    </div>
                                                    <small>100%</small>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white border-0">
                            <h6 class="mb-1">Orders Overview</h6>
                            <p class="text-muted small mb-0">
                                <i class="bi bi-arrow-up text-success"></i>
                                <strong>24%</strong> this month
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="timeline">
                                <div class="timeline-item">
                                    <div class="timeline-icon bg-success text-white">
                                        <i class="bi bi-bell"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 small">$2400, Design changes</h6>
                                        <small class="text-muted">22 DEC 7:20 PM</small>
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-icon bg-danger text-white">
                                        <i class="bi bi-code"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 small">New order #1832412</h6>
                                        <small class="text-muted">21 DEC 11 PM</small>
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-icon bg-info text-white">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 small">Server payments for April</h6>
                                        <small class="text-muted">21 DEC 9:34 PM</small>
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-icon bg-warning text-white">
                                        <i class="bi bi-credit-card"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 small">New card added for order #4395133</h6>
                                        <small class="text-muted">20 DEC 2:20 AM</small>
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-icon bg-primary text-white">
                                        <i class="bi bi-key"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 small">Unlock packages for development</h6>
                                        <small class="text-muted">18 DEC 4:54 AM</small>
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <div class="timeline-icon bg-dark text-white">
                                        <i class="bi bi-wallet2"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 small">New order #9583120</h6>
                                        <small class="text-muted">17 DEC</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
</body>
</html>