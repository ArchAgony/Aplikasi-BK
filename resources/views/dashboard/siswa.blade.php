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
  .modal-header {
    background: linear-gradient(135deg, #e91e63, #f06292);
    color: white;
    padding: 15px 20px;
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
      Tabel Kasus Siswa
      <button type="button" class="btn btn-light btn-sm float-end rounded-2 " data-bs-theme="dark" data-bs-toggle="modal" data-bs-target="#modal-tambah-siswa">Tambah</button>
    </div>
    <div class="authors-table p-3">
      <table id="datatablesSimple" class="table table-hover table-bordered align-middle mb-0" style="width:100%">
       <thead>
          <tr>
            <th></th>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Kasus</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>         
          <tr>
            <td></td>
            <td>1</td>
            <td>
              <div class="d-flex align-items-center">
                <div class="author-info">
                  <h6>Cendy Alviano </h6>
                </div>
              </div>
            </td>
            <td>XII PPLG 1</td>
            <td>Menemukan Oli</td>
            <td>
              <button class="edit-btn btn btn-sm btn-outline-primary">Edit</button>
            </td>
          </tr>
          <tr>
            <td></td>
            <td>2</td>
            <td>
              <div class="d-flex align-items-center">
                <div class="author-info">
                  <h6>Daoa Alviano </h6>
                </div>
              </div>
            </td>
            <td>XII PPLG 1</td>
            <td>Merokok</td>
            <td>
              <button class="edit-btn btn btn-sm btn-outline-primary">Edit</button>
            </td>
          </tr>
          <tr>
            <td></td>
            <td>3</td>
            <td>
              <div class="d-flex align-items-center">
                <div class="author-info">
                  <h6>Kelvin Alviano </h6>
                </div>
              </div>
            </td>
            <td>XII PPLG 1</td>
            <td>Bolos</td>
            <td>
              <button class="edit-btn btn btn-sm btn-outline-primary">Edit</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-tambah-siswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Siswa</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Siswa</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="nama-tambah" onkeyup="tambahSiswaJq()" placeholder="Masukan Nama Lengkap">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Kelas</label>
              <div class="col-sm-10">
                <div class="col-12">
                  <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                  <select class="form-select" id="inlineFormSelectPref">
                    <option selected>Pilih Kelas</option>
                    <option value="10 RPL 1">X RPL 1</option>
                    <option value="10 RPL 2">X RPL 2</option>
                    <option value="11 RPL 1">XI RPL 1</option>
                    <option value="11 RPL 2">XI RPL 2</option>
                    <option value="12 RPL 1">XII RPL 1</option>
                    <option value="12 RPL 2">XII RPL 2</option>
                  </select>
                </div>
              </div>
            </div>
            
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Kasus</label>
              <div class="col-sm-10">
                <textarea type="email" class="form-control" id="inputEmail3" placeholder="Masukan Alamat"></textarea>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="button" onclick="btnTambah()" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
@endsection