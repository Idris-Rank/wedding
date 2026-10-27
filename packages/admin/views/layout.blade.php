<!doctype html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Wedding</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config={theme:{extend:{colors:{ink:'#28352d',forest:'#30483b',cream:'#fbf8f1',clay:'#b9785d',gold:'#c8a66a'},fontFamily:{display:['Cormorant Garamond','serif'],sans:['DM Sans','sans-serif']}}}};</script>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen bg-cream font-sans text-ink">
    <div class="min-h-screen lg:flex">
        <div id="sidebar-overlay" class="fixed inset-0 z-30 hidden bg-ink/40 lg:hidden" aria-hidden="true"></div><aside id="admin-sidebar" class="fixed inset-y-0 left-0 z-40 w-72 -translate-x-full bg-forest text-white transition-transform duration-300 lg:static lg:min-h-screen lg:w-72 lg:shrink-0 lg:translate-x-0"><div class="flex items-center justify-between px-6 py-6 lg:block"><a href="{{ url('admin') }}" class="font-display text-3xl">Wedding <span class="text-gold">Admin</span></a><button id="sidebar-close" class="rounded-lg p-2 text-2xl leading-none text-gold hover:bg-white/10 lg:hidden" type="button" aria-label="Tutup menu">&times;</button></div><nav class="space-y-1 px-4 pb-6" aria-label="Menu admin"><a class="block rounded px-4 py-3 text-sm {{ URI::is('admin') ? 'bg-white/15 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }}" href="{{ url('admin') }}" {{ URI::is('admin') ? 'aria-current="page"' : '' }}>Dashboard</a><a class="block rounded px-4 py-3 text-sm {{ URI::is('admin/wedding*') ? 'bg-white/15 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }}" href="{{ url('admin/wedding') }}" {{ URI::is('admin/wedding*') ? 'aria-current="page"' : '' }}>Informasi Wedding</a><a class="block rounded px-4 py-3 text-sm {{ URI::is('admin/events*') ? 'bg-white/15 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }}" href="{{ url('admin/events') }}" {{ URI::is('admin/events*') ? 'aria-current="page"' : '' }}>Acara</a><a class="block rounded px-4 py-3 text-sm {{ URI::is('admin/galleries*') ? 'bg-white/15 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }}" href="{{ url('admin/galleries') }}" {{ URI::is('admin/galleries*') ? 'aria-current="page"' : '' }}>Galeri</a><a class="block rounded px-4 py-3 text-sm {{ URI::is('admin/gifts*') ? 'bg-white/15 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }}" href="{{ url('admin/gifts') }}" {{ URI::is('admin/gifts*') ? 'aria-current="page"' : '' }}>Amplop Digital</a><a class="block rounded px-4 py-3 text-sm {{ URI::is('admin/rsvps*') ? 'bg-white/15 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }}" href="{{ url('admin/rsvps') }}" {{ URI::is('admin/rsvps*') ? 'aria-current="page"' : '' }}>RSVP</a></nav></aside>
        <div class="min-w-0 flex-1"><header class="border-b border-forest/10 bg-white"><div class="flex items-center justify-between px-6 py-4 lg:px-10"><div class="flex items-center gap-3"><button id="sidebar-open" class="rounded-lg p-2 text-xl text-forest hover:bg-cream lg:hidden" type="button" aria-label="Buka menu" aria-expanded="false" aria-controls="admin-sidebar">☰</button><div><p class="text-xs uppercase tracking-[.25em] text-clay">Panel Pengelola</p><p class="font-display text-2xl text-forest">{{ $wedding->bride_name ?? 'Wedding' }} &amp; {{ $wedding->groom_name ?? 'Admin' }}</p></div></div><a href="{{ url('/') }}" class="text-xs uppercase tracking-widest text-ink/50 hover:text-clay">Lihat undangan ↗</a></div></header><main class="mx-auto max-w-7xl px-6 py-8 lg:px-10">@yield('content')</main></div>
    </div>
</body>
</html>
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
        openButton.addEventListener('click', function () { setSidebar(true); });
        closeButton.addEventListener('click', function () { setSidebar(false); });
        overlay.addEventListener('click', function () { setSidebar(false); });
        document.addEventListener('keydown', function (event) { if (event.key === 'Escape') { setSidebar(false); } });
        sidebar.querySelectorAll('a').forEach(function (link) { link.addEventListener('click', function () { setSidebar(false); }); });
    }());
</script>
