@extends('mainLayouts')

@section('content')
<div class="max-w-5xl mx-auto p-8">
  <div class="bg-white shadow-lg rounded-xl p-6">
    <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Edit Pelanggaran</h1>
            <a href="{{ route('pelanggaran.index') }}" class="text-sm text-blue-600 hover:underline">← Kembali</a>
        </div>


    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded max-w-5xl mx-auto">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li class="mb-1">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(Session::has('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded max-w-5xl mx-auto">
            {{ Session::get('success') }}
        </div>
    @endif

    <form action="{{ route('pelanggaran.update', $pelanggaran->id) }}" method="POST" enctype="multipart/form-data" class="w-full max-w-5xl mx-auto bg-white p-8 rounded shadow">
        @csrf
        @method('PUT')

        <div class="flex flex-col md:flex-row md:space-x-10">
            <div class="md:w-1/2">
                <h4 class="text-xl font-semibold mb-5 text-gray-700">Data Pelanggaran</h4>

                <div class="mb-6">
                    <label for="jenis" class="block mb-2 font-medium text-gray-700">Jenis Pelanggaran</label>
                    <textarea id="jenis" name="jenis" rows="7" required
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('jenis', $pelanggaran->jenis) }}</textarea>
                </div>

                <div class="mb-6">
                    <label for="konsekuensi" class="block mb-2 font-medium text-gray-700">Konsekuensi</label>
                    <textarea id="konsekuensi" name="konsekuensi" rows="7" required
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('konsekuensi', $pelanggaran->konsekuensi) }}</textarea>
                </div>

                <div class="mb-6">
                    <label for="poin" class="block mb-2 font-medium text-gray-700">Poin</label>
                    <input type="number" id="poin" name="poin" value="{{ old('poin', $pelanggaran->poin) }}" required
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
                </div>
            </div>

            <div class="md:w-1/2">
                <!-- Kamu bisa tambahkan input tambahan di sini jika ada -->
                <div class="mb-6">
                    <label class="block mb-2 font-medium text-gray-700">Catatan Tambahan (Opsional)</label>
                    <textarea name="catatan" rows="10" placeholder="Tambah catatan jika perlu..."
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('catatan', $pelanggaran->catatan ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Simpan Data</button>
            <button type="reset" class="ml-4 px-6 py-2 bg-yellow-400 text-gray-900 rounded hover:bg-yellow-500 transition">Reset Form</button>
        </div>
    </form>
</div>
</div>
@endsection
