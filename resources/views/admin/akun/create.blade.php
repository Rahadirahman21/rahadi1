@extends('mainLayouts')

@section('content')
<div class="container mt-4">
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

    <form action="{{ route('akun.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <h4 class="fw-bold">Detail Akun</h4>

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
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="usertype" class="form-label">Hak Akses</label>
                <select name="usertype" id="usertype" class="form-select" required>
                    <option value="">Pilih Hak Akses</option>
                    <option value="admin" {{ old('usertype') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="ptk" {{ old('usertype') == 'ptk' ? 'selected' : '' }}>PTK</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan Data</button>
            <button type="reset" class="btn btn-warning">Reset Form</button>
        </div>
    </form>
</div>
@endsection
