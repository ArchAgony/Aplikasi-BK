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
    </style>
    <div class="container-fluid">
        <div class="table-container">
            <div class="table-header">
                Form Pengisian Buku Tamu
            </div>
            <div class="authors-table p-3">
                <form action="/laporan/{{ $laporan->id }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Siswa</label>
                        <select class="form-select" name="nama" required>
                            <option value="" selected disabled>Nama Siswa</option>
                            @foreach ($siswa as $item)
                                <option value="{{ $item->id }}" {{ $laporan->siswa_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_siswa }} - {{ $item->tingkat }} {{ $item->jurusan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Masalah</label>
                                <textarea class="form-control" rows="3" placeholder="Tuliskan masalah..." name="masalah">{{ $laporan->masalah }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kesimpulan</label>
                                <textarea class="form-control" rows="3" placeholder="Tuliskan kesimpulan..." name="kesimpulan">{{ $laporan->kesimpulan_masalah }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Penyebab</label>
                                <textarea class="form-control" rows="3" placeholder="Tuliskan penyebab..." name="penyebab">{{ $laporan->penyebab }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Evaluasi</label>
                                <select class="form-select" name="evaluasi" required>
                                    <option value="" selected disabled>Pilih kategori...</option>
                                    <option value="efektif" {{ $laporan->evaluasi == 'efektif' ? 'selected' : '' }}>Efektif
                                    </option>
                                    <option value="tidak efektif" {{ $laporan->evaluasi == 'tidak efektif' ? 'selected' : '' }}>Tidak Efektif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penyelesaian</label>
                        <textarea class="form-control" rows="4" placeholder="Tuliskan penyelesaian..." name="penyelesaian">{{ $laporan->penyelesaian }}</textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-4">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
