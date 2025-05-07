@extends('mainLayouts')

@section('content')
<div class="container mt-4">
  <h1>Edit Akun</h1>
  <a href="{{ route('akun.index') }}" class="btn btn-secondary mb-3">Kembali</a><br><br>

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

  <!-- Form to Edit Account Data -->
  <form action="{{ route('akun.update', $akun->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <h2>Data Akun</h2>

    <div class="mb-3">
      <label for="name" class="form-label">Nama Lengkap</label><br>
      <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $akun->name) }}" required>
    </div>

    <div class="mb-3">
      <label for="usertype" class="form-label">Hak Akses</label><br>
      <select name="usertype" class="form-select" required>
        <option value="admin" {{ 'admin' == $akun->usertype ? 'selected' : '' }}>Admin</option>
        <option value="ptk" {{ 'ptk' == $akun->usertype ? 'selected' : '' }}>PTK</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Data</button>
  </form>
  
  <!-- Form to Update Email -->
  <form action="{{ route('updateEmail', $akun->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <h2>Update Email</h2>

    <div class="mb-3">
      <label for="email" class="form-label">Email Address</label><br>
      <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $akun->email) }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Email</button>
  </form>

  <!-- Form to Update Password -->
  <form action="{{ route('updatePassword', $akun->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <h2>Update Password</h2>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label><br>
      <input type="password" id="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="password_confirmation" class="form-label">Confirm Password</label><br>
      <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Password</button>
  </form>
</div>
@endsection
