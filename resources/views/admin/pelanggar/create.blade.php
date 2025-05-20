@extends('mainLayouts')

@section('content')
<div class="max-w-5xl mx-auto p-8">
    <div class="bg-white shadow-lg rounded-xl p-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Pilih Data Pelanggar</h1>
            <a href="{{ route('pelanggar.index') }}" class="text-sm text-blue-600 hover:underline">← Kembali</a>
        </div>

        {{-- Form Cari --}}
        <form action="" method="get" class="mb-6 flex items-center gap-3">
            <label for="cari" class="block text-gray-700 font-medium">Cari :</label>
            <input type="text" name="cari" id="cari"
                class="border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2 flex-grow"
                placeholder="Cari NIS atau Nama" value="{{ request('cari') }}">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-150">Cari</button>
        </form>

        {{-- Tabel Data Siswa --}}
<div class="overflow-x-auto rounded-lg shadow-lg">
    <table class="table table-zebra w-full">
        <thead class="bg-blue-500 text-primary-content text-sm uppercase">
            <tr>
                <th class="text-center">Foto</th>
                <th class="text-center">NIS</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Email</th>
                <th class="text-center">Kelas</th>
                <th class="text-center">No. HP</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($siswas as $siswa)
                <tr class="text-center hover:bg-primary/10 transition-colors">
                    <td>
                        <div class="avatar mx-auto">
                            <div class="w-16 h-16 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                <img src="{{ asset('storage/siswas/' . $siswa->image) }}" alt="Foto Siswa" />
                            </div>
                        </div>
                    </td>
                    <td>{{ $siswa->nis }}</td>
                    <td class="font-semibold">{{ $siswa->name }}</td>
                    <td>{{ $siswa->email }}</td>
                    <td>{{ $siswa->tingkatan }} {{ $siswa->jurusan }} {{ $siswa->kelas }}</td>
                    <td>{{ $siswa->hp }}</td>
                    <td>
                        <form action="{{ route('pelanggar.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
                            <button type="submit" class="btn btn-sm btn-success">
                                Tambah Pelanggar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-8 italic text-gray-400">
                        Data tidak ditemukan, silahkan cek pada data pelanggar
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


        {{-- Pagination --}}
        <div class="mt-6">
            {{ $siswas->links() }}
        </div>

        {{-- Tombol navigasi bawah --}}
        <div class="mt-6 flex gap-4">
            <a href="{{ route('pelanggar.index') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition duration-150">
                Data Pelanggar
            </a>
            {{-- <a href="{{ route('pelanggar.create') }}"
                class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-lg transition duration-150">
                Kembali
            </a> --}}
        </div>
    </div>
</div>
@endsection
