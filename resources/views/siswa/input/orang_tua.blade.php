@extends('layouts.app')

@section('content')
@include('layouts.sidebar-input')

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
        <h1 class="text-2xl font-semibold mt-10 mb-4">Tambah Data Orang Tua</h1>

        <form action="{{ route('orang_tua.store') }}" method="POST">
            @csrf
            <div class="border border-white p-2 rounded-lg text-center mb-5 bg-transparent text-black">
                <h2 class="text-xl font-semibold">Data Ibu</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <input type="hidden" name="SiswasiswaID" value="{{ $siswaID }}">
                <div>
                    <label for="namaIbu" class="block mb-2 text-sm font-medium text-gray-900">Nama Ibu</label>
                    <input type="text" name="namaIbu" value="{{ old('namaIbu') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="nomorTeleponIbu" class="block mb-2 text-sm font-medium text-gray-900">Nomor Telepon Ibu</label>
                    <input type="text" name="nomorTeleponIbu" value="{{ old('nomorTeleponIbu') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="tempatLahirIbu" class="block mb-2 text-sm font-medium text-gray-900">Tempat Lahir Ibu</label>
                    <input type="text" name="tempatLahirIbu" value="{{ old('tempatLahirIbu') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="tanggalLahirIbu" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Lahir Ibu</label>
                    <input type="date" name="tanggalLahirIbu" value="{{ old('tanggalLahirIbu') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="kewarganegaraanIbu" class="block mb-2 text-sm font-medium text-gray-900">Kewarganegaraan Ibu</label>
                    <input type="text" name="kewarganegaraanIbu" value="{{ old('kewarganegaraanIbu') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="pendidikanTertinggiIbu" class="block mb-2 text-sm font-medium text-gray-900">Pendidikan Tertinggi Ibu</label>
                    <input type="text" name="pendidikanTertinggiIbu" value="{{ old('pendidikanTertinggiIbu') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="pekerjaanIbu" class="block mb-2 text-sm font-medium text-gray-900">Pekerjaan Ibu</label>
                    <input type="text" name="pekerjaanIbu" value="{{ old('pekerjaanIbu') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="penghasilanIbu" class="block mb-2 text-sm font-medium text-gray-900">Penghasilan Ibu</label>
                    <input type="number" name="penghasilanIbu" value="{{ old('penghasilanIbu') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="alamatIbu" class="block mb-2 text-sm font-medium text-gray-900">Alamat Ibu</label>
                    <input type="text" name="alamatIbu" value="{{ old('alamatIbu') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
            </div>

            <div class="border border-white p-2 rounded-lg text-center mb-5 mt-5 bg-transparent text-black">
                <h2 class="text-xl font-semibold">Data Ayah</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <div>
                    <label for="namaAyah" class="block mb-2 text-sm font-medium text-gray-900">Nama Ayah</label>
                    <input type="text" name="namaAyah" value="{{ old('namaAyah') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="nomorTeleponAyah" class="block mb-2 text-sm font-medium text-gray-900">Nomor Telepon Ayah</label>
                    <input type="text" name="nomorTeleponAyah" value="{{ old('nomorTeleponAyah') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="tempatLahirAyah" class="block mb-2 text-sm font-medium text-gray-900">Tempat Lahir Ayah</label>
                    <input type="text" name="tempatLahirAyah" value="{{ old('tempatLahirAyah') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="tanggalLahirAyah" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Lahir Ayah</label>
                    <input type="date" name="tanggalLahirAyah" value="{{ old('tanggalLahirAyah') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="kewarganegaraanAyah" class="block mb-2 text-sm font-medium text-gray-900">Kewarganegaraan Ayah</label>
                    <input type="text" name="kewarganegaraanAyah" value="{{ old('kewarganegaraanAyah') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="pendidikanTertinggiAyah" class="block mb-2 text-sm font-medium text-gray-900">Pendidikan Tertinggi Ayah</label>
                    <input type="text" name="pendidikanTertinggiAyah" value="{{ old('pendidikanTertinggiAyah') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="pekerjaanAyah" class="block mb-2 text-sm font-medium text-gray-900">Pekerjaan Ayah</label>
                    <input type="text" name="pekerjaanAyah" value="{{ old('pekerjaanAyah') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="penghasilanAyah" class="block mb-2 text-sm font-medium text-gray-900">Penghasilan Ayah</label>
                    <input type="number" name="penghasilanAyah" value="{{ old('penghasilanAyah') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="alamatAyah" class="block mb-2 text-sm font-medium text-gray-900">Alamat Ayah</label>
                    <input type="text" name="alamatAyah" value="{{ old('alamatAyah') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
            </div>
            <div class="mt-6 flex justify-between">
                <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">Tambah Data</button>
            </div>
        </form>
    </div>
</div>

@endsection
