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
            border: 1px solid #e91e63;
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

<<<<<<< HEAD
<div class="container-fluid">
  <div class="table-container">
    <div class="table-header">
      Laporan
      <a href="/tamu/create"><button type="button" class="btn btn-light btn-sm float-end rounded-2" data-bs-toggle="modal" data-bs-target="#modal-tambah-siswa">
        <i class="fas fa-plus me-1"></i> Tambah
      </button></a>
    </div>
    <div class="authors-table p-3">
      <table id="datatablesSimple" class="table table-hover w-100">
        <thead class="text-center align-middle">
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Ortu/Tamu</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Kunjungan</th>
            <th>No.HP</th>
            <th>Alamat Tamu</th>
            <th>Tindak Lanjut</th>
            <th>Action</th>
          </tr>
        </thead>
           <tbody>
            @foreach ($data as $i => $item )
                        <tr>
                            <td class="text-center">{{ $i + 1 }}</td>
                            <td>{{ $item->tanggal ?? optional($item->created_at)->format('d-m-Y') }}</td>
                            <td>{{ $item->nama_tamu }}</td>
                            <td>{{ optional($item->siswa)->nama ?? '-' }}</td>
                            <td>{{ optional($item->siswa)->kelas ?? '-' }}</td>
                            <td>{{ $item->keperluan ?? '-' }}</td>
                            <td>{{ $item->no_telp ?? '-' }}</td>
                            <td>{{ $item->alamat ?? '-' }}</td>
                            <td>{{ $item->tindak_lanjut ?? '-' }}</td>
                            <td><a href="{{ url('/tamu/'.$item->id. '/edit')}}" class="btn btn-sm btn-primary">Edit</a>
                           <form action="{{ url('/tamu/'.$item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</button>
                           </form>
                          </td>
                        </tr>
                         @endforeach
=======
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
                Laporan
                <a href="/tamu/create"><button type="button" class="btn btn-light btn-sm float-end rounded-2"
                        data-bs-toggle="modal" data-bs-target="#modal-tambah-siswa">
                        <i class="fas fa-plus me-1"></i> Tambah
                    </button></a>
            </div>
            <div class="authors-table p-3">
                <table id="datatablesSimple" class="table table-hover w-100">
                    <thead class="text-center align-middle">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Ortu/Tamu</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Kunjungan</th>
                            <th>No.HP</th>
                            <th>Alamat Tamu</th>
                            <th>Tindak Lanjut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                            <tr>
                                <td class="text-center align-middle">{{ $key + 1 }}</td>
                                <td class="text-center align-middle">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td class="text-center align-middle">{{ $item->nama_tamu }}</td>
                                <td class="text-center align-middle">{{ $item->siswa->nama_siswa }}</td>
                                <td class="text-center align-middle">{{ $item->siswa->tingkat }} {{ $item->siswa->jurusan }}</td>
                                <td class="text-center align-middle">{{ $item->siswa->total_kunjungan }}</td>
                                <td class="text-center align-middle">{{ $item->no_telp }}</td>
                                <td class="text-center align-middle">{{ $item->alamat }}</td>
                                <td class="text-center align-middle">{{ $item->tindak_lanjut }}</td>
                                <td class="text-center align-middle">
                                    <a href="/tamu/{{ $item->id }}/edit"><button
                                            class="btn btn-sm btn-primary">Edit</button></a>
                                </td>
                            </tr>
                        @endforeach
>>>>>>> 2cc3af225b471e5e38db06b628234c76ae6830d9
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#datatablesSimple').DataTable({
                responsive: true,
                language: {
                    search: "Cari:",
                    searchPlaceholder: "Cari siswa...",
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
                    [0, 'asc']
                ],
                pageLength: 10,
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "Semua"]
                ],
                columnDefs: [{
                    className: "text-center",
                    targets: [0, 2, 4]
                }]
            });
        });

        function btnTambah() {
            // Add your save logic here
            console.log('Simpan data siswa');
            $('#modal-tambah-siswa').modal('hide');
        }
    </script>
@endsection
