<!doctype html>
<html lang="id" class="scroll-smooth motion-reduce:scroll-auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Undangan Pernikahan | {{ $wedding['short_names'] }}</title>
    <meta name="description" content="Undangan pernikahan {{ $wedding['short_names'] }}, {{ $wedding['date'] }} di {{ $wedding['city'] }}.">
    <meta name="theme-color" content="#2d1b12">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                         ivory: '#fbf8f0', sand: '#eee5d4', sage: '#8b9789', forest: '#26372f', deep: '#1d2924', clay: '#874b36', ink: '#2d302b', gold: '#b99452', champagne: '#dfc894', sogan: '#762f25', wood: '#5c3928',
                        jogja: { 50: '#fbf8f1', 100: '#f4ead6', 300: '#d6b878', 500: '#a87a32', 700: '#6d431c', 900: '#2d1b12' }
                    },
        fontFamily: { display: ['Cormorant Garamond', 'Georgia', 'serif'], sans: ['DM Sans', 'system-ui', 'sans-serif'] },
                    boxShadow: { soft: '0 20px 60px rgba(45, 27, 18, .12)' },
                    keyframes: {
                        fadeUp: { '0%': { opacity: '0', transform: 'translateY(28px)' }, '100%': { opacity: '1', transform: 'translateY(0)' } },
                        musicBar: { '0%': { height: '5px' }, '100%': { height: '15px' } }
                    },
                    animation: { 'fade-up': 'fadeUp 1s ease-out both', 'music-bar': 'musicBar .8s ease-in-out infinite alternate' }
                }
            }
        };
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body class="overflow-hidden bg-ivory font-sans text-ink antialiased selection:bg-gold selection:text-deep">
    @include('components.wedding.opening')
    @include('components.wedding.navigation')
    @include('components.wedding.cover')

    <main>
        @include('components.wedding.welcome')
        @include('components.wedding.couple')
        @include('components.wedding.events')
        @include('components.wedding.story')
        @include('components.wedding.gallery')
        @include('components.wedding.rsvp')

        <section class="reveal relative overflow-hidden px-6 py-24 opacity-0 translate-y-7 transition duration-700 sm:py-28" id="gift">
            <div class="mx-auto max-w-2xl text-center">
                <p class="mx-auto flex w-fit items-center gap-4 text-[11px] font-semibold uppercase tracking-[.38em] text-clay before:h-px before:w-11 before:bg-gradient-to-r before:from-transparent before:to-gold after:h-px after:w-11 after:bg-gradient-to-l after:from-transparent after:to-gold">Tanda kasih</p>
                <h2 class="mt-5 font-display text-4xl font-medium text-forest sm:text-5xl">Amplop digital</h2>
                <span class="mx-auto mt-6 flex w-36 items-center gap-3"><span class="h-px flex-1 bg-gradient-to-r from-transparent to-gold"></span><span class="h-1.5 w-1.5 rotate-45 bg-gold"></span><span class="h-px flex-1 bg-gradient-to-l from-transparent to-gold"></span></span>
                <p class="mx-auto mt-6 max-w-md text-[15px] leading-7 text-ink/65">Doa restu Panjenengan adalah hadiah terindah. Jika berkenan, tanda kasih dapat dikirimkan melalui:</p>
            </div>
                <div class="relative mx-auto mt-10 max-w-2xl rounded-lg border border-wood/15 bg-white px-6 py-9 shadow-soft before:absolute before:inset-x-8 before:top-0 before:h-1 before:bg-sogan sm:px-10 sm:py-10">
                <div class="flex flex-col gap-4 sm:flex-row">
                    @foreach ($wedding['gifts'] as $gift)
                        <div class="flex flex-1 items-center justify-between gap-4 rounded-lg border border-wood/15 bg-sand/70 px-5 py-4"><div><p class="text-[10px] font-semibold uppercase tracking-[.3em] text-clay">{{ $gift->provider }}</p><p class="mt-1.5 font-display text-2xl text-forest">{{ $gift->account_number }}</p><p class="text-xs text-ink/55">{{ $gift->account_name }}</p></div><button class="min-h-10 shrink-0 rounded-lg border border-wood/20 bg-white px-4 py-2 text-[10px] font-semibold uppercase tracking-[.18em] text-forest transition hover:bg-gold hover:text-deep" type="button" data-copy="{{ $gift->account_number }}">Salin</button></div>
                    @endforeach
                </div>
                <p id="copy-status" class="mt-5 min-h-5 text-center text-xs text-clay" role="status" aria-live="polite"></p>
            </div>
        </section>
    </main>

    <footer class="relative overflow-hidden bg-deep px-6 py-16 text-center text-ivory">
        <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-gold/45 to-transparent"></div>
        <p class="font-display text-3xl tracking-wide text-gold">{{ strtoupper(substr($wedding['bride'], 0, 1)) }} <span class="italic">&amp;</span> {{ strtoupper(substr($wedding['groom'], 0, 1)) }}</p>
        <p class="mt-6 font-display text-4xl sm:text-5xl">{{ $wedding['short_names'] }}</p>
        <p class="mt-4 text-sm text-ivory/60">Terima kasih atas doa dan restu Panjenengan.</p>
        <p class="mt-8 text-[10px] uppercase tracking-[.35em] text-gold/85">{{ $wedding['date'] }} &middot; {{ $wedding['city'] }}</p>
    </footer>

    @if ($wedding['audio_path'])<audio id="wedding-audio" loop preload="none"><source src="{{ asset($wedding['audio_path']) }}" type="audio/mpeg"></audio>@endif
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var opening = document.getElementById('opening');
            var openButton = document.getElementById('open-invitation');
            var audio = document.getElementById('wedding-audio');
            var musicButton = document.getElementById('music-toggle');
            var musicLabel = document.getElementById('music-label');
            var musicBars = document.querySelectorAll('[data-music-bar]');
            function setMusicState(playing) {
                musicButton.setAttribute('aria-pressed', playing ? 'true' : 'false');
                musicLabel.textContent = playing ? 'Jeda musik' : 'Putar musik';
                musicBars.forEach(function (bar, index) {
                    bar.classList.toggle('animate-music-bar', playing);
                    bar.style.animationDelay = playing ? String(index * .15) + 's' : '';
                });
            }

            if (audio && musicButton) {
                musicButton.classList.remove('hidden');
                musicButton.classList.add('flex');
            }
            openButton.addEventListener('click', function () {
                opening.classList.add('opacity-0', 'invisible', 'pointer-events-none');
                document.body.classList.remove('overflow-hidden');
                if (audio) { audio.play().then(function () { setMusicState(true); }).catch(function () {}); }
            });
            if (audio && musicButton) { musicButton.addEventListener('click', function () {
                if (audio.paused) { audio.play().then(function () { setMusicState(true); }).catch(function () {}); }
                else { audio.pause(); setMusicState(false); }
            }); }

            var countdown = document.getElementById('countdown');
            var target = new Date(countdown.getAttribute('data-target')).getTime();
            function updateCountdown() {
                var remaining = Math.max(0, target - Date.now());
                var values = { days: Math.floor(remaining / 86400000), hours: Math.floor(remaining / 3600000) % 24, minutes: Math.floor(remaining / 60000) % 60, seconds: Math.floor(remaining / 1000) % 60 };
                Object.keys(values).forEach(function (unit) { countdown.querySelector('[data-unit="' + unit + '"]').textContent = String(values[unit]).padStart(2, '0'); });
            }
            updateCountdown();
            window.setInterval(updateCountdown, 1000);

            var revealItems = document.querySelectorAll('.reveal');
            if ('IntersectionObserver' in window) {
                var observer = new IntersectionObserver(function (entries) { entries.forEach(function (entry) { if (entry.isIntersecting) { entry.target.classList.remove('opacity-0', 'translate-y-7'); observer.unobserve(entry.target); } }); }, { threshold: .14 });
                revealItems.forEach(function (item) { observer.observe(item); });
            } else { revealItems.forEach(function (item) { item.classList.remove('opacity-0', 'translate-y-7'); }); }

            var rsvpForm = document.getElementById('rsvp-form');
            rsvpForm.addEventListener('submit', function (event) {
                if (!window.fetch) { return; }
                event.preventDefault();
                var status = document.getElementById('form-status');
                var submit = rsvpForm.querySelector('button[type="submit"]');
                status.textContent = 'Mengirim konfirmasi...';
                submit.disabled = true;
                fetch(rsvpForm.action, { method: 'POST', body: new FormData(rsvpForm), headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' } })
                    .then(function (response) { return response.json().then(function (body) { return { ok: response.ok, body: body }; }); })
                    .then(function (result) { status.textContent = result.body.message || (result.ok ? 'Konfirmasi diterima.' : 'Data belum valid.'); if (result.ok) { rsvpForm.reset(); } })
                    .catch(function () { status.textContent = 'Konfirmasi gagal dikirim. Silakan coba lagi.'; })
                    .then(function () { submit.disabled = false; });
            });
            document.querySelectorAll('[data-copy]').forEach(function (button) { button.addEventListener('click', function () { var value = button.getAttribute('data-copy'); if (navigator.clipboard) { navigator.clipboard.writeText(value); } document.getElementById('copy-status').textContent = 'Nomor berhasil disalin: ' + value; }); });
        });
    </script>
</body>
</html>
