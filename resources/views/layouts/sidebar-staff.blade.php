<div class="fixed left-0 top-0 w-[249px] h-full bg-white shadow flex flex-col">
    <div class="h-[60px] pl-5 pt-5 flex items-center">
        <div class="text-[#111928] text-2xl font-semibold tracking-widest">Staff Sidebar</div>
    </div>
    <ul class="space-y-2 font-medium">
            <li>
                <a href="/staff" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ request()->is('staff') ? 'bg-gray-100' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M4 11.3333L0 9L12 2L24 9V17.5H22V10.1667L20 11.3333V18.0113L19.7774 18.2864C17.9457 20.5499 15.1418 22 12 22C8.85817 22 6.05429 20.5499 4.22263 18.2864L4 18.0113V11.3333ZM6 12.5V17.2917C7.46721 18.954 9.61112 20 12 20C14.3889 20 16.5328 18.954 18 17.2917V12.5L12 16L6 12.5ZM3.96927 9L12 13.6846L20.0307 9L12 4.31541L3.96927 9Z"></path></svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <div class="relative">
                    <button 
                        class="flex items-center justify-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100"
                        onclick="toggleDropdown('dataSekolah')"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                            <path d="M12 0.585693L18 6.58569V9H22V19H23V21H1V19H2V9H6V6.58569L12 0.585693ZM18 19H20V11H18V19ZM6 11H4V19H6V11ZM8 7.41412V18.9999H11V12H13V18.9999H16V7.41412L12 3.41412L8 7.41412Z"></path>
                        </svg>
                        <span class="flex-1 ms-3 text-left whitespace-nowrap">Data Sekolah</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <div 
                        id="dataSekolah" 
                        class="transition-all duration-300 ease-in-out overflow-hidden max-h-0 bg-white rounded-md shadow-lg border border-gray-200"
                    >
                        <a href="{{ route('mata_pelajaran.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ request()->is('mata_pelajaran.index') ? 'bg-gray-100' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg"viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                                <path d="M8 4C8 5.10457 7.10457 6 6 6 4.89543 6 4 5.10457 4 4 4 2.89543 4.89543 2 6 2 7.10457 2 8 2.89543 8 4ZM5 16V22H3V10C3 8.34315 4.34315 7 6 7 6.82059 7 7.56423 7.32946 8.10585 7.86333L10.4803 10.1057 12.7931 7.79289 14.2073 9.20711 10.5201 12.8943 9 11.4587V22H7V16H5ZM6 9C5.44772 9 5 9.44772 5 10V14H7V10C7 9.44772 6.55228 9 6 9ZM19 5H10V3H20C20.5523 3 21 3.44772 21 4V15C21 15.5523 20.5523 16 20 16H16.5758L19.3993 22H17.1889L14.3654 16H10V14H19V5Z"></path>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Mata Pelajaran</span>
                        </a>
                        <a href="{{ route('kelas.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ request()->is('kelas.index') ? 'bg-gray-100' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg"viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                                <path d="M4 3C3.44772 3 3 3.44772 3 4V20C3 20.5523 3.44772 21 4 21H14C14.5523 21 15 20.5523 15 20V15.2973L15.9995 19.9996C16.1143 20.5398 16.6454 20.8847 17.1856 20.7699L21.0982 19.9382C21.6384 19.8234 21.9832 19.2924 21.8684 18.7522L18.9576 5.0581C18.8428 4.51788 18.3118 4.17304 17.7716 4.28786L14.9927 4.87853C14.9328 4.38353 14.5112 4 14 4H10C10 3.44772 9.55228 3 9 3H4ZM10 6H13V14H10V6ZM10 19V16H13V19H10ZM8 5V15H5V5H8ZM8 17V19H5V17H8ZM17.3321 16.6496L19.2884 16.2338L19.7042 18.1898L17.7479 18.6057L17.3321 16.6496ZM16.9163 14.6933L15.253 6.86789L17.2092 6.45207L18.8726 14.2775L16.9163 14.6933Z"></path>
                            </svg>
                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Kelas</span>
                        </a>
                        <a href="{{ route('ekstrakurikuler.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ request()->is('ekstrakurikuler.index') ? 'bg-gray-100' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="20" width="20" fill="currentColor">
                                <path d="M16.53125 16.53125h-0.094515625l0.692515625 -1.038809375A0.719325 0.719325 0 0 0 17.25 15.09375v-6.468390625c0 -7.10541875 -5.6925 -7.1875 -5.75 -7.1875A0.71875 0.71875 0 0 0 10.78125 2.15625l-0.000359375 1.4375H10.0625a0.7155875 0.7155875 0 0 0 -0.41759375 0.134046875l-5.03125 3.59375a0.71875 0.71875 0 0 0 -0.26421249999999996 0.8121875l0.71875 2.15625a0.717025 0.717025 0 0 0 0.7834375 0.483934375l3.5003125 -0.50010625 -2.774015625 4.439a0.71875 0.71875 0 0 0 0.011571875 0.77984375L7.2820156250000005 16.53125H7.1875a2.1586218749999997 2.1586218749999997 0 0 0 -2.15625 2.15625v2.875h13.65625v-2.875a2.1586218749999997 2.1586218749999997 0 0 0 -2.15625 -2.15625Zm-5.140428125000001 -6.8065625a0.71875 0.71875 0 0 0 -0.7115625 -1.0925l-4.43741875 0.633865625 -0.361171875 -1.08373125L10.2925 5.0316093749999995h1.2067812500000001a0.71875 0.71875 0 0 0 0.71875 -0.7183906250000001L12.21875 2.967646875C13.297809375 3.2082124999999997 15.249503125 4.0753125 15.711875 7.1875H13.65625v1.4375h2.15625v1.4375h-2.15625v1.4375h2.15625v1.4375h-2.15625v1.4375h2.15625v0.501184375L14.709075 16.53125h-5.6996875L8.0428125 15.0811ZM17.25 20.125H6.46875v-1.4375a0.7193968749999999 0.7193968749999999 0 0 1 0.71875 -0.71875h9.34375a0.71918125 0.71918125 0 0 1 0.71875 0.71875Z" ></path>
                            </svg>
                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Ekstrakurikuler</span>
                        </a>
                    </div>
                </div>
                <script>
                    function toggleDropdown(id) {
                        const dropdown = document.getElementById(id);
                        const isExpanded = dropdown.style.maxHeight && dropdown.style.maxHeight !== '0px';
                        dropdown.style.maxHeight = isExpanded ? '0' : `${dropdown.scrollHeight}px`;
                    }
                </script>
            </li>
            <li>
                <a href="/data-siswa" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ request()->is('data-siswa') ? 'bg-gray-100' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M12 11C14.7614 11 17 13.2386 17 16V22H15V16C15 14.4023 13.7511 13.0963 12.1763 13.0051L12 13C10.4023 13 9.09634 14.2489 9.00509 15.8237L9 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5.5 14C5.77885 14 6.05009 14.0326 6.3101 14.0942C6.14202 14.594 6.03873 15.122 6.00896 15.6693L6 16L6.0007 16.0856C5.88757 16.0456 5.76821 16.0187 5.64446 16.0069L5.5 16C4.7203 16 4.07955 16.5949 4.00687 17.3555L4 17.5V22H2V17.5C2 15.567 3.567 14 5.5 14ZM18.5 14C20.433 14 22 15.567 22 17.5V22H20V17.5C20 16.7203 19.4051 16.0796 18.6445 16.0069L18.5 16C18.3248 16 18.1566 16.03 18.0003 16.0852L18 16C18 15.3343 17.8916 14.694 17.6915 14.0956C17.9499 14.0326 18.2211 14 18.5 14ZM5.5 8C6.88071 8 8 9.11929 8 10.5C8 11.8807 6.88071 13 5.5 13C4.11929 13 3 11.8807 3 10.5C3 9.11929 4.11929 8 5.5 8ZM18.5 8C19.8807 8 21 9.11929 21 10.5C21 11.8807 19.8807 13 18.5 13C17.1193 13 16 11.8807 16 10.5C16 9.11929 17.1193 8 18.5 8ZM5.5 10C5.22386 10 5 10.2239 5 10.5C5 10.7761 5.22386 11 5.5 11C5.77614 11 6 10.7761 6 10.5C6 10.2239 5.77614 10 5.5 10ZM18.5 10C18.2239 10 18 10.2239 18 10.5C18 10.7761 18.2239 11 18.5 11C18.7761 11 19 10.7761 19 10.5C19 10.2239 18.7761 10 18.5 10ZM12 2C14.2091 2 16 3.79086 16 6C16 8.20914 14.2091 10 12 10C9.79086 10 8 8.20914 8 6C8 3.79086 9.79086 2 12 2ZM12 4C10.8954 4 10 4.89543 10 6C10 7.10457 10.8954 8 12 8C13.1046 8 14 7.10457 14 6C14 4.89543 13.1046 4 12 4Z"></path></svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Data Siswa</span>
                </a>
            </li>
            <li>
                <a href="/siswa/input" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ request()->is('siswa/input') ? 'bg-gray-100' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M13 21V23H11V21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H9C10.1947 3 11.2671 3.52375 12 4.35418C12.7329 3.52375 13.8053 3 15 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H13ZM20 19V5H15C13.8954 5 13 5.89543 13 7V19H20ZM11 19V7C11 5.89543 10.1046 5 9 5H4V19H11Z"></path></svg>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Input Data Siswa</span>
                </a>
            </li>
            <li>
                <a href="/backup-data" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group {{ request()->is('backup-data') ? 'bg-gray-100' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M5 12.5C5 12.8134 5.46101 13.3584 6.53047 13.8931C7.91405 14.5849 9.87677 15 12 15C14.1232 15 16.0859 14.5849 17.4695 13.8931C18.539 13.3584 19 12.8134 19 12.5V10.3287C17.35 11.3482 14.8273 12 12 12C9.17273 12 6.64996 11.3482 5 10.3287V12.5ZM19 15.3287C17.35 16.3482 14.8273 17 12 17C9.17273 17 6.64996 16.3482 5 15.3287V17.5C5 17.8134 5.46101 18.3584 6.53047 18.8931C7.91405 19.5849 9.87677 20 12 20C14.1232 20 16.0859 19.5849 17.4695 18.8931C18.539 18.3584 19 17.8134 19 17.5V15.3287ZM3 17.5V7.5C3 5.01472 7.02944 3 12 3C16.9706 3 21 5.01472 21 7.5V17.5C21 19.9853 16.9706 22 12 22C7.02944 22 3 19.9853 3 17.5ZM12 10C14.1232 10 16.0859 9.58492 17.4695 8.89313C18.539 8.3584 19 7.81342 19 7.5C19 7.18658 18.539 6.6416 17.4695 6.10687C16.0859 5.41508 14.1232 5 12 5C9.87677 5 7.91405 5.41508 6.53047 6.10687C5.46101 6.6416 5 7.18658 5 7.5C5 7.81342 5.46101 8.3584 6.53047 8.89313C7.91405 9.58492 9.87677 10 12 10Z"></path></svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Backup Data</span>
                </a>
            </li>
        </ul>
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
