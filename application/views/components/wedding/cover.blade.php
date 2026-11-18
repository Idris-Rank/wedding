<section
    class="relative flex h-screen items-center justify-center overflow-hidden bg-jogja-900 bg-cover bg-[center_42%] px-5 py-10 text-center text-white sm:py-14"
    id="home"
    style="background-image: linear-gradient(180deg, rgba(20,18,16,.28) 0%, rgba(20,18,16,.12) 35%, rgba(20,18,16,.78) 100%), url('{{ $wedding['hero_image'] ? asset($wedding['hero_image']) : 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1800&q=85' }}');">
    <div class="pointer-events-none absolute inset-0 bg-gradient-to-r from-black/20 via-transparent to-black/20"></div>
    <div class="pointer-events-none absolute inset-4 border border-gold/45 sm:inset-7 md:inset-9"></div>
    <div class="pointer-events-none absolute inset-[22px] border border-white/20 sm:inset-10 md:inset-12"></div>
    <div class="relative z-10 w-full max-w-4xl animate-fade-up">
        <p class="mb-4 inline-flex items-center gap-3 rounded-full border border-white/20 bg-black/20 px-4 py-2 text-[9px] font-semibold uppercase tracking-[.3em] text-jogja-300 backdrop-blur-sm sm:mb-6 sm:text-[10px]">
            <span aria-hidden="true">✦</span> Undangan Pernikahan <span aria-hidden="true">✦</span>
        </p>
        <h1 class="mx-auto max-w-4xl break-words font-display text-5xl font-medium leading-[.95] tracking-tight drop-shadow-lg sm:text-7xl md:text-8xl lg:text-9xl">
            {{ $wedding['bride'] }} <span class="text-jogja-300">&amp;</span><br class="sm:hidden"> {{ $wedding['groom'] }}
        </h1>
        <div class="mx-auto mt-5 flex w-44 items-center gap-3 sm:mt-7 sm:w-56"><span class="h-px flex-1 bg-gold/80"></span><span class="flex h-7 w-7 rotate-45 items-center justify-center border border-gold/80 bg-black/20"><span class="-rotate-45 font-display text-sm text-gold">✦</span></span><span class="h-px flex-1 bg-gold/80"></span></div>
        <p class="mx-auto mt-4 max-w-xl font-display text-lg italic text-white/95 drop-shadow sm:mt-5 sm:text-2xl md:text-3xl">Menyatukan dua hati, melestarikan sebuah tradisi.</p>
        <p class="mt-3 text-[10px] font-medium uppercase tracking-[.2em] text-white/85 drop-shadow sm:mt-4 sm:text-xs">{{ $wedding['date'] }} <span class="mx-1 text-gold">&middot;</span> {{ $wedding['city'] }}</p>
        <div id="countdown" data-target="{{ $wedding['date_iso'] }}"
            class="mx-auto mt-5 grid max-w-sm grid-cols-4 gap-2 text-center sm:mt-7 sm:gap-3">
            <div class="rounded-lg border border-white/15 bg-black/25 px-2 py-2.5 shadow-lg backdrop-blur-md sm:py-3"><strong data-unit="days" class="block font-display text-2xl leading-none text-jogja-300 sm:text-3xl">0</strong><span class="mt-1 block text-[8px] uppercase tracking-[.18em] text-white/75 sm:text-[9px]">Hari</span></div>
            <div class="rounded-lg border border-white/15 bg-black/25 px-2 py-2.5 shadow-lg backdrop-blur-md sm:py-3"><strong data-unit="hours" class="block font-display text-2xl leading-none text-jogja-300 sm:text-3xl">0</strong><span class="mt-1 block text-[8px] uppercase tracking-[.18em] text-white/75 sm:text-[9px]">Jam</span></div>
            <div class="rounded-lg border border-white/15 bg-black/25 px-2 py-2.5 shadow-lg backdrop-blur-md sm:py-3"><strong data-unit="minutes" class="block font-display text-2xl leading-none text-jogja-300 sm:text-3xl">0</strong><span class="mt-1 block text-[8px] uppercase tracking-[.18em] text-white/75 sm:text-[9px]">Menit</span></div>
            <div class="rounded-lg border border-white/15 bg-black/25 px-2 py-2.5 shadow-lg backdrop-blur-md sm:py-3"><strong data-unit="seconds" class="block font-display text-2xl leading-none text-jogja-300 sm:text-3xl">0</strong><span class="mt-1 block text-[8px] uppercase tracking-[.18em] text-white/75 sm:text-[9px]">Detik</span></div>
        </div>
        <a href="#event"
            class="mt-6 inline-flex min-h-11 items-center gap-3 rounded-full border border-jogja-300/80 bg-jogja-700/85 px-7 py-3 text-[10px] font-bold uppercase tracking-[.2em] shadow-lg shadow-black/20 transition duration-300 hover:-translate-y-0.5 hover:bg-jogja-500 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-jogja-900 sm:mt-8 sm:px-8 sm:text-xs">Lihat Undangan <span aria-hidden="true">↓</span></a>
    </div>
</section>
