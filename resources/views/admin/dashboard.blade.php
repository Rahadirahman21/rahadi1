@extends('mainLayouts')

@section('content')

<div class="p-10 max-w-7xl mx-auto">

    {{-- Header --}}
    <header class="text-center mb-12">
        <h1 class="text-5xl font-extrabold  mb-2">SELAMAT DATANG DI E-POINT SISWA</h1>
        <h2 class="text-2xl text-gray-600 font-semibold">SMKN 4 TASIKMALAYA</h2>
    </header>

    {{-- Alerts --}}
    @if (Session::get('success'))
    <div id="alert-success" class="alert alert-success shadow-lg max-w-xl mx-auto mb-10 flex items-center space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4" />
        </svg>
        <span>{{ Session::get('success') }}</span>
    </div>
@endif



    {{-- Statistik Cards --}}
    <section class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-16 max-w-xl mx-auto">
        <div class="card bg-primary text-primary-content shadow-xl transition-transform transform hover:scale-105">
            <div class="card-body text-center">
                <h2 class="card-title text-lg mb-2">Jumlah Siswa</h2>
                <p class="text-6xl font-extrabold tracking-tight">{{ $jmlSiswas ?? '-' }}</p>
            </div>
        </div>

        <div class="card bg-red-500 text-error-content shadow-xl transition-transform transform hover:scale-105">
            <div class="card-body text-center">
                <h2 class="card-title text-lg mb-2 text-white">Jumlah Pelanggar</h2>
                <p class="text-6xl font-extrabold tracking-tight text-white">{{ $jmlPelanggars ?? '-' }}</p>
            </div>
        </div>
    </section>

    {{-- Top 10 Pelanggar --}}
    <section class="mb-20 max-w-7xl mx-auto">
        <h3 class="text-3xl font-bold text-center mb-8 ">Top 10 Siswa Dengan Poin Pelanggaran Tertinggi</h3>
        <div class="overflow-x-auto rounded-lg shadow-lg">
            <table class="table table-zebra w-full">
                <thead class="bg-blue-500 text-primary-content">
                    <tr>
                        <th class="text-center">Foto</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>No HP</th>
                        <th>Poin</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pelanggars as $pelanggar)
                    <tr class="hover:bg-primary/10 transition-colors">
                        <td class="text-center">
                            <div class="avatar mx-auto">
                                <div class="w-16 h-16 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                    <img src="{{ asset('storage/siswas/' . $pelanggar->image) }}" alt="Foto Siswa" />
                                </div>
                            </div>
                        </td>
                        <td>{{ $pelanggar->nis }}</td>
                        <td class="font-semibold">{{ $pelanggar->name }}</td>
                        <td>{{ $pelanggar->tingkatan }} {{ $pelanggar->jurusan }} {{ $pelanggar->kelas }}</td>
                        <td>{{ $pelanggar->hp }}</td>
                        <td class="font-bold text-error">{{ $pelanggar->poin_pelanggar }}</td>
                        <td class="text-center">
                            <a href="{{ route('pelanggar.show', $pelanggar->id) }}"
                               class="btn btn-sm btn-outline btn-primary hover:btn-primary">
                                Detail
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-8 italic text-gray-400">Data tidak ditemukan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    {{-- Top 10 Pelanggaran --}}
    <section class="max-w-7xl mx-auto">
        <h3 class="text-3xl font-bold text-center mb-8  ">Top 10 Pelanggaran yang Sering Dilakukan</h3>
        <div class="overflow-x-auto rounded-lg shadow-lg">
            <table class="table table-zebra w-full">
                <thead class="bg-blue-500 text-primary-content">
                    <tr>
                        <th>Nama Pelanggaran</th>
                        <th>Konsekuensi</th>
                        <th>Poin</th>
                        <th>Total Pelanggaran</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($hitung as $hit)
                    <tr class="hover:bg-primary/10 transition-colors">
                        <td class="font-semibold">{{ $hit->jenis }}</td>
                        <td>{{ $hit->konsekuensi }}</td>
                        <td class="text-red-500 font-bold">{{ $hit->poin }}</td>
                        <td class="font-bold">{{ $hit->totals }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-8 italic text-gray-400">Data tidak ditemukan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alertSuccess = document.getElementById('alert-success');
        const alertInfo = document.getElementById('alert-info');

        // Fungsi hide elemen dengan efek fade
        function fadeOutEffect(element, duration = 500) {
            if (!element) return;
            element.style.transition = `opacity ${duration}ms ease`;
            element.style.opacity = 1;

            setTimeout(() => {
                element.style.opacity = 0;
            }, 3000); // delay 3 detik sebelum mulai fade out

            setTimeout(() => {
                element.style.display = 'none';
            }, 3000 + duration);
        }

        // Hanya fade out alert success saja setelah login sukses
        if (alertSuccess) {
            fadeOutEffect(alertSuccess);
        }

        // Bisa juga hide alert info (opsional)
        // if (alertInfo) {
        //     fadeOutEffect(alertInfo);
        // }
    });
</script>
@endsection
