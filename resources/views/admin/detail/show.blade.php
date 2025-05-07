@extends('mainLayouts')

@section('content')
    <style type="text/css">
        table {
            border-collapse: collapse;
            margin: 20px 0px;
            text-align: left;
        }

        table, th, td {
            border: 1px solid;
            padding-right: 20px;
            text-align: left;
        }
    </style>
    <div class="container">
    <h1>Data Pelanggar</h1>
    <a href="{{ route('pelanggar.index') }}" class="btn btn-secondary">Kembali</a>

    <table>
        <tr>
            <td colspan="7" style="text-align: center;">
                <img src="{{ asset('storage/siswas/'.$pelanggar->image) }}" alt="" width="120px" height="120px">
            </td>
        </tr>
        <tr>
            <th colspan="7">Akun Pelanggar</th>
        </tr>
        <tr>
            <td>Nama</td>
            <td>{{ $pelanggar->name }}</td>
        </tr>
        <tr>
            <td>NIS</td>
            <td>{{ $pelanggar->nis }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $pelanggar->email }}</td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>{{ $pelanggar->tingkatan }} {{ $pelanggar->jurusan }} {{ $pelanggar->kelas }}</td>
        </tr>
        <tr>
            <td>HP</td>
            <td>{{ $pelanggar->hp }}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                @if ($pelanggar->status == 0)
                    <b>Belum Ditindak</b>
                @elseif ($pelanggar->status == 1)
                    <b>Perlu Ditindak</b>
                @else
                    <b>Sudah Ditindak</b>
                @endif
            </td>
        </tr>
        <tr>
            <td>Total Poin</td>
            <td><h1>{{ $pelanggar->poin_pelanggar }}</h1></td>
        </tr>
    </table>

    <h1>Pelanggaran Yang Dilakukan</h1>
    
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    @if ($pelanggar->status == 0 || $pelanggar->status == 1)
        <button onclick="myFunction()" class="btn btn-success">Tambah Pelanggaran</button>
        <script>
            function myFunction() {
                alert("Poin Pelanggar Sudah Mencapai {{ $pelanggar->poin_pelanggar }} Poin, Pelanggar Perlu Ditindak!");
            }
        </script>
    @else
        <a href="{{ route('pelanggar.show', $pelanggar->id) }}" >Tambah Pelanggaran</a>
    @endif

    <table class="tabel">
        <tr>
            <th>name PK</th>
            <th>Tanggal</th>
            <th>Jenis</th>
            <th>Konsekuensi</th>
            <th>Poin</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        @forelse ($details as $detail)
            <tr>
                <td>{{ $detail->name }}</td>
                <td>{{ $detail->created_at }}</td>
                <td>{{ $detail->jenis }}</td>
                <td>{{ $detail->konsekuensi }}</td>
                <td>{{ $detail->poin }}</td>
                <td>
                    @if ($detail->status == 0)
                        <form onsubmit="return confirm('Apakah {{ $pelanggar->name }} Sudah Diberikan Sanksi ?');" action="{{ route('detailPelanggar.update', $detail->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id_pelanggar" value="{{ $detail->id_pelanggar }}">
                            <button type="submit" class="btn btn-warning text-white">Beri Sanksi</button>
                        </form>
                    @else
                        <b>Sudah Diberikan Sanksi</b>
                    @endif
                </td>
                <td>
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('detailPelanggar.destroy', $detail->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id_pelanggar" value="{{ $detail->id_pelanggar }}">
                        <input type="hidden" name="PoinPelanggaran" value="{{ $detail->poin }}">
                        <button type="submit" class="btn btn-danger">Hapus Pelanggaran</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td>
                    <p>data tidak ditemukan, Silahkan Tambah Pelanggaran</p>
                </td>
                <td>
                    <a href="{{ route('pelanggar.show', $pelanggar->id) }}">Tambah</a>
                </td>
            </tr>
        @endforelse
    </table>

    {{ $details->links() }}
</div>

@endsection