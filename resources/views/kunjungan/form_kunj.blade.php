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
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nama Guru</label>
                                <input type="text" name="nama_guru" class="form-control" placeholder="Masukkan nama guru"
                                    required>
                            </div>
                        </div>
                    </div>

                    <!-- Row 2: Nama Siswa & Dilaksanakan pada tanggal -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Dilaksanakan pada tanggal</label>
                                <input type="date" name="tanggal_laksana" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Jabatan</label>
                                <input type="text" name="jabatan" class="form-control" placeholder="Masukkan jabatan"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label class="form-label">Kami Yang Menerima Kunjungan <span
                                            class="text-danger">*</span></label>
                                    <div class="border rounded p-2 bg-white" style="touch-action: none;">
                                        <canvas id="canvas-ttd-tamu" width="500" height="200"
                                            style="border: 2px dashed #ccc; width: 100%; max-width: 500px;"></canvas>
                                    </div>
                                    <div class="mt-2">
                                        <button type="button" class="btn btn-sm btn-warning" id="btn-clear-ttd">
                                            <i class="fas fa-redo"></i> Bersihkan
                                        </button>
                                        <small class="text-muted ms-2">
                                            <i class="fas fa-info-circle"></i> Tanda tangan di area putih
                                        </small>
                                    </div>
                                    <input type="hidden" name="ttd_kunjungan" id="ttd-kunjungan-data" required>
                                </div>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const canvas = document.getElementById('canvas-ttd-tamu');

            if (!canvas) {
                console.error('Canvas tidak ditemukan!');
                return;
            }

            function resizeCanvas() {
                const ratio = Math.max(window.devicePixelRatio || 1, 1);
                const rect = canvas.getBoundingClientRect();

                canvas.width = rect.width * ratio;
                canvas.height = rect.height * ratio;

                const ctx = canvas.getContext('2d');
                ctx.scale(ratio, ratio);

                signaturePad.clear();
            }

            const signaturePad = new SignaturePad(canvas, {
                backgroundColor: 'rgb(255, 255, 255)',
                penColor: 'rgb(0, 0, 0)',
                minWidth: 1,
                maxWidth: 3,
                throttle: 0,
                velocityFilterWeight: 0.7
            });

            resizeCanvas();

            window.addEventListener('resize', function() {
                resizeCanvas();
            });

            document.getElementById('btn-clear-ttd').addEventListener('click', function() {
                signaturePad.clear();
                document.getElementById('ttd-kunj-data').value = '';
            });

            document.getElementById('form-kunjungan').addEventListener('submit', function(e) {
                if (signaturePad.isEmpty()) {
                    e.preventDefault();
                    alert('Tanda tangan harus diisi!');
                    return false;
                }
                const dataURL = signaturePad.toDataURL('image/png');
                document.getElementById('ttd-kunj-data').value = dataURL;
            });

            console.log('Signature Pad initialized successfully!');
        });
    </script>
@endsection
