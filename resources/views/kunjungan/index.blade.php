@extends('master')
@section('content')
    <style>
        .table-header {
            background: linear-gradient(135deg, #84c4e2, #fff3f7);
            color: white;
            padding: 15px 20px;
            border-radius: 10px 10px 0 0;
            font-weight: 600;
            font-size: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 0;
        }

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
            overflow: visible !important; /* FIX DROPDOWN */
        }

        /* ✅ FIX DROPDOWN Z-INDEX */
        .dataTables_wrapper {
            position: relative;
            z-index: 1;
            overflow: visible !important;
        }

        .authors-table {
            overflow: visible !important;
        }

        .dropdown-menu {
            z-index: 9999 !important;
            position: absolute !important;
        }

        .table td {
            position: relative;
        }

        /* Nonaktifkan scroll yang memotong dropdown */
        .dataTables_wrapper .dataTables_scroll,
        .dataTables_scrollBody {
            overflow: visible !important;
        }

        @media (max-width: 768px) {
            .dataTables_wrapper .dataTables_filter,
            .dataTables_wrapper .dataTables_length {
                float: none !important;
                text-align: center !important;
                margin-bottom: 15px;
            }

            .dataTables_wrapper .dataTables_filter input {
                width: 100%;
                max-width: 300px;
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
        <div class="table-container">
            <div class="table-header">
                Kunjungan Rumah
                <a href="/kunjungan/create">
                    <button type="button" class="btn btn-light btn-sm float-end rounded-2">
                        <i class="fas fa-plus me-1"></i> Tambah
                    </button>
                </a>
            </div>
            <div class="authors-table p-3">
                <table id="datatablesSimple" class="table table-hover w-100">
                    <thead class="text-center align-middle">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Guru</th>
                            <th>Jabatan</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td>{{ $item->guru->nama_guru }}</td>
                                <td>{{ $item->guru->jabatan }}</td>
                                <td class="text-center align-middle">
                                    {{ $item->siswa->nama_siswa ?? 'Siswa Dihapus' }}
                                </td>
                                <td>{{ $item->siswa->tingkat ?? '-' }} {{ $item->siswa->jurusan ?? '-' }}</td>
                                <td>{{ $item->bukutamu->alamat }}</td>
                                <td>
                                    <center>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-secondary dropdown-toggle" 
                                                    type="button" 
                                                    data-bs-toggle="dropdown"
                                                    data-bs-boundary="window" 
                                                    aria-expanded="false">
                                                Aksi
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{ route('kunjungan.laporan', $item->id) }}">
                                                    <i class="fas fa-file-alt me-2"></i>Laporan
                                                </a></li>
                                                <li><a class="dropdown-item" href="{{ route('kunjungan.layanan', $item->id) }}">
                                                    <i class="fas fa-hands-helping me-2"></i>Layanan
                                                </a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="{{ route('kunjungan.edit', $item->id) }}">
                                                    <i class="fas fa-edit me-2"></i>Edit
                                                </a></li>
                                                <li><a class="dropdown-item text-danger" 
                                                       href="{{ route('kunjungan.destroy', $item->id) }}" 
                                                       onclick="return confirm('Yakin ingin menghapus?')">
                                                    <i class="fas fa-trash me-2"></i>Delete
                                                </a></li>
                                            </ul>
                                        </div>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var table = $('#datatablesSimple').DataTable({
                responsive: false, // Nonaktifkan responsive untuk fix dropdown
                scrollX: false,
                scrollCollapse: false,
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
                    targets: [0, 1, 4, 7],
                    orderable: false,
                    targets: [7] // Kolom aksi tidak bisa disort
                }]
            });

            // Fix overflow saat dropdown dibuka
            $('#datatablesSimple').on('shown.bs.dropdown', function () {
                $('.dataTables_wrapper').css('overflow', 'visible');
            });

            $('#datatablesSimple').on('hidden.bs.dropdown', function () {
                $('.dataTables_wrapper').css('overflow', 'visible');
            });
        });
    </script>
@endsection