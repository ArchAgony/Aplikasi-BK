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

        .modal-header {
            background: linear-gradient(135deg, #e91e63, #f06292);
            color: white;
            padding: 15px 20px;
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

        /* ✅ FIX SEARCH BOX POSITION */
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
            border: 1px solid #4cb0de;
            padding: 0.4em 1em;
            width: 250px;
            transition: all 0.3s ease;
        }

        .dataTables_wrapper .dataTables_filter input:focus {
            outline: none;
            border-color: #4cb0de;
            box-shadow: 0 0 0 0.2rem rgba(76, 176, 222, 0.25);
        }

        /* ✅ FIX LENGTH MENU POSITION */
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
            border: 1px solid #4cb0de;
            padding: 0.3em 1em;
            min-width: 70px;
        }

        /* ✅ INFO & PAGINATION STYLING */
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
            background: #4cb0de;
            color: white;
            border-color: #4cb0de;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #4cb0de;
            color: white;
            border-color: #4cb0de;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* ✅ CLEAR FLOATS */
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

        /* ✅ RESPONSIVE TABLE */
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

        .btn-export {
            background: linear-gradient(135deg, #4caf50, #81c784) !important;
            color: white !important;
            border: none !important;
            padding: 8px 16px !important;
            font-weight: 500 !important;
            box-shadow: 0 2px 8px rgba(76, 175, 80, 0.3) !important;
            transition: all 0.3s ease !important;
            border-radius: 20px !important;
        }

        .btn-export:hover {
            background: linear-gradient(135deg, #45a049, #75b870) !important;
            transform: translateY(-1px) !important;
            box-shadow: 0 4px 12px rgba(76, 175, 80, 0.4) !important;
            color: white !important;
        }

        .btn-export:active {
            transform: translateY(0) !important;
        }

        .btn-tambah {
            background: linear-gradient(135deg, #2196f3, #64b5f6) !important;
            color: white !important;
            border: none !important;
            padding: 8px 16px !important;
            font-weight: 500 !important;
            box-shadow: 0 2px 8px rgba(33, 150, 243, 0.3) !important;
            transition: all 0.3s ease !important;
            border-radius: 20px !important;
            margin-right: 8px !important;
        }

        .btn-tambah:hover {
            background: linear-gradient(135deg, #1976d2, #5c9ed6) !important;
            transform: translateY(-1px) !important;
            box-shadow: 0 4px 12px rgba(33, 150, 243, 0.4) !important;
            color: white !important;
        }

        /* ✅ CHILD ROW STYLING */
        .details-control {
            background: linear-gradient(135deg, #4cb0de, #64c5f0);
            color: white;
            cursor: pointer;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(76, 176, 222, 0.3);
        }

        .details-control:hover {
            background: linear-gradient(135deg, #3a9cc9, #4cb0de);
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(76, 176, 222, 0.4);
        }

        .details-control.shown {
            background: linear-gradient(135deg, #3a9cc9, #4cb0de);
        }

        .child-row-details {
            background: linear-gradient(135deg, #f8f9fa, #ffffff);
            padding: 20px;
            border-left: 4px solid #4cb0de;
            box-shadow: inset 0 2px 8px rgba(0, 0, 0, 0.05);
            max-height: 600px;
            overflow-y: auto;
        }

        /* Custom Scrollbar for child row */
        .child-row-details::-webkit-scrollbar {
            width: 8px;
        }

        .child-row-details::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .child-row-details::-webkit-scrollbar-thumb {
            background: #4cb0de;
            border-radius: 10px;
        }

        .child-row-details::-webkit-scrollbar-thumb:hover {
            background: #3a9cc9;
        }

        .detail-item {
            margin-bottom: 15px;
            padding: 12px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .detail-item:last-child {
            margin-bottom: 0;
        }

        .detail-label {
            font-weight: 600;
            color: #4cb0de;
            margin-bottom: 5px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .detail-content {
            color: #333;
            line-height: 1.6;
            font-size: 14px;
            white-space: pre-wrap;
            word-wrap: break-word;
            max-height: 200px;
            overflow-y: auto;
            padding-right: 5px;
        }

        /* Custom Scrollbar for detail content */
        .detail-content::-webkit-scrollbar {
            width: 6px;
        }

        .detail-content::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .detail-content::-webkit-scrollbar-thumb {
            background: #4cb0de;
            border-radius: 10px;
        }

        .detail-content::-webkit-scrollbar-thumb:hover {
            background: #3a9cc9;
        }
    </style>

    <div class="container-fluid">
        <div class="table-container">
            <div class="table-header">
                Data Buku Kasus
                <!-- ✅ TOMBOL EXPORT YANG DIUPDATE -->
                <a href="/laporan/export/excel">
                    <button type="button" class="btn btn-export btn-sm float-end rounded-2">
                        <i class="fas fa-file-excel me-1"></i> Export Excel
                    </button>
                </a>
                <a href="/laporan/create">
                    <button type="button" class="btn btn-tambah btn-sm float-end rounded-2">
                        <i class="fas fa-plus me-1"></i> Tambah Kasus
                    </button>
                </a>
            </div>
            <div class="authors-table p-3">
                <table id="datatablesSimple" class="table table-hover w-100">
                    <thead class="text-center align-middle">
                        <tr>
                            <th>Detail</th>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Siswa</th>
                            <th>Kelas</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporan as $key => $item)
                            <tr data-masalah="{{ $item->masalah }}" 
                                data-penyebab="{{ $item->penyebab }}"
                                data-tindak="{{ $item->tindak_lanjut }}" 
                                data-penyelesaian="{{ $item->penyelesaian }}">
                                <td class="text-center align-middle">
                                    <button class="details-control">
                                        <i class="fas fa-plus-circle"></i>
                                    </button>
                                </td>
                                <td class="text-center align-middle">{{ $key + 1 }}</td>
                                <td class="text-center align-middle">
                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}
                                </td>
                                <td class="text-center align-middle">
                                    {{ $item->siswa->nama_siswa ?? 'Siswa Dihapus' }}
                                </td>
                                <td class="text-center align-middle">
                                    {{ $item->siswa->tingkat ?? '-' }} {{ $item->siswa->jurusan ?? '-' }}
                                </td>
                                <td class="text-center align-middle">{{ $item->keterangan }}</td>
                                <td class="text-center align-middle">
                                    <div class="d-flex justify-content-center gap-1">
                                        <a href="/laporan/{{ $item->id }}/edit"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a onclick="confirmDelete({{ $item->id }}); return false;"
                                            class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <form id="delete-form-{{ $item->id }}"
                                            action="/laporan/{{ $item->id }}" method="post" style="display:none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
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
                responsive: false,
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
                order: [
                    [2, 'desc'] // Sort by tanggal
                ],
                pageLength: 10,
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "Semua"]
                ],
                columnDefs: [{
                    orderable: false,
                    targets: [0, 6]
                }]
            });

            // Format function for child row details
            function format(masalah, penyebab, tindak, penyelesaian) {
                return '<div class="child-row-details">' +
                    '<div class="detail-item">' +
                    '<div class="detail-label"><i class="fas fa-exclamation-triangle me-2"></i>Masalah</div>' +
                    '<div class="detail-content">' + (masalah || '-') + '</div>' +
                    '</div>' +
                    '<div class="detail-item">' +
                    '<div class="detail-label"><i class="fas fa-search me-2"></i>Penyebab</div>' +
                    '<div class="detail-content">' + (penyebab || '-') + '</div>' +
                    '</div>' +
                    '<div class="detail-item">' +
                    '<div class="detail-label"><i class="fas fa-clipboard-list me-2"></i>Tindak Lanjut</div>' +
                    '<div class="detail-content">' + (tindak || '-') + '</div>' +
                    '</div>' +
                    '<div class="detail-item">' +
                    '<div class="detail-label"><i class="fas fa-check-circle me-2"></i>Penyelesaian</div>' +
                    '<div class="detail-content">' + (penyelesaian || '-') + '</div>' +
                    '</div>' +
                    '</div>';
            }

            // Add event listener for opening and closing details
            $('#datatablesSimple tbody').on('click', '.details-control', function() {
                var tr = $(this).closest('tr');
                var row = table.row(tr);
                var button = $(this);

                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                    button.removeClass('shown');
                    button.html('<i class="fas fa-plus-circle"></i>');
                } else {
                    // Open this row
                    var masalah = tr.data('masalah');
                    var penyebab = tr.data('penyebab');
                    var tindak = tr.data('tindak');
                    var penyelesaian = tr.data('penyelesaian');

                    row.child(format(masalah, penyebab, tindak, penyelesaian)).show();
                    tr.addClass('shown');
                    button.addClass('shown');
                    button.html('<i class="fas fa-minus-circle"></i>');
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
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@endsection