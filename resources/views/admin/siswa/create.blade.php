@extends('mainLayouts')

@section('content')
<div class="p-10">
    <h1 class="mb-4">Tambah Siswa</h1>
    <a href="{{ route('siswa.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data" class="w-full mx-auto">
        @csrf
        <table class="border-collapse w-250 ms-70">
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">
                <h4>Akun Siswa</h4>
            </th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell"><h4>Data Siswa</h4></th>
            <tr class="border border-gray-300">
                <td><div class="mx-auto w-100 mb-47">
                    <div class="mb-3 ">
                        <label for="name" class="mb-2">Nama Lengkap</label>
                        <input type="text" id="name" name="name" class="input input-bordered " value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="mb-2">Email Address</label>
                        <input type="email" id="email" name="email" class="input" value="{{ old('email') }}" required>
                    </div>
    
                    <div class="mb-3">
                        <label for="password" class="mb-3">Password</label>
                        <input type="password" id="password" name="password" class="input" required>
                    </div>
    
                    <div class="mb-3">
                        <label for="password_confirmation" class="mb-3">Konfirmasi Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="input" required>
                    </div></div>
                </td>
                <td><div class="mx-auto  w-100">
                    <div class="mb-3">
                        <label for="image" class="mb-3">Foto Siswa</label>
                        <input type="file" name="image" class="input" accept="image/*" required>
                    </div>
    
                    <div class="mb-3">
                        <label for="nis" class="mb-3">NIS</label>
                        <input type="text" name="nis" class="input" value="{{ old('nis') }}" required>
                    </div>
    
                    <div class="mb-3">
                        <label for="tingkatan" class="mb-3">Tingkatan</label>
                        <select name="tingkatan" class="input" required>
                            <option value="">Pilih Tingkatan</option>
                            <option value="X" {{ old('tingkatan') == 'X' ? 'selected' : '' }}>X</option>
                            <option value="XI" {{ old('tingkatan') == 'XI' ? 'selected' : '' }}>XI</option>
                            <option value="XII" {{ old('tingkatan') == 'XII' ? 'selected' : '' }}>XII</option>
                        </select>
                    </div>
    
                    <div class="mb-3">
                        <label for="jurusan" class="mb-3">Jurusan</label>
                        <select name="jurusan" class="input" required>
                            <option value="">Pilih Jurusan</option>
                            @foreach (['TBSM', 'TJKT', 'PPLG', 'DKV', 'TOI'] as $jurusan)
                                <option value="{{ $jurusan }}" {{ old('jurusan') == $jurusan ? 'selected' : '' }}>{{ $jurusan }}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="mb-3">
                        <label for="kelas" class="mb-3">Kelas</label>
                        <select name="kelas" class="input" required>
                            <option value="">Pilih Kelas</option>
                            @foreach ([1, 2, 3, 4] as $kelas)
                                <option value="{{ $kelas }}" {{ old('kelas') == $kelas ? 'selected' : '' }}>{{ $kelas }}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="mb-3">
                        <label for="hp" class="mb-3">No. HP</label>
                        <input type="text" name="hp" class="input" value="{{ old('hp') }}" required>
                    </div>
                </td></div>
            </tr>
        </table>
    </form>

    
</div>
<div class="mb-3 text-center text-white ms-300">
            <button type="submit" class="btn btn-primary">Simpan Data</button>
            <button type="reset" class="btn btn-warning text-white">Reset Form</button>
        </div>
@endsection
