@extends('mainLayouts')

@section('content')
<div class="container mt-4" style="min-height: 100vh; padding-bottom: 50px;"> <!-- Tambahkan min-height -->
  <h1>Edit Pelanggaran</h1>
  <a href="{{ route('pelanggaran.index') }}" class="btn btn-secondary mb-3">Kembali</a><br><br>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
      {{ Session::get('success') }}
    </div>
  @endif

  <form action="{{ route('pelanggaran.update', $pelanggaran->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <h2>Data Pelanggaran</h2>

    <div class="mb-3">
      <label for="jenis" class="form-label">Jenis Pelanggaran</label><br>
      <textarea id="jenis" name="jenis" class="form-control" rows="7" required>{{ old('jenis', $pelanggaran->jenis) }}</textarea>
    </div>

    <div class="mb-3">
      <label for="konsekuensi" class="form-label">Konsekuensi</label><br>
      <textarea id="konsekuensi" name="konsekuensi" class="form-control" rows="7" required>{{ old('konsekuensi', $pelanggaran->konsekuensi) }}</textarea>
    </div>

    <div class="mb-3">
      <label for="poin" class="form-label">Poin</label><br>
      <input type="number" name="poin" id="poin" class="form-control" value="{{ old('poin', $pelanggaran->poin) }}" required><br>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Data</button>
  </form>
</div>
@endsection
