@extends('mainLayouts')

@section('content')
<div class="container mt-4">
    <h1>Data Siswa SMKN 4 TASIKMALAYA</h1>

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
        <div class="form-group">
            <label for="cari">Cari:</label>
            <input type="text" name="cari" id="cari" class="form-control d-inline-block w-25" placeholder="Nama atau NIS">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>

    <a href="{{ route('siswa.create') }}" class="btn btn-success mb-3">Tambah Siswa</a>

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Foto</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Kelas</th>
                <th>No. HP</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($siswas as $siswa)
            <tr>
                <td>
                    <img src="{{ asset('storage/siswas/' . $siswa->image) }}" alt="Foto {{ $siswa->name }}" width="100">
                </td>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->name }}</td>
                <td>{{ $siswa->email }}</td>
                <td>{{ $siswa->tingkatan }} {{ $siswa->jurusan }} {{ $siswa->kelas }}</td>
                <td>{{ $siswa->hp }}</td>
                <td>{{ $siswa->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                <td>
                    <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" 
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');" style="display:inline;">
                        <a href="{{ route('siswa.show', $siswa->id) }}" class="btn btn-sm btn-dark">Show</a>
                        <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">
                    <p>Data tidak ditemukan.</p>
                    <a href="{{ route('siswa.index') }}" class="btn btn-link">Kembali</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $siswas->links() }}
    </div>
</div>



{{-- JS CDN --}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
@endsection
