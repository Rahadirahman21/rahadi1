@extends('mainLayouts')
@section('content')

      <div class="container">
    <h1>Data Siswa SMKN 4 TASIKMALAYA</h1>
    <a href="{{ route('admin.dashboard') }}">Menu Utama</a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    
    <br><br>
    
    <form action="" method="get">
        <label for="cari">Cari:</label>
        <input type="text" name="cari" id="cari">
        <input type="submit" value="Cari">
    </form>
    
    <br><br>
    
    <a href="{{ route('siswa.create') }}"class="btn btn-primary">Tambah Siswa</a>

    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <br><br>
    <table class="table" border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>Foto</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Kelas</th>
                <th>No. Hp</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($siswas as $siswa)
            <tr>
                <td><img src="{{ asset('storage/siswas/' . $siswa->image) }}" alt="Foto {{ $siswa->name }}" width="100">
                </td>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->name }}</td>
                <td>{{ $siswa->email }}</td>
                <td>{{ $siswa->tingkatan }} {{ $siswa->jurusan }} {{ $siswa->kelas }}</td>
                <td>{{ $siswa->hp }}</td>
                
                    @if ($siswa->status == 1)
                        <td>Aktif</td>
                    @else
                        <td>Tidak Aktif</td>
                    @endif
                
                <td>
                    <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');" action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                        <a href="{{ route('siswa.show', $siswa->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                        <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8">
                    <p>Data tidak ditemukan</p>
                    <a href="{{ route('siswa.index') }}">Kembali!</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $siswas->links() }}
</div>

<footer class="">
    <p>Created with <i class="bi bi-heart-pulse-fill text-danger"></i> by <a href="https://www.instagram.com/rahadirahman3/?next=https%3A%2F%2Fwww.instagram.com%2Frahadirahman3%2F" class="text-white fw-bold">Rahadi Rahman</a></p>
  </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
@endsection
