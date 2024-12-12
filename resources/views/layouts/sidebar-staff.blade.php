<div class="fixed left-0 top-0 w-[249px] h-full bg-white shadow flex flex-col">
    <div class="h-[60px] pl-5 pt-5 flex items-center">
        <div class="text-[#111928] text-2xl font-semibold tracking-widest">Staff Sidebar</div>
    </div>
    <nav class="mt-6 px-3 space-y-4">
        <a href="{{ route('staff') }}" class="block px-4 py-2 text-[#111928] text-base font-medium rounded">Dashboard</a>
        <a href="{{ route('data-siswa') }}" class="block px-4 py-2 text-[#111928] text-base font-medium rounded">Data Siswa</a>
        <a href="#{{-- route('siswa.input') --}}" class="block px-4 py-2 text-[#111928] text-base font-medium rounded">Input Data Siswa</a>
    </nav>
    <!-- Logout Form -->
    <div class="absolute bottom-0 left-0 w-full p-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-[#1c64f2] text-sm font-medium w-full text-left">Keluar</button>
        </form>
    </div>
</div>
