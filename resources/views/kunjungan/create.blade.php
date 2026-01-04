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

                <form action="{{ route('kunjungan.store') }}" method="POST">
                    @csrf

                    <div>
                        <label class="form-label">Nama Siswa</label>
                        <select class="form-select" name="siswa_id" required>
                            <option value="" disabled selected>Pilih Siswa</option>
                            @foreach ($siswa as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->nama_siswa }} - {{ $item->tingkat }} {{ $item->jurusan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <hr>
                    <h5>Data Kunjungan Rumah</h5>

                    <div id="kunjungan-wrapper">
                        <div class="kunjungan-item border rounded p-3 mb-3">

                            <!-- PERAN (RADIO) -->
                            <label class="form-label d-block">Peran</label>
                            <div class="d-flex gap-3 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input peran-radio" type="radio" name="peran[0]"
                                        value="ayah" checked>
                                    <label class="form-check-label">Ayah</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input peran-radio" type="radio" name="peran[0]"
                                        value="ibu">
                                    <label class="form-check-label">Ibu</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input peran-radio wali-radio" type="radio" name="peran[0]"
                                        value="wali">
                                    <label class="form-check-label">Wali</label>
                                </div>
                            </div>

                            <!-- HUBUNGAN WALI (HANYA JIKA WALI) -->
                            <div class="mb-2 hubungan-wali-wrapper d-none">
                                <label>Hubungan Wali</label>
                                <input type="text" class="form-control hubungan-wali-input" name="hubungan_wali[0]"
                                    placeholder="Contoh: Paman, Bibi">
                            </div>

                            <!-- NAMA -->
                            <div class="mb-2">
                                <label>Nama</label>
                                <input type="text" name="nama[]" class="form-control" required>
                            </div>

                            <!-- PEKERJAAN & ALAMAT -->
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Pekerjaan</label>
                                    <input type="text" name="pekerjaan[]" class="form-control" required>
                                </div>

                                <div class="col-md-4">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat[]" class="form-control" required>
                                </div>

                                <div class="col-md-2 d-flex align-items-end">
                                    <button type="button" class="btn btn-danger remove-btn w-100">
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" id="add-kunjungan" class="btn btn-primary mb-3">
                        + Tambah Data
                    </button>

                    <div class="mb-3">
                        <label>Alasan / Tujuan</label>
                        <textarea name="alasan_tujuan" class="form-control" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Hasil Wawancara</label>
                        <textarea name="hasil_wawancara" class="form-control" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Tindak Lanjut</label>
                        <textarea name="tindak_lanjut" class="form-control" required></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let index = 1;

        document.getElementById('add-kunjungan').addEventListener('click', function() {
            const wrapper = document.getElementById('kunjungan-wrapper');

            const item = document.createElement('div');
            item.classList.add('kunjungan-item', 'border', 'rounded', 'p-3', 'mb-3');

            item.innerHTML = `
        <label class="form-label d-block">Peran</label>
        <div class="d-flex gap-3 mb-2">
            <div class="form-check">
                <input class="form-check-input peran-radio" type="radio"
                    name="peran[${index}]" value="ayah" checked>
                <label class="form-check-label">Ayah</label>
            </div>

            <div class="form-check">
                <input class="form-check-input peran-radio" type="radio"
                    name="peran[${index}]" value="ibu">
                <label class="form-check-label">Ibu</label>
            </div>

            <div class="form-check">
                <input class="form-check-input peran-radio wali-radio" type="radio"
                    name="peran[${index}]" value="wali">
                <label class="form-check-label">Wali</label>
            </div>
        </div>

        <div class="mb-2 hubungan-wali-wrapper d-none">
            <label>Hubungan Wali</label>
            <input type="text" class="form-control hubungan-wali-input"
                name="hubungan_wali[${index}]"
                placeholder="Contoh: Paman, Bibi">
        </div>

        <div class="mb-2">
            <label>Nama</label>
            <input type="text" name="nama[]" class="form-control" required>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label>Pekerjaan</label>
                <input type="text" name="pekerjaan[]" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label>Alamat</label>
                <input type="text" name="alamat[]" class="form-control" required>
            </div>

            <div class="col-md-2 d-flex align-items-end">
                <button type="button" class="btn btn-danger remove-btn w-100">
                    Hapus
                </button>
            </div>
        </div>
    `;

            wrapper.appendChild(item);
            index++;
        });

        // toggle hubungan wali
        document.addEventListener('change', function(e) {
            if (e.target.classList.contains('peran-radio')) {
                const container = e.target.closest('.kunjungan-item');
                const waliWrapper = container.querySelector('.hubungan-wali-wrapper');
                const waliInput = container.querySelector('.hubungan-wali-input');

                if (e.target.value === 'wali') {
                    waliWrapper.classList.remove('d-none');
                    waliInput.required = true;
                } else {
                    waliWrapper.classList.add('d-none');
                    waliInput.required = false;
                    waliInput.value = '';
                }
            }
        });

        // hapus baris
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-btn')) {
                e.target.closest('.kunjungan-item').remove();
            }
        });
    </script>
@endsection
