@extends('layouts.app')
@section('content')

<div class="p-4 sm:ml-60 min-h-screen">
    <div class="p-2">
        <div class="mt-10 mb-4">
            <h1 class="text-2xl font-bold text-gray-800">Backup Data</h1>
            <p class="text-gray-600">Cadangkan dan Unduh Data Siswa</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">Backup Manual</h2>
            <p class="text-gray-700 mb-6">Lakukan Backup data secara manual dan unduh file backup</p>
            <div class="flex justify-center items-center">
                <button onclick="window.location.href='{{ route('siswa.downloadBackup') }}'" class="w-full bg-green-100 text-green-600 px-4 py-2 rounded-lg hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor" class="mr-2"><path d="M13 10H18L12 16L6 10H11V3H13V10ZM4 19H20V12H22V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V12H4V19Z"></path></svg>
                    <span>Unduh File Backup</span>
                </button>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">Backup Otomatis</h2>
            <p class="text-gray-700 mb-6">Data Otomatis di cadangkan ke dalam database</p>
        </div>
    </div>
</div>

@endsection