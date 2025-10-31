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
            max-width: 900px;
            margin: 2rem auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.07);
            overflow: hidden;
        }
        .form-label {
            font-weight: 500;
            color: #333;
            margin-bottom: 8px;
            font-size: 14px;
        }
        .btn-submit {
            background: linear-gradient(135deg, #6B7EF5, #8A9CFF);
            border: none;
            padding: 10px 50px;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(107, 126, 245, 0.3);
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(107, 126, 245, 0.4);
            background: linear-gradient(135deg, #5A6DD3, #7A8CE6);
        }
        .form-control, .form-select {
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 8px 12px;
            width: 100%;
        }
        .form-control:focus, .form-select:focus {
            border-color: #6B7EF5;
            box-shadow: 0 0 0 0.2rem rgba(107, 126, 245, 0.15);
        }
    </style>
    <div class="container-fluid">
        <div class="table-container">
            <div class="table-header">
                Form Laporan Kunjungan Rumah
            </div>
            <div class="authors-table p-4">
                <form action="{{ route('kunjungan.store') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <!-- Nama Siswa -->
                            <div class="mb-3">
                                <label class="form-label">Nama Siswa</label>
                                <input type="text" name="nama_siswa" class="form-control" required>
                            </div>

                            <!-- Tujuan rumah -->
                            <div class="mb-3">
                                <label class="form-label">Tujuan rumah</label>
                                <input type="text" name="tujuan_rumah" class="form-control" required>
                            </div>

                            <!-- Hasil Wawancara -->
                            <div class="mb-3">
                                <label class="form-label">Hasil Wawancara</label>
                                <textarea name="hasil_wawancara" class="form-control" rows="5" required></textarea>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <!-- Kesimpulan -->
                            <div class="mb-3">
                                <label class="form-label">Kesimpulan</label>
                                <textarea name="kesimpulan" class="form-control" rows="5" required></textarea>
                            </div>

                            <!-- Tanda Tangan Guru -->
                            <div class="mb-3">
                                <label class="form-label">Tanda Tangan Guru</label>
                                <textarea name="tanda_tangan_guru" class="form-control" rows="5" required></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-submit">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection