@extends('mainLayouts')

@section('content')
<div class="max-w-5xl mx-auto p-8">
    <div class="bg-white shadow-lg rounded-xl p-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Detail Pelanggar</h1>
            <a href="{{ route('pelanggar.index') }}" class="text-sm text-blue-600 hover:underline">← Kembali</a>
        </div>

  {{-- Foto pelanggar di tengah --}}
  <div class="flex justify-center mb-6">
    <img src="{{ asset('storage/siswas/' . $pelanggar->image) }}" alt="Foto Pelanggar" class="w-32 h-32 object-cover rounded-full border border-gray-300">
  </div>

  {{-- Tabel detail pelanggar --}}
  <div class="overflow-x-auto mb-8">
    <table class="min-w-full bg-white border border-gray-300 rounded-md">
      <thead class="bg-gray-100 border-b border-gray-300">
        <tr>
          <th colspan="2" class="py-3 px-4 text-left text-lg font-semibold">Akun Pelanggar</th>
          <th colspan="2" class="py-3 px-4 text-left text-lg font-semibold">Data Pelanggar</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border-b border-gray-200">
          <th class="py-2 px-4 text-left font-medium">Nama</th>
          <td class="py-2 px-4">{{ $pelanggar->name }}</td>
          <th class="py-2 px-4 text-left font-medium">NIS</th>
          <td class="py-2 px-4">{{ $pelanggar->nis }}</td>
        </tr>
        <tr class="border-b border-gray-200">
          <th class="py-2 px-4 text-left font-medium">Email</th>
          <td class="py-2 px-4">{{ $pelanggar->email }}</td>
          <th class="py-2 px-4 text-left font-medium">Kelas</th>
          <td class="py-2 px-4">{{ $pelanggar->tingkatan }} {{ $pelanggar->jurusan }} {{ $pelanggar->kelas }}</td>
        </tr>
        <tr class="border-b border-gray-200">
          <td class="py-2 px-4 text-center text-gray-400">x</td>
          <td class="py-2 px-4 text-center text-gray-400">x</td>
          <th class="py-2 px-4 text-left font-medium">No HP</th>
          <td class="py-2 px-4">{{ $pelanggar->hp }}</td>
        </tr>
        <tr>
          <td class="py-2 px-4 text-center text-gray-400">x</td>
          <td class="py-2 px-4 text-center text-gray-400">x</td>
          <th class="py-2 px-4 text-left font-medium">Status</th>
          <td class="py-2 px-4">
            {{ $pelanggar->status == 1 ? 'Aktif' : 'Tidak Aktif' }}
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <h1 class="text-2xl font-semibold mb-4">Pilih Pelanggaran</h1>

  {{-- Form pencarian --}}
  <form action="" method="get" class="mb-6 flex items-center space-x-2">
    <label for="cari" class="font-medium">Cari :</label>
    <input type="text" id="cari" name="cari" class="border border-gray-300 rounded px-3 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
    <button type="submit" class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700">Cari</button>
  </form>

  @if(Session::has('success'))
  <div class="mb-6 p-4 bg-green-100 text-green-800 rounded border border-green-300">
    {{ Session::get('success') }}
  </div>
  @endif

  {{-- Tabel daftar pelanggaran --}}
  <div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300 rounded-md">
      <thead class="bg-gray-100 border-b border-gray-300">
        <tr>
          <th class="py-2 px-4 text-left">Jenis</th>
          <th class="py-2 px-4 text-left">Konsekuensi</th>
          <th class="py-2 px-4 text-left">Poin</th>
          <th class="py-2 px-4 text-left">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($pelanggarans as $pelanggaran)
        <tr class="border-b border-gray-200">
          <td class="py-2 px-4">{{ $pelanggaran->jenis }}</td>
          <td class="py-2 px-4">{{ $pelanggaran->konsekuensi }}</td>
          <td class="py-2 px-4">{{ $pelanggaran->poin }}</td>
          <td class="py-2 px-4">
            <form action="{{ route('pelanggar.storePelanggaran', $pelanggaran->id) }}" method="POST">
              @csrf
              <input type="hidden" name="id_pelanggar" value="{{ $pelanggar->id }}">
              <input type="hidden" name="id_user" value="{{ $idUser }}">
              <input type="hidden" name="id_pelanggaran" value="{{ $pelanggaran->id }}">
              <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-medium py-1 px-3 rounded">Tambah Pelanggaran</button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="4" class="py-4 text-center text-gray-500">
            Data tidak ditemukan
          </td>
        </tr>
        <tr>
          <td colspan="4" class="py-2 text-center">
            <a href="{{ route('pelanggaran.index') }}" class="text-blue-600 hover:underline">Kembali</a>
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  {{-- Pagination --}}
  <div class="mt-6">
    {{ $pelanggarans->links() }}
  </div>
</div>
</div>
@endsection
