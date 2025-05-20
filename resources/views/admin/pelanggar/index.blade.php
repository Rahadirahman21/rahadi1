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

    {{-- Tabel Data Pelanggar --}}
<div class="overflow-x-auto rounded-lg shadow-lg">
    <table class="table table-zebra w-full">
        <thead class="bg-blue-500 text-primary-content text-sm">
            <tr>
                <th class="text-center">Foto</th>
                <th class="text-center">NIS</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Kelas</th>
                <th class="text-center">No HP</th>
                <th class="text-center">Poin</th>
                <th class="text-center">Status</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pelanggars as $pelanggar)
            <tr class="hover:bg-primary/10 transition-colors text-center">
                <td>
                    <div class="avatar mx-auto">
                        <div class="w-16 h-16 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                            <img src="{{ asset('storage/siswas/' . $pelanggar->image) }}" alt="Foto Siswa" />
                        </div>
                    </div>
                </td>
                <td>{{ $pelanggar->nis }}</td>
                <td class="font-semibold">{{ $pelanggar->name }}</td>
                <td>{{ $pelanggar->tingkatan }} {{ $pelanggar->jurusan }} {{ $pelanggar->kelas }}</td>
                <td>{{ $pelanggar->hp }}</td>
                <td class="font-bold text-error">{{ $pelanggar->poin_pelanggar }}</td>
                <td>
                    @if ($pelanggar->status == 0)
                        <span class="text-green-600 font-medium">Tidak Perlu Ditindak</span>
                    @elseif ($pelanggar->status == 1)
                        <form action="{{ route('pelanggar.statusTindak', $pelanggar->id) }}" method="POST"
                              onsubmit="return confirm('Apakah Anda yakin {{ $pelanggar->name }} sudah ditindak?');">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-warning">Perlu Ditindak</button>
                        </form>
                    @elseif ($pelanggar->status == 2)
                        <span class="text-blue-600 font-medium">Sudah Ditindak</span>
                    @endif
                </td>
                <td class="space-x-1">
                    <a href="{{ route('detailPelanggar.show', $pelanggar->id) }}"
                       class="btn btn-sm btn-outline btn-primary hover:btn-primary">Detail</a>
                    <form action="{{ route('pelanggar.destroy', $pelanggar->id) }}" method="POST" class="inline"
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline btn-error hover:btn-error">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center py-8 italic text-gray-400">Data Tidak Ditemukan</td>
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
