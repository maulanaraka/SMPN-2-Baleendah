<div class="fixed left-0 top-0 w-[249px] h-full bg-white shadow flex flex-col">
    <!-- Header -->
    <div class="h-[60px] pl-5 pt-5 flex items-center">
        <div class="text-[#111928] text-2xl font-semibold tracking-widest">input Sidebar</div>
    </div>
        
    <!-- Dropdown: Data Pribadi -->
    <div class="relative">
        <button 
        class="flex items-center justify-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100"
        onclick="toggleDropdown('dataPribadi')"
        >
        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path d="M11 7V4C11 3.44772 11.4477 3 12 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V8C2 7.44772 2.44772 7 3 7H11ZM5 16V18H10V16H5ZM14 16V18H19V16H14ZM14 13V15H19V13H14ZM14 10V12H19V10H14ZM5 13V15H10V13H5Z"/>
        </svg>
        <span class="flex-1 ms-3 text-left whitespace-nowrap">Data Pribadi</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg>
        </button>
        <div 
        id="dataPribadi" 
        class="transition-all duration-300 ease-in-out overflow-hidden max-h-0 bg-white rounded-md shadow-lg border border-gray-200"
        >
        <a href="{{ route('siswa.input', $siswa->siswaID) }}" 
            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">
            Siswa
        </a>
        <a href="{{ route('tempat_tinggal.input', $siswa->siswaID) }}" 
            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">
            Tempat Tinggal
        </a>
        <a href="{{ route('kesehatan.input', $siswa->siswaID) }}"  
            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">
            Kesehatan
        </a>
        <a href="{{ route('orang_tua.input', $siswa->siswaID) }}" 
            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">
            Orang Tua / Wali
        </a>
        </div>
    </div>

    <!-- Dropdown: Pendidikan -->
    <div class="relative">
        <button 
        class="flex items-center justify-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100"
        onclick="toggleDropdown('pendidikan')"
        >
        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
        <path d="M23 18.9999H22V8.99991H18V6.58569L12 0.585693L6 6.58569V8.99991H2V18.9999H1V20.9999H23V18.9999ZM6 19H4V11H6V19ZM18 11H20V19H18V11ZM11 12H13V19H11V12Z"/>
        </svg>
        <span class="flex-1 ms-3 text-left whitespace-nowrap">Pendidikan</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg>
        </button>
        <div 
        id="pendidikan" 
        class="transition-all duration-300 ease-in-out overflow-hidden max-h-0 bg-white rounded-md shadow-lg border border-gray-200"
        >
        <a href="#"
            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">
            Kelas
        </a>
        <a href="#"
            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">
            Kehadiran
        </a>
        <a href="#"
            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">
            Nilai Siswa
        </a>
        <a href="#" 
            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">
            Ekstrakulikuler
        </a>
        <a href="#" 
            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">
            Prestasi
        </a>
        <a href="#" 
            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">
            Beasiswa
        </a>
        <a href="#" 
            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">
            Intelegensi dan Kepribadian
        </a>
        </div>
    </div>

    <!-- Dropdown: Informasi Tambahan -->
    <div class="relative">
        <button 
        class="flex items-center justify-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100"
        onclick="toggleDropdown('informasiTambahan')"
        >
        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
        <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 9.5C12.8284 9.5 13.5 8.82843 13.5 8C13.5 7.17157 12.8284 6.5 12 6.5C11.1716 6.5 10.5 7.17157 10.5 8C10.5 8.82843 11.1716 9.5 12 9.5ZM14 15H13V10.5H10V12.5H11V15H10V17H14V15Z"/>
        </svg>
        <span class="flex-1 ms-3 text-left whitespace-nowrap">Informasi Tambahan</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg>
        </button>
        <div 
        id="informasiTambahan" 
        class="transition-all duration-300 ease-in-out overflow-hidden max-h-0 bg-white rounded-md shadow-lg border border-gray-200"
        >
        <a href="#" 
        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">
        Kelulusan
        </a>
        <a href="#" 
        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">
        Pendidikan Sebelumnya
        </a>
        <a href="#" 
        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">
        Pindah Sekolah
        </a>
        <a href="#" 
        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">
        Catatan Siswa
        </a>
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
        <a href="{{ route('data-siswa') }}" class="flex items-center p-2 text-gray-500 rounded-lg hover:bg-gray-100 group">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                <path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"></path>
            </svg>
            <span class="flex-1 ms-3 whitespace-nowrap">Kembali</span>
        </a>
    </div>
</div>