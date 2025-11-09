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
            background: linear-gradient(135deg, #5f6deeff, #ffffffff);
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
            max-width: 1400px;
            margin: 2rem auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.07);
            overflow: hidden;
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
                Tabel Data Siswa
                <button type="button" class="btn btn-light btn-sm float-end rounded-2" data-bs-toggle="modal"
                    data-bs-target="#modal-tambah-siswa">
                    <i class="fas fa-plus me-1"></i> Tambah
                </button>
            </div>
            <div class="authors-table p-3">
                <table id="datatablesSimple" class="table table-hover w-100">
                    <thead class="text-center align-middle">
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Kasus</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $key => $s)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $s->nama_siswa }}</td>
                                <td class="text-center">{{ $s->tingkat }} {{ $s->jurusan }}</td>
                                <td>{{ $s->kasus }}</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="modal"
                                        data-bs-target="#modal-edit-siswa-{{ $s->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    </a>
                                    <a onclick="confirmDelete({{ $s->id }})"
                                        class="btn btn-sm btn-outline-danger me-1"><i class="fas fa-trash"></i></a>
                                    <form id="delete-form-{{ $s->id }}" action="/siswa/{{ $s->id }}"
                                        method="GET" style="display:none;">
                                    </form>
                                </td>
                            </tr>

                            <div class="modal fade" id="modal-edit-siswa-{{ $s->id }}" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">Tambah Data Siswa</h5>
                                            <button type="button" class="btn-close btn-close-white"
                                                data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="form-tambah" action="/siswa/{{ $s->id }}" method="POST">
                                                @csrf
                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">NIS <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="nis-tambah"
                                                            placeholder="Masukkan NIS" required name="nis"
                                                            value="{{ $s->nis }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">Nama Siswa <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="nama-tambah"
                                                            placeholder="Masukkan Nama Lengkap" required name="nama"
                                                            value="{{ $s->nama_siswa }}">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">Tingkat <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <select class="form-select" required name="tingkat">
                                                            <option value="">Pilih Tingkat</option>
                                                            <option value="X"
                                                                {{ $s->tingkat == 'X' ? 'selected' : '' }}>X</option>
                                                            <option value="XI"
                                                                {{ $s->tingkat == 'XI' ? 'selected' : '' }}>XI</option>
                                                            <option value="XII"
                                                                {{ $s->tingkat == 'XII' ? 'selected' : '' }}>XII</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-3 col-form-label">Jurusan <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control"
                                                                aria-label="Text input with dropdown button"
                                                                id="customInput" placeholder="masukkan jurusan"
                                                                name="jurusan" value="{{ $s->jurusan }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-0">
                                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button class="btn btn-primary"
                                                        style="background: #8d5bbcff; border-color: #63dfe3ff;"
                                                        onclick="btnTambah()">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="modal-tambah-siswa" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Tambah Data Siswa</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="form-tambah" action="/siswa" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">NIS <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nis-tambah" placeholder="Masukkan NIS"
                                    required name="nis">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Nama Siswa <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama-tambah"
                                    placeholder="Masukkan Nama Lengkap" required name="nama">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Tingkat <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select class="form-select" id="tingkat-tambah" required name="tingkat">
                                    <option value="">Pilih Tingkat</option>
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Jurusan <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control"
                                        aria-label="Text input with dropdown button" id="customInput"
                                        placeholder="masukkan jurusan" name="jurusan">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button class="btn btn-primary" style="background: #8d5bbcff; border-color: #63dfe3ff;"
                                onclick="btnTambah()">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
