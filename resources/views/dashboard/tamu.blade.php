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
            overflow: hidden;
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
    </style>
</head>
<body style="background-color: #f5f7fa;">
    <div class="container-fluid">
        <div class="table-container">
            <div class="table-header">
                Tabel Tamu 
            </div>
            
            <div class="authors-table">
                <table class="table table-hover mb-0">
                    <thead style="background-color: #f8f9fa;">
                        <tr>
                            <th scope="col" style="color: #6c757d; font-weight: 600; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px;">No</th>
                            <th scope="col" style="color: #6c757d; font-weight: 600; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px;">Nama Orang Tua</th>
                            <th scope="col" style="color: #6c757d; font-weight: 600; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px;">Siswa</th>
                            <th scope="col" style="color: #6c757d; font-weight: 600; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px;">Kelas</th>
                            <th scope="col" style="color: #6c757d; font-weight: 600; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px;">Kunjungan Ke</th>
                            <th scope="col" style="color: #6c757d; font-weight: 600; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px;">No.HP</th>
                            <th scope="col" style="color: #6c757d; font-weight: 600; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px;">Alamat Orang Tua</th>
                            <th scope="col" style="color: #6c757d; font-weight: 600; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px;">Tindak Lanjut</th>
                            <th scope="col" style="color: #6c757d; font-weight: 600; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px;">Tanda Tangan</th>
                            <th scope="col" style="color: #6c757d; font-weight: 600; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                1
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="author-info">
                                        <h6>Bu Anda </h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                Daniar Kelvin Halim Alfian
                            </td>
                            <td>
                                XII PPLG 1
                            </td>
                            <td>
                                1
                            </td>
                            <td>
                                +6281234567890
                            </td>
                            <td>
                                Popohan, Sidoarjo
                            </td>
                            <td>
                                Dikeluarkan
                            </td>
                            <td>
                                Dikeluarkan
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>  
@endsection