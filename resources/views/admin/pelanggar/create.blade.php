<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
</head>
<body>
    <h1>Pilih Data Pelanggar:</h1>
    <a href="{{ route('pelanggar.index') }}">Kembali</a><br><br>

    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <form action="" method="get">
        <label>Cari :</label>
        <input type="text" name="cari">
        <input type="submit" value="Cari">
    </form>
    <br><br>

    <table class="table1">
        <tr>
            <th>Foto</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telp/HP</th>
            <th>Alamat</th>
        </tr>

        @forelse ($siswas as $siswa)
        <tr>
            <td><img src="{{ asset('storage/siswas/' . $siswa->image) }}" width="120px" height="120px" alt=""></td>
            <td>{{ $siswa->nis }}</td>
            <td>{{ $siswa->name }}</td>
            <td>{{ $siswa->email }}</td>
            <td>{{ $siswa->tingkatan }} {{ $siswa->jurusan }} {{ $siswa->kelas }}</td>
            <td>{{ $siswa->hp }}</td>
            <td>
                <form action="{{ route('pelanggar.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
                    <button type="submit">Tambah Pelanggar</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7"><p>Data tidak ditemukan silahkan cek pada data pelanggar</p></td>
        </tr>
        @endforelse
    </table>

    <a href="{{ route('pelanggar.index') }}">Data Pelanggar</a> ||||| <a href="{{ route('pelanggar.create') }}">Kembali</a>

    {{ $siswas->links() }}
</body>
</html>
