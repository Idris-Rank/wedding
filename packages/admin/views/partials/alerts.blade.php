@if (session('admin_status'))<div class="my-6 border-l-4 border-gold bg-white px-5 py-4 text-sm text-forest shadow-sm">{{ session('admin_status') }}</div>@endif
@if ($errors->any())<div class="my-6 border-l-4 border-clay bg-white px-5 py-4 text-sm text-clay shadow-sm">{{ $errors->first() }}</div>@endif
