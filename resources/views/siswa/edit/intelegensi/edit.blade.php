@extends('layouts.app')

@section('content')
@include('layouts.sidebar-edit', ['siswa' => $siswa])

@if (session('success'))
    <!-- Toast Success (Modal Style) -->
    <div id="toast-success" class="fixed bottom-4 right-4 w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-white bg-green-500 rounded-lg">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>

    <script>
        // JavaScript untuk menutup toast otomatis setelah beberapa detik
        setTimeout(() => {
            document.getElementById('toast-success').classList.add('hidden');
        }, 5000);  // Hide after 5 seconds
    </script>
@endif

<div class="p-4 sm:ml-60 min-h-screen">
    <div class="p-2">
        <h1 class="text-2xl font-semibold mt-10 mb-4">Edit Data Intelegensi Siswa untuk {{ $siswa->namaLengkap }}</h1>
        
        <!-- Edit Intelegensi -->
        <form action="{{ route('siswa.intelegensi.update', [$siswa->siswaID, $intelegensi->intelegensiID]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <div>
                    <label for="intelegensiIQ" class="block mb-2 text-sm font-medium text-gray-900">IQ</label>
                    <input type="number" name="intelegensiIQ" id="intelegensiIQ" value="{{ old('intelegensiIQ', $intelegensi->intelegensiIQ) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>

                <div>
                    <label for="tanggalTesIQ" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Tes IQ</label>
                    <input type="date" name="tanggalTesIQ" id="tanggalTesIQ" value="{{ old('tanggalTesIQ', $intelegensi->tanggalTesIQ) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>

                <div>
                    <label for="disiplin" class="block mb-2 text-sm font-medium text-gray-900">Disiplin</label>
                    <input type="number" name="disiplin" id="disiplin" value="{{ old('disiplin', $intelegensi->disiplin) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>

                <div>
                    <label for="kreativitas" class="block mb-2 text-sm font-medium text-gray-900">Kreativitas</label>
                    <input type="number" name="kreativitas" id="kreativitas" value="{{ old('kreativitas', $intelegensi->kreativitas) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>

                <div>
                    <label for="tanggungJawab" class="block mb-2 text-sm font-medium text-gray-900">Tanggung Jawab</label>
                    <input type="number" name="tanggungJawab" id="tanggungJawab" value="{{ old('tanggungJawab', $intelegensi->tanggungJawab) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>

                <div>
                    <label for="penyesuaianDiri" class="block mb-2 text-sm font-medium text-gray-900">Penyesuaian Diri</label>
                    <input type="number" name="penyesuaianDiri" id="penyesuaianDiri" value="{{ old('penyesuaianDiri', $intelegensi->penyesuaianDiri) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>

                <div>
                    <label for="kemantapanEmosi" class="block mb-2 text-sm font-medium text-gray-900">Kemantapan Emosi</label>
                    <input type="number" name="kemantapanEmosi" id="kemantapanEmosi" value="{{ old('kemantapanEmosi', $intelegensi->kemantapanEmosi) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>

                <div>
                    <label for="kerjasama" class="block mb-2 text-sm font-medium text-gray-900">Kerjasama</label>
                    <input type="number" name="kerjasama" id="kerjasama" value="{{ old('kerjasama', $intelegensi->kerjasama) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
            </div>

            <div class="mt-6 flex justify-between">
                <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">Update</button>
                <a href="{{ route('siswa.intelegensi.index', $siswa->siswaID) }}" class="bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@endsection