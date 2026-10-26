<section class="reveal px-6 py-24 opacity-0 translate-y-7 transition duration-700 sm:py-32" id="gallery">
    <div class="mx-auto max-w-5xl">
        <div class="mx-auto max-w-2xl text-center">
            <p class="mx-auto flex w-fit items-center gap-4 text-[11px] font-semibold uppercase tracking-[.38em] text-clay before:h-px before:w-11 before:bg-gradient-to-r before:from-transparent before:to-gold after:h-px after:w-11 after:bg-gradient-to-l after:from-transparent after:to-gold">Our moments</p>
            <h2 class="mt-5 font-display text-4xl font-medium leading-tight text-forest sm:text-5xl">Cerita kami</h2>
            <span class="mx-auto mt-6 flex w-36 items-center gap-3"><span class="h-px flex-1 bg-gradient-to-r from-transparent to-gold"></span><span class="h-1.5 w-1.5 rotate-45 bg-gold"></span><span class="h-px flex-1 bg-gradient-to-l from-transparent to-gold"></span></span>
        </div>

        <div class="mt-14 grid grid-cols-2 gap-3 sm:grid-cols-4 sm:grid-rows-[15rem_15rem] sm:gap-4">
            @foreach ($wedding['galleries'] as $gallery)
                <figure class="group relative {{ $loop->first ? 'col-span-2 row-span-2 h-56 sm:h-full' : 'h-40 sm:h-full' }} overflow-hidden border border-gold/30 bg-sand">
                    <img class="h-full w-full object-cover transition duration-700 group-hover:scale-105" src="{{ asset($gallery->image_path) }}" alt="{{ $gallery->alt_text }}" loading="lazy" decoding="async">
                    <figcaption class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-deep/85 via-deep/40 to-transparent p-4 text-left text-[10px] uppercase tracking-[.25em] text-ivory opacity-0 transition duration-500 group-hover:opacity-100">{{ $gallery->caption }}</figcaption>
                </figure>
            @endforeach
        </div>
    </div>
</section>
