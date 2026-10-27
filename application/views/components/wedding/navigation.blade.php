<nav class="absolute inset-x-0 top-0 z-20 mx-auto flex max-w-6xl items-center justify-between px-7 py-7 text-ivory sm:px-12" aria-label="Navigasi utama">
    <a href="#home" class="font-display text-2xl font-semibold tracking-wide">{{ strtoupper(substr($wedding['bride'], 0, 1)) }}<span class="text-gold">&amp;</span>{{ strtoupper(substr($wedding['groom'], 0, 1)) }}</a>
    <div class="hidden gap-7 text-xs font-semibold uppercase tracking-[.18em] md:flex">
        <a href="#couple" class="transition hover:text-gold">Mempelai</a>
        <a href="#event" class="transition hover:text-gold">Acara</a>
        <a href="#story" class="transition hover:text-gold">Cerita</a>
        <a href="#rsvp" class="transition hover:text-gold">RSVP</a>
    </div>
</nav>
