@extends('mainLayouts')

@section('content')
<div class="container mt-4">
    <h1>Data Pelanggar</h1>

    <div class="mb-3">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Menu Utama</a>
        {{-- <a href="{{ route('logout') }}" class="btn btn-danger"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
           Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form> --}}
    </div>

    <a href="{{ route('pelanggar.create') }}" class="btn btn-success mb-3">Tambah Pelanggar</a>

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Foto</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>No HP</th>
                <th>Poin</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pelanggars as $pelanggar)
            <tr>
                <td>
                    <img src="{{ asset('storage/siswas/' . $pelanggar->image) }}" alt="Foto Siswa" width="120px" height="120px">
                </td>
                <td>{{ $pelanggar->nis }}</td>
                <td>{{ $pelanggar->name }}</td>
                <td>{{ $pelanggar->tingkatan }} {{ $pelanggar->jurusan }} {{ $pelanggar->kelas }}</td>
                <td>{{ $pelanggar->hp }}</td>
                <td>{{ $pelanggar->poin_pelanggar }}</td>
                <td>
                    @if ($pelanggar->status == 0)
                        Tidak Perlu Ditindak
                    @elseif ($pelanggar->status == 1)
                        <form action="{{ route('pelanggar.statusTindak', $pelanggar->id) }}" method="POST"
                              onsubmit="return confirm('Apakah Anda yakin {{ $pelanggar->name }} sudah ditindak?');">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-warning btn-sm">Perlu Ditindak</button>
                        </form>
                    @elseif ($pelanggar->status == 2)
                        Sudah Ditindak
                    @endif
                </td>
                <td>
                    <form action="{{ route('pelanggar.destroy', $pelanggar->id) }}" method="POST"
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');" style="display:inline;">
                        <a href="{{ route('detailPelanggar.show', $pelanggar->id) }}" class="btn btn-sm btn-dark">Detail</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">
                    <p>Data Tidak Ditemukan</p>
                    <a href="{{ route('pelanggar.index') }}" class="btn btn-link">Kembali</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $pelanggars->links() }}
    </div>
</div>
@endsection
