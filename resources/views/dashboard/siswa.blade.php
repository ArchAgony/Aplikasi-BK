@extends('master')
@section('content')
<div class="card shadow-sm mb-4">
  <div class="card-header d-flex justify-content-between align-items-center text-white bg-primary">
    <span>Daftar Kasus Siswa</span>
    <!-- search akan ditaruh sini oleh DataTables -->
    <div id="dt-search-container"></div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-hover align-middle" id="datatablesSimple">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Siswa</th>
            <th scope="col">Kelas</th>
            <th scope="col">Kasus</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Andi Saputra</td>
            <td>XI IPA 2</td>
            <td>Terlambat 3 kali</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection