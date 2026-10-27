<section class="flex h-screen items-center justify-center bg-jogja-900 bg-cover bg-center px-5 py-16 text-center text-white" id="home" style="background-image: linear-gradient(180deg, rgba(45,27,18,.18), rgba(45,27,18,.72)), url('{{ $wedding['hero_image'] ? asset($wedding['hero_image']) : 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1800&q=85' }}');">
    <div class="max-w-2xl animate-fade-up">
        <p class="mb-3 text-[9px] font-semibold uppercase tracking-[.28em] text-jogja-300 sm:mb-4 sm:text-[10px]">Undangan Pernikahan</p>
        <h1 class="break-words font-display text-4xl font-medium leading-[.9] sm:text-6xl md:text-8xl">{{ $wedding['bride'] }} <span class="text-jogja-300">&amp;</span> {{ $wedding['groom'] }}</h1>
        <div class="mx-auto mt-5 h-px w-16 bg-jogja-300 sm:mt-6 sm:w-20"></div>
        <p class="mt-4 font-display text-lg italic sm:mt-5 sm:text-xl md:text-2xl">Menyatukan dua hati, melestarikan sebuah tradisi.</p>
        <p class="mt-3 text-[11px] tracking-wider text-white/80 sm:mt-4 sm:text-xs">{{ $wedding['date'] }} &middot; {{ $wedding['city'] }}</p>
        <div id="countdown" data-target="{{ $wedding['date_iso'] }}" class="mx-auto mt-5 grid max-w-xs grid-cols-4 gap-1 text-center sm:mt-6 sm:gap-1.5">
            <div class="rounded bg-black/20 px-1.5 py-2 backdrop-blur-sm"><strong data-unit="days" class="block font-display text-2xl text-jogja-300 sm:text-3xl">0</strong><span class="text-[9px] uppercase tracking-widest text-white/60">Hari</span></div>
            <div class="rounded bg-black/20 px-1.5 py-2 backdrop-blur-sm"><strong data-unit="hours" class="block font-display text-2xl text-jogja-300 sm:text-3xl">0</strong><span class="text-[9px] uppercase tracking-widest text-white/60">Jam</span></div>
            <div class="rounded bg-black/20 px-1.5 py-2 backdrop-blur-sm"><strong data-unit="minutes" class="block font-display text-2xl text-jogja-300 sm:text-3xl">0</strong><span class="text-[9px] uppercase tracking-widest text-white/60">Menit</span></div>
            <div class="rounded bg-black/20 px-1.5 py-2 backdrop-blur-sm"><strong data-unit="seconds" class="block font-display text-2xl text-jogja-300 sm:text-3xl">0</strong><span class="text-[9px] uppercase tracking-widest text-white/60">Detik</span></div>
        </div>
        <a href="#event" class="mt-7 inline-flex rounded-full border border-jogja-300 bg-jogja-700/70 px-6 py-3 text-[10px] font-bold uppercase tracking-[.2em] transition hover:bg-jogja-500 sm:mt-9 sm:px-7 sm:text-xs">Lihat Undangan</a>
    </div>
</section>
