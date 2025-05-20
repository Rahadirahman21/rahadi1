@extends('auth.layouts')

@section('content')

<div class="min-h-screen flex bg-gray-900">
  <!-- Left side -->
  <div class="flex-1 flex flex-col justify-center items-center text-center px-8 py-12 bg-gradient-to-br from-blue-600 via-sky-500 to-teal-400">
    <h1 class="text-4xl font-bold text-white mb-6">E-Point Siswa</h1>
    <img src="{{ asset('storage/logo.png') }}" alt="Logo" class="rounded mx-auto mb-6 w-40 h-40 object-contain">
    <h3 class="text-white text-lg font-semibold">SMKN 4 TASIKMALAYA</h3>
  </div>

  <!-- Right side -->
  <div class="flex-1 flex flex-col justify-center items-center bg-white px-8 py-12">
    <h1 class="text-3xl font-bold mb-10">Login</h1>

    <form action="{{ route('authenticate') }}" method="POST" class="w-full max-w-sm">
      @csrf

      <div class="mb-6">
        <label for="email" class="block text-gray-700 font-semibold mb-2">Email Address</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required
          class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <div class="mb-6">
        <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
        <input type="password" id="password" name="password" required
          class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      {{-- Jika mau aktifkan lupa password, bisa di-uncomment --}}
      {{-- 
      <div class="mb-6 text-right">
        <a href="#" class="text-sm text-blue-600 hover:underline">Lupa password?</a>
      </div>
      --}}
<h1 class="bg-teal-500"></h1>
      <button type="submit"
        class="w-full bg-gradient-to-r from-blue-500 to-teal-400 text-white font-semibold py-2 rounded hover:from-blue-500 hover:to-teal-700 transition">
        Login
      </button>
    </form>
  </div>
</div>

@endsection
