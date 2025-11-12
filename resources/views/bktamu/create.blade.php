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
                Form Pengisian Buku Tamu
            </div>
            <div class="authors-table p-3">
                <form action="/tamu" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nama Siswa</label>
                                <select class="form-select" name="nama" required>
                                    <option value="" selected disabled>Nama Siswa</option>
                                    @foreach ($siswa as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->nama_siswa }}
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
                                    <input type="text" class="form-control" id="basic-url"
                                        aria-describedby="basic-addon3 basic-addon4" required name="no">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="basic-url" class="form-label">Tindak lanjut</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="basic-url"
                                        aria-describedby="basic-addon3 basic-addon4" required name="tindak">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Alamat Tamu</label>
                                <textarea class="form-control" rows="2" placeholder="Masukkan Alamat Tamu" required name="alamat"></textarea>
                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label class="form-label">Tanda Tangan Tamu/Wali <span
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
                                    <input type="hidden" name="ttd_tamu" id="ttd-tamu-data" required>
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
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>

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
                document.getElementById('ttd-tamu-data').value = '';
            });

            document.getElementById('form-buku-tamu').addEventListener('submit', function(e) {
                if (signaturePad.isEmpty()) {
                    e.preventDefault();
                    alert('Tanda tangan harus diisi!');
                    return false;
                }
                const dataURL = signaturePad.toDataURL('image/png');
                document.getElementById('ttd-tamu-data').value = dataURL;
            });

            console.log('Signature Pad initialized successfully!');
        });
    </script>
@endsection
