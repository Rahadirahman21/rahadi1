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

    {{-- Tabel Data Pelanggaran --}}
<div class="overflow-x-auto rounded-lg shadow-lg">
    <table class="table table-zebra w-full">
        <thead class="bg-blue-500 text-primary-content">
            <tr>
                <th class="text-center">Jenis</th>
                <th class="text-center">Konsekuensi</th>
                <th class="text-center">Poin</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pelanggarans as $pelanggaran)
            <tr class="hover:bg-primary/10 transition-colors text-center">
                <td>{{ $pelanggaran->jenis }}</td>
                <td>{{ $pelanggaran->konsekuensi }}</td>
                <td class="font-bold text-error">{{ $pelanggaran->poin }}</td>
                <td class="space-x-1">
                    <a href="{{ route('pelanggaran.edit', $pelanggaran->id) }}"
                       class="btn btn-sm btn-outline btn-warning hover:btn-warning">Edit</a>
                    <form action="{{ route('pelanggaran.destroy', $pelanggaran->id) }}" method="POST" class="inline"
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline btn-error hover:btn-error">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center py-8 italic text-gray-400">Data tidak ditemukan</td>
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
