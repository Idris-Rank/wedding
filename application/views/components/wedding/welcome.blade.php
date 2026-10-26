<section class="reveal relative overflow-hidden px-6 py-24 text-center opacity-0 translate-y-7 transition duration-700 sm:py-32" id="welcome">
    <div class="pointer-events-none absolute inset-0 bg-[url('{{ asset('images/ornament-kawung.svg') }}')] bg-[length:280px_280px] bg-center opacity-[.06]"></div>
    <div class="pointer-events-none absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-gold/40 to-transparent"></div>

    <div class="relative mx-auto max-w-3xl">
        <p class="text-[11px] font-semibold uppercase tracking-[.38em] text-clay">Assalamu'alaikum warahmatullahi wabarakatuh</p>
        <span class="mx-auto mt-7 flex w-36 items-center gap-3"><span class="h-px flex-1 bg-gradient-to-r from-transparent to-gold"></span><span class="h-1.5 w-1.5 rotate-45 bg-gold"></span><span class="h-px flex-1 bg-gradient-to-l from-transparent to-gold"></span></span>

        <blockquote class="mt-9 font-display text-3xl italic leading-relaxed text-forest sm:text-[2.5rem] sm:leading-[1.4]">
            <span class="text-gold">&ldquo;</span>{{ $wedding['quote'] }}<span class="text-gold">&rdquo;</span>
        </blockquote>
        <p class="mt-6 text-xs font-semibold uppercase tracking-[.3em] text-clay">{{ $wedding['quote_source'] }}</p>

        <span class="mx-auto mt-9 block h-px w-24 bg-forest/15"></span>
        <p class="mx-auto mt-7 max-w-xl text-[15px] leading-8 text-ink/65">Dengan penuh rasa syukur, kami mengundang Bapak/Ibu/Saudara/i untuk hadir dan memberikan doa restu di hari bahagia kami.</p>
    </div>
</section>
