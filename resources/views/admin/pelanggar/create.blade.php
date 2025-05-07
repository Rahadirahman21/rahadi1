@extends('mainLayouts')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Pilih Data Pelanggar</h1>

    <a href="{{ route('pelanggar.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    

    <form action="" method="get" class="mb-4">
        <label for="cari" class="form-label">Cari :</label>
        <input type="text" name="cari" class="form-control d-inline-block" style="width: auto;" placeholder="Cari NIS atau Nama">
        <input type="submit" value="Cari" class="btn btn-primary">
    </form>

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Foto</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telp/HP</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($siswas as $siswa)
                <tr>
                    <td><img src="{{ asset('storage/siswas/' . $siswa->image) }}" width="120px" height="120px" alt="Foto Siswa"></td>
                    <td>{{ $siswa->nis }}</td>
                    <td>{{ $siswa->name }}</td>
                    <td>{{ $siswa->email }}</td>
                    <td>{{ $siswa->tingkatan }} {{ $siswa->jurusan }} {{ $siswa->kelas }}</td>
                    <td>{{ $siswa->hp }}</td>
                    <td>
                        <form action="{{ route('pelanggar.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
                            <button type="submit" class="btn btn-success">Tambah Pelanggar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Data tidak ditemukan, silahkan cek pada data pelanggar</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        <a href="{{ route('pelanggar.index') }}" class="btn btn-info">Data Pelanggar</a> ||||| 
        <a href="{{ route('pelanggar.create') }}" class="btn btn-warning">Kembali</a>
    </div>

    <div class="mt-4">
        {{ $siswas->links() }}
    </div>
</div>
@endsection
