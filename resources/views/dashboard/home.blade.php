@extends('master')
@section('content')

<style>
  #datatablesSimple {
    width: 100% !important;
    background: white;
    border-collapse: collapse;
  }
  #datatablesSimple th,
  #datatablesSimple td {
    border: none !important;
  }

  .dataTables_wrapper .dataTables_filter {
    float: right !important;
    text-align: right !important;
    margin-bottom: 10px;
  }

        .dataTables_wrapper .dataTables_filter label {
            display: flex !important;
            align-items: center;
            gap: 10px;
            margin-bottom: 0;
            font-weight: normal;
        }

        .dataTables_wrapper .dataTables_filter input {
            border-radius: 20px;
            border: 1px solid #e91e63;
            padding: 0.4em 1em;
            width: 250px;
            transition: all 0.3s ease;
        }

        .dataTables_wrapper .dataTables_filter input:focus {
            outline: none;
            border-color: #e91e63;
            box-shadow: 0 0 0 0.2rem rgba(233, 30, 99, 0.25);
        }

  .dataTables_wrapper .dataTables_length {
    float: left !important;
    margin-bottom: 10px;
  }

        .dataTables_wrapper .dataTables_length label {
            display: flex !important;
            align-items: center;
            gap: 8px;
            margin-bottom: 0;
            font-weight: normal;
        }

        .dataTables_length select {
            border-radius: 20px;
            border: 1px solid #e91e63;
            padding: 0.3em 1em;
            min-width: 70px;
        }

  .dataTables_wrapper .dataTables_info {
    float: left !important;
    padding-top: 10px;
    color: #666;
    font-size: 14px;
  }

        .dataTables_wrapper .dataTables_paginate {
            float: right !important;
            padding-top: 10px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 5px 12px;
            margin: 0 2px;
            border-radius: 4px;
            border: 1px solid #ddd;
            background: white;
            color: #666;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #f06292;
            color: white;
            border-color: #f06292;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #e91e63;
            color: white;
            border-color: #e91e63;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

  .dataTables_wrapper::after {
    content: "";
    display: table;
    clear: both;
  }

        .table-container {
            max-width: 1200px;
            margin: 2rem auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.07);
            overflow: hidden;
        }

  @media (max-width: 768px) {
    .dataTables_wrapper .dataTables_filter,
    .dataTables_wrapper .dataTables_length {
      float: none !important;
      text-align: center !important;
      margin-bottom: 15px;
    }

            .dataTables_wrapper .dataTables_filter,
            .dataTables_wrapper .dataTables_length {
                float: none !important;
                text-align: center !important;
                margin-bottom: 15px;
            }

    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_paginate {
      float: none !important;
      text-align: center !important;
      margin-top: 10px;
    }
  }
</style>

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
                        <h4 class="mb-0">{{ $jumlahsiswa }}</h4>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0"></div>
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
                        <h4 class="mb-0">319</h4>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0"></div>
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
                        <h4 class="mb-0">215</h4>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0"></div>
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
                <div class="card-footer bg-transparent border-0"></div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row mb-4">
        <div class="col-lg-8 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0">
                    <h6 class="mb-0">Daftar Kasus Berdasarkan Kelas</h6>
                </div>
                <div class="card-body">
                    <div style="position: relative; height: 300px;">
                        <canvas id="barChart"></canvas>
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
                            <div>Chart Donut</div>
                            <small>Informasi Kasus</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
            <div>
                <h6 class="mb-1">Daftar Kasus Terbaru</h6>
                <p class="text-muted small mb-0"></p>
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
                <table id="datatablesHome" class="table table-hover w-100">
                    <thead class="table-light text-center align-middle">
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th class="text-center">Kasus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $key => $s)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $s->nama_siswa }}</td>
                                <td class="text-center">{{ $s->tingkat }} {{ $s->jurusan }}</td>
                                <td>{{ $s->kasus }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#datatablesHome').DataTable();
});
</script>

<script>
    // Data dari controller
    var chartLabels = {!! json_encode($kasusPerkelas->pluck('jurusan')) !!};
    var chartData = {!! json_encode($kasusPerkelas->pluck('total')) !!};

    // Debug
    console.log('Chart Labels:', chartLabels);
    console.log('Chart Data:', chartData);

    // Tunggu DOM ready
    document.addEventListener('DOMContentLoaded', function() {
        var canvas = document.getElementById('barChart');
        
        if (!canvas) {
            console.error('Canvas element tidak ditemukan');
            return;
        }

        var ctx = canvas.getContext('2d');
        
        // Destroy chart lama jika ada
        if (window.barChartInstance) {
            window.barChartInstance.destroy();
        }

        // Buat chart baru
        window.barChartInstance = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: chartLabels,
                datasets: [{
                    label: 'Jumlah Kasus',
                    data: chartData,
                    backgroundColor: 'rgba(95, 109, 238, 0.7)',
                    borderColor: 'rgba(95, 109, 238, 1)',
                    borderWidth: 2,
                    borderRadius: 4,
                    minBarLength: 5  // Minimal tinggi bar 5px
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            precision: 0,
                            callback: function(value) {
                                if (Number.isInteger(value)) {
                                    return value;
                                }
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                }
            }
        });
    });
</script>
@endsection
