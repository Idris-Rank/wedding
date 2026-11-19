@layout('admin::layout')
@section('content')
<div class="mb-7 flex flex-col justify-between gap-5 sm:flex-row sm:items-end">
    <div><p class="text-[10px] font-bold uppercase tracking-[.24em] text-clay">Koleksi momen</p><h1 class="mt-2 font-display text-4xl leading-tight text-forest sm:text-5xl">Galeri foto</h1><p class="mt-2 max-w-xl text-sm leading-6 text-ink/60">Pilih foto yang bercerita tentang Anda dan susun tampilannya di undangan.</p></div>
    <a class="inline-flex min-h-11 items-center justify-center rounded-lg bg-forest px-5 py-3 text-xs font-bold uppercase tracking-wider text-white shadow-sm transition hover:bg-clay focus:outline-none focus:ring-2 focus:ring-gold focus:ring-offset-2" href="{{ url('admin/galleries/create') }}"><span class="mr-2 text-base" aria-hidden="true">＋</span>Tambah foto</a>
</div>
@include('admin::partials.alerts')
<section class="rounded-xl border border-forest/10 bg-white p-5 shadow-sm sm:p-6" aria-labelledby="gallery-title">
    <div class="mb-5 flex items-center justify-between gap-4 border-b border-forest/10 pb-4"><div><h2 id="gallery-title" class="font-display text-2xl text-forest">Foto undangan</h2><p class="mt-1 text-xs text-ink/55">{{ count($galleries) }} foto tersimpan</p></div><span class="rounded-full bg-cream px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-clay">Urutan tampil</span></div>
    @if (count($galleries))
        <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
            @foreach ($galleries as $gallery)
                <article class="group overflow-hidden rounded-xl border border-forest/10 bg-white transition hover:border-gold/60 hover:shadow-soft">
                    <div class="relative aspect-[4/3] overflow-hidden bg-cream"><img class="gallery-image h-full w-full object-cover transition duration-500 group-hover:scale-105" src="{{ asset($gallery->image_path) }}" alt="{{ $gallery->alt_text }}" loading="lazy"><span class="absolute left-3 top-3 rounded-full bg-white/95 px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-forest shadow-sm">#{{ $gallery->sort_order }}</span></div>
                    <div class="p-4"><h3 class="truncate font-display text-xl text-forest">{{ $gallery->caption ?: $gallery->alt_text }}</h3><p class="mt-1 line-clamp-2 min-h-9 text-xs leading-5 text-ink/55">Alt text: {{ $gallery->alt_text }}</p><div class="mt-4 flex items-center justify-between border-t border-forest/10 pt-3"><a class="inline-flex min-h-10 items-center rounded-lg px-3 text-xs font-semibold text-forest transition hover:bg-cream focus:outline-none focus:ring-2 focus:ring-gold" href="{{ url('admin/galleries/'.$gallery->id.'/edit') }}">Edit foto</a><form method="post" action="{{ url('admin/galleries/'.$gallery->id.'/delete') }}" onsubmit="return confirm('Hapus foto ini?');">{!! csrf_field() !!}<button class="inline-flex min-h-10 items-center rounded-lg px-3 text-xs font-semibold text-clay transition hover:bg-clay/5 focus:outline-none focus:ring-2 focus:ring-clay" type="submit">Hapus</button></form></div></div>
                </article>
            @endforeach
        </div>
    @else
        <div class="px-5 py-12 text-center"><span class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-cream font-display text-3xl text-gold" aria-hidden="true">◇</span><h3 class="mt-4 font-display text-2xl text-forest">Galeri masih kosong</h3><p class="mx-auto mt-1 max-w-sm text-sm leading-6 text-ink/55">Tambahkan beberapa foto untuk melengkapi cerita di undangan Anda.</p><a class="mt-5 inline-flex min-h-11 items-center rounded-lg bg-forest px-5 py-3 text-xs font-semibold text-white transition hover:bg-clay focus:outline-none focus:ring-2 focus:ring-gold focus:ring-offset-2" href="{{ url('admin/galleries/create') }}">Unggah foto pertama</a></div>
    @endif
</section>
<script>
    document.querySelectorAll('.gallery-image').forEach(function (image) {
        image.addEventListener('error', function () {
            image.alt = 'Preview tidak tersedia';
            image.classList.add('hidden');
        });
    });
</script>
@endsection
