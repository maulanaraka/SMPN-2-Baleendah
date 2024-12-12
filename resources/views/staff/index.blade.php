@extends('layouts.app')
@section('content')
<div class="w-full h-screen relative bg-gradient-to-b from-[#a4b96b] to-[#f4f4f4]">
    <!-- Main Content -->
    <main class=" p-6">
        <div>
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Welcome, {{ $user->name }}!</h1>
            <p class="text-gray-600 mb-4">This is staff dashboard.</p>
        </div>
        <div class="mt-8 flex flex-wrap gap-6">
            <div class="bg-white rounded-lg shadow-lg p-6 flex-grow">
                <span class="text-black text-[32px]">Total Siswa</span><br/>
                <span class="text-[#a3b86a] text-[32px] font-semibold">{{ $totalSiswa }}</span>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 flex-grow">
                <span class="text-black text-[32px]">Siswa Laki-laki</span><br/>
                <span class="text-[#1a56db] text-[32px] font-semibold">{{ $siswaLakiLaki }}</span>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 flex-grow">
                <span class="text-black text-[32px]">Siswi Perempuan</span><br/>
                <span class="text-[#ff51c8] text-[32px] font-semibold">{{ $siswiPerempuan }}</span>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 mt-8">
            <h3 class="text-black text-[32px] text-center">Statistik Kelas</h3>
            <div class="flex justify-center items-end gap-4 mt-6">
                <div class="w-1/4 h-[194px] bg-[#1a56db] rounded-lg"></div>
                <div class="w-1/4 h-[223px] bg-[#fdba8c] rounded-lg"></div>
            </div>
            <div class="flex justify-center gap-4 mt-4">
                <span class="text-gray-500 text-sm">Kelas 7</span>
            </div>
        </div>
    </main>
</div>
@endsection