<section class="reveal relative overflow-hidden bg-deep px-6 py-20 text-ivory opacity-0 translate-y-7 transition duration-700 sm:py-28" id="event">
    <div class="pointer-events-none absolute inset-0 bg-[url('../images/ornament-kawung.svg')] bg-[length:220px_220px] bg-center opacity-[.08]" aria-hidden="true"></div>
    <div class="relative mx-auto max-w-5xl">
        <div class="mx-auto max-w-2xl text-center">
            <p class="mx-auto flex w-fit items-center gap-4 text-[11px] font-semibold uppercase tracking-[.38em] text-gold before:h-px before:w-11 before:bg-gradient-to-r before:from-transparent before:to-gold after:h-px after:w-11 after:bg-gradient-to-l after:from-transparent after:to-gold">Catat tanggalnya</p>
            <h2 class="mt-5 font-display text-4xl font-medium leading-tight text-ivory sm:text-5xl">Rangkaian acara</h2>
            <span class="mx-auto mt-6 flex w-36 items-center gap-3"><span class="h-px flex-1 bg-gradient-to-r from-transparent to-gold"></span><span class="h-1.5 w-1.5 rotate-45 bg-gold"></span><span class="h-px flex-1 bg-gradient-to-l from-transparent to-gold"></span></span>
            <p class="mx-auto mt-6 max-w-lg text-[15px] leading-7 text-ivory/80">Dengan penuh sukacita, kami menantikan kehadiran Panjenengan di hari istimewa kami.</p>
        </div>

        <div class="relative mt-14 grid gap-5 sm:grid-cols-2 sm:gap-8">
            <div class="pointer-events-none absolute left-1/2 top-0 hidden h-full w-px -translate-x-1/2 bg-gold/30 sm:block" aria-hidden="true"></div>
            @foreach ($wedding['events'] as $event)
                <article class="relative border-y border-gold/30 px-5 py-7 sm:border-y-0 sm:px-8 sm:py-5 {{ $loop->odd ? 'sm:text-right' : 'sm:text-left' }}">
                    <span class="absolute top-8 hidden h-2.5 w-2.5 rounded-full border-2 border-gold bg-deep sm:block {{ $loop->odd ? '-right-[5px]' : '-left-[5px]' }}" aria-hidden="true"></span>
                    <p class="text-[10px] font-bold uppercase tracking-[.25em] text-gold">Bagian {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }} <span class="mx-2 text-white/40">/</span> {{ $event['day'] }}</p>
                    <h3 class="mt-3 font-display text-4xl leading-tight text-ivory sm:text-5xl">{{ $event['title'] }}</h3>
                    <p class="mt-4 text-sm leading-6 tracking-wide text-ivory/90">{{ $event['date'] }}<br>{{ $event['time'] }}</p>
                    <p class="mt-5 text-sm font-medium leading-6 text-ivory">{{ $event['venue'] }}</p>
                    <p class="text-xs leading-5 text-ivory/70">{{ $event['address'] }}</p>
                    @if ($event['map'] && preg_match('/^https?:\\/\\//i', $event['map']))<a class="mt-7 inline-flex min-h-11 items-center justify-center rounded-full bg-gold px-6 py-2 text-xs font-semibold uppercase tracking-[.18em] text-deep transition hover:bg-ivory focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-gold" href="{{ $event['map'] }}" target="_blank" rel="noopener noreferrer">Lihat lokasi <span class="ml-2" aria-hidden="true">↗</span></a>@endif
                </article>
            @endforeach
        </div>
    </div>
</section>
