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
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nama Siswa</label>
                                <input class="form-control" list="namaSiswaOptions"
                                    placeholder="Ketik atau pilih nama siswa">
                                <datalist id="namaSiswaOptions">
                                    <option value="Hayyuk Mabar Bro Yahaha">
                                    <option value="FF Mabar">
                                    <option value="Ngopi Lek">
                                </datalist>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Orang Tua/Wali</label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama Orang Tua/Wali">
                            </div>
                            <div class="mb-3">
                                <label for="basic-url" class="form-label">Nomor Telepon</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon3">+62</span>
                                    <input type="text" class="form-control" id="basic-url"
                                        aria-describedby="basic-addon3 basic-addon4">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Alamat Tamu</label>
                                <textarea class="form-control" rows="2" placeholder="Masukkan Alamat Tamu"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanda Tangan Tamu/Wali</label>
                                <textarea class="form-control" rows="2" placeholder="Masukkan Tanda Tangan"></textarea>
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