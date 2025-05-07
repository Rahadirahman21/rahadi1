@extends('mainLayouts')

@section('content')
<div class="container mt-5 mb-5">
    <h1 class="text-center mb-3">SELAMAT DATANG DI E-POINT SISWA</h1>
    <h2 class="text-center mb-5">SMKN 4 TASIKMALAYA</h2>

    @if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @else
        <div class="alert alert-info">You are logged in!</div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header text-center">Jumlah Siswa</div>
                <div class="card-body">
                  <h5 class="card-title text-center">@isset($jmlSiswas) {{ $jmlSiswas }} @else - @endisset</h5>
                </div>
              </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header text-center">Jumlah Pelanggar</div>
                <div class="card-body">
                  <h5 class="card-title text-center">@isset($jmlPelanggars) {{ $jmlPelanggars }} @else - @endisset</h5>
                </div>
              </div>
            
        </div>
    </div>
    <div class="mb-4">
    </div>

    <hr>

    <h3 class="mt-4 mb-3">Top 10 Siswa Dengan Poin Pelanggaran Tertinggi</h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th >Foto</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>No HP</th>
                    <th>Poin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                 @forelse ($pelanggars as $pelanggar)
                 
                <tr>
                    <td>
                        <img src="{{ asset('storage/siswas/' . $pelanggar->image) }}" width="80" height="80" alt="Foto Siswa">
                    </td>
                    <td>{{ $pelanggar->nis }}</td>
                    <td>{{ $pelanggar->name }}</td>
                    <td>{{ $pelanggar->tingkatan }} {{ $pelanggar->jurusan }} {{ $pelanggar->kelas }}</td>
                    <td>{{ $pelanggar->hp }}</td>
                    <td>{{ $pelanggar->poin_pelanggar }}</td>
                    <td>
                        <a href="{{ route('pelanggar.show', $pelanggar->id) }}" class="btn btn-sm btn-dark">Detail</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Data tidak ditemukan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <hr>

    <h3 class="mt-4 mb-3">Top 10 Pelanggaran yang Sering Dilakukan</h3>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Nama Pelanggaran</th>
                    <th>Konsekuensi</th>
                    <th>Poin</th>
                    <th>Total Pelanggaran</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($hitung as $hit)
                <tr>
                    <td>{{ $hit->jenis }}</td>
                    <td>{{ $hit->konsekuensi }}</td>
                    <td>{{ $hit->poin }}</td>
                    <td>{{ $hit->totals }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Data tidak ditemukan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
