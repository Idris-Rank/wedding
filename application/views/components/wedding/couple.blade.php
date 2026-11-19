<section class="reveal relative overflow-hidden bg-ivory px-6 py-20 opacity-0 translate-y-7 transition duration-700 sm:py-28" id="couple">
    <div class="pointer-events-none absolute inset-0 bg-gradient-to-b from-sand/60 via-ivory to-sand/60"></div>

    <div class="relative mx-auto max-w-5xl">
        <div class="grid items-end gap-4 border-b border-forest/15 pb-6 sm:grid-cols-[1fr_auto] sm:pb-8"><div><p class="text-[10px] font-bold uppercase tracking-[.32em] text-clay">Dua keluarga, satu cerita</p><h2 class="mt-3 font-display text-4xl font-medium leading-none text-forest sm:text-6xl">Tentang kami<span class="text-gold">.</span></h2></div><p class="max-w-xs text-sm leading-6 text-ink/70 sm:text-right">Dengan restu keluarga, kami melangkah menuju kehidupan yang baru.</p></div>

        <div class="relative mt-10 grid gap-12 sm:mt-12 sm:grid-cols-2 sm:gap-8">
            <article class="grid items-center gap-6 sm:grid-cols-[.85fr_1fr] sm:gap-5">
                <div class="relative mx-auto w-full max-w-[17rem] sm:mx-0 sm:max-w-none">
                    <div class="absolute -bottom-3 -left-3 h-3/4 w-3/4 border-b border-l border-gold/70"></div>
                    <div class="relative aspect-[4/5] overflow-hidden bg-sand shadow-soft">
                        @if ($wedding['bride_image'])<img class="h-full w-full object-cover object-center" src="{{ asset($wedding['bride_image']) }}" alt="{{ $wedding['bride'] }}, mempelai wanita" loading="lazy" decoding="async">@else<div class="flex h-full items-center justify-center bg-gradient-to-br from-sand to-champagne p-6 text-center"><div><span class="block font-display text-5xl italic text-forest">{{ strtoupper(substr($wedding['bride'], 0, 1)) }}</span><span class="mt-3 block text-xs text-forest/70">Foto mempelai wanita</span></div></div>@endif
                    </div>
                </div>
                <div class="text-center sm:text-left"><p class="text-[10px] font-bold uppercase tracking-[.2em] text-clay">Mempelai wanita <span class="ml-2 text-gold">01</span></p><h3 class="mt-3 font-display text-3xl leading-tight text-forest sm:text-4xl">{{ $wedding['bride'] }}</h3><span class="mx-auto mt-4 block h-px w-12 bg-gold sm:mx-0"></span><p class="mt-4 text-xs leading-6 text-ink/70">Putri dari<br><span class="font-medium text-ink">{{ $wedding['bride_parents'] }}</span></p></div>
            </article>

            <article class="grid items-center gap-6 sm:grid-cols-[.85fr_1fr] sm:gap-5">
                <div class="relative mx-auto w-full max-w-[17rem] sm:mx-0 sm:max-w-none">
                    <div class="absolute -bottom-3 -right-3 h-3/4 w-3/4 border-b border-r border-gold/70"></div>
                    <div class="relative aspect-[4/5] overflow-hidden bg-sand shadow-soft">
                        @if ($wedding['groom_image'])<img class="h-full w-full object-cover object-center" src="{{ asset($wedding['groom_image']) }}" alt="{{ $wedding['groom'] }}, mempelai pria" loading="lazy" decoding="async">@else<div class="flex h-full items-center justify-center bg-gradient-to-br from-sand to-champagne p-6 text-center"><div><span class="block font-display text-5xl italic text-forest">{{ strtoupper(substr($wedding['groom'], 0, 1)) }}</span><span class="mt-3 block text-xs text-forest/70">Foto mempelai pria</span></div></div>@endif
                    </div>
                </div>
                <div class="text-center sm:text-left"><p class="text-[10px] font-bold uppercase tracking-[.2em] text-clay">Mempelai pria <span class="ml-2 text-gold">02</span></p><h3 class="mt-3 font-display text-3xl leading-tight text-forest sm:text-4xl">{{ $wedding['groom'] }}</h3><span class="mx-auto mt-4 block h-px w-12 bg-gold sm:mx-0"></span><p class="mt-4 text-xs leading-6 text-ink/70">Putra dari<br><span class="font-medium text-ink">{{ $wedding['groom_parents'] }}</span></p></div>
            </article>
        </div>
    </div>
</section>
