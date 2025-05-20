@extends('mainLayouts')

@section('content')
<div class="max-w-5xl mx-auto p-8">
    <div class="bg-white shadow-lg rounded-xl p-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Detail Siswa</h1>
            <a href="{{ route('siswa.index') }}" class="text-sm text-blue-600 hover:underline">← Kembali</a>
        </div>

  {{-- Foto siswa di tengah --}}
  <div class="flex justify-center mb-6">
    <img src="{{ asset('storage/siswas/' . $siswa->image) }}" alt="Foto Siswa" class="w-32 h-32 object-cover rounded-full border border-gray-300">
  </div>

  

  {{-- Tabel detail siswa --}}
  <div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300 rounded-md">
      <thead class="bg-gray-100 border-b border-gray-300">
        <tr>
          <th colspan="2" class="py-3 px-4 text-left text-lg font-semibold">Akun Siswa</th>
          <th colspan="2" class="py-3 px-4 text-left text-lg font-semibold">Data Siswa</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border-b border-gray-200">
          <th class="py-2 px-4 text-left font-medium">Nama</th>
          <td class="py-2 px-4">{{ $siswa->name }}</td>
          <th class="py-2 px-4 text-left font-medium">NIS</th>
          <td class="py-2 px-4">{{ $siswa->nis }}</td>
        </tr>
        <tr class="border-b border-gray-200">
          <th class="py-2 px-4 text-left font-medium">Email</th>
          <td class="py-2 px-4">{{ $siswa->email }}</td>
          <th class="py-2 px-4 text-left font-medium">Kelas</th>
          <td class="py-2 px-4">{{ $siswa->tingkatan }} {{ $siswa->jurusan }} {{ $siswa->kelas }}</td>
        </tr>
        <tr class="border-b border-gray-200">
          <th class="py-2 px-4"></th>
          <td class="py-2 px-4"></td>
          <th class="py-2 px-4 text-left font-medium">No HP</th>
          <td class="py-2 px-4">{{ $siswa->hp }}</td>
        </tr>
        <tr>
          <th class="py-2 px-4"></th>
          <td class="py-2 px-4"></td>
          <th class="py-2 px-4 text-left font-medium">Status</th>
          <td class="py-2 px-4">{{ $siswa->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>
@endsection
