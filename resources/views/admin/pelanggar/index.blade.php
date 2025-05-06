<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Data Pelanggar</h1>
    <a href="{{ route('admin.dashboard') }}">Menu Utama</a><br>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').sumbit();">Logout</a>
    <br><br>
    <form action="{{ route('logout') }}" id="logout-form" method="POST">
        @csrf
    </form>
    <br><br>
    <a href="{{ route('pelanggar.create') }}">Tambah Pelanggar</a>

    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    <table class="tabel">
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
        @forelse ($pelanggars as $pelanggar)
        <tr>
            <td><img src="{{ asset('storage/siswas/'.$pelanggar->image) }}" alt="" width="120px" height="120px"></td>
            <td>{{ $pelanggar->nis }}</td>
            <td>{{ $pelanggar->tingkatan }} {{ $pelanggar->jurusan }} {{ $pelanggar->kelas }}</td>
            <td>{{ $pelanggar->hp }} </td>
            <td>{{ $pelanggar->poin_pelanggar }} </td>
            @if ($pelanggar->status == 0):
            <td>Tidak Perli Ditindak</td>
            @elseif ($pelanggar->status == 1)
            <td>
                <form action="{{ route('pelanggar.statusTindak',$pelanggar->id) }}" method="POST" onsubmit="return confirm('Apakah Anda Yakin {{ $pelanggar->name }}Sudak Ditindak? ');">
                    @csrf
                @method('PUT')
                <button type="sumbit">Perlu Ditindak</button>
                </form>
                
            </td>
            @elseif($pelanggar->status == 2)
            <td>Sudah Ditindak</td>
            @endif
            <td>
                <form  action="{{ route('pelanggar.destroy',$pelanggar->id) }}" method="POST"onsubmit="return confirm('Apakah Anda Yakin ? ');">
                    <a href="{{ route('detailPelanggar.show',$pelanggar->id) }}" class="btn btn-sm btn-dark">Detail</a>
                    @csrf
                    @method('DELETE')
                <button type="sumbit">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td>
                <p>Data Tidak Ditemukan</p>
            </td>
            <td>
                <a href="{{ route('pelanggar.index') }}">kembali</a>
            </td>
        </tr>
        @endforelse
    </table>
    {{ $pelanggars->links() }}


        
    
</body>
</html>