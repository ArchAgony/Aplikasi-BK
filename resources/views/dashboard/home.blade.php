@extends('master')
@section( 'content')
<div class="container-fluid">
            <!-- Stats Cards -->
            <div class="row mb-4">
                 <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card stat-card border-0 shadow-sm">
                        <div class="stat-icon bg-gradient-dark">
                            <i class="bi bi-people"></i>
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
                                <h6 class="mb-1">Daftar Kasus Terbaru</h6>
                                <p class="text-muted small mb-0">
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
                                            <th>Nama Siswa</th>
                                            <th>Kelas</th>
                                            <th class="text-center">Kasus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <h6>Cendy Alviano Alvariazky</h6>
                                                </div>
                                            </td>
                                            <td>
                                               XII PPLG 2
                                            </td>
                                            <td class="text-center">
                                                <span class="">Menemukan Oli</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <h6>Cendy Alviano Alvariazky</h6>
                                                </div>
                                            </td>
                                            <td>
                                               XII PPLG 2
                                            </td>
                                            <td class="text-center">
                                                <span class="">Menemukan Oli</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <h6>Cendy Alviano Alvariazky</h6>
                                                </div>
                                            </td>
                                            <td>
                                               XII PPLG 2
                                            </td>
                                            <td class="text-center">
                                                <span class="">Menemukan Oli</span>
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
@endsection

