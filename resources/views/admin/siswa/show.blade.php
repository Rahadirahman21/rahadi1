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
