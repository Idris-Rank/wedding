<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin Wedding</title>
    <link rel="stylesheet" href="{{ asset('css/admin.min.css') }}?v={{ filemtime(path('assets').'css/admin.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
</head>
<body class="relative flex min-h-screen items-center justify-center overflow-hidden bg-cream px-5 py-10 font-sans text-ink">
    <div class="pointer-events-none absolute inset-0 overflow-hidden" aria-hidden="true"><div class="absolute -left-32 -top-32 h-96 w-96 rounded-full border border-gold/20"><div class="absolute inset-8 rounded-full border border-forest/10"></div></div><div class="absolute -bottom-40 -right-28 h-[30rem] w-[30rem] rounded-full border border-forest/10"><div class="absolute inset-10 rounded-full border border-gold/20"></div></div></div>
    <main class="relative z-10 w-full max-w-md rounded-2xl border border-forest/10 bg-white p-7 shadow-soft sm:p-10">
        <a href="{{ url('/') }}" class="inline-flex items-center text-xs font-semibold text-ink/50 transition hover:text-clay focus:outline-none focus:underline"><span class="mr-2" aria-hidden="true">←</span>Kembali ke undangan</a>
        <div class="mt-9"><p class="text-[10px] font-bold uppercase tracking-[.28em] text-clay">Wedding Admin</p><h1 class="mt-3 font-display text-5xl leading-tight text-forest">Selamat datang.</h1><p class="mt-2 text-sm leading-6 text-ink/55">Masuk untuk melanjutkan persiapan hari istimewa Anda.</p></div>
        @if ($errors->any() || session('error'))<div class="mt-6 rounded-lg border-l-4 border-clay bg-cream px-4 py-3 text-sm text-clay" role="alert">{{ session('error') ?: $errors->first() }}</div>@endif
        <form class="mt-8 space-y-5" method="post" action="{{ url('admin/login') }}">
            {!! csrf_field() !!}
            <div><label class="text-xs font-bold uppercase tracking-wider text-forest" for="email">Alamat email</label><input class="mt-2 w-full rounded-lg border border-forest/15 bg-cream/40 px-4 py-3 text-sm text-ink outline-none transition placeholder:text-ink/35 hover:border-forest/30 focus:border-gold focus:ring-2 focus:ring-gold/25" id="email" name="email" type="email" autocomplete="username" value="{{ Input::old('email') }}" placeholder="nama@email.com" required autofocus></div>
            <div><label class="text-xs font-bold uppercase tracking-wider text-forest" for="password">Password</label><input class="mt-2 w-full rounded-lg border border-forest/15 bg-cream/40 px-4 py-3 text-sm text-ink outline-none transition placeholder:text-ink/35 hover:border-forest/30 focus:border-gold focus:ring-2 focus:ring-gold/25" id="password" name="password" type="password" autocomplete="current-password" placeholder="Masukkan password" required></div>
            <button class="w-full rounded-lg bg-forest px-6 py-4 text-xs font-bold uppercase tracking-[.18em] text-white transition hover:bg-clay focus:outline-none focus:ring-2 focus:ring-gold focus:ring-offset-2" type="submit">Masuk ke dashboard <span class="ml-2" aria-hidden="true">→</span></button>
        </form>
        <p class="mt-7 border-t border-forest/10 pt-5 text-center text-[10px] uppercase tracking-[.18em] text-ink/50">Kelola undangan pernikahan Anda</p>
    </main>
</body>
</html>
