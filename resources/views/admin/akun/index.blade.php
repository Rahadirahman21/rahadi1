@extends('mainLayouts')

@section('content')
<div class="p-5">
    <h1 class="text-2xl font-bold text-center mb-5">Data User</h1>

    {{-- Form Pencarian dan Tambah User --}}
    <div class="flex flex-col lg:flex-row justify-between items-center mb-4 gap-2">
        <form action="" method="get" class="flex items-center gap-2 w-full lg:w-1/2">
            <input type="text" name="cari" id="cari" class="input p-2 w-full border border-gray-300 rounded" placeholder="Nama atau Email">
            <button type="submit" class="btn bg-blue-500 text-white px-4 py-2 rounded">Cari</button>
        </form>

        <a href="{{ route('akun.create') }}" class="btn bg-green-500 text-white px-4 py-2 rounded">Tambah User</a>
    </div>

    {{-- Notifikasi Sukses --}}
    @if(Session::has('success'))
        <div class="alert alert-success mb-4">
            {{ Session::get('success') }}
        </div>
    @endif

    {{-- Tabel Data User --}}
    <div class="overflow-x-auto">
        <table class="w-full border-collapse">
            <thead>
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border">Nama</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border">Email</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border">Role</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr class="bg-white hover:bg-gray-50 text-center border">
                    <td class="p-3 border">{{ $user->name }}</td>
                    <td class="p-3 border">{{ $user->email }}</td>
                    <td class="p-3 border">{{ ucfirst($user->usertype) }}</td>
                    <td class="p-3 border space-x-1">
                        <a href="{{ route('akun.edit', $user->id) }}" class="btn btn-sm bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>

                        <form action="{{ route('akun.destroy', $user->id) }}" method="POST" class="inline"
                              onsubmit="return confirm('{{ $user->usertype == 'siswa' ? 'Jika Akun Siswa Dihapus Maka Data Siswa Akan Ikut Terhapus, Apakah Anda Yakin?' : 'Apakah Anda Yakin?' }}');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm bg-red-500 text-white px-3 py-1 rounded">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-4">Data tidak ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
@endsection
