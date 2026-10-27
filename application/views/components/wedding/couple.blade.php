<section class="reveal relative overflow-hidden bg-[radial-gradient(circle_at_50%_50%,transparent_0_6px,rgba(168,122,50,.13)_7px_8px,transparent_9px)] bg-[length:44px_44px] px-6 py-24 opacity-0 translate-y-7 transition duration-700 sm:py-32" id="couple">
    <div class="pointer-events-none absolute inset-0 bg-gradient-to-b from-sand/60 via-ivory to-sand/60"></div>

    <div class="relative mx-auto max-w-5xl">
        <div class="mx-auto max-w-2xl text-center">
            <p class="mx-auto flex w-fit items-center gap-4 text-[11px] font-semibold uppercase tracking-[.38em] text-clay before:h-px before:w-11 before:bg-gradient-to-r before:from-transparent before:to-gold after:h-px after:w-11 after:bg-gradient-to-l after:from-transparent after:to-gold">Mempelai</p>
            <h2 class="mt-5 font-display text-4xl font-medium leading-tight text-forest sm:text-5xl">Yang berbahagia</h2>
            <span class="mx-auto mt-6 flex w-36 items-center gap-3"><span class="h-px flex-1 bg-gradient-to-r from-transparent to-gold"></span><span class="h-1.5 w-1.5 rotate-45 bg-gold"></span><span class="h-px flex-1 bg-gradient-to-l from-transparent to-gold"></span></span>
        </div>

        <div class="relative mt-14 grid gap-14 text-center sm:mt-16 sm:grid-cols-2 sm:gap-0">
            <article class="sm:pr-16">
                <div class="relative mx-auto h-72 w-60 transition duration-700 hover:-translate-y-2 hover:shadow-2xl sm:h-80 sm:w-64">
                    <div class="absolute -inset-3 border border-gold/45"></div>
                    <div class="h-full w-full overflow-hidden rounded-t-full bg-sand shadow-[0_30px_60px_-30px_rgba(22,36,29,.6)]">
                        @if ($wedding['bride_image'])<img class="h-full w-full object-cover" src="{{ asset($wedding['bride_image']) }}" alt="{{ $wedding['bride'] }}, mempelai wanita" loading="lazy" decoding="async">@else<div class="flex h-full items-center justify-center bg-gradient-to-br from-sand to-champagne p-6 text-center"><span class="font-display text-4xl text-forest">{{ $wedding['bride'] }}</span></div>@endif
                    </div>
                </div>
                <p class="mt-7 text-[10px] font-semibold uppercase tracking-[.35em] text-clay">Mempelai wanita</p>
                <h3 class="mt-2 font-display text-4xl text-forest">{{ $wedding['bride'] }}</h3>
                <span class="mx-auto mt-5 block h-px w-12 bg-forest/15"></span>
                <p class="mt-4 text-sm leading-7 text-ink/60">Putri pertama dari<br><span class="text-ink/80">{{ $wedding['bride_parents'] }}</span></p>
            </article>

            <article class="sm:pl-16">
                <div class="relative mx-auto h-72 w-60 transition duration-700 hover:-translate-y-2 hover:shadow-2xl sm:h-80 sm:w-64">
                    <div class="absolute -inset-3 border border-gold/45"></div>
                    <div class="h-full w-full overflow-hidden rounded-t-full bg-sand shadow-[0_30px_60px_-30px_rgba(22,36,29,.6)]">
                        @if ($wedding['groom_image'])<img class="h-full w-full object-cover" src="{{ asset($wedding['groom_image']) }}" alt="{{ $wedding['groom'] }}, mempelai pria" loading="lazy" decoding="async">@else<div class="flex h-full items-center justify-center bg-gradient-to-br from-sand to-champagne p-6 text-center"><span class="font-display text-4xl text-forest">{{ $wedding['groom'] }}</span></div>@endif
                    </div>
                </div>
                <p class="mt-7 text-[10px] font-semibold uppercase tracking-[.35em] text-clay">Mempelai pria</p>
                <h3 class="mt-2 font-display text-4xl text-forest">{{ $wedding['groom'] }}</h3>
                <span class="mx-auto mt-5 block h-px w-12 bg-forest/15"></span>
                <p class="mt-4 text-sm leading-7 text-ink/60">Putra kedua dari<br><span class="text-ink/80">{{ $wedding['groom_parents'] }}</span></p>
            </article>

            <div class="pointer-events-none absolute left-1/2 top-32 hidden -translate-x-1/2 sm:block" aria-hidden="true">
                <span class="flex h-14 w-14 items-center justify-center rounded-full border border-gold/50 bg-ivory font-display text-2xl italic text-gold">&amp;</span>
            </div>
        </div>
    </div>
</section>
