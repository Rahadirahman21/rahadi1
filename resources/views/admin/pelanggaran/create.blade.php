@extends('mainLayouts')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tambah Pelanggaran</h1>
    <a href="{{ route('pelanggaran.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pelanggaran.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <h4 class="fw-bold">Detail Pelanggaran</h4>

            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Pelanggaran</label>
                <textarea id="jenis" name="jenis" rows="7" cols="50" class="form-control" required>{{ old('jenis') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="konsekuensi" class="form-label">Konsekuensi</label>
                <textarea id="konsekuensi" name="konsekuensi" rows="7" cols="50" class="form-control" required>{{ old('konsekuensi') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="poin" class="form-label">Poin</label>
                <input type="number" name="poin" id="poin" class="form-control" value="{{ old('poin') }}" required>
            </div>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Simpan Data</button>
            <button type="reset" class="btn btn-warning">Reset Form</button>
        </div>
    </form>
</div>
@endsection
