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
<div class="overflow-x-auto rounded-lg shadow-lg">
    <table class="table table-zebra w-full">
        <thead class="bg-blue-500 text-primary-content">
            <tr>
                <th class="text-center">Nama</th>
                <th class="text-center">Email</th>
                <th class="text-center">Role</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr class="hover:bg-primary/10 transition-colors text-center">
                <td class="font-semibold">{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ ucfirst($user->usertype) }}</td>
                <td class="space-x-1">
                    <a href="{{ route('akun.edit', $user->id) }}"
                       class="btn btn-sm btn-outline btn-warning hover:btn-warning">Edit</a>

                    <form action="{{ route('akun.destroy', $user->id) }}" method="POST" class="inline"
                          onsubmit="return confirm('{{ $user->usertype == 'siswa' ? 'Jika Akun Siswa Dihapus Maka Data Siswa Akan Ikut Terhapus, Apakah Anda Yakin?' : 'Apakah Anda Yakin?' }}');">
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
        {{ $users->links() }}
    </div>
</div>
@endsection
