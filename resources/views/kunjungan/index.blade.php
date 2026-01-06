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
            max-width: 1400px;
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

        .btn-tambah {
            background: linear-gradient(135deg, #4cb0de, #64c5f0) !important;
            color: white !important;
            border: none !important;
            padding: 8px 16px !important;
            font-weight: 500 !important;
            box-shadow: 0 2px 8px rgba(76, 176, 222, 0.3) !important;
            transition: all 0.3s ease !important;
            border-radius: 20px !important;
        }

        .btn-tambah:hover {
            background: linear-gradient(135deg, #3a9cc9, #4cb0de) !important;
            transform: translateY(-1px) !important;
            box-shadow: 0 4px 12px rgba(76, 176, 222, 0.4) !important;
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
        }

        .badge-custom {
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: 500;
        }
    </style>

    <div class="container-fluid">
        <div class="table-container">
            <div class="table-header">
                Laporan Kunjungan Rumah
                <a href="/kunjungan/create">
                    <button type="button" class="btn btn-tambah btn-sm float-end rounded-2">
                        <i class="fas fa-plus me-1"></i> Tambah Kunjungan
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
                            <th>Peran</th>
                            <th>Nama Ortu</th>
                            <th>Aksi</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                            <tr 
                                data-pekerjaan="{{ $item->pekerjaan }}" 
                                data-alamat="{{ $item->alamat }}" 
                                data-alasan="{{ $item->alasan_tujuan }}" 
                                data-hasil="{{ $item->hasil_wawancara }}"
                                data-tindak="{{ $item->tindak_lanjut }}"
                                >
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
                                    @if ($item->siswa)
                                        <span class="badge badge-custom bg-info">
                                            {{ $item->siswa->tingkat ?? '-' }} {{ $item->siswa->jurusan ?? '-' }}
                                        </span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td class="text-center align-middle">
                                    {{ $item->peran === 'wali' ? $item->hubungan_wali : ucfirst($item->peran) }}
                                </td>
                                <td class="text-center align-middle">{{ $item->nama }}</td>
                                <td class="text-center align-middle">
                                    <div class="d-flex justify-content-center gap-1">
                                        <a class="btn btn-sm btn-warning"
                                            href="{{ route('kunjungan.edit', $item->id) }}">
                                            <i class="bi bi-pencil"></i>
                                            Ubah
                                        </a>
                                        <a class="btn btn-sm btn-danger"
                                            onclick="confirmDelete({{ $item->id }}); return false;">
                                            <i class="bi bi-trash"></i>
                                            Hapus
                                        </a>
                                        <form id="delete-form-{{ $item->id }}"
                                            action="{{ route('kunjungan.destroy', $item->id) }}" method="POST"
                                            style="display:none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
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
                    [2, 'desc'] 
                ],
                pageLength: 10,
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "Semua"]
                ],
                columnDefs: [{
                    orderable: false,
                    targets: [0, 9] 
                }]
            });

            function format(pekerjaan, alamat, alasan, hasil, tindak) {
                return '<div class="child-row-details">' +
                    '<div class="detail-item">' +
                    '<div class="detail-label"><i class="fas fa-question-circle me-2"></i>Pekerjaan</div>' +
                    '<div class="detail-content">' + (pekerjaan || '-') + '</div>' +
                    '</div>' +
                    '<div class="detail-item">' +
                    '<div class="detail-label"><i class="fas fa-question-circle me-2"></i>Alamat    </div>' +
                    '<div class="detail-content">' + (alamat || '-') + '</div>' +
                    '</div>' +
                    '<div class="detail-item">' +
                    '<div class="detail-label"><i class="fas fa-question-circle me-2"></i>Alasan/Tujuan Kunjungan</div>' +
                    '<div class="detail-content">' + (alasan || '-') + '</div>' +
                    '</div>' +
                    '<div class="detail-item">' +
                    '<div class="detail-label"><i class="fas fa-comments me-2"></i>Hasil Wawancara</div>' +
                    '<div class="detail-content">' + (hasil || '-') + '</div>' +
                    '</div>' +
                    '<div class="detail-item">' +
                    '<div class="detail-label"><i class="fas fa-tasks me-2"></i>Tindak Lanjut</div>' +
                    '<div class="detail-content">' + (tindak || '-') + '</div>' +
                    '</div>' +
                    '</div>';
            }

            $('#datatablesSimple tbody').on('click', '.details-control', function() {
                var tr = $(this).closest('tr');
                var row = table.row(tr);
                var button = $(this);

                if (row.child.isShown()) {
                    row.child.hide();
                    tr.removeClass('shown');
                    button.removeClass('shown');
                    button.html('<i class="fas fa-plus-circle"></i>');
                } else {
                    var pekerjaan = tr.data('pekerjaan');
                    var alamat = tr.data('alamat');
                    var alasan = tr.data('alasan');
                    var hasil = tr.data('hasil');
                    var tindak = tr.data('tindak');

                    row.child(format(pekerjaan, alamat, alasan, hasil, tindak)).show();
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