@extends('master')
@section('content')
    <style>
        .table-header {
            background: linear-gradient(135deg, #1f80adff, #f3f4ffff);
            color: white;
            padding: 15px 20px;
            border-radius: 10px 10px 0 0;
            font-weight: 600;
            font-size: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 0;
        }
        .table-container {
            max-width: 1000px;
            margin: 2rem auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.07);
            overflow: hidden;
        }
        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }
        .btn-submit {
            background: linear-gradient(135deg, #2196F3, #42A5F5);
            border: none;
            padding: 10px 40px;
            border-radius: 25px;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(33, 150, 243, 0.3);
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(33, 150, 243, 0.4);
        }
    </style>
    <div class="container-fluid">
        <div class="table-container">
            <div class="table-header">
                Form Tugas Kunjungan Rumah
            </div>
            <div class="authors-table p-4">
                
            <form action="/kunjungan/{{ $data->id }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nama Siswa</label>
                                <select class="form-select" id="search-select" name="nama" required>
                                    <option value="" selected disabled>Nama Siswa</option>
                                    @foreach ($siswa as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $data->siswa_id == $item->id ? 'selected' : '' }}
                                            >
                                            {{ $item->nama_siswa }} - {{ $item->tingkat }} {{ $item->jurusan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nama Guru</label>
                                <input type="text" name="nama_guru" class="form-control" placeholder="Masukkan nama guru"
                                    required value="{{ $data->nama_guru }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Dilaksanakan pada tanggal</label>
                                <input type="date" name="tanggal_laksana" class="form-control" required value="{{ $data->tanggal_laksana }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Jabatan</label>
                                <input type="text" name="jabatan" class="form-control" placeholder="Masukkan jabatan"
                                    required value="{{ $data->jabatan }}">
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-submit">Kirim</button>
                    </div>
                </form>
        </div>
    </div>
@endsection