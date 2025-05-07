@extends('mainLayouts')

@section('content')
<div class="container mt-4">
    <h1>Data Pelanggaran</h1>

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

    <form action="" method="get" class="mb-4">
        <label for="cari">Cari:</label>
        <input type="text" name="cari" id="cari" value="{{ request('cari') }}">
        <input type="submit" value="Cari" class="btn btn-sm btn-info">
    </form>

    <a href="{{ route('pelanggaran.create') }}" class="btn btn-success mb-3">Tambah Pelanggaran</a>

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Jenis</th>
                <th>Konsekuensi</th>
                <th>Poin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pelanggarans as $pelanggaran)
            <tr>
                <td>{{ $pelanggaran->jenis }}</td>
                <td>{{ $pelanggaran->konsekuensi }}</td>
                <td>{{ $pelanggaran->poin }}</td>
                <td>
                    <a href="{{ route('pelanggaran.edit', $pelanggaran->id) }}" class="btn btn-sm btn-primary">EDIT</a>

                    <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');"
                          action="{{ route('pelanggaran.destroy', $pelanggaran->id) }}"
                          method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">
                    <p>Data tidak ditemukan</p>
                    <a href="{{ route('pelanggaran.index') }}" class="btn btn-link">Kembali</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $pelanggarans->links() }}
    </div>
</div>
@endsection
