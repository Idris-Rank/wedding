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
        <aside class="bg-forest text-white lg:min-h-screen lg:w-72 lg:shrink-0"><div class="flex items-center justify-between px-6 py-6 lg:block"><a href="{{ url('admin') }}" class="font-display text-3xl">Wedding <span class="text-gold">Admin</span></a><span class="text-2xl text-gold lg:hidden">☰</span></div><nav class="hidden space-y-1 px-4 pb-6 lg:block" aria-label="Menu admin"><a class="block rounded px-4 py-3 text-sm text-white/70 hover:bg-white/10 hover:text-white" href="{{ url('admin') }}">Dashboard</a><a class="block rounded px-4 py-3 text-sm text-white/70 hover:bg-white/10 hover:text-white" href="{{ url('admin/wedding') }}">Informasi Wedding</a><a class="block rounded px-4 py-3 text-sm text-white/70 hover:bg-white/10 hover:text-white" href="{{ url('admin/events') }}">Acara</a><a class="block rounded px-4 py-3 text-sm text-white/70 hover:bg-white/10 hover:text-white" href="{{ url('admin/galleries') }}">Galeri</a><a class="block rounded px-4 py-3 text-sm text-white/70 hover:bg-white/10 hover:text-white" href="{{ url('admin/gifts') }}">Amplop Digital</a><a class="block rounded px-4 py-3 text-sm text-white/70 hover:bg-white/10 hover:text-white" href="{{ url('admin/rsvps') }}">RSVP</a></nav></aside>
        <div class="min-w-0 flex-1"><header class="border-b border-forest/10 bg-white"><div class="flex items-center justify-between px-6 py-4 lg:px-10"><div><p class="text-xs uppercase tracking-[.25em] text-clay">Panel Pengelola</p><p class="font-display text-2xl text-forest">{{ $wedding->bride_name ?? 'Wedding' }} &amp; {{ $wedding->groom_name ?? 'Admin' }}</p></div><a href="{{ url('/') }}" class="text-xs uppercase tracking-widest text-ink/50 hover:text-clay">Lihat undangan ↗</a></div></header><main class="mx-auto max-w-7xl px-6 py-8 lg:px-10">@yield('content')</main></div>
    </div>
</body>
</html>
