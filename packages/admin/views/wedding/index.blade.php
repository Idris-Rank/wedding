@layout('admin::layout')
@section('content')
<div class="mb-7 flex flex-col justify-between gap-5 sm:flex-row sm:items-end">
    <div>
        <p class="text-[10px] font-bold uppercase tracking-[.24em] text-clay">Pengaturan undangan</p>
        <h1 class="mt-2 font-display text-4xl leading-tight text-forest sm:text-5xl">Informasi wedding</h1>
        <p class="mt-2 max-w-xl text-sm leading-6 text-ink/60">Lengkapi detail pasangan, keluarga, dan media yang akan tampil di undangan Anda.</p>
    </div>
    <a class="inline-flex min-h-11 items-center justify-center rounded-lg border border-forest/15 bg-white px-4 py-2 text-xs font-semibold text-forest transition hover:border-gold hover:bg-cream focus:outline-none focus:ring-2 focus:ring-gold" href="{{ url('/') }}">Pratinjau undangan <span class="ml-2" aria-hidden="true">↗</span></a>
</div>
@include('admin::partials.alerts')
@include('admin::partials.wedding')
@endsection
