<div class="fixed left-0 top-0 w-full h-[75px] bg-white border-b border-[#d7d5d5] flex items-center justify-between px-6 shadow z-50">
    <div class="flex items-center gap-8">
        <div class="flex items-center gap-5">
            <div class="w-10 h-10 relative">
                <div class="w-[33.88px] h-[35.45px] absolute">
                    <div class="w-8 h-[0.91px] bg-black absolute"></div>
                    <div class="w-[5px] h-[5.50px] absolute">
                        <img class="w-[4.26px] h-[5.32px]" src="https://via.placeholder.com/4x5" alt="Icon" />
                    </div>
                    <div class="w-[5px] h-[5.50px] absolute">
                        <img class="w-[4.26px] h-[5.32px]" src="https://via.placeholder.com/4x5" alt="Icon" />
                    </div>
                </div>
                <div class="w-10 h-[17.73px] absolute"></div>
                <div class="w-[11.78px] h-[5.46px] absolute">
                    <div class="w-[11.78px] h-[1.85px] bg-black absolute"></div>
                </div>
            </div>
            <div class="text-[#111928] text-2xl font-semibold tracking-widest">BUKIS</div>
        </div>
    </div>

    <!-- Logout Button -->
    <div class="flex items-center gap-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-[#1c64f2] text-sm font-medium">Keluar</button>
        </form>
    </div>
</div>
