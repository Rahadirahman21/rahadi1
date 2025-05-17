@extends('mainLayouts')

@section('content')
<div class="p-5">
    <h1 class="text-center text-2xl font-bold mb-6">Data Pelanggar</h1>

    {{-- Form Pencarian dan Tombol Tambah --}}
    <div class="flex flex-col lg:flex-row justify-between items-center mb-5 gap-4">
        <form action="" method="get" class="flex w-full lg:w-1/2 gap-2">
            <input type="text" name="cari" id="cari" value="{{ request('cari') }}" placeholder="Jenis atau Konsekuensi"
                   class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Cari</button>
        </form>

        <a href="{{ route('pelanggar.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Tambah Pelanggar
        </a>
    </div>

    {{-- Alert Sukses --}}
    @if(Session::has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ Session::get('success') }}
        </div>
    @endif

    {{-- Tabel Pelanggar --}}
    <div class="overflow-x-auto">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-200 text-gray-700 text-sm uppercase">
                    <th class="p-3 border">Foto</th>
                    <th class="p-3 border">NIS</th>
                    <th class="p-3 border">Nama</th>
                    <th class="p-3 border">Kelas</th>
                    <th class="p-3 border">No HP</th>
                    <th class="p-3 border">Poin</th>
                    <th class="p-3 border">Status</th>
                    <th class="p-3 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pelanggars as $pelanggar)
                <tr class="bg-white hover:bg-gray-50 text-center">
                    <td class="p-3 border">
                        <img src="{{ asset('storage/siswas/' . $pelanggar->image) }}" alt="Foto Siswa" class="mx-auto rounded shadow" width="80">
                    </td>
                    <td class="p-3 border">{{ $pelanggar->nis }}</td>
                    <td class="p-3 border">{{ $pelanggar->name }}</td>
                    <td class="p-3 border">{{ $pelanggar->tingkatan }} {{ $pelanggar->jurusan }} {{ $pelanggar->kelas }}</td>
                    <td class="p-3 border">{{ $pelanggar->hp }}</td>
                    <td class="p-3 border">{{ $pelanggar->poin_pelanggar }}</td>
                    <td class="p-3 border">
                        @if ($pelanggar->status == 0)
                            <span class="text-green-600 font-medium">Tidak Perlu Ditindak</span>
                        @elseif ($pelanggar->status == 1)
                            <form action="{{ route('pelanggar.statusTindak', $pelanggar->id) }}" method="POST"
                                  onsubmit="return confirm('Apakah Anda yakin {{ $pelanggar->name }} sudah ditindak?');">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">
                                    Perlu Ditindak
                                </button>
                            </form>
                        @elseif ($pelanggar->status == 2)
                            <span class="text-blue-600 font-medium">Sudah Ditindak</span>
                        @endif
                    </td>
                    <td class="p-3 border space-x-2">
                        <a href="{{ route('detailPelanggar.show', $pelanggar->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Detail</a>
                        <form action="{{ route('pelanggar.destroy', $pelanggar->id) }}" method="POST" class="inline"
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-4">
                        <p>Data Tidak Ditemukan</p>
                        <a href="{{ route('pelanggar.index') }}" class="text-blue-600 underline">Kembali</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-5">
        {{ $pelanggars->links() }}
    </div>
</div>
@endsection
