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
            max-height: 400px;
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
    </style>
</head>
<body style="background-color: #f5f7fa;">
    <div class="container-fluid">
        <div class="table-container">
            <div class="table-header">
                Tabel Kasus Siswa
            </div>
            
            <div class="authors-table">
                <table class="table table-hover mb-0">
                    <thead style="background-color: #f8f9fa;">
                        <tr>
                            <th scope="col" style="color: #6c757d; font-weight: 600; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px;">No</th>
                            <th scope="col" style="color: #6c757d; font-weight: 600; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px;">Kelas</th>
                            <th scope="col" style="color: #6c757d; font-weight: 600; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px;">NIS</th>
                            <th scope="col" style="color: #6c757d; font-weight: 600; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px;">Nama Siswa</th>
                            <th scope="col" style="color: #6c757d; font-weight: 600; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px;">Hari / Tgl</th>
                            <th scope="col" style="color: #6c757d; font-weight: 600; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px;">Tujuan</th>
                            <th scope="col" style="color: #6c757d; font-weight: 600; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px;">Kesimpulan</th>
                            <th scope="col" style="color: #6c757d; font-weight: 600; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px;">Laporan Kunjungan & Layanan Kunjungan Rumah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                1
                            </td>
                            <td>
                                XII RPL 1
                            </td>
                            <td>
                                1920304012
                            </td>
                            <td>
                                Arifin Bachtiar Noble
                            </td>
                            <td>
                                12/12/2025
                            </td>
                            <td>
                                Melengkapi data Induk
                            </td>
                            <td>
                                <button type="button" class="btn btn-info">Info</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-success">Tambah</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>  
@endsection