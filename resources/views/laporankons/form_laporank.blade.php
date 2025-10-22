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
        .table-container {
            max-width: 1000px;
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
                <form>
                    <!-- Nama Siswa Full Width -->
                    <div class="mb-3">
                                <label class="form-label">Nama Siswa</label>
                                <select class="form-select">
                                    <option selected disabled>Nama Siswa</option>
                                    <option value="1">Contoh 1</option>
                                    <option value="2">Contoh 2</option>
                                    <option value="3">Gimana</option>
                                </select>
                            </div>

                    <!-- Row Masalah & Penyebab -->
                    <div class="row">
                        <!-- Kolom Masalah -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Masalah</label>
                                <textarea class="form-control" rows="3" placeholder="Tuliskan masalah..."></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kesimpulan</label>
                                <textarea class="form-control" rows="3" placeholder="Tuliskan kesimpulan..."></textarea>
                            </div>
                        </div>
                        <!-- Kolom Penyebab -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Penyebab</label>
                                <textarea class="form-control" rows="3" placeholder="Tuliskan penyebab..."></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Evaluasi</label>
                                <select class="form-select">
                                    <option selected disabled>Pilih kategori...</option>
                                    <option value="1">Contoh 1</option>
                                    <option value="2">Contoh 2</option>
                                    <option value="3">Gimana</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Textarea Penyelesaian Full Width -->
                    <div class="mb-3">
                        <label class="form-label">Penyelesaian</label>
                        <textarea class="form-control" rows="4" placeholder="Tuliskan penyelesaian..."></textarea>
                    </div>

                    <!-- Tombol -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-4">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection