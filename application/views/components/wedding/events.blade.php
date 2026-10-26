<section class="reveal bg-deep px-6 py-24 text-ivory opacity-0 translate-y-7 transition duration-700 sm:py-32" id="event">
    <div class="mx-auto max-w-5xl">
        <div class="mx-auto max-w-2xl text-center">
            <p class="mx-auto flex w-fit items-center gap-4 text-[11px] font-semibold uppercase tracking-[.38em] text-gold before:h-px before:w-11 before:bg-gradient-to-r before:from-transparent before:to-gold after:h-px after:w-11 after:bg-gradient-to-l after:from-transparent after:to-gold">Catat tanggalnya</p>
            <h2 class="mt-5 font-display text-4xl font-medium leading-tight text-ivory sm:text-5xl">Rangkaian acara</h2>
            <span class="mx-auto mt-6 flex w-36 items-center gap-3"><span class="h-px flex-1 bg-gradient-to-r from-transparent to-gold"></span><span class="h-1.5 w-1.5 rotate-45 bg-gold"></span><span class="h-px flex-1 bg-gradient-to-l from-transparent to-gold"></span></span>
            <p class="mx-auto mt-6 max-w-lg text-[15px] leading-7 text-ivory/65">Dengan penuh sukacita, kami menantikan kehadiran Panjenengan di hari istimewa kami.</p>
        </div>

        <div class="mt-14 grid gap-6 sm:grid-cols-2 sm:gap-8">
            @foreach ($wedding['events'] as $event)
                <article class="relative border border-white/15 bg-white/5 px-7 py-10 text-center text-ivory shadow-soft backdrop-blur transition duration-500 before:absolute before:inset-x-0 before:top-0 before:h-0.5 before:bg-gradient-to-r before:from-transparent before:via-gold before:to-transparent hover:-translate-y-1.5 hover:border-gold/60 hover:shadow-2xl sm:px-10 sm:py-12">
                    <span class="absolute right-6 top-5 font-display text-lg text-gold/70" aria-hidden="true">0{{ $loop->iteration }}</span>
                    <span class="inline-flex border border-gold/45 bg-gold/10 px-4 py-1.5 text-[10px] font-semibold uppercase tracking-[.3em] text-clay">{{ $event['day'] }}</span>
                    <h3 class="mt-6 font-display text-4xl text-ivory">{{ $event['title'] }}</h3>
                    <p class="mt-4 text-sm tracking-wide text-ivory/60">{{ $event['date'] }} &middot; {{ $event['time'] }}</p>
                    <span class="mx-auto mt-6 block h-px w-14 bg-white/15"></span>
                    <p class="mt-6 flex items-start justify-center gap-2 text-sm leading-6 text-ivory/70">
                        <svg class="mt-0.5 h-4 w-4 shrink-0 text-gold" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/></svg>
                        <span>{{ $event['venue'] }}<br>{{ $event['address'] }}</span>
                    </p>
                    <a class="mt-7 inline-flex min-h-10 items-center justify-center bg-gradient-to-br from-champagne via-gold to-jogja-500 px-5 py-2 text-[10px] font-semibold uppercase tracking-[.18em] text-deep transition duration-300 hover:-translate-y-0.5 hover:shadow-lg" href="{{ $event['map'] }}" target="_blank" rel="noopener">Lihat lokasi</a>
                </article>
            @endforeach
        </div>
    </div>
</section>
