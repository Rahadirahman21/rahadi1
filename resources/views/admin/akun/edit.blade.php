@extends('mainLayouts')

@section('content')
<div class="max-w-5xl mx-auto p-8">
  <div class="bg-white shadow-lg rounded-xl p-6">
    <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Edit Akun</h1>
            <a href="{{ route('akun.index') }}" class="text-sm text-blue-600 hover:underline">← Kembali</a>
        </div>
  

  @if ($errors->any())
    <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded max-w-3xl">
      <ul class="list-disc list-inside">
        @foreach ($errors->all() as $error)
          <li class="mb-1">{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  @if(Session::has('success'))
    <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded max-w-3xl">
      {{ Session::get('success') }}
    </div>
  @endif

  <div class="flex flex-col md:flex-row md:space-x-10">
    <!-- Kiri: Form Data Akun -->
    <form action="{{ route('akun.update', $akun->id) }}" method="POST" enctype="multipart/form-data"
      class="bg-white p-6 rounded shadow mb-10 md:mb-0 md:flex-1">
      @csrf
      @method('PUT')

      <h2 class="text-xl font-semibold mb-4 text-gray-700 border-b pb-2">Data Akun</h2>

      <div class="mb-6">
        <label for="name" class="block mb-2 font-medium text-gray-700">Nama Lengkap</label>
        <input type="text" id="name" name="name" value="{{ old('name', $akun->name) }}" required
          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
      </div>

      <div class="mb-6">
        <label for="usertype" class="block mb-2 font-medium text-gray-700">Hak Akses</label>
        <select name="usertype" id="usertype" required
          class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-400">
          <option value="admin" {{ 'admin' == $akun->usertype ? 'selected' : '' }}>Admin</option>
          <option value="ptk" {{ 'ptk' == $akun->usertype ? 'selected' : '' }}>PTK</option>
        </select>
      </div>

      <button type="submit"
        class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Simpan Data</button>
    </form>

    <!-- Kanan: Form Update Email dan Password -->
    <div class="md:flex-1 space-y-10">
      <form action="{{ route('updateEmail', $akun->id) }}" method="POST" enctype="multipart/form-data"
        class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <h2 class="text-xl font-semibold mb-4 text-gray-700 border-b pb-2">Update Email</h2>

        <div class="mb-6">
          <label for="email" class="block mb-2 font-medium text-gray-700">Email Address</label>
          <input type="email" id="email" name="email" value="{{ old('email', $akun->email) }}" required
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>

        <button type="submit"
          class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Simpan Email</button>
      </form>

      <form action="{{ route('updatePassword', $akun->id) }}" method="POST" enctype="multipart/form-data"
        class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <h2 class="text-xl font-semibold mb-4 text-gray-700 border-b pb-2">Update Password</h2>

        <div class="mb-6">
          <label for="password" class="block mb-2 font-medium text-gray-700">Password</label>
          <input type="password" id="password" name="password" required
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>

        <div class="mb-6">
          <label for="password_confirmation" class="block mb-2 font-medium text-gray-700">Confirm Password</label>
          <input type="password" id="password_confirmation" name="password_confirmation" required
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>

        <button type="submit"
          class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Simpan Password</button>
      </form>
    </div>
  </div>
</div>
</div>
@endsection
