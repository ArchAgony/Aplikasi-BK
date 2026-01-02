@extends('master')
@section('content')
    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Kunjungan Rumah</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                min-height: 100vh;
                padding: 20px;
            }

            .report-container {
                max-width: 900px;
                margin: 0 auto;
                animation: slideUp 0.5s ease;
            }

            @keyframes slideUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .header-card {
                background: white;
                border-radius: 20px;
                padding: 30px;
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
                margin-bottom: 20px;
                position: relative;
                overflow: hidden;
            }

            .header-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 6px;
                background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            }

            .header-content {
                display: flex;
                align-items: center;
                gap: 20px;
            }

            .student-avatar {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 42px;
                font-weight: bold;
                box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
                flex-shrink: 0;
            }

            .student-info h2 {
                font-size: 28px;
                font-weight: 700;
                color: #2d3748;
                margin-bottom: 5px;
            }

            .student-meta {
                display: flex;
                gap: 20px;
                flex-wrap: wrap;
                margin-top: 10px;
            }

            .meta-item {
                display: flex;
                align-items: center;
                gap: 8px;
                color: #718096;
                font-size: 14px;
            }

            .meta-item i {
                color: #667eea;
            }

            .info-card {
                background: white;
                border-radius: 16px;
                padding: 25px;
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
                margin-bottom: 20px;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .info-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
            }

            .card-title {
                display: flex;
                align-items: center;
                gap: 12px;
                font-size: 20px;
                font-weight: 700;
                color: #2d3748;
                margin-bottom: 20px;
                padding-bottom: 15px;
                border-bottom: 2px solid #e2e8f0;
            }

            .card-title .icon-box {
                width: 40px;
                height: 40px;
                border-radius: 12px;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 20px;
            }

            .detail-row {
                display: flex;
                margin-bottom: 15px;
                padding: 12px;
                border-radius: 10px;
                background: #f7fafc;
                transition: background 0.3s ease;
            }

            .detail-row:hover {
                background: #edf2f7;
            }

            .detail-label {
                font-weight: 600;
                color: #4a5568;
                min-width: 180px;
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .detail-label i {
                color: #667eea;
                font-size: 16px;
            }

            .detail-value {
                flex: 1;
                color: #2d3748;
            }

            .content-box {
                background: #f7fafc;
                border-radius: 12px;
                padding: 20px;
                line-height: 1.8;
                color: #2d3748;
                border-left: 4px solid #667eea;
            }

            .action-buttons {
                display: flex;
                gap: 15px;
                margin-top: 30px;
                flex-wrap: wrap;
            }

            .btn-custom {
                padding: 12px 30px;
                border-radius: 12px;
                font-weight: 600;
                border: none;
                cursor: pointer;
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                gap: 10px;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            }

            .btn-primary-custom {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
            }

            .btn-primary-custom:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
            }

            .btn-secondary-custom {
                background: white;
                color: #667eea;
                border: 2px solid #667eea;
            }

            .btn-secondary-custom:hover {
                background: #667eea;
                color: white;
                transform: translateY(-2px);
            }

            .btn-success-custom {
                background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
                color: white;
            }

            .btn-success-custom:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(72, 187, 120, 0.4);
            }

            .badge-custom {
                display: inline-flex;
                align-items: center;
                gap: 5px;
                padding: 6px 14px;
                border-radius: 20px;
                font-size: 13px;
                font-weight: 600;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
            }

            @media (max-width: 768px) {
                .header-content {
                    flex-direction: column;
                    text-align: center;
                }

                .student-avatar {
                    width: 80px;
                    height: 80px;
                    font-size: 32px;
                }

                .student-meta {
                    justify-content: center;
                }

                .detail-row {
                    flex-direction: column;
                    gap: 8px;
                }

                .detail-label {
                    min-width: 100%;
                }

                .action-buttons {
                    flex-direction: column;
                }

                .btn-custom {
                    width: 100%;
                    justify-content: center;
                }
            }

            .empty-state {
                text-align: center;
                padding: 40px;
                color: #a0aec0;
            }

            .empty-state i {
                font-size: 64px;
                margin-bottom: 20px;
                opacity: 0.5;
            }

            @media print {
                body {
                    background: white;
                    padding: 0;
                }

                .action-buttons {
                    display: none;
                }

                .info-card {
                    box-shadow: none;
                    break-inside: avoid;
                }
            }
        </style>
    </head>

    <body>
        <div class="report-container">
            <!-- Header Card -->
            <div class="header-card">
                <div class="header-content">
                    <div class="student-avatar">
                        F
                    </div>
                    <div class="student-info">
                        <h2>Feri Febrianto</h2>
                        <div class="student-meta">
                            <div class="meta-item">
                                <i class="bi bi-book"></i>
                                <span>XI TAB 1</span>
                            </div>
                            <div class="meta-item">
                                <i class="bi bi-hash"></i>
                                <span>NIS: 12345</span>
                            </div>
                            <div class="meta-item">
                                <i class="bi bi-calendar-event"></i>
                                <span>27 Maret 2021</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="info-card">
                <div class="card-title">
                    <div class="icon-box">
                        <i class="bi bi-info-circle"></i>
                    </div>
                    <div class="row">
                        <div class="col">
                            <span>Informasi Kunjungan</span>
                        </div>
                        <div class="col">
                            <a href="{{ route('kunjungan.laporan') }}" class="btn btn-sm btn-outline-primary me-1"><i
                                    class="fas fa-edit"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="detail-row">
                    <div class="detail-label">
                        <i class="bi bi-person-badge"></i>
                        Guru Pembimbing
                    </div>
                    <div class="detail-value">
                        <strong>{{ $kunjungan->nama_guru }}</strong>
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">
                        <i class="bi bi-briefcase"></i>
                        Jabatan
                    </div>
                    <div class="detail-value">
                        {{ $kunjungan->jabatan }}
                    </div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">
                        <i class="bi bi-house-door"></i>
                        Alamat Kunjungan
                    </div>
                    <div class="detail-value">
                        Dsn. Jatimulyo, Ds. Jahtengah, Rt. 4 Rw. 1 Kec. Selopuro
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">
                        <i class="bi bi-clock"></i>
                        Waktu Kunjungan
                    </div>
                    <div class="detail-value">
                        Sabtu, 27 Maret 2021 - 14:00 WIB
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">
                        <i class="bi bi-check-circle"></i>
                        Status
                    </div>
                    <div class="detail-value">
                        <span class="badge-custom">
                            <i class="bi bi-check2"></i>
                            Selesai
                        </span>
                    </div>
                </div>
            </div>

            <!-- Tujuan Kunjungan Card -->
            <div class="info-card">
                <div class="card-title">
                    <div class="icon-box">
                        <i class="bi bi-bullseye"></i>
                    </div>
                    <span>Tujuan Kunjungan Rumah</span>
                </div>
                <div class="content-box">
                    <p>
                        Melakukan kunjungan rumah dalam rangka:
                    </p>
                    <ul style="margin-top: 15px; padding-left: 20px;">
                        <li>Mengetahui kondisi lingkungan tempat tinggal siswa</li>
                        <li>Memahami latar belakang keluarga dan ekonomi siswa</li>
                        <li>Membahas perkembangan akademik dan perilaku siswa di sekolah</li>
                        <li>Menjalin komunikasi yang baik antara sekolah dan orang tua</li>
                        <li>Mencari solusi bersama terkait permasalahan yang dihadapi siswa</li>
                    </ul>
                </div>
            </div>

            <!-- Hasil Wawancara Card -->
            <div class="info-card">
                <div class="card-title">
                    <div class="icon-box">
                        <i class="bi bi-chat-left-text"></i>
                    </div>
                    <span>Hasil Wawancara</span>
                </div>
                <div class="content-box">
                    <h6 style="font-weight: 700; margin-bottom: 15px; color: #4a5568;">
                        <i class="bi bi-people"></i> Narasumber: Ibu Sumiati (Orang Tua)
                    </h6>
                    <p style="margin-bottom: 15px;">
                        Berdasarkan hasil wawancara dengan orang tua siswa, diperoleh informasi bahwa Feri Febrianto
                        merupakan anak yang rajin dan bertanggung jawab di rumah. Kondisi ekonomi keluarga tergolong
                        menengah ke bawah dengan orang tua bekerja sebagai petani.
                    </p>
                    <p style="margin-bottom: 15px;">
                        Orang tua menyampaikan bahwa akhir-akhir ini Feri terlihat kurang bersemangat dalam belajar dan
                        sering menghabiskan waktu dengan bermain game di handphone. Hal ini disebabkan karena Feri merasa
                        kesulitan dalam memahami beberapa mata pelajaran, terutama Matematika dan Bahasa Inggris.
                    </p>
                    <p>
                        Orang tua berharap pihak sekolah dapat memberikan bimbingan tambahan dan motivasi agar Feri dapat
                        meningkatkan prestasi akademiknya. Orang tua juga menyatakan kesediaannya untuk bekerja sama dengan
                        pihak sekolah dalam mendukung pendidikan anaknya.
                    </p>
                </div>
            </div>

            <!-- Kesimpulan Card -->
            <div class="info-card">
                <div class="card-title">
                    <div class="icon-box">
                        <i class="bi bi-clipboard-check"></i>
                    </div>
                    <span>Kesimpulan & Rekomendasi</span>
                </div>
                <div class="content-box">
                    <h6 style="font-weight: 700; margin-bottom: 15px; color: #4a5568;">
                        <i class="bi bi-lightbulb"></i> Kesimpulan
                    </h6>
                    <p style="margin-bottom: 20px;">
                        Siswa memiliki potensi yang baik namun membutuhkan pendampingan dan bimbingan khusus untuk
                        meningkatkan motivasi belajar. Kondisi lingkungan keluarga cukup mendukung untuk proses
                        pembelajaran, meskipun terdapat keterbatasan ekonomi.
                    </p>

                    <h6 style="font-weight: 700; margin-bottom: 15px; color: #4a5568;">
                        <i class="bi bi-star"></i> Rekomendasi Tindak Lanjut
                    </h6>
                    <ol style="padding-left: 20px;">
                        <li style="margin-bottom: 10px;">Memberikan les tambahan untuk mata pelajaran Matematika dan Bahasa
                            Inggris</li>
                        <li style="margin-bottom: 10px;">Melakukan konseling rutin untuk meningkatkan motivasi belajar siswa
                        </li>
                        <li style="margin-bottom: 10px;">Membatasi penggunaan handphone dengan kesepakatan bersama orang tua
                        </li>
                        <li style="margin-bottom: 10px;">Melibatkan siswa dalam kegiatan ekstrakurikuler yang diminati</li>
                        <li>Melakukan monitoring berkala melalui komunikasi dengan orang tua</li>
                    </ol>
                </div>
            </div>

            <!-- Action Buttons -->

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            function downloadPDF() {
                alert('Fitur download PDF akan segera hadir!');
                // Implementasi download PDF bisa menggunakan library seperti jsPDF atau html2pdf
            }
        </script>
    </body>

    </html>
@endsection
