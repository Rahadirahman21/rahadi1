@extends('mainLayouts')

@section('content')
  <style>
    table {
      border-collapse: collapse;
      margin: 20px 0;
      width: 100%;
    }
    table, th, td {
      border: 1px solid #000;
      padding: 10px;
      text-align: left;
    }
    .centered {
      text-align: center;
    }
    </style>
<div class="container">
  <h1>Detail Siswa</h1>
  <a href="{{ route('siswa.index') }}" class="btn btn-secondary mb-3">Kembali</a>
  <table class="table">
    <table>
      <tr>
        <img src="{{ asset('storage/siswas/' . $siswa->image) }}" width="120px" height="120px" alt="Foto Siswa">
      </tr>
    </table>
    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
      <table class="table">
        <!-- head -->
        <thead>
          <tr>
            <th></th>
            <th>Name</th>
            <th>Job</th>
            <th>Favorite Color</th>
          </tr>
        </thead>
        <tbody>
          <!-- row 1 -->
          <tr>
            <th>1</th>
            <td>Cy Ganderton</td>
            <td>Quality Control Specialist</td>
            <td>Blue</td>
          </tr>
          <!-- row 2 -->
          <tr>
            <th>2</th>
            <td>Hart Hagerty</td>
            <td>Desktop Support Technician</td>
            <td>Purple</td>
          </tr>
          <!-- row 3 -->
          <tr>
            <th>3</th>
            <td>Brice Swyre</td>
            <td>Tax Accountant</td>
            <td>Red</td>
          </tr>
        </tbody>
      </table>
    </div>
  
  <table class="table">
    <tr>
      <td colspan="4" class="centered">
        <img src="{{ asset('storage/siswas/' . $siswa->image) }}" width="120px" height="120px" alt="Foto Siswa">
      </td>
    </tr>
    <tr>
      <th colspan="2">Akun Siswa</th>
      <th colspan="2">Data Siswa</th>
    </tr>
    <tr>
      <th>Nama</th>
      <td>{{ $siswa->name }}</td>
      <th>NIS</th>
      <td>{{ $siswa->nis }}</td>
    </tr>
    <tr>
      <th>Email</th>
      <td>{{ $siswa->email }}</td>
      <th>Kelas</th>
      <td>{{ $siswa->tingkatan }} {{ $siswa->jurusan }} {{ $siswa->kelas }}</td>
    </tr>
    <tr>
      <th colspan="2"></th>
      <th>No HP</th>
      <td>{{ $siswa->hp }}</td>
    </tr>
    <tr>
      <th colspan="2"></th>
      <th>Status</th>
      <td>{{ $siswa->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
    </tr>
  </table>
</div>
@endsection
