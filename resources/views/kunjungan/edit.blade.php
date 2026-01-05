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
                Form Laporan Kunjungan Rumah
            </div>
            <div class="authors-table p-4">

                <form action="/kunjungan/{{ $data->id }}" method="POST">
                    @csrf

                    <div>
                        <label class="form-label">Nama Siswa</label>
                        <select name="siswa_id" class="form-select" required>
                            @foreach ($siswa as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $data->siswa_id ? 'selected' : '' }}>
                                    {{ $item->nama_siswa }} - {{ $item->tingkat }} {{ $item->jurusan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <hr>
                    <h5>Data Kunjungan Rumah</h5>

                    <div id="kunjungan-wrapper">
                        <div class="kunjungan-item border rounded p-3 mb-3">

                            <label class="form-label d-block">Peran</label>
                            <div class="d-flex gap-3 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="peran" value="ayah"
                                        {{ old('peran', $data->peran) === 'ayah' ? 'checked' : '' }}>
                                    <label class="form-check-label">Ayah</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="peran" value="ibu"
                                        {{ old('peran', $data->peran) === 'ibu' ? 'checked' : '' }}>
                                    <label class="form-check-label">Ibu</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="peran" value="wali"
                                        {{ old('peran', $data->peran) === 'wali' ? 'checked' : '' }}>
                                    <label class="form-check-label">Wali</label>
                                </div>
                            </div>

                            <div id="hubungan-wali-wrapper"
                                class="{{ old('peran', $data->peran) === 'wali' ? '' : 'd-none' }}">
                                <label>Hubungan Wali</label>
                                <input type="text" name="hubungan_wali"
                                    value="{{ old('hubungan_wali', $data->hubungan_wali) }}" class="form-control">
                            </div>

                            <div class="mb-2">
                                <label>Nama</label>
                                <input type="text" name="nama" value="{{ old('nama', $data->nama) }}"
                                    class="form-control" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Pekerjaan</label>
                                    <input type="text" name="pekerjaan" value="{{ old('pekerjaan', $data->pekerjaan) }}"
                                        class="form-control" required>
                                </div>

                                <div class="col-md-6">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" value="{{ old('alamat', $data->alamat) }}"
                                        class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Alasan / Tujuan</label>
                        <textarea name="alasan_tujuan" class="form-control" required>
{{ old('alasan_tujuan', $data->alasan_tujuan) }}
</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Hasil Wawancara</label>
                        <textarea name="hasil_wawancara" class="form-control" required>
{{ old('hasil_wawancara', $data->hasil_wawancara) }}
</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Tindak Lanjut</label>
                        <textarea name="tindak_lanjut" class="form-control" required>
{{ old('tindak_lanjut', $data->tindak_lanjut) }}
</textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            document.querySelectorAll('input[name="peran"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    const wrapper = document.getElementById('hubungan-wali-wrapper');
                    if (this.value === 'wali') {
                        wrapper.classList.remove('d-none');
                    } else {
                        wrapper.classList.add('d-none');
                        wrapper.querySelector('input').value = '';
                    }
                });
            });
        </script>
    @endsection
