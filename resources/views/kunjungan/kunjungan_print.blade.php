<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Tugas Kunjungan Rumah - SMK PGRI Wlingi</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .no-print {
            margin-bottom: 20px;
            text-align: center;
        }

        .btn-print {
            background-color: #2563eb;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-print:hover {
            background-color: #1d4ed8;
        }

        .page {
            max-width: 21cm;
            min-height: 29.7cm;
            margin: 0 auto 20px;
            background: white;
            padding: 2cm;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        /* Header */
        .header {
            border-bottom: 3px solid #000;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }

        .header-content {
            display: flex;
            gap: 15px;
            align-items: flex-start;
        }

        .logo {
            width: 80px;
            height: 80px;
            border: 1px solid #ccc;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f0f0f0;
        }

        .logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .header-text {
            flex: 1;
            text-align: center;
        }

        .header-text p {
            font-size: 10px;
            margin-bottom: 3px;
        }

        .header-text h1 {
            font-size: 16px;
            font-weight: bold;
            margin: 10px 0;
        }

        /* Content */
        .nomor-surat {
            margin-bottom: 20px;
        }

        .title {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 5px;
        }

        .subtitle {
            text-align: center;
            margin-bottom: 20px;
        }

        .content p {
            text-align: justify;
            margin-bottom: 15px;
            line-height: 1.8;
        }

        .form-group {
            margin-left: 40px;
            margin-bottom: 15px;
        }

        .form-row {
            display: flex;
            margin-bottom: 8px;
        }

        .form-label {
            width: 180px;
        }

        .form-separator {
            width: 20px;
        }

        .form-value {
            flex: 1;
            padding: 2px 5px;
            border-bottom: 1px dotted #000;
        }

        .form-input {
            flex: 1;
            border: none;
            border-bottom: 1px dotted #000;
            outline: none;
            padding: 2px 5px;
            font-family: 'Times New Roman', Times, serif;
        }

        /* Signature */
        .signature-section {
            margin-top: 60px;
            display: flex;
            justify-content: space-between;
        }

        .signature-left {
            width: 45%;
        }

        .signature-right {
            width: 45%;
            text-align: center;
        }

        .signature-space {
            height: 80px;
        }

        .signature-line {
            border-bottom: 1px solid #000;
            margin-bottom: 5px;
            width: 200px;
        }

        .signature-right .signature-line {
            margin: 0 auto;
        }

        /* Print Styles */
        @media print {
            body {
                background: white;
                padding: 0;
            }

            .page {
                box-shadow: none;
                padding: 1cm;
                max-width: 100%;
                margin: 0;
                page-break-after: always;
            }

            .page:last-child {
                page-break-after: auto;
            }

            .no-print {
                display: none !important;
            }

            .form-value {
                border-bottom: none;
            }

            .form-input {
                border-bottom: none;
            }

            @page {
                size: F4;
                margin: 1cm;
            }
        }
    </style>
</head>
<body>
    <div class="no-print">
        <button class="btn-print" onclick="window.print()">🖨️ Cetak / Print</button>
    </div>

    @foreach ($data as $key => $item)
    <div class="page">
        <!-- Header -->
        <div class="header">
            <div class="header-content">
                <div class="logo">
                    @if(isset($logo))
                        <img src="{{ asset($logo) }}" alt="Logo Sekolah">
                    @else
                        LOGO
                    @endif
                </div>
                <div class="header-text">
                    <p>YAYASAN PEMBINA LEMBAGA PENDIDIKAN DASAR DAN MENENGAH</p>
                    <p>PERHIMPUNAN GURU REPUBLIK INDONESIA JAWA TIMUR</p>
                    <h1>SEKOLAH MENENGAH KEJURUAN (SMK) PGRI WLINGI</h1>
                    <p>Status : TERAKREDITASI A</p>
                    <p style="margin-top: 10px;">Alamat : Jl. Jendral Sudirman No. 88 Wlingi - Blitar Telp/Fax : (0342) 694305</p>
                    <p>Email : smkpgri_wlg@yahoo.co.id | Website : http://www.smkpgriwlingi.sch.id</p>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="nomor-surat">
            <strong>Nomor :</strong> 
            <input type="text" class="form-input" style="width: 300px;" name="nomor" value="">
        </div>

        <h2 class="title">SURAT TUGAS KUNJUNGAN RUMAH</h2>
        <p class="subtitle">
            NO. <input type="text" class="form-input" style="width: 200px; text-align: center;" name="no_surat" value="">
        </p>

        <div class="content">
            <p>Yang bertanda tangan di bawah ini Kepala SMK PGRI Wlingi memberi tugas kepada :</p>

            <!-- List Guru (Dynamic) -->
            <div class="form-group">
                <div class="form-row">
                    <div class="form-label">1. Nama</div>
                    <div class="form-separator">:</div>
                    <div class="form-value">{{ $item->guru->nama_guru ?? '' }}</div>
                </div>
                <div class="form-row">
                    <div class="form-label">Jabatan</div>
                    <div class="form-separator">:</div>
                    <div class="form-value">{{ $item->guru->jabatan ?? '' }}</div>
                </div>
            </div>

            <p>untuk mengetahui keadaan dan atau menyelesaikan permasalahan putra/putri dari Bapak/Ibu/Saudara/i :</p>

            <!-- Data Siswa -->
            <div class="form-group">
                <div class="form-row">
                    <div class="form-label">Nama</div>
                    <div class="form-separator">:</div>
                    <div class="form-value">{{ $item->siswa->nama_siswa ?? '' }}</div>
                </div>
                <div class="form-row">
                    <div class="form-label">Kelas/No. Presensi</div>
                    <div class="form-separator">:</div>
                    <div class="form-value">{{ $item->siswa->tingkat ?? '-' }} {{ $item->siswa->jurusan ?? '-' }}</div>
                </div>
                <div class="form-row">
                    <div class="form-label">No. Induk</div>
                    <div class="form-separator">:</div>
                    <div class="form-value">{{ $item->siswa->no_induk ?? '' }}</div>
                </div>
                <div class="form-row">
                    <div class="form-label">Alamat</div>
                    <div class="form-separator">:</div>
                    <div class="form-value">{{ $item->siswa->alamat ?? '' }}</div>
                </div>
            </div>

            <p>yang akan dilaksanakan pada :</p>

            <div class="form-group">
                <div class="form-row">
                    <div class="form-label">Hari/Tanggal</div>
                    <div class="form-separator">:</div>
                    <input type="text" class="form-input" name="tanggal" value="{{ $item->tanggal_kunjungan ?? '' }}">
                </div>
            </div>

            <p>Demikian harap menjadi periksa.</p>

            <!-- Signature -->
            <div class="signature-section">
                <div class="signature-left">
                    <p>Kami yang menerima</p>
                    <p>kunjungan</p>
                    <div class="signature-space"></div>
                    <div class="signature-line"></div>
                    <p style="text-align: center;">{{ $item->nama_penerima ?? '___________________' }}</p>
                </div>
                <div class="signature-right">
                    <p>Blitar, <input type="text" class="form-input" style="width: 150px;" name="tanggal_surat" value="{{ $item->tanggal_surat ?? '' }}"></p>
                    <p>Kepala Sekolah</p>
                    <div class="signature-space"></div>
                    <div class="signature-line"></div>
                    <p>NIP. <input type="text" class="form-input" style="width: 150px;" name="nip_kepala" value=""></p>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</body>
</html>