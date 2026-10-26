<section class="reveal relative overflow-hidden px-6 py-24 opacity-0 translate-y-7 transition duration-700 sm:py-32" id="rsvp">
    <div class="pointer-events-none absolute inset-0 bg-gradient-to-b from-ivory via-sand/70 to-ivory"></div>

    <div class="relative mx-auto grid max-w-5xl gap-12 sm:grid-cols-2 sm:items-center sm:gap-16">
        <div>
            <p class="flex w-fit items-center gap-4 text-[11px] font-semibold uppercase tracking-[.38em] text-clay after:h-px after:w-11 after:bg-gradient-to-l after:from-transparent after:to-gold">RSVP</p>
            <h2 class="mt-5 font-display text-4xl font-medium leading-tight text-forest sm:text-5xl">Kehadiranmu<br>adalah hadiah.</h2>
            <span class="mt-6 flex w-36 items-center gap-3"><span class="h-px flex-1 bg-gradient-to-r from-transparent to-gold"></span><span class="h-1.5 w-1.5 rotate-45 bg-gold"></span><span class="h-px flex-1 bg-gradient-to-l from-transparent to-gold"></span></span>
            <p class="mt-6 max-w-sm text-[15px] leading-8 text-ink/65">Mohon konfirmasi kehadiran Panjenengan sebelum 10 September 2025 agar kami dapat mempersiapkan penyambutan terbaik.</p>
            <p class="mt-7 border-l-2 border-gold/70 bg-ivory/70 px-5 py-4 text-xs leading-6 tracking-wide text-ink/70">
                Konfirmasi hanya membutuhkan waktu sekitar satu menit. Data Panjenengan hanya digunakan untuk keperluan daftar tamu.
            </p>
        </div>

        <form id="rsvp-form" action="{{ url('rsvp') }}" method="post" class="relative border border-forest/10 bg-white px-6 py-9 shadow-soft transition duration-500 before:absolute before:inset-x-0 before:top-0 before:h-0.5 before:bg-gradient-to-r before:from-transparent before:via-gold before:to-transparent hover:-translate-y-1 hover:border-gold/60 hover:shadow-2xl sm:px-9 sm:py-10">
            {!! csrf_field() !!}
            <p class="text-[10px] font-semibold uppercase tracking-[.35em] text-clay">Konfirmasi kehadiran</p>

            <div class="mt-7">
                <label class="text-[10px] font-semibold uppercase tracking-[.3em] text-forest" for="name">Nama lengkap</label>
                <input class="mt-1 w-full border-0 border-b border-forest/20 bg-transparent px-0 py-3 text-[15px] text-ink placeholder:text-ink/40 focus:border-gold focus:outline-none focus:ring-0" id="name" name="name" type="text" required placeholder="Tulis nama Panjenengan" autocomplete="name">
            </div>

            <div class="mt-6">
                <label class="text-[10px] font-semibold uppercase tracking-[.3em] text-forest" for="attendance">Kehadiran</label>
                <select class="mt-1 w-full border-0 border-b border-forest/20 bg-transparent px-0 py-3 text-[15px] text-ink focus:border-gold focus:outline-none focus:ring-0" id="attendance" name="attendance" required>
                    <option value="">Pilih jawaban</option>
                    <option value="yes">Saya akan hadir</option>
                    <option value="no">Maaf, belum bisa hadir</option>
                </select>
            </div>

            <div class="mt-6">
                <label class="text-[10px] font-semibold uppercase tracking-[.3em] text-forest" for="guest-count">Jumlah tamu</label>
                <select class="mt-1 w-full border-0 border-b border-forest/20 bg-transparent px-0 py-3 text-[15px] text-ink focus:border-gold focus:outline-none focus:ring-0" id="guest-count" name="guest_count" required>
                    <option value="">Pilih jumlah</option>
                    <option value="1">1 orang</option>
                    <option value="2">2 orang</option>
                    <option value="3">3 orang</option>
                    <option value="4">4 orang</option>
                </select>
            </div>

            <div class="mt-6">
                <label class="text-[10px] font-semibold uppercase tracking-[.3em] text-forest" for="message">Ucapan (opsional)</label>
                <textarea class="mt-1 min-h-24 w-full resize-y border border-forest/15 bg-transparent px-3 py-2 text-[15px] text-ink placeholder:text-ink/40 focus:border-gold focus:outline-none focus:ring-0" id="message" name="message" maxlength="1000" placeholder="Tulis doa dan ucapan Panjenengan"></textarea>
            </div>

            <button class="mt-8 inline-flex min-h-12 w-full items-center justify-center bg-forest px-7 py-3 text-[11px] font-semibold uppercase tracking-[.22em] text-ivory transition duration-300 hover:-translate-y-0.5 hover:bg-gold hover:text-deep focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-gold" type="submit">Kirim RSVP</button>
            <p id="form-status" class="mt-4 min-h-5 text-center text-xs text-clay" role="status" aria-live="polite">{!! isset($errors) && $errors->has('name') ? $errors->first('name') : '' !!}</p>
        </form>
    </div>
</section>
