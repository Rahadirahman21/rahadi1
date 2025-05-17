@extends('mainLayouts')

@section('content')
<div class="p-5">
    <h1 class="text-center text-2xl font-bold mb-5">Data Siswa SMKN 4 TASIKMALAYA</h1>

    {{-- Form Pencarian dan Tambah Siswa --}}
    <div class="flex flex-col lg:flex-row justify-between items-center mb-4">
        <form action="" method="get" class="flex items-center gap-2 w-full lg:w-1/2 mb-3 lg:mb-0">
            <input type="text" name="cari" id="cari" class="input w-full p-2 border border-gray-300 rounded" placeholder="Nama atau NIS">
            <button type="submit" class="btn bg-blue-500 text-white px-4 py-2 rounded">Cari</button>
        </form>

        <div class="flex flex-col lg:flex-row gap-2">
            <a href="{{ route('siswa.create') }}" class="btn bg-green-500 text-white px-4 py-2 rounded">Tambah Siswa</a>
        </div>
    </div>

    {{-- Notifikasi Sukses --}}
    @if(Session::has('success'))
        <div class="alert alert-success mb-4">
            {{ Session::get('success') }}
        </div>
    @endif

    {{-- Tabel Data Siswa --}}
    <div class="overflow-x-auto">
        <table class="w-full border-collapse">
            <thead>
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border">Foto</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border">NIS</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border">Nama</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border">Email</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border">Kelas</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border">No. HP</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border">Status</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($siswas as $siswa)
                <tr class="bg-white hover:bg-gray-50 text-center border">
                    <td class="p-3 border">
                        <img src="{{ asset('storage/siswas/' . $siswa->image) }}" alt="Foto {{ $siswa->name }}" class="mx-auto w-24 h-24 object-cover rounded">
                    </td>
                    <td class="p-3 border">{{ $siswa->nis }}</td>
                    <td class="p-3 border">{{ $siswa->name }}</td>
                    <td class="p-3 border">{{ $siswa->email }}</td>
                    <td class="p-3 border">{{ $siswa->tingkatan }} {{ $siswa->jurusan }} {{ $siswa->kelas }}</td>
                    <td class="p-3 border">{{ $siswa->hp }}</td>
                    <td class="p-3 border">
                        <span class="px-2 py-1 rounded {{ $siswa->status == 1 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $siswa->status == 1 ? 'Aktif' : 'Tidak Aktif' }}
                        </span>
                    </td>
                    <td class="p-3 border space-x-1">
                        <a href="{{ route('siswa.show', $siswa->id) }}" class="btn btn-sm bg-blue-500 text-white px-2 py-1 rounded">Show</a>
                        <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-sm bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                        <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm bg-red-500 text-white px-2 py-1 rounded">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-4">
                        <p>Data tidak ditemukan.</p>
                        <a href="{{ route('siswa.index') }}" class="text-blue-600 underline">Kembali</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $siswas->links() }}
    </div>
</div>

{{-- JS CDN --}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
@endsection
