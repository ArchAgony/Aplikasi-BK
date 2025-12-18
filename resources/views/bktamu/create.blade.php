@extends('master')
@section('content')
    <style>
        .table-header {
            background: linear-gradient(135deg, #49adf0ff, #99dde6ff);
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
                Form Pengisian Buku Tamu
            </div>
            <div class="authors-table p-3">
                <form action="/tamu/store" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nama Siswa</label>
                                <select class="form-select" id="search-select" name="nama" required>
                                    <option value="" selected disabled>Nama Siswa</option>
                                    @foreach ($siswa as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->nama_siswa }} - {{ $item->tingkat }} {{ $item->jurusan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Orang Tua/Wali</label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama Orang Tua/Wali"
                                    name="ortu" required>
                            </div>
                            <div class="mb-3">
                                <label for="basic-url" class="form-label">Nomor Telepon</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon3">+62</span>
                                    <input type="number" class="form-control" id="basic-url"
                                        aria-describedby="basic-addon3 basic-addon4" required name="no">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat Tamu</label>
                                <textarea class="form-control" rows="2" placeholder="Masukkan Alamat Tamu" required name="alamat"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="basic-url" class="form-label">Tindak Lanjut / Hasil Koordinasi</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="basic-url"
                                        aria-describedby="basic-addon3 basic-addon4" required name="tindak">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-4">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection