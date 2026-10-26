<section class="flex min-h-[720px] items-end justify-center bg-jogja-900 bg-[linear-gradient(180deg,rgba(45,27,18,.08),rgba(45,27,18,.62)),url('https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1800&q=85')] bg-cover bg-center px-6 pb-20 text-center text-white md:min-h-screen md:pb-28" id="home">
    <div class="max-w-3xl animate-fade-up">
        <p class="mb-5 text-xs font-semibold uppercase tracking-[.35em] text-jogja-300">Undangan Pernikahan</p>
        <h1 class="font-display text-7xl font-medium leading-[.82] md:text-9xl">Ratri <span class="text-jogja-300">&amp;</span> Jatmiko</h1>
        <div class="mx-auto mt-8 h-px w-24 bg-jogja-300"></div>
        <p class="mt-6 font-display text-2xl italic md:text-3xl">Menyatukan dua hati, melestarikan sebuah tradisi.</p>
        <p class="mt-5 text-sm tracking-wider text-white/80">{{ $wedding['date'] }} &middot; {{ $wedding['city'] }}</p>
        <div id="countdown" data-target="{{ $wedding['date_iso'] }}" class="mx-auto mt-8 grid max-w-sm grid-cols-4 gap-2 text-center">
            <div class="rounded bg-black/20 px-2 py-3 backdrop-blur-sm"><strong data-unit="days" class="block font-display text-3xl text-jogja-300">0</strong><span class="text-[10px] uppercase tracking-widest text-white/60">Hari</span></div>
            <div class="rounded bg-black/20 px-2 py-3 backdrop-blur-sm"><strong data-unit="hours" class="block font-display text-3xl text-jogja-300">0</strong><span class="text-[10px] uppercase tracking-widest text-white/60">Jam</span></div>
            <div class="rounded bg-black/20 px-2 py-3 backdrop-blur-sm"><strong data-unit="minutes" class="block font-display text-3xl text-jogja-300">0</strong><span class="text-[10px] uppercase tracking-widest text-white/60">Menit</span></div>
            <div class="rounded bg-black/20 px-2 py-3 backdrop-blur-sm"><strong data-unit="seconds" class="block font-display text-3xl text-jogja-300">0</strong><span class="text-[10px] uppercase tracking-widest text-white/60">Detik</span></div>
        </div>
        <a href="#event" class="mt-9 inline-flex rounded-full border border-jogja-300 bg-jogja-700/70 px-7 py-3 text-xs font-bold uppercase tracking-[.2em] transition hover:bg-jogja-500">Lihat Undangan</a>
    </div>
</section>
