@extends('mainLayouts')

@section('content')
<div class="p-10">
    <h1 class="text-2xl font-bold text-center mb-6">Data Pelanggaran</h1>

    {{-- Form Pencarian dan Tombol Tambah --}}
    <div class="flex flex-col lg:flex-row justify-between items-center mb-5 gap-4">
        <form action="" method="get" class="flex w-full lg:w-1/2 gap-2">
            <input type="text" name="cari" id="cari" value="{{ request('cari') }}" placeholder="Jenis atau Konsekuensi"
                   class="px-3 py-2 w-full border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Cari</button>
        </form>

        <a href="{{ route('pelanggaran.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Tambah Pelanggaran
        </a>
    </div>

    {{-- Alert Sukses --}}
    @if(Session::has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ Session::get('success') }}
        </div>
    @endif

    {{-- Tabel Data --}}
    <div class="overflow-x-auto">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-200 text-gray-700 uppercase text-sm">
                    <th class="p-3 border">Jenis</th>
                    <th class="p-3 border">Konsekuensi</th>
                    <th class="p-3 border">Poin</th>
                    <th class="p-3 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pelanggarans as $pelanggaran)
                <tr class="bg-white hover:bg-gray-50 text-center">
                    <td class="p-3 border">{{ $pelanggaran->jenis }}</td>
                    <td class="p-3 border">{{ $pelanggaran->konsekuensi }}</td>
                    <td class="p-3 border">{{ $pelanggaran->poin }}</td>
                    <td class="p-3 border space-x-2">
                        <a href="{{ route('pelanggaran.edit', $pelanggaran->id) }}"
                           class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">
                            Edit
                        </a>
                        <form action="{{ route('pelanggaran.destroy', $pelanggaran->id) }}" method="POST" class="inline"
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-4">
                        <p>Data tidak ditemukan.</p>
                        <a href="{{ route('pelanggaran.index') }}" class="text-blue-600 underline">Kembali</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $pelanggarans->links() }}
    </div>
</div>
@endsection
