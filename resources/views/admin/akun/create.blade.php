@extends('mainLayouts')

@section('content')
<div class="p-10">
    <h1 class="mb-4">Tambah Akun</h1>

    <a href="{{ route('akun.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('akun.store') }}" method="POST" class="w-full mx-auto">
        @csrf
        <table class="border-collapse w-full">
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                <h4>Data Akun</h4>
            </th>
            <tr class="border border-gray-300">
                <td>
                    <div class="ms-10 w-1/2 mb-34">
                        <div class="mb-3">
                            <label for="name" class="mb-2 block">Nama Lengkap</label>
                            <input type="text" id="name" name="name" class="input w-full" value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="mb-2 block">Email Address</label>
                            <input type="email" id="email" name="email" class="input w-full" value="{{ old('email') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="mb-2 block">Password</label>
                            <input type="password" id="password" name="password" class="input w-full" required>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="mb-2 block">Konfirmasi Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="input w-full" required>
                        </div>

                        <div class="mb-3">
                            <label for="usertype" class="mb-2 block">Hak Akses</label>
                            <select name="usertype" id="usertype" class="input w-full" required>
                                <option value="">Pilih Hak Akses</option>
                                <option value="admin" {{ old('usertype') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="ptk" {{ old('usertype') == 'ptk' ? 'selected' : '' }}>PTK</option>
                            </select>
                        </div>
                    </div>
                </td>
            </tr>
        </table>

        <div class="mb-3 text-center text-white mt-4">
            <button type="submit" class="btn btn-primary">Simpan Data</button>
            <button type="reset" class="btn btn-warning text-white">Reset Form</button>
        </div>
    </form>
</div>
@endsection
