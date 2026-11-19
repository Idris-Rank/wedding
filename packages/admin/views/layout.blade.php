<!doctype html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Wedding</title>
    <link rel="stylesheet" href="{{ asset('css/admin.min.css') }}?v={{ filemtime(path('assets').'css/admin.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen bg-cream font-sans text-ink antialiased">
    <div class="min-h-screen lg:flex">
        <div id="sidebar-overlay" class="fixed inset-0 z-30 hidden bg-ink/50 backdrop-blur-sm lg:hidden" aria-hidden="true"></div>
        <aside id="admin-sidebar" class="fixed inset-y-0 left-0 z-40 flex w-72 -translate-x-full flex-col overflow-y-auto bg-forest text-white transition-transform duration-300 motion-reduce:transition-none lg:static lg:min-h-screen lg:shrink-0 lg:translate-x-0">
            <div class="flex items-center justify-between border-b border-white/10 px-6 py-6">
                <a href="{{ url('admin') }}" class="font-display text-2xl tracking-tight">Wedding <span class="text-gold">Admin</span><span class="mt-1 block font-sans text-[10px] font-semibold uppercase tracking-[.25em] text-white/70">Panel pengelola</span></a>
                <button id="sidebar-close" class="rounded-lg p-2 text-2xl leading-none text-gold hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-gold lg:hidden" type="button" aria-label="Tutup menu">&times;</button>
            </div>
            <div class="px-5 pb-3 pt-7 text-[10px] font-semibold uppercase tracking-[.22em] text-white/40">Workspace</div>
            <nav class="space-y-1 px-3" aria-label="Menu admin">
                <a class="flex items-center gap-3 rounded-lg border-l-2 px-4 py-3 text-sm transition {{ URI::is('admin') ? 'border-gold bg-white/10 font-semibold text-white' : 'border-transparent text-white/65 hover:bg-white/5 hover:text-white' }}" href="{{ url('admin') }}" {{ URI::is('admin') ? 'aria-current="page"' : '' }}><span class="w-5 text-center text-gold" aria-hidden="true">⌂</span>Dashboard</a>
                <a class="flex items-center gap-3 rounded-lg border-l-2 px-4 py-3 text-sm transition {{ URI::is('admin/wedding*') ? 'border-gold bg-white/10 font-semibold text-white' : 'border-transparent text-white/65 hover:bg-white/5 hover:text-white' }}" href="{{ url('admin/wedding') }}" {{ URI::is('admin/wedding*') ? 'aria-current="page"' : '' }}><span class="w-5 text-center text-gold" aria-hidden="true">◇</span>Informasi wedding</a>
                <a class="flex items-center gap-3 rounded-lg border-l-2 px-4 py-3 text-sm transition {{ URI::is('admin/events*') ? 'border-gold bg-white/10 font-semibold text-white' : 'border-transparent text-white/65 hover:bg-white/5 hover:text-white' }}" href="{{ url('admin/events') }}" {{ URI::is('admin/events*') ? 'aria-current="page"' : '' }}><span class="w-5 text-center text-gold" aria-hidden="true">▦</span>Rangkaian acara</a>
                <a class="flex items-center gap-3 rounded-lg border-l-2 px-4 py-3 text-sm transition {{ URI::is('admin/galleries*') ? 'border-gold bg-white/10 font-semibold text-white' : 'border-transparent text-white/65 hover:bg-white/5 hover:text-white' }}" href="{{ url('admin/galleries') }}" {{ URI::is('admin/galleries*') ? 'aria-current="page"' : '' }}><span class="w-5 text-center text-gold" aria-hidden="true">▧</span>Galeri</a>
                <a class="flex items-center gap-3 rounded-lg border-l-2 px-4 py-3 text-sm transition {{ URI::is('admin/gifts*') ? 'border-gold bg-white/10 font-semibold text-white' : 'border-transparent text-white/65 hover:bg-white/5 hover:text-white' }}" href="{{ url('admin/gifts') }}" {{ URI::is('admin/gifts*') ? 'aria-current="page"' : '' }}><span class="w-5 text-center text-gold" aria-hidden="true">＋</span>Amplop digital</a>
                <a class="flex items-center gap-3 rounded-lg border-l-2 px-4 py-3 text-sm transition {{ URI::is('admin/rsvps*') ? 'border-gold bg-white/10 font-semibold text-white' : 'border-transparent text-white/65 hover:bg-white/5 hover:text-white' }}" href="{{ url('admin/rsvps') }}" {{ URI::is('admin/rsvps*') ? 'aria-current="page"' : '' }}><span class="w-5 text-center text-gold" aria-hidden="true">◎</span>Konfirmasi tamu</a>
            </nav>
            <div class="mt-auto p-4">
                <div class="rounded-xl border border-white/10 bg-white/5 p-4"><p class="text-xs font-semibold text-white">Undangan Anda</p><p class="mt-1 text-xs leading-5 text-white/50">Lihat hasil undangan seperti yang diterima tamu.</p><a class="mt-3 inline-flex items-center text-xs font-semibold text-gold hover:text-white focus:outline-none focus:underline" href="{{ url('/') }}">Buka undangan <span class="ml-2" aria-hidden="true">↗</span></a></div>
                <form class="mt-3" method="post" action="{{ url('admin/logout') }}">{!! csrf_field() !!}<button class="w-full rounded-lg px-4 py-3 text-left text-sm text-white/55 transition hover:bg-white/10 hover:text-white focus:outline-none focus:ring-2 focus:ring-gold" type="submit">Keluar dari akun</button></form>
            </div>
        </aside>
        <div class="min-w-0 flex-1">
            <header class="sticky top-0 z-20 border-b border-forest/10 bg-white/95 backdrop-blur">
                <div class="flex min-h-[76px] items-center justify-between gap-4 px-5 sm:px-8 lg:px-10">
                    <div class="flex min-w-0 items-center gap-3"><button id="sidebar-open" class="rounded-lg p-2 text-lg text-forest transition hover:bg-cream focus:outline-none focus:ring-2 focus:ring-gold lg:hidden" type="button" aria-label="Buka menu" aria-expanded="false" aria-controls="admin-sidebar">☰</button><div class="min-w-0"><p class="text-[10px] font-semibold uppercase tracking-[.2em] text-clay">Panel pengelola</p><p class="truncate font-display text-xl text-forest sm:text-2xl">{{ $wedding->bride_name ?? 'Wedding' }} <span class="text-gold">&amp;</span> {{ $wedding->groom_name ?? 'Admin' }}</p></div></div>
                    <a href="{{ url('/') }}" class="shrink-0 rounded-lg border border-forest/10 px-3 py-2 text-[10px] font-semibold uppercase tracking-wider text-forest transition hover:border-gold hover:bg-cream sm:px-4 sm:text-xs">Lihat undangan <span aria-hidden="true">↗</span></a>
                </div>
            </header>
            <main class="mx-auto max-w-[1440px] px-5 py-7 sm:px-8 lg:px-10 lg:py-9">@yield('content')</main>
        </div>
    </div>
    <script>
        (function () {
            var sidebar = document.getElementById('admin-sidebar');
            var overlay = document.getElementById('sidebar-overlay');
            var openButton = document.getElementById('sidebar-open');
            var closeButton = document.getElementById('sidebar-close');
            function setSidebar(open) {
                sidebar.classList.toggle('-translate-x-full', !open);
                sidebar.classList.toggle('translate-x-0', open);
                overlay.classList.toggle('hidden', !open);
                openButton.setAttribute('aria-expanded', open ? 'true' : 'false');
                document.body.classList.toggle('overflow-hidden', open);
            }
            openButton.addEventListener('click', function () { setSidebar(true); closeButton.focus(); });
            closeButton.addEventListener('click', function () { setSidebar(false); openButton.focus(); });
            overlay.addEventListener('click', function () { setSidebar(false); openButton.focus(); });
            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape' && !overlay.classList.contains('hidden')) { setSidebar(false); openButton.focus(); }
            });
            sidebar.querySelectorAll('a').forEach(function (link) { link.addEventListener('click', function () { setSidebar(false); }); });
        }());
    </script>
</body>
</html>
