<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Login Admin Wedding</title>
    <link rel="stylesheet" href="{{ asset('css/admin.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body class="flex min-h-screen items-center justify-center bg-cream px-6 font-sans text-ink">
    <main class="w-full max-w-md bg-white p-8 shadow-xl sm:p-10">
        <div class="text-center"><p class="text-xs font-semibold uppercase tracking-[.3em] text-clay">Wedding Admin</p><h1 class="mt-3 font-display text-5xl text-forest">Selamat datang</h1><p class="mt-3 text-sm text-ink/60">Masuk untuk mengelola undangan.</p></div>
        @if ($errors->any() || session('error'))<div class="mt-7 border-l-4 border-clay bg-cream px-4 py-3 text-sm text-clay">{{ session('error') ?: $errors->first() }}</div>@endif
        <form class="mt-8 space-y-5" method="post" action="{{ url('admin/login') }}">{!! csrf_field() !!}<div><label class="text-xs font-semibold uppercase tracking-widest text-forest" for="email">Email</label><input class="mt-2 w-full border-b border-forest/20 px-0 py-3 outline-none focus:border-gold" id="email" name="email" type="email" value="{{ Input::old('email') }}" required autofocus></div><div><label class="text-xs font-semibold uppercase tracking-widest text-forest" for="password">Password</label><input class="mt-2 w-full border-b border-forest/20 px-0 py-3 outline-none focus:border-gold" id="password" name="password" type="password" required></div><button class="w-full bg-forest px-6 py-4 text-xs font-semibold uppercase tracking-[.2em] text-white transition hover:bg-gold hover:text-forest" type="submit">Masuk ke dashboard</button></form>
        <a class="mt-7 block text-center text-xs text-ink/50 hover:text-clay" href="{{ url('/') }}">Kembali ke undangan</a>
    </main>
</body>
</html>
