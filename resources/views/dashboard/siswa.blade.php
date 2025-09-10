@extends('master')
@section('content')

   <style>
        .table-header {
            background: linear-gradient(135deg, #e91e63, #f06292);
            color: white;
            padding: 15px 20px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        
        .authors-table {
            border-radius: 10px;
            overflow: auto;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        
        .table > :not(caption) > * > * {
            padding: 1rem 1.25rem;
            border-color: #f8f9fa;
        }
        
        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 12px;
        }
        
        .author-info h6 {
            margin: 0;
            font-weight: 600;
            color: #2c3e50;
        }
        
        .author-info small {
            color: #6c757d;
        }
        
        .function-title {
            font-weight: 600;
            color: #2c3e50;
            margin: 0;
        }
        
        .function-subtitle {
            color: #6c757d;
            font-size: 0.875rem;
            margin: 0;
        }
        
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .status-online {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-offline {
            background-color: #d1ecf1;
            color: #0c5460;
        }
        
        .employed-date {
            color: #6c757d;
            font-weight: 500;
        }
        
        .edit-btn {
            background: none;
            border: none;
            color: #6c757d;
            font-weight: 500;
            cursor: pointer;
            transition: color 0.3s;
        }
        
        .edit-btn:hover {
            color: #e91e63;
        }
        
        tbody tr {
            transition: background-color 0.3s;
        }
        
        tbody tr:hover {
            background-color: #f8f9fa;
        }
        
        .table-container {
            max-width: 1200px;
            margin: 2rem auto;
            background: white;
            border-radius: 10px;
        }

        /* Custom DataTables Styling */
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 20px;
        }

        .dataTables_wrapper .dataTables_filter input {
            border: 2px solid #e91e63;
            border-radius: 25px;
            padding: 8px 15px;
            margin-left: 10px;
            outline: none;
            transition: all 0.3s;
        }

        .dataTables_wrapper .dataTables_filter input:focus {
            box-shadow: 0 0 10px rgba(233, 30, 99, 0.3);
        }

        .dataTables_wrapper .dataTables_length select {
            border: 2px solid #e91e63;
            border-radius: 5px;
            padding: 5px 10px;
            margin: 0 5px;
        }

        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_paginate {
            margin-top: 20px;
            padding: 15px 20px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            border-radius: 5px;
            margin: 0 2px;
            padding: 8px 12px;
            border: 1px solid #e91e63;
            background: white;
            color: #e91e63 !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #e91e63 !important;
            color: white !important;
            border-color: #e91e63;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #e91e63 !important;
            color: white !important;
            border-color: #e91e63;
        }

        /* Custom search box styling */
        .custom-search {
            margin-bottom: 20px;
            padding: 0 20px;
        }

        .search-container {
            position: relative;
            max-width: 300px;
            margin-left: auto;
        }

        .search-input {
            width: 100%;
            padding: 12px 40px 12px 20px;
            border: 2px solid #e91e63;
            border-radius: 25px;
            outline: none;
            font-size: 14px;
            transition: all 0.3s;
        }

        .search-input:focus {
            box-shadow: 0 0 15px rgba(233, 30, 99, 0.3);
            border-color: #c2185b;
        }

        .search-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #e91e63;
            font-size: 16px;
        }
    </style>

<div class="container-fluid">
    <div class="table-container">
        <div class="table-header">
            Tabel Kasus Siswa
        </div>
        
        <div class="authors-table">
            <table class="table table-hover mb-0" id="siswaTabel">
                <thead style="background-color: #f8f9fa;">
                    <tr>
                        <th scope="col" style="color: #6c757d; font-weight: 600; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px;">No</th>
                        <th scope="col" style="color: #6c757d; font-weight: 600; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px;">Nama Siswa</th>
                        <th scope="col" style="color: #6c757d; font-weight: 600; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px;">Kelas</th>
                        <th scope="col" style="color: #6c757d; font-weight: 600; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px;">Kasus</th>
                        <th scope="col" style="color: #6c757d; font-weight: 600; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="author-info">
                                    <h6>Cendy Alviano</h6>
                                </div>
                            </div>
                        </td>
                        <td>XII PPLG 1</td>
                        <td>Menemukan Oli</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary edit-btn">Edit</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="author-info">
                                    <h6>Ahmad Rizki</h6>
                                </div>
                            </div>
                        </td>
                        <td>XI PPLG 2</td>
                        <td>Terlambat Masuk</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary edit-btn">Edit</button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="author-info">
                                    <h6>Siti Maharani</h6>
                                </div>
                            </div>
                        </td>
                        <td>X PPLG 1</td>
                        <td>Tidak Mengerjakan Tugas</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary edit-btn">Edit</button>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="author-info">
                                    <h6>Budi Santoso</h6>
                                </div>
                            </div>
                        </td>
                        <td>XII PPLG 2</td>
                        <td>Berkelahi</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary edit-btn">Edit</button>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="author-info">
                                    <h6>Maya Sari</h6>
                                </div>
                            </div>
                        </td>
                        <td>XI PPLG 1</td>
                        <td>Membolos</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary edit-btn">Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#siswaTabel').DataTable({
        "language": {
            "search": "Cari:",
            "lengthMenu": "Tampilkan _MENU_ data per halaman",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
            "infoFiltered": "(difilter dari _MAX_ total data)",
            "zeroRecords": "Tidak ada data yang ditemukan",
            "emptyTable": "Tidak ada data tersedia",
            "paginate": {
                "first": "Pertama",
                "last": "Terakhir",
                "next": "Selanjutnya",
                "previous": "Sebelumnya"
            }
        },
        "pageLength": 10,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Semua"]],
        "ordering": true,
        "searching": true,
        "paging": true,
        "info": true,
        "responsive": true,
        "columnDefs": [
            { "orderable": false, "targets": 4 } // Disable sorting for Action column
        ]
    });
});
</script>
@endsection