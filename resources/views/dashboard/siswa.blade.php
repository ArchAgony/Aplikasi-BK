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
      Tabel Kasus Siswa
      <button type="button" class="btn btn-light btn-sm float-end rounded-2 " data-bs-theme="dark" data-bs-toggle="modal" data-bs-target="#modal-tambah-siswa">Tambah</button>
    </div>
    <div class="authors-table p-3">
      <table id="datatablesSimple" class="table table-hover table-bordered align-middle mb-0" style="width:100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Kasus</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
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
            <td>3</td>
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
            <td>2</td>
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
@endsection