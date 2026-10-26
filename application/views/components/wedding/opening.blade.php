<div id="opening" class="fixed inset-0 z-50 flex items-center justify-center bg-deep px-6 text-center text-ivory transition duration-700">
    <div class="max-w-md animate-fade-up">
        <p class="text-xs font-bold tracking-[.45em] text-gold">✦ &nbsp; ✦ &nbsp; ✦</p>
        <p class="mt-7 text-xs font-semibold uppercase tracking-[.3em] text-gold">Undangan Pernikahan</p>
        <h1 class="mt-4 font-display text-7xl leading-none">{{ $wedding['bride'] }} <span class="text-gold">&amp;</span> {{ $wedding['groom'] }}</h1>
        <p class="mt-6 text-sm text-white/70">Kepada Yth. Bapak/Ibu/Saudara/i</p>
        <p class="mt-1 font-display text-2xl italic text-white/90">Tamu Undangan</p>
        <button id="open-invitation" type="button" class="mt-9 rounded-full bg-gold px-8 py-3 text-xs font-bold uppercase tracking-[.2em] text-deep transition hover:bg-white">Buka Undangan</button>
        <p class="mt-5 text-[11px] text-white/45">Mohon maaf apabila terdapat kesalahan penulisan nama atau gelar.</p>
    </div>
</div>
<button id="music-toggle" type="button" aria-label="Putar musik" class="fixed bottom-5 right-5 z-[60] hidden items-center gap-2 rounded-full bg-deep px-4 py-3 text-xs font-bold text-white shadow-soft transition hover:bg-clay">
    <span class="flex h-4 items-end gap-1"><span data-music-bar class="h-2 w-1 rounded bg-gold"></span><span data-music-bar class="h-3 w-1 rounded bg-gold"></span><span data-music-bar class="h-1.5 w-1 rounded bg-gold"></span></span>
    <span id="music-label">Putar musik</span>
</button>
