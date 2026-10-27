<section class="reveal px-6 py-24 opacity-0 translate-y-7 transition duration-700 sm:py-32" id="story">
    <div class="mx-auto grid max-w-5xl items-center gap-12 sm:grid-cols-2">
        <div class="overflow-hidden rounded-lg bg-gradient-to-br from-sand to-champagne shadow-soft transition duration-700 hover:-translate-y-2 hover:shadow-2xl">@if ($wedding['story']['image'])<img src="{{ asset($wedding['story']['image']) }}" alt="Cerita {{ $wedding['short_names'] }}" class="h-[420px] w-full object-cover" loading="lazy" decoding="async">@else<div class="flex h-[420px] items-center justify-center p-8 text-center"><span class="font-display text-4xl text-forest">{{ $wedding['short_names'] }}</span></div>@endif</div>
        <div><p class="text-xs font-bold uppercase tracking-[.3em] text-clay">{{ $wedding['story']['eyebrow'] }}</p><h2 class="mt-3 font-display text-5xl font-semibold text-forest">{{ $wedding['story']['title'] }}</h2><p class="mt-6 text-sm leading-8 text-ink/70">{{ $wedding['story']['body'] }}</p><p class="mt-5 font-display text-2xl italic text-clay">“{{ $wedding['story']['quote'] }}”</p></div>
    </div>
</section>
