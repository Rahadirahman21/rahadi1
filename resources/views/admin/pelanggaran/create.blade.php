@extends('mainLayouts')

@section('content')
<div class="max-w-3xl mx-auto mt-10">
    <div class="bg-white shadow-lg rounded-xl p-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Tambah Pelanggaran</h1>
            <a href="{{ route('pelanggaran.index') }}" class="text-sm text-blue-600 hover:underline">← Kembali</a>
        </div>

        {{-- Tampilkan Error --}}
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pelanggaran.store') }}" method="POST" class="space-y-5">
            @csrf

            {{-- Jenis Pelanggaran --}}
            <div>
                <label for="jenis" class="block text-sm font-medium text-gray-700 mb-1">Jenis Pelanggaran</label>
                <textarea id="jenis" name="jenis" rows="3"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('jenis') border-red-500 @enderror"
                    required>{{ old('jenis') }}</textarea>
                @error('jenis')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Konsekuensi --}}
            <div>
                <label for="konsekuensi" class="block text-sm font-medium text-gray-700 mb-1">Konsekuensi</label>
                <textarea id="konsekuensi" name="konsekuensi" rows="3"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('konsekuensi') border-red-500 @enderror"
                    required>{{ old('konsekuensi') }}</textarea>
                @error('konsekuensi')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Poin --}}
            <div>
                <label for="poin" class="block text-sm font-medium text-gray-700 mb-1">Poin</label>
                <input type="number" name="poin" id="poin"
                    class="w-full px-3 py-2 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('poin') border-red-500 @enderror"
                    value="{{ old('poin') }}" required>
                @error('poin')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol --}}
            <div class="flex items-center justify-between pt-4">
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-150">
                    Simpan Data
                </button>
                <button type="reset"
                    class="bg-yellow-400 text-white px-4 py-2 rounded-lg hover:bg-yellow-500 transition duration-150">
                    Reset Form
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
