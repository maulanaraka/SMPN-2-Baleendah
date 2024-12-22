@extends('layouts.app')

@section('content')

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
        <h1 class="text-2xl font-semibold mt-10 mb-4">Edit Mata Pelajaran</h1>
        
        <!-- Edit Mata Pelajaran -->
        <form action="{{ route('mata_pelajaran.update', $mataPelajaran->mataPelajaranID) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <div>
                    <label for="mataPelajaran" class="block mb-2 text-sm font-medium text-gray-900">Mata Pelajaran</label>
                    <input type="text" name="mataPelajaran" id="mataPelajaran" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $mataPelajaran->mataPelajaran }}" required>
                </div>

                <div class="col-span-2">
                    <label for="deskripsiMataPelajaran" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                    <textarea name="deskripsiMataPelajaran" id="deskripsiMataPelajaran" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-10" rows="4" required>{{ $mataPelajaran->deskripsiMataPelajaran }}</textarea>
                </div>

                <div>
                    <label for="KKMPengetahuan" class="block mb-2 text-sm font-medium text-gray-900">KKM Pengetahuan</label>
                    <input type="number" name="KKMPengetahuan" id="KKMPengetahuan" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $mataPelajaran->KKMPengetahuan }}" required>
                </div>

                <div>
                    <label for="KKMKeterampilan" class="block mb-2 text-sm font-medium text-gray-900">KKM Keterampilan</label>
                    <input type="number" name="KKMKeterampilan" id="KKMKeterampilan" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $mataPelajaran->KKMKeterampilan }}" required>
                </div>
            </div>

            <div class="mt-6 flex justify-between">
                <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">Update</button>
                <a href="{{ route('mata_pelajaran.index') }}" class="bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection