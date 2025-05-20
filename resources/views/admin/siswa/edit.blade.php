@extends('mainLayouts')

@section('content')
<div class="max-w-5xl mx-auto p-8">
    <div class="bg-white shadow-lg rounded-xl p-6">
    <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Edit Siswa</h1>
            <a href="{{ route('siswa.index') }}" class="text-sm text-blue-600 hover:underline">← Kembali</a>
        </div>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li class="mb-1">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data" class="w-full max-w-5xl mx-auto bg-white p-8 rounded shadow">
        @csrf
        @method('PUT')
        <div class="flex flex-col md:flex-row md:space-x-10">
            <div class="md:w-1/2">
                <h4 class="text-xl font-semibold mb-5 text-gray-700">Data Siswa</h4>

                <div class="mb-6">
                    <label class="block mb-2 font-medium text-gray-700">Foto Siswa</label>
                    <img src="{{ asset('storage/siswas/' . $siswa->image) }}" alt="Foto Siswa" class="w-32 h-32 object-cover rounded mb-3 border border-gray-300">
                    <input type="file" name="image" accept="image/*" class="block w-full text-gray-700 border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-6">
                    <label class="block mb-2 font-medium text-gray-700" for="nis">NIS</label>
                    <input id="nis" type="text" name="nis" value="{{ old('nis', $siswa->nis) }}" required
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-6">
                    <label class="block mb-2 font-medium text-gray-700" for="name">Nama Lengkap</label>
                    <input id="name" type="text" name="name" value="{{ old('name', $siswa->name) }}" required
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
            </div>

            <div class="md:w-1/2">
                <div class="mb-6">
                    <label class="block mb-2 font-medium text-gray-700" for="tingkatan">Tingkatan</label>
                    <select id="tingkatan" name="tingkatan" required
                        class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-400">
                        @foreach(['X', 'XI', 'XII'] as $tingkatan)
                            <option value="{{ $tingkatan }}" {{ $siswa->tingkatan == $tingkatan ? 'selected' : '' }}>{{ $tingkatan }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 font-medium text-gray-700" for="jurusan">Jurusan</label>
                    <select id="jurusan" name="jurusan" required
                        class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-400">
                        @foreach(['TBSM', 'TJKT', 'PPLG', 'DKV', 'TOI'] as $jurusan)
                            <option value="{{ $jurusan }}" {{ $siswa->jurusan == $jurusan ? 'selected' : '' }}>{{ $jurusan }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 font-medium text-gray-700" for="kelas">Kelas</label>
                    <select id="kelas" name="kelas" required
                        class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-400">
                        @foreach([1, 2, 3, 4] as $kelas)
                            <option value="{{ $kelas }}" {{ $siswa->kelas == $kelas ? 'selected' : '' }}>{{ $kelas }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block mb-2 font-medium text-gray-700" for="hp">No HP</label>
                    <input id="hp" type="text" name="hp" value="{{ old('hp', $siswa->hp) }}" required
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-8">
                    <label class="block mb-2 font-medium text-gray-700" for="status">Status</label>
                    <select id="status" name="status" required
                        class="w-full border border-gray-300 rounded px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="1" {{ $siswa->status == 1 ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ $siswa->status == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>

                <div class="flex space-x-4">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Simpan Data</button>
                    <button type="reset" class="px-6 py-2 bg-yellow-400 text-gray-900 rounded hover:bg-yellow-500 transition">Reset Form</button>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
@endsection
