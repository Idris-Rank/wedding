@layout('admin::layout')
@section('content')
<div class="mb-7 flex flex-col justify-between gap-5 sm:flex-row sm:items-end">
    <div><p class="text-[10px] font-bold uppercase tracking-[.24em] text-clay">Program perayaan</p><h1 class="mt-2 font-display text-4xl leading-tight text-forest sm:text-5xl">Rangkaian acara</h1><p class="mt-2 max-w-xl text-sm leading-6 text-ink/60">Atur waktu dan lokasi setiap momen yang akan tercantum di undangan.</p></div>
    <a class="inline-flex min-h-11 items-center justify-center rounded-lg bg-forest px-5 py-3 text-xs font-bold uppercase tracking-wider text-white shadow-sm transition hover:bg-clay focus:outline-none focus:ring-2 focus:ring-gold focus:ring-offset-2" href="{{ url('admin/events/create') }}"><span class="mr-2 text-base" aria-hidden="true">＋</span>Tambah acara</a>
</div>
@include('admin::partials.alerts')
<section class="overflow-hidden rounded-xl border border-forest/10 bg-white shadow-sm" aria-labelledby="events-list-title">
    <div class="flex items-center justify-between gap-4 border-b border-forest/10 px-5 py-4 sm:px-6"><div><h2 id="events-list-title" class="font-display text-2xl text-forest">Agenda wedding</h2><p class="mt-1 text-xs text-ink/55">{{ count($events) }} acara terdaftar</p></div><span class="rounded-full bg-cream px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-clay">Urutan acara</span></div>
    @if (count($events))
        <div class="divide-y divide-forest/10">
            @foreach ($events as $event)
                <article class="grid gap-4 px-5 py-5 transition hover:bg-cream/35 sm:grid-cols-[minmax(0,1fr)_auto] sm:items-center sm:px-6">
                    <div class="flex min-w-0 gap-4"><div class="flex h-12 w-12 shrink-0 flex-col items-center justify-center rounded-lg bg-forest/5 text-forest"><span class="text-[9px] font-bold uppercase tracking-wider text-clay">{{ $event->event_type }}</span><span class="mt-0.5 text-base leading-none" aria-hidden="true">◇</span></div><div class="min-w-0"><h3 class="truncate font-display text-2xl leading-tight text-forest">{{ $event->title }}</h3><p class="mt-1 text-sm font-medium text-ink/75">{{ $event->venue }}</p><p class="mt-1 truncate text-xs text-ink/50">{{ $event->address ?: 'Alamat belum diisi' }}</p><div class="mt-3 flex flex-wrap gap-x-4 gap-y-1 text-xs text-ink/60"><span><span class="mr-1 text-gold" aria-hidden="true">◷</span>{{ $event->event_date }}</span><span>{{ $event->start_time }}{{ $event->end_time ? ' - '.$event->end_time : '' }}</span></div></div></div>
                    <div class="flex items-center justify-end gap-2 border-t border-forest/10 pt-3 sm:border-0 sm:pt-0"><a class="inline-flex min-h-10 items-center rounded-lg border border-forest/15 px-4 py-2 text-xs font-semibold text-forest transition hover:border-gold hover:bg-cream focus:outline-none focus:ring-2 focus:ring-gold" href="{{ url('admin/events/'.$event->id.'/edit') }}">Edit acara</a><form method="post" action="{{ url('admin/events/'.$event->id.'/delete') }}" onsubmit="return confirm('Hapus acara ini?');">{!! csrf_field() !!}<button class="inline-flex min-h-10 items-center rounded-lg px-4 py-2 text-xs font-semibold text-clay transition hover:bg-clay/5 focus:outline-none focus:ring-2 focus:ring-clay" type="submit">Hapus</button></form></div>
                </article>
            @endforeach
        </div>
    @else
        <div class="px-5 py-14 text-center sm:px-8"><span class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-cream font-display text-3xl text-gold" aria-hidden="true">◇</span><h3 class="mt-4 font-display text-2xl text-forest">Belum ada acara</h3><p class="mx-auto mt-1 max-w-sm text-sm leading-6 text-ink/55">Tambahkan akad, resepsi, atau agenda lain agar tamu tahu susunan hari istimewa Anda.</p><a class="mt-5 inline-flex min-h-11 items-center rounded-lg bg-forest px-5 py-3 text-xs font-semibold text-white transition hover:bg-clay focus:outline-none focus:ring-2 focus:ring-gold focus:ring-offset-2" href="{{ url('admin/events/create') }}">Tambah acara pertama</a></div>
    @endif
</section>
@endsection
