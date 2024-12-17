<div class="fixed left-0 top-0 w-[249px] h-full bg-white shadow flex flex-col">
    <!-- Header -->
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

    <!-- Scrollable Menu Area -->
    <div class="flex-1 px-4 py-4 mt-2 space-y-2 overflow-y-auto" style="margin-bottom: 70px;">
        <!-- Dropdown: Data Pribadi -->
        <div class="relative">
            <button 
                class="w-full bg-gray-100 text-gray-900 px-4 py-2 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400"
                onclick="toggleDropdown('dataPribadi')"
            >
                Data Pribadi
            </button>
            <div 
                id="dataPribadi" 
                class="transition-all duration-300 ease-in-out overflow-hidden max-h-0 bg-white rounded-md shadow-lg border border-gray-200"
            >
                <a href="{{ route('siswa.edit', $siswa->siswaID) }}" 
                    class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                    Siswa
                </a>
                <a href="{{ route('tempat_tinggal.edit', $siswa->siswaID) }}" 
                    class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                    Tempat Tinggal
                </a>
                <a href="{{ route('kesehatan.edit', $siswa->siswaID) }}"  
                    class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                    Kesehatan
                </a>
                <a href="{{ route('orang_tua.edit', $siswa->siswaID) }}" 
                class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                Orang Tua / Wali
                </a>
            </div>
        </div>

        <!-- Dropdown: Pendidikan -->
        <div class="relative">
            <button 
                class="w-full bg-gray-100 text-gray-900 px-4 py-2 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400"
                onclick="toggleDropdown('pendidikan')"
            >
                Pendidikan
            </button>
            <div 
                id="pendidikan" 
                class="transition-all duration-300 ease-in-out overflow-hidden max-h-0 bg-white rounded-md shadow-lg border border-gray-200"
            >
            <a href="{{ route('siswa.kelas.index', $siswa->siswaID) }}"
                class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                Kelas
            </a>
                <a href="{{ route('kehadiran.edit', $siswa->siswaID) }}"
                class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                Kehadiran
                </a>
                <a href="{{ route('siswa.nilai.index', $siswa->siswaID) }}"
                class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                    Nilai Siswa
                </a>
                <a href="#" 
                class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                    Ekstrakulikuler
                </a>
                <a href="#" 
                class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                    Prestasi
                </a>
                <a href="#" 
                class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                    Beasiswa
                </a>
                <a href="#" 
                class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                    Intelegensi dan Kepribadian
                </a>
            </div>
        </div>

        <!-- Dropdown: Informasi Tambahan -->
        <div class="relative">
            <button 
                class="w-full bg-gray-100 text-gray-900 px-4 py-2 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400"
                onclick="toggleDropdown('informasiTambahan')"
            >
                Informasi Tambahan
            </button>
            <div 
                id="informasiTambahan" 
                class="transition-all duration-300 ease-in-out overflow-hidden max-h-0 bg-white rounded-md shadow-lg border border-gray-200"
            >
                <a href="#" 
                class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                Kelulusan
            </a>
                <a href="#" 
                class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                Pendidikan Sebelumnya
            </a>
                <a href="#" 
                class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                Pindah Sekolah
            </a>
                <a href="#" 
                class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                Catatan Siswa
            </a>
            </div>
        </div>
    </div>

    <script>
        function toggleDropdown(id) {
            const dropdown = document.getElementById(id);
        
            // Check the current height
            if (dropdown.style.maxHeight && dropdown.style.maxHeight !== '0px') {
                dropdown.style.maxHeight = '0px'; // Collapse
            } else {
                dropdown.style.maxHeight = dropdown.scrollHeight + 'px'; // Expand
            }
        
            // Close other dropdowns
            document.querySelectorAll('.relative > div').forEach(content => {
                if (content.id !== id) {
                    content.style.maxHeight = '0px'; // Collapse all other dropdowns
                }
            });
        }
        </script>

    <!-- Back Form -->
    <div class="absolute bottom-0 left-0 w-full p-4 bg-white shadow">
        <a href="{{ route('data-siswa') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Back</a>
    </div>
</div>

