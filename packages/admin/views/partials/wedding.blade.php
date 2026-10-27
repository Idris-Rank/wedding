<section id="wedding" class="mt-8 rounded-lg border border-forest/10 bg-white p-6 shadow-sm lg:p-8">
    <div class="border-b border-forest/10 pb-5">
        <p class="text-xs font-semibold uppercase tracking-[.28em] text-clay">Pengaturan utama</p>
        <h2 class="mt-1 font-display text-3xl text-forest">Informasi wedding</h2>
        <p class="mt-2 text-sm text-ink/60">Kelompokkan informasi undangan agar lebih mudah dikelola.</p>
    </div>
    <form class="mt-7 space-y-5" method="post" action="{{ url('admin/wedding') }}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <fieldset class="pt-4">
            <legend class="flex items-center gap-3 font-display text-2xl text-forest"><span class="flex h-8 w-8 items-center justify-center rounded-lg bg-forest text-xs font-sans font-semibold text-white">01</span>Identitas pasangan</legend><p class="mt-2 text-sm text-ink/60">Nama yang ditampilkan pada halaman undangan.</p>
            <div class="mt-5 grid gap-5 sm:grid-cols-2">
                @foreach ([['groom_name', 'Nama mempelai pria'], ['bride_name', 'Nama mempelai wanita']] as $field)
                    <div>
                        <label class="text-xs font-semibold uppercase tracking-widest text-forest"
                            for="{{ $field[0] }}">{{ $field[1] }}</label>
                        <input
                            class="mt-2 block min-h-12 w-full rounded-lg border border-forest/15 bg-cream px-4 py-3 text-sm outline-none focus:outline-none {{ $errors->has($field[0]) ? 'border-clay' : '' }}"
                            id="{{ $field[0] }}" name="{{ $field[0] }}"
                            value="{{ Input::old($field[0], $wedding->{$field[0]}) }}" required>
                        @if ($errors->has($field[0]))
                            <p class="mt-1 text-xs text-clay">{{ $errors->first($field[0]) }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </fieldset>
        <fieldset class="pt-4">
            <legend class="flex items-center gap-3 font-display text-2xl text-forest"><span class="flex h-8 w-8 items-center justify-center rounded-lg bg-forest text-xs font-sans font-semibold text-white">02</span>Informasi keluarga</legend><p class="mt-2 text-sm text-ink/60">Nama orang tua yang ditampilkan pada bagian mempelai.</p>
            <div class="mt-5 grid gap-5 sm:grid-cols-2">
                @foreach ([['groom_parents', 'Orang tua mempelai pria'], ['bride_parents', 'Orang tua mempelai wanita']] as $field)
                    <div>
                        <label class="text-xs font-semibold uppercase tracking-widest text-forest"
                            for="{{ $field[0] }}">{{ $field[1] }}</label>
                        <input
                            class="mt-2 block min-h-12 w-full rounded-lg border border-forest/15 bg-cream px-4 py-3 text-sm outline-none focus:outline-none"
                            id="{{ $field[0] }}" name="{{ $field[0] }}"
                            value="{{ Input::old($field[0], $wedding->{$field[0]}) }}">
                    </div>
                @endforeach
            </div>
        </fieldset>
        <fieldset class="pt-4">
            <legend class="flex items-center gap-3 font-display text-2xl text-forest"><span class="flex h-8 w-8 items-center justify-center rounded-lg bg-forest text-xs font-sans font-semibold text-white">03</span>Foto mempelai</legend><p class="mt-2 text-sm text-ink/60">JPG, PNG, atau WEBP, maksimal 10 MB dan sisi maksimal 10.000px.</p>
            <div class="mt-5 grid gap-6 sm:grid-cols-2">
                @foreach ([['bride_image', 'Foto mempelai wanita', 'bride-preview', $wedding->bride_image], ['groom_image', 'Foto mempelai pria', 'groom-preview', $wedding->groom_image]] as $field)
                    <div><label class="text-xs font-semibold uppercase tracking-widest text-forest"
                            for="{{ $field[0] }}">{{ $field[1] }}</label><input
                            class="mt-2 block min-h-12 w-full rounded-lg border border-forest/15 bg-cream px-4 py-3 text-sm outline-none file:mr-4 file:rounded-lg file:border-0 file:bg-forest file:px-4 file:py-2 file:text-xs file:text-white"
                            id="{{ $field[0] }}" name="{{ $field[0] }}" type="file"
                            accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"><img
                            id="{{ $field[2] }}"
                            class="mt-3 {{ $field[3] ? '' : 'hidden' }} h-40 w-32 rounded-lg object-cover"
                            src="{{ $field[3] ? asset($field[3]) : '' }}" alt="Preview {{ $field[1] }}">
                        @if ($field[3])
                            <button
                                class="mt-2 rounded-lg border border-clay/20 px-3 py-2 text-xs font-semibold uppercase tracking-widest text-clay"
                                type="button" onclick="return deleteWeddingMedia('{{ $field[0] }}');">Hapus
                                foto</button>
                        @endif
                    </div>
                @endforeach
            </div>
        </fieldset>
        <fieldset class="pt-4">
            <legend class="flex items-center gap-3 font-display text-2xl text-forest"><span class="flex h-8 w-8 items-center justify-center rounded-lg bg-forest text-xs font-sans font-semibold text-white">04</span>Media undangan</legend><p class="mt-2 text-sm text-ink/60">Atur hero image dan musik latar undangan.</p>
            <div class="mt-5 grid gap-6 sm:grid-cols-2">
                <div><label class="text-xs font-semibold uppercase tracking-widest text-forest" for="hero_image">Hero
                        image</label><input
                        class="mt-2 block min-h-12 w-full rounded-lg border border-forest/15 bg-cream px-4 py-3 text-sm outline-none file:mr-4 file:rounded-lg file:border-0 file:bg-forest file:px-4 file:py-2 file:text-xs file:text-white"
                        id="hero_image" name="hero_image" type="file"
                        accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"><img id="hero-preview"
                        class="mt-3 {{ $wedding->hero_image ? '' : 'hidden' }} aspect-video w-full rounded-lg object-cover"
                        src="{{ $wedding->hero_image ? asset($wedding->hero_image) : '' }}" alt="Preview hero">
                    @if ($wedding->hero_image)
                        <button
                            class="mt-2 rounded-lg border border-clay/20 px-3 py-2 text-xs font-semibold uppercase tracking-widest text-clay"
                            type="button" onclick="return deleteWeddingMedia('hero_image');">Hapus hero image</button>
                    @endif
                </div>
                <div><label class="text-xs font-semibold uppercase tracking-widest text-forest" for="audio_path">Musik
                        latar</label><input
                        class="mt-2 block min-h-12 w-full rounded-lg border border-forest/15 bg-cream px-4 py-3 text-sm outline-none file:mr-4 file:rounded-lg file:border-0 file:bg-forest file:px-4 file:py-2 file:text-xs file:text-white"
                        id="audio_path" name="audio_path" type="file"
                        accept=".mp3,.wav,.ogg,audio/mpeg,audio/wav,audio/ogg">
                    @if ($wedding->audio_path)
                        <audio class="mt-3 w-full" controls src="{{ asset($wedding->audio_path) }}"></audio>
                    @endif
                </div>
            </div>
        </fieldset>
        <fieldset class="pt-4">
            <legend class="flex items-center gap-3 font-display text-2xl text-forest"><span class="flex h-8 w-8 items-center justify-center rounded-lg bg-forest text-xs font-sans font-semibold text-white">05</span>Kontak dan pesan</legend><p class="mt-2 text-sm text-ink/60">Informasi tambahan untuk tamu undangan.</p>
            <div class="mt-5 grid gap-5 sm:grid-cols-2">
                <div><label class="text-xs font-semibold uppercase tracking-widest text-forest"
                        for="quote_source">Sumber kutipan</label><input
                        class="mt-2 block min-h-12 w-full rounded-lg border border-forest/15 bg-cream px-4 py-3 text-sm outline-none focus:outline-none"
                        id="quote_source" name="quote_source"
                        value="{{ Input::old('quote_source', $wedding->quote_source) }}"></div>
                <div><label class="text-xs font-semibold uppercase tracking-widest text-forest" for="whatsapp">WhatsApp
                        RSVP</label><input
                        class="mt-2 block min-h-12 w-full rounded-lg border border-forest/15 bg-cream px-4 py-3 text-sm outline-none focus:outline-none"
                        id="whatsapp" name="whatsapp" value="{{ Input::old('whatsapp', $wedding->whatsapp) }}"></div>
                <div class="sm:col-span-2"><label class="text-xs font-semibold uppercase tracking-widest text-forest"
                        for="quote">Kutipan</label>
                    <textarea
                        class="mt-2 block min-h-28 w-full rounded-lg border border-forest/15 bg-cream px-4 py-3 text-sm text-ink outline-none transition placeholder:text-ink/35 focus:border-gold focus:bg-white focus:ring-2 focus:ring-gold/20"
                        id="quote" name="quote">{{ Input::old('quote', $wedding->quote) }}</textarea>
                </div>
            </div>
        </fieldset>
        <div class="sticky bottom-4 z-10 rounded-lg bg-white/95 py-3 backdrop-blur-sm"><button
            class="w-full rounded-lg bg-forest px-6 py-3 text-xs font-semibold uppercase tracking-widest text-white shadow-sm hover:bg-gold hover:text-forest sm:w-auto"
            type="submit">Simpan perubahan</button></div>
    </form>
    @foreach (['bride_image', 'groom_image', 'hero_image'] as $media)
        <form id="delete-{{ $media }}" class="hidden" method="post"
            action="{{ url('admin/wedding/media/' . $media . '/delete') }}">{!! csrf_field() !!}</form>
    @endforeach
    <script>
        function deleteWeddingMedia(media) {
            if (confirm('Hapus media ini?')) {
                document.getElementById('delete-' + media).submit();
            }
            return false;
        } ['bride_image', 'groom_image', 'hero_image'].forEach(function(id) {
            document.getElementById(id).addEventListener('change', function() {
                var preview = document.getElementById(id.replace('_image', '') + '-preview');
                if (this.files[0]) {
                    preview.src = URL.createObjectURL(this.files[0]);
                    preview.classList.remove('hidden');
                }
            });
        });
    </script>
</section>
<style>
    #wedding form.space-y-5 {
        row-gap: 1rem;
    }
</style>
