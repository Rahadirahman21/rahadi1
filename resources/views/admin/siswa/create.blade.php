@extends('mainLayouts')

@section('content')
<div class="container mt-4">
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

    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data" class="w-75 mx-auto">
        @csrf
    
        <div class="row">
            <!-- Bagian Akun Siswa -->
            <div class="col-md-6">
                <div class="mb-4">
                    <h4>Akun Siswa</h4>
    
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>
    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    </div>
    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
    
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                    </div>
                </div>
            </div>
    
            <!-- Bagian Data Siswa -->
            <div class="col-md-6">
                <div class="mb-4">
                    <h4>Data Siswa</h4>
    
                    <div class="mb-3">
                        <label for="image" class="form-label">Foto Siswa</label>
                        <input type="file" name="image" class="form-control" accept="image/*" required>
                    </div>
    
                    <div class="mb-3">
                        <label for="nis" class="form-label">NIS</label>
                        <input type="text" name="nis" class="form-control" value="{{ old('nis') }}" required>
                    </div>
    
                    <div class="mb-3">
                        <label for="tingkatan" class="form-label">Tingkatan</label>
                        <select name="tingkatan" class="form-select" required>
                            <option value="">Pilih Tingkatan</option>
                            <option value="X" {{ old('tingkatan') == 'X' ? 'selected' : '' }}>X</option>
                            <option value="XI" {{ old('tingkatan') == 'XI' ? 'selected' : '' }}>XI</option>
                            <option value="XII" {{ old('tingkatan') == 'XII' ? 'selected' : '' }}>XII</option>
                        </select>
                    </div>
    
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <select name="jurusan" class="form-select" required>
                            <option value="">Pilih Jurusan</option>
                            @foreach (['TBSM', 'TJKT', 'PPLG', 'DKV', 'TOI'] as $jurusan)
                                <option value="{{ $jurusan }}" {{ old('jurusan') == $jurusan ? 'selected' : '' }}>{{ $jurusan }}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <select name="kelas" class="form-select" required>
                            <option value="">Pilih Kelas</option>
                            @foreach ([1, 2, 3, 4] as $kelas)
                                <option value="{{ $kelas }}" {{ old('kelas') == $kelas ? 'selected' : '' }}>{{ $kelas }}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="mb-3">
                        <label for="hp" class="form-label">No. HP</label>
                        <input type="text" name="hp" class="form-control" value="{{ old('hp') }}" required>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Tombol Simpan dan Reset -->
        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-primary">Simpan Data</button>
            <button type="reset" class="btn btn-warning">Reset Form</button>
        </div>
    </form>
    
</div>
@endsection
