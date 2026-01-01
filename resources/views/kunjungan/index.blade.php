@extends('master')
@section('content')
    <style>
        .table-header {
            background: linear-gradient(135deg, #4cb0deff, #fff3f7);
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
            overflow: visible !important;
        }

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

        .dropdown-item.hijau {
            background: linear-gradient(135deg, #d6ba53ff, #fff3f7);
        }

        .dropdown-item.biru {
            background: linear-gradient(135deg, #449ad4ff, #fff3f7);
        }

        .dropdown-item.merah {
            background: linear-gradient(135deg, #ec2a2aff, #fff3f7);
        }

        .dropdown-item.kuning {
            background: linear-gradient(135deg, #cef011ff, #fff3f7);
        }

        .table td {
            position: relative;
        }

        /* Responsive Row Details Styling */
        td.dt-control {
            text-align: center;
            cursor: pointer;
            color: #4cb0de;
            font-size: 20px;
        }

        td.dt-control:before {
            content: '⊕';
            font-weight: bold;
        }

        tr.shown td.dt-control:before {
            content: '⊖';
            color: #ec2a2a;
        }

        .detail-row {
            background-color: #f9f9f9;
        }

        .detail-content {
            padding: 20px;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .detail-content table {
            width: 100%;
            margin: 0;
        }

        .detail-content table td {
            padding: 8px;
            border-bottom: 1px solid #eee;
        }

        .detail-content table td:first-child {
            font-weight: bold;
            width: 200px;
            color: #555;
        }

        .badge-custom {
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: 500;
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
                Surat Tugas Kunjungan Rumah
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
                            <th width="30">No.</th>
                            <th>Tanggal</th>
                            <th>Nama Guru</th>
                            <th>Jabatan</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                            <tr class="text-center">
                                <td class="dt-control">{{ $key + 1 }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td>{{ $item->nama_guru }}</td>
                                <td>{{ $item->jabatan }}</td>
                                <td>{{ $item->siswa->nama_siswa ?? 'Siswa Dihapus' }}</td>
                                <td>
                                    @if ($item->siswa)
                                        <span class="badge badge-custom bg-info">
                                            {{ $item->siswa->tingkat ?? '-' }} {{ $item->siswa->jurusan ?? '-' }}
                                        </span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-1 justify-content-center">
                                        <div class="dropdown">
                                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-gear"></i> Aksi
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item hijau"
                                                        href="{{ route('kunjungan.laporan', $item->id) }}">
                                                        <i class="bi bi-envelope-paper"></i> Laporan
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item biru"
                                                        href="{{ route('kunjungan.layanan', $item->id) }}">
                                                        <i class="bi bi-house-door"></i> Layanan
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item kuning"
                                                        href="{{ route('kunjungan.edit', $item->id) }}">
                                                        <i class="bi bi-pencil"></i> Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item merah btn"
                                                        onclick="confirmDelete({{ $item->id }}); return false;">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </a>
                                                    <form id="delete-form-{{ $item->id }}"
                                                        action="/kunjungan/{{ $item->id }}/delete" method="GET"
                                                        style="display:none;">
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Function untuk format detail row
            function formatDetails(detailData) {
                return `
                <div class="detail-content">
                    <table class="table table-sm">
                        <tr>
                            <td><i class="bi bi-calendar-event text-primary"></i> Tanggal Kunjungan</td>
                            <td>${detailData.tanggal}</td>
                        </tr>
                        <tr>
                            <td><i class="bi bi-person-badge text-success"></i> Nama Guru</td>
                            <td>${detailData.namaGuru}</td>
                        </tr>
                        <tr>
                            <td><i class="bi bi-briefcase text-info"></i> Jabatan</td>
                            <td>${detailData.jabatan}</td>
                        </tr>
                        <tr>
                            <td><i class="bi bi-person text-warning"></i> Nama Siswa</td>
                            <td>${detailData.namaSiswa}</td>
                        </tr>
                        <tr>
                            <td><i class="bi bi-book text-primary"></i> Kelas</td>
                            <td><span class="badge bg-info">${detailData.tingkat} ${detailData.jurusan}</span></td>
                        </tr>
                        <tr>
                            <td><i class="bi bi-house text-danger"></i> Alamat</td>
                            <td>${detailData.alamat}</td>
                        </tr>
                        <tr>
                            <td><i class="bi bi-hash text-secondary"></i> No. Induk</td>
                            <td>${detailData.noInduk}</td>
                        </tr>
                    </table>
                </div>
            `;
            }

            $(document).ready(function() {
                var table = $('#datatablesSimple').DataTable({
                    columnDefs: [{
                            targets: 0,
                            orderable: false,
                            className: 'dt-control'
                        },
                        {
                            targets: -1, // Kolom hidden data
                            visible: false
                        }
                    ],
                    language: {
                        search: "Cari:",
                        lengthMenu: "Tampilkan _MENU_ data per halaman",
                        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                        infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
                        infoFiltered: "(difilter dari _MAX_ total data)",
                        paginate: {
                            first: "Pertama",
                            last: "Terakhir",
                            next: "Selanjutnya",
                            previous: "Sebelumnya"
                        },
                        emptyTable: "Tidak ada data yang tersedia",
                        zeroRecords: "Tidak ada data yang cocok"
                    },
                    order: [
                        [1, 'desc']
                    ], // Sort by tanggal
                    pageLength: 10,
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "Semua"]
                    ]
                });

                // Event listener untuk membuka/menutup detail row
                $('#datatablesSimple tbody').on('click', 'td.dt-control', function() {
                    var tr = $(this).closest('tr');
                    var row = table.row(tr);
                    var detailDataElement = tr.find('.detail-data');

                    if (row.child.isShown()) {
                        // Row sudah terbuka, tutup
                        row.child.hide();
                        tr.removeClass('shown');
                    } else {
                        // Ambil data dari atribut data-*
                        var detailData = {
                            tanggal: detailDataElement.data('tanggal'),
                            namaGuru: detailDataElement.data('nama-guru'),
                            jabatan: detailDataElement.data('jabatan'),
                            namaSiswa: detailDataElement.data('nama-siswa'),
                            tingkat: detailDataElement.data('tingkat'),
                            jurusan: detailDataElement.data('jurusan'),
                            alamat: detailDataElement.data('alamat'),
                            noInduk: detailDataElement.data('no-induk')
                        };

                        // Buka row detail
                        row.child(formatDetails(detailData)).show();
                        tr.addClass('shown');
                    }
                });
            });

            function confirmDelete(id) {
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Buat form untuk delete
                        var form = document.createElement('form');
                        form.method = 'POST';
                        form.action = '/kunjungan/delete/' + id;

                        var csrfToken = document.createElement('input');
                        csrfToken.type = 'hidden';
                        csrfToken.name = '_token';
                        csrfToken.value = '{{ csrf_token() }}';

                        var methodField = document.createElement('input');
                        methodField.type = 'hidden';
                        methodField.name = '_method';
                        methodField.value = 'DELETE';

                        form.appendChild(csrfToken);
                        form.appendChild(methodField);
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            }
        </script>
    @endpush
@endsection
