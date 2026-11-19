<div id="opening" class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto bg-deep px-5 py-8 text-center text-ivory transition duration-700 motion-reduce:transition-none">
    <div class="pointer-events-none absolute inset-4 border border-gold/30 sm:inset-7"></div>
    <div class="pointer-events-none absolute inset-7 border border-white/10 sm:inset-10"></div>
    <div class="relative mx-auto w-full max-w-lg py-9 motion-safe:animate-fade-up">
        <p class="text-xs font-bold tracking-[.45em] text-gold" aria-hidden="true">✦ &nbsp; ✦ &nbsp; ✦</p>
        <p class="mt-7 text-[10px] font-semibold uppercase tracking-[.3em] text-gold">Undangan Pernikahan</p>
        <h1 class="mt-5 break-words font-display text-5xl leading-none sm:text-7xl">{{ $wedding['bride'] }} <span class="text-gold">&amp;</span> {{ $wedding['groom'] }}</h1>
        <div class="mx-auto mt-7 h-px w-16 bg-gold/50"></div>
        <p class="mt-7 text-sm text-white/75">Kepada Yth. Bapak/Ibu/Saudara/i</p>
        <p class="mt-1 font-display text-2xl italic text-white">Tamu Undangan</p>
        <button id="open-invitation" type="button" class="mt-9 min-h-12 rounded-full bg-gold px-8 py-3 text-xs font-bold uppercase tracking-[.2em] text-deep transition hover:bg-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-gold">Buka Undangan <span class="ml-2" aria-hidden="true">→</span></button>
        <p class="mx-auto mt-6 max-w-xs text-xs leading-5 text-white/70">Mohon maaf apabila terdapat kesalahan penulisan nama atau gelar.</p>
    </div>
</div>
<button id="music-toggle" type="button" aria-label="Putar musik" aria-pressed="false" class="fixed bottom-5 right-5 z-[60] hidden min-h-11 items-center gap-2 rounded-full bg-deep px-4 py-3 text-xs font-bold text-white shadow-soft transition hover:bg-clay focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-gold">
    <span class="flex h-4 items-end gap-1"><span data-music-bar class="h-2 w-1 rounded bg-gold"></span><span data-music-bar class="h-3 w-1 rounded bg-gold"></span><span data-music-bar class="h-1.5 w-1 rounded bg-gold"></span></span>
    <span id="music-label">Putar musik</span>
</button>
