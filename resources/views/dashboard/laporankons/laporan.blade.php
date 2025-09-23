@extends('master')
@section('content')
    <style>
        .table-header {
            background: linear-gradient(135deg, #e91e63, #f06292);
            color: white;
            padding: 15px 20px;
            border-radius: 10px 10px 0 0;
            font-weight: 600;
            font-size: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 0;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.2em 1em;
            margin: 0 2px;
            border-radius: 20px;
            border: none !important;

            color: #fff !important;
            transition: background 0.2s;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {

            color: #fff !important;
        }

        .dataTables_wrapper .dataTables_filter input {
            border-radius: 20px;
            border: 1px solid #e91e63;
            padding: 0.3em 1em;
        }

        .dataTables_length select {
            border-radius: 20px;
            border: 1px solid #e91e63;
            padding: 0.2em 1em;
        }

        .table-container {
            max-width: 1200px;
            margin: 2rem auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.07);
            overflow: hidden;
        }
    </style>
    <div class="container-fluid">
        <div class="table-container">
            <div class="table-header">
                Laporan Konseling
                 <a href="/laporan/create" type="button" class="btn btn-light btn-sm float-end rounded-2 " data-bs-theme="dark">Tambah</a>
            </div>
            <div class="authors-table p-3">
              <h1>ISINEN PINNNNN !!!</h1>
            </div>
        </div>
    </div>
@endsection