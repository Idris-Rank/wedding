<form id="wedding" class="mx-auto max-w-5xl" method="post" action="{{ url('admin/wedding') }}" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="space-y-5">
        <section class="rounded-xl border border-forest/10 bg-white p-5 shadow-sm sm:p-7" aria-labelledby="wedding-identity-title">
            <div class="flex items-start gap-4 border-b border-forest/10 pb-5"><span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-forest text-xs font-bold text-white">01</span><div><h2 id="wedding-identity-title" class="font-display text-2xl text-forest">Identitas pasangan</h2><p class="mt-1 text-sm leading-5 text-ink/60">Nama yang ditampilkan pada halaman undangan.</p></div></div>
            <div class="mt-5 grid gap-5 sm:grid-cols-2">
                @foreach ([['groom_name', 'Nama mempelai pria'], ['bride_name', 'Nama mempelai wanita']] as $field)
                    <div><label class="text-xs font-semibold text-forest" for="{{ $field[0] }}">{{ $field[1] }} <span class="text-clay" aria-hidden="true">*</span></label><input class="mt-2 block min-h-12 w-full rounded-lg border {{ $errors->has($field[0]) ? 'border-clay bg-clay/5' : 'border-forest/15 bg-cream/50' }} px-4 py-3 text-sm text-ink outline-none transition placeholder:text-ink/35 hover:border-forest/30 focus:border-gold focus:bg-white focus:ring-2 focus:ring-gold/20" id="{{ $field[0] }}" name="{{ $field[0] }}" value="{{ Input::old($field[0], $wedding->{$field[0]}) }}" autocomplete="name" required aria-invalid="{{ $errors->has($field[0]) ? 'true' : 'false' }}">@if ($errors->has($field[0]))<p class="mt-1.5 text-xs font-medium text-clay" role="alert">{{ $errors->first($field[0]) }}</p>@endif</div>
                @endforeach
            </div>
        </section>

        <section class="rounded-xl border border-forest/10 bg-white p-5 shadow-sm sm:p-7" aria-labelledby="wedding-family-title">
            <div class="flex items-start gap-4 border-b border-forest/10 pb-5"><span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-forest text-xs font-bold text-white">02</span><div><h2 id="wedding-family-title" class="font-display text-2xl text-forest">Informasi keluarga</h2><p class="mt-1 text-sm leading-5 text-ink/60">Nama orang tua yang ditampilkan pada bagian mempelai.</p></div></div>
            <div class="mt-5 grid gap-5 sm:grid-cols-2">
                @foreach ([['groom_parents', 'Orang tua mempelai pria'], ['bride_parents', 'Orang tua mempelai wanita']] as $field)
                    <div><label class="text-xs font-semibold text-forest" for="{{ $field[0] }}">{{ $field[1] }}</label><input class="mt-2 block min-h-12 w-full rounded-lg border border-forest/15 bg-cream/50 px-4 py-3 text-sm text-ink outline-none transition placeholder:text-ink/35 hover:border-forest/30 focus:border-gold focus:bg-white focus:ring-2 focus:ring-gold/20" id="{{ $field[0] }}" name="{{ $field[0] }}" value="{{ Input::old($field[0], $wedding->{$field[0]}) }}"></div>
                @endforeach
            </div>
        </section>

        <section class="rounded-xl border border-forest/10 bg-white p-5 shadow-sm sm:p-7" aria-labelledby="wedding-portraits-title">
            <div class="flex items-start gap-4 border-b border-forest/10 pb-5"><span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-forest text-xs font-bold text-white">03</span><div><h2 id="wedding-portraits-title" class="font-display text-2xl text-forest">Foto mempelai</h2><p class="mt-1 text-sm leading-5 text-ink/60">Gunakan JPG, PNG, atau WEBP, maksimal 2 MB per file.</p></div></div>
            <div class="mt-5 grid gap-5 sm:grid-cols-2">
                @foreach ([['bride_image', 'Foto mempelai wanita', 'bride-preview', $wedding->bride_image], ['groom_image', 'Foto mempelai pria', 'groom-preview', $wedding->groom_image]] as $field)
                    <div class="rounded-lg border border-forest/10 bg-cream/35 p-4"><label class="text-xs font-semibold text-forest" for="{{ $field[0] }}">{{ $field[1] }}</label><div class="mt-3 flex flex-col gap-4 sm:flex-row sm:items-start"><div class="flex h-36 w-32 shrink-0 items-center justify-center overflow-hidden rounded-lg border border-dashed border-forest/20 bg-white"><img id="{{ $field[2] }}" class="h-full w-full {{ $field[3] ? '' : 'hidden' }} object-cover" src="{{ $field[3] ? asset($field[3]) : '' }}" alt="Preview {{ $field[1] }}"><span class="px-2 text-center text-xs text-ink/45 {{ $field[3] ? 'hidden' : '' }}" aria-hidden="true">Preview foto</span></div><div class="min-w-0 flex-1"><input class="block w-full text-xs text-ink/65 file:mr-3 file:min-h-10 file:rounded-lg file:border-0 file:bg-forest file:px-3 file:py-2 file:text-xs file:font-semibold file:text-white hover:file:bg-clay focus:outline-none focus:ring-2 focus:ring-gold" id="{{ $field[0] }}" name="{{ $field[0] }}" type="file" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp" aria-describedby="{{ $field[0] }}-hint"><p id="{{ $field[0] }}-hint" class="mt-2 text-xs leading-5 text-ink/50">Pilih foto dari perangkat Anda.</p>@if ($field[3])<button class="mt-3 min-h-10 rounded-lg border border-clay/25 px-3 py-2 text-xs font-semibold text-clay transition hover:bg-clay/5 focus:outline-none focus:ring-2 focus:ring-clay" type="button" onclick="return deleteWeddingMedia('{{ $field[0] }}');">Hapus foto</button>@endif</div></div></div>
                @endforeach
            </div>
        </section>

        <section class="rounded-xl border border-forest/10 bg-white p-5 shadow-sm sm:p-7" aria-labelledby="wedding-media-title">
            <div class="flex items-start gap-4 border-b border-forest/10 pb-5"><span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-forest text-xs font-bold text-white">04</span><div><h2 id="wedding-media-title" class="font-display text-2xl text-forest">Media undangan</h2><p class="mt-1 text-sm leading-5 text-ink/60">Pilih gambar dan musik (maksimal 2 MB per file) untuk pengalaman undangan.</p></div></div>
            <div class="mt-5 grid gap-5 lg:grid-cols-2">
                <div class="rounded-lg border border-forest/10 bg-cream/35 p-4"><label class="text-xs font-semibold text-forest" for="hero_image">Gambar utama</label><p class="mt-1 text-xs text-ink/50">JPG, PNG, atau WEBP, maksimal 2 MB.</p><div class="mt-3 overflow-hidden rounded-lg border border-dashed border-forest/20 bg-white"><img id="hero-preview" class="aspect-video w-full {{ $wedding->hero_image ? '' : 'hidden' }} object-cover object-[center_42%]" src="{{ $wedding->hero_image ? asset($wedding->hero_image) : '' }}" alt="Preview gambar utama"><div id="hero-empty" class="flex aspect-video items-center justify-center text-xs text-ink/45 {{ $wedding->hero_image ? 'hidden' : '' }}">Preview gambar utama</div></div><input class="mt-4 block w-full text-xs text-ink/65 file:mr-3 file:min-h-10 file:rounded-lg file:border-0 file:bg-forest file:px-3 file:py-2 file:text-xs file:font-semibold file:text-white hover:file:bg-clay focus:outline-none focus:ring-2 focus:ring-gold" id="hero_image" name="hero_image" type="file" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">@if ($wedding->hero_image)<button class="mt-3 min-h-10 rounded-lg border border-clay/25 px-3 py-2 text-xs font-semibold text-clay transition hover:bg-clay/5 focus:outline-none focus:ring-2 focus:ring-clay" type="button" onclick="return deleteWeddingMedia('hero_image');">Hapus gambar</button>@endif</div>
                <div class="rounded-lg border border-forest/10 bg-cream/35 p-4"><label class="text-xs font-semibold text-forest" for="audio_path">Musik latar</label><p class="mt-1 text-xs text-ink/50">MP3, WAV, atau OGG, maksimal 10 MB.</p><div class="mt-3 flex min-h-32 flex-col justify-center rounded-lg border border-dashed border-forest/20 bg-white p-4">@if ($wedding->audio_path)<p class="mb-3 text-xs font-semibold text-forest">Musik saat ini</p><audio class="w-full" controls preload="metadata" src="{{ asset($wedding->audio_path) }}">Browser Anda tidak mendukung pemutaran audio.</audio>@else<p class="text-center text-xs text-ink/45">Belum ada musik latar</p>@endif</div><input class="mt-4 block w-full text-xs text-ink/65 file:mr-3 file:min-h-10 file:rounded-lg file:border-0 file:bg-forest file:px-3 file:py-2 file:text-xs file:font-semibold file:text-white hover:file:bg-clay focus:outline-none focus:ring-2 focus:ring-gold" id="audio_path" name="audio_path" type="file" accept=".mp3,.wav,.ogg,audio/mpeg,audio/wav,audio/ogg" aria-describedby="audio-hint"><p id="audio-hint" class="mt-2 text-xs leading-5 text-ink/50">Pilih file audio baru untuk mengganti musik saat ini.</p></div>
            </div>
        </section>

        <section class="rounded-xl border border-forest/10 bg-white p-5 shadow-sm sm:p-7" aria-labelledby="wedding-message-title">
            <div class="flex items-start gap-4 border-b border-forest/10 pb-5"><span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-forest text-xs font-bold text-white">05</span><div><h2 id="wedding-message-title" class="font-display text-2xl text-forest">Kontak dan pesan</h2><p class="mt-1 text-sm leading-5 text-ink/60">Informasi tambahan untuk tamu undangan.</p></div></div>
            <div class="mt-5 grid gap-5 sm:grid-cols-2"><div><label class="text-xs font-semibold text-forest" for="quote_source">Sumber kutipan</label><input class="mt-2 block min-h-12 w-full rounded-lg border border-forest/15 bg-cream/50 px-4 py-3 text-sm text-ink outline-none transition hover:border-forest/30 focus:border-gold focus:bg-white focus:ring-2 focus:ring-gold/20" id="quote_source" name="quote_source" value="{{ Input::old('quote_source', $wedding->quote_source) }}"></div><div><label class="text-xs font-semibold text-forest" for="whatsapp">WhatsApp RSVP</label><input class="mt-2 block min-h-12 w-full rounded-lg border border-forest/15 bg-cream/50 px-4 py-3 text-sm text-ink outline-none transition hover:border-forest/30 focus:border-gold focus:bg-white focus:ring-2 focus:ring-gold/20" id="whatsapp" name="whatsapp" type="tel" autocomplete="tel" value="{{ Input::old('whatsapp', $wedding->whatsapp) }}" placeholder="Contoh: 62812..."></div><div class="sm:col-span-2"><label class="text-xs font-semibold text-forest" for="quote">Kutipan</label><textarea class="mt-2 block min-h-32 w-full rounded-lg border border-forest/15 bg-cream/50 px-4 py-3 text-sm leading-6 text-ink outline-none transition placeholder:text-ink/35 hover:border-forest/30 focus:border-gold focus:bg-white focus:ring-2 focus:ring-gold/20" id="quote" name="quote" maxlength="2000" placeholder="Tuliskan kutipan untuk undangan...">{{ Input::old('quote', $wedding->quote) }}</textarea><p class="mt-1.5 text-xs text-ink/50">Maksimal 2.000 karakter.</p></div></div>
        </section>
    </div>
    <div class="sticky bottom-0 z-10 mt-5 border-t border-forest/10 bg-cream/95 py-4 backdrop-blur"><div class="mx-auto flex max-w-5xl flex-col items-stretch justify-between gap-3 sm:flex-row sm:items-center"><p class="text-xs text-ink/55">Pastikan detail sudah benar sebelum menyimpan.</p><button class="inline-flex min-h-12 items-center justify-center rounded-lg bg-forest px-6 py-3 text-xs font-bold uppercase tracking-wider text-white shadow-sm transition hover:bg-clay focus:outline-none focus:ring-2 focus:ring-gold focus:ring-offset-2" type="submit">Simpan perubahan <span class="ml-2" aria-hidden="true">→</span></button></div></div>
</form>
@foreach (['bride_image', 'groom_image', 'hero_image'] as $media)
    <form id="delete-{{ $media }}" class="hidden" method="post" action="{{ url('admin/wedding/media/' . $media . '/delete') }}">{!! csrf_field() !!}</form>
@endforeach
<script>
    function deleteWeddingMedia(media) {
        if (confirm('Hapus media ini?')) {
            document.getElementById('delete-' + media).submit();
        }
        return false;
    }
    ['bride_image', 'groom_image', 'hero_image'].forEach(function (id) {
        document.getElementById(id).addEventListener('change', function () {
            var preview = document.getElementById(id === 'hero_image' ? 'hero-preview' : id.replace('_image', '') + '-preview');
            var empty = document.getElementById('hero-empty');
            if (this.files[0]) {
                preview.src = URL.createObjectURL(this.files[0]);
                preview.classList.remove('hidden');
                if (empty && id === 'hero_image') { empty.classList.add('hidden'); }
                if (id !== 'hero_image') {
                    var placeholder = preview.parentNode.querySelector('span');
                    if (placeholder) { placeholder.classList.add('hidden'); }
                }
            }
        });
    });
</script>
