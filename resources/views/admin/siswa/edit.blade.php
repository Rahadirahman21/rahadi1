@extends('mainLayouts')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Edit Siswa</h1>
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

    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data" class="">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <h4 class="mb-3">Data Siswa</h4>

        <div class="mb-3">
            <label class="form-label">Foto Siswa</label><br>
            <img src="{{ asset('storage/siswas/' . $siswa->image) }}" width="120" height="120" alt="Foto Siswa" class="mb-2">
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label class="form-label">NIS</label>
            <input type="text" name="nis" class="form-control" value="{{ old('nis', $siswa->nis) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $siswa->name) }}" required>
        </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Tingkatan</label>
                    <select name="tingkatan" class="form-select" required>
                        @foreach(['X', 'XI', 'XII'] as $tingkatan)
                            <option value="{{ $tingkatan }}" {{ $siswa->tingkatan == $tingkatan ? 'selected' : '' }}>{{ $tingkatan }}</option>
                        @endforeach
                    </select>
                </div>
        
                <div class="mb-3">
                    <label class="form-label">Jurusan</label>
                    <select name="jurusan" class="form-select" required>
                        @foreach(['TBSM', 'TJKT', 'PPLG', 'DKV', 'TOI'] as $jurusan)
                            <option value="{{ $jurusan }}" {{ $siswa->jurusan == $jurusan ? 'selected' : '' }}>{{ $jurusan }}</option>
                        @endforeach
                    </select>
                </div>
        
                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <select name="kelas" class="form-select" required>
                        @foreach([1, 2, 3, 4] as $kelas)
                            <option value="{{ $kelas }}" {{ $siswa->kelas == $kelas ? 'selected' : '' }}>{{ $kelas }}</option>
                        @endforeach
                    </select>
                </div>
        
                <div class="mb-3">
                    <label class="form-label">No HP</label>
                    <input type="text" name="hp" class="form-control" value="{{ old('hp', $siswa->hp) }}" required>
                </div>
        
                <div class="mb-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="1" {{ $siswa->status == 1 ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ $siswa->status == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>
        
                <button type="submit" class="btn btn-primary">Simpan Data</button>
                <button type="reset" class="btn btn-warning">Reset Form</button>
            </div>
        </div>
        

       
    </form>
</div>
@endsection
