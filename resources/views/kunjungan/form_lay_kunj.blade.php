@extends('master')
@section('content')
    <style>
        body {
            background-color: #f5f5f5;
        }
        .header-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .header-info h6 {
            margin: 0;
            font-size: 14px;
            color: #666;
        }
        .logout-btn {
            font-size: 13px;
            color: #333;
            text-decoration: none;
        }
        
        /* Progress Bar */
        .progress-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            position: relative;
            max-width: 300px;
            margin-left: auto;
            margin-right: auto;
        }
        .progress-line {
            position: absolute;
            top: 20px;
            left: 0;
            width: 100%;
            height: 2px;
            background: #ddd;
            z-index: 0;
        }
        .progress-line-fill {
            height: 100%;
            background: #28a745;
            transition: width 0.3s ease;
        }
        .step {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            border: 2px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #999;
            position: relative;
            z-index: 1;
            transition: all 0.3s ease;
        }
        .step.completed {
            background: #28a745;
            border-color: #28a745;
            color: white;
        }
        .step.active {
            background: #5A7CFF;
            border-color: #5A7CFF;
            color: white;
        }
        
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
        
        .form-step {
            display: none;
        }
        .form-step.active {
            display: block;
        }
        
        /* Buttons */
        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        .btn-back {
            background: #6c757d;
            color: white;
            border: none;
            padding: 10px 30px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-back:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }
        .btn-next, .btn-submit {
            background: linear-gradient(135deg, #5A7CFF, #7A9CFF);
            color: white;
            border: none;
            padding: 10px 30px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(90, 124, 255, 0.3);
        }
        .btn-next:hover, .btn-submit:hover {
            background: linear-gradient(135deg, #4A6DD3, #6A8CE6);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(90, 124, 255, 0.4);
        }
    </style>

    <div class="container-fluid">
        <!-- Header -->
        <div class="header-info">
            <h6 id="pageTitle">pages/Kunjungan<br>Layanan Kunjungan 1</h6>
            <a href="#" class="logout-btn">🚪 Log-out</a>
        </div>

        <!-- Progress Bar -->
        <div class="progress-container">
            <div class="progress-line">
                <div class="progress-line-fill" id="progressFill" style="width: 0%"></div>
            </div>
            <div class="step active" id="step1">1</div>
            <div class="step" id="step2">2</div>
            <div class="step" id="step3">3</div>
        </div>

        <div class="table-container">
            <div class="table-header">
                Form Layanan Kunjungan
            </div>
            <div class="authors-table p-4">
                <form action="{{ route('kunjungan.store') }}" method="POST" id="multiStepForm">
                    @csrf
                    
                    <!-- Step 1 -->
                    <div class="form-step active" data-step="1">
                        <div class="mb-3">
                            <label class="form-label">Judul layanan</label>
                            <input type="text" class="form-control" name="judul_layanan" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Bidang bimbingan</label>
                            <input type="text" class="form-control" name="bidang_bimbingan" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fungsi kegiatan</label>
                            <input type="text" class="form-control" name="fungsi_kegiatan" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Tujuan kegiatan</label>
                                    <textarea class="form-control" name="tujuan_kegiatan" rows="4" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Hasil yang ingin dicapai</label>
                                    <textarea class="form-control" name="hasil_dicapai" rows="4" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="btn-container">
                            <div></div>
                            <button type="button" class="btn-next" onclick="nextStep()">Selanjutnya</button>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="form-step" data-step="2">
                        <div class="mb-3">
                            <label class="form-label">Subyek Yang Mengalami Masalah</label>
                            <input type="text" class="form-control" name="subyek_masalah" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambaran ringkasan masalah</label>
                            <textarea class="form-control" name="ringkasan_masalah" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat rumah</label>
                            <textarea class="form-control" name="alamat_rumah" rows="2" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Waktu/tanggal pelaksanaan</label>
                            <input type="date" class="form-control" name="tanggal_pelaksanaan" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Petugas pengunjung</label>
                            <textarea class="form-control" name="petugas" rows="3" required></textarea>
                        </div>
                        <div class="btn-container">
                            <button type="button" class="btn-back" onclick="prevStep()">Kembali</button>
                            <button type="button" class="btn-next" onclick="nextStep()">Selanjutnya</button>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="form-step" data-step="3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Data yang akan disampaikan</label>
                                    <textarea class="form-control" name="data_disampaikan" rows="4" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Anggota keluarga dan harapan</label>
                                    <textarea class="form-control" name="anggota_keluarga" rows="4" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Penggunaan hasil pertemuan</label>
                                    <textarea class="form-control" name="penggunaan_hasil" rows="4" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Catatan khusus</label>
                                    <textarea class="form-control" name="catatan_khusus" rows="4" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tindak lanjut</label>
                            <input type="text" class="form-control" name="tindak_lanjut" required>
                        </div>
                        <div class="btn-container">
                            <button type="button" class="btn-back" onclick="prevStep()">Kembali</button>
                            <button type="submit" class="btn-submit">Kirim</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        let currentStep = 1;
        const totalSteps = 3;

        function updateProgress() {
            // Update progress bar
            const progressPercentage = ((currentStep - 1) / (totalSteps - 1)) * 100;
            document.getElementById('progressFill').style.width = progressPercentage + '%';

            // Update step indicators
            for (let i = 1; i <= totalSteps; i++) {
                const stepElement = document.getElementById('step' + i);
                if (i < currentStep) {
                    stepElement.classList.add('completed');
                    stepElement.classList.remove('active');
                } else if (i === currentStep) {
                    stepElement.classList.add('active');
                    stepElement.classList.remove('completed');
                } else {
                    stepElement.classList.remove('active', 'completed');
                }
            }

            // Update page title
            const titles = [
                'pages/Kunjungan<br>Layanan Kunjungan 1',
                'Kunjungan/Tambah Layanan Kunjungan<br>Layanan Kunjungan 2',
                'pages/Kunjungan<br>Layanan Kunjungan 3'
            ];
            document.getElementById('pageTitle').innerHTML = titles[currentStep - 1];

            // Show/hide form steps
            document.querySelectorAll('.form-step').forEach(step => {
                step.classList.remove('active');
            });
            document.querySelector(`[data-step="${currentStep}"]`).classList.add('active');
        }

        function nextStep() {
            // Validate current step
            const currentStepElement = document.querySelector(`[data-step="${currentStep}"]`);
            const inputs = currentStepElement.querySelectorAll('input[required], textarea[required], select[required]');
            let isValid = true;

            inputs.forEach(input => {
                if (!input.value.trim()) {
                    input.classList.add('is-invalid');
                    isValid = false;
                } else {
                    input.classList.remove('is-invalid');
                }
            });

            if (!isValid) {
                alert('Mohon lengkapi semua field yang wajib diisi!');
                return;
            }

            if (currentStep < totalSteps) {
                currentStep++;
                updateProgress();
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                updateProgress();
            }
        }

        // Form submission
        document.getElementById('multiStepForm').addEventListener('submit', function(e) {
            // Validate all fields in step 3
            const currentStepElement = document.querySelector(`[data-step="${currentStep}"]`);
            const inputs = currentStepElement.querySelectorAll('input[required], textarea[required], select[required]');
            let isValid = true;

            inputs.forEach(input => {
                if (!input.value.trim()) {
                    input.classList.add('is-invalid');
                    isValid = false;
                    e.preventDefault();
                } else {
                    input.classList.remove('is-invalid');
                }
            });

            if (!isValid) {
                alert('Mohon lengkapi semua field yang wajib diisi!');
                e.preventDefault();
            }
        });

        // Initialize
        updateProgress();
    </script>
@endsection