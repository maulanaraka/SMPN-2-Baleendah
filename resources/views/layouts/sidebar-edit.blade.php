<div class="fixed left-0 top-0 w-[249px] h-full bg-white shadow flex flex-col">
    <div class="h-[60px] pl-5 pt-5 flex items-center">
        <div class="text-[#111928] text-2xl font-semibold tracking-widest">Edit Sidebar</div>
    </div>

    <!-- Siswa Identity Display -->
    <div class="px-4 py-2 border-t border-gray-300 mt-6">
        <div class="text-lg font-semibold text-[#111928]">
            <p class="text-sm text-gray-500">Nama: {{ $siswa->namaLengkap }}</p>
            <p class="text-sm text-gray-500">NISN: {{ $siswa->NISN }}</p>
        </div>
    </div>

    <nav class="mt-6 px-3 space-y-4">
        <!-- Edit links for specific data models -->
        <a href="{{ route('siswa.edit', $siswa->siswaID) }}" class="block px-4 py-2 text-[#111928] text-base font-medium rounded">Data Siswa</a>
        <a href="#{{-- route('kesehatan.edit', $kesehatan->siswaID) --}}" class="block px-4 py-2 text-[#111928] text-base font-medium rounded">Kesehatan</a>
        <a href="#{{-- route('kelas.edit', $kelas->siswaID) --}}" class="block px-4 py-2 text-[#111928] text-base font-medium rounded">Kelas</a>
        <!-- Add more edit links as needed -->
    </nav>
    
    <!-- Logout Form -->
    <div class="absolute bottom-0 left-0 w-full p-4">
        <a href="{{ route('data-siswa') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back</a>
    </div>
</div>
