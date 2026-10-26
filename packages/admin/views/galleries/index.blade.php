@layout('admin::layout')
@section('content')<div class="mb-8"><p class="text-xs font-semibold uppercase tracking-[.3em] text-clay">Konten</p><h1 class="mt-2 font-display text-5xl text-forest">Galeri Foto</h1></div>@include('admin::partials.alerts')<div class="max-w-3xl">@include('admin::partials.gallery')</div>@endsection
