<section
    class="relative flex min-h-screen items-end justify-center overflow-hidden bg-jogja-900 bg-cover bg-[center_42%] px-6 pb-14 pt-32 text-center text-white sm:items-center sm:pb-20 sm:pt-28"
    id="home"
    tabindex="-1"
    aria-labelledby="invitation-title">
    @if ($wedding['hero_image'])<img class="absolute inset-0 h-full w-full object-cover object-[center_42%]" src="{{ asset($wedding['hero_image']) }}" alt="Suasana pernikahan {{ $wedding['short_names'] }}" fetchpriority="high" decoding="async">@endif
    <div class="pointer-events-none absolute inset-0 bg-gradient-to-b from-black/10 via-black/20 to-deep/90" aria-hidden="true"></div>
    <div class="pointer-events-none absolute inset-0 bg-[url('../images/ornament-kawung.svg')] bg-[length:260px_260px] bg-right-top bg-no-repeat opacity-40 sm:bg-[length:360px_360px]" aria-hidden="true"></div>
    <div class="pointer-events-none absolute right-8 top-1/2 hidden -translate-y-1/2 font-display text-[18rem] leading-none text-white/10 xl:block" aria-hidden="true">&amp;</div>
    <div class="relative z-10 w-full max-w-5xl motion-safe:animate-fade-up sm:mt-12">
        <p class="mb-5 inline-flex items-center gap-3 text-[10px] font-semibold uppercase tracking-[.3em] text-jogja-300 sm:mb-7 sm:text-xs">
            <span aria-hidden="true">✦</span> Dengan penuh rasa syukur <span aria-hidden="true">✦</span>
        </p>
        <h1 id="invitation-title" class="mx-auto max-w-5xl break-words font-display text-5xl font-medium leading-[.92] tracking-tight drop-shadow-lg sm:text-7xl md:text-8xl lg:text-[8.5rem]">
            {{ $wedding['bride'] }} <span class="font-display italic text-jogja-300">&amp;</span><br class="sm:hidden"> <span class="sm:ml-14">{{ $wedding['groom'] }}</span>
        </h1>
        <div class="mx-auto mt-6 flex max-w-xl items-center gap-4 sm:mt-8"><span class="h-px flex-1 bg-gold/70"></span><span class="text-[10px] font-semibold uppercase tracking-[.28em] text-gold">Save the date</span><span class="h-px flex-1 bg-gold/70"></span></div>
        <p class="mx-auto mt-5 max-w-xl font-display text-xl italic text-white drop-shadow sm:mt-6 sm:text-2xl md:text-3xl">Menyatukan dua hati, melestarikan sebuah tradisi.</p>
        <p class="mx-auto mt-3 max-w-xl text-xs font-medium uppercase leading-6 tracking-[.2em] text-white/90 drop-shadow sm:text-sm">{{ $wedding['date'] }} <span class="mx-1 text-gold">&middot;</span> {{ $wedding['city'] }}</p>
        <div id="countdown" data-target="{{ $wedding['date_iso'] }}"
            class="mx-auto mt-7 grid max-w-sm grid-cols-4 gap-2 text-center sm:mt-9 sm:gap-3">
            <div class="border border-white/20 bg-deep/60 px-2 py-3 backdrop-blur-sm sm:py-4"><strong data-unit="days" class="block font-display text-3xl leading-none text-jogja-300 sm:text-4xl">0</strong><span class="mt-1 block text-[9px] uppercase tracking-[.18em] text-white/90">Hari</span></div>
            <div class="border border-white/20 bg-deep/60 px-2 py-3 backdrop-blur-sm sm:py-4"><strong data-unit="hours" class="block font-display text-3xl leading-none text-jogja-300 sm:text-4xl">0</strong><span class="mt-1 block text-[9px] uppercase tracking-[.18em] text-white/90">Jam</span></div>
            <div class="border border-white/20 bg-deep/60 px-2 py-3 backdrop-blur-sm sm:py-4"><strong data-unit="minutes" class="block font-display text-3xl leading-none text-jogja-300 sm:text-4xl">0</strong><span class="mt-1 block text-[9px] uppercase tracking-[.18em] text-white/90">Menit</span></div>
            <div class="border border-white/20 bg-deep/60 px-2 py-3 backdrop-blur-sm sm:py-4"><strong data-unit="seconds" class="block font-display text-3xl leading-none text-jogja-300 sm:text-4xl">0</strong><span class="mt-1 block text-[9px] uppercase tracking-[.18em] text-white/90">Detik</span></div>
        </div>
        <a href="#event"
            class="mt-8 inline-flex min-h-12 items-center gap-3 rounded-full border border-jogja-300 bg-jogja-700 px-7 py-3 text-xs font-bold uppercase tracking-[.2em] shadow-lg shadow-black/20 transition duration-300 hover:bg-jogja-500 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-jogja-900 sm:mt-10 sm:px-8">Lihat rangkaian acara <span aria-hidden="true">↓</span></a>
    </div>
</section>
