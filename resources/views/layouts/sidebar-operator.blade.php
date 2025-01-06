<div class="fixed left-0 top-0 w-[249px] h-full bg-white shadow flex flex-col">
    <div class="h-[60px] pl-5 pt-5 flex items-center">
        <div class="text-[#111928] text-l font-semibold tracking-widest">Operator Sidebar</div>
    </div>
    <ul class="space-y-2 font-medium">
        <li>
            <a href="{{ route('operator') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ request()->is('operator') ? 'bg-gray-100' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M4 11.3333L0 9L12 2L24 9V17.5H22V10.1667L20 11.3333V18.0113L19.7774 18.2864C17.9457 20.5499 15.1418 22 12 22C8.85817 22 6.05429 20.5499 4.22263 18.2864L4 18.0113V11.3333ZM6 12.5V17.2917C7.46721 18.954 9.61112 20 12 20C14.3889 20 16.5328 18.954 18 17.2917V12.5L12 16L6 12.5ZM3.96927 9L12 13.6846L20.0307 9L12 4.31541L3.96927 9Z"></path></svg>
                <span class="ms-3">Dashboard</span>
            </a>
        </li>
    </ul>
        <div class="relative">
            <button 
            class="flex items-center justify-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100"
            onclick="toggleDropdown('informasiTambahan')"
            >
            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path d="M3 17H21V19H3V17ZM3 11H6V14H3V11ZM8 11H11V14H8V11ZM3 5H6V8H3V5ZM13 5H16V8H13V5ZM18 5H21V8H18V5ZM13 11H16V14H13V11ZM18 11H21V14H18V11ZM8 5H11V8H8V5Z"></path>
            </svg>
            <span class="flex-1 ms-3 text-left whitespace-nowrap">Input Data</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
            </button>
            <div 
            id="informasiTambahan" 
            class="transition-all duration-300 ease-in-out overflow-hidden max-h-0 bg-white rounded-md shadow-lg border border-gray-200"
            >
            <a href="{{ route('mata_pelajaran.index') }}" 
            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">
            Mata Pelajaran
            </a>
            <a href="{{ route('kelas.index') }}" 
            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">
            Kelas
            </a>
            <a href="{{ route('ekstrakurikuler.index') }}" 
            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">
            Ekstrakurikuler
            </a>
            <a href="{{ route('prestasi.index') }}" 
            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">
            Prestasi
            </a>
            <a href="{{ route('beasiswa.index') }}" 
            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">
            Beasiswa
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
    <!-- Logout Form -->
    <div class="absolute bottom-0 left-0 w-full p-4">
        <form method="POST" action="{{ route('logout') }}" class="flex items-center p-2 text-red-600 rounded-lg hover:bg-gray-100 group">
            @csrf
            <button type="submit" class="flex items-center w-full text-left">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M1.99805 21.0001V19.0001L3.99805 18.9999V4.83465C3.99805 4.35136 4.34367 3.93723 4.81916 3.85078L14.2907 2.12868C14.6167 2.0694 14.9291 2.28564 14.9884 2.61167C14.9948 2.64708 14.998 2.68301 14.998 2.719V3.9999L18.998 4.00007C19.5503 4.00007 19.998 4.44779 19.998 5.00007V18.9999L21.998 19.0001V21.0001H17.998V6.00007L14.998 5.9999V21.0001H1.99805ZM12.998 4.3965L5.99805 5.66923V19.0001H12.998V4.3965ZM11.998 11.0001V13.0001H9.99805V11.0001H11.998Z"></path></svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Keluar</span>
            </button>
        </form>
    </div>
</div>