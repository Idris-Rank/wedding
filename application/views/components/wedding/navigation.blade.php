<nav class="absolute inset-x-0 top-0 z-20 mx-auto flex max-w-6xl items-center justify-between gap-4 px-6 py-6 text-ivory sm:px-12 sm:py-7" aria-label="Navigasi utama">
    <a href="#home" class="font-display text-2xl font-semibold tracking-wide focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-gold"><span class="text-gold" aria-hidden="true">✦</span> {{ strtoupper(substr($wedding['bride'], 0, 1)) }}<span class="text-gold">&amp;</span>{{ strtoupper(substr($wedding['groom'], 0, 1)) }}</a>
    <div class="hidden gap-7 rounded-full border border-white/20 bg-deep/60 px-6 py-3 text-[10px] font-semibold uppercase tracking-[.2em] backdrop-blur-sm md:flex">
        <a href="#couple" class="transition hover:text-gold focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-gold">Mempelai</a>
        <a href="#event" class="transition hover:text-gold focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-gold">Acara</a>
        <a href="#story" class="transition hover:text-gold focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-gold">Cerita</a>
        <a href="#rsvp" class="transition hover:text-gold focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-gold">RSVP</a>
    </div>
    <a href="#rsvp" class="inline-flex min-h-10 items-center rounded-full border border-gold/60 bg-deep/60 px-4 text-[10px] font-semibold uppercase tracking-[.15em] backdrop-blur-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-gold md:hidden">Konfirmasi</a>
</nav>
