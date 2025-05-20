@extends('mainLayouts')

@section('content')
<div class="max-w-5xl mx-auto p-8">
  <div class="bg-white shadow-lg rounded-xl p-6">
    <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Data Pelanggar</h1>
            <a href="{{ route('pelanggar.index') }}" class="text-sm text-blue-600 hover:underline">← Kembali</a>
        </div>

    <table class="table-auto border-collapse border border-gray-300 w-full mb-6">
        <tr>
            <td colspan="7" class="text-center p-4 border border-gray-300">
                <img src="{{ asset('storage/siswas/' . $pelanggar->image) }}" alt="Foto Pelanggar" class="mx-auto" width="120" height="120">
            </td>
        </tr>
        <tr>
            <th colspan="7" class="border border-gray-300 bg-gray-100 p-2 text-left">Akun Pelanggar</th>
        </tr>
        <tr>
            <td class="border border-gray-300 p-2 font-semibold">Nama</td>
            <td class="border border-gray-300 p-2">{{ $pelanggar->name }}</td>
        </tr>
        <tr>
            <td class="border border-gray-300 p-2 font-semibold">NIS</td>
            <td class="border border-gray-300 p-2">{{ $pelanggar->nis }}</td>
        </tr>
        <tr>
            <td class="border border-gray-300 p-2 font-semibold">Email</td>
            <td class="border border-gray-300 p-2">{{ $pelanggar->email }}</td>
        </tr>
        <tr>
            <td class="border border-gray-300 p-2 font-semibold">Kelas</td>
            <td class="border border-gray-300 p-2">{{ $pelanggar->tingkatan }} {{ $pelanggar->jurusan }} {{ $pelanggar->kelas }}</td>
        </tr>
        <tr>
            <td class="border border-gray-300 p-2 font-semibold">HP</td>
            <td class="border border-gray-300 p-2">{{ $pelanggar->hp }}</td>
        </tr>
        <tr>
            <td class="border border-gray-300 p-2 font-semibold">Status</td>
            <td class="border border-gray-300 p-2">
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
            <td class="border border-gray-300 p-2 font-semibold">Total Poin</td>
            <td class="border border-gray-300 p-2 text-3xl font-bold">{{ $pelanggar->poin_pelanggar }}</td>
        </tr>
    </table>

    <h2 class="text-xl font-semibold mb-3">Pelanggaran Yang Dilakukan</h2>

    @if (Session::has('success'))
        <div class="alert alert-success mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ Session::get('success') }}
        </div>
    @endif

    @if ($pelanggar->status == 0 || $pelanggar->status == 1)
        <button onclick="alert('Poin Pelanggar Sudah Mencapai {{ $pelanggar->poin_pelanggar }} Poin, Pelanggar Perlu Ditindak!')" class="btn btn-success mb-4 px-4 py-2 rounded bg-green-600 text-white hover:bg-green-700 transition">Tambah Pelanggaran</button>
    @else
        <a href="{{ route('pelanggar.show', $pelanggar->id) }}" class="btn btn-success mb-4 inline-block px-4 py-2 rounded bg-green-600 text-white hover:bg-green-700 transition">Tambah Pelanggaran</a>
    @endif

    <table class="table-auto border-collapse border border-gray-300 w-full">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 p-2">Name PK</th>
                <th class="border border-gray-300 p-2">Tanggal</th>
                <th class="border border-gray-300 p-2">Jenis</th>
                <th class="border border-gray-300 p-2">Konsekuensi</th>
                <th class="border border-gray-300 p-2">Poin</th>
                <th class="border border-gray-300 p-2">Status</th>
                <th class="border border-gray-300 p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($details as $detail)
                <tr>
                    <td class="border border-gray-300 p-2">{{ $detail->name }}</td>
                    <td class="border border-gray-300 p-2">
                        {{ \Carbon\Carbon::parse($detail->created_at)->format('d-m-Y') }}
                    </td>
                    <td class="border border-gray-300 p-2">{{ $detail->jenis }}</td>
                    <td class="border border-gray-300 p-2">{{ $detail->konsekuensi }}</td>
                    <td class="border border-gray-300 p-2">{{ $detail->poin }}</td>
                    <td class="border border-gray-300 p-2">
                        @if ($detail->status == 0)
                            <form onsubmit="return confirm('Apakah {{ $pelanggar->name }} Sudah Diberikan Sanksi ?');" action="{{ route('detailPelanggar.update', $detail->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id_pelanggar" value="{{ $detail->id_pelanggar }}">
                                <button type="submit" class="btn btn-warning text-white px-2 py-1 rounded bg-yellow-500 hover:bg-yellow-600 transition">Beri Sanksi</button>
                            </form>
                        @else
                            <b>Sudah Diberikan Sanksi</b>
                        @endif
                    </td>
                    <td class="border border-gray-300 p-2">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('detailPelanggar.destroy', $detail->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id_pelanggar" value="{{ $detail->id_pelanggar }}">
                            <input type="hidden" name="PoinPelanggaran" value="{{ $detail->poin }}">
                            <button type="submit" class="btn btn-danger px-2 py-1 rounded bg-red-600 text-white hover:bg-red-700 transition">Hapus Pelanggaran</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="border border-gray-300 p-4 text-center">
                        Data tidak ditemukan, silahkan <a href="{{ route('pelanggar.show', $pelanggar->id) }}" class="text-blue-600 underline">Tambah Pelanggaran</a>.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $details->links() }}
</div>
</div>
@endsection
