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
<div class="overflow-x-auto rounded-lg shadow-lg">
    <table class="table table-zebra w-full">
        <thead class="bg-blue-500 text-primary-content">
            <tr>
                <th class="text-center">Foto</th>
                <th class="text-center">NIS</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Email</th>
                <th class="text-center">Kelas</th>
                <th class="text-center">No. HP</th>
                <th class="text-center">Status</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($siswas as $siswa)
            <tr class="hover:bg-primary/10 transition-colors text-center">
                <td class="text-center">
                    <div class="avatar mx-auto">
                        <div class="w-16 h-16 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                            <img src="{{ asset('storage/siswas/' . $siswa->image) }}" alt="Foto {{ $siswa->name }}" class="object-cover" />
                        </div>
                    </div>
                </td>
                <td>{{ $siswa->nis }}</td>
                <td class="font-semibold">{{ $siswa->name }}</td>
                <td>{{ $siswa->email }}</td>
                <td>{{ $siswa->tingkatan }} {{ $siswa->jurusan }} {{ $siswa->kelas }}</td>
                <td>{{ $siswa->hp }}</td>
                <td>
                    <span class="px-2 py-1 rounded text-sm {{ $siswa->status == 1 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $siswa->status == 1 ? 'Aktif' : 'Tidak Aktif' }}
                    </span>
                </td>
                <td class="space-x-1">
                    <a href="{{ route('siswa.show', $siswa->id) }}"
                       class="btn btn-sm btn-outline btn-info hover:btn-info">Show</a>
                    <a href="{{ route('siswa.edit', $siswa->id) }}"
                       class="btn btn-sm btn-outline btn-warning hover:btn-warning">Edit</a>
                    <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST"
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');"
                          class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline btn-error hover:btn-error">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center py-8 italic text-gray-400">Data tidak ditemukan</td>
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
